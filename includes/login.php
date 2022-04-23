<?php include '../admin/includes/DBConnection.php'; ?>
<?php include '../admin/includes/functions.php'; ?>

<?php session_start(); ?>

<?php

if (isset($_POST['login'])) {

  $user_name = $_POST['user_name'];
  $user_password = $_POST['user_password'];

  $user_name = mysqli_real_escape_string($connection, $user_name);
  $user_password = mysqli_real_escape_string($connection, $user_password);

  $db_user = get_user_by_user_name($user_name);
  $db_user_password = $db_user["user_password"];

  if ($db_user != NULL && password_verify($user_password, $db_user_password)) {

    echo "Correct Password";
    login($db_user);
    header("location: ../admin/index.php");
  } else {
    header("location: ../index.php");
  }
}

?>