<?php
session_start();
include 'db_connect.php'; // Database connection
$username = $_SESSION['username'] ?? null;
$profile_pic = $_SESSION['profile_pic'] ?? 'default.jpg'; // Default profile pic if none is set

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = trim($_POST['username']);
  $email = trim($_POST['email']);
  $password = $_POST['password'];
  $confirmPassword = $_POST['confirmPassword'];

  // Validate passwords
  if ($password !== $confirmPassword) {
    $_SESSION['error'] = "Passwords do not match!";
    header("Location: sign_up.php");
    exit();
  }

  // Check if username already exists
  $check_sql = "SELECT id FROM users WHERE username = ?";
  $check_stmt = $conn->prepare($check_sql);
  $check_stmt->bind_param("s", $username);
  $check_stmt->execute();
  $check_stmt->store_result();

  if ($check_stmt->num_rows > 0) {
    $_SESSION['error'] = "Username already exists!";
    header("Location: sign_up.php");
    exit();
  }
  $check_stmt->close();

  // Hash the password
  $hashed_password = password_hash($password, PASSWORD_DEFAULT);

  // Insert into database
  $sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("sss", $username, $email, $hashed_password);

  if ($stmt->execute()) {
    // Start session and store user data
    $_SESSION['username'] = $username;
    $_SESSION['user_id'] = $stmt->insert_id; // Get last inserted ID
    $_SESSION['email'] = $email;


    // Redirect to dashboard
    header("Location: dashboard.php");
    exit();
  } else {
    $_SESSION['error'] = "Error: " . $stmt->error;
    header("Location: sign_up.php");
    exit();
  }

  $stmt->close();
  $conn->close();
}
?>



<!----------------------------------------------------- Html code starts -->

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Sign Up- Dreamers</title>
  <link rel="icon" type="image/png" href="Pics/logo 2.png">
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
  <style>
    ::placeholder {
      color: #cccccc !important;
      opacity: 1;
    }
  </style>
</head>

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
            <li class="nav-item"><a class="nav-link" href="log_in.php" style="border: 2px solid white; border-radius:20px;">Login</a></li>
            <li class="nav-item"><a class="nav-link" href="sign_up.php" style="border: 2px solid white; border-radius:20px;">Register</a></li>
          <?php endif; ?>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Sign up form -->
  <section class="d-flex justify-content-center">
    <div class="register-card">
      <h2 class="text-center mb-4">REGISTER</h2>
      <?php
      if (isset($_SESSION['error'])) {
        echo '<div class="alert alert-danger text-center">' . $_SESSION['error'] . '</div>';
        unset($_SESSION['error']); // Clear the error message after showing
      }
      ?>
      <form action="sign_up.php" method="POST">
        <div class="mb-3">
          <label for="username" class="form-label">User Name</label>
          <input type="text" class="form-control" id="username" name="username" placeholder="Your Name" required />
        </div>
        <div class="mb-3">
          <label for="email" class="form-label">Email</label>
          <input type="email" class="form-control" id="email" name="email" placeholder="Your Email" required />
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <input type="password" class="form-control" id="password" name="password" placeholder="Your Password" required />
        </div>
        <div class="mb-3">
          <label for="confirmPassword" class="form-label">Confirm Password</label>
          <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" placeholder="Password again" required />
        </div>
        <div class="d-flex justify-content-center">
          <button type="submit" class="btn btn-signup">Sign Up</button>
        </div>
        <p class="text-center mt-3">
          Already have an Account? <a href="log_in.php" class="login-link">Log in</a>
        </p>
      </form>
    </div>
  </section>
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
</body>

</html>