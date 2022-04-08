<!-- Start Categories Functions -->
<?php

function get_categories()
{
  global $connection;
  $sql = "SELECT * FROM categories";
  $query = mysqli_query($connection, $sql);
  return mysqli_fetch_all($query, MYSQLI_ASSOC);
}

?>
<!-- End Categories Functions -->

<!-- Start Posts Functions -->
<?php

function get_posts()
{
  global $connection;
  $sql = "SELECT * FROM posts";
  $query = mysqli_query($connection, $sql);
  return mysqli_fetch_all($query, MYSQLI_ASSOC);
}

?>
<!-- End Posts Functions -->

<!-- Start Search Function -->
<?php

function search($keyword)
{
  global $connection;
  $sql = "SELECT * FROM posts WHERE post_tags LIKE '%$keyword%'";
  $query = mysqli_query($connection, $sql);
  return mysqli_fetch_all($query, MYSQLI_ASSOC);
}

?>
<!-- End Search Function -->