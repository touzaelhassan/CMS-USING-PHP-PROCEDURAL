<?php include './includes/head.php' ?>

<?php

if (isset($_GET["post_id"])) {
  $post_id = $_GET["post_id"];
  if ($_SERVER["REQUEST_METHOD"] !== 'POST') {
    update_post_views($post_id);
  }
}

?>


<?php $post = get_post_by_id($post_id); ?>

<?php $comments = get_comments_by_post_id($post_id); ?>

<?php
if (isset($_POST["create_comment"])) {
  $comment_author = $_POST["comment_author"];
  $comment_email = $_POST["comment_email"];
  $comment_content = $_POST["comment_content"];

  if (!empty($comment_author) && !empty($comment_email) && !empty($comment_content)) {
    create_comment($post_id, $comment_author, $comment_email, $comment_content);
  }
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
            <label>Your comment</label>
            <textarea name="comment_content" class="form-control" cols="20" rows="6"></textarea>
          </div>
          <div class="form-group w-25">
            <input type="submit" class="btn btn-primary form-control" name="create_comment">
          </div>
        </form>
      </div>
      <div class="comments__content">
        <?php foreach ($comments as $comment) : ?>
          <div class="comment">
            <h5 class="comment__author"><?php echo $comment["comment_author"] ?></h5>
            <p class="comment__date"><?php echo $comment["comment_date"] ?></p>
            <p class="comment__content"><?php echo $comment["comment_content"] ?></p>
          </div>
        <?php endforeach ?>
      </div>
    </div>
  </div>
  <aside class="sidebar">
    <?php include "./includes/sidebar.php"; ?>
  </aside>
</div>

<?php include './includes/footer.php' ?>

<?php include './includes/foot.php' ?>