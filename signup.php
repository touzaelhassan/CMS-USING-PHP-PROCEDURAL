<?php include './includes/head.php' ?>

<?php

if (isset($_POST["signup"])) {

  $user_name = $_POST["user_name"];
  $user_password = $_POST["user_password"];
  $user_email = $_POST["user_email"];
  $first_name = $_POST["first_name"];
  $last_name = $_POST["last_name"];

  $user_name = mysqli_escape_string($connection, $user_name);
  $user_password = mysqli_escape_string($connection, $user_password);
  $user_email = mysqli_escape_string($connection, $user_email);
  $first_name = mysqli_escape_string($connection, $first_name);
  $last_name = mysqli_escape_string($connection, $last_name);

  $user_password = password_hash($user_password, PASSWORD_BCRYPT, array('cost' => 12));

  if (!empty($user_name) && !empty($user_password) && !empty($user_email) && !empty($first_name) && !empty($last_name)) {
    create_user($user_name, $user_password, $user_email, $first_name, $last_name);
    $signup_success_message = "Your account has been created successfully.";
  } else {
    $signup_error_message = "Some fields are empty, please fill them.";
  }
}

?>

<?php include './includes/header.php' ?>

<div class="page signup">
  <?php if (!isset($signup_success_message)) { ?>
    <form action="signup.php" method="POST" class="row g-3 signup__form">
      <?php if (isset($signup_error_message)) : ?>
        <p class="alert alert-danger text-center"><?php echo $signup_error_message; ?></p>
      <?php endif ?>
      <div class="col-md-6">
        <label class="form-label">Username</label>
        <input type="text" class="form-control" name="user_name">
      </div>
      <div class="col-md-6">
        <label class="form-label">Password</label>
        <input type="password" class="form-control" name="user_password">
      </div>
      <div class="col-md-12">
        <label class="form-label">Email</label>
        <input type="email" class="form-control" name="user_email">
      </div>
      <div class="col-md-6">
        <label class="form-label">First Name</label>
        <input type="text" class="form-control" name="first_name">
      </div>
      <div class="col-md-6">
        <label class="form-label">Last Name</label>
        <input type="text" class="form-control" name="last_name">
      </div>
      <div class="col-12">
        <button type="submit" class="btn btn-primary w-100" name="signup">SIGN UP</button>
      </div>
    </form>
  <?php } else { ?>
    <div class="alert alert-success p-5">
      <span><?php echo $signup_success_message ?></span>
      <a href="index.php" class="ms-2 text-primary fw-bold">LOGIN</a>
    </div>
  <?php } ?>
</div>

<?php include './includes/footer.php' ?>

<?php include './includes/foot.php' ?>