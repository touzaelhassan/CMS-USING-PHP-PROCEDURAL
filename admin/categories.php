  <?php include './includes/head.php' ?>

  <?php $categories = get_categories(); ?>

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
                </tr>
              </thead>
              <tbody>
                <?php foreach ($categories as $category) : ?>
                  <tr>
                    <td><?php echo $category["category_id"]; ?></td>
                    <td><?php echo $category["category_title"]; ?></td>
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