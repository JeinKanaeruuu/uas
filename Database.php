<?php 
namespace UAS;

class Database {
    private $db;
    public function __construct(){
        $dsn = 'mysql:host=localhost;dbname=uasekarang';
        $username = 'root';
        $password = '';

        $this->db = new \PDO($dsn, $username, $password);
    }

    public function getConnection(){
        return $this->db;
    }
}