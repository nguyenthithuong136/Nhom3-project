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
        <div class="" id="openModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog pb-3">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-1" id="exampleModalLabel">Sửa bài đăng</h1>
                    </div>
                    <div class="modal-body">
                        <form action="action-edit-post.php" method="post">
                            <input type="hidden" class="form-control fs-3" name="id-product-category"
                                placeholder="Tên danh mục" required value="<?= $post_info->id; ?>">
                            <div class="mb-3">
                                <label for="" class="form-label fs-3">Tiêu đề</label>
                                <input type="text" class="form-control fs-3" name="name"
                                    placeholder="Tên danh mục" required value="<?=  $post_info->name; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label fs-3">Nội dung bài đăng</label>
                                <textarea class="form-control fs-3" id="" rows="7" name="detail"
                                    placeholder="N" required><?=  $post_info->detail; ?></textarea>
                            </div>
                            <label for="" class="form-label fs-3">Thể loại</label>
                            <select class="form-select fs-3" aria-label="Default select example" name="id_category">
                                <!-- render ra loại sản phẩm -->
                                <?php foreach ($category_type as $category) { ?>
                                <option value="<?= $category->id; ?>"><?= $category->title; ?></option>
                        <?php } ?> 
                            </select>
    
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary fs-4"
                                    data-bs-dismiss="modal"><a style="color:white;" href="post.php">Đóng</a></button>
                                <button type="submit" class="btn btn-danger fs-4" data-bs-target="submit-form"
                                    name="submit-update">Sửa thông tin bài đăng</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
</main>