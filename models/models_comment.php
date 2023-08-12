<?php
require_once("database.php");
class models_comment extends database
{
     public function getComment()
     {
          $id_post = $_GET['id_posts'];
          $sql = "select *, TIME(comments.timecomment) as 'time_comment', DATE(comments.timecomment) as 'date_comment' FROM comments, posts , users , categories
          where users.id = comments.user_id and posts.id = comments.post_id
          and posts.category_id = categories.id  
          and posts.id = $id_post";
          $this->setQuery($sql);
          // lấy dữ liệu nhiều dùng 
          return $this->loadAllRows();
     }
     public function insertComment($id_user,$id_post,$content){
          $sql = "Insert into comments(user_id,post_id,comment_content) Values(?,?,?)";
          $this->setQuery($sql);
          return $this->execute(array($id_user,$id_post,$content));
     }
 
}
