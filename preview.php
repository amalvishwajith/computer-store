<?php

    $ID = $_GET['i'];
    if (empty($ID)) {
        exit("Name is empty id a");
    } else {
        require 'database/config.php';
        $sql = "SELECT * From products WHERE ID='$ID'";
        $result = mysqli_query($link, $sql);
        $row = mysqli_fetch_assoc($result);
        $Image = $row['Image'];
        $price = $row['Price'];
        $Name = $row['Name'];
        $About = $row['About'];
        $Quantity = $row['Quantity'];
        $Availability = $row['Availability'];
        if($Availability==1){$Availability="Yes";}else{$Availability="No";}
    }
  



    // Initialize the session
    session_start();
    
    // Check if the user is logged in, if not then redirect him to login page
    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
        $logediin=false;
    }else{
        $logediin=true;
    }


?>




<!DOCTYPE html>
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
            <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>




<body>
    <div class="container-fluid">

            <?php include 'preset/header.php';?>
            <?php include 'preset/mcarosal.php';?>

            <div class="container first">

                <div class="row" style="margin-top: 5px;">
                    <div class="col-md-6">
                        <img src="<?php echo $Image?>" width="500px">
                    </div>

                    <div class="col-md-6">
                         <h2><?php echo $Name?></h2>
                         <br>
                         <div class=descrip>
                           <p>
                                <i class="bi bi-cash"></i>
                                Rs: <?php echo $price?>
                           </p>
                           <p>
                                <i class="bi bi-box"></i>
                                Stok: <?php echo $Quantity?>
                           </p>
                           <p>
                                <i class="bi bi-box-seam"></i>
                                Availability: <?php echo $Availability?>
                           </p>

                           <br>
                        
                        </div>


                         <div>
                                <form id="addToCart">
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">Quantity</label>
                                        <select class="form-control" id="exampleFormControlSelect1" name="Quantity">
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                        </select><br>
                                        <input type="text" name="ProductID" value="<?php echo $ID?>" hidden="true">
                                        <input type="text" name="ProductName" value="<?php echo $Name?>" hidden="true">
                                        <input type="text" name="CustomPC" value="no" hidden>
                                        <button type="submit" class="btn btn-primary mb-2">Add to Cart</button>
                                    </div>
                                </form>
                                <!-- =================================================================================================================================================== -->
                                <script>
                                    const myForm = document.getElementById('addToCart');

                                    myForm.addEventListener('submit', function(e){
                                        console.log("amal");
                                        e.preventDefault();

                                        const formData = new FormData(this);

                                                        fetch('cart.php', {
                                                        method:"POST",
                                                        body: formData
                                                    }).then(function (response) {
                                                        return response.text();
                                                    })
                                                    .then(function (data) {
                                                        if(data=="login"){
                                                            window.location.replace("database/login.php");
                                                        }
                                                        else if(data=="ok"){
                                                            alert("Added to Cart");
                                                        }
                                                        else{
                                                            console.log(data);
                                                        }
                                                    }).catch(function(error){
                                                        console.log("error");
                                                    })

                                    })


                                </script>
                                

                                <!-- =================================================================================================================================================== -->
                         </div>

                         <hr>
                         
                         <div>
                            <button type="button" class="btn btn-outline-warning">
                                <i class="fa fa-twitter" aria-hidden="true"></i>
                                Tweet
                            </button>
                            <button type="button" class="btn btn-outline-warning">
                                <i class="fa fa-facebook" aria-hidden="true"></i>
                                Share
                            </button>

                         </div>

                       
                     </div>
                    </div>
                </div>


                <div class="row " >
                    <div class="col-md-1"><h1>About</h1></div>
                    <div class="col-md-8">
                        <textarea class="form-control" rows="20" disabled style="resize: none; background-color:transparent">
                            <?php echo $About?>
                        </textarea>
                    </div>
                    <div class="col-md-3"></div>
                </div>
        
            </div>

            <?php include 'preset/footer.php';?>

    </div>
</body>
</html>