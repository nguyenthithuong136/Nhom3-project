

<?php
 include('./models/m_post.php');

class c_post

{
    public function show()
{
    $post = new m_post();
    // tìm kiếm bài đăng
    $search = '';
    if (isset($_GET['search'])) {
        $search = $_GET['search'];
    }
    // phân trang
    $page = 1;
    if (isset($_GET['page'])) {
        $page = $_GET['page'];
    }
    $number_count = $post->get_count_search($search);
    $number_in_on_page = 3;
    $number_page = ceil($number_count / $number_in_on_page);
    $clear = $number_in_on_page * ($page - 1);
    $post_list = $post->get_post($search, $number_in_on_page, $clear);

    // Lấy danh sách thể loại (category) để hiển thị
    $category_list = $post->get_all_category_type();

    $view = './views/v_post.php';
    include('templates/admin/layout.php');
}


  
    public function get_all_post_category()
    {   
        
        $get_all = new m_post();
        $list_product_category = $get_all->get_all_post_category();
        $view = ('./views/v_post.php');
        include('templates/admin/layout.php');
    }
    public function get_all_post()
    {   
      
        $get_all_product = new m_post();
        // tìm kiếm
        $search = '';
        if (isset($_GET['search'])) {
            $search = $_GET['search'];
            echo 'search: ' . $search;
            $number_count = $get_all_product->get_count_search($search);
            $view = ('./views/v_post.php');
            include('templates/admin/layout.php');
        }
        $list_all_product = $get_all_product->get_all_post();
        $view = ('./views/v_post.php');
        include('templates/admin/layout.php');
    }



    public function create_post()
{   
    $create_post = new m_post();
    $category_type = $create_post->get_all_category_type();

    if (isset($_POST['submit-post'])) {
        $name = isset($_POST['name']) ? $_POST['name'] : '';
        $detail = isset($_POST['detail']) ? $_POST['detail'] : '';
        $id_category = isset($_POST['id_category']) ? $_POST['id_category'] : '';

        if (isset($_FILES['picture']) && $_FILES['picture']['error'] == 0) {
            $image = $_FILES['picture'];
            $file_extension = pathinfo($image['name'], PATHINFO_EXTENSION);
            $file_name = time() . '.' . $file_extension;
            $folder = 'public/images/posts/';
            $path_file = $folder . $file_name;
            if (move_uploaded_file($image['tmp_name'], $path_file)) {
                $id_category = isset($_POST['id_category']) ? $_POST['id_category'] : '';
                $result = $create_post->add_post_with_category($name, $detail, $file_name, $id_category);
                if ($result) {
                    header('location: v_post.php');
                    exit();
                } else {
                    echo "Lỗi khi thêm bài đăng vào cơ sở dữ liệu.";
                }
            } else {
                echo "Lỗi khi tải lên tệp ảnh.";
            }
        } else {
            echo "Vui lòng chọn một hình ảnh.";
        }
    }
    include('templates/admin/layout.php');
}



    public function upload_post()
    {   
       
        $upload_post = new m_post();
        $category_type = $upload_post->get_all_category_type();
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $post_info = $upload_post->get_post_by_id($id);
            // $category_type = $upload_post->get_all_category_type();
        }
        if (isset($_POST['submit-update'])) {
            $name = $_POST['name'];
            $detail = $_POST['detail'];
            $image = $_FILES['image'];
            $id_category = $_POST['id_category'];
            $picture = ($image['error'] == 0) ? $image['name'] : '';
            $id_category = $_POST['id_category'];
            if ($image != "" && $image['size']>0) {
                $folder = 'public/images/posts/';
                $file_extension = explode('.', $picture)[1];
                $file_name = time() . '.' . $file_extension;
                $path_file = $folder . $file_name;
                if (move_uploaded_file($image['tmp_name'], $path_file)) {
                    // Cập nhật bài đăng và liên kết với thể loại
                    $upload_post->update_post_with_category($id, $name, $detail, $file_name, $id_category);
                    $post_list = $upload_post->get_all_post();
                    header('location:post.php');
                } else {
                    echo "Lỗi khi tải lên tệp ảnh.";
                }
            } else {
                echo "Lỗi khi tải lên ảnh.";
            }
        }
        $view = './views/v_edit-post.php';
        include('templates/admin/layout.php');
    }
    // public function delete_post()
    // {   
      
    //     $delete_product = new m_post();
    //     if (isset($_GET['id'])) {
    //         $id =  $_GET['id'];
            // $product_id = $delete_product->get_post_by_id($id);
//             $result = $delete_product->delete_post_with_category($id);
//             if ($result) {
//                 header('location: post.php?success=Xóa bài đăng thành công thành công!');
//             } else {
//                 header('location: post.php?success=Xóa bài đăng thất bại!');
//             }
//         }
//     }
// }
public function delete_product()
 {   

    $delete_product = new m_post();
    if (isset($_GET['id'])) {
        $id =  $_GET['id'];
        $product_id = $delete_product->get_post_by_id($id);
        $result = $delete_product->delete_product($id);
        if ($result) {
            echo "<script>alert('thành công')</script>";
            header('location: post.php');
        } else {
            echo "<script>alert('thất bại')</script>";
            header('location: post.php');
        }
    }
}
}