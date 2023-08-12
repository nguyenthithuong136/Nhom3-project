<?php

if (isset($_GET['success'])) {
    $abc = $_GET['success'];
    echo '<script>alert("cập nhật bài đăng thành công!")</script>';
}
if (isset($_GET['error'])) {
    echo '<script>alert("Thêm thể bài đăng thất bại!")</script>';
}

?>

<!-- container -->
<main class="content-wrapper">
    <div class="row">
        <div class="col-md-12">
            <div class="app__title">
                <h3 class="app__title-title">Quản lý bài đăng</h3>
                <div id="clock"></div>
            </div>
        </div>
    </div>

    <!-- container main -->
    <main class="container__main">
        <div class="container__main-handler">
            <div class="container__main-link">
            <a data-bs-toggle="modal" data-bs-target="#openModal" class="text-white">
                    <i class="fa-solid fa-plus"></i>
                    Tạo bài đăng mới
                </a>
            </div>
            <div class="container__main-search">
                <form action="">
                    <input type="search" name="search" id="" placeholder="Tìm kiếm bài đăng" value="<?php if (isset($_GET['search'])) {
                                                                                                        echo $_GET['search'];
                                                                                                    } ?>">
                </form>
            </div>
        </div>
        <!-- mobile -->
       
        <div class="container__main-handler-mobile">
            <button data-bs-toggle="modal" data-bs-target="#openModal" class="btn btn-danger fs-4" name="submit">
                <i class="fa-solid fa-plus"></i>
                Thêm bài đăng</button>
            <div class="container__main-search">
                <form action="">
                    <input type="search" name="search" id="" placeholder="Tìm kiếm bài đăng" value="<?php if (isset($_GET['search'])) {
                                                                                                        echo $_GET['search'];
                                                                                                    } ?>">
                </form>
            </div>
        </div>
        <div class="container__table">
            <table>
                <tr>
                    <th>Tiêu đề bài đăng</th>
                    <th>Nội dung bài đăng</th>
                    <th>Thể loại</th>
                    <th>Ngày tạo bài đăng</th>
                    <th>Hình ảnh</th>
                    <th>Tính năng</th>
                </tr>
                <!-- render danh sách bài  -->
                <?php foreach ($post_list as $each){ ?>
                <tr>
                    <td><?= $each->name ?></td>
                    <td><?= $each->detail ?></td>
                    <td><?= $each->title ?></td>
                    <td><?= $each->createdate ?></td>
                    <td>
                            <img src="public/images/posts/<?= $each->picture ?>" alt="" class="img_item">
                    </td>
                    <td>
                        <a href="edit-post.php?id=<?= $each->id; ?>">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </a>
                        <a href="delete-post.php?id=<?= $each->id; ?>">
                            <i class="fa-solid fa-trash-can"></i>
                        </a>
                    </td>
                </tr>
                <?php }?>
            </table>
        </div>

        <!-- pagination -->
        <nav aria-label="Page navigation">
            <ul class="pagination pb-3 d-flex justify-content-center">
                <?php for ($i = 1; $i <= $number_page; $i++) { ?>
                <li class="page-item">
                    <a class="page-link fs-3 px-3 text-danger mx-1"
                        href="?page=<?php echo $i; ?>&search=<?php echo $search; ?>">
                        <?php echo $i ?>
                    </a>
                </li>
                <?php } ?>
             
            </ul>
        </nav>
    </main>
</main>

<!-- Modal -->
<div class="modal fade modal-xl" id="openModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-3" id="exampleModalLabel">Thêm bài đăng</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="action-post.php" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="" class="form-label fs-3">Tiêu đề </label>
                        <input type="text" class="form-control fs-3" name="name"
                            placeholder="Tiêu đề" required>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label fs-3">Nội dung</label>
                        <textarea class="form-control fs-3" id="" rows="7" name="detail"
                            placeholder="Nội dung" required></textarea>
                    </div>
                    <label for="" class="form-label fs-3">Thể loại</label>
                    <select class="form-select fs-3" aria-label="Default select example" name="id_category">
                         <!-- render ra thể loại -->
                         <?php foreach ($category_list as $each) { ?>
                        <option value="<?= $each->id; ?>"><?= $each->title; ?></option>
                        <?php } ?> 
                        <!-- end -->
                    </select>
                    <div class="mb-3">
                                <label for="picture" class="form-label fs-3">Hình ảnh bài đăng</label>
                                <input class="form-control fs-3" type="file" id="picture" name="picture" required>
                            </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary fs-4" data-bs-dismiss="modal">Đóng</button>
                        <button type="submit" class="btn btn-danger fs-4" data-bs-target="submit-form"
                            name="submit-post">Thêm bài đăng</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
       