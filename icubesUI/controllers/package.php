<?php 
require_once "BaseController.php";

 class Package extends BaseController {
     public function __construct()
     {
         parent::__construct(); 
     }

     public function manage () {
        require_once "{$this->_base_path}/pages/package/package_list.php";
     }
     public function view ($packageid = false) {
        if($packageid) {
            require_once "{$this->_base_path}/pages/package/view_package.php";
         }
     }
     public function scraper () {
            require_once "{$this->_base_path}/pages/package/view_scraper.php";
     }
 }
?>