<?php
class Config {

    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "oop_php_training";
    protected $connection;
    
    function __construct() {
        $this->connection = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
        if ($this->connection->connect_error) return $connection->connect_error;

    }
    
    public function close() {
        if( $this->connection ) $this->connection->close();
    }
}
