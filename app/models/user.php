<?php

class User
{
    private $db;

    public function __construct()
    {
        $this->db = new DataBase();
        if (!isset($email)) {
        }
    }

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
}
