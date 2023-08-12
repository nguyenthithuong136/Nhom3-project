<?php
@session_start();

include('controllers/c_post.php');

if (isset($_SESSION['admin_id'])) {
    if ($_SESSION['admin_role'] == 1 ) {
        $index = new c_post();
        $index->upload_post();
    } else {
        header('location: index.php');
    }
} else {
    header('location: notfound.php');
}