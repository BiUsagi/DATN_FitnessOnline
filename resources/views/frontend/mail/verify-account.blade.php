<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify Your Account</title>
</head>
<body>
    <h1>Hi {{ $user->user_name }},</h1>
    <p>Thanks for signing up! Please click the link below to verify your account:</p>
    <a href="{{ route('verify.account', ['token' => $user->verification_token]) }}">Verify Account</a>
</body>
</html>
