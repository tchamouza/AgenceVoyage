<?php
namespace App\Models;

use App\Core\Model;

class User extends Model {
    protected $table = 'utilisateurs';
    
    public function findByEmail($email) {
        $stmt = $this->db->prepare("SELECT * FROM {$this->table} WHERE email = ?");
        $stmt->execute([$email]);
        return $stmt->fetch();
    }
    
    public function emailExists($email, $excludeId = null) {
        $sql = "SELECT COUNT(*) FROM {$this->table} WHERE email = ?";
        $params = [$email];
        
        if ($excludeId) {
            $sql .= " AND id != ?";
            $params[] = $excludeId;
        }
        
        $stmt = $this->db->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchColumn() > 0;
    }
    
    public function updatePassword($id, $password) {
        $stmt = $this->db->prepare("UPDATE {$this->table} SET motdepasse = ? WHERE id = ?");
        return $stmt->execute([password_hash($password, PASSWORD_DEFAULT), $id]);
    }
    
    public function createUser($data) {
        $data['motdepasse'] = password_hash($data['motdepasse'], PASSWORD_DEFAULT);
        return $this->create($data);
    }
}
?>