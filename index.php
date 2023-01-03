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


    <div class="quiz-app">
      <h5 class="d-flex justify-content-center my-4 text-white">Quiz : <span> PHP</span></h5>

      <div class="quiz-info">
        <div class="count">Questions : <span></span></div>
      </div>
      <div class="quiz-area">
      </div>
      <div class="answers-area">
      </div>
      <button class="submit-button btn  btn-lg btn-block w-100" style="background-color: rgb(90, 41, 150);">Save</button>
      <div class="bullets">
        <div class="spans">
        </div>
        <div class="countdown">
        </div>
      </div>
      <div class="results">

      </div>

    </div>

    <script src="main.js"></script>
  </body>

  </html>
<?php
} else {
  header('location:inscription.php');
}
?>