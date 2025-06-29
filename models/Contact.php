<?php
class Contact {
    private $pdo;
    
    public function __construct($pdo) {
        $this->pdo = $pdo;
    }
    
    public function create($data) {
        $sql = "INSERT INTO contacts (nom, email, message) VALUES (:nom, :email, :message)";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute($data);
    }
    
    public function findAll() {
        $sql = "SELECT * FROM contacts ORDER BY date_envoi DESC";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}
?>