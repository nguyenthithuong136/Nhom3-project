<?php

class c_post
{
    public function index()
    {
        include('models/models_post.php');
        $m_product= new models_post();

        include('models/models_category.php');
        $m_category = new models_category();
        //Lấy ra thể loại danh mục sản phẩm
        // $categories_type = $m_category->getCategoryType();
        //Lấy ra danh mục sản phẩm
        $categories = $m_category->getCategory();

        //phân trang
        $search="";
        if(isset($_GET["search"])  && !empty($_GET["search"])) {
            $search=$_GET["search"];
        }
        $page = 1;
        if (isset($_GET['page'])) {
            $page = $_GET['page'];
        }
        $number_count = $m_product->get_count_search($search);
        $number_in_on_page = 12;
        $number_page = ceil($number_count / $number_in_on_page);
        $clear = $number_in_on_page * ($page - 1);

        //Xắp xếp sản phẩm
        $order = "";
        $order_by = "";
        $action = "";
        if(isset($_GET["order"]) && isset($_GET["action"])) {
            $order = $_GET["order"];
            $order_by = 'order by '.$order;
            $action = $_GET["action"];
        }

        // if(!isset($_GET["id_category"])) {
        //     $products = $m_product->getProductBySearch($search, $number_in_on_page, $clear, $order_by, $action);
        // } else {        //Lấy sản phẩm theo danh mục
        //     $id_category = $_GET["id_category"];
        //     $products = $m_product->getProductByCateory($id_category, $search, $number_in_on_page, $clear, $order_by, $action);
        // }

        // $view = 'views/products/v_product.php';
        // include('templates/client/layout.php');
    }
}