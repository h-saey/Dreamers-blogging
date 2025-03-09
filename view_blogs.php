<?php
include 'db_connect.php';

$result = $conn->query("SELECT id, title, content FROM blogposts ORDER BY created_at DESC");

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<div style='padding:10px;  padding-bottom:20px 0;border-bottom: 1px solid white;'>";
        echo "<h4>" . htmlspecialchars($row['title']) . "</h4>";
        echo "<a style='color: white; text-decoration:none;
  border: none;
  background-color: white;
  border-radius: 20px;
  padding: 6px 10px;
  color: var(--my_red);
  font-size: 14px;
  font-weight: bold;' href='view_blog.php?id=" . $row['id'] . "'>🔍 View</a> ";
        echo "<a style='color: white; text-decoration:none;
  
  border: none;
  background-color: white;
  border-radius: 20px;
  padding: 6px 10px;
  color: var(--my_red);
  font-size: 14px;
  font-weight: bold;' href='delete_blog.php?id=" . $row['id'] . "' onclick='return confirm(\"Are you sure?\")'>🗑️ Delete</a>";
        echo "</div>";
    }
} else {
    echo "<p>No blogs found.</p>";
}
$conn->close();
