<?php
include 'db_connect.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $stmt = $conn->prepare("DELETE FROM blogposts WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "<script>alert('Blog deleted successfully'); window.location.href='admin_panel.php';</script>";
    } else {
        echo "<script>alert('Error deleting blog'); window.location.href='admin_panel.php';</script>";
    }

    $stmt->close();
    $conn->close();
}
