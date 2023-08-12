<?php
include_once './models/m_login.php';

@session_start();

class c_login
{
    public function check_login()
    {
        if (isset($_POST['login'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $this->save_login_session($username, $password);
            if (isset($_SESSION['admin_id']) && $_SESSION['admin_id'] != 2) {
                header('location: home.php');
            } else {
                $_SESSION['error_login'] = "Sai thông tin đăng nhập";
                header('location: index.php');
            }
        }
    }
    public function save_login_session($username, $password)
    {
        $m_login = new m_login();
        $admin = $m_login->read_check_login($username, $password);
        if (!empty($admin)) {
            $_SESSION['admin_id'] = $admin->id;
            $_SESSION['admin_name'] = $admin->username;
            $_SESSION['admin_fullname'] = $admin->fullname;
            $_SESSION['admin_email'] = $admin->email;
            $_SESSION['admin_address'] = $admin->address;
            $_SESSION['admin_phone'] = $admin->phone_number;
            $_SESSION['admin_picture'] = $admin->picture;
            $_SESSION['admin_role'] = $admin->role;
            // header('location: index.php');
        }
    }
    // đăng xuất
    public function check_logout()
    {
        unset($_SESSION['admin_id']);
        unset($_SESSION['admin_name']);
        unset($_SESSION['admin_fullname']);
        unset($_SESSION['admin_email']);
        unset($_SESSION['admin_address']);
        unset($_SESSION['admin_phone']);
        unset($_SESSION['admin_picture']);
        unset($_SESSION['admin_role']);
        unset($_SESSION['error_login']);
        header('location: index.php');
    }
}