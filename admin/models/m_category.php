

<?php

include('../models/database.php');

class m_category extends database
{
    // lấy ra loại danh mục ở bảng category_type
    public function get_category_type()
    {
        $sql = "select * from categories";
        $this->setQuery($sql);
        return $this->loadAllRows();
    }


    public function get_category($search, $number_in_on_page, $clear)
{
    $sql = "SELECT DISTINCT c.id, c.title, c.description
            FROM categories c
            WHERE c.title LIKE '%$search%'
            LIMIT $number_in_on_page
            OFFSET $clear;";
        
    $this->setQuery($sql);
    return $this->loadAllRows();
}

    // đếm số lượng sản phẩm với từ khóa tìm kiếm
    public function get_count_search($search)
    {
        $sql = "select count(*) as 'count' from categories where categories.title like '%$search%'";
        $this->setQuery($sql);
        return $this->loadRecord();
    }

    // lấy ra danh mục sản phẩm theo id
    public function get_category_by_id($id)
    {
        $sql = "select * from categories where id = ?";
        $this->setQuery($sql);
        return $this->loadRow(array($id));
    }

    // thêm mới danh mục sản phẩm
    public function add_category($title, $description)
    {
        $sql = "insert into categories(title, description)
                values(?, ?)";
        $this->setQuery($sql);
        return $this->execute(array($title, $description));
    }

    // update category
    public function update_category($id, $title, $description)
    {
        $sql = "UPDATE categories
                SET 
                title = ?, 
                description = ? 
                WHERE id = ?";
        $this->setQuery($sql);
        return $this->execute(array($title, $description, $id));
    }
    
    // delete danh mục sản phẩm
    public function delete_post_category($id)
    {
        $sql = "delete from categories where id = ?";
        $this->setQuery($sql);
        return $this->execute(array($id));
    }
}