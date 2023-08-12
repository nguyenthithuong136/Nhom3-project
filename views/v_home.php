<!-- <div class="index__container">
    <h1 class="title">Bài đăng mới nhất</h1>
    <div class="container">
        <div class="row">
            <?php foreach ($new_products as $value) : ?>
            <div class="col-sm-6 col-md-4 col-lg-3">
                <div class="item__product">
                    <a href="?url=detail.php&id_product=<?php echo $value->id ?>">
                        <div class="item__product-head">
                            <img src="admin/public/images/posts/<?php echo $value->picture ?>" alt="">
                        </div>
                        <div class="item__product-body">
                            <h3><?php echo $value->name; ?></h3>
                        </div>
                    </a>
                </div>
            </div>
            <?php endforeach ?> -->
            <!-- end -->
        <!-- </div>
    </div>
</div> -->

<div class = "container">


  <div class="row" style="margin-top: 10%">
<!-- 
Blog Entries Column  -->
 <div class="col-md-8">
 <?php foreach ($pots as $value) : ?>
  <!-- Blog Post -->

 <div class="card mb-4">

<img class="card-img-top" src="admin/public/images/posts/<?php echo $value->picture ?>" alt="tttt">
    <div class="card-body">
      <h2 class="card-title"><?php echo $value->name; ?></h2>
         <p><b>Category : </b> <a href="categories.php?catid=3"><?php echo $value->title; ?></a> </p>

      <a href="news-details.php?nid=13" class="btn btn-primary">Read More →</a>
    </div>
    <div class="card-footer text-muted">
      Posted on <?php echo $value->createdate; ?>
    </div>
  </div> 
  <?php endforeach ?> 

  <!-- <div class="card mb-4">
<img class="card-img-top" src="admin/postimages/7fdc1a630c238af0815181f9faa190f5.jpg" alt="Shah holds meeting with NE states leaders in Manipur">
    <div class="card-body">
      <h2 class="card-title">Shah holds meeting with NE states leaders in Manipur</h2>
         <p><b>Category : </b> <a href="category.php?catid=6">Politics</a> </p>

      <a href="news-details.php?nid=12" class="btn btn-primary">Read More →</a>
    </div>
    <div class="card-footer text-muted">
      Posted on 2018-07-01 02:11:44           
    </div>
  </div> -->

  <!-- <div class="card mb-4">
<img class="card-img-top" src="admin/postimages/27095ab35ac9b89abb8f32ad3adef56a.jpg" alt="UNs Jean Pierre Lacroix thanks India for contribution to peacekeeping">
    <div class="card-body">
      <h2 class="card-title">UNs Jean Pierre Lacroix thanks India for contribution to peacekeeping</h2>
         <p><b>Category : </b> <a href="category.php?catid=6">Politics</a> </p>

      <a href="news-details.php?nid=11" class="btn btn-primary">Read More →</a>
    </div>
    <div class="card-footer text-muted">
      Posted on 2018-07-01 02:10:36           
    </div>
  </div> -->

  <!-- <div class="card mb-4">
<img class="card-img-top" src="admin/postimages/505e59c459d38ce4e740e3c9f5c6caf7.jpg" alt="Tata Steel, Thyssenkrupp Finalise Landmark Steel Deal">
    <div class="card-body">
      <h2 class="card-title">Tata Steel, Thyssenkrupp Finalise Landmark Steel Deal</h2>
         <p><b>Category : </b> <a href="category.php?catid=7">Business</a> </p>

      <a href="news-details.php?nid=10" class="btn btn-primary">Read More →</a>
    </div>
    <div class="card-footer text-muted">
      Posted on 2018-07-01 02:08:56           
    </div>
  </div> -->
<!-- 
  <div class="card mb-4">
<img class="card-img-top" src="admin/postimages/6d08a26c92cf30db69197a1fb7230626.jpg" alt="Jasprit Bumrah ruled out of England T20I series due to injury">
    <div class="card-body">
      <h2 class="card-title">Jasprit Bumrah ruled out of England T20I series due to injury</h2>
         <p><b>Category : </b> <a href="category.php?catid=3">Sports</a> </p>

      <a href="news-details.php?nid=7" class="btn btn-primary">Read More →</a>
    </div>
    <div class="card-footer text-muted">
      Posted on 2018-07-01 01:49:23           
    </div>
  </div> 
  -->



<!-- 
   Pagination -->


<ul class="pagination justify-content-center mb-4">
<li class="page-item"><a href="?pageno=1" class="page-link">First</a></li>
<li class="disabled page-item">
    <a href="#" class="page-link">Prev</a>
</li>
<li class="disabled page-item">
    <a href="# " class="page-link">Next</a>
</li>
<li class="page-item"><a href="?pageno=1" class="page-link">Last</a></li>
</ul>

</div> 




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








