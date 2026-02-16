

<?php
session_start();

require __DIR__ . '/config/database.php';
require __DIR__ . '/google-config.php'; // Load Google Configuration

// Generate Google Login URL
$googleLoginUrl = $client->createAuthUrl();

$error = "";

if (isset($_POST['login'])) {

    $email = trim($_POST['email']);
    $password = $_POST['password'];

    $collection = $db->users; // make sure same as register

    $user = $collection->findOne(['email' => $email]);

    if ($user) {
        if (password_verify($password, $user['password'])) {
            $_SESSION['user_email'] = $email;
            header("Location: index.html");
            exit();
        } else {
            $error = "Invalid Password!";
        }
    } else {
        $error = "User not found!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | HandyHood</title>
    <!-- Use primary stylesheet instead of login.css -->
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter&family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <style>
      body { font-family: 'Inter', sans-serif; }
      h1, h2, h3, h4 { font-family: 'Poppins', sans-serif; }
    </style>
</head>
<body>

    <header class="navbar">
        <div class="logo">
            <img src="images/logo3.png" alt="HandyHood Logo">
            <span class="handy">Handy<span class="hood">Hood</span></span>
        </div>

        <nav class="nav-links">
            <a href="index.html">Home</a>
            <a href="services.html">Services</a>
            <a href="about.html">About</a>
            <a href="contact.html">Contact</a>
        </nav>
        
        <div class="active-btn">
            <button class="worker-btn" onclick="window.location.href='join.php'" style="margin-right:20px;">
              Join as Worker
            </button>
        </div>
    </header>

    <main class="page-container" style="max-width: 450px; margin-top: 80px;">
        <div style="text-align: center; margin-bottom: 30px;">
            <h2 style="font-size: 32px; color: #2c3e50;">Welcome Back</h2>
            <p style="color: #666; margin-top: 10px;">Sign in to your HandyHood account</p>
        </div>

        <!-- Render Any Login Errors securely -->
        <?php if (!empty($error)): ?>
            <div style="background: #f8d7da; color: #721c24; padding: 12px; border-radius: 6px; margin-bottom: 20px; text-align: center; font-weight: 500;">
                <?php echo htmlspecialchars($error); ?>
            </div>
        <?php endif; ?>

        <form method="POST" action="login1.php">
            <div class="form-group">
                <label>Email Address</label>
                <input type="email" name="email" placeholder="name@example.com" required>
            </div>
            <div class="form-group" style="margin-bottom: 25px;">
                <label>Password</label>
                <input type="password" name="password" placeholder="Enter your password" required>
            </div>
            
            <button type="submit" name="login" class="btn-primary" style="width: 100%;">Sign In</button>
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
    </main>

    <footer style="margin-top: 100px;">
        <p>© 2026 HandyHood. All Rights Reserved.</p>
    </footer>

</body>
</html>

