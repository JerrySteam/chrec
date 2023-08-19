<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ApplicationEmail;
use Mail;
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
            'application_form' => 'required|mimes:pdf|max:2048', // PDF, max 2MB
            'abridged_pi_or_supervisor_cv' => 'required|mimes:pdf|max:2048', // PDF, max 2MB
            'abridged_proposal' => 'required|mimes:pdf|max:2048', // PDF, max 2MB
            'questionnaire' => 'nullable|mimes:pdf|max:2048', // PDF, max 2MB
            'consent_form' => 'nullable|mimes:pdf|max:2048', // PDF, max 2MB
            'citi_certificate' => 'required|mimes:pdf|max:2048', // PDF, max 2MB
            'irb_approval' => 'nullable|mimes:pdf|max:2048', // PDF, max 2MB
            'evidence_of_payment' => 'required|mimes:pdf|max:2048', // PDF, max 2MB
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
        ];

        $chrecEmail = env('MAIL_FROM_ADDRESS');
        $chrecInfo = [
            'subject' => 'Application for CHREC Ethical Approval ['.$applicationRef.']',
            'body' => 'emails.chrec',
            'ref' => $applicationRef,
        ];

        try {
            // Send email with attachment
            Mail::to($data['email'])->send(new ApplicationEmail($applicantInfo, $data, $attachmentPaths));
            Mail::to($chrecEmail)->send(new ApplicationEmail($chrecInfo, $data, $attachmentPaths));

            $this->deleteUploadedDocs($attachmentPaths);

            return response()->json([
                'status'=> 'success',
                'message'=> 'Application successfully completed. Kindly check your email for confirmation.',
            ]);

        } catch (\Exception $e) {
            // return ($e);
            return [
                'status'=> 'error',
                'message'=> 'Error. Email could not be sent!',
            ];
        }
    }

    public function generateApplicationReference($length){
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        $randomString = '';

        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }

        return 'Ref_'.$randomString;
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
