<x-layouts.master title="Application Forms">
    <x-layouts.breadcrumb title="Application Forms"/>

    <!-- Application Forms Start -->
    <div class="container-fluid py-1">
        <div class="container py-1">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <h6 class="mb-4">A brief description and links to download CHREC ethical approval forms. Please download and fill any of the forms below as may apply to your research.</h6>
                    <div class="contact-form bg-secondary rounded p-5">
                        <div id="success"></div>
                            <div class="container">
                                <h4>Application forms</h4>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>S/No</th>
                                            <th>Form Type</th>
                                            <th>Description</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>Form 005: Student Investigator</td>
                                            <td>For students in any categories e.g BSc, MSc, and PhD</td>
                                            <td><a href="{{ asset('@assets/forms/STUDENT INVESTIGATOR.pdf') }}" download>Download</a></td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>Form 009: Animal form</td>
                                            <td>For research involving animals</td>
                                            <td><a href="{{ asset('@assets/forms/ANIMAL FORM.pdf') }}" download>Download</a></td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>Form 002: Non-Student investigators</td>
                                            <td>For non-students</td>
                                            <td><a href="{{ asset('@assets/forms/NON STUDENT FORM.pdf') }}" download>Download</a></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                    </div>
                    <p class="mt-4">Kindly ensure you have gone through the <a href="{{ route('application-checklist') }}">CHREC application checklist</a> for ethical approval at Covenant University before filling and submitting the form.</p>
                </div>
            </div>
        </div>
    </div>
<!-- Application Forms End -->
</x-layouts.master>