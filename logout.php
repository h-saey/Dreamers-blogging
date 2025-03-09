<?php
session_start();
session_unset();
session_destroy();
setcookie(session_name(), '', time() - 3600, '/'); // Delete session cookie
header("Location: log_in.php"); // Redirect to login page
exit();
?>
