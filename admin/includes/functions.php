<!-- Start Categories Functions -->
<?php

function create_category($category_title)
{
  global $connection;
  $sql = "INSERT INTO categories (category_title) VALUES ('$category_title')";
  mysqli_query($connection, $sql);
}

function get_categories()
{
  global $connection;
  $sql = "SELECT * FROM categories";
  $query = mysqli_query($connection, $sql);
  return mysqli_fetch_all($query, MYSQLI_ASSOC);
}

function get_category_by_id($category_id)
{
  global $connection;
  $sql = "SELECT * FROM categories WHERE category_id = $category_id";
  $query = mysqli_query($connection, $sql);
  return mysqli_fetch_assoc($query);
}

function update_category($category_id, $category_title)
{
  global $connection;
  $sql = "UPDATE categories SET category_title = '$category_title' WHERE category_id = $category_id";
  mysqli_query($connection, $sql);
}

function delete_category($category_id)
{
  global $connection;
  $sql = "DELETE FROM categories WHERE category_id = $category_id";
  mysqli_query($connection, $sql);
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