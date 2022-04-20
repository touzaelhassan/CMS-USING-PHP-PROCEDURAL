<?php include './includes/head.php' ?>

<?php $posts = get_posts(); ?>

<?php include './includes/header.php' ?>

<div class="page">
  <div class="posts">
    <div class="posts__content">
      <?php foreach ($posts as $post) : ?>
        <?php if ($post["post_status"] == "published") : ?>
          <div class="post">
            <h2 class="post__title"><a href="post.php?post_id=<?php echo $post["post_id"] ?>"><?php echo $post["post_title"]; ?></a></h2>
            <a href="./author_posts.php?author=<?php echo $post['post_author']; ?>&post_id=<?php echo $post['post_id']; ?>" class="post__author"><?php echo $post["post_author"]; ?></a>
            <p class="post__date"><?php echo $post["post_date"]; ?></p>
            <div class="post__image">
              <a href="post.php?post_id=<?php echo $post["post_id"] ?>">
                <img src="./images/<?php echo $post["post_image"]; ?>">
              </a>
            </div>
            <p class="post__content"><?php echo substr($post["post_content"], 0, 300); ?></p>
            <a href="post.php?post_id=<?php echo $post["post_id"] ?>" class="post__link">READ MORE</a>
          </div>
        <?php endif ?>
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