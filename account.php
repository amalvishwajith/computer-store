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
  <style>
        @font-face {
            src: url(font/NEWACADEMY.ttf);
            font-family: NEWACADEMY;
            font-weight: bold;
          }


          .sidenav {
            height: 100%;
            width: 0;
            position: fixed;
            z-index: 1200;
            top: 0;
            left: 0;

            overflow-x: hidden;
            transition: 0.5s;
            padding-top: 60px;
          }


          .sidenav .closebtn {
            position: absolute;
            top: 0;
            right: 25px;
            font-size: 36px;
            margin-left: 50px;
          }

          #menu{
            visibility: hidden;
          }
          @media only screen and (max-width: 767px) {
            #menu{
            visibility: visible;
          }

          }


          @media screen and (max-height: 450px) {
            .sidenav {padding-top: 15px;}
            .sidenav a {font-size: 18px;}
          }


          
    </style>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
  <title>Horizon Computers</title>
</head>
<body>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    

  <div class="container-fluid">

    <?php include 'preset/header.php';?>

    <div class="row">

      <div class="col-md-1">
                            <div id="mySidenav" class="sidenav border shadow bg-white">
                              <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

                              <div class="list-group mobile" id="list-tab" role="tablist">
                                <a class="list-group-item list-group-item-action" id="list-dashboard-list" data-toggle="list" href="#list-dashboard" role="tab" aria-controls="home"><img src="assets/svg/cart.svg" width="30px">Dashboard</a>
                                <a class="list-group-item list-group-item-action" id="list-cart-list" data-toggle="list" href="#list-cart" role="tab" aria-controls="profile">Cart</a>
                                <a class="list-group-item list-group-item-action" id="list-security-list" data-toggle="list" href="#list-security" role="tab" aria-controls="messages">Security</a>
                                <a class="list-group-item list-group-item-action" id="list-orders-list" data-toggle="list" href="#list-orders" role="tab" aria-controls="settings">orders</a>
                                <a class="list-group-item list-group-item-action" id="list-history-list" data-toggle="list" href="#list-history" role="tab" aria-controls="home"><img src="assets/svg/cart.svg" width="30px">History</a>
                                <a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list" href="#list-profile" role="tab" aria-controls="profile">Profile</a>
                                <a class="list-group-item list-group-item-action" id="list-messages-list" data-toggle="list" href="#list-messages" role="tab" aria-controls="messages">Massages</a>
                                <a class="list-group-item list-group-item-action" id="list-settings-list" data-toggle="list" href="#list-settings" role="tab" aria-controls="settings">Settings</a>
                              </div><br>
     
                            </div>
                            <span style="font-size:30px;cursor:pointer" onclick="openNav()" id="menu" >&#9776; Menu</span>
                            <script>
                                function openNav() {
                                  document.getElementById("mySidenav").style.width = "250px";
                                }

                                function closeNav() {
                                  document.getElementById("mySidenav").style.width = "0";
                                }
                            </script>
      </div>

      <div class="col-md-2"><br>
          <div class="list-group desktop" id="list-tab" role="tablist">
          <a class="list-group-item list-group-item-action" id="list-dashboard-list" data-toggle="list" href="#list-dashboard" role="tab" aria-controls="home"><img class="mr-3" src="assets/svg/card-checklist.svg" width="30px">Dashboard</a>
          <a class="list-group-item list-group-item-action" id="list-cart-list" data-toggle="list" href="#list-cart" role="tab" aria-controls="profile"><img class="mr-3" src="assets/svg/cart.svg" width="30px">Cart</a>
          <a class="list-group-item list-group-item-action" id="list-shipping-list" data-toggle="list" href="#list-shipping" role="tab" aria-controls="shipping"><img class="mr-3" src="assets/svg/truck.svg" width="30px">Shipping</a>
          <a class="list-group-item list-group-item-action" id="list-orders-list" data-toggle="list" href="#list-orders" role="tab" aria-controls="settings"><img class="mr-3" src="assets/svg/box-seam.svg" width="30px">orders</a>
          <a class="list-group-item list-group-item-action" id="list-messages-list" data-toggle="list" href="#list-messages" role="tab" aria-controls="messages"><img class="mr-3" src="assets/svg/chat-quote.svg" width="30px">Massages</a>
          <a class="list-group-item list-group-item-action" id="list-settings-list" data-toggle="list" href="#list-settings" role="tab" aria-controls="settings"><img class="mr-3" src="assets/svg/gear.svg" width="30px">Settings</a>
        </div>
        <br><br><br><br><br><br><br><br><br><br><br>
      </div>

      <div class="col-xl-8">
          <div class="tab-content" id="nav-tabContent">
          <div class="tab-pane fade show active" id="list-dashboard" role="tabpanel" aria-labelledby="list-dashboard-list">
              <?php
              require_once "database/config.php";
                $sql = "SELECT FirstName, LastName,Propic, AddressLine1,AddressLine2, City, Phone FROM users where Email = '$_SESSION[email]';";
                if($result = mysqli_query($link, $sql)) {
                  echo "";
                }
                else{
                    echo mysqli_error($link);
                }
                $userRow = mysqli_fetch_assoc($result);
              ?>

     
                <div class="row rounded bg-secondary text-white" style="margin: 25px;padding: 10px;">
                      <div style="width:20%;float:left;" >
                        <img class="rounded-circle" src="<?php echo $userRow["Propic"]?>" alt="" width="200px" height="200px">
                      </div>
                      <div style="width:80%;float:left;">
                        <h3>Welcome</h3>
                        <h5> <?php echo $userRow["FirstName"]?> <?php echo $userRow["LastName"]?></h5>
                      </div>
                </div>
                <div class="row">
                  <div class="col-12">
                  <div class="card" style="width: 100%;">
                    <div class="card-header">
                          <div class="row">
                            <div class="col-1">
                              <h1><i class="bi bi-person-lines-fill"></i></h1>
                            </div>
                            <div class="col-10" style="padding-top: 10px;">
                              <h5>Customer Profile</h5>
                            </div>
                            <div class="col-12"><hr></div>
                          </div>
                    </div>
                    <ul class="list-group list-group-flush">
                      <li class="list-group-item">
                        <div class="row">
                          <div class="col-12 text-secondary"><h5>First Name</h5></div>
                          <div class="col-12"><h5><?php echo $userRow["FirstName"]?></h5></div>
                        </div>
                      </li>
                      <li class="list-group-item">
                        <div class="row">
                          <div class="col-12 text-secondary"><h5>Last Name</h5></div>
                          <div class="col-12"><h5><?php echo $userRow["LastName"]?></h5></div>
                        </div>
                      </li>
                      <li class="list-group-item">
                        <div class="row">
                          <div class="col-12 text-secondary"><h5>Email</h5></div>
                          <div class="col-12"><h5><?php echo $_SESSION['email']; ?></h5></div>
                        </div>
                      </li>
                      <li class="list-group-item">
                        <div class="row">
                          <div class="col-12 text-secondary"><h5>Address Line 1</h5></div>
                          <div class="col-12"><h5><?php echo $userRow["AddressLine1"]?></h5></div>
                        </div>
                      </li>
                      <li class="list-group-item">
                        <div class="row">
                          <div class="col-12 text-secondary"><h5>Address Line 1</h5></div>
                          <div class="col-12"><h5><?php echo $userRow["AddressLine2"]?></h5></div>
                        </div>
                      </li>
                      <li class="list-group-item">
                        <div class="row">
                          <div class="col-12 text-secondary"><h5>City</h5></div>
                          <div class="col-12"><h5><?php echo $userRow["City"]?></h5></div>
                        </div>
                      </li>
                      <li class="list-group-item">
                        <div class="row">
                          <div class="col-12 text-secondary"><h5>Phone</h5></div>
                          <div class="col-12"><h5><?php echo $userRow["Phone"]?></h5></div>
                        </div>
                      </li>
                    </ul>
                  </div>
                  <br><br>
                  </div>
                </div>
          </div>
          <div class="tab-pane fade" id="list-cart" role="tabpanel" aria-labelledby="list-cart-list">
              <div style="width: 70%;float:left;padding:25px" id="list-cart-inside">
                          <?php 
                            $sql = "SELECT products.Image, products.Price, products.Name, products.ID, cart.Quantity, cart.ID AS cart FROM cart INNER JOIN products ON cart.ProductID = products.ID where cart.CustomerEmail = '$_SESSION[email]'
                                    UNION
                                    SELECT custompc.Image, custompc.Price, custompc.Name, custompc.ID, cart.Quantity, cart.ID AS cart FROM cart INNER JOIN custompc ON cart.ProductID = custompc.ID where cart.CustomerEmail = '$_SESSION[email]';
                                    ";

                              $result = mysqli_query($link, $sql);
                              //echo "why".mysqli_error($link);
                              while($row = mysqli_fetch_assoc($result)){  ?> <!-- ==================================== -->
                        
                        <div class="row border shadow p-3 mb-3 bg-white rounded" >
                            <div class="col-3 bg-light">
                                <img src="<?php echo $row['Image']?>" alt="" width="100%">
                            </div>
                            <div class="col-6">
                                <p class="card-text"><?php echo $row['Name']?></p><h6>Quantity 
                                <select name="<?php echo $row['ID']?>" id="<?php echo $row['cart']?>" onchange="cartUpdate(this)" disabled>
                                    <option value="<?php echo $row['Quantity']?>" disabled selected><?php echo $row['Quantity']?></option>
                                    <option value=1>1</option>
                                    <option value=2>2</option>
                                    <option value=3>3</option>
                                </select>
                                </h6><h5>RS:<?php echo $row['Price']?></h5>
                            </div>
                            <div class="col-3">
                                <button type="button" class="btn btn-warning mb-2" value="<?php echo $row['cart']?>" onclick="cartEnable(this)">Edit</button><br>
                                <button type="button" class="btn btn-danger mb-2" value="<?php echo $row['cart']?>" onclick="cartDelete(this)">Delete</button>
                                <button type="button" class="btn btn-success mb-2" value="<?php echo $row['ID']?>&&<?php echo $row['Name']?>&&<?php echo $row['Price']?>&&<?php echo $row['cart']?>" onclick="cartBuy(this)">Proceed to Checkout</button>
                            </div>
                        </div>
                        
                        <?php } ?> <!-- ================================================================================== -->
                        <br><br><br><br><br><br><br>
                        <script>
                          //===================================================================================
                            function cartDelete(btn) {
                              var formData = new FormData(); // Currently empty
                              formData.append('ID', btn.value);
                              formData.append('task', "delete");
                              
                                fetch('cart_update.php', {
                                    method:"POST",
                                    body: formData
                                }).then(function (response) {
                                    return response.text();
                                })
                                .then(function (data) {
                                    document.getElementById("list-cart-inside").innerHTML = data;
                                })
                            }
                          //===================================================================================
                            function cartUpdate(btn) {
                              console.log("amal");
                              var formData = new FormData(); // Currently empty
                              formData.append('ID', btn.name);
                              formData.append('task', "update");
                              formData.append('quantity', btn.value);
                              
                                fetch('cart_update.php', {
                                    method:"POST",
                                    body: formData
                                }).then(function (response) {
                                    return response.text();
                                })
                                .then(function (data) {
                                  document.getElementById(btn.id).disabled = "true";
                                  alert(data);
                                })
                            }
                          //===================================================================================
                            function cartEnable(id) {
                              if(document.getElementById(id.value).disabled==""){
                                document.getElementById(id.value).disabled = "true";
                              }else{
                                document.getElementById(id.value).disabled = "";
                              }
                              
                            }
                          //===================================================================================
                            function cartBuy(btn) {
                              var res = btn.value.split("&&");

                              document.getElementById("Item_id").value=res[0];
                              document.getElementById("Name").value=res[1];
                              document.getElementById("Price").value=res[2]*document.getElementById(res[3]).value;
                              document.getElementById("Cart_id").value=res[3];
                              document.getElementById("Quantity").value = document.getElementById(res[3]).value;

                              var FirstName="<?php echo $userRow['FirstName']?>";
                              var LastName="<?php echo $userRow['LastName']?>";
                              var AddressLine1="<?php echo $userRow['AddressLine1']?>";
                              var AddressLine2="<?php echo $userRow['AddressLine2']?>";
                              var City="<?php echo $userRow['City']?>";
                              var Phone="<?php echo $userRow['Phone']?>";

                              if(FirstName=="" || LastName=="" || AddressLine1=="" || AddressLine2=="" || City=="" || Phone==""){
                                alert("Plz fill the Shipping deatiles");
                              }else{
                                document.getElementById("payhere2").submit(); 
                              }
                            }
                        </script>
              </div>
              <div style="width: 30%;float:left;padding:25px" >
                  <div class="row p-3 mb-3 ml-3">
                        <div class="row">
                          <div class="col-12">
                            <img src="assets/payhere.png" width="300px" alt=""><hr>
                          </div>
                          <div class="col-2">
                            <img src="assets/lock.png" width="50px" alt="">
                          </div>
                          <div class="col-10">
                            <p><i>Payment is securely done By PayHere payment gateway</i></p>
                          </div>
                        </div>
                  </div>
                  <!-- =============================================================================================================================== -->
                      <!-- <form method="post" action="https://sandbox.payhere.lk/pay/checkout" id="payhere">   
                        <input class="form-control-plaintext" type="hidden" name="merchant_id" value="1217187">
                        <input class="form-control-plaintext" type="hidden" name="return_url" value="http://localhost/computer/index.php">
                        <input class="form-control-plaintext" type="hidden" name="cancel_url" value="http://localhost/computer/index.php">
                        <input class="form-control-plaintext" type="hidden" name="notify_url" value="http://localhost/computer/notify.php">  

                        <input class="form-control-plaintext" type="text" id="order_id" name="order_id" value="" hidden>
                        <input class="form-control-plaintext" type="text" id="items" name="items" value="" hidden>
                        <input class="form-control-plaintext" type="text" name="currency" value="LKR" hidden>
                        <input class="form-control-plaintext" type="text" id="amount" name="amount" value="" hidden>  

                        <input class="form-control-plaintext" type="text" name="first_name" value="<?php echo $userRow['FirstName']?>" hidden>
                        <input class="form-control-plaintext" type="text" name="last_name" value="<?php echo $userRow['LastName']?>" hidden>
                        <input class="form-control-plaintext" type="text" name="email" value="<?php echo $_SESSION['email'] ?>" hidden>
                        <input class="form-control-plaintext" type="text" name="phone" value="<?php echo $userRow['Phone']?>" hidden>
                        <input class="form-control-plaintext" type="text" name="address" value="<?php echo $userRow['AddressLine1']?>" hidden>
                        <input class="form-control-plaintext" type="text" name="city" value="<?php echo $userRow['City']?>" hidden>
                        <input class="form-control-plaintext" type="hidden" name="country" value="Sri Lanka" hidden><br><br>  
                      </form>   -->
                      <form method="post" action="notify2.php" id="payhere2">   
                        <input class="form-control-plaintext" type="hidden" name="merchant_id" value="1217187">
                        <input class="form-control-plaintext" type="hidden" name="return_url" value="http://localhost/computer/index.php">
                        <input class="form-control-plaintext" type="hidden" name="cancel_url" value="http://localhost/computer/index.php">
                        <input class="form-control-plaintext" type="hidden" name="notify_url" value="http://localhost/computer/notify.php">  

                        <input class="form-control-plaintext" type="text" id="Item_id" name="order_id" value="" hidden>
                        <input class="form-control-plaintext" type="text" id="Name" name="items" value="" hidden>
                        <input class="form-control-plaintext" type="text" name="currency" value="LKR" hidden>
                        <input class="form-control-plaintext" type="text" id="Price" name="amount" value="" hidden>  
                        <input class="form-control-plaintext" type="text" id="Quantity" name="quantity_1" value="" hidden>  
                        <input class="form-control-plaintext" type="text" id="Cart_id" name="custom_1" value="" hidden>  

                        <input class="form-control-plaintext" type="text" name="first_name" value="<?php echo $userRow['FirstName']?>" hidden>
                        <input class="form-control-plaintext" type="text" name="last_name" value="<?php echo $userRow['LastName']?>" hidden>
                        <input class="form-control-plaintext" type="text" name="email" value="<?php echo $_SESSION['email'] ?>" hidden>
                        <input class="form-control-plaintext" type="text" name="phone" value="<?php echo $userRow['Phone']?>" hidden>
                        <input class="form-control-plaintext" type="text" name="address" value="<?php echo $userRow['AddressLine1']?>" hidden>
                        <input class="form-control-plaintext" type="text" name="city" value="<?php echo $userRow['City']?>" hidden>
                        <input class="form-control-plaintext" type="hidden" name="country" value="Sri Lanka" hidden><br><br>  
                      </form>
                  <!-- =============================================================================================================================== -->
              </div>

            </div>
            <div class="tab-pane fade" id="list-shipping" role="tabpanel" aria-labelledby="list-shipping-list">
              <br><h1>Update Information</h1><br>
                  <form id="userUpdate" >
                    <div class="form-group">
                      <label>Address Line1</label>
                      <input type="text" class="form-control" name="address" placeholder="Address Line2" required>
                      <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                    </div>
                    <div class="form-group">
                      <label>Address Line2</label>
                      <input type="text" class="form-control" name="address2" placeholder="Address Line2" required>
                      <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                    </div>
                    <div class="form-group">
                      <label>City</label>
                      <input type="text" class="form-control" name="city" placeholder="City" required>
                      <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                    </div>
                    <div class="form-group">
                      <label>Phone</label>
                      <input type="text" class="form-control" name="phone" placeholder="Phone" required>
                      <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                    </div>
                    <input type="text" hidden name="task" value="userUpdate">
                    <button type="submit" class="btn btn-primary">Update</button>
                    
                  </form><br><br><br><br><br><br><br>
                  <script>
                        const myForm = document.getElementById('userUpdate');

                        myForm.addEventListener('submit', function(e){
                            e.preventDefault();

                            const formData = new FormData(this);
                            const UpformData = new FormData();

                            fetch('cart_update.php', {
                                method:"POST",
                                body: formData
                            }).then(function (response) {
                                return response.text();
                            })
                            .then(function (data) {
                                alert(data);
                                location.reload();
                            })
                        })
                  </script>
            </div>
            <div class="tab-pane fade" id="list-orders" role="tabpanel" aria-labelledby="list-orders-list"><br><br>

                <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Image</th>
                      <th scope="col">ItemName</th>
                      <th scope="col">Quantity</th>
                      <th scope="col">UnitPrice</th>
                      <th scope="col">TotalAmount</th>
                      <th scope="col">Date & Time</th>
                      <th scope="col">DeliveryState</th>
                    </tr>
                  </thead>
                  <tbody>

                  <?php 
                    $sql = "SELECT orders.*, products.Image, products.Name FROM orders INNER JOIN products ON orders.ItemID = products.ID where orders.CustomerEmail = '$_SESSION[email]';";

                    $sql2 = "SELECT orders.*, custompc.Name, custompc.CPU, custompc.MotherBoard, custompc.GPU, custompc.RAM, custompc.Cooling, custompc.Storage, custompc.Power, custompc.Casing, custompc.Image FROM orders INNER JOIN custompc ON orders.ItemID = custompc.ID where orders.CustomerEmail = '$_SESSION[email]';";

                      $result = mysqli_query($link, $sql);
                      echo mysqli_error($link);
                      $result2 = mysqli_query($link, $sql2);
                      echo mysqli_error($link);


                      while($row = mysqli_fetch_assoc($result)){  ?> 

                    <tr>
                      <th scope="row"><?=$row['ID']; ?></th>
                      <td><img src="<?=$row['Image']; ?>" alt="" height="50px"></td>
                      <td><?=$row['Name']; ?></td>
                      <td><?=$row['Quantity']; ?></td>
                      <td><?php echo $row['TotalAmount']/$row['Quantity']; ?></td>
                      <td><?=$row['TotalAmount']; ?></td>
                      <td><?=$row['Date']; ?></td>
                      <td><?php if($row['DeliveryState'] == "pending"){echo "<span class='badge badge-warning'>Pending</span>";}else{echo "<span class='badge badge-success'>Delivered</span>";}  ?></td>
                    </tr>
                    
                        <?php } 

                        while($row = mysqli_fetch_assoc($result2)){  ?> 

                    <tr>
                      <th scope="row"><?=$row['ID']; ?></th>
                      <td><img src="<?=$row['Image']; ?>" alt="" height="50px"></td>
                      <td><?php echo $row['Name'];echo "<br><i>".$row['CPU'];echo "<br>".$row['RAM'];echo "<br>".$row['Cooling'];echo "<br>".$row['Storage'];echo "<br>".$row['Power'];echo "<br>".$row['Casing']."</i>"; ?></td>
                      <td><?=$row['Quantity']; ?></td>
                      <td><?php echo $row['TotalAmount']/$row['Quantity']; ?></td>
                      <td><?=$row['TotalAmount']; ?></td>
                      <td><?=$row['Date']; ?></td>
                      <td><?php if($row['DeliveryState'] == "pending"){echo "<span class='badge badge-warning'>Pending</span>";}else{echo "<span class='badge badge-success'>Delivered</span>";}  ?></td>
                    </tr>

                        <?php } ?>

                  </tbody>
                </table><br><br><br><br><br><br><br><br><br>

            </div>
            <div class="tab-pane fade" id="list-messages" role="tabpanel" aria-labelledby="list-messages-list">7</div>
            <div class="tab-pane fade" id="list-settings" role="tabpanel" aria-labelledby="list-settings-list">
            <br><h1>Settings</h1><br>
            <!-- ======================================================================================================================================================== -->            
              <h4>Change Name</h4>
            <!-- ======================================================================================================================================================== -->
              <h4>Change Password</h4>

              <form id="changePass"> 
                  <div class="form-group">
                      <label>New Password</label>
                      <input type="password" id="newPass" name="new_password" class="form-control" value="">
                      <span id="snewPass" class=""></span>
                  </div>
                  <div class="form-group">
                      <label>Confirm Password</label>
                      <input type="password" id="confirmPass" name="confirm_password" class="form-control">
                      <span id="sconfirmPass" class=""></span>
                  </div>
                  <div class="form-group">
                      <input type="submit" class="btn btn-primary" value="Change">
                  </div>
              </form>

              <script>
                        const changePass = document.getElementById('changePass');

                        changePass.addEventListener('submit', function(e){
                            e.preventDefault();

                            const formData = new FormData(this);

                            fetch('database/reset_password.php', {
                                method:"POST",
                                body: formData
                            }).then(function (response) {
                                return response.text();
                            })
                            .then(function (data) {
                                const obj = data.split("&&");
                                document.getElementById("newPass").className = (obj[0] == "" ? 'form-control is-valid' : 'form-control is-invalid');
                                document.getElementById("snewPass").innerHTML = obj[0];
                                document.getElementById("confirmPass").className = (obj[1] == "" ? 'form-control is-valid' : 'form-control is-invalid');
                                document.getElementById("sconfirmPass").innerHTML = obj[1];
                                if(obj[2]=="done"){
                                  swal("successfully Updated!", "  ", "success");
                                  document.getElementById("newPass").className = 'form-control';
                                  document.getElementById("newPass").value = "";
                                  document.getElementById("confirmPass").className = 'form-control';
                                  document.getElementById("confirmPass").value = "";
                                }
                            })
                        })
                  </script>

            <!-- ======================================================================================================================================================== -->
                          <h4>Shpping Details</h4>

                  <form id="userUpdate" >
                    <div class="form-group">
                      <label>Address Line1</label>
                      <input type="text" class="form-control" name="address"  required>
                      <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                    </div>
                    <div class="form-group">
                      <label>Address Line2</label>
                      <input type="text" class="form-control" name="address2"  required>
                      <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                    </div>
                    <div class="form-group">
                      <label>City</label>
                      <input type="text" class="form-control" name="city" required>
                      <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                    </div>
                    <div class="form-group">
                      <label>Phone</label>
                      <input type="text" class="form-control" name="phone"  required>
                      <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                    </div>
                    <input type="text" hidden name="task" value="userUpdate">
                    <button type="submit" class="btn btn-primary">Update</button>
                    
                  </form><br><br><br><br><br><br><br>
                  <script>
                        const myForm2 = document.getElementById('userUpdate');

                        myForm2.addEventListener('submit', function(e){
                            e.preventDefault();

                            const formData = new FormData(this);
                            const UpformData = new FormData();

                            fetch('cart_update.php', {
                                method:"POST",
                                body: formData
                            }).then(function (response) {
                                return response.text();
                            })
                            .then(function (data) {
                                alert(data);
                                location.reload();
                            })
                        })
                  </script>
            </div>
          </div>
      </div>
      
    </div>

    <?php include 'preset/footer.php';?>

  </div>


</body>
</html>