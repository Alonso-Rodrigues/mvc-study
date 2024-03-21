<?php

class User
{
    private $db;

    public function __construct()
    {
        $this->db = new DataBase();
    }

    // to register user
    public function store($data)
    {
        $this->db->query("INSERT INTO users (name, email, password) VALUES (:name, :email, :password)");

        $this->db->bind("name", $data['name']);
        $this->db->bind("email", $data['email']);
        $this->db->bind("password", $data['password']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    // to check if the email already exists in the database
    public function checkEmail($email)
    {
        $this->db->query("SELECT email FROM users WHERE email = :e");
        $this->db->bind(":e", $email);

        if ($this->db->result()) {
            return true;
        } else {
            return false;
        }
    }
    // to check login
    public function checkLogin($email, $password)
    {
        $this->db->query("SELECT * FROM users WHERE email = :e");
        $this->db->bind(":e", $email);

        $result = $this->db->result();

        if ($result) {
            $user = $result[0];
            if (password_verify($password,$user->password)) {
                return $user;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
}
