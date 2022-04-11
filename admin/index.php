<?php include './includes/head.php' ?>

<?php

if (!isset($_SESSION['user_role']) || $_SESSION['user_role'] != 'admin') {
  header('location: ../index.php');
}

?>

<?php
$users_number = count(get_users());
$categories_number = count(get_categories());
$posts_number = count(get_posts());
$comments_number = count(get_comments());
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
      <div class="widgets__content">
        <div class="widget__item">
          <div class="widget__header">
            <div class="widget__icon">
              WIDGET ICON
            </div>
            <div class="widget__stats">
              <h3><?php echo $users_number ?></h3>
              <p>Users</p>
            </div>
          </div>
          <div class="widget__footer">
            <span>View Details</span>
            <span>--></span>
          </div>
        </div>
        <div class="widget__item">
          <div class="widget__header">
            <div class="widget__icon">
              WIDGET ICON
            </div>
            <div class="widget__stats">
              <h3><?php echo $categories_number ?></h3>
              <p>Categories</p>
            </div>
          </div>
          <div class="widget__footer">
            <span>View Details</span>
            <span>--></span>
          </div>
        </div>
        <div class="widget__item">
          <div class="widget__header">
            <div class="widget__icon">
              WIDGET ICON
            </div>
            <div class="widget__stats">
              <h3><?php echo $posts_number ?></h3>
              <p>Posts</p>
            </div>
          </div>
          <div class="widget__footer">
            <span>View Details</span>
            <span>--></span>
          </div>
        </div>
        <div class="widget__item">
          <div class="widget__header">
            <div class="widget__icon">
              WIDGET ICON
            </div>
            <div class="widget__stats">
              <h3><?php echo $comments_number ?></h3>
              <p>Comments</p>
            </div>
          </div>
          <div class="widget__footer">
            <span>View Details</span>
            <span>--></span>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php include './includes/footer.php' ?>

<?php include './includes/foot.php' ?>