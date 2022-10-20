<?php

require_once "database/config.php";

$merchant_id         = $_POST['merchant_id'];
$item_id             = $_POST['order_id'];
$payhere_amount      = $_POST['amount'];//payhere_amount
$payhere_currency    = $_POST['currency'];//payhere_currency
$quantity            = $_POST['quantity_1'];
$email               = $_POST['email'];
$cart_id             = $_POST['custom_1'];
//$status_code         = $_POST['status_code'];
//$md5sig                = $_POST['md5sig'];
//$custom_1            = $_POST['custom_1'];

echo " mar".$merchant_id     ;
echo " orID".$item_id        ;
echo " qua".$quantity        ;
echo " amt".$payhere_amount  ;
echo " aaa".$payhere_currency;
echo " email".$email         ;
echo " email".$cart_id       ;
//echo $status_code     ;
//echo $md5sig          ;
//echo $custom_1        ;
        

        $sql = "INSERT INTO orders (ItemID, Quantity, TotalAmount, CustomerEmail) VALUES ('$item_id', $quantity, $payhere_amount, '$email')";

        if (mysqli_query($link, $sql)) {
            echo "New order added successfully";
            $sql2 = "DELETE FROM cart WHERE ID = $cart_id";
            if (mysqli_query($link, $sql2)) {
                echo "Deleted";
                header("Location: account.php"); 
                exit();
            }else {
                echo "Error: ". mysqli_error($link);
        }

        } else {
            echo "Error: ". mysqli_error($link);
        }

?>