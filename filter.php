<?php
    require 'database/config.php';

        $got_data = $_POST['Category'];
        $decoded = json_decode($got_data);
        $Category = $decoded[0];

        switch ($Category) { 
        case "laptop":
                    $sql = "SELECT ID,Brand,Spec1 AS Processor,Spec2 AS GPU,Spec4 AS Screen,Image,Price,Name From products WHERE Brand !=''";
                    if(isset($_POST['Brand'])){
                        $got_data = $_POST['Brand'];
                        $decoded = json_decode($got_data);
                        $Brand = implode("','", $decoded);
                        $sql .= "AND Brand IN('".$Brand."')";
                    }
                    if(isset($_POST['Processor'])){
                        $got_data = $_POST['Processor'];
                        $decoded = json_decode($got_data);
                        $Processor = implode("','", $decoded);
                        $sql .= "AND Spec1 IN('".$Processor."')";
                    }
                    if(isset($_POST['GPU'])){
                        $got_data = $_POST['GPU'];
                        $decoded = json_decode($got_data);
                        $GPU = implode("','", $decoded);
                        $sql .= "AND Spec2 IN('".$GPU."')";
                    }
                    if(isset($_POST['Screen'])){
                        $got_data = $_POST['Screen'];
                        $decoded = json_decode($got_data);
                        $Screen = implode(",", $decoded);
                        $sql .= "AND Spec4 IN(".$Screen.")";
                    }
                    $sql .= "AND Category= 'laptop'";
                    $result = mysqli_query($link, $sql);
                    $output='';
                    if(mysqli_num_rows($result)>0){
                        while($row = mysqli_fetch_assoc($result)){
                            $output .='
            
                            <div class="col-md-3">
                            <img src="'.$row['Image'].'" width="250px"><br>
                            <h5>'.$row['Name'].'</h5>
                            <h6>'.$row['Price'].'</h6>
                            <a class="btn btn-info" href="preview.php?i='.$row['ID'].'&t=laptops">Add to Cart</a>
                            </div>';
                        }
                    }
                    else{
                        $output = "<h2>No matchs</h2>";
                    }
                    echo $output;
            break;
        case "monitor":
                    $sql = "SELECT ID,Brand,Spec1 AS Resolution,Spec3 AS RefreshRate,Spec4 AS Size,Image,Price,Name From products WHERE Brand !=''";
                    if(isset($_POST['array1'])){
                        $got_data = $_POST['array1'];
                        $decoded = json_decode($got_data);
                        $array1 = implode("','", $decoded);
                        $sql .= "AND Brand IN('".$array1."')";
                    }
                    if(isset($_POST['array2'])){
                        $got_data = $_POST['array2'];
                        $decoded = json_decode($got_data);
                        $array2 = implode(",", $decoded);
                        $sql .= "AND Spec4 IN(".$array2.")";
                    }
                    if(isset($_POST['array3'])){
                        $got_data = $_POST['array3'];
                        $decoded = json_decode($got_data);
                        $array3 = implode(",", $decoded);
                        $sql .= "AND Spec3 IN(".$array3.")";
                    }
                    if(isset($_POST['array4'])){
                        $got_data = $_POST['array4'];
                        $decoded = json_decode($got_data);
                        $array4 = implode("','", $decoded);
                        $sql .= "AND Spec1 IN('".$array4."')";
                    }
                    $sql .= "AND Category= 'monitors'";
                    $result = mysqli_query($link, $sql);
                    $output='';
                    if(mysqli_num_rows($result)>0){
                        while($row = mysqli_fetch_assoc($result)){
                            $output .='
            
                            <div class="col-md-3">
                            <img src="'.$row['Image'].'" width="250px"><br>
                            <h5>'.$row['Name'].'</h5>
                            <h6>'.$row['Price'].'</h6>
                            <a class="btn btn-info" href="preview.php?i='.$row['ID'].'&t=monitors">Add to Cart</a>
                            </div>';
                        }
                    }
                    else{
                        $output = "<h2>No matchs</h2>";
                    }
                    echo $output;
        break;
        default:
            $sql = "SELECT ID,Image,Price,Name From products WHERE Brand !=''";
            if(isset($_POST['array1'])){
                $got_data = $_POST['array1'];
                $decoded = json_decode($got_data);
                $array1 = implode("','", $decoded);
                $sql .= "AND Brand IN('".$array1."')";
            }
            if(isset($_POST['array2'])){
                $got_data = $_POST['array2'];
                $decoded = json_decode($got_data);
                $array2 = implode("','", $decoded);
                $sql .= "AND Spec1 IN('".$array2."')";
            }
            if(isset($_POST['array3'])){
                $got_data = $_POST['array3'];
                $decoded = json_decode($got_data);
                $array3 = implode("','", $decoded);
                $sql .= "AND Spec2 IN('".$array3."')";
            }
            if(isset($_POST['array4'])){
                $got_data = $_POST['array4'];
                $decoded = json_decode($got_data);
                $array4 = implode("','", $decoded);
                $sql .= "AND Spec3 IN('".$array4."')";
            }
            $sql .= "AND Category= '$Category'";
            $result = mysqli_query($link, $sql);
            $output='';
            if(mysqli_num_rows($result)>0){
                while($row = mysqli_fetch_assoc($result)){
                    $output .='

                    <div class="col-md-3">
                    <img src="'.$row['Image'].'" width="250px"><br>
                    <h5>'.$row['Name'].'</h5>
                    <h6>'.$row['Price'].'</h6>
                    <a class="btn btn-info" href="preview.php?i='.$row['ID'].'&t=monitors">Add to Cart</a>
                    </div>';
                }
            }
            else{
                $output = "<h2>No matchs</h2>";
            }
            echo $output;
            }
?>