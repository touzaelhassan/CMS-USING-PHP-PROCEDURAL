  <?php include './includes/head.php' ?>
  <?php if (!isset($_SESSION['user_role']) || $_SESSION['user_role'] != 'admin') header('location: ./index.php'); ?>
  <?php $users_online_number = get_users_online(); ?>

  <?php $comments = get_comments(); ?>

  <?php

  if (isset($_GET["approve"])) {
    $comment_id = $_GET["approve"];
    approve_comment($comment_id);
    header("location: comments.php");
  }

  if (isset($_GET["unapprove"])) {
    $comment_id = $_GET["unapprove"];
    unapprove_comment($comment_id);
    header("location: comments.php");
  }

  ?>

  <?php

  if (isset($_GET["delete"])) {

    $comment_id = $_GET["delete"];
    delete_comment($comment_id);
    header("location: comments.php");
  }

  ?>

  <?php include './includes/header.php' ?>

  <div class="page">
    <aside class="sidebar">
      <?php include './includes/sidebar.php' ?>
    </aside>
    <div class="dashboard">
      <div class="dashboard__title">
        <h4>COMMENTS</h4>
      </div>
      <div class="dashboard__content">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>Id</th>
              <th>Author</th>
              <th>Email</th>
              <th>Comment</th>
              <th>Post</th>
              <th>Status</th>
              <th>Date</th>
              <th>Approve</th>
              <th>Unapprove</th>
              <th>Delete</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($comments as $comment) : ?>
              <?php $post = get_post_by_id($comment["post_id"]); ?>
              <tr>
                <td><?php echo $comment["comment_id"] ?></td>
                <td><?php echo $comment["comment_author"] ?></td>
                <td><?php echo $comment["comment_email"] ?></td>
                <td><?php echo $comment["comment_content"] ?></td>
                <td><a href="../post.php?post_id=<?php echo $post["post_id"] ?>"><?php echo $post["post_title"] ?></a></td>
                <td><?php echo $comment["comment_status"] ?></td>
                <td><?php echo $comment["comment_date"] ?></td>
                <td><a href="comments.php?approve=<?php echo $comment["comment_id"] ?>" class="btn btn-success btn-sm">Approve</a></td>
                <td><a href="comments.php?unapprove=<?php echo $comment["comment_id"] ?>" class="btn btn-warning btn-sm">Unapprove</a></td>
                <td><a href="comments.php?delete=<?php echo $comment["comment_id"] ?>" class="btn btn-danger btn-sm">Delete</a></td>
              </tr>
            <?php endforeach ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <?php include './includes/footer.php' ?>

  <?php include './includes/foot.php' ?>