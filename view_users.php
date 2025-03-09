<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include 'db_connect.php';

// ✅ Check if the admin is logged in
if (!isset($_SESSION['user_id']) || $_SESSION['username'] !== 'Saiha_Atiq1') {
    echo "<p style='color:red;'>Access Denied.</p>";
    exit();
}

// ✅ Handle user deletion
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_user'])) {
    $user_id = intval($_POST['user_id']);

    // Prevent deleting the admin
    $stmt = $conn->prepare("DELETE FROM users WHERE id = ? AND username != 'Saiha_Atiq1'");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        echo "success"; // ✅ Return success for AJAX
    } else {
        echo "error";
    }
    $stmt->close();
    $conn->close();
    exit();
}

// ✅ Fetch users except admin
$result = $conn->query("SELECT id, username, email FROM users WHERE username != 'Saiha_Atiq1' ORDER BY id ASC");

// ✅ Display Users
?>
<div id="users-container">
    <table border="1" cellpadding="10" cellspacing="0" style="width:100%; text-align:center;">
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Email</th>
            <th>Action</th>
        </tr>

        <?php while ($row = $result->fetch_assoc()): ?>
            <tr id="user-<?= $row['id']; ?>">
                <td><?= $row['id']; ?></td>
                <td><?= htmlspecialchars($row['username']); ?></td>
                <td><?= htmlspecialchars($row['email']); ?></td>
                <td>
                    <button onclick="deleteUser(<?= $row['id']; ?>)" style="color:white; background:red; border:none; border-radius:5px; padding:5px 10px;margin:3px; cursor:pointer;">Delete</button>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>
</div>

<script>
    function deleteUser(id) {
        if (confirm("Are you sure you want to delete this user?")) {
            fetch("view_users.php", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/x-www-form-urlencoded"
                    },
                    body: "delete_user=1&user_id=" + id
                })
                .then(response => response.text())
                .then(data => {
                    if (data.trim() === "success") {
                        document.getElementById("user-" + id).remove();
                    } else {
                        alert("Error deleting user.");
                    }
                });
        }
    }
</script>