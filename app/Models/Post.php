<?php

class Post
{

    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function readPosts()
    {
        $this->db->query("SELECT *,
        posts.id as postID,
        posts.created_in as postRegistrationDate,
        users.id as userId,
        users.created_in as userResgistrationData
         FROM posts
         INNER JOIN users ON
         posts.id_user = users.id");
        return $this->db->results();
    }

    public function store($dados)
    {

        $this->db->query("INSERT INTO posts(id_user, title, text) VALUES (:id_user, :title, :text)");
        $this->db->bind("id_user", $dados['id_user']);
        $this->db->bind("title", $dados['title']);
        $this->db->bind("text", $dados['text']);

        if ($this->db->exec()) {
            return true;
        } else {
            return false;
        }
    }
}
