<?php

    
if($_SERVER["REQUEST_METHOD"] == "POST"){

    session_start();
 
    // Check if the user is logged in, if not then redirect him to login page
    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
        $logediin=false;
    }else{ $logediin=true; }

        /////////////////////////////////////////////////////////////////////////

                if($_POST['CustomPC']=="no"){
                    if($logediin==false){
                        echo "login";
                    }else{
                        require_once "database/config.php";

                        $Quantity = $_POST['Quantity'];
                        $ProductID = $_POST['ProductID'];
                        $ProductName = $_POST['ProductName'];
                        $CustomerEmail = $_SESSION["email"];
                    
                        $sql = "INSERT INTO cart (CustomerEmail, ProductID, ProductName, Quantity) VALUES ('$CustomerEmail','$ProductID','$ProductName',$Quantity)";
                    
                        if(mysqli_query($link, $sql)) {
                            echo "ok";
                        }
                        else{
                            //echo "not".mysqli_error($link);
                            echo $Quantity,$ProductID,$ProductName,$CustomerEmail;
                        }
                    }

                }

        //////////////////////////////////////////////////////////////////////////////////
                else{
                    if($logediin==false){
                        header("Location: database/login.php");
                        exit();
                    }else{
                        require_once "database/config.php";

                        $CustomerEmail = $_SESSION["email"];;
                        $Price = $_POST['totalSub'];
                        $CPU = $_POST['processor'];
                        $MotherBoard = $_POST['motherboard'];
                        $GPU = $_POST['graphics'];
                        $Storage = $_POST['storage'];
                        $RAM = $_POST['RAM'];
                        $Cooling = $_POST['cooling'];
                        $Power = $_POST['power'];
                        $Casing = $_POST['casing'];
                    
                        $sql = "INSERT INTO custompc (CustomerEmail, Price,CPU,MotherBoard,GPU,Storage,RAM,Cooling,Power,Casing,About) VALUES 
                        ('$CustomerEmail',$Price,'$CPU','$MotherBoard','$GPU','$Storage','$RAM','$Cooling','$Power','$Casing','later')";
                    
                        if(mysqli_query($link, $sql)) {
                            echo "ok";
                        }
                        else{
                            echo "error ".mysqli_error($link);
                        }

                        $sql = "SELECT ID FROM custompc ORDER BY Date DESC LIMIT 1;";
                        $result = mysqli_query($link, $sql);
                        $row = mysqli_fetch_assoc($result);
                        $ID=$row['ID'];


                        $sql = "INSERT INTO cart (CustomerEmail, ProductID, ProductName, Quantity) VALUES ('$CustomerEmail','$ID','CustomPC',1)";
                    
                        if(mysqli_query($link, $sql)) {
                            header('Location: account.php');
                        }
                        else{
                            echo "error ".mysqli_error($link);
                        }



                    }
                }
        ///////////////////////////////////////////////////////////////////////////////////////

}

?>