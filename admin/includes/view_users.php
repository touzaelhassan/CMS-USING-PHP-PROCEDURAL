  <?php $users = get_users(); ?>

  <?php

  if (isset($_GET["delete"])) {
    $user_id = $_GET["delete"];
    delete_user($user_id);
    header("location: users.php");
  }

  if (isset($_GET["admin"])) {
    $user_id = $_GET["admin"];
    user_to_admin($user_id);
  }

  if (isset($_GET["subscriber"])) {
    $user_id = $_GET["subscriber"];
    user_to_subscriber($user_id);
  }


  ?>

  <table class="table table-bordered ">
    <thead>
      <tr>
        <th>Id</th>
        <th>Username</th>
        <th>Email</th>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Role</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($users as $user) : ?>
        <tr>
          <td><?php echo $user["user_id"]; ?></td>
          <td><?php echo $user["user_name"]; ?></td>
          <td><?php echo $user["user_email"]; ?></td>
          <td><?php echo $user["first_name"]; ?></td>
          <td><?php echo $user["last_name"]; ?></td>
          <td><?php echo $user["user_role"]; ?></td>
          <td><a href="users.php?admin=<?php echo $user["user_id"]; ?>" class="btn btn-success btn-sm">ADMIN</a></td>
          <td><a href="users.php?subscriber=<?php echo $user["user_id"]; ?>" class="btn btn-secondary btn-sm">SUBSCRIBER</a></td>
          <td><a href="users.php?source=update_user&update=<?php echo $user["user_id"]; ?>" class="btn btn-primary btn-sm">UPDATE</a></td>
          <td><a href="users.php?delete=<?php echo $user["user_id"]; ?>" class="btn btn-danger btn-sm">DELETE</a></td>
        </tr>
      <?php endforeach ?>
    </tbody>
  </table>