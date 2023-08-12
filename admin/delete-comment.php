<?php

@session_start();

include('controllers/c_comment.php');

if (isset($_SESSION['admin_id'])) {
    if ($_SESSION['admin_role'] == 1 ) {
        $index = new c_comment();
        $index->get_one_comments();
    } else {
        header('location: index.php');
    }
} else {
    header('location: notfound.php');
}