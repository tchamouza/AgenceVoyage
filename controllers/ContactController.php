<?php
require_once 'controllers/BaseController.php';
require_once 'models/Contact.php';

class ContactController extends BaseController {
    private $contactModel;
    
    public function __construct() {
        parent::__construct();
        $this->contactModel = new Contact($this->pdo);
    }
    
    public function index() {
        $this->view('contact/index');
    }
    
    public function store() {
        $errors = [];
        $success = '';
        
        // Récupération et validation des données
        $nom = htmlspecialchars(trim($_POST['name'] ?? ''));
        $email = filter_var(trim($_POST['email'] ?? ''), FILTER_SANITIZE_EMAIL);
        $message = htmlspecialchars(trim($_POST['message'] ?? ''));
        
        // Validation
        if (empty($nom)) {
            $errors[] = "Le nom est obligatoire";
        }
        
        if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Veuillez entrer une adresse email valide";
        }
        
        if (empty($message)) {
            $errors[] = "Le message ne peut pas être vide";
        }
        
        // Enregistrement en base si pas d'erreurs
        if (empty($errors)) {
            try {
                $contactData = [
                    'nom' => $nom,
                    'email' => $email,
                    'message' => $message
                ];
                
                if ($this->contactModel->create($contactData)) {
                    $success = "Votre message a bien été envoyé. Nous vous contacterons bientôt!";
                    // Réinitialisation des champs après envoi réussi
                    $_POST = [];
                }
            } catch (PDOException $e) {
                $errors[] = "Une erreur est survenue lors de l'envoi du message. Veuillez réessayer.";
            }
        }
        
        $this->view('contact/index', ['errors' => $errors, 'success' => $success]);
    }
}
?>