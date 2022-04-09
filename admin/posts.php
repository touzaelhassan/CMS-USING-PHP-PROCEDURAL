  <?php include './includes/head.php' ?>

  <?php

  if (isset($_GET["source"])) {
    $source = $_GET["source"];
  } else {
    $source = "";
  }

  ?>

  <?php include './includes/header.php' ?>

  <div class="page">
    <aside class="sidebar">
      <?php include './includes/sidebar.php' ?>
    </aside>
    <div class="dashboard">
      <div class="dashboard__title">
        <h4>POSTS</h4>
      </div>
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