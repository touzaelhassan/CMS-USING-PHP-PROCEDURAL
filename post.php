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

    <div class="single__post__comments">
      <div class="comments__form">
        <h4 class="mb-4">Leave a comment</h4>
        <form action="" method="POST">
          <div class="form-group">
            <label>Author</label>
            <input type="text" class="form-control" name="comment_author">
          </div>
          <div class="form-group">
            <label>Email</label>
            <input type="email" class="form-control" name="comment_email">
          </div>
          <div class="form-group">
            <label>Comment</label>
            <textarea name="comment_content" class="form-control" cols="20" rows="6"></textarea>
          </div>
          <div class="form-group w-25">
            <input type="submit" class="btn btn-primary form-control" name="create_comment">
          </div>
        </form>
      </div>
      <div class="comments__content">
        Comments List
      </div>
    </div>
  </div>
  <aside class="sidebar">
    <?php include "./includes/sidebar.php"; ?>
  </aside>
</div>

<?php include './includes/footer.php' ?>

<?php include './includes/foot.php' ?>