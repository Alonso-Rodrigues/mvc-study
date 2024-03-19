<?php

class Users extends Controller
{
    private $userModel;

    public function __construct()
    {
        $this->userModel = $this->model('User');
    }

    // Controller register user
    public function register()
    {
        $form = filter_input_array(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS);
        if (isset($form)) {
            $data = [
                'name' => trim($form['name']),
                'email' => trim($form['email']),
                'password' => trim($form['password']),
                'confirm_password' => trim($form['confirm_password']),
            ];

            if (in_array("", $form)) {
                if (empty($form['name'])) {
                    $data['error_name'] = 'Fill in the field';
                }
                if (empty($form['email'])) {
                    $data['error_email'] = 'Fill in the field';
                }
                if (empty($form['password'])) {
                    $data['error_password'] = 'Fill in the field';
                }
                if (empty($form['confirm_password'])) {
                    $data['error_confirm_password'] = 'Confirm the Password';
                }
            } else {
                if (Checker::checkName($form['name'])) {
                    $data['error_name'] = 'The name provided is invalid';
                } elseif (Checker::checkEmail($form['email'])) {
                    $data['error_email'] = 'The email provided is invalid';
                } elseif ($this->userModel->checkEmail($form['email'])) {
                    $data['error_email'] = 'The email provided is already in use';
                } elseif (strlen($form['password']) < 6) {
                    $data['error_password'] = 'Password must be at least 6 characters';
                } elseif ($form['password'] != $form['confirm_password']) {
                    $data['error_confirm_password'] = "Passwords don't match";
                } else {
                    $data['password'] = password_hash($form['password'], PASSWORD_DEFAULT);

                    if ($this->userModel->store($data)) {
                        session::message('user', 'Registration completed successfully!');
                        header('Location: ' . url . '/pages/home');
                    } else {
                        die("Error to store");
                    }
                }
            }
        } else {
            $data = [
                'name' => '',
                'email' => '',
                'password' => '',
                'confirm_password' => '',
                'error_name' => '',
                'error_email' => '',
                'error_password' => '',
                'error_confirm_password' => '',
            ];
        }
        $this->view('users/register', $data);
    }

    //Controller Login
    public function login()
    {
        $form = filter_input_array(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS);
        if (isset($form)) {
            $data = [
                'email' => trim($form['email']),
                'password' => trim($form['password']),
            ];

            if (in_array("", $form)) {
                if (empty($form['email'])) {
                    $data['error_email'] = 'Fill in the field';
                }
                if (empty($form['password'])) {
                    $data['error_password'] = 'Fill in the field';
                }
            } else {
                if (Checker::checkEmail($form['email'])) {
                    $data['error_email'] = 'The email provided is invalid';
                } else {
                    $user = $this->userModel->checkLogin($form['email'], $form['password']);

                    if ($user) {
                        $this->createSessionUser($user);
                    } else {
                        session::message('user', 'Username or password is invalid!', 'alert alert-danger');
                    }
                }
            }
        } else {
            $data = [
                'email' => '',
                'password' => '',
                'error_email' => '',
                'error_password' => '',
            ];
        }
        $this->view('users/login', $data);
    }

    // Create user session 
    private function createSessionUser($user)

    {
        $_SESSION['user_id'] = $user->id;
        $_SESSION['user_name'] = $user->name;
        $_SESSION['user_email'] = $user->email;
        header('Location: ' . url . '/pages/home');
        exit();
    }

    // Destroy user session
    public function logOut()
    {
        unset($_SESSION['user_id']);
        unset($_SESSION['user_name']);
        unset($_SESSION['user_email']);
        session_destroy();
        header('Location: ' . url . '/pages/home');
        exit();
    }
}
