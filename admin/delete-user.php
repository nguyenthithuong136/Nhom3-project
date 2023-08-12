<?php

include('controllers/c_users.php');

@session_start();

if (isset($_SESSION['admin_id'])) {
    if ($_SESSION['admin_role'] == 1) {
        $index = new c_users();
        $index->delete_one_users();
    } else {
        header('location: index.php');
    }
} else {
    header('location: notfound.php');
}