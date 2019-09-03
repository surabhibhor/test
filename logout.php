<?php
session_start();
unset($_SESSION['pid']);
session_destroy();
header('location:admin.php');//rediect to index page after logout
exit();
?>