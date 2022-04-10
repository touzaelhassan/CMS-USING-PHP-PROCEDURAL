<?php

if (isset($_POST["create_user"])) {

  $user_name = $_POST["user_name"];
  $user_password = $_POST["user_password"];
  $first_name = $_POST["first_name"];
  $last_name = $_POST["last_name"];
  $user_email = $_POST["user_email"];
  $user_role = $_POST["user_role"];

  create_user($user_name, $user_password, $user_email, $first_name, $last_name, $user_role);
  header("location: users.php");
}

?>
<h4 class="users__title">Add User</h4>
<div class="users__content">
  <form action="" method="POST" class="user__form" enctype="multipart/form-data">
    <div class="form-group">
      <label>Username</label>
      <input type="text" class="form-control user__input" name="user_name">
    </div>
    <div class="form-group">
      <label>Password</label>
      <input type="password" class="form-control user__input" name="user_password">
    </div>
    <div class="form-group">
      <label>Email</label>
      <input type="email" class="form-control user__input" name="user_email">
    </div>
    <div class="form-group">
      <label>Firstname</label>
      <input type="text" class="form-control user__input" name="first_name">
    </div>
    <div class="form-group">
      <label>Lastname</label>
      <input type="text" class="form-control user__input" name="last_name">
    </div>
    <div class="form-group">
      <select name="user_role">
        <option value="subscriber">Select Role</option>
        <option value="admin">Admin</option>
        <option value="subscriber">Subscriber</option>
      </select>
    </div>
    <input type="submit" class="btn btn-primary px-4 user__btn" name="create_user" value="ADD USER">
  </form>
</div>