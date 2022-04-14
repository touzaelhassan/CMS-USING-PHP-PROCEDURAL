<?php


if (isset($_GET["update"])) {
  $post_id = $_GET["update"];
  $post =  get_post_by_id($post_id);
}

if (isset($_POST["update_post"])) {

  $category_id = $_POST["category_id"];
  $post_author = $_POST["post_author"];
  $post_title = $_POST["post_title"];
  $post_content = $_POST["post_content"];

  $post_image = $_FILES["image"]["name"];
  $post_image_temp = $_FILES["image"]["tmp_name"];

  $post_tags = $_POST["post_tags"];
  $post_status = $_POST["post_status"];
  $post_comments = 4;
  $post_date = date("d-m-y");

  move_uploaded_file($post_image_temp, "../images/$post_image");

  update_post($post_id, $category_id, $post_author, $post_title, $post_content, $post_image, $post_tags, $post_status, $post_date);

  header("location: posts.php");
}

?>

<?php $categories = get_categories(); ?>

<h4 class="posts__title pb-3">UPDATE POST</h4>
<div class="posts__content">
  <form action="" method="POST" class="post__form" enctype="multipart/form-data">
    <div class="form-group">
      <label>Post Author</label>
      <input type="text" class="form-control" value="<?php echo $post["post_author"] ?>" name="post_author">
    </div>
    <div class="form-group">
      <label>Category</label>
      <select name="category_id" class="form-control" value="<?php echo $post["category_id"] ?>">
        <?php foreach ($categories as $category) : ?>
          <option value="<?php echo $category["category_id"] ?>"><?php echo $category["category_title"] ?></option>
        <?php endforeach ?>
      </select>
    </div>
    <div class="form-group">
      <label>Post Title</label>
      <input type="text" class="form-control" value="<?php echo $post["post_title"] ?>" name="post_title">
    </div>
    <div class="form-group">
      <label>Post Image</label>
      <input type="file" class="form-control" value="<?php echo $post["post_image"] ?>" name="image">
    </div>
    <div class="form-group">
      <label>Post Tags</label>
      <input type="text" class="form-control" value="<?php echo $post["post_tags"] ?>" name="post_tags">
    </div>
    <!-- <div class="form-group">
      <label>Post Status</label>
      <input type="text" class="form-control" value="<?php echo $post["post_status"] ?>" name="post_status">
    </div> -->
    <div class="form-group">
      <select name="post_status" class="form-control">
        <option value="<?php echo $post["post_status"] ?>"><?php echo $post["post_status"] ?></option>
        <?php if ($post["post_status"] == "published") { ?>
          <option value="draft">draft</option>
        <?php } else { ?>
          <option value="published">published</option>
        <?php } ?>
      </select>
    </div>
    <div class="form-group">
      <label>Post Content</label>
      <textarea class="form-control" cols="20" rows="10" name="post_content"><?php echo $post["post_content"] ?></textarea>
    </div>
    <div class="form-group  w-100">
      <input type="submit" value="PUBLISH" class="btn btn-primary" name="update_post">
    </div>
  </form>
</div>