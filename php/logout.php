<?php
session_start();
session_destroy();
header("Location: /site-v2-crud/pages/login.php");
exit();
?>
