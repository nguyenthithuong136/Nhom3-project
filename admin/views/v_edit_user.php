<!-- container -->
<main class="content-wrapper">
    <div class="row">
        <div class="col-md-12">
            <div class="app__title">
                <h3 class="app__title-title">Quản lý người dùng</h3>
                <div id="clock"></div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="mt-4" id="openModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="false">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <form action="action-edit-user.php" method="post" enctype="multipart/form-data">
                        <input type="hidden" class="form-control fs-3" name="id-user" placeholder="Tên nhân viên"
                            value="<?= $info->id; ?>">
                        <div class="mb-3">
                            <label for="" class="form-label fs-3">Họ và tên nhân viên</label>
                            <input type="text" class="form-control fs-3" name="fullname-user" placeholder="Họ và nhân viên"
                                value="<?= $info->fullname; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label fs-3">Tên đăng nhập</label>
                            <input type="text" class="form-control fs-3" name="username-user" placeholder="Tên đăng nhập"
                                value="<?= $info->username; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label fs-3">Email</label>
                            <input type="email" class="form-control fs-3" name="email-user" placeholder="Email"
                                value="<?= $info->email; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label fs-3">Mật khẩu</label>
                            <input type="text" class="form-control fs-3" name="password-user" placeholder="Mật khẩu"
                                value="<?= $info->password; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label fs-3">Ảnh đại diện</label>
                            <input class="form-control fs-3" type="file" id="picture" name="picture-new" required>
                        </div>
                        <div class="mb-3">
                            <!-- <label for="image" class="form-label fs-3">Hoặc giữ lại hình ảnh</label><br />
                            <input class="form-control fs-4" value="<?= $info->picture; ?>" type="hidden"
                                id="picture-old" name="picture-old">
                            <img src="public/images/user/<?php echo $info->picture ?>"
                                class="body__image img_item" /> -->
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label fs-3">Địa chỉ</label>
                            <input type="text" class="form-control fs-3" name="address-user" placeholder="Địa chỉ"
                                value="<?php echo $info->address ?>">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label fs-3">Số điện thoại</label>
                            <input type="phone" class="form-control fs-3" name="phone-user" placeholder="Số điện thoại"
                                value="<?php echo $info->phone ?>">
                        </div>
                        <input type="hidden" class="form-control fs-3" name="role-user" value="2" required>
                        <!-- <div class="modal-footer">
                        
                            <button type="button" class="btn btn-secondary fs-4" data-bs-dismiss="modal">Đóng</button>
                
                            <button type="submit" class="btn btn-danger fs-4" data-bs-target="submit-form"
                                name="submit">Sửa nhân viên</button>
                        </div> -->
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-danger fs-4" data-bs-target="submit-form"
                                name="submit">Sửa thông tin</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>