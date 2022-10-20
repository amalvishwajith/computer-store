            <?php
              require_once "database/config.php";

              if($logediin==true){
                $output = $_SESSION["email"];
                $account="account.php";
                $logout = '
                <a class="dropdown-item" href="database/logout.php" class="btn btn-danger ml-3">Sign Out</a>
                ';

                $sql = "SELECT Propic FROM users WHERE email = '".$_SESSION["email"]."'";
                $result = mysqli_query($link, $sql);
                $row = mysqli_fetch_assoc($result);
                $imageup = $row['Propic'];
                $propic='
                <img class="rounded-circle" src="'.$imageup.'" alt="" width="50px" height="50px">   '.$_SESSION["email"].'
                ';
              }else{
                $account="database/login.php";
                $logout='';
                $output = '';
                $propic = '
                <i class="bi bi-people" style="font-size:30px"></i>   Account
                ';
              }

            ?>
<!-- ============================================================================================================ -->




  <div class="row pt-3 AVuphead" style="background-image: url('assets/upnev.jpg');background-position: center;border-bottom:2px solid red;">

        <div class="col-md-4">
            <p style="color: white;">Horizon Computers  / / /</p>
            <a href="<?php echo $account;?>" id="mcart"><i class="bi bi-cart2" ></i></a>
            <a href="<?php echo $account;?>" id="macc" ><i class="bi bi-people"></i></a>
        </div>

        <div class="col-md-5">
            <form>
                <input type="text" placeholder="Search anything" >
            </form>
        </div>

        <div class="col-md-3">
            <div class="dropdown show acc">
              <a href="#" role="button" id="dropdownMenuLink"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: white;">
                <?php echo $propic;?>
              </a>
              <!-- =========================================PRO FILE PIC================================================== -->
              <div class="dropdown-menu" aria-labelledby="dropdownMenuLink" style="z-index: 1100;">
                <a class="dropdown-item" href="<?php echo $account;?>"><i class="bi bi-people" ></i>   Account</a>
                <?php echo $logout;?>
              </div>
            </div>
          </div>

  </div>




  <div class="desktop row sticky-top" >
            <div class="AVnev col-12 bg-dark ">
        
              <div class="dropbar"><button class="dropbtn" onclick="window.location.href='index.php';"><h5>Home</h5></button></div>
        
              <div class="dropbar">
                <button class="dropbtn"><h5>Laptop</h5></button>
                    <div class="dropdown-content">
                      <div style="float: left; width:20%;"><img src="assets/laptop.png" alt="men" style="width: 100%;"></div>
                      <div style="float: left; width:20%;"><a href="laptop.php"> <img src="assets/asus.png" style="width: 100%;border-radius: 5px;"></a><a href="laptop.php"><img src="assets/hp.jpg" style="width: 100%;border-radius: 5px;">    </a> </div>
                      <div style="float: left; width:20%;"><a href="laptop.php"> <img src="assets/msi.png"  style="width: 100%;border-radius: 5px;"></a><a href="laptop.php"><img src="assets/dell.jpg"  style="width: 100%;border-radius: 5px;"> </a> </div>
                      <div style="float: left; width:20%;"><a href="laptop.php"> <img src="assets/rog.jpg"  style="width: 100%;border-radius: 5px;"></a><a href="laptop.php"><img src="assets/apple.jpg"  style="width: 100%;border-radius: 5px;"></a> </div>
                      <div style="float: left; width:20%;"><a href="laptop.php"> <img src="assets/acer.jpg" style="width: 100%;border-radius: 5px;"></a><a href="laptop.php"><img src="assets/dell.jpg" style="width: 100%;border-radius: 5px;">  </a> </div>
                    </div>
              </div>
        
              <div class="dropbar">
                <button class="dropbtn"><h5>Desktop</h5></button>
                <div class="dropdown-content">
                  <div style="float: left; width:20%;"><img src="assets/desktop.png" alt="men" style="border-radius: 10px; width: 80%;margin:10%"></div>
                  <div style="float: left; width:20%;"><h6>branded          </h6><a href="#.php"> <img src="assets/asus.png" style="width: 100%;border-radius: 5px;"></a><a href="#.html"><img src="assets/hp.jpg" style="width: 100%;border-radius: 5px;">    </a><a href="#.html"><img src="assets/msi.png"  style="width: 100%;border-radius: 5px;"></a><a href="#.html"><img src="assets/dell.jpg"  style="width: 100%;border-radius: 5px;"> </a>  </div>
                  <div style="float: left; width:20%;"><h6>buget gaming     </h6><a href="men.html">HorizonB1     </a><a href="men.html">HorizonB2  </a><a href="men.html">HorizonB3  </a></div>
                  <div style="float: left; width:20%;"><h6>pro gaming       </h6><a href="men.html">HorizonX1     </a><a href="men.html">HorizonX2  </a><a href="men.html">HorizonX3  </a></div>
                  <div style="float: left; width:20%;"><h6>workstaion       </h6><a href="men.html">HorizonWK1    </a><a href="men.html">HorizonWK2 </a><a href="men.html">HorizonWK3 </a></div>
              
                </div>
              </div>
        
              <div class="dropbar">
                <button class="dropbtn"><h5>Parts</h5></button>
                <div class="dropdown-content AVparts">
                  <div style="float: left; width:25%;"><a href="accessories.php?accessories=proccessor   "><img src="assets/components/010-cpu-1.png"       > Processors    </a><a href="accessories.php?accessories=power     "> <img src="assets/components/021-supply.png"   > Power Unit </a><a href="accessories.php?accessories=opticaldrive"><img src="assets/components/012-mainboard-1.png"    > Optical Drive</a><a href="accessories.php?accessories=cables    "><img src="assets/components/032-usb-2.png"   > Cables          </a></div>
                  <div style="float: left; width:25%;"><a href="accessories.php?accessories=motherboard  "><img src="assets/components/018-mainboard-3.png" > MotherBoards  </a><a href="accessories.php?accessories=cooling   "> <img src="assets/components/003-fan.png"      > Cooling    </a><a href="accessories.php?accessories=sounds       "><img src="assets/components/027-speaker.png"       > Sounds       </a><a href="accessories.php?accessories=exstorage "><img src="assets/components/030-usb-1.png"   > Ex-Storage</a></div>
                  <div style="float: left; width:25%;"><a href="accessories.php?accessories=ram          "><img src="assets/components/023-ram.png"         > Memory        </a><a href="accessories.php?accessories=storage   "> <img src="assets/components/016-hard-disk.png"> Storage    </a><a href="accessories.php?accessories=keyboard     "><img src="assets/components/017-keyboard.png"      > Keyboard     </a>                                                                                                                               </div>
                  <div style="float: left; width:25%;"><a href="accessories.php?accessories=graphics     "><img src="assets/components/015-graphic-card.png"> Graphic Cards </a><a href="accessories.php?accessories=casing    "> <img src="assets/components/009-server.png"   > CCasing    </a><a href="accessories.php?accessories=mice         "><img src="assets/components/036-computer-mouse.png"> Mice         </a>                                                                                                                               </div>
                
                </div>
              </div>
        
              <div class="dropbar">
                <button class="dropbtn"><h5>Monitor</h5></button>
                <div class="dropdown-content">
                  <div style="float: left; width:20%;"><img src="assets/monitor.png" alt="men" style="width: 80%;"></div>
                  <div style="float: left; width:20%;"><a href="monitor.php"> <img src="assets/asus.png" style="width: 100%;border-radius: 5px;"></a><a href="monitor.php"><img src="assets/hp.jpg" style="width: 100%;border-radius: 5px;">    </a> </div>
                  <div style="float: left; width:20%;"><a href="monitor.php"> <img src="assets/msi.png"  style="width: 100%;border-radius: 5px;"></a><a href="monitor.php"><img src="assets/dell.jpg"  style="width: 100%;border-radius: 5px;"> </a> </div>
                  <div style="float: left; width:20%;"><a href="monitor.php"> <img src="assets/rog.jpg"  style="width: 100%;border-radius: 5px;"></a><a href="monitor.php"><img src="assets/apple.jpg"  style="width: 100%;border-radius: 5px;"></a> </div>
                  <div style="float: left; width:20%;"><a href="monitor.php"> <img src="assets/acer.jpg" style="width: 100%;border-radius: 5px;"></a><a href="monitor.php"><img src="assets/dell.jpg" style="width: 100%;border-radius: 5px;">  </a> </div>
              
                </div>
              </div>
              
              <div class="dropbar">
                <button class="dropbtn"><h5>Build Your PC</h5></button>
                <div class="dropdown-content">
                  <div style="float: left; width:80%;"><img src="assets/Build Your PC.gif" alt="men" style="border-radius: 10px; width: 80%;margin-left: 30px;margin-bottom: 30px;"></div>
                  <div style="float: left; width:20%;"><a href="assemble.php">Build as You Wish</a></div>
                
                </div>
              </div>


            </div>
        </div>







