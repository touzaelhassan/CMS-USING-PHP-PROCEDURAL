  <?php $posts = get_posts(); ?>

  <table class="table table-bordered table__posts">
    <thead>
      <tr>
        <th>Post Id</th>
        <th>Category Id</th>
        <th>Author</th>
        <th>Title</th>
        <th>Image</th>
        <th>Tags</th>
        <th>Comments</th>
        <th>Status</th>
        <th>Date</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($posts as $post) : ?>

        <?php $category = get_category_by_id($post["category_id"]); ?>

        <tr>
          <td><?php echo $post["post_id"]; ?></td>
          <td><?php echo $category["category_title"]; ?></td>
          <td><?php echo $post["post_author"]; ?></td>
          <td><?php echo $post["post_title"]; ?></td>
          <td><img src="../images/<?php echo $post["post_image"]; ?>" class="table__image"></td>
          <td><?php echo $post["post_tags"]; ?></td>
          <td><?php echo $post["post_comments"]; ?></td>
          <td><?php echo $post["post_status"]; ?></td>
          <td><?php echo $post["post_date"]; ?></td>
          <td><a href="posts.php?delete=<?php echo $post["post_id"]; ?>" class="btn btn-danger btn-sm">DELETE</a></td>
          <td><a href="posts.php?source=update_post&update=<?php echo $post["post_id"]; ?>" class="btn btn-primary btn-sm">UPDATE</a></td>
        </tr>
      <?php endforeach ?>
    </tbody>
  </table>