<?php
session_start();
require_once __DIR__ . '/vendor/autoload.php';

$clientID = '1099047251440-ve94j85uek5q6qq1q4g6c99ir6jbgut2.apps.googleusercontent.com';
$clientSecret = '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';
$redirectUri = 'http://localhost/KrediKing/oauth2callback.php'; // Pastikan URI ini benar

$client = new Google_Client();
$client->setClientId($clientID);
$client->setClientSecret($clientSecret);
$client->setRedirectUri($redirectUri);
$client->addScope('email');
$client->addScope('profile');

$oauth2Service = new Google_Service_Oauth2($client);

if (isset($_GET['code'])) {
    $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
    if (isset($token['error'])) {
        throw new Exception(join(', ', $token));
    }
    $_SESSION['access_token'] = $token;
    header('Location: http://localhost/KrediKing/krediKing/'); // Ganti dengan URL halaman login Anda
    exit();
}

if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
    $client->setAccessToken($_SESSION['access_token']);
    $userInfo = $oauth2Service->userinfo->get();

    $email = $userInfo->getEmail();
    $name = $userInfo->getName();
    $imageUrl = $userInfo->getPicture();

    echo '<h2>Halo, ' . $name . '</h2>';
    echo '<p>Email: ' . $email . '</p>';
    echo '<img src="' . $imageUrl . '" alt="Profil Picture">';
} else {
    $authUrl = $client->createAuthUrl();
    echo '<a href="' . $authUrl . '">Login dengan Google</a>';
}
?>
