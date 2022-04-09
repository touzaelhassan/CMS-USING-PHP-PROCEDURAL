<?php include './includes/head.php' ?>

<?php $posts = get_posts(); ?>

<?php include './includes/header.php' ?>

<div class="page">
  <div class="posts">
    <div class="posts__content">
      <?php foreach ($posts as $post) : ?>
        <div class="post">
          <h2 class="post__title"><a href="post.php?post_id=<?php echo $post["post_id"] ?>"><?php echo $post["post_title"]; ?></a></h2>
          <p class="post__author"><?php echo $post["post_author"]; ?></p>
          <p class="post__date"><?php echo $post["post_date"]; ?></p>
          <div class="post__image">
            <img src="./images/<?php echo $post["post_image"]; ?>">
          </div>
          <p class="post__content"><?php echo $post["post_content"]; ?></p>
          <a href="#" class="post__link">READ MORE</a>
        </div>
      <?php endforeach ?>
    </div>
    <div class="posts__pagination">
      PAGINATION
    </div>
  </div>
  <aside class="sidebar">
    <?php include "./includes/sidebar.php"; ?>
  </aside>
</div>

<?php include './includes/footer.php' ?>

<?php include './includes/foot.php' ?>