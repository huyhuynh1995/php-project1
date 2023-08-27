<?php
session_start();
unset($_SESSION['admin']);
unset($_SESSION['ketoan']);
header('Location: index.php');
?>