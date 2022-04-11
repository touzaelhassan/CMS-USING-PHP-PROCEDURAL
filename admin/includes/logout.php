<?php session_start(); ?>

<?php
$_SESSION['user_id'] = null;
$_SESSION['user_name'] = null;
$_SESSION['user_role'] = null;
header('location: ../../index.php')
?>