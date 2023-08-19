<x-layouts.master title="Apply">
    <x-layouts.breadcrumb title="Apply"/>
    
    <!-- Apply -->
    <div class="container-fluid py-1">
        <div class="container py-1">

            <div class="row justify-content-center">
                <h5 class="mb-4"><b>Please fill the fields below and attach all required documents</b></h5>
                <p class="mb-4">Kindly check the <a href="application-processes.html">CHREC application checklist</a> for ethical approval at Covenant University before submitting your application.</p>
                
                <div class="col-lg-12">
                    <div class="contact-form bg-secondary rounded p-5">
                        <div id="success"></div>
                        <form name="sendApplicationForm" id="sendApplicationForm" novalidate="novalidate" action="{{ route('send-application') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 col-12 control-group mb-2">
                                    <label for="full_name">Full Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control border-0 cp-4" id="full_name" name="full_name" placeholder="Surname Firstname Othernames" required="required" data-validation-required-message="Please enter your name" />
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="col-md-6 col-12 control-group mb-2">
                                    <label for="email">Email <span class="text-danger">*</span></label>
                                    <input type="email" class="form-control border-0 cp-4" id="email" name="email" placeholder="Email Address" required="required" data-validation-required-message="Please enter your email" />
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="col-md-6 col-12 control-group mb-2">
                                    <label for="application_form">Application Form <span class="text-danger">*</span></label>
                                    <input type="file" class="form-control border-0 cpf-4" id="application_form"
                                    name="application_form" required="required" data-validation-required-message="Please attach application form" accept=".pdf" />
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="col-md-6 col-12 control-group mb-2">
                                    <label for="abridged_pi_or_supervisor_cv">Abridged CV of PI or Supervisor (not more than 3 pages) <span class="text-danger">*</span></label>
                                    <input type="file" class="form-control border-0 cpf-4" id="abridged_pi_or_supervisor_cv" name="abridged_pi_or_supervisor_cv" required="required" data-validation-required-message="Please attach PI or Supervisor CV" accept=".pdf" />
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="col-md-6 col-12 control-group mb-2">
                                    <label for="abridged_proposal">Abridged Proposal (not more than 8 pages) <span class="text-danger">*</span></label>
                                    <input type="file" class="form-control border-0 cpf-4" id="abridged_proposal" name="abridged_proposal" required="required" data-validation-required-message="Please attach proposal" accept=".pdf" />
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="col-md-6 col-12 control-group mb-2">
                                    <label for="questionnaire">Questionnaire</label>
                                    <input type="file" class="form-control border-0 cpf-4" id="questionnaire" name="questionnaire" accept=".pdf" />
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="col-md-6 col-12 control-group mb-2">
                                    <label for="consent_form">Consent Form</label>
                                    <input type="file" class="form-control border-0 cpf-4" id="consent_form" name="consent_form" accept=".pdf" />
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="col-md-6 col-12 control-group mb-2">
                                    <label for="citi_certificate">CITI Training Certificate <span class="text-danger">*</span></label>
                                    <input type="file" class="form-control border-0 cpf-4" id="citi_certificate" name="citi_certificate" required="required" data-validation-required-message="Please attach CITI training certificate" accept=".pdf" />
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="col-md-6 col-12 control-group mb-2">
                                    <label for="irb_approval">Approval from another IRB</label>
                                    <input type="file" class="form-control border-0 cpf-4" id="irb_approval" name="irb_approval" accept=".pdf" />
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="col-md-6 col-12 control-group mb-2">
                                    <label for="evidence_of_payment">Evidence of Payment <span class="text-danger">*</span></label>
                                    <input type="file" class="form-control border-0 cpf-4" id="evidence_of_payment" name="evidence_of_payment" required="required" data-validation-required-message="Please attach evidence of payment" accept=".pdf" />
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="col-12 text-right">
                                    <button class="btn btn-primary py-3 px-5" type="submit" id="sendApplicationButton">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Apply -->
</x-layouts.master>