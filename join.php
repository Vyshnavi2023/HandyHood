<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Join As Worker | HandyHood</title>

  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="join.css">

  <link href="https://fonts.googleapis.com/css2?family=Inter&family=Poppins:wght@400;700&display=swap" rel="stylesheet">

  <style>
    body {
      font-family: 'Inter', sans-serif;
    }
    h1, h2, h3, h4 {
      font-family: 'Poppins', sans-serif;
    }
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
</header>

<div class="form-wrapper">

<div class="register-card">
  <h2>Join as Worker</h2>

  <form id="workerForm" action="register1.php" method="POST" enctype="multipart/form-data">

    <div class="form-group">
      <label>Full Name</label>
      <input type="text" id="fullName" name="fullName" required>
    </div>
     <div class="form-group">
    <input type="email" name="email" placeholder="Enter your email" required>

     </div>
    <div class="form-group">
      <label>Mobile Number</label>
      <input type="text" id="mobile" name="mobile" required>
    </div>

    <div class="form-group">
      <label>Password</label>
      <input type="password" id="password" name="password" required>
    </div>

    <div class="form-group">
      <label>Confirm Password</label>
      <input type="password" id="confirmPassword" required>
    </div>

    <div class="form-group">
      <label>Work Category</label>
      <select id="category" name="category" required>
        <option value="">Select</option>
        <option>Electrician</option>
        <option>Plumber</option>
        <option>Painter</option>
      </select>
    </div>

    <div class="form-group">
      <label>City</label>
      <input type="text" id="city" name="city" required>
    </div>
    <div class="form-group">
  <label>ID Proof</label>
  <input type="file" name="id_proof" required>
</div>

<div class="form-group">
  <label>Skill Certificate</label>
  <input type="file" name="skill_certificate" required>
</div>

    <button type="submit" class="register-btn">
      Register
    </button>

  </form>
</div>
</div>
<p style="text-align:center; margin-top:15px;">
  Already have an account?
  <a href="login1.php" style="color:#6a5acd; font-weight:600;">Login Here</a>
</p>

<script src="script.js"></script>
</body>
</html>
