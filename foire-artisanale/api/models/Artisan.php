<?php
// app/models/Artisan.php

require '../config/database.php';

class Artisan {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance();
    }

    public function inscrire($data) {
        $stmt = $this->db->prepare("INSERT INTO artisans (nom, email, produit) VALUES (:nom, :email, :produit)");
        return $stmt->execute([
            ':nom' => $data['nom'],
            ':email' => $data['email'],
            ':produit' => $data['produit']
        ]);
    }

    public function getAll() {
        return $this->db->query("SELECT * FROM artisans")->fetchAll();
    }
}
?>