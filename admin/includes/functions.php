<?php

// Start Users Functions

function create_user($user_name, $user_password, $user_email, $first_name, $last_name, $user_role = "subscriber")
{
  global $connection;
  $sql = "INSERT INTO users (user_name, user_password, user_email, first_name, last_name, user_role) VALUES ('$user_name', '$user_password', '$user_email', '$first_name', '$last_name', '$user_role' )";
  return mysqli_query($connection, $sql);
}

function get_users()
{
  global $connection;
  $sql = "SELECT * FROM users";
  $query = mysqli_query($connection, $sql);
  return mysqli_fetch_all($query, MYSQLI_ASSOC);
}

function get_user_by_id($user_id)
{
  global $connection;
  $sql = "SELECT * FROM users WHERE user_id = $user_id";
  $query = mysqli_query($connection, $sql);
  return mysqli_fetch_assoc($query);
}

function get_user_by_user_name($user_name)
{
  global $connection;
  $sql = "SELECT * FROM users WHERE user_name = '$user_name'";
  $query = mysqli_query($connection, $sql);
  return mysqli_fetch_assoc($query);
}

function update_user($user_id, $user_name, $user_password, $user_email, $first_name, $last_name, $user_role)
{
  global $connection;
  $sql = "UPDATE users SET  user_name = '$user_name', user_password ='$user_password',user_email = '$user_email', first_name = '$first_name', last_name = '$last_name', user_role = '$user_role' WHERE user_id = $user_id";
  mysqli_query($connection, $sql);
}

function user_to_admin($user_id)
{

  global $connection;
  $sql = "UPDATE users SET user_role = 'admin' WHERE user_id = $user_id";
  mysqli_query($connection, $sql);
}

function user_to_subscriber($user_id)
{
  global $connection;
  $sql = "UPDATE users SET user_role = 'subscriber' WHERE user_id = $user_id";
  mysqli_query($connection, $sql);
}

function delete_user($user_id)
{
  global $connection;
  $sql = "DELETE FROM users WHERE user_id = $user_id";
  mysqli_query($connection, $sql);
  header("location: users.php");
}

function get_users_online()
{
  global $connection;

  $user_online_session = session_id();
  $user_online_time = time();
  $user_online_time_out_in_seconds = 60;
  $user_online_time_out = $user_online_time - $user_online_time_out_in_seconds;

  $sql = "SELECT * FROM users_online WHERE user_online_session = '$user_online_session'";
  $query = mysqli_query($connection, $sql);
  $user_online = mysqli_num_rows($query);

  if ($user_online == 0) {
    $sql = "INSERT INTO users_online (user_online_session, user_online_time) VALUES ('$user_online_session','$user_online_time')";
    mysqli_query($connection, $sql);
  } else {
    $sql = "UPDATE users_online SET user_online_time = '$user_online_time' WHERE user_online_session = '$user_online_session'";
    mysqli_query($connection, $sql);
  }

  $sql = "SELECT * FROM users_online WHERE user_online_time > $user_online_time_out";
  $query = mysqli_query($connection, $sql);
  return mysqli_num_rows($query);
}

function user_name_exists($user_name)
{
  global $connection;
  $sql = "SELECT * FROM users WHERE user_name = '$user_name'";
  $query = mysqli_query($connection, $sql);
  if (mysqli_fetch_assoc($query) != NULL) {
    return true;
  } else {
    return false;
  }
}

function user_email_exists($user_email)
{
  global $connection;
  $sql = "SELECT * FROM users WHERE user_email = '$user_email'";
  $query = mysqli_query($connection, $sql);
  if (mysqli_fetch_assoc($query) != NULL) {
    return true;
  } else {
    return false;
  }
}

