<?php
session_start();
include 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $blog_id = isset($_POST['blog_id']) ? intval($_POST['blog_id']) : 0;
    $comment = isset($_POST['comment']) ? trim($_POST['comment']) : '';

    if (empty($comment) || $blog_id == 0) {
        echo "Error: Comment cannot be empty or invalid post ID!";
        exit;
    }

    $username = $_SESSION['username'] ?? "Guest";

    $stmt = $conn->prepare("INSERT INTO comments (blog_id, username, comment) VALUES (?, ?, ?)");
    if (!$stmt) {
        echo "Error preparing statement: " . $conn->error;
        exit;
    }

    $stmt->bind_param("iss", $blog_id, $username, $comment);
    if ($stmt->execute()) {
        echo "success";
    } else {
        echo "Database error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
