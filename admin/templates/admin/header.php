<!-- header -->
<header class="header">
    <div class="header__logout">
        <a href="logout_admin.php">
            <i class="fa-solid fa-arrow-right-from-bracket"></i>
        </a>
    </div>
    <i class="icon fa-solid fa-bars"></i>
</header>

<div class="sidebar__mobile-container active icon">
    <i class="fa-solid fa-xmark icon"></i>
</div>
<!-- aside mobile -->
<div class="sidebar__mobile active">
    <!-- admin -->
    <div class="sidebar__admin">
        <?php if (($_SESSION['admin_id']) && $_SESSION['admin_picture'] == null) { ?>
            <img src = "public/images/user/anh4.png" alt="" class="sidebar__admin-avatar">
        <?php } else { ?>
        <img src="public/images/user/<?= $_SESSION['admin_picture']; ?>" alt=""
            class="sidebar__admin-avatar">
        <?php } ?>
        <div class="sidebar__admin-body">
            <h3><?= $_SESSION['admin_name'] ?></h3>
            <p>Hi!</p>
        </div>
    </div>

    <!-- content -->
    
    <aside class="sidebar__menu">
        <ul class="sidebar__menu-list">
            <?php if ($_SESSION['admin_role'] == 1) { ?>
            <li>
                <a href="home.php" class="sidebar__menu-link">
                <i class="fa-brands fa-microsoft"></i>
                    Dashboard
                </a>
            </li>
            <?php } ?>
            <li>
                <a href="user.php" class="sidebar__menu-link">
                    <i class="fa-solid fa-address-card"></i>
                    Quản lý thành viên
                </a>
            </li>
            <li>
                <a href="category.php" class="sidebar__menu-link">
                    <i class="fa-solid fa-list"></i>
                    Quản lý thể loại 
                </a>
            </li>
            <li>
                <a href="post.php" class="sidebar__menu-link">
                    <i class="fa-solid fa-list-check"></i>
                    Quản lý bài đăng
                </a>
            </li>
            <li>
                <a href="comment.php" class="sidebar__menu-link">
                    <i class="fa-solid fa-comments-dollar"></i>
                    Quản lý bình luận
                </a>
            </li>
        </ul>
    </aside>
</div>

<!-- aside -->
<div class="container-fluid sidebar">
    <!-- admin -->
    <div class="sidebar__admin">
        <?php if (($_SESSION['admin_id']) && $_SESSION['admin_picture'] == null) { ?>
        <img src="public/images/user/anh4.png" alt="" class="sidebar__admin-avatar">
        <?php } else { ?>
        <img src="public/images/user/<?= $_SESSION['admin_picture']; ?>" alt=""
            class="sidebar__admin-avatar">
        <?php } ?>
        <div class="sidebar__admin-body">
            <h3><?= $_SESSION['admin_name'] ?></h3>
            <p>Hi!</p>
        </div>
    </div>

    <!-- content -->
    <aside class="sidebar__menu">
        <ul class="sidebar__menu-list">
            <?php if ($_SESSION['admin_role'] == 1) { ?>
            <li>
                <a href="home.php" class="sidebar__menu-link">
                <i class="fa-brands fa-microsoft"></i>
                    Dashboard
                </a>
            </li>
            <li>
                <a href="user.php" class="sidebar__menu-link">
                    <i class="fa-solid fa-address-card"></i>
                    Quản lý thành viên
                </a>
            </li>
            <?php } ?>
            <li>
                <a href="category.php" class="sidebar__menu-link">
                    <i class="fa-solid fa-list"></i>
                    Quản lý thể loại 
                </a>
            </li>
            <li>
                <a href="post.php" class="sidebar__menu-link">
                    <i class="fa-solid fa-list-check"></i>
                    Quản lý bài đăng
                </a>
            </li>
            <li>
                <a href="comment.php" class="sidebar__menu-link">
                    <i class="fa-solid fa-comments-dollar"></i>
                    Quản lý bình luận
                </a>
            </li>
        </ul>
    </aside>
</div>