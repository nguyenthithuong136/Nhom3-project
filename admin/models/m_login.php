

<?php

include_once '../models/database.php';

class m_login extends database
{
    public function read_check_login($username, $password)
    {
        $sql = "select * from users
            where username = ? and password = ?;";
        $this->setQuery($sql);
        return $this->loadRow(array($username, $password));
    }
}