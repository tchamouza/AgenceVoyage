<?php
namespace App\Models;

use App\Core\Model;

class Reservation extends Model {
    protected $table = 'reservation';
    
    public function findByEmail($email) {
        $stmt = $this->db->prepare("SELECT * FROM {$this->table} WHERE email = ? ORDER BY date DESC");
        $stmt->execute([$email]);
        return $stmt->fetchAll();
    }
    
    public function findLatestByEmail($email) {
        $stmt = $this->db->prepare("SELECT * FROM {$this->table} WHERE email = ? ORDER BY id DESC LIMIT 1");
        $stmt->execute([$email]);
        return $stmt->fetch();
    }
    
    public function deleteExpired($email, $days = 30) {
        $dateLimite = date('Y-m-d', strtotime("-{$days} days"));
        $stmt = $this->db->prepare("DELETE FROM {$this->table} WHERE email = ? AND date < ?");
        return $stmt->execute([$email, $dateLimite]);
    }
    
    public function generateFlightNumber() {
        return 'FLIGHT' . str_pad(rand(1, 99999), 5, '0', STR_PAD_LEFT);
    }
}
?>