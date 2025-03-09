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
  <title>Home Page-Dreamers</title>
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


  <!-- Slider HTML -->
  <div class="slider d-flex align-items-center justify-content-center">
    <div class="opaque d-flex align-items-center justify-content-center">
      <div class="slider-content text-center container-fluid">
        <h1>Dream it, Believe it, Achieve it</h1>
        <button
          class="btn btn-danger btn-lg"
          onclick="window.location.href='blog_posts.php'">
          Start your dream <i class="fas fa-arrow-right"></i>
        </button>
      </div>
    </div>
  </div>

  <!-- What We Provide Section -->
  <section class="provide d-flex flex-column flex-lg-row">
    <div class="side-img col-lg-6">
      <div class="gradient"></div>
    </div>
    <div class="right-provides col-lg-6 px-5 py-4">
      <h3>What we provide:</h3>
      <div class="explanation d-flex align-items-center mt-3">
        <i class="fa-solid fa-headphones fa-2x"></i>
        <p class="heading">Motivational Podcasts</p>
      </div>
      <p class="provide_explanation">
        Boost your drive with podcasts that inspire and energize you to take
        action.
      </p>
      <div class="explanation d-flex align-items-center mt-3">
        <i class="fa-solid fa-wand-sparkles fa-2x"></i>
        <p class="heading">Productivity Hacks</p>
      </div>
      <p class="provide_explanation">
        Simple techniques to help you stay focused and get more done in less
        time.
      </p>
      <div class="explanation d-flex align-items-center mt-3">
        <i class="fa-solid fa-book fa-2x"></i>
        <p class="heading">Self-Help Journals</p>
      </div>
      <p class="provide_explanation">
        Track your growth and reflect with journals designed to improve your
        mindset and habits.
      </p>
    </div>
  </section>

  <!-- My Teams Section -->
  <section class="team sectioni text-center">
    <h1>Our Team</h1>
    <div class="teams row justify-content-center">
      <div class="person col-lg-3 col-sm-6 mb-4">
        <div
          class="person_img"
          style="
              background-image: url(https://i.pinimg.com/736x/6b/3e/9d/6b3e9d043a927ffab6f4fd8acab845c8.jpg);
            ">
          <div class="img_opaque">
            <p>"Believe you can, and you’re halfway there."</p>
          </div>
        </div>
        <div class="description">
          <p class="name">Saiha Atiq</p>
          <p class="title">Founder</p>
        </div>
      </div>
      <div class="person col-lg-3 col-sm-6 mb-4">
        <div
          class="person_img"
          style="
              background-image: url(https://i.pinimg.com/736x/6b/3e/9d/6b3e9d043a927ffab6f4fd8acab845c8.jpg);
            ">
          <div class="img_opaque">
            <p>"Success is the sum of small efforts, repeated daily."</p>
          </div>
        </div>
        <div class="description">
          <p class="name">Malaika Ashraf</p>
          <p class="title">Social Media Manager</p>
        </div>
      </div>
      <div class="person col-lg-3 col-sm-6 mb-4">
        <div
          class="person_img"
          style="
              background-image: url(https://i.pinimg.com/736x/6b/3e/9d/6b3e9d043a927ffab6f4fd8acab845c8.jpg);
            ">
          <div class="img_opaque">
            <p>"Dream big. Start small. Act now."</p>
          </div>
        </div>
        <div class="description">
          <p class="name">Zainab Khawaja</p>
          <p class="title">Content Writer</p>
        </div>
      </div>
      <div class="person col-lg-3 col-sm-6 mb-4">
        <div
          class="person_img"
          style="
              background-image: url(https://i.pinimg.com/736x/6b/3e/9d/6b3e9d043a927ffab6f4fd8acab845c8.jpg);
            ">
          <div class="img_opaque">
            <p>"Small steps lead to big changes."</p>
          </div>
        </div>
        <div class="description">
          <p class="name">Khadija Mustafa</p>
          <p class="title">Co-founder</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Testimonials Section -->
  <section class="sectioni">
    <h1 class="text-center">Testimonials</h1>
    <div class="testimonials row">
      <div class="review col-lg-4 col-md-6 col-sm-8 mb-4">
        <div class="profile d-flex align-items-center">
          <div class="profile_img"></div>
          <div class="t-description">
            <p class="name">Sarah J.</p>
            <div class="rating">
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
            </div>
          </div>
        </div>
        <div class="profile_message">
          <p>
            "This online course has been such a positive influence on my life
            as a Muslim. The podcasts are not only motivational but also align
            beautifully with Islamic values. The module on overcoming
            procrastination reminded me of the importance of time management
            in Islam, and it gave me practical tips I could apply daily.
            Highly recommended!"
          </p>
        </div>
      </div>
      <div class="review col-lg-4 col-md-6 col-sm-8 mb-4">
        <div class="profile d-flex align-items-center">
          <div class="profile_img"></div>
          <div class="t-description">
            <p class="name">Ahmed R.</p>
            <div class="rating">
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
            </div>
          </div>
        </div>
        <div class="profile_message">
          <p>
            "This course has been a blessing! The combination of motivational
            lessons and podcasts is so uplifting, and I love how everything is
            tied back to Islamic teachings. The 'Morning Boost' podcast
            reminds me to start my day with gratitude and purpose. It’s a
            must-have for Muslims seeking personal growth while staying
            connected to their Deen."
          </p>
        </div>
      </div>
      <div class="review col-lg-4 col-md-6 col-sm-8 mb-4">
        <div class="profile d-flex align-items-center">
          <div class="profile_img"></div>
          <div class="t-description">
            <p class="name">Priya M.</p>
            <div class="rating">
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
            </div>
          </div>
        </div>
        <div class="profile_message">
          <p>
            "This online course has been such a positive influence on my life
            as a Muslim. The podcasts are not only motivational but also align
            beautifully with Islamic values. The module on overcoming
            procrastination reminded me of the importance of time management
            in Islam, and it gave me practical tips I could apply daily.
            Highly recommended!"
          </p>
        </div>
      </div>
    </div>
  </section>

  <!-- About Us Section -->
  <section class="sectioni">
    <h1 class="text-center">About Us</h1>
    <div
      class="about_us d-flex flex-column flex-lg-row justify-content-between align-items-center">
      <div class="about_explanation">
        <p>
          My name is Saiha Atiq, and my journey of self-improvement began when
          I entered university. By the time I graduated, I had transformed
          into a confident, disciplined, and well-managed individual. Before
          this, I struggled with laziness, unproductivity, self-doubt, and a
          weak connection to my Deen. Alhamdulillah, now my bond with Islam is
          much stronger, and I am continually striving to grow as a better
          Muslimah.
        </p>
        <a href="about_us.php">
          <button class="btn">
            Read more <i class="fa-solid fa-arrow-right"></i>
          </button>
        </a>
      </div>
      <div class="my_pic"></div>
    </div>
  </section>

  <!-- ----------------------------------last Section -->
  <section class="last_section">
    <div
      class="last d-flex flex-column flex-lg-row flex-md-row flex-sm-row justify-content-between align-items-start">
      <div class="left_last">
        <h1>Ask a Question</h1>
        <textarea placeholder="Ask Anything!!"></textarea>
        <button class="btn">Submit</button>
      </div>
      <div class="right_last" style="margin-left: 20px">
        <h1>Contact Us</h1>
        <p>123 Anywhere St. Any City ST 12345</p>
        <p>Tel: +123-456-7890</p>
        <p>hello@reallygreatsite.com</p>
        <button class="btn" onclick="window.location.href='contact_map.php'">
          Learn more <i class="fa-solid fa-arrow-right"></i>
        </button>
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