<div class="mobile row sticky-top">

<div id="accordion">

<div class="card AVm">
      <button class="btn btn-outline-success">
        <i class="bi bi-house"></i>
      </button>
</div>
<div class="card AVm">
      <button class="btn btn-outline-success" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
        <i class="bi bi-laptop"></i>
      </button>
</div>
<div class="card AVm">
      <button class="btn btn-outline-success" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
        <i class="bi bi-door-closed"></i>
      </button>
</div>
<div class="card AVm">
      <button class="btn btn-outline-success" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
        <i class="bi bi-bricks"></i>
      </button>
</div>
<div class="card AVm">
      <button class="btn btn-outline-success" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
        <i class="bi bi-display"></i>
      </button>
</div>
<div class="card AVm">
      <button class="btn btn-outline-success" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
        <i class="bi bi-gear"></i>
      </button>
</div>



<div class="card AVc">
  <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
    <div class="card-body">
          <div style="float: left; width:100%;" class="d-flex justify-content-center"><h7><i>Laptop</i><hr></h7></div>
          <div style="float: left; width:25%;"><a href="#.php" ><img src="assets/asus.png" style="width: 100%;border-radius: 5px;"></a><a href="#.html"><img src="assets/hp.jpg" style="width: 100%;border-radius: 5px;">    </a> </div>
          <div style="float: left; width:25%;"><a href="#.html"><img src="assets/msi.png"  style="width: 100%;border-radius: 5px;"></a><a href="#.html"><img src="assets/dell.jpg"  style="width: 100%;border-radius: 5px;"> </a> </div>
          <div style="float: left; width:25%;"><a href="#.html"><img src="assets/rog.jpg"  style="width: 100%;border-radius: 5px;"></a><a href="#.html"><img src="assets/apple.jpg"  style="width: 100%;border-radius: 5px;"></a> </div>
          <div style="float: left; width:25%;"><a href="#.html"><img src="assets/acer.jpg" style="width: 100%;border-radius: 5px;"></a><a href="#.html"><img src="assets/dell.jpg" style="width: 100%;border-radius: 5px;">  </a> </div>
    </div>
  </div>
