  <?php include './includes/head.php' ?>

  <?php

  if (isset($_GET["source"])) {
    $source = $_GET["source"];
  } else {
    $source = "";
  }

  ?>

  <?php

  if (isset($_POST["create_user"])) {
    $user_name = $_POST["user_name"];
    $user_password = $_POST["user_password"];
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $user_email = $_POST["user_email"];
    $user_role = $_POST["user_role"];
    $query = create_user($user_name, $user_password, $user_email, $first_name, $last_name, $user_role);
  }

  ?>

  <?php

  if (isset($_GET["update"])) {
    $user_id = $_GET["update"];
    $user = get_user_by_id($user_id);
  }

  if (isset($_POST["update_user"])) {
    $user_name = $_POST["user_name"];
    $user_password = $_POST["user_password"];
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $user_email = $_POST["user_email"];
    $user_role = $_POST["user_role"];
    update_user($user_id, $user_name, $user_password, $user_email, $first_name, $last_name, $user_role);
    header("location: users.php");
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
      <?php if (isset($query) && $query) : ?>
        <div class="alert alert-success text-center py-0 user-notification">
          <span>User created successfully.</span>
          <a href="users.php">View users</a>
          <span class="close-notification">X</span>
        </div>
      <?php endif ?>
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