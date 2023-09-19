<?php

namespace App\Http\Controllers;

use Mail;
use Illuminate\Http\Request;
use App\Mail\ApplicationEmail;
use App\Jobs\SendApplicationEmailJob;
// use Illuminate\Support\Facades\Mail;


class PageController extends Controller
{
    public function index(){
        return view('index');
    }

    public function about(){
        return view('about');
    }

    public function committee(){
        return view('committee');
    }

    public function applicationChecklist(){
        return view('application-checklist');
    }

    public function applicationForms(){
        return view('application-forms');
    }

    public function apply(){
        return view('apply');
    }

    public function contact(){
        return view('contact');
    }

    public function sendApplication(Request $request){
        $request->validate([
            'full_name' => 'required|string',
            'email' => 'required|email',
            'application_form' => 'required|mimes:pdf,doc,docx|max:1024', // PDF, max 1MB
            'abridged_pi_or_supervisor_cv' => 'required|mimes:pdf,doc,docx|max:500', // PDF, max 500kb
            'abridged_proposal' => 'required|mimes:pdf,doc,docx|max:1024', // PDF, max 1MB
            'questionnaire' => 'nullable|mimes:pdf,doc,docx|max:500', // PDF, max 500kb
            'consent_form' => 'nullable|mimes:pdf,doc,docx|max:200', // PDF, max 200kb
            'citi_certificate' => 'required|mimes:pdf,doc,docx|max:300', // PDF, max 300kb
            'irb_approval' => 'nullable|mimes:pdf,doc,docx|max:200', // PDF, max 200kb
            'evidence_of_payment' => 'required|mimes:pdf,jpeg,png|max:200', // PDF, max 200kb
        ]);

        $data = $request->all();

        $attachmentPaths = [];

        // Store required uploaded PDFs
        $attachmentFields = [
            'application_form',
            'abridged_pi_or_supervisor_cv',
            'abridged_proposal',
            'questionnaire',
            'consent_form',
            'citi_certificate',
            'irb_approval',
            'evidence_of_payment',
        ];

        foreach ($attachmentFields as $attachmentField) {
            if ($request->hasFile($attachmentField)) {
                $attachmentPaths[$attachmentField] = $request->file($attachmentField)->store('pdfs');
            }
        }

        $refLength = rand(5, 10);
        $applicationRef = $this->generateApplicationReference($refLength);
        $applicantInfo = [
            'subject' => 'CHREC Application Confirmation ['.$applicationRef.']',
            'body' => 'emails.applicant',
            'ref' => $applicationRef,
            'applicant_name' => $data['full_name'],
        ];

        $chrecEmail = env('MAIL_FROM_ADDRESS');
        $chrecInfo = [
            'subject' => 'Application for CHREC Ethical Approval ['.$applicationRef.']',
            'body' => 'emails.chrec',
            'ref' => $applicationRef,
            'applicant_name' => $data['full_name'],
            'applicant_email' => $data['email'],
        ];

        try {
            // Send email with attachment
            Mail::to($chrecEmail)->send(new ApplicationEmail($chrecInfo, $attachmentPaths));
            Mail::to($data['email'])->send(new ApplicationEmail($applicantInfo, []));

            $this->deleteUploadedDocs($attachmentPaths);

            // // Dispatch job
            // SendApplicationEmailJob::dispatch($chrecEmail, $chrecInfo, $attachmentPaths);
            // SendApplicationEmailJob::dispatch($data['email'], $applicantInfo, []);

            return response()->json([
                'status'=> 'success',
                'message'=> 'Application successfully submitted. Kindly check your email for confirmation.',
            ]);

        } catch (\Exception $e) {
            // return ($e);
            return response()->json([
                'status'=> 'error',
                'message'=> 'Error. Email could not be sent. Please try again',
            ]);
        }
    }

    public function generateApplicationReference($length){
        // $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        // $randomString = '';

        // for ($i = 0; $i < $length; $i++) {
        //     $randomString .= $characters[rand(0, strlen($characters) - 1)];
        // }

        // return 'Ref_'.$randomString;
        $currentTime = microtime(true);
        $microseconds = explode('.', $currentTime)[1]; // Get the milliseconds part

        $reference = date('YmdHis') . $microseconds; // Combine date, time, and milliseconds

        // Ensure the reference is unique within the same minute
        $uniqueReference = $reference . rand(100, 999); // Append a random number

        return 'Ref: '.$uniqueReference;
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
