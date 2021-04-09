<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    if (empty($id)) {
        exit("name is empty");
    } else {
        require 'config.php';
        $sql = "SELECT * From product WHERE id= $id";
        $result = mysqli_query($link, $sql);
        $row = mysqli_fetch_assoc($result);

        $image = $row['image'];
        $price = $row['price'];
        $name = $row['name'];
        $cat = $row['subcategory'];
        $color = $row['color'];
        $size = $row['size'];
    }
}else{
        exit("name is empty");
}
?>











<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>product des</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css">
        <link rel="stylesheet" href="styles.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" >
</head>
<body>
    <div class="container-fluid">
    <div class="row">
              <div class="col-12 bg-dark" style="height: 1px;">
              </div>
            </div>
            <div class="row py-3">

                <div class="col-sm-2">
                    <img class="float-right float-sm-right" src="logo.png" width="50" height="50" alt="logo">
                </div>

                <div class="col-sm-6">
                    <form>
                        <div class="input-group mb-3 border border-dark" style="border-radius: 50px;">
                            <input type="text" style="border-radius: 50px 0px 0px 50px;" class="form-control" placeholder="Search anything" aria-label="Recipient's username" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button type="button" class="btn btn-light" style="border-radius: 0px 50px 50px 0px;"><i class="bi bi-search"></i></button>
                            </div>
                          </div>
                    </form>

                </div>

                <div class="col-sm-4">
                  
                    <h4 class="float-left mx-3"><i class="bi bi-person-circle"></i> <a href="login.html">account</a></h4>
                    <h4 class="float-left mx-"><i class="bi bi-cart4"></i> cart</h4>
                </div>

            </div>

            <div class="row sticky-top">
              <div class="col-12 bg-dark d-flex justify-content-center">
          
                <div class="dropbar"><button class="dropbtn" onclick="window.location.href='index.html';"><h5>Home</h5></button></div>
          
                <div class="dropbar">
                  <button class="dropbtn"><h5>Men</h5></button>
                      <div class="dropdown-content">
                        <div style="float: left; width:20%;"><img src="men.jpg" alt="men" style="border-radius: 10px; width: 80%;margin:10%"></div>
                        <div style="float: left; width:20%;"><h6>Top Wear</h6> <a href="men.php">Casual Shirts</a><a href="men.php">Formal Shirt</a><a href="men.html">T-Shirt</a><a href="men.html">Round Neck T-shirt</a><a href="men.html">V-Neck T-Shirt</a>  </div>
                        <div style="float: left; width:20%;"><h6>Men Accessories</h6> <a href="men.html">Belts</a><a href="men.html">Cuff-Links</a><a href="men.html">Footweear</a><a href="men.html">hats and caps</a><a href="men.html">tie</a>  </div>
                        <div style="float: left; width:20%;"><h6>Bottom Wear</h6> <a href="men.html">Casual Shirts</a><a href="men.html">Formal Shirt</a><a href="men.html">T-Shirt</a><a href="men.html">Round Neck T-shirt</a><a href="men.html">V-Neck T-Shirt</a>  </div>
                        <div style="float: left; width:20%;"><h6>Sportswear</h6> <a href="men.html">Casual Shirts</a><a href="men.html">Formal Shirt</a><a href="men.html">T-Shirt</a><a href="men.html">Round Neck T-shirt</a><a href="men.html">V-Neck T-Shirt</a>  </div>
                      </div>
                </div>
          
                <div class="dropbar">
                  <button class="dropbtn"><h5>Women</h5></button>
                  <div class="dropdown-content">
                    <div style="float: left; width:20%;"><img src="women.jpg" alt="men" style="border-radius: 10px; width: 80%;margin:10%"></div>
                    <div style="float: left; width:20%;"><h6>Top Wear</h6> <a href="men.php">Casual Shirts</a><a href="men.php">Formal Shirt</a><a href="men.html">T-Shirt</a><a href="men.html">Round Neck T-shirt</a><a href="men.html">V-Neck T-Shirt</a>  </div>
                    <div style="float: left; width:20%;"><h6>Men Accessories</h6> <a href="men.html">Belts</a><a href="men.html">Cuff-Links</a><a href="men.html">Footweear</a><a href="men.html">hats and caps</a><a href="men.html">tie</a>  </div>
                    <div style="float: left; width:20%;"><h6>Bottom Wear</h6> <a href="men.html">Casual Shirts</a><a href="men.html">Formal Shirt</a><a href="men.html">T-Shirt</a><a href="men.html">Round Neck T-shirt</a><a href="men.html">V-Neck T-Shirt</a>  </div>
                    <div style="float: left; width:20%;"><h6>Sportswear</h6> <a href="men.html">Casual Shirts</a><a href="men.html">Formal Shirt</a><a href="men.html">T-Shirt</a><a href="men.html">Round Neck T-shirt</a><a href="men.html">V-Neck T-Shirt</a>  </div>
                
                  </div>
                </div>
          
                <div class="dropbar">
                  <button class="dropbtn"><h5>Kids</h5></button>
                  <div class="dropdown-content">
                    <div style="float: left; width:20%;"><img src="kids.jpg" alt="men" style="border-radius: 10px; width: 80%;margin:10%"></div>
                    <div style="float: left; width:20%;"><h6>Top Wear</h6> <a href="men.php">Casual Shirts</a><a href="men.php">Formal Shirt</a><a href="men.html">T-Shirt</a><a href="men.html">Round Neck T-shirt</a><a href="men.html">V-Neck T-Shirt</a>  </div>
                    <div style="float: left; width:20%;"><h6>Men Accessories</h6> <a href="men.html">Belts</a><a href="men.html">Cuff-Links</a><a href="men.html">Footweear</a><a href="men.html">hats and caps</a><a href="men.html">tie</a>  </div>
                    <div style="float: left; width:20%;"><h6>Bottom Wear</h6> <a href="men.html">Casual Shirts</a><a href="men.html">Formal Shirt</a><a href="men.html">T-Shirt</a><a href="men.html">Round Neck T-shirt</a><a href="men.html">V-Neck T-Shirt</a>  </div>
                    <div style="float: left; width:20%;"><h6>Sportswear</h6> <a href="men.html">Casual Shirts</a><a href="men.html">Formal Shirt</a><a href="men.html">T-Shirt</a><a href="men.html">Round Neck T-shirt</a><a href="men.html">V-Neck T-Shirt</a>  </div>
                  
                  </div>
                </div>
          
                <div class="dropbar">
                  <button class="dropbtn"><h5>Others</h5></button>
                  <div class="dropdown-content">
                    <div style="float: left; width:20%;"><img src="others.jpg" alt="men" style="border-radius: 10px; width: 80%;margin:10%"></div>
                    <div style="float: left; width:20%;"><h6>Top Wear</h6> <a href="men.php">Casual Shirts</a><a href="men.php">Formal Shirt</a><a href="men.html">T-Shirt</a><a href="men.html">Round Neck T-shirt</a><a href="men.html">V-Neck T-Shirt</a>  </div>
                    <div style="float: left; width:20%;"><h6>Men Accessories</h6> <a href="men.html">Belts</a><a href="men.html">Cuff-Links</a><a href="men.html">Footweear</a><a href="men.html">hats and caps</a><a href="men.html">tie</a>  </div>
                    <div style="float: left; width:20%;"><h6>Bottom Wear</h6> <a href="men.html">Casual Shirts</a><a href="men.html">Formal Shirt</a><a href="men.html">T-Shirt</a><a href="men.html">Round Neck T-shirt</a><a href="men.html">V-Neck T-Shirt</a>  </div>
                    <div style="float: left; width:20%;"><h6>Sportswear</h6> <a href="men.html">Casual Shirts</a><a href="men.html">Formal Shirt</a><a href="men.html">T-Shirt</a><a href="men.html">Round Neck T-shirt</a><a href="men.html">V-Neck T-Shirt</a>  </div>
                
                  </div>
                </div>
                
                <div class="dropbar">
                  <button class="dropbtn"><h5>Design</h5></button>
                  <div class="dropdown-content">
                    <div style="float: left; width:80%;"><img src="design.gif" alt="men" style="border-radius: 10px; width: 80%;margin-left: 30px;margin-bottom: 30px;"></div>
                    <div style="float: left; width:20%;"><h6>Sportswear</h6> <a href="men.html">Casual Shirts</a><a href="men.html">Formal Shirt</a><a href="men.html">T-Shirt</a><a href="men.html">Round Neck T-shirt</a><a href="men.html">V-Neck T-Shirt</a>  </div>
                  
                  </div>
                </button></div>
                <div class="dropbar"><button class="dropbtn"><h5>Sew</h5></button></div>

          
          
              </div>
            </div>
        </div>

            <div class="container first">
                <a href="index.html" >Home</a>><a href="#">Dresses</a>
                <div class="row" style="margin-top: 5px;">
                    <div class="col-12 col-md-6">
                        <img src="<?php echo $image?>" width="500px">
                     </div>
                     <div class="col-12 col-md-6">
                         <h2><?php echo $name?></h2>
                         <br>
                         <div class=descrip>
                            <p>
                                <span>Caregory:</span>
                                <span><?php echo $cat?></span>
                            </p>
                            <p>
                               <span>Product Code:</span>
                               <span></span>
                           </p>
                           <p>
                               <i class="fa fa-money" aria-hidden="true"></i>
                               Cash on Delivery
                           </p>
                           <p>
                               <i class="fa fa-refresh" aria-hidden="true"></i>
                              Easy Excange & Refund Policy
                           </p>
                           <p>
                               <i class="fa fa-truck" aria-hidden="true"></i>
                              Island Wide Delivary
                           </p>
                           <p class=price>LKR <?php echo $price?>.00</p>
                           <br>
                           <p class="para2"> 
                           <select id="colour" name="colour" >
                                    <option value="colour" selected>Colour</option>
                                    <option value="Grey">Grey</option>
                                    <option value="Brown">Brown</option>
                                    <option value="Blue">Blue</option>
                                    <option value="Green">Green</option>
                           </select>
                           
                           <select id="size" name="size">
                            <option value="size" selected>Size</option>
                            <option value="XL">XL</option>
                            <option value="L">L</option>
                            <option value="M">M</option>
                            <option value="S">S</option>
                            <option value="XS">XS</option>
                   </select>
                              </p>
                              <br>
                        
                         </div>
                         <div>
                             <p class=para1>
                            <a class="btn btn-info" href="#" role="button">
                                <i class="fas fa-cart-plus"></i>
                                Add to Cart</a>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="far fa-star"></i>
                             </p>
                         </div>
                         <hr>
                         <br>
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
                    <div class="col-12">
                        <h4>REVIEWS</h4>
                        <hr>
                        <h5>Add a review</h5>
                        <p>please <a href="#">login</a> to write a review!</p>
                        <textarea id="w3review" name="w3review" rows="7" cols="150" >Add Your Review</textarea>
                        <br><br>
                        <a class="btn btn-warning" href="#" role="button">
                           Submit Review</a>
                           <hr><hr>
                          </div>
                   
                    
                </div>
                <br<br><br><br>
                <p style="text-align: center;color:grey;font-size:40px;font-weight:400;">You May Also Like</p>
                <div class="row " >
                   <div class="col-12 col-md-4 col-lg-4">
                       <div class="card" style="text-align: center;">
                        <a href="#" ><img src="12.jpg" style="height:400px ; text-align: center;"></a>
                        <h4 style="font-size:15px; font-weight:700; ">Women's Formal Dress</h4>
                        <p style="font-size:15px; font-weight:700;color:darkorange">LKR 3,990.00</p>
                       </div>
                       
                   </div>
                   <div class="col-12 col-md-4 col-lg-4">
                    <div class="card" style="text-align: center;">
                        <a href="#"><img src="34.jpg" style="height:400px ;"></a>
                        <h4 style="font-size:15px; font-weight:700;">Women's Formal Dress</h4>
                        <p style="font-size:15px; font-weight:700;color:darkorange">LKR 4,8879.00</p>
                    </div>
                    
                   </div>
                   <div class="col-12 col-md-4 col-lg-4">
                    <div class="card " style="text-align: center;">
                        <a href="#"><img src="56.jpg" style="height:400px ;"></a>
                        <h4 style="font-size:15px; font-weight:700;">Women's Formal Dress</h4>
                        <p style="font-size:15px; font-weight:700;color:darkorange">LKR 5,000.00</p>
                    </div>
                
                   </div>
                </div>

        
                <br<br><br><br>





    
</body>
</html>