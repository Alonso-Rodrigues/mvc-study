<?php

class User
{
    private $db;

    public function __construct()
    {
        $this->db = new DataBase();
    }

    public function store($data)
    {
        $this->db->query("INSERT INTO users(name, email, password) VALUES (:name, :email, :password)");
        $this->db->bind("name", $data['name']);
        $this->db->bind("email", $data['email']);
        $this->db->bind("password", $data['password']);
    }
}
