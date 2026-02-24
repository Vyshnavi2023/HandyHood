
<?php
require __DIR__ . '/config/database.php';

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $fullName = $_POST['fullName'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $category = $_POST['category'];
    $city = $_POST['city'];

    $collection = $db->workers;  // your collection name

    // Check if email already exists
    $existingUser = $collection->findOne(['email' => $email]);

    if ($existingUser) {
        $message = "Email already registered!";
    } else {

        $collection->insertOne([
            'fullName' => $fullName,
            'email' => $email,
            'mobile' => $mobile,
            'password' => $password,
            'category' => $category,
            'city' => $city
        ]);

        $message = "Registration Successful ✅";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register - HandyHood</title>
</head>
<body>

<h2>Register</h2>

<form method="POST">
    <input type="text" name="fullName" placeholder="Full Name" required><br><br>
    <input type="email" name="email" placeholder="Email" required><br><br>
    <input type="text" name="mobile" placeholder="Mobile" required><br><br>
    <input type="password" name="password" placeholder="Password" required><br><br>
    <input type="text" name="category" placeholder="Category" required><br><br>
    <input type="text" name="city" placeholder="City" required><br><br>
    <button type="submit">Register</button>
</form>

<p><?php echo $message; ?></p>

</body>
</html>