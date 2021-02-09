<?php
/* 
 * Database connection class 
 * @Author : Bhupendra Choudhary
 * @Date : 2020/12/11
 */

$configFile = parse_ini_file('dbConfig.ini.php');

class Database {
    private $_connection;
    private $_connection_galera;
    private static $_instance; //The single instance
    private $_host;
    private $_username;
    private $_password;
    private $_database;
    
    public static function getInstance() {
        
        if(!self::$_instance) { // If no instance then make one
            self::$_instance = new self();
        }
        
        return self::$_instance;
    }
    
    // Constructor
    public function __construct() {
        $this->_connection = $this->createConnection(); 
        $this->_connection_galera = $this->createConnectionGalera(); 
    }
    
    
    
    // Magic method clone is empty to prevent duplication of connection
    private function __clone() { }
	
    public function getConnection() {
        $conn = $this->_connection;
        
        if($conn->ping() == false) :
            $this->conn->close($conn);
            $conn=null;
            $conn= $this->createConnection();
        endif;

        return $conn;
    }
    
    public function getConnectionGalera() {
        $conn = $this->_connection_galera;
        
        if($conn->ping() == false) :
            $this->conn->close($conn);
            $conn=null;
            $conn= $this->createConnectionGalera();
        endif;

        return $conn;
    }
    
    private function createConnection() { 
        global $configFile;
        $this->_host = $configFile['mysql_server']['HOST'];
        $this->_username = $configFile['mysql_server']['USERNAME'];
        $this->_password = $configFile['mysql_server']['PASSWORD'];
        $this->_database = $configFile['mysql_server']['DATABASE'];
        
        $this->_connection = new mysqli($this->_host, $this->_username, 
        $this->_password, $this->_database);
        
        if(mysqli_connect_error()) {
            trigger_error("Failed to conencto to MySQL: " . mysql_connect_error(),E_USER_ERROR);
        }

        return $this->_connection;
    }
    
    private function createConnectionGalera() { 
        global $configFile;
        $this->_host = $configFile['galera_server']['HOST'];
        $this->_username = $configFile['galera_server']['USERNAME'];
        $this->_password = $configFile['galera_server']['PASSWORD'];
        $this->_database = $configFile['galera_server']['DATABASE'];
        
        $this->_connection_galera = new mysqli($this->_host, $this->_username, 
        $this->_password, $this->_database);
        
        if(mysqli_connect_error()) {
            trigger_error("Failed to conencto to MySQL: " . mysql_connect_error(),E_USER_ERROR);
        }

        return $this->_connection_galera;
    }
}