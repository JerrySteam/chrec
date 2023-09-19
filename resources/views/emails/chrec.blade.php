<!DOCTYPE html>
<html>
<head>
    <title>Application for CHREC Ethical Approval</title>
</head>
<body>
    <p>Dear CHREC,</p>
    <p>I am {{ $recipientInfo['applicant_name'] }}. I am writing to apply for CHREC ethical approval for the research I am undertaking. Kindly find attached the required documents for my application.</p>

    <p>Application Reference: <b>{{ $recipientInfo['ref'] }}</b></p>
    <p>Applicant Email: <b>{{ $recipientInfo['applicant_email'] }}</b></p>

    <p>Thank you in anticipation of your kind approval.</p>
    <p>Yours Sincerely,</p>
    <p>{{ $recipientInfo['applicant_name'] }}</p>
</body>
</html>
