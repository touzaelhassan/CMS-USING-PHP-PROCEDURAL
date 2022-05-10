<?php

session_start();

include '../admin/includes/DBConnection.php';

include '../admin/includes/functions.php';


if (isset($_POST['login'])) {

  $user_name = $_POST['user_name'];
  $user_password = $_POST['user_password'];

  if (login($user_name, $user_password)) {
    header("location: ../admin/index.php");
  } else {
    header("location: ../index.php");
  }
};
