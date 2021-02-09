<?php
require_once "BaseController.php";
class Auth extends BaseController{
    private $startTime; 
    public function __construct()
    {
        $this->startTime = microtime();
        // echo "Inside COnstructor". $this->startTime;
    }
    public function login ($t = FALSE) {
        // echo "<br/>".$this->startTime;
        require_once "{$this->_base_path}/pages/login.php";
        // $endTime = microtime();
        // echo "End TIme: ".$endTime;
        // echo $endTime - $this->startTime;
    }


}