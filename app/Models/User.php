<?php

class User
{

    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function checkEmail($email) {
        $this->db->query("SELECT email FROM users WHERE email = :e");
        $this->db->bind(":e", $email);

        if ($this->db->result()) {
            return true;
        } else {
            return false;
        }
    }

    public function store($dados)
    {

        $this->db->query("INSERT INTO users(name, email, password) VALUES (:name, :email, :password)");
        $this->db->bind("name", $dados['name']);
        $this->db->bind("email", $dados['email']);
        $this->db->bind("password", $dados['password']);

        if ($this->db->exec()) {
            return true;
        } else {
            return false;
        }
    }
}
