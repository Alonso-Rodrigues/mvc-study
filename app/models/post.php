<?php

class Post
{
    private $db;

    public function __construct()
    {
        $this->db = new DataBase();
    }

    // to register posts
    public function store($data)
    {
        $this->db->query("INSERT INTO posts (user_id, title, text) VALUES (:user_id, :title, :text)");

        $this->db->bind("user_id", $data['user_id']);
        $this->db->bind("title", $data['title']);
        $this->db->bind("text", $data['text']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
