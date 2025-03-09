<?php
include 'db_connect.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $stmt = $conn->prepare("SELECT title, content FROM blogposts WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $blog = $result->fetch_assoc();
        echo $blog['title'];
        echo '<div class="blog-container">
    <h1>' . htmlspecialchars($blog['title']) . '</h1>
    <div class="blog-content">
    ' . $blog['content'] . '
    </div>
</div>

<script>
    document.querySelectorAll(".blog-content p").forEach(p => {
        if (p.textContent.trim().startsWith(\'"\')) {
            p.style.textAlign = "center";
            p.style.fontSize = "26px";
            p.style.fontWeight = "bold";
            p.style.color = "#7b3131";
            p.style.fontStyle = "italic";
            p.style.margin = "20px 40px";
        }
    });
</script>

<style>
    .blog-container h1 {
        text-align: left;
        font-family: "Oswald", sans-serif;
        text-transform: uppercase;
        font-weight: 500;
        margin-bottom: 20px;
        color: var(--my_red);
    }
    .blog-content h2 {
        color: var(--my_red);
        margin: 20px 0;
        text-align: left;
        font-weight: bold;
    }
    .blog-content {
        padding: 20px 50px;
        font-size: 20px;
        line-height: 1.6;
        text-align: left;
    }
    .blog-content img {
        max-width: 100%;
        height: auto;
        display: block;
        margin: 10px auto;
        border-radius: 10px;
    }
    .blog-content ul {
        text-align: left;
        padding-left: 50px;
        list-style-type: none;
    }
    .blog-content ul li::before {
        content: "➤";
        margin-right: 6px;
        color: var(--my_red);
        font-size: 20px;
        font-weight: bold;
    }
    .blog-content li {
        margin-bottom: 10px;
    }
</style>';
    } else {
        echo "<p>Blog not found.</p>";
    }

    $stmt->close();
    $conn->close();
} else {
    echo "<p>Invalid request.</p>";
}
