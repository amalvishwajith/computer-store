<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    $logediin=false;
}else{
  $logediin=true;
}
?>

<!doctype html>
<html lang="en">
  <head>
    <style>
        @font-face {
            src: url(font/NEWACADEMY.ttf);
            font-family: NEWACADEMY;
            font-weight: bold;
          }
    </style>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="icon" href="assets/sitelogo.png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    <link rel="stylesheet" href="style/owl.carousel.min.css">
    <link rel="stylesheet" href="style/owl.theme.default.min.css">

    <title>Horizon Computers</title>

        <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="style/owl.carousel.min.js"></script>



  </head>

  <body>

    <div class="container-fluid" >

          <?php include 'preset/header.php';?>
          <?php include 'preset/mcarosal.php';?>


          <div class="row"><div class="col-12"><br><hr><br></div></div>

          <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
              <h1>New Arrival</h1>
            <?php include 'preset/carosal.php';?>
            </div>
            <div class="col-md-2"></div>
          </div>

          <div class="row">
            <div class="col-12"><br><hr><br></div>
            <div class="col-1"></div>
            <div class="col-10" style="background-image: url(assets/mid.jpg); height:400px;background-repeat: no-repeat;background-position: center;" ></div>
            <div class="col-1"></div>
            <div class="col-12"><br><hr><br></div>
          </div>

          <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
            <h1>New Arrival</h1>
            <?php include 'preset/carosal2.php';?>
            </div>
            <div class="col-md-2"></div>
          </div>

          <?php include 'preset/footer.php';?>

    </div>

  </body>
</html>