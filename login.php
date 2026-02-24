<?php
session_start();
include 'db.php';

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

    <p class="error"><?php echo $error; ?></p>
</div>

</body>
</html>
