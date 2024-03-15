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
        $this->db->query("SELECT email, password FROM users WHERE email = :e");
        $this->db->bind(":e", $email);

        if ($this->db->result()) {
            $result = $this->db->result();
            if (password_verify($password, $result->password)) {
                return $result;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
}
