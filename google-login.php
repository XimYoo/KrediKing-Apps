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

$authUrl = $client->createAuthUrl();
header('Location: ' . filter_var($authUrl, FILTER_SANITIZE_URL));
exit();
?>
