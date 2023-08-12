

<?php

include('../models/database.php');

@session_start();

class m_comment extends database
{
    // lấy ra tất cả các bình luận
    public function get_comments($number_in_on_page, $clear)
    {
        $sql = "select 
                comments.*,
                users.*,
                posts.*,
                comments.id as id_comment
                from comments
                join users on comments.user_id= users.id
                join posts on comments.post_id = posts.id
                limit $number_in_on_page
                offset $clear;";
        $this->setQuery($sql);
        return $this->loadAllRows();
    }

    // tìm kiếm bình luận
    public function get_search($search, $number_in_on_page, $clear)
    {

        $sql = "select 
        comments.*,
        users.*,
        posts.*,
        comments.id as id_comment
        from comments
        join users on comments.user_id= users.id
        join posts on comments.post_id = posts.id
                    where comments.comment like '%$search%'
                    limit $number_in_on_page
                    offset $clear;";
        $this->setQuery($sql);
        return $this->loadAllRows();
    }

    // đếm số lượng bình luận trùng với từ khóa search
    public function get_count_search($search)
    {
        $sql = "select count(*) from comments where comment like '%$search%'";
        $this->setQuery($sql);
        return $this->loadRecord();
    }

    // lấy ra comment theo idItem
    public function get_one_comments($id)
    {
        $sql = "delete from comments where id = ?";
        $this->setQuery($sql);
        return $this->loadRow(array($id));
    }
    public function delete_commnet($id) {
        $sql = 'delete from comments where post_id = ?';
        $this -> setQuery($sql);
        return $this->execute(array($id));
    }
}