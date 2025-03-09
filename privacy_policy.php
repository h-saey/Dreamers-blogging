<?php
session_start();
$username = $_SESSION['username'] ?? null;
$profile_pic = $_SESSION['profile_pic'] ?? 'default.jpg'; // Default profile pic if none is set
?>
<!-- ------------------------------------------------------------------------------------------------------- -->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Privacy Policy- Dreamers</title>
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


  <!------------------------------------------- Privacy Policy HTML---------------------->

  <section class="privacy-section mx-4 p-3 p-md-5 p-lg-5 d-block mx-lg-auto mx-md-auto">
    <h1 class="text-center">Privacy Policy</h1>
    <p class="text-center last-updated">Last Updated: 1 day ago</p>

    <div class="policy-content">
      <div class="policy-item">
        <h2>1. What Information We Collect</h2>
        <p>
          We may collect personal information such as your name, email, and
          payment details when you buy an eBook or subscribe. Additionally, we
          collect non-personal information like your IP address, browser type,
          and site interactions.
        </p>
      </div>

      <div class="policy-item">
        <h2>2. How We Use Your Information</h2>
        <p>
          Your information is used to process purchases, send newsletters,
          improve website functionality, and provide a better user experience.
        </p>
      </div>

      <div class="policy-item">
        <h2>3. Cookies & Tracking</h2>
        <p>
          We use cookies to enhance your experience. These help us analyze
          website traffic and understand content preferences. You can disable
          cookies in your browser settings.
        </p>
      </div>

      <div class="policy-item">
        <h2>4. Third-Party Services</h2>
        <p>
          We may use third-party services such as PayPal for payments and
          Google Analytics for insights. These services have their own privacy
          policies.
        </p>
      </div>

      <div class="policy-item">
        <h2>5. How We Protect Your Data</h2>
        <p>
          We take security seriously and implement encryption, firewalls, and
          other security measures to protect your data.
        </p>
      </div>

      <div class="policy-item">
        <h2>6. Your Rights</h2>
        <p>
          You have the right to access, update, or delete your personal
          information. You can also unsubscribe from our emails at any time.
        </p>
      </div>

      <div class="policy-item">
        <h2>7. Changes to This Policy</h2>
        <p>
          We may update our Privacy Policy periodically. Major changes will be
          communicated via email or website notifications.
        </p>
      </div>

      <div class="policy-item">
        <h2>8. Contact Us</h2>
        <p>
          If you have any questions, feel free to email us at
          <b>Dreamers@gmail.com</b>.
        </p>
      </div>
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