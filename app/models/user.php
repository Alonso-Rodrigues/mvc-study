<?php

class User
{
    private $db;

    public function __construct()
    {
        $this->db = new DataBase();
    }

    // To register user
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
    // To check if the email already exists in the database
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
    // To check login
    public function checkLogin($email, $password)
    {
        $this->db->query("SELECT * FROM users WHERE email = :e");
        $this->db->bind(":e", $email);

        $result = $this->db->result();

        if ($result) {
            $user = $result;
            if (password_verify($password, $user->password)) {
                return $user;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    // To read user by id
    public function readUserId($id)
    {
        $this->db->query("SELECT * FROM users WHERE id = :id");
        $this->db->bind('id', $id);
        return $this->db->result();
    }

    // To update user
    public function updateUser($data){ {
            $this->db->query("UPDATE users SET name = :name, email = :email, password = :password, about = :about WHERE id = :id");

            $this->db->bind("id", $data['id']);
            $this->db->bind("name", $data['name']);
            $this->db->bind("email", $data['email']);
            $this->db->bind("password", $data['password']);
            $this->db->bind("about", $data['about']);

            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        } 
    }
}
