<?php

@session_start();

include('controllers/c_users.php');

if (isset($_SESSION['admin_id'])) {
    if ($_SESSION['admin_role'] == 1) {
        $index = new c_users();
        $index->get_all_users();
    } else {
        header('location: home.php');
    }
} else {
    header('location: notfound.php');
}