<h4 class="posts__title pb-3">ADD POST</h4>
<div class="posts__content">
  <form action="" method="POST" class="post__form" enctype="multipart/form-data">
    <div class="form-group">
      <label>Post Author</label>
      <input type="text" class="form-control" name="post_author">
    </div>
    <div class="form-group">
      <label>Category</label>
      <select name="category_id" class="form-control" id="post_category">
        <?php foreach ($categories as $category) : ?>
          <option value="<?php echo $category["category_id"] ?>"><?php echo $category["category_title"] ?></option>
        <?php endforeach ?>
      </select>
    </div>
    <div class="form-group">
      <label>Post Title</label>
      <input type="text" class="form-control" name="post_title">
    </div>
    <div class="form-group">
      <label>Post Image</label>
      <input type="file" class="form-control" name="image">
    </div>
    <div class="form-group">
      <label>Post Tags</label>
      <input type="text" class="form-control" name="post_tags">
    </div>
    <div class="form-group">
      <label>Post Status</label>
      <select name="post_status" class="form-control">
        <option value="draft">select options</option>
        <option value="published">publish</option>
        <option value="draft">draft</option>
      </select>
    </div>
    <div class="form-group">
      <label>Post Content</label>
      <textarea name="post_content" class="form-control" id="" cols="30" rows="10"></textarea>
    </div>
    <div class="form-group  w-100">
      <input type="submit" value="PUBLISH" class="btn btn-primary" name="create_post">
    </div>
  </form>
</div>