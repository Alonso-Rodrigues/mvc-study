<?php

class Post
{
    private $db;

    public function __construct()
    {
        $this->db = new DataBase();
    }

    // to read posts from data base
    public function readPosts()
    {
        $this->db->query(
            "SELECT *,
        posts.id as postID,
        posts.created_in as postsDateRegister, 
        users.id as userID, 
        users.created_in as usersDateRegister
    FROM posts
    INNER JOIN users ON
        posts.user_id = users.id;
    "
        );
        return $this->db->result();
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
