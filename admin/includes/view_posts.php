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
        <tr>
          <td><?php echo $post["post_id"]; ?></td>
          <td><?php echo $post["category_id"]; ?></td>
          <td><?php echo $post["post_author"]; ?></td>
          <td><?php echo $post["post_title"]; ?></td>
          <td><img src="../images/<?php echo $post["post_image"]; ?>" class="table__image"></td>
          <td><?php echo $post["post_tags"]; ?></td>
          <td><?php echo $post["post_comments"]; ?></td>
          <td><?php echo $post["post_status"]; ?></td>
          <td><?php echo $post["post_date"]; ?></td>
        </tr>
      <?php endforeach ?>
    </tbody>
  </table>