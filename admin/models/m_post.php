
<?php
require_once('../models/database.php');
class m_post extends database {
    // lấy ra một bài đăng
    public function get_post_by_id($id) {
        // $sql = "select * from posts where id = ?";
        $sql = "SELECT p.*, c.title
        FROM posts p
        JOIN post_category pc ON p.id = pc.post_id
        JOIN categories c ON pc.category_id = c.id
        WHERE p.id = ?";
        $this->setQuery($sql);
        return $this->loadRow(array($id));
    }

    public function get_post($search, $number_in_on_page, $clear)
{
    $sql = "SELECT p.*, c.title
            FROM posts p
            JOIN post_category  pc ON p.id = pc.post_id
            JOIN categories c ON pc.category_id = c.id
            WHERE c.title LIKE '%$search%'
            LIMIT $number_in_on_page
            OFFSET $clear;";
            
    $this->setQuery($sql);
    return $this->loadAllRows();
}

    // lẩy ra danh sách thể loại
    public function get_all_category_type() {
        $sql = "select * from categories";
        $this->setQuery($sql);
        return $this->loadAllRows();
    }
    // đếm số lượng bài đăng với từ khóa tìm kiếm
    public function get_count_search($search)
    {
        $sql = "select count(*) from posts where posts.name like '%$search%'";
        $this->setQuery($sql);
        return $this->loadRecord($search);
    }
    // lấy ra tất cả các bài đăng
    public function get_all_post() {
        // $sql = "select * from posts";
        $sql = "SELECT p.*, c.title
            FROM posts p
            LEFT JOIN post_category  pc ON p.id = pc.post_id
            LEFT JOIN categories c ON pc.category_id = c.id";
        $this-> setQuery($sql);
        return $this->loadAllRows();
    }

    // lấy ra tất cả các loại bài đăng
    public function get_all_post_category() {
        $sql = "SELECT posts.*, categories.*
                FROM posts
                JOIN post_category  ON posts.id = post_category .post_id
                JOIN categories ON categories.id = post_category .category_id";
        $this->setQuery($sql);
        return $this->loadAllRows();
    }
    
    // public function get_all_post_category() {
    //     $sql = "select * from product
    //         join category on category.id = product.id_category";
    //     $this->setQuery($sql);
    //     return $this->loadAllRows();
    // }

    //thêm bài đăng
    public function add_post_with_category($name, $detail, $image, $categoryId) {
        $sql = "INSERT INTO posts (name, detail, image) VALUES (?, ?, ?)";
        $this->setQuery($sql);
        $result = $this->execute(array($name, $detail, $image));
    
        if ($result) {
            // Lấy ID của bài đăng vừa thêm
            $postId = $this->get_last_inserted_id();
    
            if ($postId !== null) {
                $this->add_post_category_relation($postId, $categoryId); // Thêm liên kết với thể loại
            }
        }
    
        return $result;
    }
    
    public function get_last_inserted_id() {
        $sql = "SELECT LAST_INSERT_ID() as last_id";
        $this->setQuery($sql);
        $result = $this->loadRecord();
    
        return isset($result['last_id']) ? $result['last_id'] : null;
    }
    
    public function add_post_category_relation($postId, $categoryId) {
        $sql = "INSERT INTO post_category (post_id, category_id) VALUES (?, ?)";
        $this->setQuery($sql);
        return $this->execute(array($postId, $categoryId));
    }
    
    
 

    // sửa bài đăng
    public function update_post_with_category($id, $name, $detail, $image, $categoryId) {
        $sql = "UPDATE posts SET name = ?, detail = ?, image = ? WHERE id = ?";
        $this->setQuery($sql);
        $result = $this->execute(array($name, $detail, $image, $id));
    
        if ($result) {
            $this->update_post_category_relation($id, $categoryId); // Cập nhật liên kết với thể loại
        }
    
        return $result;
    }
    
    public function update_post_category_relation($postId, $newCategoryId) {
        $sql = "UPDATE post_category SET category_id = ? WHERE post_id = ?";
        $this->setQuery($sql);
        return $this->execute(array($newCategoryId, $postId));
    }
    
   
    // xóa bài đăng
    public function delete_product($id){
        $sql = "delete from posts where id = ?";
        $this->setQuery($sql);
        return $this->execute(array($id));
    } 
    // public function delete_post_with_category($post_id) {
    // $this->delete_post_category_relation($id); // Xoá liên kết với thể loại trước
//     $sql = "DELETE FROM posts WHERE id = ?";
//     $this->setQuery($sql);
//     return $this->execute(array($post_id));
// }

// public function delete_post_category_relation($postId) {
//     $sql = "DELETE FROM post_category WHERE post_id = ?";
//     $this->setQuery($sql);
//     return $this->execute(array($postId));
// }

    // public function delete_post($id){
    //     $sql = "delete from posts where id = ?";
    //     $this->setQuery($sql);
    //     return $this->execute(array($id));
    // } 
}
?>