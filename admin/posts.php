  <?php include './includes/head.php' ?>

  <?php include './includes/header.php' ?>

  <div class="page">
    <aside class="sidebar">
      <?php include './includes/sidebar.php' ?>
    </aside>
    <div class="dashboard">
      <div class="dashboard__title">
        <h4>POSTS</h4>
      </div>
      <div class="dashboard__content">
        <table class="table table-bordered posts__table">
          <thead>
            <tr>
              <th>Post Id</th>
              <th>Author</th>
              <th>Title</th>
              <th>Category</th>
              <th>Image</th>
              <th>Tags</th>
              <th>Comments</th>
              <th>Status</th>
              <th>Date</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>1</td>
              <td>John Doe</td>
              <td>Learn HTML Basics</td>
              <td>HTML</td>
              <td>Image</td>
              <td>Web, mobile</td>
              <td>3</td>
              <td>published</td>
              <td>22-03-14</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <?php include './includes/footer.php' ?>

  <?php include './includes/foot.php' ?>