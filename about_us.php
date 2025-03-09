<?php
session_start();
$username = $_SESSION['username'] ?? null;
$profile_pic = $_SESSION['profile_pic'] ?? 'default.jpg'; // Default profile pic if none is set
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
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

<body class="p-0">
    <!-- ------------------------navbar -->
    <nav class="navbar navbar-expand-md navbar-dark fixed-top">
        <div class="container-fluid">
            <div class="logo">
                <img src="Pics/Logo2.png" width="200px" alt="Logo" />
            </div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
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


    <!--About us------------------------------------------------>
    <div class="container-fluid my-5 px-5">
        <div class="my_about">
            <!-- <div class="d-flex justify-content-center">
                <img src="Pics/dividing line.png" width="300px">
            </div>
            <h1 class="text-uppercase fw-bold">About us</h1>
            <div class="d-flex justify-content-center">
                <img src="Pics/dividing line.png" width="300px">
            </div>
            
            <div class="abt_name my-4">
                <p class="fs-4 fw-bold text-uppercase m-0"><b>Saiha Atiq</b></p>
                <p>Front-end Developer, Blogger, and Designer</p>
            </div>
            
            <div class="row">
                <div class="col-lg-6">
                    <p style="font-size: 20px;">Hi, I'm <b>Saiha Atiq</b>, an artist, web developer, and self-improvement enthusiast passionate about balancing Deen and dunya. My journey began after I didn't pass my MDCAT, a challenging time that impacted my confidence, communication, and relationships.</p>
                </div>
                <div class="col-lg-6">
                    <div class="about_img"></div>
                </div>
            </div>
            
            <div class="my-4">
                <p style="font-size: 20px;">During that period, I rediscovered my <b>artistic nature</b>, with painting becoming my outlet and a source of strength.</p>
            </div>
            
            <p class="quotation">"Every setback is a setup for a comeback—trust the process, align with your purpose, and watch yourself grow."</p>
            
            <div class="row align-items-center my-5">
                <div class="col-lg-6 order-lg-2">
                    <p style="font-size: 20px;">This creativity led me to <b>web development</b>, where I combined my love for art and technology to become a front-end developer. Along the way, I strengthened my connection to <b>Deen</b> and started a blog to guide others through life's challenges with faith and self-improvement. My goal is to inspire and help others thrive, no matter their starting point.</p>
                </div>
                <div class="col-lg-6 order-lg-1">
                    <div class="about_img2"></div>
                </div>
            </div> -->

            <!-- Chat gpt generated About---------------------------------------- -->
            <section class="about-section p-sm-0 p-0 p-lg-5">
                <h1 class="text-center">About Us</h1>

                <div class="team-member row d-flex align-items-center">
                    <div class="col-lg-6">
                        <div class="abt_name">
                            <p class="fs-4 fw-bold text-uppercase m-0"><b>Saiha Atiq</b></p>
                            <p>Front-end Developer, Blogger, and Designer</p>
                        </div>
                        <div class="content">
                            <p>Hi, I'm <b>Saiha Atiq</b>, an artist, web developer, and self-improvement enthusiast passionate about balancing Deen and dunya...</p>
                            <p class="quotation">"Every setback is a setup for a comeback—trust the process, align with your purpose, and watch yourself grow."</p>
                        </div>
                    </div>
                    <div class="about_img col-lg-6"></div>
                </div>

                <div class="team-member row d-flex align-items-center">
                    <div class="col-lg-6">
                        <div class="abt_name">
                            <p class="fs-4 fw-bold text-uppercase m-0"><b>Aleena Altaf</b></p>
                            <p>Front-end Developer, Coder, and Designer</p>
                        </div>
                        <div class="content">
                            <p>I am a passionate and creative explorer with a love for coding, design, and innovation...</p>
                            <p class="quotation">"Every challenge is a new canvas, and I am the artist."</p>
                        </div>
                    </div>
                    <div class="about_img col-lg-6"></div>
                </div>

                <div class="team-member row d-flex align-items-center">
                    <div class="col-lg-6">
                        <div class="abt_name">
                            <p class="fs-4 fw-bold text-uppercase m-0"><b>Khadija Mustafa</b></p>
                            <p>Content Creator & Writer</p>
                        </div>
                        <div class="content">
                            <p>Passionate about storytelling and crafting compelling content that inspires change...</p>
                            <p class="quotation">"Words have the power to shape worlds—use them wisely."</p>
                        </div>
                    </div>
                    <div class="about_img col-lg-6"></div>
                </div>

                <div class="team-member row d-flex align-items-center">
                    <div class="col-lg-6">
                        <div class="abt_name">
                            <p class="fs-4 fw-bold text-uppercase m-0"><b>Malaika Ashraf</b></p>
                            <p>Graphic Designer & Visual Artist</p>
                        </div>
                        <div class="content">
                            <p>Bringing ideas to life through creative visuals and meaningful designs...</p>
                            <p class="quotation">"Design is intelligence made visible."</p>
                        </div>
                    </div>
                    <div class="about_img col-lg-6"></div>
                </div>

                <div class="team-member row d-flex align-items-center">
                    <div class="col-lg-6">
                        <div class="abt_name">
                            <p class="fs-4 fw-bold text-uppercase m-0"><b>Zainab Khawaja</b></p>
                            <p>Marketing & Social Media Strategist</p>
                        </div>
                        <div class="content">
                            <p>Helping ideas reach the right audience with strategic content and social media management...</p>
                            <p class="quotation">"Marketing is no longer about the stuff you make, but the stories you tell."</p>
                        </div>
                    </div>
                    <div class="about_img col-lg-6"></div>
                </div>
            </section>
        </div>
    </div>

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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</body>

</html>