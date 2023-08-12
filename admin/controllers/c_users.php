<?php

@session_start();

include('./models/m_users.php');

class c_users
{
    // lấy ra tất cả thành viên
    public function get_all_users()
    {
        $search = '';
        if (isset($_GET['search'])) {
            $search =  $_GET['search'];
        }
        $m_user = new m_users();
        $list_staffs = $m_user->get_all_users($search);
        $view = 'views/v_users.php';
        include('templates/admin/layout.php');
    }
    // thêm thành viên
    public function add_one_users()
    {
        if (isset($_POST['submit'])) {
            $username = $_POST['username-user'];
            $fullname = $_POST['fullname-user'];
            $email = $_POST['email-user'];
            $password = $_POST['password-user'];
            $image = $_FILES['picture'];
            $picture = ($image['error'] == 0) ? $image['name'] : '';
            $address = $_POST['address-user'];
            $phone = $_POST['phone-user'];
            $role = $_POST['role-user'];
            if ($picture != '') {
                $file_extension = explode('.', $picture)[1];
                $file_name = time() . '.' . $file_extension;
            }
            $m_user = new m_users();
            $result = $m_user->add_one_users( $username, $fullname, $password, $email, $address, $phone, $file_name, $role);
            if ($result) {
                $folder = 'public/images/user/';
                $path_file = $folder . $file_name;
                move_uploaded_file($image['tmp_name'], $path_file);
            }
            header('location: user.php');
        
        }
    }
    // xóa thành viên
    public function delete_one_users()
    {
        $m_user = new m_users();
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $result = $m_user->delete_one_users($id);
            if ($result) {
                header('location: user.php?success=Xóa thành công!');
            } else {
                header('location: user.php?error=Xóa thất bại!');
            }
        }
    }
    // update thông tin thành viên
    public function update_users()
    {
        $m_user = new m_users();
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $info = $m_user->get_one_users_by_id($id);
            $view = 'views/v_edit_user.php';
            include('templates/admin/layout.php');
        }
        if (isset($_POST['submit'])) {
            $id = $_POST['id-user'];
            $username = $_POST['username-user'];
            $fullname = $_POST['fullname-user'];
            $email = $_POST['email-user'];
            $password = $_POST['password-user'];
            $image_new = $_FILES['picture-new'];
            $picture = ($image_new['error'] == 0) ? $image_new['name'] : '';
            $address = $_POST['address-user'];
            $phone = $_POST['phone-user'];
            $role = $_POST['role-user'];
            if ($image_new['size'] > 0 && $image_new['error'] == 0) {
                $file_extension = explode('.', $image_new['name'])[1];
                $file_name = time() . '.' . $file_extension;
            
            $result = $m_user->update_one_users($id, $username, $fullname, $password, $email, $address, $phone, $file_name, $role);
            if ($result) {
                $folder = 'public/images/user/';
                $path_file = $folder . $file_name;
                move_uploaded_file($image_new['tmp_name'], $path_file);
            }
            header('location: user.php');
        }
    }
}
}
