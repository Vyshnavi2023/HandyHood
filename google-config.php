<?php
require_once __DIR__ . '/vendor/autoload.php';

// IMPORTANT: Replace these with your actual Google API credentials
$clientID = 'YOUR_GOOGLE_CLIENT_ID';
$clientSecret = 'YOUR_GOOGLE_CLIENT_SECRET';

// Your Callback URL (Must match exactly what is in Google Console)
$redirectUri = 'http://localhost/HandyHood/google-callback.php';

// Create Client Request to access Google API
$client = new Google_Client();
$client->setClientId($clientID);
$client->setClientSecret($clientSecret);
$client->setRedirectUri($redirectUri);
$client->addScope("email");
$client->addScope("profile");
?>
