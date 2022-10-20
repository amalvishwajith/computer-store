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
                        <div class="row border shadow p-3 mb-3 ml-3 bg-white rounded" >

                                <div class="form-group row">
                                    <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-10">
                                    <input type="text" readonly class="form-control-plaintext" value="email@example.com">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-10">
                                    <input type="text" readonly class="form-control-plaintext" value="email@example.com">
                                    </div>
                                </div>

                                <button type="submit" class="form-control btn btn-primary" id="payhere-payment" >Proceed To Checkout</button>
                                <hr>
                                <p>Payment is securely done By PayHere payment gate way</p>
                                <div class="row">
                                    <img src="assets/lock.png" width="40px" alt="">
                                    <img src="assets/payhere.png" width="140px" alt="">
                                </div>
                                

                                <!-- =============================================================================================================================== -->
                                <script>
                                    var price = "990";
                                    var id = IDs;
                                    console.log(id);
                                    var name = names;
                                </script>

                                    <script>
                                        // Called when user completed the payment. It can be a successful payment or failure
                                        payhere.onCompleted = function onCompleted(orderId) {
                                            console.log("Payment completed. OrderID:" + orderId);
                                            //Note: validate the payment and show success or failure page to the customer
                                        };

                                        // Called when user closes the payment without completing
                                        payhere.onDismissed = function onDismissed() {
                                            //Note: Prompt user to pay again or show an error page
                                            console.log("Payment dismissed");
                                        };

                                        // Called when error happens when initializing payment such as invalid parameters
                                        payhere.onError = function onError(error) {
                                            // Note: show an error page
                                            console.log("Error:"  + error);
                                        };

                                        // Put the payment variables here
                                        var payment = {
                                            "sandbox": true,
                                            "merchant_id": "1217187",    // Replace your Merchant ID
                                            "return_url": "index.php",     // Important
                                            "cancel_url": "index.php",     // Important
                                            "notify_url": "notify_url.php", 
                                            "order_id": "ItemNo12345",
                                            "items": id,
                                            "amount": price,
                                            "currency": "LKR",
                                            "first_name": "Saman",
                                            "last_name": "Perera",
                                            "email": "samanp@gmail.com",
                                            "phone": "0771234567",
                                            "address": "No.1, Galle Road",
                                            "city": "Colombo",
                                            "country": "Sri Lanka",
                                            "delivery_address": "No. 46, Galle road, Kalutara South",
                                            "delivery_city": "Kalutara",
                                            "delivery_country": "Sri Lanka",
                                            "custom_1": "<?php echo $_SESSION['email']?>",
                                            "custom_2": ""
                                        };

                                        // Show the payhere.js popup, when "PayHere Pay" is clicked
                                        document.getElementById('payhere-payment').onclick = function (e) {
                                            payhere.startPayment(payment);
                                        };
                                    </script>

                                <!-- =============================================================================================================================== -->
                                
 
                        </div>
            </div>
            <div class="col-1"></div>
        </div>
        
        <?php include 'preset/footer.php';?>

    </div>
</body>
</html>