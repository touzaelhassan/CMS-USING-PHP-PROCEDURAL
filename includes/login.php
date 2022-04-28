<?php

session_start();

include '../admin/includes/DBConnection.php';

include '../admin/includes/functions.php';


if (isset($_POST['login'])) {

  $user_name = $_POST['user_name'];
  $user_password = $_POST['user_password'];

  $user_name = escape($user_name);
  $user_password = escape($user_password);

  $db_user = get_user_by_user_name($user_name);

  if ($db_user != NULL) {
    $db_user_password = $db_user["user_password"];
  }

  if ($db_user != NULL && password_verify($user_password, $db_user_password)) {
    login($db_user);
    header("location: ../admin/index.php");
  } else {
    header("location: ../index.php");
  }
};
