<?php
    require 'config.php';

    if(1==1){
        $sql = "SELECT * From product WHERE brand !=''";

        if(isset($_POST['brand'])){
            $got_data = $_POST['brand'];
            $decoded = json_decode($got_data);
            $brand = implode("','", $decoded);
            $sql .= "AND brand IN('".$brand."')";
        }
        if(isset($_POST['category'])){
            $got_data = $_POST['category'];
            $decoded = json_decode($got_data);
            $category = implode("','", $decoded);
            $sql .= "AND category IN('".$category."')";
        }
        if(isset($_POST['color'])){
            $got_data = $_POST['color'];
            $decoded = json_decode($got_data);
            $color = implode("','", $decoded);
            $sql .= "AND color IN('".$color."')";
        }
        if(isset($_POST['size'])){
            $got_data = $_POST['size'];
            $decoded = json_decode($got_data);
            $size = implode("','", $decoded);
            $sql .= "AND size IN('".$size."')";
        }

        $result = mysqli_query($link, $sql);
        $output='';

        if(mysqli_num_rows($result)>0){
            while($row = mysqli_fetch_assoc($result)){
                $output .='

                <div class="col-md-3">
                <img src="'.$row['image'].'" width="250px"><br>
                <h5>'.$row['name'].'</h5>
                <h6>'.$row['price'].'</h6>
                <form action="preview.php" method="POST">
                <input type="text" name="id" value="'.$row['id'].'" hidden="true"><br>
                <input type="submit" value="more">
                </form>
                </div>';
            }
        }

        else{
            $output = "<h2>No matchs</h2>";
        }
        echo $output;

    }
?>