<?php
include_once 'score.php';
include_once 'db.php';


if(isset($_GET["score"])){
    $id =  $_SESSION['id'];
    $score = $_GET["score"];
    $newScore = new Score($id,$score);
    $newScore->saveScore();
}


