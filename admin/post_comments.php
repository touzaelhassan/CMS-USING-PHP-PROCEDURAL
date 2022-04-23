  <?php include './includes/head.php' ?>

  <?php $users_online_number = get_users_online(); ?>

  <?php

  if (isset($_GET["post_id"])) {
    $post_id = $_GET["post_id"];
    $comments = get_comments_by_post_id($post_id);
  }

  ?>


  <?php

  if (isset($_GET["approve"])) {

    $post_id = $_GET["post_id"];
    $comment_id = $_GET["approve"];

    approve_comment($comment_id);
    $comments = get_comments_by_post_id($post_id);
    header("location: post_comments.php?post_id=$post_id");
  }

  if (isset($_GET["unapprove"])) {

    $post_id = $_GET["post_id"];
    $comment_id = $_GET["unapprove"];

    unapprove_comment($comment_id);
    $comments = get_comments_by_post_id($post_id);

    header("location: post_comments.php?post_id=$post_id");
  }

  ?>

  <?php

  if (isset($_GET["delete"])) {

    $post_id = $_GET["post_id"];
    $comment_id = $_GET["delete"];

    delete_comment($comment_id);

    header("location: post_comments.php?post_id=$post_id");
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
                <td>
                  <a href="post_comments.php?post_id=<?php echo $post_id ?>&approve=<?php echo $comment["comment_id"] ?>" class="btn btn-success btn-sm">
                    Approve
                  </a>
                </td>
                <td>
                  <a href="post_comments.php?post_id=<?php echo $post_id ?>&unapprove=<?php echo $comment["comment_id"] ?>" class="btn btn-success btn-sm">
                    Unapprove
                  </a>
                </td>
                <td>
                  <a href="post_comments.php?post_id=<?php echo $post_id ?>&delete=<?php echo $comment['comment_id'] ?>" class="btn btn-danger btn-sm">
                    Delete
                  </a>
                </td>
              </tr>
            <?php endforeach ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <?php include './includes/footer.php' ?>

  <?php include './includes/foot.php' ?>