<?php

class c_home
{
    public function index()
    {
        include('models/models_post.php');
        $m_product= new models_post();
        // Lấy ra sản phẩm nổi bật        
        $featured_products = $m_product -> getPostById($id);
        // Láy ra sản phẩm mới nhất
        $new_products = $m_product -> getNewPost();

        $pots =  $m_product->getPost();

        $view = 'views/v_home.php';
        include('templates/client/layout.php');
    }
}