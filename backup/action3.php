<?php
   $got_data = $_POST['brand'];
   $decoded = json_decode($got_data);
   echo $decoded[0];


    if(isset($_POST['brand'])){
        echo " have data";
    }else{
        echo "still no data";
    }


?>