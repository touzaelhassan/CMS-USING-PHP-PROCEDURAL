<?php include '../admin/includes/DBConnection.php'; ?>
<?php include '../admin/includes/functions.php'; ?>

<?php

if (isset($_POST['login'])) {
  $user_name = $_POST['user_name'];
  $user_password = $_POST['user_password'];
}

?>