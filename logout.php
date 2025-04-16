<?php
session_start();
session_destroy();  // Destroy all session variables
header('Location: index.php');  // Redirect to homepage after logout
exit();
?>
