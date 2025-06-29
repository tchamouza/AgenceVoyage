<?php
require_once 'controllers/BaseController.php';
require_once 'models/Reservation.php';

class ReservationController extends BaseController {
    private $reservationModel;
    
    public function __construct() {
        parent::__construct();
        $this->reservationModel = new Reservation($this->pdo);
    }
    
    public function index() {
        $this->requireAuth();
        
        // Suppression automatique des réservations expirées
        $this->reservationModel->deleteExpired($_SESSION['utilisateur']['email']);
        
        // Récupération des réservations actuelles
        $reservations = $this->reservationModel->findByEmail($_SESSION['utilisateur']['email']);
        
        $this->view('reservation/index', ['reservations' => $reservations]);
    }
    
    public function create() {
        $this->requireAuth();
        $utilisateur = $_SESSION['utilisateur'];
        $this->view('reservation/create', ['utilisateur' => $utilisateur]);
    }
    
    public function store() {
        $this->requireAuth();
        $errors = [];
        
        $numerodevol = $this->reservationModel->generateFlightNumber();
        $name = htmlspecialchars($_POST['name']);
        $email = htmlspecialchars($_POST['email']);
        $phone = htmlspecialchars($_POST['phone']);
        $departure = htmlspecialchars($_POST['departure']);
        $arrival = htmlspecialchars($_POST['arrival']);
        $date = htmlspecialchars($_POST['date']);
        $tarif = htmlspecialchars($_POST['tarif']);
        
        if (empty($name) || empty($email) || empty($phone) || empty($departure) || 
            empty($arrival) || empty($date) || empty($tarif)) {
            $errors[] = 'Tous les champs sont obligatoires.';
        }
        
        if (empty($errors)) {
            $reservationData = [
                'numerodevol' => $numerodevol,
                'name' => $name,
                'email' => $email,
                'phone' => $phone,
                'depart' => $departure,
                'arrive' => $arrival,
                'date' => $date,
                'tarif' => $tarif
            ];
            
            try {
                if ($this->reservationModel->create($reservationData)) {
                    $this->redirect('/confirmation');
                }
            } catch (PDOException $e) {
                $errors[] = "Erreur lors de la réservation : " . $e->getMessage();
            }
        }
        
        $utilisateur = $_SESSION['utilisateur'];
        $this->view('reservation/create', ['errors' => $errors, 'utilisateur' => $utilisateur]);
    }
    
    public function confirmation() {
        $this->requireAuth();
        
        $reservation = $this->reservationModel->findLatestByEmail($_SESSION['utilisateur']['email']);
        
        if (!$reservation) {
            $this->redirect('/reservation');
        }
        
        $this->view('reservation/confirmation', ['reservation' => $reservation]);
    }
}
?>