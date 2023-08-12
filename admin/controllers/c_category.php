

<?php

include('./models/m_category.php');

class c_category
{
    // render danh sách danh mục sản phẩm
    public function show()
    {
        $product_category = new m_category();
        $category_type = $product_category->get_category_type();
        // tìm kiếm sản phẩm
        $search = '';
        if (isset($_GET['search'])) {
            $search = $_GET['search'];
        }
        // phân trang
        $page = 1;
        if (isset($_GET['page'])) {
            $page = $_GET['page'];
        }
        $number_count = $product_category->get_count_search($search);
        $number_in_on_page = 3;
        $number_page = ceil($number_count / $number_in_on_page);
        $clear = $number_in_on_page * ($page - 1);
        $category = $product_category->get_category($search, $number_in_on_page, $clear);
        $view = './views/v_category.php';
        include('templates/admin/layout.php');
    }

    // thêm mới sản phẩm
    public function add_category()
    {
        $product_category = new m_category();
        if (isset($_POST['submit'])) {
            $name_product_category = $_POST['name-product-category'];
            $desc_product_category = $_POST['desc-product-category'];
            $result = $product_category->add_category($name_product_category, $desc_product_category);
            if ($result) {
                header('location: category.php?success=Thêm mới thể loại thành công!');
            } else {
                echo 'Thêm mới thất bại';
                header('location: category.php?error=Thêm mới thể loại thất bại!');
            }
        }
    }

    // update danh mục sản phẩm
    public function update_category()
    {
        $product_category = new m_category();
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $category_item = $product_category->get_category_by_id($id);
            $category_type = $product_category->get_category_type();
            $view = './views/v_edit-category.php';
            include('templates/admin/layout.php');
        }
        if (isset($_POST['submit'])) {
            $category_type = $_POST['id-product-category'];
            $name_product_category = $_POST['name-product-category'];
            $desc_product_category = $_POST['desc-product-category'];
     
            $result = $product_category->update_category($category_type, $name_product_category, $desc_product_category);
            echo '<pre>';
            print_r($result);
            echo '</pre>';
            // die();
            if ($result) {
                header('location: category.php?success=Cập nhật thể loại thành công!');
            } else {
                echo 'Cập nhật thất bại';
                header('location: category.php?error=Cập nhật thể loại thất bại!');
            }
        }
    }

    // xóa danh mục sản phẩm
    public function delete_category()
    {
        $product_category = new m_category();
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $result = $product_category->delete_post_category($id);
            if ($result) {
                header('location: category.php?success=Xóa thể loại thành công!');
            } else {
                header('location: category.php?error=Xóa thể loại thất bại!');
            }
        }
    }
}