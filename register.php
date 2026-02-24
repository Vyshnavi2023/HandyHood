<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name     = trim($_POST["fullName"]);
    $email = trim($_POST['email']);

    $mobile   = trim($_POST["mobile"]);
    $password = $_POST["password"];
    $category = $_POST["category"];
    $city     = trim($_POST["city"]);
    $idProofName = $_FILES['id_proof']['name'];
    $idProofTmp  = $_FILES['id_proof']['tmp_name'];

    $skillName = $_FILES['skill_certificate']['name'];
    $skillTmp  = $_FILES['skill_certificate']['tmp_name'];


    if (
        $name == "" || $email=="" || $mobile == "" || $password == "" ||
        $category == "" || $city == "" ||
        $idProofName == "" || $skillName == ""
    ) {
        die("All fields including documents are required");
    }

    if (strlen($mobile) != 10) {
        die("Mobile must be 10 digits");
    }

    if (strlen($password) < 6) {
        die("Password must be at least 6 characters");
    }

    
    $allowedTypes = ['jpg', 'jpeg', 'png', 'pdf'];

    $idExt = strtolower(pathinfo($idProofName, PATHINFO_EXTENSION));
    $skillExt = strtolower(pathinfo($skillName, PATHINFO_EXTENSION));

    if (!in_array($idExt, $allowedTypes) || !in_array($skillExt, $allowedTypes)) {
        die("Only JPG, PNG or PDF files are allowed");
    }

    
    $conn = new mysqli("localhost", "root", "", "handyhood");

    if ($conn->connect_error) {
        die("Database connection failed");
    }

    
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    
    $sql = "INSERT INTO workers 
            (full_name, email, mobile, password, category, city, id_proof, skill_certificate)
            VALUES (?, ?, ?, ?, ?, ?, ?,?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param(
        "ssssssss",
        $name,
        $email,
        $mobile,
        $hashedPassword,
        $category,
        $city,
        $idProofName,
        $skillName
    );


    if ($stmt->execute()) {

    
        move_uploaded_file($idProofTmp, "uploads/" . $idProofName);
        move_uploaded_file($skillTmp, "uploads/" . $skillName);

        header("Location: join.php?success=1");
        exit();

    } else {
        echo "Mobile number already registered";
    }

    $logFile = fopen("worker_log.txt", "a");
    $logData = "Name: $name | email: $email | Mobile: $mobile | Category: $category | City: $city\n";
    fwrite($logFile, $logData);
     fclose($logFile);

    $stmt->close();
    $conn->close();
}
?>
