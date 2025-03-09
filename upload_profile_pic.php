<?php
session_start();
include 'db_connect.php'; // Ensure this file connects to your database

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: log_in.php");
    exit();
}

$user_id = $_SESSION['user_id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['profile_pic'])) {
    $upload_dir = "uploads/"; // Ensure this folder exists
    $file = $_FILES['profile_pic'];
    $file_name = basename($file['name']);
    $file_tmp = $file['tmp_name'];
    $file_size = $file['size'];
    $file_type = mime_content_type($file_tmp);

    // Allowed image types
    $allowed_types = ['image/jpeg', 'image/png', 'image/gif'];

    // Validate file type and size
    if (!in_array($file_type, $allowed_types)) {
        die("Invalid file type. Only JPG, PNG, and GIF are allowed.");
    }
    if ($file_size > 2 * 1024 * 1024) { // 2MB limit
        die("File is too large. Max size is 2MB.");
    }

    // Generate a unique filename to prevent overwriting
    $new_file_name = "profile_" . $user_id . "_" . time() . "." . pathinfo($file_name, PATHINFO_EXTENSION);
    $file_path = $upload_dir . $new_file_name;

    // Move the uploaded file
    if (move_uploaded_file($file_tmp, $file_path)) {
        // Update profile picture in the database
        $sql = "UPDATE users SET profile_pic = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("si", $new_file_name, $user_id);

        if ($stmt->execute()) {
            $_SESSION['profile_pic'] = $file_path; // Update session variable
            header("Location: dashboard.php"); // Redirect to dashboard
            exit();
        } else {
            echo "Error updating profile picture.";
        }
        $stmt->close();
    } else {
        echo "File upload failed.";
    }
} else {
    echo "No file uploaded.";
}
?>
