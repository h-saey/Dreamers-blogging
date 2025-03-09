<?php
include 'db_connect.php';

$blog_id = isset($_GET['blog_id']) ? intval($_GET['blog_id']) : 0;

$sql = "SELECT username, comment, created_at FROM comments WHERE blog_id = ? ORDER BY created_at DESC";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $blog_id);
$stmt->execute();
$result = $stmt->get_result();

$output = "";
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $output .= '<li><strong>' . htmlspecialchars($row["username"]) . ':</strong> ' 
                . htmlspecialchars($row["comment"]) 
                . ' <br><small>' . $row["created_at"] . '</small></li>';
    }
} else {
    $output .= "<li>No comments yet.</li>";
}

echo $output;

$stmt->close();
$conn->close();
?>
