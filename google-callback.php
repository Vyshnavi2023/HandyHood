<?php
session_start();
require_once 'google-config.php';

if (isset($_GET['code'])) {
    
    // Fetch Access Token from Google API using the returned code
    $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
    
    // Check if there is NO error in the token payload
    if (!isset($token['error'])) {
        $client->setAccessToken($token['access_token']);

        // Verify ID Token securely
        $payload = $client->verifyIdToken($token['id_token']);
        
        if ($payload) {
            $email = $payload['email'];
            $name = $payload['name'];

            // MySQL Database logic
            $conn = new mysqli("localhost", "root", "", "handyhood");

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            
            // Find if user already exists securely
            $stmt = $conn->prepare("SELECT email FROM users WHERE email = ?");
            if ($stmt) {
                $stmt->bind_param("s", $email);
                $stmt->execute();
                $result = $stmt->get_result();

                if ($result->num_rows == 0) {
                    // Auto register the user cleanly if they don't exist yet via OAuth
                    // Only populating essential email to bypass schema constraint risks
                    $insert = $conn->prepare("INSERT INTO users (email) VALUES (?)");
                    if ($insert) {
                        $insert->bind_param("s", $email);
                        $insert->execute();
                    }
                }
            }

            // Trigger secure Session and redirect successfully
            $_SESSION['user_email'] = $email;
            header("Location: index.html");
            exit();
        } else {
            die("Invalid ID Token parsed from Google Auth.");
        }

    } else {
        // Token error handling gracefully output to user
        die("Google OAuth Authentication failed: " . htmlspecialchars($token['error_description'] ?? 'Unknown Error'));
    }

} else {
    // Redirect back to login if accessed directly without code
    header('Location: login1.php');
    exit();
}
?>
