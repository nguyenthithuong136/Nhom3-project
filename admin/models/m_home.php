

<?php

@session_start();

include('../models/database.php');

class m_home extends database
{
    // đếm số lượng bài đăng
    public function count_post()
{
    $sql = "SELECT COUNT(DISTINCT p.id) AS total
            FROM posts p
            JOIN post_category pc ON p.id = pc.post_id";
    $this->setQuery($sql);
    return $this->loadRecord();

}

    // đếm số lượng thành  viên
    public function count_user()
    {
        $sql = "SELECT COUNT(*) FROM users
                where users.role = 2";
        $this->setQuery($sql);
        return $this->loadRecord();
    }

    // đếm số lượng các loại thể loại
    public function count_categories()
    {
        $sql = "SELECT COUNT(*) FROM categories";
        $this->setQuery($sql);
        return $this->loadRecord();
    }

    // đếm số lượng bình luận
    public function count_comment()
    {
        $sql = "SELECT COUNT(*) FROM comments";
        $this->setQuery($sql);
        return $this->loadRecord();
    }

   
}