<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reports extends CI_Controller {
    
    public function __construct(): void {
        parent::__construct();
        $this->load->model($reportsModel);
    }
    
    public function index() {
        
    }
    
}