<?php include './includes/head.php' ?>

<?php if (!isset($_SESSION['user_role']) || $_SESSION['user_role'] != 'admin')  header('location: ../index.php'); ?>

<?php

$user_online_session = session_id();
$user_online_time = time();
$user_online_time_out_in_seconds = 30;
$user_online_time_out = $user_online_time - $user_online_time_out_in_seconds;

$sql = "SELECT * FROM users_online WHERE user_online_session = '$user_online_session'";
$query = mysqli_query($connection, $sql);
$user_online = mysqli_num_rows($query);

if ($user_online == 0) {
  $sql = "INSERT INTO users_online (user_online_session, user_online_time) VALUES ('$user_online_session','$user_online_time')";
  mysqli_query($connection, $sql);
}

?>

<?php $users = get_users(); ?>
<?php $categories = get_categories(); ?>
<?php $posts = get_posts(); ?>
<?php $comments = get_comments(); ?>

<?php include './includes/header.php' ?>

<div class="page">
  <aside class="sidebar">
    <?php include './includes/sidebar.php' ?>
  </aside>
  <div class="dashboard">
    <div class="dashboard__title">
      <h4>ADMIN DASHBOARD | <span><?php if (isset($_SESSION['user_name'])) echo $_SESSION['user_name']; ?></span></h4>
    </div>
    <div class="dashboard__content">
      <div class="widgets__content">
        <div class="widget__item">
          <div class="widget__header">
            <div class="widget__icon">
              WIDGET ICON
            </div>
            <div class="widget__stats">
              <h3><?php echo count($users) ?></h3>
              <p>Users</p>
            </div>
          </div>
          <div class="widget__footer">
            <a href="users.php">View Details</a>
          </div>
        </div>
        <div class="widget__item">
          <div class="widget__header">
            <div class="widget__icon">
              WIDGET ICON
            </div>
            <div class="widget__stats">
              <h3><?php echo count($categories) ?></h3>
              <p>Categories</p>
            </div>
          </div>
          <div class="widget__footer">
            <a href="categories.php">View Details</a>
          </div>
        </div>
        <div class="widget__item">
          <div class="widget__header">
            <div class="widget__icon">
              WIDGET ICON
            </div>
            <div class="widget__stats">
              <h3><?php echo count($posts) ?></h3>
              <p>Posts</p>
            </div>
          </div>
          <div class="widget__footer">
            <a href="posts.php">View Details</a>
          </div>
        </div>
        <div class="widget__item">
          <div class="widget__header">
            <div class="widget__icon">
              WIDGET ICON
            </div>
            <div class="widget__stats">
              <h3><?php echo count($comments) ?></h3>
              <p>Comments</p>
            </div>
          </div>
          <div class="widget__footer">
            <a href="comments.php">View Details</a>
          </div>
        </div>
      </div>
      <div class="dashboard__charts">
        <script type="text/javascript">
          google.charts.load('current', {
            'packages': ['bar']
          });
          google.charts.setOnLoadCallback(drawChart);

          function drawChart() {
            var data = google.visualization.arrayToDataTable([
              ['Data', 'count'],

              <?php
              $element_text = ['Users', 'Categories', 'Posts', 'Comments'];
              $element_count = [count($users), count($categories), count($posts), count($comments)];
              for ($i = 0; $i < 4; $i++) {
                echo "['$element_text[$i]'" . "," . "$element_count[$i]],";
              }
              ?>

            ]);

            var options = {
              chart: {
                title: '',
                subtitle: '',
              }
            };

            var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

            chart.draw(data, google.charts.Bar.convertOptions(options));
          }
        </script>
        <div class="charts__content" id="columnchart_material" style="width: 'auto'; height: 500px;"></div>
      </div>
    </div>
  </div>
</div>

<?php include './includes/footer.php' ?>

<?php include './includes/foot.php' ?>