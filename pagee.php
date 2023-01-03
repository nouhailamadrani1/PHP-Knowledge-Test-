<?php
include_once 'db.php';
if (isset($_SESSION['id'])) {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <title>Quiz App</title>
    </head>

    <body class="bg-black">
      
        <div class="index ">
            <header>
                <h1>NM QUIZ</h1>
            </header>

            <h2 class="text-white d-flex justify-content-center">Quiz Guide</h2>
            <div class="container d-flex justify-content-center text-white w-50 flex-wrap">

                <h4 class="text-white">1. You have <cite class="text-yellow" style="color:yellow">05 seconds</cite> per each question</h4>
                <h4 class="text-white">2. once you select you answer it can't be undone</h4>
                <h4 class="text-white">3. you'il get pointd on the basic of your correct answers</h4>
                <h4 class="text-white">4. you can't Exit from the quiz while you are playing</h4>
            </div>
        </div>
        <div class="d-flex justify-content-center">
            <button type="button" class="btn btn-warning  w-25"><a href="index.php" class="text-decoration-none">PLay</a></button>
        </div>




        <script src="main.js"></script>
    </body>

    </html>
<?php
} else {
    header('location:inscription.php');
}
?>