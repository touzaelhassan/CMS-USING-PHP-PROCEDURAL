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

  create_user($user_name, $user_password, $user_email, $first_name, $last_name);
}

?>

<?php include './includes/header.php' ?>

<div class="page signup">
  <form action="signup.php" method="POST" class="row g-3 signup__form">
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
</div>

<?php include './includes/footer.php' ?>

<?php include './includes/foot.php' ?>