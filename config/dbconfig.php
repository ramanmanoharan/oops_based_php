<?php

class Dbconfig{
    private $hostname = 'localhost';
    private $username = 'root';
    private $dbname = 'ogbs';
    private $password = "";
    
    protected $connect;
    
    function __construct(){
        
        if(!isset($this->connect)){
        $this->connect = new mysqli($this->hostname,$this->username,$this->password,$this->dbname);
        
        if(!$this->connect){
            echo "db error";
            exit();
        }
    }
        return $this->connect;
}
}
?>