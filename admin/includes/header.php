<header class="header">
  <div class="header__content">
    <div class="logo me-auto"><a class="logo__link" href="../index.php">CMS</a></div>
    <div><span>Users Online : </span><span><?php echo $users_online_number; ?></span></div>
    <div class="logout"><a class="logout__link" href="./includes/logout.php">LOGOUT</a></div>
    <?php if (isset($_SESSION["user_name"])) : ?>
      <div class="admin-name"><i class="fas fa-user"></i><span class="text-uppercase"><?php echo $_SESSION["user_name"]; ?></span></div>
    <?php endif ?>
    <div class="homepage"><a class="homepage__link" href="../index.php">HOMEPAGE</a></div>
  </div>
</header>