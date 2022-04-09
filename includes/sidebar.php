<?php $categories = get_categories(); ?>

<div class="sidebar__content">
  <div class="sidebar__search">
    <form action="./search.php" method="POST" class="search__form">
      <input type="text" class="search__input" name="keyword">
      <input type="submit" class="search__btn" value="SEARCH" name="search">
    </form>
  </div>
  <div class="sidebar__login">LOGIN</div>
  <div class="sidebar__categories">
    <ul class="categories__list">
      <?php foreach ($categories as $category) : ?>
        <li class="categories__item">
          <a href="category.php?category_id=<?php echo $category["category_id"]; ?>" class="categories__link"><?php echo $category["category_title"]; ?></a>
        </li>
      <?php endforeach ?>
    </ul>
  </div>
  <div class="sidebar__recent-posts">RECENT POSTS</div>
</div>