<?php
require_once 'controllers/BaseController.php';
require_once 'models/User.php';

class AuthController extends BaseController {
    private $userModel;
    
    public function __construct() {
        parent::__construct();
        $this->userModel = new User($this->pdo);
    }
    
    public function showLogin() {
        $this->view('auth/login');
    }
    
    public function login() {
        $errors = [];
        
        $email = htmlspecialchars($_POST['email']);
        $motdepasse = $_POST['motdepasse'];
        
        if (empty($email) || empty($motdepasse)) {
            $errors[] = 'Veuillez remplir tous les champs.';
        } else {
            $utilisateur = $this->userModel->findByEmail($email);
            
            if ($utilisateur && password_verify($motdepasse, $utilisateur['motdepasse'])) {
                $_SESSION['utilisateur'] = $utilisateur;
                $this->redirect('/dashboard');
            } else {
                $errors[] = "Email ou mot de passe incorrect.";
            }
        }
        
        $this->view('auth/login', ['errors' => $errors]);
    }
    
    public function showRegister() {
        $this->view('auth/register');
    }
    
    public function register() {
        $errors = [];
        $success = '';
        
        // Récupération et nettoyage des données
        $nom = htmlspecialchars(trim($_POST['name']));
        $prenoms = htmlspecialchars(trim($_POST['prenoms']));
        $email = htmlspecialchars(trim($_POST['email']));
        $age = htmlspecialchars(trim($_POST['date']));
        $telephone = htmlspecialchars(trim($_POST['phone']));
        $motdepasse = $_POST['motdepasse'];
        $confirmemotdepasse = $_POST['confirmemotdepasse'];
        
        // Validation des champs requis
        if (empty($nom) || empty($prenoms) || empty($email) || 
            empty($age) || empty($telephone) || empty($motdepasse) || empty($confirmemotdepasse)) {
            $errors[] = 'Saisissez toutes les informations demandées.';
        }
        
        if (strlen($motdepasse) > 8 || strlen($motdepasse) < 4) {
            $errors[] = 'Le mot de passe doit contenir entre 4 et 8 caractères.';
        } elseif ($motdepasse !== $confirmemotdepasse) {
            $errors[] = 'Les mots de passe ne correspondent pas.';
        }
        
        // Vérification de l'email en base
        if (empty($errors) && $this->userModel->emailExists($email)) {
            $errors[] = "Cet email est déjà enregistré.";
        }
        
        // Traitement de l'image
        $image_name = '';
        if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
            $image_name = uniqid() . '_' . basename($_FILES['image']['name']);
            $image_tmp = $_FILES['image']['tmp_name'];
            $image_dir = 'uploads/' . $image_name;
            $image_ext = strtolower(pathinfo($image_name, PATHINFO_EXTENSION));
            $allowed = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
            
            if (!in_array($image_ext, $allowed)) {
                $errors[] = "Le format de l'image n'est pas autorisé.";
            }
            
            if ($_FILES['image']['size'] > 2 * 1024 * 1024) {
                $errors[] = "L'image est trop lourde (max 2 Mo).";
            }
        } else {
            $errors[] = "Erreur lors du téléchargement de l'image.";
        }
        
        // Enregistrement
        if (empty($errors)) {
            if (!file_exists('uploads')) {
                mkdir('uploads', 0777, true);
            }
            
            move_uploaded_file($image_tmp, $image_dir);
            
            $userData = [
                'nom' => $nom,
                'prenoms' => $prenoms,
                'email' => $email,
                'age' => $age,
                'telephone' => $telephone,
                'motdepasse' => password_hash($motdepasse, PASSWORD_DEFAULT),
                'image' => $image_name
            ];
            
            try {
                if ($this->userModel->create($userData)) {
                    $success = 'Inscription réussie.';
                }
            } catch (PDOException $e) {
                $errors[] = "Erreur lors de l'inscription : " . $e->getMessage();
            }
        }
        
        $this->view('auth/register', ['errors' => $errors, 'success' => $success]);
    }
    
    public function logout() {
        session_unset();
        session_destroy();
        $this->redirect('/login');
    }
}
?>