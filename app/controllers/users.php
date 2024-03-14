<?php

class Users extends Controller
{
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
                } elseif (strlen($form['password']) < 6) {
                    $data['error_password'] = 'Password must be at least 6 characters';
                } elseif ($form['password'] != $form['confirm_password']) {
                    $data['error_confirm_password'] = "Passwords don't match";
                } else {
                    echo "You can register the data <hr>";
                }
            }

            // var_dump($form);
        } else {
            $data = [
                'name' => '',
                'email' => '',
                'password' => '',
                'confirm_password' => '',
            ];
        }

        $this->view('users/register', $data);
    }
}
