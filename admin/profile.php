  <?php include './includes/head.php' ?>

  <?php

  if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    $user = get_user_by_id($user_id);
  }

  ?>
  <?php

  if (isset($_POST["update_profile"])) {

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
        <h4>PROFILE</h4>
      </div>
      <div class="dashboard__content">

        <form action="" method="POST" class="user__form w-50" enctype="multipart/form-data">
          <div class="form-group">
            <label>Firstname</label>
            <input type="text" class="form-control" value="<?php echo $user["first_name"]; ?>" name="first_name">
          </div>
          <div class="form-group">
            <label>Lastname</label>
            <input type="text" class="form-control" value="<?php echo $user["last_name"]; ?>" name="last_name">
          </div>
          <div class="form-group">
            <label>Username</label>
            <input type="text" class="form-control" value="<?php echo $user["user_name"]; ?>" name="user_name">
          </div>

          <div class="form-group">
            <label>Email</label>
            <input type="email" class="form-control" value="<?php echo $user["user_email"]; ?>" name="user_email">
          </div>
          <div class="form-group">
            <label>Password</label>
            <input type="password" class="form-control" name="user_password">
          </div>
          <div class="form-group">
            <select name="user_role">
              <option value="<?php echo $user["user_role"]; ?>"><?php echo $user["user_role"]; ?></option>
              <?php if ($user["user_role"] === "admin") { ?>
                <option value="subscriber">subscriber</option>
              <?php } else { ?>
                <option value="admin">admin</option>
              <?php } ?>
            </select>
          </div>
          <input type="submit" class="btn btn-primary px-4 w-50" name="update_profile" value="UPDATE PROFILE">
        </form>

      </div>
    </div>
  </div>

  <?php include './includes/footer.php' ?>

  <?php include './includes/foot.php' ?>