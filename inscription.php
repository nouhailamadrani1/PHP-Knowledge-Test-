
<?php
include 'db.php';
require_once 'class.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="style.css"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    
    <title>login | QUIZ</title>
</head>

<body class="container m-5 bg-black">
<?php
    $conection = new Db;
    $conn = $conection->connection();
    $nm =new signIn($conn);
    $nm->signIn();
    ?>

<form action="" method="POST" class="container bg-black">
    
<h4 class="d-flex justify-content-center   text-white">sign in</h4>

   <div class="form  d-flex justify-content-center  p-4">
    
    
    <div class="card w-50 d-flex justify-content-center">
        <input type="text" name="name" class="input m-1" placeholder="Nom" > 
        <input type="text"   name="age" class="input m-1" placeholder="Age"> 
        <input type="text"  name="class" class="input m-1" placeholder="class"> 
        <button name="btn2"  class="btn btn-warning" type="submit" >sign in </button>
        <a href="login.php" >for login click me</a>

        
    </div>
   </div>
</form>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>