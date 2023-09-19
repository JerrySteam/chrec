<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use App\Mail\ApplicationEmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class SendApplicationEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    protected $recipient;
    protected $recipientInfo;
    protected $attachmentPaths;

    public function __construct($recipient, $recipientInfo, $attachmentPaths)
    {
        $this->recipient = $recipient;
        $this->recipientInfo = $recipientInfo;
        $this->attachmentPaths = $attachmentPaths;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
         // Send email with attachment
         Mail::to($this->recipient)->send(new ApplicationEmail($this->recipientInfo, $this->attachmentPaths));

         // Delete uploaded docs if needed
         $this->deleteUploadedDocs($this->attachmentPaths);
    }

    public function deleteUploadedDocs($attachmentPaths) {
        foreach ($attachmentPaths as $fieldName => $filePath) {
            $absoluteFilePath = storage_path('app/' . $filePath);

            if (file_exists($absoluteFilePath)) {
                unlink($absoluteFilePath); // Delete the file from disk
            }
    
            // $filenameToDelete = $fieldName .'_'.$applicationRef.'.pdf';
            // $absoluteFilePathToDelete = storage_path('app/' . $filenameToDelete);
    
            // if (file_exists($absoluteFilePathToDelete)) {
            //     unlink($absoluteFilePathToDelete); // Delete the file from disk
            // }
        }
    }
}
