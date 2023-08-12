<?php 
require_once ("database.php");

class models_user extends database{
   
    public function getAllUser(){
        $sql = "select * FROM users"; 
        $this ->setQuery($sql);
        // lấy dữ liệu 
        return $this -> loadAllRows();
    }
    public function getUserById($id) {
        $sql = "SELECT * FROM users WHERE id = ?";
        
        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([$id]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            return $user;
        } catch (PDOException $e) {
            die('Lỗi truy vấn: ' . $e->getMessage());
        }
    }
    
    
}