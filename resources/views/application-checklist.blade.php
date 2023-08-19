<x-layouts.master title="Application Checklist">
  <x-layouts.breadcrumb title="Application Checklist"/>

  <!-- Application Checklist Start -->
  <div class="container-fluid py-1">
    <div class="container py-1">
        <div class="row">
            <div class="col-lg-12 col-md-12 mb-4">
                <div class="rounded overflow-hidden mb-2">
                    <div class="bg-secondary p-4">
                        <h5>Application checklist for ethical approval at Covenant University</h5>
                        <div class="border-top mt-4 pt-4">
                            <h6>Applicants are to attach the following documents:</h6>
                            <div class="d-flex justify-content-between">
                                <ol>
                                    <li>Completed application form (<a href="{{ route('application-forms') }}" target="_blank">Click here to download</a>)</li>
                                    <li>Abridge CV of the Principal Investigator for P.I and Abridge CV of the main supervisor for BSC, MSC &amp; PhD thesis (Not more than 3pages)</li>
                                    <li>Abridge proposal containing the introduction, aim,objective, methodology, reference etc (Not more than 8 pages)</li>
                                    <li>A copy of questionnaire (if any)</li>
                                    <li>Consent form (if any)</li>
                                    <li>Completion of online training for investigators. Please click on the link and follow the quidelines to complete CITI Exam. 
                                        <h6>Guidelines for the CITI exam</h6>
                                        <ul>
                                            <li><a href="https://about.citiprogram.org/" target="_blank">Go to CITI trainning</a></li>
                                            <li>Click on register and follow the step by step processes.</li>
                                            <li>Institution Name: <b>Center for Bioethics and Research (CBR) Nigeria</b></li>
                                            <li>Course to Register: <b>Nigerian National Code for Health Research Ethics</b></li>
                                            <li>Attach the training certificate to your application.</li>
                                        </ul>
                                    </li>
                                    <li>Approval from another IRB (if any)</li>
                                    <li>Upload the evidence of payment. Check below for the breakdown of payment.</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-7 col-md-12 mb-4">
                <div class="rounded overflow-hidden mb-2">
                    <div class="bg-secondary p-4">
                        <h5>The breakdown of the payment is as follows:</h5>
                        <div class="border-top mt-4 pt-4">
                            <div class="d-flex justify-content-between">
                                <ul>
                                    <li>The sum of <b>N10,000 (Ten thousand naira)</b> for External Principal Investigator (P.I)</li>
                                    <li>The sum of <b>N5,000 (Five thousand naira)</b> for Internal Principal Investigator</li>
                                    <li>The sum of <b>N5,000 (Five thousand naira)</b> for PhD candidates</li>
                                    <li>The sum of <b>N2,000 (Two thousand naira) </b> for MSc candidates</li>
                                    <li>The sum of <b>N1,000 (One thousand naira) </b> for BSc candidates</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 col-md-12 mb-4">
                <div class="rounded overflow-hidden mb-2">
                    <div class="bg-secondary p-4">
                        <h5>CHREC account details</h5>
                        <div class="border-top mt-4 pt-4">
                            <div class="d-flex justify-content-between">
                                <p class="m-0">
                                    Account Name: <b>Covenant Health Research Committee </b><br/>
                                    Account Number: <b>0241456984 </b> <br/>
                                    Bank Name: <b>Guarantee Trust (GT) Bank </b> <br/><br/>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-12 mb-4">
                <a class="btn btn-primary py-2 px-4 ml-auto d-none d-lg-block" href="{{ route('application-forms') }}"  target="_blank">Download Application Form</a>
            </div>
            <div class="col-lg-6 col-md-12 mb-4">
                <a class="btn btn-primary py-2 px-4 ml-auto d-none d-lg-block" href="{{ route('apply') }}" target="_blank">Apply Now</a>
            </div>
        </div>
        <div>
            <p>For more clearifications you can <a href="{{ route('contact') }}" target="_blank">contact us</a>.</p>
        </div>
    </div>
</div>
<!-- Application Processes End -->
</x-layouts.master>