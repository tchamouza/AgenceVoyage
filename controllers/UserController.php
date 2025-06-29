<?php
require_once 'controllers/BaseController.php';
require_once 'models/User.php';

class UserController extends BaseController {
    private $userModel;
    
    public function __construct() {
        parent::__construct();
        $this->userModel = new User($this->pdo);
    }
    
    public function dashboard() {
        $this->requireAuth();
        $utilisateur = $_SESSION['utilisateur'];
        $this->view('user/dashboard', ['utilisateur' => $utilisateur]);
    }
    
    public function showProfile() {
        $this->requireAuth();
        $utilisateur_id = $_SESSION['utilisateur']['id'];
        $utilisateur = $this->userModel->findById($utilisateur_id);
        $this->view('user/profile', ['utilisateur' => $utilisateur]);
    }
    
    public function updateProfile() {
        $this->requireAuth();
        $errors = [];
        $success = '';
        $password_errors = [];
        $password_success = '';
        
        $utilisateur_id = $_SESSION['utilisateur']['id'];
        $utilisateur = $this->userModel->findById($utilisateur_id);
        
        // Si c'est une demande de changement de mot de passe
        if (isset($_POST['change_password'])) {
            $current_password = $_POST['current_password'];
            $new_password = $_POST['new_password'];
            $confirm_password = $_POST['confirm_password'];
            
            // Validation du mot de passe
            if (empty($current_password) || empty($new_password) || empty($confirm_password)) {
                $password_errors[] = 'Tous les champs sont obligatoires';
            } elseif ($new_password !== $confirm_password) {
                $password_errors[] = 'Les nouveaux mots de passe ne correspondent pas';
            } elseif (strlen($new_password) < 4 || strlen($new_password) > 8) {
                $password_errors[] = 'Le mot de passe doit contenir entre 4 et 8 caractères';
            } elseif (!password_verify($current_password, $utilisateur['motdepasse'])) {
                $password_errors[] = 'Mot de passe actuel incorrect';
            }
            
            // Mise à jour du mot de passe
            if (empty($password_errors)) {
                if ($this->userModel->updatePassword($utilisateur_id, $new_password)) {
                    $password_success = 'Mot de passe changé avec succès';
                } else {
                    $password_errors[] = 'Erreur lors de la mise à jour du mot de passe';
                }
            }
        } else {
            // Traitement des autres modifications de profil
            $nom = htmlspecialchars(trim($_POST['nom']));
            $prenoms = htmlspecialchars(trim($_POST['prenoms']));
            $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
            $date_naissance = htmlspecialchars(trim($_POST['date_naissance']));
            $telephone = htmlspecialchars(trim($_POST['telephone']));
            
            // Validation des champs
            $required_fields = ['nom', 'prenoms', 'email', 'date_naissance', 'telephone'];
            $errors = $this->validateRequired($required_fields, $_POST);
            
            // Validation email
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors[] = "Format d'email invalide";
            }
            
            // Vérification unicité email
            if (empty($errors) && $this->userModel->emailExists($email, $utilisateur_id)) {
                $errors[] = "Cet email est déjà utilisé par un autre compte";
            }
            
            // Gestion de l'image
            $image_name = $utilisateur['image'];
            
            if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
                $allowed_types = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];
                $max_size = 2 * 1024 * 1024; // 2Mo
                
                if (!in_array($_FILES['image']['type'], $allowed_types)) {
                    $errors[] = "Type d'image non supporté (JPEG, PNG, GIF, WebP seulement)";
                } elseif ($_FILES['image']['size'] > $max_size) {
                    $errors[] = "L'image ne doit pas dépasser 2Mo";
                } else {
                    $ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
                    $image_name = 'profile_' . uniqid() . '.' . $ext;
                    $target_path = 'uploads/' . $image_name;
                    
                    if (!file_exists('uploads')) {
                        mkdir('uploads', 0755, true);
                    }
                    
                    // Suppression ancienne image
                    if (!empty($utilisateur['image']) && file_exists('uploads/' . $utilisateur['image'])) {
                        unlink('uploads/' . $utilisateur['image']);
                    }
                    
                    if (!move_uploaded_file($_FILES['image']['tmp_name'], $target_path)) {
                        $errors[] = "Erreur lors du téléchargement de l'image";
                        $image_name = $utilisateur['image'];
                    }
                }
            }
            
            // Mise à jour si aucune erreur
            if (empty($errors)) {
                $userData = [
                    'nom' => $nom,
                    'prenoms' => $prenoms,
                    'email' => $email,
                    'age' => $date_naissance,
                    'telephone' => $telephone,
                    'image' => $image_name
                ];
                
                try {
                    if ($this->userModel->update($utilisateur_id, $userData)) {
                        // Mise à jour des données de session
                        $_SESSION['utilisateur']['nom'] = $nom;
                        $_SESSION['utilisateur']['prenoms'] = $prenoms;
                        $_SESSION['utilisateur']['email'] = $email;
                        $_SESSION['utilisateur']['image'] = $image_name;
                        
                        $success = "Profil mis à jour avec succès";
                        
                        // Rafraîchir les données
                        $utilisateur = $this->userModel->findById($utilisateur_id);
                    }
                } catch (PDOException $e) {
                    $errors[] = "Erreur lors de la mise à jour : " . $e->getMessage();
                }
            }
        }
        
        $this->view('user/profile', [
            'utilisateur' => $utilisateur,
            'errors' => $errors,
            'success' => $success,
            'password_errors' => $password_errors,
            'password_success' => $password_success
        ]);
    }
}
?>