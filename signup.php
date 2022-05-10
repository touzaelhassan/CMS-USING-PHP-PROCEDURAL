<?php include './includes/head.php' ?>

<?php

if (isset($_POST["signup"])) {

  $user_name = trim($_POST["user_name"]);
  $user_password = trim($_POST["user_password"]);
  $user_email = trim($_POST["user_email"]);
  $first_name = trim($_POST["first_name"]);
  $last_name = trim($_POST["last_name"]);

  $errors = [];

  if (empty($user_name)) {
    $errors['user_name'] = 'Username can not be empty';
  } else if (strlen($user_name) < 4) {
    $errors['user_name'] = 'Username must be more than 3 characters';
  } else if (user_name_exists($user_name)) {
    $errors['user_name'] = 'Username already exists';
  }

  if (empty($user_password)) {
    $errors['user_password'] = 'Password can not be empty';
  } else if (strlen($user_password) < 6) {
    $errors['user_password'] = 'Password must be more than 6 charactres';
  }

  if (empty($user_email)) {
    $errors['user_email'] = 'Email can not be empty';
  } else if (!filter_var($user_email, FILTER_VALIDATE_EMAIL)) {
    $errors['user_email'] = 'Please enter a valid email address !';
  } else if (user_email_exists($user_email)) {
    $errors['user_email'] = 'Email already exists';
  }

  if (count($errors) === 0) {
    if (signup($user_name, $user_password, $user_email, $first_name, $last_name)) {
      if (login($user_name, $user_password)) {
        header("location: ./admin/index.php");
      } else {
        header("location: ../index.php");
      }
    } else {
      header('location: ./signup.php');
    }
  }
}

?>

<?php include './includes/header.php' ?>

<div class="page signup">
  <form action="signup.php" method="POST" class="row g-3 signup__form">

    <div class="col-md-6">
      <label class="form-label">Username</label>
      <input type="text" class="form-control" value="<?php echo isset($user_name) ? $user_name : ''; ?>" name="user_name">
      <div><?php echo isset($errors['user_name']) ? $errors['user_name'] : ''; ?></div>
    </div>
    <div class="col-md-6">
      <label class="form-label">Password</label>
      <input type="password" class="form-control" name="user_password">
      <div><?php echo isset($errors['user_password']) ? $errors['user_password'] : ''; ?></div>
    </div>
    <div class="col-md-12">
      <label class="form-label">Email</label>
      <input type="email" class="form-control" value="<?php echo isset($user_email) ? $user_email : ''; ?>" name="user_email">
      <div><?php echo isset($errors['user_email']) ? $errors['user_email'] : ''; ?></div>
    </div>
    <div class="col-md-6">
      <label class="form-label">First Name</label>
      <input type="text" class="form-control" value="<?php echo isset($first_name) ? $first_name : ''; ?>" name="first_name">
    </div>
    <div class="col-md-6">
      <label class="form-label">Last Name</label>
      <input type="text" class="form-control" value="<?php echo isset($last_name) ? $last_name : ''; ?>" name="last_name">
    </div>
    <div class="col-12 mt-5">
      <button type="submit" class="btn btn-primary w-100" name="signup">SIGN UP</button>
    </div>
  </form>

</div>

<?php include './includes/footer.php' ?>

<?php include './includes/foot.php' ?>