function signup($user_name, $user_password, $user_email, $first_name, $last_name)
{

  $user_name = escape($user_name);
  $user_password = escape($user_password);
  $user_email = escape($user_email);
  $first_name = escape($first_name);
  $last_name = escape($last_name);

  $user_password = password_hash($user_password, PASSWORD_BCRYPT, array('cost' => 12));

  if (!empty($user_name) && !empty($user_password) && !empty($user_email) && !empty($first_name) && !empty($last_name)) {
    create_user($user_name, $user_password, $user_email, $first_name, $last_name);
    return true;
  } else {
    return false;
  }
}

function login($user_name, $user_password)
{

  $user_name = escape($user_name);
  $user_password = escape($user_password);

  $db_user = get_user_by_user_name($user_name);

  if ($db_user != NULL) {
    $db_user_password = $db_user["user_password"];
  }

  if ($db_user != NULL && password_verify($user_password, $db_user_password)) {
    $_SESSION['user_id'] = $db_user['user_id'];
    $_SESSION['user_name'] = $db_user['user_name'];
    $_SESSION['user_role'] = $db_user['user_role'];
    return true;
  } else {
    return false;
  }
}

// Start Categories Functions

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

function create_post($category_id, $post_author, $post_title, $post_content, $post_image, $post_tags, $post_status)
{
  global $connection;

  $sql = "INSERT INTO posts (category_id, post_author, post_title, post_content, post_image, post_tags, post_status, post_date) VALUES ($category_id, '$post_author', '$post_title', '$post_content', '$post_image', '$post_tags', '$post_status', now())";

  mysqli_query($connection, $sql);
}

function get_posts()
{
  global $connection;
  $sql = "SELECT * FROM posts ";
  $query = mysqli_query($connection, $sql);
  return mysqli_fetch_all($query, MYSQLI_ASSOC);
}

function get_posts_by_pagination($start_from, $posts_number_per_page)
{
  global $connection;
  $sql = "SELECT * FROM posts LIMIT $start_from, $posts_number_per_page";
  $query = mysqli_query($connection, $sql);
  return mysqli_fetch_all($query, MYSQLI_ASSOC);
}

function get_posts_by_category_and_by_pagination($start_from, $posts_number_per_page, $category_id)
{
  global $connection;
  $sql = "SELECT * FROM posts WHERE category_id = $category_id LIMIT $start_from, $posts_number_per_page";
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

function get_posts_by_author($author)
{
  global $connection;
  $sql = "SELECT * FROM posts WHERE post_author = '$author'";
  $query = mysqli_query($connection, $sql);
  return mysqli_fetch_all($query, MYSQLI_ASSOC);
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

function update_post_views($post_id)
{
  global $connection;

  $sql = "UPDATE posts SET post_views = post_views + 1 WHERE post_id = $post_id ";

  mysqli_query($connection, $sql);
}

function reset_post_views($post_id)
{
  global $connection;

  $sql = "UPDATE posts SET post_views = 0 WHERE post_id = $post_id ";

  mysqli_query($connection, $sql);
}


function delete_post($post_id)
{
  global $connection;
  $sql = "DELETE FROM posts WHERE post_id = $post_id";
  mysqli_query($connection, $sql);
}

function create_comment($post_id, $comment_author, $comment_email, $comment_content)
{
  global $connection;

  $sql = "INSERT INTO comments (post_id, comment_author, comment_email, comment_content, comment_status, comment_date) VALUES ($post_id, '$comment_author', '$comment_email', '$comment_content', 'unapproved', now())";

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
  $sql = "SELECT * FROM comments WHERE post_id = $post_id";
  $query = mysqli_query($connection, $sql);
  return mysqli_fetch_all($query, MYSQLI_ASSOC);
}

function get_approved_comments_by_post_id($post_id)
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

function search($keyword)
{
  global $connection;
  $sql = "SELECT * FROM posts WHERE post_tags LIKE '%$keyword%'";
  $query = mysqli_query($connection, $sql);
  return mysqli_fetch_all($query, MYSQLI_ASSOC);
}

function escape($string)
{
  global $connection;
  return mysqli_real_escape_string($connection, trim($string));
}
