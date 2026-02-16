<?php
session_start();
include 'db.php';
require __DIR__ . '/google-config.php'; // Load Google Configuration

// Generate Google Login URL
$googleLoginUrl = $client->createAuthUrl();

$error = "";

if (isset($_POST['login'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();

    if (password_verify($password, $row['password'])) {
        $_SESSION['user_email'] = $email;
        header("Location: index.html");
        exit();
    } else {
        $error = "Invalid Password!";
    }
} else {
    $error = "User not found!";
}

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $_SESSION['user_email'] = $email;
        header("Location: index.php");

        exit();
    } else {
        $error = "Invalid Email or Password!";
    }
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>Login - HandyHood</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>

<div class="login-container">
    <h2>Login</h2>

    <form method="POST">
        <input type="email" name="email" placeholder="Enter Email" required>
        <input type="password" name="password" placeholder="Enter Password" required>
        <button type="submit" name="login">Login</button>
    </form>

    <div style="text-align: center; margin-top: 25px;">
        <p style="margin-bottom: 15px; color: #777; font-size: 14px; position:relative;">
           <span style="background:white; padding:0 10px; z-index:2; position:relative;">Or continue with</span>
           <hr style="position:absolute; top:50%; left:0; width:100%; border:none; border-top:1px solid #ddd; z-index:1; margin:0;">
        </p>
        
        <a href="<?php echo htmlspecialchars($googleLoginUrl); ?>" style="background-color: #ffffff; color: #555; display: flex; align-items: center; justify-content: center; padding: 12px 20px; border-radius: 8px; text-decoration: none; font-weight: bold; border: 1px solid #ccc; transition: all 0.3s ease; box-shadow: 0 2px 4px rgba(0,0,0,0.05);">
            <img src="https://upload.wikimedia.org/wikipedia/commons/c/c1/Google_%22G%22_logo.svg" alt="Google" style="width: 22px; margin-right: 12px;">
            Sign in with Google
        </a>
    </div>

    <p class="error"><?php echo $error; ?></p>
</div>

</body>
</html>
