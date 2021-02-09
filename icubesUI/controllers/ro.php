<?php

require_once "BaseController.php";
class Ro extends BaseController {

    public function __construct()
    {
        parent::__construct();
    }


    public function manage() 
    {
       require_once "{$this->_base_path}/pages/ro/release_order.php";  
    }

    public function view($roid = false){
        if($roid) {
           require_once "{$this->_base_path}/pages/ro/view_roid.php";   
        }
    }

    
}