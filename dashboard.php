<?php
session_start();
include 'db_connect.php';

if (!isset($_SESSION['user_id'])) {
  header("Location: log_in.php");
  exit();
}

$user_id = $_SESSION['user_id'];
$username = $_SESSION['username'];

// Fetch user details including profile picture
$sql = "SELECT profile_pic FROM users WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$stmt->bind_result($profile_pic);
$stmt->fetch();
$stmt->close();

// Default profile picture if none exists
$profile_pic = $profile_pic ? "uploads/" . basename($profile_pic) : "uploads/default.png";
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
  <link
    rel="stylesheet"
    href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
  <link rel="stylesheet" href="style.css" />
  <!--Custom CSS -->
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
    integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
    crossorigin="anonymous"
    referrerpolicy="no-referrer" />
  <!-- Font Awesome for icons -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Cookie&family=DM+Serif+Text:ital@0;1&family=Dancing+Script:wght@400..700&family=Fleur+De+Leah&family=Kaushan+Script&family=Playwrite+GB+S:ital,wght@0,100..400;1,100..400&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
    rel="stylesheet" />
  <link
    href="https://fonts.googleapis.com/css2?family=Cookie&family=DM+Serif+Text:ital@0;1&family=Dancing+Script:wght@400..700&family=Fleur+De+Leah&family=Kaushan+Script&family=Oswald:wght@200..700&family=Playwrite+GB+S:ital,wght@0,100..400;1,100..400&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
    rel="stylesheet" />
</head>
<style>
  .dashboard {
    margin-top: 100px;
    margin-bottom: 50px;

  }

  .dashboard .card {
    background-color: rgba(230, 228, 228, 0.998);
  }

  .dashboard h1 {
    text-align: center;
    font-family: "oswald", sans-serif;
    text-transform: uppercase;
    font-weight: 800;
    font-size: 50px;
    margin-bottom: 20px;
    color: white;
  }

  .custom-file-upload {
    display: block;
    padding: 10px 15px;
    background-color: #7b3131;
    color: white;
    border-radius: 5px;
    cursor: pointer;
    transition: background 0.3s ease;
  }

  .custom-file-upload:hover {
    background-color: rgb(184, 88, 88);
  }

  #fileInput {
    display: none;
    /* Hide the default file input */
  }

  #uploadBtn {
    border: none;
    background-color: #7b3131;
    color: white;
    padding: 8px 15px;
    cursor: pointer;
    transition: 0.25 ease-in;
  }

  #uploadBtn:hover {
    background-color: rgb(184, 88, 88);

  }
</style>

<body>

  <!--Navbar-->

  <nav class="navbar navbar-expand-md navbar-dark fixed-top">
    <div class="container-fluid">
      <div class="logo">
        <img src="Pics/Logo2.png" width="200px" alt="Logo" />
      </div>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
          <li class="nav-item"><a class="nav-link" href="about_us.php">About us</a></li>
          <li class="nav-item"><a class="nav-link" href="blog_posts.php">Blog</a></li>
          <li class="nav-item"><a class="nav-link" href="contact.php">Contact us</a></li>
          <li class="nav-item"><a class="nav-link" href="privacy_policy.php">Privacy Policy</a></li>

          <?php if ($username): ?>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="<?= htmlspecialchars($profile_pic); ?>" width="40" height="40" class="rounded-circle">
                <?= htmlspecialchars($username); ?>
              </a>
              <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                <li><a class="dropdown-item" href="dashboard.php">Dashboard</a></li>
                <li><a class="dropdown-item" href="logout.php">Logout</a></li>
              </ul>
            </li>
          <?php else: ?>
            <li class="nav-item"><a class="nav-link" href="log_in.php">Login</a></li>
            <li class="nav-item"><a class="nav-link" href="sign_up.php">Register</a></li>
          <?php endif; ?>
        </ul>
      </div>
    </div>
  </nav>


  <!-- Dashboard Content -->
  <div class="dashboard container">
    <h1 class="text-center">Dashboard</h1>
    <div class="row">
      <div class="col-md-4">
        <div class="card text-center p-3">
          <img src="<?= htmlspecialchars($profile_pic); ?>" width="150" height="150" class="rounded-circle mx-auto">
          <h3 class="mt-3"><?= htmlspecialchars($username); ?></h3>
          <form action="upload_profile_pic.php" method="POST" enctype="multipart/form-data">
            <label for="fileInput" class="custom-file-upload">Choose File</label>
            <input type="file" name="profile_pic" id="fileInput">
            <button type="submit" class="btn btn-primary btn-sm mt-2" id="uploadBtn">Upload</button>
          </form>
        </div>
      </div>

      <div class="col-md-8 mt-1">
        <div class="card p-4">
          <h4>Welcome to your dashboard, <?= htmlspecialchars($username); ?>!</h4>
          <p>Here you can manage your profile, view your blogs, and update your settings.</p>
        </div>
      </div>
    </div>
  </div>

  <script>
    document.getElementById("fileInput").addEventListener("change", function() {
      let uploadBtn = document.getElementById("uploadBtn");
      if (this.files.length > 0) {
        uploadBtn.textContent = "Change Profile Pic";
      } else {
        uploadBtn.textContent = "Upload";
      }
    });
  </script>


  <!-- Footer -->
  <!-- -------------------------------------Footer Section -->
  <footer
    class="footer d-flex flex-column flex-lg-row justify-content-around align-items-start">
    <div class="footer_left">
      <img
        src="Pics/logo 2.png"
        height="250px"
        alt="Logo"
        style="margin-top: -40px; margin-left: -40px" />
    </div>
    <div class="footer_mid text-center">
      <p>Get social</p>
      <div>
        <i class="fa-brands fa-youtube fa-3x"></i>
        <i class="fa-brands fa-facebook"></i>
        <i class="fa-brands fa-linkedin"></i>
        <i class="fa-brands fa-instagram"></i>
      </div>
    </div>
    <div class="footer_right d-flex justify-content-around">
      <ul>
        <div class="list-title">Podcasts</div>
        <li><a href="#">Mindset</a></li>
        <li><a href="#">Growth</a></li>
        <li><a href="#">Focus</a></li>
        <li><a href="#">Hustle</a></li>
        <li><a href="#">Balance</a></li>
      </ul>
      <ul>
        <div class="list-title">Blogs</div>
        <li><a href="#">Creativity</a></li>
        <li><a href="#">Success</a></li>
        <li><a href="#">Motivation</a></li>
        <li><a href="#">Habits</a></li>
        <li><a href="#">Clarity</a></li>
      </ul>
      <ul>
        <div class="list-title">Resources</div>
        <li><a href="#">E-books</a></li>
        <li><a href="#">Webinars</a></li>
        <li><a href="#">Workshops</a></li>
        <li><a href="#">Guides</a></li>
        <li><a href="#">Templates</a></li>
      </ul>
    </div>
    <div class="footer_last">
      <img src="Pics/starry.png" height="250px" alt="Starry Background" />
    </div>
  </footer>
  <!-- Copyright Bar -->
  <div class="copyright-bar">
    <p>© 2025 Dreamers. All Rights Reserved.</p>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>