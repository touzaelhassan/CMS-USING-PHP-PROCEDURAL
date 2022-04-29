<?php include './includes/head.php' ?>

<?php if (isset($_GET["category_id"])) $category_id = $_GET["category_id"]; ?>

<?php $posts = get_posts_by_category_id($category_id); ?>

<?php

if (isset($_GET["page"])) {
  $page = $_GET["page"];
  $start_from = ($page - 1) * 4;
} else {
  $start_from = 0;
}

$posts_number = count(get_posts());
$posts_number_per_page = 4;
$page_number = ceil($posts_number / $posts_number_per_page);

$posts_of_this_page = get_posts_by_pagination($start_from, $posts_number_per_page);

?>

<?php include './includes/header.php' ?>

<div class="page">
  <div class="posts">
    <div class="posts__content">
      <?php foreach ($posts_of_this_page as $post) : ?>

        <?php
        $post_category_id = $post["category_id"];
        $post_category = get_category_by_id($post_category_id);
        $category_title = $post_category["category_title"];
        ?>

        <?php if ($post["post_status"] == "published") : ?>
          <div class="posts__post">
            <div class="post__image">
              <a href="post.php?post_id=<?php echo $post["post_id"] ?>">
                <img src="./images/<?php echo $post["post_image"]; ?>">
              </a>
            </div>
            <div class="post__info">

              <div class="info__header">
                <div class="info__author">
                  <div class="author__image"></div>
                  <a href="./author_posts.php?author=<?php echo $post['post_author']; ?>&post_id=<?php echo $post['post_id']; ?>" class="post__author"><?php echo $post["post_author"]; ?></a>
                </div>
                <a href="category.php?category_id=<?php echo $category["category_id"]; ?>" class="post__category">#<?php echo $category_title; ?></a>
              </div>

              <h2 class="post__title"><a href="post.php?post_id=<?php echo $post["post_id"] ?>"><?php echo $post["post_title"]; ?></a></h2>

              <p class="post__content"><?php echo substr($post["post_content"], 0, 300); ?> ...</p>

              <div class="info__footer">
                <a href="post.php?post_id=<?php echo $post["post_id"] ?>" class="post__link">READ MORE</a>
                <p class="post__date"><?php echo $post["post_date"]; ?></p>
              </div>

            </div>
          </div>
        <?php endif ?>
      <?php endforeach ?>
    </div>
    <div class="posts__pagination">
      <nav class="pagination__nav">
        <ul class="pagination pagination-lg">
          <?php for ($i = 1; $i <= $page_number; $i++) : ?>
            <?php if (isset($_GET["page"])) { ?>
              <?php if ($i == $page) { ?>
                <li class="page-item active">
                  <a class="page-link" href="index.php?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                </li>
              <?php } else { ?>
                <li class="page-item">
                  <a class="page-link" href="index.php?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                </li>
              <?php } ?>
            <?php } else { ?>
              <?php if ($i == 1) { ?>
                <li class="page-item active">
                  <a class="page-link" href="index.php?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                </li>
              <?php } else { ?>
                <li class="page-item">
                  <a class="page-link" href="index.php?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                </li>
              <?php } ?>
            <?php } ?>
          <?php endfor ?>
        </ul>
      </nav>
    </div>
  </div>
  <aside class="sidebar">
    <?php include "./includes/sidebar.php"; ?>
  </aside>
</div>

<?php include './includes/footer.php' ?>

<?php include './includes/foot.php' ?>