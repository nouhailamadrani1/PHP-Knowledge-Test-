<?php 
 session_start();
class Db {
    public $dsn = "mysql:host=localhost;dbname=quiz";
    public $username = "root";
    public $password = "";
    
    public function connection(){
        try {
            $conn = new PDO($this->dsn, $this->username, $this->password);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // echo "Connected successfully";
            return $conn;
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }}

    