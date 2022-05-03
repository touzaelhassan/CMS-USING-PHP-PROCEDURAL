<?php include './includes/head.php' ?>

<?php

if (isset($_POST["signup"])) {

  $user_name = trim($_POST["user_name"]);
  $user_password = trim($_POST["user_password"]);
  $user_email = trim($_POST["user_email"]);
  $first_name = trim($_POST["first_name"]);
  $last_name = trim($_POST["last_name"]);

  $errors = [
    'user_name' => '',
    'user_password' => '',
    'user_email' => '',
    'first_name' => '',
    'last_name' => '',
  ];

  if (empty($user_name)) {
    $errors['user_name'] = 'Username can not be empty';
  } else if (strlen($user_name) < 4) {
    $errors['user_name'] = 'Username must be more than 3 characters';
  } else if (user_name_exists($user_name)) {
    $errors['user_name'] = 'Username already exists';
  }

  if (empty($user_email)) {
    $errors['user_email'] = 'Email can not be empty';
  } else if (!filter_var($user_email, FILTER_VALIDATE_EMAIL)) {
    $errors['user_email'] = 'Please enter a valid email address !';
  } else if (user_email_exists($user_email)) {
    $errors['user_email'] = 'Email already exists';
  }

  if (empty($user_password)) {
    $errors['user_password'] = 'Password can not be empty';
  } else if (strlen($user_password) < 6) {
    $errors['user_password'] = 'Password must be more than 6 charactres';
  }



  echo "<pre>";
  print_r($errors);
  echo "</pre>";

  exit();
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
      <div class="col-12 mt-5">
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