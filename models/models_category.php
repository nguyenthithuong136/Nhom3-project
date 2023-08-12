<?php 
require_once ("database.php");
class models_category extends database{

   public function getCategory(){  
      $sql = "select * FROM categories"; 
      $this ->setQuery($sql);
      // lấy dữ liệu nhiều dùng 
      return $this -> loadAllRows();
   }
}
 