<?php include './includes/head.php';
if (!isset($_SESSION['user_role']) || $_SESSION['user_role'] != 'admin')  header('location: ./index.php');
$users_online_number = get_users_online();

if (isset($_GET["source"])) {
  $source = $_GET["source"];
} else {
  $source = "";
}

if (isset($_POST["create_user"])) {

  $user_name = $_POST["user_name"];
  $user_password = $_POST["user_password"];
  $user_email = $_POST["user_email"];
  $first_name = $_POST["first_name"];
  $last_name = $_POST["last_name"];
  $user_role = $_POST["user_role"];

  $user_name = mysqli_escape_string($connection, $user_name);
  $user_password = mysqli_escape_string($connection, $user_password);
  $user_email = mysqli_escape_string($connection, $user_email);
  $first_name = mysqli_escape_string($connection, $first_name);
  $last_name = mysqli_escape_string($connection, $last_name);
  $user_role = mysqli_escape_string($connection, $user_role);

  $user_password = password_hash($user_password, PASSWORD_BCRYPT, array('cost' => 10));

  $query = create_user($user_name, $user_password, $user_email, $first_name, $last_name, $user_role);
}

if (isset($_GET["update"])) {
  $user_id = $_GET["update"];
  $user = get_user_by_id($user_id);
}

if (isset($_POST["update_user"])) {

  $user_name = $_POST["user_name"];
  $user_password = $_POST["user_password"];
  $user_email = $_POST["user_email"];
  $first_name = $_POST["first_name"];
  $last_name = $_POST["last_name"];
  $user_role = $_POST["user_role"];

  $user_name = mysqli_escape_string($connection, $user_name);
  $user_password = mysqli_escape_string($connection, $user_password);
  $user_email = mysqli_escape_string($connection, $user_email);
  $first_name = mysqli_escape_string($connection, $first_name);
  $last_name = mysqli_escape_string($connection, $last_name);
  $user_role = mysqli_escape_string($connection, $user_role);

  $user_password = password_hash($user_password, PASSWORD_BCRYPT, array('cost' => 10));

  update_user($user_id, $user_name, $user_password, $user_email, $first_name, $last_name, $user_role);

  header("location: users.php");
}

include './includes/header.php'

?>

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

<?php include './includes/footer.php'; ?>

<?php include './includes/foot.php'; ?>