<?php

include_once 'db.php';

class Score{
    private $userId ;
    private $score ;
   
    public function __construct($id,$score)
    {
        $this->userId = $id;
        $this->score = $score;
        
    }

    public function saveScore(){
        
        $conn = new Db;
        $pdo = $conn->connection();
        $sql = "INSERT INTO result (score,id) VALUES ('$this->score','$this->userId')";
        $query = $pdo->prepare($sql);
        $query->execute();
        print_r($query);
        if($query){
            echo 'success';
        }
        else{
            echo 'no success'; 
        }
    }

}