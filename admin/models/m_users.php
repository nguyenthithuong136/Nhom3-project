<?php

include('../models/database.php');

@session_start();

class m_users extends database
{
    // lấy ra danh sách tất cá nhân viên
    public function get_all_users($search)
    {
        $sql = "select * from users
                where role = 2 and username like '%$search%';";
        $this->setQuery($sql);
        return $this->loadAllRows();
    }
    // thêm nhân viên
    public function add_one_users($username, $fullname, $password, $email, $address, $phone, $img, $role)
    {
        $sql = "insert into users(username, fullname, password, email, address, phone, picture, role)
                values(?, ?, ?, ?, ?, ?, ?, ?);";
        $this->setQuery($sql);
        return $this->execute(array($username, $fullname, $password, $email, $address, $phone, $img, $role));
    }
    // xóa nhân viên
    public function delete_one_users($id)
    {
        $sql = "delete from users where id = ?";
        $this->setQuery($sql);
        return $this->execute(array($id));
    }
    // lấy sản phẩm theo id
    public function get_one_users_by_id($id)
    {
        $sql = "select * from users where id = ?";
        $this->setQuery($sql);
        return $this->loadRow(array($id));
    }
    // cập nhật thông tin nhân viên
    public function update_one_users($id, $username, $fullname, $password, $email, $address, $phone, $img, $role)
    {
        $sql = "update users
                set
                username = '$username',
                fullname = '$fullname',
                passWord = '$password',
                email = '$email',
                address = '$address', 
                phone = '$phone',
                picture = '$img',
                role = '$role'
                where 
                id = '$id';";
        $this->setQuery($sql);
        return $this->execute();
    }
}