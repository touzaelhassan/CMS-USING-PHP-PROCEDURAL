<h4 class="users__title">Add User</h4>
<div class="users__content">
  <form action="" method="POST" class="user__form" enctype="multipart/form-data">
    <div class="form-group col-5">
      <label>Username</label>
      <input type="text" class="form-control user__input" name="user_name">
    </div>
    <div class="form-group col-5">
      <label>Password</label>
      <input type="password" class="form-control user__input" name="user_password">
    </div>
    <div class="form-group col-11">
      <label>Email</label>
      <input type="email" class="form-control user__input" name="user_email">
    </div>
    <div class="form-group col-5">
      <label>Firstname</label>
      <input type="text" class="form-control user__input" name="first_name">
    </div>
    <div class="form-group col-5">
      <label>Lastname</label>
      <input type="text" class="form-control user__input" name="last_name">
    </div>
    <div class="form-group col-5">
      <label>User Role</label>
      <select name="user_role" class="form-control">
        <option value="subscriber"></option>
        <option value="admin">Admin</option>
        <option value="subscriber">Subscriber</option>
      </select>
    </div>
    <div class="form-group col-12">
      <input type="submit" class="btn btn-primary px-4 user__btn" name="create_user" value="ADD USER">
    </div>
  </form>
</div>