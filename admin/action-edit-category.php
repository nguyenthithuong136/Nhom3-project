<?php

include('controllers/c_category.php');

@session_start();

if (isset($_SESSION['admin_id'])) {
    if ($_SESSION['admin_role'] == 1 ) {
        $index = new c_category();
        $index->update_category();
    } else {
        header('location: index.php');
    }
} else {
    header('location: notfound.php');
}