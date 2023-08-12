<?php

@session_start();

include('./models/m_home.php');

class c_home
{
    public function show()
    {
        $m_home = new m_home();
        $count_posts = $m_home->count_post();
        $count_customers = $m_home->count_user();
        $count_categories = $m_home->count_categories();
        $count_comment = $m_home->count_comment();
        $view = './views/v_home.php';
        include('templates/admin/layout.php');
    }
}