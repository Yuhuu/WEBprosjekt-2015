
<?php
/**
 * Database configuration 
 */
class dbConnect {

    private $conn;

    function __construct() {        
    }
    
    function connect() {
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', '');
    define('DB_HOST', 'localhost');
    define('DB_NAME', 'friendsPlan');
    // Connecting to mysql database
    $this->conn = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
    if ($this->conn->connect_errno){
       die('failed to connect ['.$connection->connect_error.']');
    }
    return $this->conn;
    }
}
  
    //$db->close();
?> 





