<?php include './includes/head.php' ?>

<?php

if (isset($_POST["submit"])) {

  $to = "touzaelhassan@gmail.com";
  $user_email = $_POST["user_email"];
  $subject = $_POST["subject"];
  $body = $_POST["body"];

  echo "<pre>";
  print_r($_POST);
  echo "</pre>";
}

?>

<?php include './includes/header.php' ?>

<div class="page signup">
  <?php if (!isset($signup_success_message)) { ?>
    <form action="" method="POST" class="row g-3 signup__form">
      <?php if (isset($signup_error_message)) : ?>
        <p class="alert alert-danger text-center"><?php echo $signup_error_message; ?></p>
      <?php endif ?>
      <div class="col-md-12">
        <label class="form-label">Email</label>
        <input type="email" class="form-control" name="user_email">
      </div>
      <div class="col-md-12">
        <label class="form-label">Subject</label>
        <input type="text" class="form-control" name="subject">
      </div>
      <div class="col-md-12">
        <label class="form-label">Message </label>
        <textarea name="body" class="form-control" cols="30" rows="6"></textarea>
      </div>
      <div class="col-12 mt-5 text-center">
        <button type="submit" class="btn btn-primary w-25" name="submit">SUBMIT</button>
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