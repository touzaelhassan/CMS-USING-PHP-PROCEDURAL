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

function create_post($category_id, $post_author, $post_title, $post_content, $post_image, $post_tags, $post_status)
{
  global $connection;

  $sql = "INSERT INTO posts(category_id, post_author, post_title, post_content, post_image, post_tags, post_status, post_date) VALUES ('$category_id','$post_author','$post_title','$post_content','$post_image','$post_tags','$post_status',now())";

  mysqli_query($connection, $sql);
}

function get_posts()
{
  global $connection;
  $sql = "SELECT * FROM posts";
  $query = mysqli_query($connection, $sql);
  return mysqli_fetch_all($query, MYSQLI_ASSOC);
}

function get_post_by_id($post_id)
{
  global $connection;
  $sql = "SELECT * FROM posts WHERE post_id = $post_id";
  $query = mysqli_query($connection, $sql);
  return mysqli_fetch_assoc($query);
}

function get_posts_by_category_id($category_id)
{
  global $connection;
  $sql = "SELECT * FROM posts WHERE category_id = $category_id";
  $query = mysqli_query($connection, $sql);
  return mysqli_fetch_all($query, MYSQLI_ASSOC);
}

function
update_post($post_id, $category_id, $post_author, $post_title, $post_content, $post_image, $post_tags, $post_status)
{
  global $connection;

  $sql = "UPDATE posts SET category_id='$category_id', post_author='$post_author', post_title ='$post_title',post_content='$post_content',post_image = '$post_image',post_tags='$post_tags', post_status='$post_status', post_date= now() WHERE post_id = $post_id ";

  mysqli_query($connection, $sql);
}


function delete_post($post_id)
{
  global $connection;
  $sql = "DELETE FROM posts WHERE post_id = $post_id";
  mysqli_query($connection, $sql);
}

?>
<!-- End Posts Functions -->

<!-- Start Comments Functions -->
<?php

function create_comment($post_id, $comment_author, $comment_email, $comment_content,)
{
  global $connection;

  $sql = "INSERT INTO comments (post_id, comment_author, comment_email, comment_content, comment_status,comment_date) VALUES ($post_id, '$comment_author', '$comment_email', '$comment_content', 'unapproved', now())";

  mysqli_query($connection, $sql);
}

function get_comments()
{
  global $connection;
  $sql = "SELECT * FROM comments";
  $query = mysqli_query($connection, $sql);
  return mysqli_fetch_all($query, MYSQLI_ASSOC);
}

function get_comments_by_post_id($post_id)
{
  global $connection;
  $sql = "SELECT * FROM comments WHERE post_id = $post_id AND comment_status = 'approved' ORDER BY comment_id DESC";
  $query = mysqli_query($connection, $sql);
  return mysqli_fetch_all($query, MYSQLI_ASSOC);
}

function approve_comment($comment_id)
{
  global $connection;
  $sql = "UPDATE comments SET comment_status = 'approved' WHERE comment_id = $comment_id ";
  mysqli_query($connection, $sql);
}

function unapprove_comment($comment_id)
{
  global $connection;
  $sql = "UPDATE comments SET comment_status = 'unapproved' WHERE comment_id = $comment_id ";
  mysqli_query($connection, $sql);
}

function delete_comment($comment_id)
{

  global $connection;
  $sql = "DELETE FROM comments WHERE comment_id = $comment_id";
  mysqli_query($connection, $sql);
}

?>
<!-- End Comments Functions -->

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