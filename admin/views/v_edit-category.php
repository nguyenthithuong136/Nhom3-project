<!-- container -->
<main class="content-wrapper">
    <div class="row">
        <div class="col-md-12">
            <div class="app__title">
                <h3 class="app__title-title">Quản lý thể loại</h3>
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
                        <h1 class="modal-title fs-1" id="exampleModalLabel">Sửa thể loại</h1>
                    </div>
                    <div class="modal-body">
                        <form action="action-edit-category.php" method="post">
                            <input type="hidden" class="form-control fs-3" name="id-product-category"
                                placeholder="Tên thể loại" required value="<?= $category_item->id; ?>">
                            <div class="mb-3">
                                <label for="" class="form-label fs-3">Tên thể loại</label>
                                <input type="text" class="form-control fs-3" name="name-product-category"
                                    placeholder="Tên thể loại" required value="<?= $category_item->title; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label fs-3">Mô tả thể loại</label>
                                <textarea class="form-control fs-3" id="" rows="3" name="desc-product-category"
                                    placeholder="Mô tả thể loại" required><?= $category_item->description; ?></textarea>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary fs-4"
                                    data-bs-dismiss="modal"><a style="color:white;" href="category.php">Đóng</a></button>
                                <button type="submit" class="btn btn-danger fs-4" data-bs-target="submit-form"
                                    name="submit">Sửa thể loại</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
</main>