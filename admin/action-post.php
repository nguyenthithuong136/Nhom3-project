<?php

include('controllers/c_post.php');
@session_start();

if (isset($_SESSION['admin_id'])) {
    if ($_SESSION['admin_role'] == 1) {
        $index = new c_post();
        $index->create_post();
        // echo 'hi';
    } else {
        header('location: index.php');
    }
} else {
    header('location: notfound.php');
}