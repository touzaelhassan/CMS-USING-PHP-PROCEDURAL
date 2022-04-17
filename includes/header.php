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
    <?php if (isset($_SESSION['user_id'])) : ?>
      <div class="logout"><a class="logout__link" href="./admin/includes/logout.php">LOGOUT</a></div>
    <?php endif ?>
    <div class="admin"><a href="./admin/index.php">DASHBOARD</a></div>
  </div>
</header>