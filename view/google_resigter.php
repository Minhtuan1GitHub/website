<?php
require_once 'vendor/autoload.php';

session_start();

// Khởi tạo Google Client
$client = new Google_Client();
$client->setClientId('489212748011-umcrejj8tm9i6g1vvta26usu69r6gait.apps.googleusercontent.com'); // Thay bằng Client ID của bạn
$client->setClientSecret('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'); // Thay bằng Client Secret của bạn
$client->setRedirectUri('http://localhost/google-callback.php'); // Thay bằng URL callback của bạn
$client->addScope('email');
$client->addScope('profile');

// URL đăng ký Google
$registerUrl = $client->createAuthUrl();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký bằng Google</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="d-flex justify-content-center align-items-center vh-100">
    <div class="text-center">
        <h1 class="mb-4">Đăng ký bằng Google</h1>
        <a href="<?= $registerUrl ?>" class="btn btn-danger btn-lg">Đăng ký với Google</a>
    </div>
</body>
</html>