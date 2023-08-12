<?php

include('models/m_comment.php');

@session_start();

class c_comment
{
    public function get_comments()
    {
        // chức năng tìm kiếm sản phẩm
        $c_comments = new m_comment();
        $search = '';
        $page = 1;
        $number_count = $c_comments->get_count_search($search);
        $number_in_on_page = 5;
        $number_page = ceil($number_count / $number_in_on_page);
        $clear = $number_in_on_page * ($page - 1);
        if (isset($_GET['page'])) {
            $page = $_GET['page'];
        }
        if (isset($_GET['search'])) {
            $search = $_GET['search'];
            $list_comments = $c_comments->get_search($search, $number_in_on_page, $clear);
        } else {
            $list_comments = $c_comments->get_comments($number_in_on_page, $clear);
        }
        $view = 'views/v_comment.php';
        include('templates/admin/layout.php');
    }

    // xóa cmt 
    public function get_one_comments()
    {
        $c_comments = new m_comment();
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
        }
        $delete_cmt = $c_comments->get_one_comments($id);
        if (empty($delete_cmt)) {
            header('location: comment.php?success=Xóa bình luận thành công!');
        } else {
            header('location: comment.php?error=Xóa không thành công!');
        }
    }
}