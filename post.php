<?php include './includes/head.php' ?>

<?php
if (isset($_GET["post_id"])) {
  $post_id = $_GET["post_id"];
  $post = get_post_by_id($post_id);
}
?>

<?php include './includes/header.php' ?>

<div class="page">
  <div class="single__post">
    <div class="single__post__content">
      <h2 class="post__title"><?php echo $post["post_title"]; ?></h2>
      <p class="post__author"><?php echo $post["post_author"]; ?></p>
      <p class="post__date"><?php echo $post["post_date"]; ?></p>
      <div class="post__image">
        <img src="./images/<?php echo $post["post_image"]; ?>">
      </div>
      <p class="post__content"><?php echo $post["post_content"]; ?></p>
      <a href="#" class="post__link">READ MORE</a>
    </div>
    <div class="single__post__comments text-center">
      POST COMMENTS
    </div>
  </div>
  <aside class="sidebar">
    <?php include "./includes/sidebar.php"; ?>
  </aside>
</div>

<?php include './includes/footer.php' ?>

<?php include './includes/foot.php' ?>