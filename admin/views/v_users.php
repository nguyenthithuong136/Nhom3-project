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

    <!-- container main -->
    <main class="container__main">
        <div class="container__main-handler">
            <div class="container__main-link">
                <a data-bs-toggle="modal" data-bs-target="#openModal" class="text-white">
                    <i class="fa-solid fa-plus"></i>
                    Thêm thành viên
                </a>
            </div>
            <div class="container__main-search">
                <form action="">
                    <input type="search" name="search" id="" placeholder="Tìm kiếm thành viên" value="<?php if (isset($_GET['search'])) {
                                                                                                        echo $_GET['search'];
                                                                                                    } ?>">
                </form>
            </div>
        </div>
        <div class="container__main-handler-mobile">
            <button data-bs-toggle="modal" data-bs-target="#openModal" class="btn btn-danger fs-4" name="submit">
                <i class="fa-solid fa-plus"></i>
                Thêm thành viên</button>
            <div class="container__main-search">
                <form action="">
                    <input type="search" name="search" id="" placeholder="Tìm kiếm sản phẩm">
                </form>
            </div>
        </div>
        <div class="container__table">
            <table>
                <tr>
                    <th>Id</th>
                    <th>Họ và tên nhân viên</th>
                    <th>Tên đăng nhập</th>
                    <th>Ảnh</th>
                    <th>Email</th>
                    <th>Địa chỉ</th>
                    <th>Số điện thoại</th>
                    <th>Tính năng</th>
                </tr>
                <!-- tbody -->
                <tbody>
                    <?php foreach ($list_staffs as $each) { ?>
                    <tr>
                        <td><?= $each->id; ?></td>
                        <td><?= $each->fullname; ?></td>
                        <td><?= $each->username; ?></td>
                        <td>
                            <?php if ($each->picture == null) { ?>
                            <img src="public/images/login.png" alt="" class="img_item">
                            <?php } else { ?>
                            <img src="public/images/user/<?= $each->picture; ?>" alt="" class="img_item">
                            <?php } ?>
                        </td>
                        <td><?= $each->email; ?></td>
                        <td><?= $each->address; ?></td>
                        <td><?= $each->phone; ?></td>
                        <td>
                            <a href="edit-user.php?id=<?php echo $each->id; ?>">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>
                            <a href="delete-user.php?id=<?php echo $each->id; ?>">
                                <i class="fa-solid fa-trash-can"></i>
                            </a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </main>

    <!-- Modal -->
    <div class="modal fade modal-xl" id="openModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-3" id="exampleModalLabel">Thêm thành viên mới</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="action-add-user.php" method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="" class="form-label fs-3">Họ và tên thành viên</label>
                            <input type="text" class="form-control fs-3" name="fullname-user" placeholder="Họ và tên"
                                required>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label fs-3">Tên đăng nhập</label>
                            <input type="text" class="form-control fs-3" name="username-user" placeholder="Tên đăng nhập"
                                required>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label fs-3">Email</label>
                            <input type="email" class="form-control fs-3" name="email-user" placeholder="Email"
                                required>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label fs-3">Mật khẩu</label>
                            <input type="text" class="form-control fs-3" name="password-user" placeholder="Mật khẩu"
                                required>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label fs-3">Ảnh đại diện</label>
                            <input class="form-control fs-3" type="file" id="picture" name="picture" required>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label fs-3">Địa chỉ</label>
                            <input type="text" class="form-control fs-3" name="address-user" placeholder="Địa chỉ"
                                required>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label fs-3">Số điện thoại</label>
                            <input type="phone" class="form-control fs-3" name="phone-user" placeholder="Số điện thoại"
                                required>
                        </div>
                        <input type="hidden" class="form-control fs-3" name="role-user" value="2" required>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary fs-4" data-bs-dismiss="modal">Đóng</button>
                            <button type="submit" class="btn btn-danger fs-4" data-bs-target="submit-form"
                                name="submit">Thêm thành viên</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>

