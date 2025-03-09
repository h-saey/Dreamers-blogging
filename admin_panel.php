<?php
session_start();
// Check if admin is logged in (you should replace this with your actual authentication system)
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: login.php");
    exit();
}

include 'db_connect.php'; // Include database connection file
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
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
        .accordion-content {
            padding: 30px;
        }

        h3 {
            text-transform: uppercase;
            font-weight: bold;
            font-family: "oswald", sans-serif;
        }
    </style>

</head>

<body class="text-light d-flex">
    <!-- Sidebar -->
    <div class="sidebar">
        <button onclick="showSection('blogs')" id="blogs_btn"><i class="fa-solid fa-file"></i> Manage Blogs</button>
        <button onclick="showSection('users')" id="users_btn"><i class="fa-solid fa-user"></i> View Users</button>
        <button onclick="showSection('messages')" id="messages_btn"><i class="fa-solid fa-message"></i> View Contact Messages</button>
        <form action="logout.php" method="POST">
            <button type="submit" class="logout-btn">Logout</button>
        </form>
    </div>

    <!-- Main Content -->
    <div class="admin content">
        <h1>Admin Panel</h1>

        <!-- Blog Management -->
        <div id="blogs" class="section active">
            <h3>Blog Management</h3>
            <button onclick="toggleAccordion('add_blog_section')">➕ Add Blog</button>
            <div id="add_blog_section" class="accordion-content">
                <?php include 'add_blog.php'; ?>
            </div>

            <button onclick="toggleAccordion('view_blogs_section')">📃 View Blogs</button>
            <div id="view_blogs_section" class="accordion-content">
                <?php include 'view_blogs.php'; ?>
            </div>
        </div>

        <!-- User Management -->
        <div id="users" class="section">
            <h3>View Users</h3>
            <?php include 'view_users.php'; ?>
        </div>

        <!-- Contact Messages -->
        <div id="messages" class="section">
            <h3>View Contact Messages</h3>
            <?php include 'view_messages.php'; ?>
        </div>
    </div>

    <script>
        function showSection(sectionId) {
            document.querySelectorAll('.section').forEach(sec => sec.classList.remove('active'));
            document.getElementById(sectionId).classList.add('active');

            document.querySelectorAll('.sidebar button').forEach(btn => btn.classList.remove('active'));
            document.getElementById(sectionId + '_btn').classList.add('active');
        }

        function toggleAccordion(id) {
            let section = document.getElementById(id);
            section.style.display = section.style.display === "block" ? "none" : "block";
        }
    </script>



</body>

</html>