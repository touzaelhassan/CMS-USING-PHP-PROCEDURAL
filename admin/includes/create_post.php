<?php

if (isset($_POST["create_post"])) {

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

  create_post($category_id, $post_author, $post_title, $post_content, $post_image, $post_tags, $post_status, $post_date);
}

?>

<?php $categories = get_categories(); ?>

<h2 class="posts__title">Add Post</h2>
<div class="posts__content">
  <form action="" method="POST" class="post__form" enctype="multipart/form-data">
    <div class="form-group">
      <label>Post Author</label>
      <input type="text" class="form-control" name="post_author">
    </div>
    <div class="form-group">
      <label>Category</label>
      <select name="category_id" class="form-control" id="post_category">
        <?php foreach ($categories as $category) : ?>
          <option value="<?php echo $category["category_id"] ?>"><?php echo $category["category_title"] ?></option>
        <?php endforeach ?>
      </select>
    </div>
    <div class="form-group">
      <label>Post Title</label>
      <input type="text" class="form-control" name="post_title">
    </div>
    <div class="form-group">
      <label>Post Content</label>
      <textarea name="post_content" class="form-control" id="" cols="30" rows="10"></textarea>
    </div>
    <div class="form-group">
      <label>Post Image</label>
      <input type="file" class="form-control" name="image">
    </div>
    <div class="form-group">
      <label>Post Tags</label>
      <input type="text" class="form-control" name="post_tags">
    </div>
    <div class="form-group">
      <label>Post Status</label>
      <input type="text" class="form-control" name="post_status">
    </div>
    <div class="form-group  w-100">
      <input type="submit" value="PUBLISH" class="btn btn-primary" name="create_post">
    </div>
  </form>
</div>