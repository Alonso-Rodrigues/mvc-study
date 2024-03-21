<?php

class Posts extends controller
{
    // Restricting post changes to logged in users
    private $postModel;
    private $userModel;

    public function __construct()
    {
        if (!session::userLogged()) {
            url::redirect('users/login');
        }

        $this->postModel = $this->model('Post');
        $this->userModel = $this->model('User');
    }

    //Controller index posts
    public function index()
    {
        // to show posts in the index
        $data = [
            'posts' => $this->postModel->readPosts()
        ];

        $this->view('posts/index', $data);
    }

    // Controller posts
    public function register()
    {
        $form = filter_input_array(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS);
        if (isset($form)) {
            $data = [
                'title' => trim($form['title']),
                'text' => trim($form['text']),
                'user_id' =>  $_SESSION['user_id']
            ];

            if (in_array("", $form)) {
                if (empty($form['title'])) {
                    $data['error_title'] = 'Fill in the title field';
                }
                if (empty($form['text'])) {
                    $data['error_text'] = 'Fill in the text field';
                }
            } else {
                if ($this->postModel->store($data)) {
                    session::message('post', 'Post registration successfully!');
                    url::redirect('posts');
                } else {
                    die("Error storing posts");
                }
            }
        } else {
            $data = [
                'title' => '',
                'text' => '',
                'error_title' => '',
                'error_text' => '',
            ];
        }
        $this->view('posts/register', $data);
    }

    public function show($id){
        $post = $this->postModel->readPostId($id);
        $user = $this->userModel->readUserId($post[0]->user_id);

        $data = [
            'post' => $post, 
            'user' => $user
        ];
        $this->view('posts/show', $data);
    }
}
