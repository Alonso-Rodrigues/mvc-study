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

            if (empty($form['name'])) {
                $data['error_name'] = 'Fill in the field';
            }
            if (empty($form['email'])) {
                $data['error_email'] = 'Fill in the field';
            }
            if (empty($form['password'])) {
                $data['error_password'] = 'Fill in the field';
            } elseif (strlen($form['password']) < 6) {
                $data['error_password'] = 'Password must be at least 6 characters';
            }
            if (empty($form['confirm_password'])) {
                $data['error_confirm_password'] = 'Confirm the Password';
            } else {
                if ($form['password'] != $form['confirm_password']) {
                    $data['error_confirm_password'] = "Passwords don't match";
                }
            }
            if (!in_array("", $form)) {
                echo "You can register";
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