</div>

<div class="card AVc">
  <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
    <div class="card-body">
          <div style="float: left; width:100%;" class="d-flex justify-content-center"><h7><i>Desktop</i><hr></h7></div>
          <div style="float: left; width:25%;"><h6>Branded          </h6><a href="#.php"> <img src="assets/asus.png" style="width: 100%;border-radius: 5px;"></a><a href="#.html"><img src="assets/hp.jpg" style="width: 100%;border-radius: 5px;">    </a><a href="#.html"><img src="assets/msi.png"  style="width: 100%;border-radius: 5px;"></a><a href="#.html"><img src="assets/dell.jpg"  style="width: 100%;border-radius: 5px;"> </a>  </div>
          <div style="float: left; width:25%;"><h6>Student          </h6><a href="men.html">HorizonB1     </a><a href="men.html">HorizonB2  </a><a href="men.html">HB3  </a></div>
          <div style="float: left; width:25%;"><h6>Gaming           </h6><a href="men.html">HorizonX1     </a><a href="men.html">HorizonX2  </a><a href="men.html">HX3  </a></div>
          <div style="float: left; width:25%;"><h6>Workstaion       </h6><a href="men.html">HorizonWK1    </a><a href="men.html">HorizonWK2 </a><a href="men.html">HWK3 </a></div>  
    </div>
  </div>
