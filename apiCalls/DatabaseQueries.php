<?php
require 'ConnectionClass.php';
class DatabaseQueries extends ConnectionClass{
    
    public function __construct() {
        parent::__construct();
        $this->createConnection();
    }
    
    public function createConnection(): bool {
        global $configFile;
        print_r($configFile);
        exit();
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
}

