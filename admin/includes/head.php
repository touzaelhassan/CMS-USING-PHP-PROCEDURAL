<?php session_start(); ?>
<?php include './includes/DBConnection.php'; ?>
<?php include './includes/functions.php'; ?>


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

  <?php if (!isset($_SESSION['user_role']) || $_SESSION['user_role'] != 'admin') : ?>

    <section class="forbidden__section">
      <div class="forbidden__links">
        <a href="../../index.php">HOME</a>
      </div>
    </section>

    <?php exit(); ?>
  <?php endif; ?>