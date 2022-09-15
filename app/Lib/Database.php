<?php

class Database {

    private $host = 'localhost';
    private $user = 'root';
    private $password = '';
    private $bankData = 'base_data_mvc';
    private $port = '3306';
    private $dbh;
    private $stmt;

    public function __construct()
    {

        $dsn = 'mysql:host='.$this -> host.';port='.$this -> port.'.dbname='.$this -> bankData;
        $options = [
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ];

        try {
            $this -> dbh = new PDO($dsn, $this -> user, $this -> password, $options);
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
        
    }

    public function query($sql) {
        $this -> stmt = $this -> dbh -> prepare($sql);
    }

    public function bind($parameter, $value, $type = null) {
        if (is_null($type)) {
            switch(true) {
                case is_int($value):
                    $type = PDO::PARAM_INT;
                break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                break;
                default:
                $type = PDO::PARAM_STR;
            }
        }

        $this -> stmt -> bindValue($parameter, $value, $type);

    }

    public function execute() {
        return $this -> stmt -> execute();
    }

    public function result() {
        $this -> execute();
        return $this -> stmt -> fetch(PDO::FETCH_OBJ);
    }

    public function results() {
        $this -> execute();
        return $this -> stmt -> fetchAll(PDO::FETCH_OBJ);
    }

    public function totalResults() {
        return $this -> stmt -> rowCount();
    }

    public function lastInsertId() {
        return $this -> stmt -> lastInsertId();
    }

}


?>