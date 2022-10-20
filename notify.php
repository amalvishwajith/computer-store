<?php

require_once "database/config.php";

$merchant_id         = $_POST['merchant_id'];
$order_id             = $_POST['order_id'];
$payhere_amount     = $_POST['payhere_amount'];
$payhere_currency    = $_POST['payhere_currency'];
$status_code         = $_POST['status_code'];
$md5sig                = $_POST['md5sig'];
$custom_1            = $_POST['custom_1'];

$merchant_secret = '8cL2A0OKls48MQrsNo6l9y8RjZtyErACn4eU2cBot7Is'; // Replace with your Merchant Secret (Can be found on your PayHere account's Settings page)

$local_md5sig = strtoupper (md5 ( $merchant_id . $order_id . $payhere_amount . $payhere_currency . $status_code . strtoupper(md5($merchant_secret)) ) );

if (($local_md5sig === $md5sig) AND ($status_code == 2) ){
        //TODO: Update your database as payment success
        

        $sql = "INSERT INTO orders (ID, Items, TotalAmount, CustomerID) VALUES ('ORD00001', 'amal', 1000, 'amal')";

        if (mysqli_query($link, $sql)) {
        echo "New record created successfully";
        } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($link);
        }


        $sql = "INSERT INTO orders (Name, Brand, Socket, Cores, Price, About, Quantity, Image) VALUES ('$Name','$Brand','$Socket',$Cores,$Price,'$About', $Quantity, $Image)";

        if(mysqli_query($link, $sql)) {
            echo "ok";
        }
        else{
            echo "not".mysqli_error($link);
        }


}

?>
