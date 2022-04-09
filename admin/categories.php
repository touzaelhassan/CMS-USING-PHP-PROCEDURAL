  <?php include './includes/head.php' ?>

  <?php
  if (isset($_POST["create"])) {
    $category_title = $_POST["category_title"];
    if (!empty($category_title)) {
      create_category($category_title);
      header("location: categories.php");
    } else {
      $create_error_message = "This field should not be empty";
    }
  }
  ?>

  <?php $categories = get_categories(); ?>

  <?php
  if (isset($_GET["update"])) {
    $category_id = $_GET["update"];
    $category = get_category_by_id($category_id);
  }

  if (isset($_POST["update"])) {
    $category_id = $_POST["category_id"];
    $category_title = $_POST["category_title"];
    if (!empty($category_title)) {
      update_category($category_id, $category_title);
      header("location: categories.php");
    } else {
      $update_error_message = "This field should not be empty";
    }
  }
  ?>

  <?php
  if (isset($_GET["delete"])) {
    $category_id = $_GET["delete"];
    delete_category($category_id);
    header("location: categories.php");
  }
  ?>

  <?php include './includes/header.php' ?>

  <div class="page">
    <aside class="sidebar">
      <?php include './includes/sidebar.php' ?>
    </aside>
    <div class="dashboard">
      <div class="dashboard__title">
        <h4>CATEGORIES</h4>
      </div>
      <div class="dashboard__content">
        <div class="dashboard__categories">
          <div class="categories__forms">
            <form action="categories.php" method="POST" class="create__categories__form">
              <?php if (isset($create_error_message)) : ?>
                <p class="alert alert-danger mb-1 fs-6"><?php echo $create_error_message ?></p>
              <?php endif ?>
              <div class="form-group">
                <input type="text" class="form-control categories__input" name="category_title">
              </div>
              <div class="form-group">
                <input type="submit" class="form-control categories__btn" value="CREATE" name="create">
              </div>
            </form>
            <form action="categories.php" method="POST" class="update__categories__form">
              <?php if (isset($update_error_message)) : ?>
                <p class="alert alert-danger mb-1 fs-6"><?php echo $update_error_message ?></p>
              <?php endif ?>
              <div class="form-group">
                <input type="hidden" value="<?php if (isset($category["category_id"])) echo $category["category_id"]; ?>" name="category_id">
                <input type="text" class="form-control categories__input" value="<?php if (isset($category["category_title"])) echo $category["category_title"]; ?>" name="category_title">
              </div>
              <div class="form-group">
                <input type="submit" class="form-control categories__btn" value="UPDATE" name="update">
              </div>
            </form>
          </div>
          <div class="categories__table">
            <table class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>Category Id</th>
                  <th>Category Title</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($categories as $category) : ?>
                  <tr>
                    <td><?php echo $category["category_id"]; ?></td>
                    <td><?php echo $category["category_title"]; ?></td>
                    <td>
                      <a class="btn btn-danger btn-sm" href="categories.php?delete=<?php echo $category["category_id"]; ?>">
                        DELETE
                      </a>
                    </td>
                    <td>
                      <a class="btn btn-success btn-sm" href="categories.php?update=<?php echo $category["category_id"]; ?>">
                        UPDATE
                      </a>
                    </td>
                  </tr>
                <?php endforeach ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php include './includes/footer.php' ?>

  <?php include './includes/foot.php' ?>