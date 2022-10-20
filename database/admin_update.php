<?php

if($_SERVER["REQUEST_METHOD"] == "POST"){

    session_start();
 
    // Check if the user is logged in, if not then redirect him to login page
    if(!isset($_SESSION["ADMINloggedin"]) || $_SESSION["ADMINloggedin"] !== true){
        $logediin=false;
    }else{
        $logediin=true;
    }

    if($logediin==false){
        echo "login";
    }else{
        require_once "config.php";

        switch ($_POST['task']) {
            case "adminUpdate":
                    //============================================================================DELETE=============================================================================
                    $Fname = $_POST['FirstName'];
                    $Lname = $_POST['LastName'];
            
                    $sql = "UPDATE admin SET FirstName='$Fname',LastName='$Lname' WHERE ID='$_SESSION[ADMINid]'";
            
                    if(mysqli_query($link, $sql)) {
                        echo "Updated successfully";
                    }
                    else{
                        echo mysqli_error($link);
                    }
            break;
            case "showcustomer";
                    $email = $_POST['CustomerEmail'];
            
                    $sql = "SELECT FirstName,LastName,Email,AddressLine1,AddressLine2,City,Phone FROM users WHERE Email='$email'";
            	

                    if($result=mysqli_query($link, $sql)) {
                        $row = mysqli_fetch_assoc($result);
                        echo $row['FirstName']."<hr>";
                        echo $row['LastName']."<hr>";
                        echo $row['FirstName']."<hr>";
                        echo $row['Email']."<hr>";
                        echo $row['AddressLine1']."<hr>";
                        echo $row['AddressLine2']."<hr>";
                        echo $row['City']."<hr>";
                    }
                    else{
                        echo mysqli_error($link);
                    }
            break;
            case "delivery":
                //============================================================================DELETE=============================================================================
                $ID = $_POST['ID'];
        
                $sql = "UPDATE orders SET DeliveryState='Delivered' WHERE ID='$ID'";
        
                if(mysqli_query($link, $sql)) {
                    echo "Updated successfully";
                }
                else{
                    echo mysqli_error($link);
                }
            break; 
            case "tableupdate";

                $sql = "SELECT orders.*, products.Image, products.Name FROM orders INNER JOIN products ON orders.ItemID = products.ID;";
                $sql2 = "SELECT orders.*, custompc.Name, custompc.CPU, custompc.MotherBoard, custompc.GPU, custompc.RAM, custompc.Cooling, custompc.Storage, custompc.Power, custompc.Casing, custompc.Image FROM orders INNER JOIN custompc ON orders.ItemID = custompc.ID;";

                $result = mysqli_query($link, $sql);
                echo mysqli_error($link);
                $result2 = mysqli_query($link, $sql2);
                echo mysqli_error($link);

                $output = "";

                while($row = mysqli_fetch_assoc($result)){ 
                    if($row['DeliveryState'] == "pending"){$show = "<span class='badge badge-warning'>Pending</span>";}else{$show = "<span class='badge badge-success'<td>Delivered</span>";}
                    $output.='
                            <tr>
                            <th scope="row">'.$row['ID'].'</th>
                            <td><img src="'.$row['Image'].'" alt="" height="50px"></td>
                            <td>'.$row['Name'].'</td>
                            <td>'.$row['Quantity'].'</td>
                            <td>'.$row['TotalAmount']/$row['Quantity'] .'</td>
                            <td>'.$row['TotalAmount'].'</td>
                            <td>'.$row['Date'].'</td>
                            <td onclick="userinformation('.$row['CustomerEmail'].')">'.$row['CustomerEmail'].'</td>
                            <td>'.$show.'<button onclick="delivery('.$row['ID'].')">Delivered</button></td>
                            </tr>
                            ';
                } 

                while($row = mysqli_fetch_assoc($result2)){
                        if($row['DeliveryState'] == "pending"){$show = "<span class='badge badge-warning'>Pending</span>";}else{$show = "<span class='badge badge-success'<td>Delivered</span>";}
                        $output.='
                            <tr>
                            <th scope="row">'.$row['ID'].'</th>
                            <td><img src="'.$row['Image'].'" alt="" height="50px"></td>
                            <td>'.$row['Name'].'"<br><i>"'.$row['CPU'].' "<br>"'.$row['RAM'].' "<br>"'.$row['Cooling'].' "<br>"'.$row['Storage'].' "<br>"'.$row['Power'].' "<br>"'.$row['Casing']."</i>".'</td>
                            <td>'.$row['Quantity'].'</td>
                            <td>'.$row['TotalAmount']/$row['Quantity'].'</td>
                            <td>'.$row['TotalAmount'].'</td>
                            <td>'.$row['Date'].'</td>
                            <td onclick="userinformation('.$row['CustomerEmail'].')">'.$row['CustomerEmail'].'</td>
                            <td>'.$show.'<button onclick="delivery('.$row['ID'].')">Delivered</button></td>
                            </tr>
                        ';
                } 
                
                echo $output;

            break;
        }
    }
}

?>