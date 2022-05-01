<?php $categories = get_categories(); ?>

<?php $posts = get_posts(); ?>



<div class="sidebar__content">
  <div class="sidebar__search">
    <form action="./search.php" method="POST" class="search__form">
      <input type="text" class="search__input" name="keyword" placeholder="Search">
      <input type="submit" class="search__btn" value="SEARCH" name="search">
    </form>
  </div>

  <?php if (!isset($_SESSION["user_id"])) : ?>
    <div class="sidebar__login">
      <form action="includes/login.php" method="POST" class="login__form">
        <div class="form-group">
          <input type="text" class="form-control form__input" name="user_name" placeholder="Username">
        </div>
        <div class="form-group">
          <input type="password" class="form-control form__input" name="user_password" placeholder="Password">
        </div>
        <div class="form-group">
          <input type="submit" class="form-control btn  form__btn" value="LOGIN" name="login">
        </div>
      </form>
    </div>
  <?php endif ?>

  <div class="sidebar__categories">
    <ul class="categories__list">
      <?php foreach ($categories as $category) : ?>
        <li class="categories__item">
          <a href="category.php?category_id=<?php echo $category["category_id"]; ?>" class="categories__link"><?php echo $category["category_title"]; ?></a>
        </li>
      <?php endforeach ?>
    </ul>
  </div>

  <div class="sidebar__recent-posts">
    <?php foreach ($posts as $post) : ?>
      <div class="recent-post">
        <img src="./images/<?php echo $post['post_image'] ?>" class="recent-post__image">
      </div>
    <?php endforeach ?>
  </div>
</div>