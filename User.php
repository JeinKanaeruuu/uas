<?php
namespace UAS;

class User {
    private $db;
    public function __construct(Database $db){
        $this->db = $db;
    }

    public function createUser($name){
        $stmt= $this->db->getConnection()->prepare("INSERT INTO users (name) VALUES (?)");
        $stmt->execute([$name]);
    }

    public function getUser(){
        $stmt= $this->db->getConnection()->query("SELECT * FROM users ");
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function getUserSById($id){
        $stmt= $this->db->getConnection()->prepare("SELECT * FROM users WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    public function updateUser ($id, $name){
        $stmt= $this->db->getConnection()->prepare("UPDATE users SET name = ? WHERE id = ?");
        $stmt->execute([$name,$id]);
    }

    public function deleteUser($id){
        $stmt= $this->db->getConnection()->prepare("DELETE FROM users WHERE id = ?");
        $stmt->execute([$id]);
    }
}