</div>

<div class="card AVc">
  <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordion">
    <div class="card-body cc">
          <div><a href="accessories/accessories.php?accessories='Processors   '"><img src="assets/components/010-cpu-1.png"       > Processors   </a></div>   <div>  <a href="men.php" > <img src="assets/components/021-supply.png"        > Power Unit </a></div>
          <div><a href="accessories/accessories.php?accessories='MotherBoards '"><img src="assets/components/018-mainboard-3.png" > MotherBoards </a></div>   <div>  <a href="men.html"> <img src="assets/components/003-fan.png"           > Cooling    </a></div>
          <div><a href="accessories/accessories.php?accessories='Memory       '"><img src="assets/components/023-ram.png"         > Memory       </a></div>   <div>  <a href="men.html"> <img src="assets/components/016-hard-disk.png"     > Storage    </a></div>
          <div><a href="accessories/accessories.php?accessories='Graphic Cards'"><img src="assets/components/015-graphic-card.png"> Graphic Cards</a></div>   <div>  <a href="men.html"> <img src="assets/components/009-server.png"        > CCasing    </a></div>
          <div><a href="accessories/accessories.php?accessories='Optical Drive'"><img src="assets/components/012-mainboard-1.png" > Optical Drive</a></div>   <div>  <a href="men.html"> <img src="assets/components/032-usb-2.png"         > Cables     </a></div>
          <div><a href="accessories/accessories.php?accessories='Sounds       '"><img src="assets/components/027-speaker.png"     > Sounds       </a></div>   <div>  <a href="men.html"> <img src="assets/components/030-usb-1.png"         > Ex-Storage </a></div>
          <div><a href="accessories/accessories.php?accessories='Keyboard     '"><img src="assets/components/017-keyboard.png"    > Keyboard     </a></div>   <div>  <a href="men.html"> <img src="assets/components/036-computer-mouse.png"> Mice       </a></div>
    </div>
  </div>
</div>

<div class="card AVc">
  <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordion">
    <div class="card-body">
          <div style="float: left; width:100%;" class="d-flex justify-content-center"><h7><i>Monitor</i><hr></h7></div>
          <div style="float: left; width:20%;"><img src="assets/monitor.png" alt="men" style="width: 80%;"></div>
          <div style="float: left; width:20%;"><a href="men.php">Casual Shirts</a><a href="men.php">Formal Shirt</a><a href="men.html">T-Shirt</a><a href="men.html">Round Neck T-shirt</a><a href="men.html">V-Neck T-Shirt</a>  </div>
          <div style="float: left; width:20%;"><a href="men.html">Belts</a><a href="men.html">Cuff-Links</a><a href="men.html">Footweear</a><a href="men.html">hats and caps</a><a href="men.html">tie</a>  </div>
          <div style="float: left; width:20%;"><a href="men.html">Casual Shirts</a><a href="men.html">Formal Shirt</a><a href="men.html">T-Shirt</a><a href="men.html">Round Neck T-shirt</a><a href="men.html">V-Neck T-Shirt</a>  </div>
          <div style="float: left; width:20%;"><a href="men.html">Casual Shirts</a><a href="men.html">Formal Shirt</a><a href="men.html">T-Shirt</a><a href="men.html">Round Neck T-shirt</a><a href="men.html">V-Neck T-Shirt</a>  </div>
    </div>
  </div>
</div>

<div class="card AVc">
  <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordion">
    <div class="card-body">
          <div style="float: left; width:100%;" class="d-flex justify-content-center"><h7><i>Build Your PC</i><hr></h7></div>
          <div style="float: left; width:80%;"><img src="assets/Build Your PC.gif" alt="men" style="border-radius: 10px; width: 80%;margin-left: 30px;margin-bottom: 30px;"></div>
          <div style="float: left; width:20%;"><a href="men.html" class="btn btn-light">Make It</a></div>
    </div>
  </div>
</div>


</div>
</div>