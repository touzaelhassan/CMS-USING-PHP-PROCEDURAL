<?php
session_start();
include './includes/DBConnection.php';
include './includes/functions.php';
if (!isset($_SESSION['user_role']) || $_SESSION['user_role'] != 'admin')  header('location: ../index.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="./css/style.css">
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <title>CMS</title>
</head>

<body>