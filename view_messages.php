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

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_message'])) {
    $message_id = intval($_POST['message_id']);

    $stmt = $conn->prepare("DELETE FROM contactmessages WHERE id = ?");
    $stmt->bind_param("i", $message_id);
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

// ✅ Fetch all messages
$result = $conn->query("SELECT id, username, email, message, created_at FROM contactmessages ORDER BY created_at DESC");

// ✅ Display Messages
?>
<div id="messages-container">
    <table border="1" cellpadding="10" cellspacing="0" style="width:100%; text-align:center;">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Message</th>
            <th>Received At</th>
            <th>Action</th>
        </tr>

        <?php while ($row = $result->fetch_assoc()): ?>
            <tr id="msg-<?= $row['id']; ?>">
                <td><?= $row['id']; ?></td>
                <td><?= htmlspecialchars($row['username']); ?></td>
                <td><?= htmlspecialchars($row['email']); ?></td>
                <td style="text-align:left; padding:10px;"><?= nl2br(htmlspecialchars($row['message'])); ?></td>
                <td><?= $row['created_at']; ?></td>
                <td>
                    <button onclick="deleteMessage(<?= $row['id']; ?>)" style="color:white; background:red; border:none; border-radius:5px; padding:5px 10px; cursor:pointer;">Delete</button>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>
</div>

<script>
    function deleteMessage(id) {
        if (confirm("Are you sure you want to delete this message?")) {
            fetch("view_messages.php", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/x-www-form-urlencoded"
                    },
                    body: "delete_message=1&message_id=" + id
                })
                .then(response => response.text())
                .then(data => {
                    if (data.trim() === "success") {
                        document.getElementById("msg-" + id).remove();
                    } else {
                        alert("Error deleting message.");
                    }
                });
        }
    }
</script>