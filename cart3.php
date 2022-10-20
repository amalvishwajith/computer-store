<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    $logediin=false;
    exit();
}else{
  $logediin=true;
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Horizon Computers</title>

    <style>
            @font-face {
            src: url(font/NEWACADEMY.ttf);
            font-family: NEWACADEMY;
            font-weight: bold;
          }
    </style>

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="style/style.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script type="text/javascript" src="https://www.payhere.lk/lib/payhere.js"></script>
</head>
<body >
    <div class="container-fluid">

        <?php include 'preset/header.php';?>

        <div class="row" >
            <div class="col-2"></div>
            <div class="col-6"><br>
                                <script>
                                    var IDs = [];
                                    var names = [];
                                </script>
                        <?php 
                            require_once "database/config.php";
                            $sql = "SELECT laptops.Image, laptops.Price, laptops.ID, laptops.Name FROM cart INNER JOIN laptops ON cart.ProductID = laptops.ID where cart.CustomerEmail = '$_SESSION[email]'; ";

                              $result = mysqli_query($link, $sql);
                              while($row = mysqli_fetch_assoc($result)){  ?> <!-- ==================================== -->
                        
                        <div class="row border shadow p-3 mb-3 bg-white rounded" >
                            <div class="col-3 bg-light">
                                <img src="<?php echo $row['Image']?>" alt="" width="100%">
                                <script>
                                    IDs.push("<?php echo $row['ID']?>");
                                    names.push("<?php echo $row['Name']?>");
                                </script>
                            </div>
                            <div class="col-7">
                                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                            </div>
                            <div class="col-2">
                                <button>ok</button><br>
                                <button type="button" class="btn btn-danger">Delete</button>
                            </div>
                        </div>
                        
                        <?php } ?> <!-- ================================================================================== -->
            </div>
            <div class="col-3"><br>

                                <!-- =============================================================================================================================== -->
                                <form method="post" action="https://sandbox.payhere.lk/pay/checkout" class="row border shadow p-3 mb-3 ml-3 bg-white rounded">   
                                    <input class="form-control-plaintext" type="hidden" name="merchant_id" value="1217187">    <!-- Replace your Merchant ID -->
                                    <input class="form-control-plaintext" type="hidden" name="return_url" value="http://localhost/computer/index.php">
                                    <input class="form-control-plaintext" type="hidden" name="cancel_url" value="http://localhost/computer/index.php">
                                    <input class="form-control-plaintext" type="hidden" name="notify_url" value="http://localhost/computer/notify.php">  
                                    <br><br>Item Details<br>
                                    <input class="form-control-plaintext" type="text" name="order_id" value="ItemNo12345">
                                    <input class="form-control-plaintext" type="text" name="items" value="Door bell wireless"><br>
                                    <input class="form-control-plaintext" type="text" name="currency" value="LKR">
                                    <input class="form-control-plaintext" type="text" name="amount" value="1000">  
                                    <br><br>Customer Details<br>
                                    <input class="form-control-plaintext" type="text" name="first_name" value="Saman">
                                    <input class="form-control-plaintext" type="text" name="last_name" value="Perera"><br>
                                    <input class="form-control-plaintext" type="text" name="email" value="samanp@gmail.com">
                                    <input class="form-control-plaintext" type="text" name="phone" value="0771234567"><br>
                                    <input class="form-control-plaintext" type="text" name="address" value="No.1, Galle Road">
                                    <input class="form-control-plaintext" type="text" name="city" value="Colombo">
                                    <input class="form-control-plaintext" type="hidden" name="country" value="Sri Lanka"><br><br> 
                                    <input type="submit" value="Buy Now" class="form-control btn btn-primary">   
                                    <hr>
                                    <p>Payment is securely done By PayHere payment gate way</p>
                                    <div class="row">
                                    <img src="assets/lock.png" width="40px" alt="">
                                    <img src="assets/payhere.png" width="140px" alt="">
                                    </div>
                                </form> 

                                <!-- =============================================================================================================================== -->
                                
 
                        
            </div>
            <div class="col-1"></div>
        </div>
        
        <?php include 'preset/footer.php';?>

    </div>
</body>
</html>