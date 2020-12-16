<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Password Reset Link from Skingourmetgh </title>
</head>
<body>

    <h2>Hello {{$fullname}}! </h2>
    <p>You are receiving this email because we received a password reset request for your account.</p>
    <p> <a href="{{ asset($country.'/user/reset/'.$token)}}">Reset Password</a></p>
    <p>This password reset link will expire in 60 minutes</p>
    <p>If you did not request a password reset, no further action is required.</p>
</body>
</html>