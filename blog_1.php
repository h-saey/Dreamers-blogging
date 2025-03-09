<?php
session_start();
include 'db_connect.php';

// Get user info
$username = $_SESSION['username'] ?? "Guest";
$profile_pic = $_SESSION['profile_pic'] ?? 'default.jpg';

// Get blog post data
$blog_id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$sql = "SELECT title, content, image, created_at FROM blogposts WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $blog_id);
$stmt->execute();
$result = $stmt->get_result();
$blog = $result->fetch_assoc();
$stmt->close();
$conn->close();

if (!$blog) {
  die("Post not found!");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>
    <?php echo htmlspecialchars($blog['title']); ?>
  </title>
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
    .blog-container {
      max-width: 90%;
      margin: 100px auto;
    }

    .blog-image {
      width: 100%;
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

          <?php if ($username && $username !== "Guest"): ?>
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

  <!--Blog Post --------------------------------------------->
  <div class="blog-container">
    <p class="post-time">Published on: <?php echo date("F j, Y, g:i a", strtotime($blog['created_at'])); ?></p>
    <h1 class="fs-5 fs-md-2 fs-lg-2"><?php echo $blog['title']; ?></h1>
    <div class="blog-content p-0 p-md-4 p-lg-4 fs-5"><?php echo $blog['content']; ?></div>

    <script>
      document.querySelectorAll("p").forEach(p => {
        if (p.textContent.trim().startsWith('"')) {
          p.style.textAlign = "center";
          p.style.fontSize = "26px";
          p.style.fontWeight = "bold";
          p.style.color = "#7b3131";
          p.style.fontStyle = "italic";
          p.style.margin = "20px 40px";
        }
      });
    </script>
    <a href="blog_posts.php" style="color:#7b3131">Back to Blog List</a>
  </div>

  <!-- comment section   -->

  <!-- Comment Section -->
  <div class="comment-section  m-4 p-3 rounded shadow-sm">
    <h2 class="mb-3">Leave a Comment:</h2>
    <form id="comment-form">
      <textarea id="comment-text" rows="3" placeholder="Write your comment..."></textarea>
      <button type="button" onclick="addComment()" class="btn btn-primary mt-2 w-100">Post Comment</button>
    </form>

    <div class="comments-list mt-4">
      <h6 class="pb-2" style="font-weight: 500; color: black; border-bottom: 3px solid #7b3131; text-transform: uppercase;">Comments:</h6>
      <ul id="comments-container" class="list-unstyled"></ul>
    </div>
  </div>

  <script>
    function addComment() {
      let commentText = document.getElementById("comment-text").value.trim();
      if (commentText === "") {
        alert("Please write a comment before posting.");
        return;
      }

      console.log("Sending comment:", commentText);

      fetch('add_comment.php', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
          },
          body: `blog_id=<?php echo $blog_id; ?>&comment=${encodeURIComponent(commentText)}`
        })
        .then(response => response.text())
        .then(data => {
          console.log("Server response:", data);
          if (data.includes("success")) {
            document.getElementById("comment-text").value = "";
            loadComments();
          } else {
            alert("Error adding comment: " + data);
          }
        })
        .catch(error => console.error("Error:", error));
    }

    function loadComments() {
      fetch('fetch_comments.php?blog_id=<?php echo $blog_id; ?>')
        .then(response => response.text())
        .then(data => {
          document.getElementById("comments-container").innerHTML = data;
        })
        .catch(error => console.error("Error:", error));
    }

    document.addEventListener("DOMContentLoaded", function() {
      loadComments();
    });
  </script>
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