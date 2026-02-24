

<?php
session_start();

require __DIR__ . '/config/database.php';

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
<html>
<head>
    <title>Login - HandyHood</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>

<div class="login-container">
    <h2>Login</h2>

    <form method="POST" action="login1.php">
        <input type="email" name="email" placeholder="Enter Email" required>
        <input type="password" name="password" placeholder="Enter Password" required>
        <button type="submit" name="login">Login</button>
    </form>

    <p class="error"><?php echo $error; ?></p>
</div>

</body>
</html>

