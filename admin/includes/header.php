<header class="header">
  <div class="header__content">
    <div class="logo me-auto"><a class="logo__link" href="../index.php">CMS</a></div>
    <div class="logout"><a class="logout__link" href="./includes/logout.php">LOGOUT</a></div>
    <div class="homepage"><a class="homepage__link" href="../index.php">HOMEPAGE</a></div>
    <?php if (isset($_SESSION["user_name"])) : ?>
      <div class="admin-name"><i class="fas fa-user"></i><span class="text-uppercase"><?php echo $_SESSION["user_name"]; ?></span></div>
    <?php endif ?>
  </div>
</header>