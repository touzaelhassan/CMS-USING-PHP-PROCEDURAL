  <?php $users = get_users(); ?>

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
      <?php foreach ($users as $post) : ?>
        <tr>
          <td><?php echo $user["user_id"]; ?></td>
          <td><?php echo $user["user_name"]; ?></td>
          <td><?php echo $user["user_email"]; ?></td>
          <td><?php echo $user["first_name"]; ?></td>
          <td><?php echo $user["last_name"]; ?></td>
          <td><?php echo $user["user_role"]; ?></td>
          <td><a href="users.php?delete=<?php echo $user["user_id"]; ?>" class="btn btn-danger btn-sm">DELETE</a></td>
          <td><a href="users.php?source=update_user&update=<?php echo $user["user_id"]; ?>" class="btn btn-primary btn-sm">UPDATE</a></td>
        </tr>
      <?php endforeach ?>
    </tbody>
  </table>