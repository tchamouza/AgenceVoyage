<?php
class User {
    private $pdo;
    
    public function __construct($pdo) {
        $this->pdo = $pdo;
    }
    
    public function create($data) {
        $sql = "INSERT INTO utilisateurs (nom, prenoms, email, age, telephone, motdepasse, image)
                VALUES (:nom, :prenoms, :email, :age, :telephone, :motdepasse, :image)";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute($data);
    }
    
    public function findByEmail($email) {
        $sql = "SELECT * FROM utilisateurs WHERE email = :email";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['email' => $email]);
        return $stmt->fetch();
    }
    
    public function findById($id) {
        $sql = "SELECT * FROM utilisateurs WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch();
    }
    
    public function update($id, $data) {
        $sql = "UPDATE utilisateurs SET 
                nom = :nom, 
                prenoms = :prenoms, 
                email = :email, 
                age = :age, 
                telephone = :telephone, 
                image = :image
                WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $data['id'] = $id;
        return $stmt->execute($data);
    }
    
    public function updatePassword($id, $password) {
        $sql = "UPDATE utilisateurs SET motdepasse = :motdepasse WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            'motdepasse' => password_hash($password, PASSWORD_DEFAULT),
            'id' => $id
        ]);
    }
    
    public function emailExists($email, $excludeId = null) {
        $sql = "SELECT COUNT(*) FROM utilisateurs WHERE email = :email";
        if ($excludeId) {
            $sql .= " AND id != :id";
        }
        $stmt = $this->pdo->prepare($sql);
        $params = ['email' => $email];
        if ($excludeId) {
            $params['id'] = $excludeId;
        }
        $stmt->execute($params);
        return $stmt->fetchColumn() > 0;
    }
}
?>