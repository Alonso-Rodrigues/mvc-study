<?php

class Posts extends controller
{

    public function __construct()
    {
        if (!session::userLogged()) {
            url::redirect('users/login');
        }
    }

    public function index()
    {
        $this->view('posts/index');
    }
}
