  <?php include './includes/head.php' ?>


  <?php

  if (isset($_POST["create"])) {
    $category_title = $_POST["category_title"];
    if (!empty($category_title)) {
      create_category($category_title);
      header("location: categories.php");
    } else {
      $error_message = "This field should not be empty";
    }
  }

  ?>

  <?php $categories = get_categories(); ?>

  <?php

  if (isset($_GET["category_id"])) {
    $category_id = $_GET["category_id"];
    delete_category_by_id($category_id);
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
              <?php if (isset($error_message)) : ?>
                <p class="alert alert-danger mb-1 fs-6"><?php echo $error_message ?></p>
              <?php endif ?>
              <div class="form-group">
                <input type="text" class="form-control categories__input" name="category_title">
              </div>
              <div class="form-group">
                <input type="submit" class="form-control categories__btn" value="CREATE" name="create">
              </div>
            </form>
            <form action="categories.php" method="POST" class="update__categories__form">
              <div class="form-group">
                <input type="text" class="form-control categories__input" name="category_title">
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
                      <a class="btn btn-danger btn-sm" href="categories.php?category_id=<?php echo $category["category_id"]; ?>">
                        DELETE
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