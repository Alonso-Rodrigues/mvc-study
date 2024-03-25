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

    // To show post by id
    public function show($id = null)
    {
        $post = $this->postModel->readPostId($id);

        // Check that $post is not false before continuing
        if ($post !== false) {
            $user = $this->userModel->readUserId($post->user_id);

            $data = [
                'post' => $post,
                'user' => $user
            ];
            $this->view('posts/show', $data);
        } else {
            // Redirect to home page.
            url::redirect('posts');
        }
    }

    // To edit posts
    public function edit($id)
    {
        $form = filter_input_array(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS);
        if (isset($form)) {
            $data = [
                'id' => $id,
                'title' => trim($form['title']),
                'text' => trim($form['text']),
            ];

            if (in_array("", $form)) {
                if (empty($form['title'])) {
                    $data['error_title'] = 'Fill in the title field';
                }
                if (empty($form['text'])) {
                    $data['error_text'] = 'Fill in the text field';
                }
            } else {
                if ($this->postModel->update($data)) {
                    session::message('post', 'Post updated successfully!');
                    url::redirect('posts');
                } else {
                    die("Error updated posts");
                }
            }
        } else {
            $post = $this->postModel->readPostId($id);

            if ($post->user_id != $_SESSION['user_id']) {
                session::message('post', 'You do not have permission to edit!', 'alert alert-danger');
                url::redirect('posts');
            }

            $data = [
                'id' => $post->id,
                'title' => $post->title,
                'text' => $post->text,
                'error_title' => '',
                'error_text' => ''
            ];
        }
        $this->view('posts/edit', $data);
    }

    // To delete a post
    public function delete($id)
    {

        if (!$this->checkAutorization($id)) {
            // To check if I will actually receive numbers
            $id = filter_var($id, FILTER_VALIDATE_INT);
            $method = filter_input(INPUT_SERVER, 'REQUEST_METHOD', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            if ($id && $method == 'POST') {
                if ($this->postModel->delete($id)) {
                    session::message('post', 'Post successfully deleted!', 'alert alert-success');
                    url::redirect('posts');
                }
            } else {
                session::message('post', 'You do not have permission to delete this post!', 'alert alert-danger');
                url::redirect('posts');
            }
        } else {
            session::message('post', 'You do not have permission to delete this post!', 'alert alert-danger');
            url::redirect('posts');
        }
    }

    // To check if the user is loggin in or not
    private function checkAutorization($id)
    {

        $post = $this->postModel->readPostId($id);

        if ($post->user_id != $_SESSION['user_id']) {
            return true;
        } else {
            return false;
        }
    }
}

