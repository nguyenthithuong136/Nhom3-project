<?php

    require_once ("database.php");
    class models_post extends database{
        //xem lại getBook
        public function getPost(){
            // $sql = "select * FROM posts where id_category is not null"; 
            $sql = "SELECT p.*, c.title
            FROM posts p
            JOIN post_category pc ON p.id = pc.post_id
            JOIN categories c ON pc.category_id = c.id";
            $this ->setQuery($sql);
            // lấy dữ liệu nhiều dùng 
            return $this -> loadAllRows();
        }

        public function getPostById($id){
            // $sql = "select * FROM posts where id = ? and id_category is not null"; 
            $sql = "SELECT p.*, c.title
            FROM posts p
            JOIN post_category pc ON p.id = pc.post_id
            JOIN categories c ON pc.category_id = c.id
            WHERE p.id = ?";
            $this ->setQuery($sql);
            return $this -> loadRow(array($id));
        }

        public function getPostBySearch($search,$number_in_on_page, $clear, $order_by, $action){
            $sql = "SELECT p.*, c.title
            FROM products p
            JOIN post_category pc ON p.id_category = pc.category_id
            JOIN categories c ON pc.category_id = c.id
            WHERE p.name LIKE '%$search%' AND p.id_category IS NOT NULL
            $order_by $action
            LIMIT $number_in_on_page
            OFFSET $clear;";
            // $sql = "select * FROM product where name like '%$search%' and id_category is not null $order_by $action limit $number_in_on_page
            // offset $clear;"; 
            $this ->setQuery($sql);
            // lấy dữ liệu nhiều dùng 
            return $this -> loadAllRows();
        } 

        //lấy ra sản phẩm nổi bật

        // public function getfeaturedProducts(){
        //     $sql = "select * from product where view_number >= 10 and id_category is not null limit 0, 8";
        //     $this->setQuery($sql);
        //     return $this->loadAllRows();
        // }  

        public function getNewPost() {
            // $sql = "SELECT * FROM `posts` where id_category is not null ORDER BY id DESC LIMIT 0, 4;";
            $sql = "SELECT p.* FROM `posts` p
            JOIN `post_category` pc ON p.id = pc.post_id
            WHERE pc.category_id IS NOT NULL
            ORDER BY p.id DESC LIMIT 0, 4";
            $this->setQuery($sql);
            return $this->loadAllRows();
        }

        public function getPostByCateory($id_category, $search, $number_in_on_page, $clear, $order_by, $action) {
            $string = 'id_category is not null';
            if($id_category != "") {
                $string = 'id_category  = '.$id_category;
            }
            $sql = "SELECT * FROM `posts` where $string And name like '%$search%' $order_by $action limit $number_in_on_page
            offset $clear;";
            $this->setQuery($sql);
            return $this->loadAllRows();
        }

        //lấy ra số lượng 

        public function get_count_search($search) {
            $sql = "select count(*) from posts where name like '%$search%' and id_category is not null";
            $this -> setQuery($sql);
            return $this->loadRecord();
        }
    }