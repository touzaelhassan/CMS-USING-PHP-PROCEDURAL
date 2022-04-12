<?php $categories = get_categories(); ?>

<header class="header">
  <div class="header__content">
    <div class="logo"><a class="logo__link" href="index.php">CMS</a></div>
    <nav class="navigation">
      <ul class="nav__list">
        <?php foreach ($categories as $category) : ?>
          <li class="nav__item">
            <a class="nav__link" href="category.php?category_id=<?php echo $category["category_id"]; ?>"><?php echo $category["category_title"] ?></a>
          </li>
        <?php endforeach; ?>
      </ul>
    </nav>
    <div class="admin ms-auto"><a href="./admin/index.php">DASHBOARD</a></div>
    <?php if (isset($_SESSION['user_id'])) : ?>
      <div class="logout"><a class="logout__link" href="./admin/includes/logout.php">LOGOUT</a></div>
    <?php endif ?>
  </div>
</header>