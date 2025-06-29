<?php
class Reservation {
    private $pdo;
    
    public function __construct($pdo) {
        $this->pdo = $pdo;
    }
    
    public function create($data) {
        $sql = "INSERT INTO reservation (numerodevol, name, email, phone, depart, arrive, date, tarif)
                VALUES (:numerodevol, :name, :email, :phone, :depart, :arrive, :date, :tarif)";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute($data);
    }
    
    public function findByEmail($email) {
        $sql = "SELECT * FROM reservation WHERE email = ? ORDER BY date DESC";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$email]);
        return $stmt->fetchAll();
    }
    
    public function findLatestByEmail($email) {
        $sql = "SELECT * FROM reservation WHERE email = ? ORDER BY id DESC LIMIT 1";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$email]);
        return $stmt->fetch();
    }
    
    public function deleteExpired($email) {
        $dateLimite = date('Y-m-d', strtotime('-30 days'));
        $sql = "DELETE FROM reservation WHERE email = ? AND date < ?";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$email, $dateLimite]);
    }
    
    public function generateFlightNumber() {
        return 'FLIGHT' . str_pad(rand(1, 99999), 5, '0', STR_PAD_LEFT);
    }
}
?>