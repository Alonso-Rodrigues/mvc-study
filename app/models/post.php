<?php

class Post
{
    private $db;

    public function __construct()
    {
        $this->db = new DataBase();
    }

    // To read posts from data base
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
            posts.user_id = users.id
            ORDER BY posts.id DESC"
        );
        return $this->db->results();
    }

    // To register posts
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

    // To read posts individually
    public function readPostId($id)
    {
        $this->db->query("SELECT * FROM posts WHERE id = :id");
        $this->db->bind('id', $id);
        return $this->db->result();
    }

    // To update posts
    public function update($data)
    {
        $this->db->query("UPDATE posts SET title = :title, text = :text WHERE id = :id");

        $this->db->bind("id", $data['id']);
        $this->db->bind("title", $data['title']);
        $this->db->bind("text", $data['text']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
