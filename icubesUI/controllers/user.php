<?php 
require_once "BaseController.php";

 class User extends BaseController {
     
     public function __construct()
     {
         parent::__construct(); 
     }

     public function dashboard () {
        require_once "{$this->_base_path}/pages/dashboard.php";
     }

     public function profile () {
         require_once "{$this->_base_path}/pages/profile.php";
     }

     public function manage () 
     {
        require_once "{$this->_base_path}/pages/users/users_list.php";
     }

     public function view ($username = false){
         require_once "{$this->_base_path}/pages/users/view_user.php";
     }
 }
?>