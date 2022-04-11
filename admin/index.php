<?php include './includes/head.php' ?>

<?php

if (!isset($_SESSION['user_role']) || $_SESSION['user_role'] != 'admin') {
  header('location: ../index.php');
}

?>

<?php include './includes/header.php' ?>

<div class="page">
  <aside class="sidebar">
    <?php include './includes/sidebar.php' ?>
  </aside>
  <div class="dashboard">
    <div class="dashboard__title">
      <h4>ADMIN DASHBOARD | <span><?php if (isset($_SESSION['user_name'])) echo $_SESSION['user_name']; ?></span></h4>
    </div>
    <div class="dashboard__content">
    </div>
  </div>
</div>

<?php include './includes/footer.php' ?>

<?php include './includes/foot.php' ?>