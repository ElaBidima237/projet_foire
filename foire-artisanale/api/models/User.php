<?php
require '../api/config/database.php';

class User {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance();
    }

    public function create($data) {
        $stmt = $this->db->prepare("INSERT INTO users (nom, email, password) VALUES (:nom, :email, :password)");
        return $stmt->execute($data);
    }

    public function findByEmail($email) {
      $stmt = $this->db->prepare("INSERT INTO users (nom, email, password) VALUES (:nom, :email, :password)");
$stmt->execute([
    ':nom' => $data['nom'],
    ':email' => $data['email'],
    ':password' => $data['password']
]);
        return $stmt->fetch();
    }
}