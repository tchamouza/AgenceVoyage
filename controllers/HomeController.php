<?php
require_once 'controllers/BaseController.php';

class HomeController extends BaseController {
    
    public function index() {
        $this->view('home/index');
    }
    
    public function services() {
        $this->view('home/services');
    }
    
    public function about() {
        $this->view('home/about');
    }
}
?>