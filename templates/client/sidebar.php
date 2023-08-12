

  <div class="col-md-4">

          <!-- Search Widget -->
          <div class="card mb-4">
            <h5 class="card-header">Search</h5>
            <div class="card-body">
                   <form name="search" action="search.php" method="post">
              <div class="input-group">
           
        <input type="text" name="searchtitle" class="form-control" placeholder="Search for..." required>
                <span class="input-group-btn">
                  <button class="btn btn-secondary" type="submit">Go!</button>
                </span>
              </form>
              </div>
            </div>
          </div>

          <!-- Categories Widget -->
          <div class="card my-4">
            <h5 class="card-header">Categories</h5>
            <div class="card-body">
              <div class="row">
                <div class="col-lg-6">
                  <ul class="list-unstyled mb-0">
<?php
include_once('models/database.php');

$db = new database();

$sql = "SELECT id, title FROM categories";
$db->setQuery($sql); // Sử dụng hàm setQuery từ đối tượng $db
$categories = $db->loadAllRows(); // Sử dụng hàm loadAllRows để lấy danh sách các hàng

foreach ($categories as $row) {
?>
    <li>
        <a href="category.php?catid=<?php echo htmlentities($row->id) ?>"><?php echo htmlentities($row->title); ?></a>
    </li>
<?php
}
?>
                  </ul>
                </div>
              </div>
            </div>
          </div>
  
  <div class="card my-4">
            <h5 class="card-header">Post News</h5>
            <div class="card-body">
                      <ul class="mb-0">
<?php
$sql = "SELECT posts.id as pid, posts.name as postname FROM posts LEFT JOIN post_category ON posts.id = post_category.post_id LEFT JOIN categories ON post_category.category_id = categories.id limit 8";
$db->setQuery($sql); // Sử dụng hàm setQuery từ đối tượng $db
$posts = $db->loadAllRows(); // Sử dụng hàm loadAllRows để lấy danh sách các hàng

foreach ($posts as $row) {
  ?>
      <li>
          <a href="news-details.php?nid=<?php echo htmlentities($row->pid)?>"><?php echo htmlentities($row->postname); ?></a>
      </li>
  <?php
  }
  ?>


 



        
