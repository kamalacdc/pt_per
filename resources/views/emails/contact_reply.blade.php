<!DOCTYPE html>
<html>
<head>
    <title>Reply to Your Message</title>
</head>
<body>
    <h1>Thank you for contacting us, {{ $contact->name }}</h1>
    <p>Your original message:</p>
    <blockquote>{{ $contact->message }}</blockquote>
    <p>Our reply:</p>
    <p>{{ $replyMessage }}</p>
    <p>Best regards,<br>Your Company</p>
</body>
</html>
