  <?php include './includes/head.php' ?>

  <?php
  if (isset($_GET["source"])) {
    $source = $_GET["source"];
  } else {
    $source = "";
  }
  ?>

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
    $post_date = date("d-m-y");

    move_uploaded_file($post_image_temp, "../images/$post_image");
    create_post($category_id, $post_author, $post_title, $post_content, $post_image, $post_tags, $post_status);
    header("location: posts.php");
  }
  ?>

  <?php
  if (isset($_GET["update"])) {
    $post_id = $_GET["update"];
    $post =  get_post_by_id($post_id);
  }
  ?>

  <?php
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

    $success_update_message = true;
  }
  ?>

  <?php
  if (isset($_GET["delete"])) {
    $post_id = $_GET["delete"];
    delete_post($post_id);
    header("location: posts.php");
  }
  ?>

  <?php $categories = get_categories(); ?>


  <?php include './includes/header.php' ?>

  <div class="page">
    <aside class="sidebar">
      <?php include './includes/sidebar.php' ?>
    </aside>
    <div class="dashboard">
      <div class="dashboard__title">
        <h4>POSTS</h4>
      </div>
      <?php if (isset($success_update_message)) : ?>
        <p class="alert alert-success">Post updated successfully. <a href="../post.php?post_id=<?php echo $post_id; ?>" class="text-primary">view post</a> Or <a href="posts.php" class="text-primary">update more post</a></p>
      <?php endif ?>
      <div class="dashboard__content">

        <?php

        switch ($source) {
          case 'create_post':
            include './includes/create_post.php';
            break;
          case 'update_post':
            include './includes/update_post.php';
            break;
          default:
            include './includes/view_posts.php';
            break;
        }

        ?>

      </div>
    </div>
  </div>

  <?php include './includes/footer.php' ?>

  <?php include './includes/foot.php' ?>