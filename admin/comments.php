  <?php include './includes/head.php' ?>

  <?php $comments = get_comments(); ?>

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
              <th></th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($comments as $comment) : ?>
              <tr>
                <td><?php echo $comment["comment_id"] ?></td>
                <td><?php echo $comment["comment_author"] ?></td>
                <td><?php echo $comment["comment_email"] ?></td>
                <td><?php echo $comment["comment_content"] ?></td>
                <td>Post Title</td>
                <td><?php echo $comment["comment_status"] ?></td>
                <td><?php echo $comment["comment_date"] ?></td>
                <td><a href="#" class="btn btn-success btn-sm">Approve</a></td>
                <td><a href="#" class="btn btn-warning btn-sm">Unapprove</a></td>
                <td><a href="#" class="btn btn-danger btn-sm">Delete</a></td>
              </tr>
            <?php endforeach ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <?php include './includes/footer.php' ?>

  <?php include './includes/foot.php' ?>