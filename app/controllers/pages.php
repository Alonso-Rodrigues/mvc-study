<?php

class Pages extends Controller
{
    public function index()
    {   
        // To automatically redirect the posts page if the user is logged
        if (session::userLogged()) {
            url::redirect('posts');
        }

        $data = [
            'titlePage' => 'Home Page',
        ];
        $this->view('pages/home', $data);
    }

    public function about()
    {
        $data = [
            'titlePage' => 'About us',
        ];
        $this->view('pages/about', $data);
    }
}
