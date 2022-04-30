<?php $categories = get_categories(); ?>

<header class="header">
  <div class="header__content">
    <div class="logo"><a class="logo__link" href="index.php">CMS</a></div>
    <nav class="navigation me-auto">
      <ul class="nav__list">
        <?php foreach ($categories as $category) : ?>
          <li class="nav__item">
            <a class="nav__link" href="category.php?category_id=<?php echo $category["category_id"]; ?>"><?php echo $category["category_title"] ?></a>
          </li>
        <?php endforeach; ?>
      </ul>
    </nav>
    <?php if (isset($_SESSION["user_role"])) : ?>
      <?php if (isset($_GET["post_id"])) : ?>
        <div><a href="./admin/posts.php?source=update_post&update=<?php echo $_GET["post_id"]; ?>">UPDATE POST</a></div>
      <?php endif ?>
    <?php endif ?>
    <?php if (!isset($_SESSION["user_name"])) : ?>
      <div class="signup-link"><a href="./signup.php">SIGN UP</a></div>
    <?php endif ?>
    <?php if (isset($_SESSION["user_name"])) : ?>
      <div class="logout"><a class="logout__link" href="./admin/includes/logout.php">LOGOUT</a></div>
      <div class="admin-name">
        <i class="fas fa-user"></i><span class="text-uppercase"><?php echo $_SESSION["user_name"]; ?></span>
      </div>
    <?php endif ?>
    <?php if (isset($_SESSION["user_role"]) && $_SESSION['user_role'] == 'admin') : ?>
      <div class="admin"><a href="./admin/index.php">DASHBOARD</a></div>
    <?php endif ?>
    <div class="contact-link"><a href="contact.php">CONTACT</a></div>
  </div>
</header>