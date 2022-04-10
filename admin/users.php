  <?php include './includes/head.php' ?>

  <?php

  if (isset($_GET["source"])) {
    $source = $_GET["source"];
  } else {
    $source = "";
  }

  ?>

  <?php

  if (isset($_GET["delete"])) {
    $user_id = $_GET["delete"];
    delete_user($user_id);
    header("location: users.php");
  }

  if (isset($_GET["admin"])) {
    $user_id = $_GET["admin"];
    user_to_admin($user_id);
  }

  if (isset($_GET["subscriber"])) {
    $user_id = $_GET["subscriber"];
    user_to_subscriber($user_id);
  }


  ?>

  <?php include './includes/header.php' ?>

  <div class="page">
    <aside class="sidebar">
      <?php include './includes/sidebar.php' ?>
    </aside>
    <div class="dashboard">
      <div class="dashboard__title">
        <h4>USERS</h4>
      </div>
      <div class="dashboard__content">

        <?php

        switch ($source) {
          case 'create_user':
            include './includes/create_user.php';
            break;
          case 'update_user':
            include './includes/update_user.php';
            break;
          default:
            include './includes/view_users.php';
            break;
        }

        ?>

      </div>
    </div>
  </div>

  <?php include './includes/footer.php' ?>

  <?php include './includes/foot.php' ?>