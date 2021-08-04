<?php


/**
 * Tehrim
 */

 class DB_Connect {
    private $conn;

    public function connect() {
       // require_once 'Config.php';
        
$this->conn = new mysqli("localhost", "root", "","product");        
        return $this->conn;
    }
}


?>
