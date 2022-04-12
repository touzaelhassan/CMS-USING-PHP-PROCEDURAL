<h2 class="users__title">Update User</h2>
<div class="users__content">
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
    <input type="submit" class="btn btn-primary px-4 w-50" name="update_user" value="UPDATE USER">
  </form>
</div>