<?php include '../admin/includes/DBConnection.php'; ?>
<?php include '../admin/includes/functions.php'; ?>

<?php session_start(); ?>

<?php

if (isset($_POST['login'])) {
  $user_name = $_POST['user_name'];
  $user_password = $_POST['user_password'];

  $user_name = mysqli_real_escape_string($connection, $user_name);
  $user_password = mysqli_real_escape_string($connection, $user_password);

  $sql = "SELECT * FROM users WHERE user_name = '$user_name' AND user_password = '$user_password'";
  $query = mysqli_query($connection, $sql);
  $db_user = mysqli_fetch_assoc($query);

  if ($db_user) {

    $_SESSION['user_id'] = $db_user['user_id'];
    $_SESSION['user_name'] = $db_user['user_name'];
    $_SESSION['user_role'] = $db_user['user_role'];

    header("location: ../admin/index.php");
  } else {
    header("location: ../index.php");
  }
}

?>