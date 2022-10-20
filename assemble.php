<?php

  // Initialize the session
  session_start();
  
  // Check if the user is logged in, if not then redirect him to login page
  if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
      $logediin=false;
  }else{
    $logediin=true;
  }

  require_once "database/config.php";

  $sql1 = "SELECT ID,Name,Price,Image,Spec1 AS Socket FROM products WHERE Category = 'proccessor'";//
  $sql2 = "SELECT ID,Name,Price,Image,Spec1 AS Socket,Spec2 AS hard,Spec3 AS ram,Spec4 AS pci  FROM products WHERE Category = 'motherboard'";//
  $sql3 = "SELECT ID,Name,Price,Image,Spec1 AS ddr FROM products WHERE Category = 'ram'";//
  $sql4 = "SELECT ID,Name,Price,Image,Spec2 AS interface FROM products WHERE Category = 'storage' AND Spec1=('DESKTOP' OR 'BOTH') ";
  $sql5 = "SELECT ID,Name,Price,Image,Spec1 AS chip,Spec2 AS pci,Spec4 AS watt FROM products WHERE Category = 'graphics'";//
  $sql6 = "SELECT ID,Name,Price,Image,Spec1 AS Socket FROM products WHERE Category = 'cooling'";
  $sql7 = "SELECT ID,Name,Price,Image,Spec3 AS watt FROM products WHERE Category = 'power'";//
  $sql8 = "SELECT ID,Name,Price,Image,Spec1 AS size FROM products WHERE Category = 'casing'";

  // $proccessoer =array(array());
  // $motherboard =array(array());


  
  if($result1 = mysqli_query($link,$sql1)) {
  }
  else{
      echo "not".mysqli_error($link);
  }

  if($result2 = mysqli_query($link,$sql2)) {
  }
  else{
      echo "not".mysqli_error($link);
  }

  if($result3 = mysqli_query($link,$sql3)) {
  }
  else{
      echo "not".mysqli_error($link);
  }

  if($result4 = mysqli_query($link,$sql4)) {
  }
  else{
      echo "not".mysqli_error($link);
  }

  if($result5 = mysqli_query($link,$sql5)) {
  }
  else{
      echo "not".mysqli_error($link);
  }

  if($result6 = mysqli_query($link,$sql6)) {
  }
  else{
      echo "not".mysqli_error($link);
  }

  if($result7 = mysqli_query($link,$sql7)) {
  }
  else{
      echo "not".mysqli_error($link);
  }
  if($result8 = mysqli_query($link,$sql8)) {
  }
  else{
      echo "not".mysqli_error($link);
  }

?>



<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        @font-face {
            src: url(font/NEWACADEMY.ttf);
            font-family: NEWACADEMY;
            font-weight: bold;
          }
          .neww{
            background-color: green;
            color: black;
          }
          form .form-control{
            pointer-events: none;
          }
    </style>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/assemble/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
  />

    <link rel="stylesheet" href="style/owl.carousel.min.css">
    <link rel="stylesheet" href="style/owl.theme.default.min.css">

    <title>Horizon Computers</title>

        <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="style/owl.carousel.min.js"></script>

</head>
<body>

<div class="container-fluid">
  <?php include 'preset/header.php';?>

  <div class="row" style="background-color: #ffffff;">
    <div class="col-12" style="height: 400px;background-image: url('assets/custompc.jpg');  background-repeat: no-repeat;background-position: center; ">
    </div>
    <div class="col-12" style="background-color: black;"><br></div>
    <div class="col-12"><br></div>
  </div>
  <div class="row">
  </div>

<!-- processor ---->
<div class="row">
    <div class="col-12"><br></div>
    <div class="col-md-2"></div>
    <div class="col-md-4">
    <!-- ===================================================================== DROP DOWN BUTTON =========================================================================== -->
                  <div class="shadow">
                    <!--==========================toggle hide myAV-a-dropdown_mb ============================================================-->
                    <button onclick="show_pro()" class="btn btn-danger btn-lg btn-block" id="DropBtn_pro">Processor</button><!--==== CHANGE HERE =-->
                      <div id="dropdown_pro" onmouseleave="BackToNormal_pro()" class="AV-a-dropdown-content"><!--==== CHANGE HERE =-->
                      <script>
                        function BackToNormal_pro(){
                          document.getElementById("photo_pro").src=Processor_normal;
                        }
                      </script>
                        <!--========================== SEARCH BAR ============================================================-->
                        <input type="text" class="form-control mt-2 mb-2" placeholder="Search.." id="search_pro" onkeyup="filterFunction_pro()"><!--==== CHANGE HERE =-->
                          <?php
                            if (mysqli_num_rows($result1) > 0) {
                              // output data of each row
                              while($row = mysqli_fetch_assoc($result1)) {
                                echo '<button class="btn btn-light btn-block" id="'.$row["ID"].'" onmouseover="hover_pro(this)" onclick="change_pro(this)" value="'.$row["Image"].','.$row["Socket"].','.$row["Price"].'" href="#about">'.$row["Name"].'Price'.$row["Price"].'<img src="'.$row["Image"].'" alt=""></button>';
                                //echo '<input type="text" id="socket'.$row["ID"].'" value="'.$row["Socket"].'" disabled><br>';    "Image":"'.$row["Image"].'", "Socket":"'.$row["Socket"].'"
                              }
                            } else {
                              echo "0 results";
                            }
                          
                          ?>
                        <!-- <button id="" onmouseover="product(this)" onclick="change(this)" value="photo/laptop/3.png" href="#tools"   >Tools   <img src="photo/laptop/3.png" alt=""></button> -->
                      </div>
                  </div>
    <!-- ====================================================================== JS SCRIPT ========================================================================== -->            
                  <script>
                  //==========================toggle hide myAV-a-dropdown_mb ============================================================
                  function show_pro() {//====change here
                    document.getElementById("dropdown_pro").classList.toggle("show");//===toggle show
                  }
                  //======================== CHANGE IMAGE WHEN HOVER ============================================
                  //=============================================================================================
                  function hover_pro(x){
                      //==========================================
                        var res = x.value.split(",");
                        //console.log(res);
                      //==========================================
                      var photo = document.getElementById("photo_pro");//====get image area
                      photo.src = res[0];
                  }
                  //======================== CHANGE IMAGE WHEN CLICKED ==========================================
                  //=============================================================================================
                  function change_pro(x){//====chage here
                      var ButtonLable = document.getElementById("DropBtn_pro");//====get dropdown button to change name
                      var total = document.getElementById("total");//====get total value lable to  change total price
                      var part = document.getElementById("processor");//====get part to change name
                                  //============================================
                                  function filterFunction_onetime() {
                                      var input, filter, ul, li, a, i;
                                      div = document.getElementById("dropdown_mbd");//====dropdown area
                                      a = div.getElementsByTagName("button");//====get buttons in the dropdown area
                                      for (i = 0; i < a.length; i++) {
                                        var loop = a[i].value.split(",");
                                        if(loop[1]!=Processor_value){
                                          a[i].disabled = "true";
                                        }else{
                                          a[i].disabled = "";
                                        }
                                      }
                                    }

                                  //==========================================
                                    var res = x.value.split(",");
                                    //console.log(res);
                                    Processor_value = res[1];//====change here
                                    filterFunction_onetime();
                                  //=============== VALUE RESET ==============
                                    document.getElementById("DropBtn_mbd").hidden="";

                                    document.getElementById("motherboard").value="";
                                    document.getElementById("DropBtn_mbd").innerHTML="Mother-Board";
                                    document.getElementById("DropBtn_pro").style.background='#5cb85c';
                                    document.getElementById("photo_mbd").src="assets/preview.png";
                  

                                    document.getElementById("graphics").value="";
                                    document.getElementById("DropBtn_gpu").innerHTML="Graphic-Card";
                                    document.getElementById("photo_gpu").src="assets/preview.png";

                                    // document.getElementById("storage").value="";
                                    // document.getElementById("DropBtn_stg").innerHTML="Storage";
                                    // document.getElementById("photo_stg").src="assets/preview.png";

                                    // document.getElementById("RAM").value="";
                                    // document.getElementById("DropBtn_ram").innerHTML="Mother-Board";
                                    // document.getElementById("photo_ram").src="assets/preview.png";

                                    // document.getElementById("cooling").value="";
                                    // document.getElementById("DropBtn_col").innerHTML="Mother-Board";
                                    // document.getElementById("photo_col").src="assets/preview.png";

                                    document.getElementById("power").value="";
                                    document.getElementById("DropBtn_pow").innerHTML="Mother-Board";
                                    document.getElementById("photo_pow").src="assets/preview.png";

                                    // document.getElementById("casing").value="";
                                    // document.getElementById("DropBtn_cas").innerHTML="Mother-Board";
                                    // document.getElementById("photo_cas").src="assets/preview.png";
                                  //==========================================

                      part.value = x.innerText;
                      ButtonLable.innerText = x.innerText;
                      Processor_normal = res[0];
                      var tempTotal = parseInt(total.innerHTML)+parseInt(res[2]);
                      total.innerHTML = tempTotal;
                      document.getElementById("BuyItem").innerHTML= tempTotal;
                      document.getElementById("dropdown_pro").classList.toggle("show");//==== hide the dropdown area
                  }
                  //<!--========================== SEARCH BAR ============================================================-->
                  //=========================================================================================================
                  function filterFunction_pro() {
                    var input, filter, ul, li, a, i;
                    input = document.getElementById("search_pro");//====search button ID
                    filter = input.value.toUpperCase();
                    div = document.getElementById("dropdown_pro");//====dropdown area
                    a = div.getElementsByTagName("button");//====get buttons in the dropdown area
                    for (i = 0; i < a.length; i++) {
                      txtValue = a[i].textContent || a[i].innerText;
                      if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        a[i].style.display = "";
                      } else {
                        a[i].style.display = "none";
                      }
                    }
                  }
                  </script>
    <!-- ================================================================================================================================================ -->    
    </div>
    <div class="col-1"></div>
    <div class="col-md-4 d-flex justify-content-center">
        <img id="photo_pro" class="AV-a-dropimg" src="assets/preview.png" alt=""><!--==== CHANGE HERE =-->
    </div>
    <div class="col-md-1"></div>
    <div class="col-12"><br></div>
</div>
<!-- motherboard -->
<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-4">
    <!-- ===================================================================== DROP DOWN BUTTON =========================================================================== -->
                  <div class="shadow">
                    <!--==========================toggle hide myAV-a-dropdown_mb ============================================================-->
                    <button onclick="show_mbd()" class="btn btn-danger btn-lg btn-block" id="DropBtn_mbd">Mother-Board</button><!--==== CHANGE HERE =-->
                      <div id="dropdown_mbd" class="AV-a-dropdown-content"><!--==== CHANGE HERE =-->
                        <!--========================== SEARCH BAR ============================================================-->
                        <input type="text" class="form-control mt-2 mb-2" placeholder="Search.." id="search_mbd" onkeyup="filterFunction_mbd()"><!--==== CHANGE HERE =-->
                          <?php
                            if (mysqli_num_rows($result2) > 0) {//====change here
                              // output data of each row
                              while($row = mysqli_fetch_assoc($result2)) {
                                echo '<button class="btn btn-light btn-block" id="'.$row["ID"].'" onmouseover="hover_mbd(this)" onclick="change_mbd(this)" value="'.$row["Image"].','.$row["Socket"].','.$row["Price"].','.$row["hard"].','.$row["ram"].','.$row["pci"].'" href="#about">'.$row["Name"].'Price'.$row["Price"].'<img src="'.$row["Image"].'" alt=""></button>';
                                //echo '<input type="text" id="socket'.$row["ID"].'" value="'.$row["Socket"].'" disabled><br>';    "Image":"'.$row["Image"].'", "Socket":"'.$row["Socket"].'"
                              }
                            } else {
                              echo "0 results";
                            }
                          
                          ?>
                        <!-- <button id="" onmouseover="product(this)" onclick="change(this)" value="photo/laptop/3.png" href="#tools"   >Tools   <img src="photo/laptop/3.png" alt=""></button> -->
                      </div>
                  </div>
    <!-- ====================================================================== JS SCRIPT ========================================================================== -->            
                  <script>
                  //==========================toggle hide myAV-a-dropdown_mb ============================================================
                  function show_mbd() {//====change here
                    document.getElementById("dropdown_mbd").classList.toggle("show");//===toggle show
                  }
                  //======================== CHANGE IMAGE WHEN HOVER ============================================
                  //=============================================================================================
                  function hover_mbd(x){
                      //==========================================
                        var res = x.value.split(",");
                        //console.log(res);
                      //==========================================
                      var photo = document.getElementById("photo_mbd");//====get image area
                      photo.src = res[0];
                  }
                  //======================== CHANGE IMAGE WHEN CLICKED ==========================================
                  //=============================================================================================
                  function change_mbd(x){//====chage here
                      var ButtonLable = document.getElementById("DropBtn_mbd");//====get dropdown button to change name
                      var total = document.getElementById("total");//====get total value lable to  change total price
                      var part = document.getElementById("motherboard");//====get part to change name
                                  //============================================
                                  function filterFunction_onetime() {
                                      var a1,a2,a3,div1,div2,div3, i;

                                      //div1 = document.getElementById("dropdown_stg");//====dropdown area
                                      div2 = document.getElementById("dropdown_ram");//====dropdown area
                                      div3 = document.getElementById("dropdown_gpu");//====dropdown area
 
                                      //a1 = div1.getElementsByTagName("button");//====get buttons in the dropdown area
                                      a2 = div2.getElementsByTagName("button");//====get buttons in the dropdown area
                                      a3 = div3.getElementsByTagName("button");//====get buttons in the dropdown area

                                      // for (i = 0; i < a1.length; i++) {
                                      //   var res = a1[i].value.split(",");
                                      //   if(res[1]!=Storage_value){
                                      //     a1[i].disabled = "true";
                                      //   }else{
                                      //     a1[i].disabled = "";
                                      //   }
                                      // }
                                      for (i = 0; i < a2.length; i++) {
                                        var loop = a2[i].value.split(",");
                                        console.log(loop[1],RAM_value);
                                        if(loop[1]!=RAM_value){
                                          a2[i].disabled = "true";
                                        }else{
                                          a2[i].disabled = "";
                                        }
                                      }
                                      for (i = 0; i < a3.length; i++) {
                                        var loop = a3[i].value.split(",");
                                        if(loop[1]!=GPU_value){
                                          a3[i].disabled = "true";
                                        }else{
                                          a3[i].disabled = "";
                                        }
                                      }
                                    }

                                  //==========================================
                                    var res = x.value.split(",");
                                    //console.log(res);
                                    Storage_value = res[3];//====change here
                                    RAM_value = res[4];//====change here
                                    GPU_value = res[5];//====change here
                                    filterFunction_onetime();
                                  //=============== VALUE RESET ==============
                                    //document.getElementById("motherboard").value="";

                                    document.getElementById("graphics").value="";
                                    document.getElementById("DropBtn_gpu").innerHTML="Graphic-Card";
                                    document.getElementById("photo_gpu").src="assets/preview.png";

                                    // document.getElementById("storage").value="";
                                    // document.getElementById("DropBtn_stg").innerHTML="Storage";
                                    // document.getElementById("photo_stg").src="assets/preview.png";

                                    // document.getElementById("RAM").value="";
                                    // document.getElementById("DropBtn_ram").innerHTML="Mother-Board";
                                    // document.getElementById("photo_ram").src="assets/preview.png";

                                    // document.getElementById("cooling").value="";
                                    // document.getElementById("DropBtn_col").innerHTML="Mother-Board";
                                    // document.getElementById("photo_col").src="assets/preview.png";

                                    document.getElementById("power").value="";
                                    document.getElementById("DropBtn_pow").innerHTML="Mother-Board";
                                    document.getElementById("photo_pow").src="assets/preview.png";

                                    // document.getElementById("casing").value="";
                                    // document.getElementById("DropBtn_cas").innerHTML="Mother-Board";
                                    // document.getElementById("photo_cas").src="assets/preview.png";
                                  //==========================================

                      part.value = x.innerText;
                      ButtonLable.innerText = x.innerText;

                      total.innerHTML = parseInt(total.innerHTML)+parseInt(res[2]);
                      document.getElementById("dropdown_mbd").classList.toggle("show");//==== hide the dropdown area
                  }
                  //<!--========================== SEARCH BAR ============================================================-->
                  //=========================================================================================================
                  function filterFunction_mbd() {
                    var input, filter, ul, li, a, i;
                    input = document.getElementById("search_mbd");//====search button ID
                    filter = input.value.toUpperCase();
                    div = document.getElementById("dropdown_mbd");//====dropdown area
                    a = div.getElementsByTagName("button");//====get buttons in the dropdown area
                    for (i = 0; i < a.length; i++) {
                      txtValue = a[i].textContent || a[i].innerText;
                      if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        a[i].style.display = "";
                      } else {
                        a[i].style.display = "none";
                      }
                    }
                  }
                  </script>
    <!-- ================================================================================================================================================ -->    
    </div>
    <div class="col-1"></div>
    <div class="col-md-4 d-flex justify-content-center">
        <img id="photo_mbd" class="AV-a-dropimg" src="assets/preview.png" alt=""><!--==== CHANGE HERE =-->
    </div>
    <div class="col-md-1"></div>
    <div class="col-12"><br></div>
</div>
<!-- ram-------- -->  
<div class="row">
    <div class="col-12"><br></div>
    <div class="col-md-2"></div>
    <div class="col-md-4">
    <!-- ===================================================================== DROP DOWN BUTTON =========================================================================== -->
                  <div class="shadow">
                    <!--==========================toggle hide myAV-a-dropdown_mb ============================================================-->
                    <button onclick="show_ram()" class="btn btn-danger btn-lg btn-block" id="DropBtn_ram">RAM</button><!--==== CHANGE HERE =-->
                      <div id="dropdown_ram" class="AV-a-dropdown-content"><!--==== CHANGE HERE =-->
                        <!--========================== SEARCH BAR ============================================================-->
                        <input type="text" class="form-control mt-2 mb-2" placeholder="Search.." id="search_ram" onkeyup="filterFunction_ram()"><!--==== CHANGE HERE =-->
                          <?php
                            if (mysqli_num_rows($result3) > 0) {
                              // output data of each row
                              while($row = mysqli_fetch_assoc($result3)) {
                                echo '<button class="btn btn-light btn-block" id="'.$row["ID"].'" onmouseover="hover_ram(this)" onclick="change_ram(this)" value="'.$row["Image"].','.$row["ddr"].','.$row["Price"].'" href="#about">'.$row["Name"].'Price'.$row["Price"].'<img src="'.$row["Image"].'" alt=""></button>';
                                //echo '<input type="text" id="socket'.$row["ID"].'" value="'.$row["Socket"].'" disabled><br>';    "Image":"'.$row["Image"].'", "Socket":"'.$row["Socket"].'"
                              }
                            } else {
                              echo "0 results";
                            }
                          
                          ?>
                        <!-- <button id="" onmouseover="product(this)" onclick="change(this)" value="photo/laptop/3.png" href="#tools"   >Tools   <img src="photo/laptop/3.png" alt=""></button> -->
                      </div>
                  </div>
    <!-- ====================================================================== JS SCRIPT ========================================================================== -->            
                  <script>
                  //==========================toggle hide myAV-a-dropdown_mb ============================================================
                  function show_ram() {//====change here
                    document.getElementById("dropdown_ram").classList.toggle("show");//===toggle show
                  }
                  //======================== CHANGE IMAGE WHEN HOVER ============================================
                  //=============================================================================================
                  function hover_ram(x){
                      //==========================================
                        var res = x.value.split(",");
                        //console.log(res);
                      //==========================================
                      var photo = document.getElementById("photo_ram");//====get image area
                      photo.src = res[0];
                  }
                  //======================== CHANGE IMAGE WHEN CLICKED ==========================================
                  //=============================================================================================
                  function change_ram(x){//====chage here
                      var ButtonLable = document.getElementById("DropBtn_ram");//====get dropdown button to change name
                      var total = document.getElementById("total");//====get total value lable to  change total price
                      var part = document.getElementById("RAM");//====get part to change name
                                  //============================================
                                  function filterFunction_onetime() {
                                      var input, filter, ul, li, a, i;
                                      div = document.getElementById("dropdown_mbd");//====dropdown area
                                      a = div.getElementsByTagName("button");//====get buttons in the dropdown area
                                      for (i = 0; i < a.length; i++) {
                                        var res = a[i].value.split(",");
                                        if(res[1]!=Processor_value){
                                          a[i].disabled = "true";
                                        }else{
                                          a[i].disabled = "";
                                        }
                                      }
                                    }

                                  //==========================================
                                    var res = x.value.split(",");
                                    //console.log(res);
                                    //Processor_value = res[1];//====change here
                                    //filterFunction_onetime();
                                  //=============== VALUE RESET ==============
                                    // document.getElementById("DropBtn_mbd").hidden="";

                                    // document.getElementById("motherboard").value="";
                                    // document.getElementById("DropBtn_mbd").innerHTML="Mother-Board";
                                    // document.getElementById("DropBtn_pro").style.background='#5cb85c';
                                    // document.getElementById("photo_mbd").src="assets/preview.png";
                  

                                    // document.getElementById("graphics").value="";
                                    // document.getElementById("DropBtn_gpu").innerHTML="Graphic-Card";
                                    // document.getElementById("photo_gpu").src="assets/preview.png";

                                    // document.getElementById("storage").value="";
                                    // document.getElementById("DropBtn_stg").innerHTML="Storage";
                                    // document.getElementById("photo_stg").src="assets/preview.png";

                                    // document.getElementById("RAM").value="";
                                    // document.getElementById("DropBtn_ram").innerHTML="Mother-Board";
                                    // document.getElementById("photo_ram").src="assets/preview.png";

                                    // document.getElementById("cooling").value="";
                                    // document.getElementById("DropBtn_col").innerHTML="Mother-Board";
                                    // document.getElementById("photo_col").src="assets/preview.png";

                                    // document.getElementById("power").value="";
                                    // document.getElementById("DropBtn_pow").innerHTML="Mother-Board";
                                    // document.getElementById("photo_pow").src="assets/preview.png";

                                    // document.getElementById("casing").value="";
                                    // document.getElementById("DropBtn_cas").innerHTML="Mother-Board";
                                    // document.getElementById("photo_cas").src="assets/preview.png";
                                  //==========================================

                      part.value = x.innerText;
                      ButtonLable.innerText = x.innerText;

                      total.innerHTML = parseInt(total.innerHTML)+parseInt(res[2]);
                      document.getElementById("dropdown_ram").classList.toggle("show");//==== hide the dropdown area
                  }
                  //<!--========================== SEARCH BAR ============================================================-->
                  //=========================================================================================================
                  function filterFunction_ram() {
                    var input, filter, ul, li, a, i;
                    input = document.getElementById("search_ram");//====search button ID
                    filter = input.value.toUpperCase();
                    div = document.getElementById("dropdown_ram");//====dropdown area
                    a = div.getElementsByTagName("button");//====get buttons in the dropdown area
                    for (i = 0; i < a.length; i++) {
                      txtValue = a[i].textContent || a[i].innerText;
                      if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        a[i].style.display = "";
                      } else {
                        a[i].style.display = "none";
                      }
                    }
                  }
                  </script>
    <!-- ================================================================================================================================================ -->    
    </div>
    <div class="col-1"></div>
    <div class="col-md-4 d-flex justify-content-center">
        <img id="photo_ram" class="AV-a-dropimg" src="assets/preview.png" alt=""><!--==== CHANGE HERE =-->
    </div>
    <div class="col-md-1"></div>
    <div class="col-12"><br></div>
</div>
<!-- storage---- -->  
<div class="row">
    <div class="col-12"><br></div>
    <div class="col-md-2"></div>
    <div class="col-md-4">
    <!-- ===================================================================== DROP DOWN BUTTON =========================================================================== -->
                  <div class="shadow">
                    <!--==========================toggle hide myAV-a-dropdown_mb ============================================================-->
                    <button onclick="show_stg()" class="btn btn-danger btn-lg btn-block" id="DropBtn_stg">Storage</button><!--==== CHANGE HERE =-->
                      <div id="dropdown_stg" class="AV-a-dropdown-content"><!--==== CHANGE HERE =-->
                        <!--========================== SEARCH BAR ============================================================-->
                        <input type="text" class="form-control mt-2 mb-2" placeholder="Search.." id="search_stg" onkeyup="filterFunction_stg()"><!--==== CHANGE HERE =-->
                          <?php
                            if (mysqli_num_rows($result4) > 0) {
                              // output data of each row
                              while($row = mysqli_fetch_assoc($result4)) {
                                echo '<button class="btn btn-light btn-block" id="'.$row["ID"].'" onmouseover="hover_stg(this)" onclick="change_stg(this)" value="'.$row["Image"].','.$row["interface"].','.$row["Price"].'" href="#about">'.$row["Name"].'Price'.$row["Price"].'<img src="'.$row["Image"].'" alt=""></button>';
                                //echo '<input type="text" id="socket'.$row["ID"].'" value="'.$row["Socket"].'" disabled><br>';    "Image":"'.$row["Image"].'", "Socket":"'.$row["Socket"].'"
                              }
                            } else {
                              echo "0 results";
                            }
                          
                          ?>
                        <!-- <button id="" onmouseover="product(this)" onclick="change(this)" value="photo/laptop/3.png" href="#tools"   >Tools   <img src="photo/laptop/3.png" alt=""></button> -->
                      </div>
                  </div>
    <!-- ====================================================================== JS SCRIPT ========================================================================== -->            
                  <script>
                  //==========================toggle hide myAV-a-dropdown_mb ============================================================
                  function show_stg() {//====change here
                    document.getElementById("dropdown_stg").classList.toggle("show");//===toggle show
                  }
                  //======================== CHANGE IMAGE WHEN HOVER ============================================
                  //=============================================================================================
                  function hover_stg(x){
                      //==========================================
                        var res = x.value.split(",");
                        //console.log(res);
                      //==========================================
                      var photo = document.getElementById("photo_stg");//====get image area
                      photo.src = res[0];
                  }
                  //======================== CHANGE IMAGE WHEN CLICKED ==========================================
                  //=============================================================================================
                  function change_stg(x){//====chage here
                      var ButtonLable = document.getElementById("DropBtn_stg");//====get dropdown button to change name
                      var total = document.getElementById("total");//====get total value lable to  change total price
                      var part = document.getElementById("storage");//====get part to change name
                                  //============================================
                                  function filterFunction_onetime() {
                                      var input, filter, ul, li, a, i;
                                      div = document.getElementById("dropdown_mbd");//====dropdown area
                                      a = div.getElementsByTagName("button");//====get buttons in the dropdown area
                                      for (i = 0; i < a.length; i++) {
                                        var res = a[i].value.split(",");
                                        if(res[1]!=Processor_value){
                                          a[i].disabled = "true";
                                        }else{
                                          a[i].disabled = "";
                                        }
                                      }
                                    }

                                  //==========================================
                                    var res = x.value.split(",");
                                    //console.log(res);
                                    //Processor_value = res[1];//====change here
                                    //filterFunction_onetime();
                                  //=============== VALUE RESET ==============
                                    // document.getElementById("DropBtn_mbd").hidden="";

                                    // document.getElementById("motherboard").value="";
                                    // document.getElementById("DropBtn_mbd").innerHTML="Mother-Board";
                                    // document.getElementById("DropBtn_pro").style.background='#5cb85c';
                                    // document.getElementById("photo_mbd").src="assets/preview.png";
                  

                                    // document.getElementById("graphics").value="";
                                    // document.getElementById("DropBtn_gpu").innerHTML="Graphic-Card";
                                    // document.getElementById("photo_gpu").src="assets/preview.png";

                                    // document.getElementById("storage").value="";
                                    // document.getElementById("DropBtn_stg").innerHTML="Storage";
                                    // document.getElementById("photo_stg").src="assets/preview.png";

                                    // document.getElementById("RAM").value="";
                                    // document.getElementById("DropBtn_ram").innerHTML="Mother-Board";
                                    // document.getElementById("photo_ram").src="assets/preview.png";

                                    // document.getElementById("cooling").value="";
                                    // document.getElementById("DropBtn_col").innerHTML="Mother-Board";
                                    // document.getElementById("photo_col").src="assets/preview.png";

                                    // document.getElementById("power").value="";
                                    // document.getElementById("DropBtn_pow").innerHTML="Mother-Board";
                                    // document.getElementById("photo_pow").src="assets/preview.png";

                                    // document.getElementById("casing").value="";
                                    // document.getElementById("DropBtn_cas").innerHTML="Mother-Board";
                                    // document.getElementById("photo_cas").src="assets/preview.png";
                                  //==========================================

                      part.value = x.innerText;
                      ButtonLable.innerText = x.innerText;

                      total.innerHTML = parseInt(total.innerHTML)+parseInt(res[2]);
                      document.getElementById("dropdown_stg").classList.toggle("show");//==== hide the dropdown area
                  }
                  //<!--========================== SEARCH BAR ============================================================-->
                  //=========================================================================================================
                  function filterFunction_stg() {
                    var input, filter, ul, li, a, i;
                    input = document.getElementById("search_stg");//====search button ID
                    filter = input.value.toUpperCase();
                    div = document.getElementById("dropdown_stg");//====dropdown area
                    a = div.getElementsByTagName("button");//====get buttons in the dropdown area
                    for (i = 0; i < a.length; i++) {
                      txtValue = a[i].textContent || a[i].innerText;
                      if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        a[i].style.display = "";
                      } else {
                        a[i].style.display = "none";
                      }
                    }
                  }
                  </script>
    <!-- ================================================================================================================================================ -->    
    </div>
    <div class="col-1"></div>
    <div class="col-md-4 d-flex justify-content-center">
        <img id="photo_stg" class="AV-a-dropimg" src="assets/preview.png" alt=""><!--==== CHANGE HERE =-->
    </div>
    <div class="col-md-1"></div>
    <div class="col-12"><br></div>
</div>
<!-- graphics ----->   
<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-4">
    <!-- ===================================================================== DROP DOWN BUTTON =========================================================================== -->
                  <div class="shadow">
                    <!--==========================toggle hide myAV-a-dropdown_mb ============================================================-->
                    <button onclick="show_gpu()" class="btn btn-danger btn-lg btn-block" id="DropBtn_gpu">Graphic-CARD</button><!--==== CHANGE HERE =-->
                      <div id="dropdown_gpu" class="AV-a-dropdown-content"><!--==== CHANGE HERE =-->
                        <!--========================== SEARCH BAR ============================================================-->
                        <input type="text" class="form-control mt-2 mb-2" placeholder="Search.." id="search_gpu" onkeyup="filterFunction_gpu()"><!--==== CHANGE HERE =-->
                          <?php
                            if (mysqli_num_rows($result5) > 0) {//====change here
                              // output data of each row
                              while($row = mysqli_fetch_assoc($result5)) {
                                echo '<button class="btn btn-light btn-block" id="'.$row["ID"].'" onmouseover="hover_gpu(this)" onclick="change_gpu(this)" value="'.$row["Image"].','.$row["pci"].','.$row["Price"].','.$row["watt"].'" href="#about">'.$row["Name"].'Price'.$row["Price"].'<img src="'.$row["Image"].'" alt=""></button>';
                                //echo '<input type="text" id="socket'.$row["ID"].'" value="'.$row["Socket"].'" disabled><br>';    "Image":"'.$row["Image"].'", "Socket":"'.$row["Socket"].'"
                              }
                            } else {
                              echo "0 results";
                            }
                          
                          ?>
                        <!-- <button id="" onmouseover="product(this)" onclick="change(this)" value="photo/laptop/3.png" href="#tools"   >Tools   <img src="photo/laptop/3.png" alt=""></button> -->
                      </div>
                  </div>
    <!-- ====================================================================== JS SCRIPT ========================================================================== -->            
                  <script>
                  //==========================toggle hide myAV-a-dropdown_mb ============================================================
                  function show_gpu() {//====change here
                    document.getElementById("dropdown_gpu").classList.toggle("show");//===toggle show
                  }
                  //======================== CHANGE IMAGE WHEN HOVER ============================================
                  //=============================================================================================
                  function hover_gpu(x){
                      //==========================================
                        var res = x.value.split(",");
                        //console.log(res);
                      //==========================================
                      var photo = document.getElementById("photo_gpu");//====get image area
                      photo.src = res[0];
                  }
                  //======================== CHANGE IMAGE WHEN CLICKED ==========================================
                  //=============================================================================================
                  function change_gpu(x){//====chage here
                      var ButtonLable = document.getElementById("DropBtn_gpu");//====get dropdown button to change name
                      var total = document.getElementById("total");//====get total value lable to  change total price
                      var part = document.getElementById("graphics");//====get part to change name
                                  //============================================
                                  function filterFunction_onetime() {
                                      var input, filter, ul, li, a, i;
                                      div = document.getElementById("dropdown_gpu");//====dropdown area
                                      a = div.getElementsByTagName("button");//====get buttons in the dropdown area
                                      for (i = 0; i < a.length; i++) {
                                        var res = a[i].value.split(",");
                                        if(res[1]!=Processor_value){
                                          a[i].disabled = "true";
                                        }else{
                                          a[i].disabled = "";
                                        }
                                      }
                                    }

                                  //==========================================
                                    var res = x.value.split(",");
                                    //console.log(res);
                                    //Processor_value = res[1];//====change here
                                    //filterFunction_onetime();
                                  //=============== VALUE RESET ==============
                                    //document.getElementById("motherboard").value="";
                                    

                                    // document.getElementById("graphics").value="";
                                    // document.getElementById("storage").value="";
                                    // document.getElementById("RAM").value="";
                                    // document.getElementById("cooling").value="";
                                    // document.getElementById("power").value="";
                                    // document.getElementById("casing").value="";
                                  //==========================================

                      part.value = x.innerText;
                      ButtonLable.innerText = x.innerText;

                      total.innerHTML = parseInt(total.innerHTML)+parseInt(res[2]);
                      document.getElementById("dropdown_gpu").classList.toggle("show");//==== hide the dropdown area
                  }
                  //<!--========================== SEARCH BAR ============================================================-->
                  //=========================================================================================================
                  function filterFunction_gpu() {
                    var input, filter, ul, li, a, i;
                    input = document.getElementById("search_gpu");//====search button ID
                    filter = input.value.toUpperCase();
                    div = document.getElementById("dropdown_gpu");//====dropdown area
                    a = div.getElementsByTagName("button");//====get buttons in the dropdown area
                    for (i = 0; i < a.length; i++) {
                      txtValue = a[i].textContent || a[i].innerText;
                      if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        a[i].style.display = "";
                      } else {
                        a[i].style.display = "none";
                      }
                    }
                  }
                  </script>
    <!-- ================================================================================================================================================ -->    
    </div>
    <div class="col-1"></div>
    <div class="col-md-4 d-flex justify-content-center">
        <img id="photo_gpu" class="AV-a-dropimg" src="assets/preview.png" alt=""><!--==== CHANGE HERE =-->
    </div>
    <div class="col-md-1"></div>
    <div class="col-12"><br></div>
</div>
<!-- cooling---- -->  
<div class="row">
    <div class="col-12"><br></div>
    <div class="col-md-2"></div>
    <div class="col-md-4">
    <!-- ===================================================================== DROP DOWN BUTTON =========================================================================== -->
                  <div class="shadow">
                    <!--==========================toggle hide myAV-a-dropdown_mb ============================================================-->
                    <button onclick="show_col()" class="btn btn-danger btn-lg btn-block" id="DropBtn_col">Cooling</button><!--==== CHANGE HERE =-->
                      <div id="dropdown_col" class="AV-a-dropdown-content"><!--==== CHANGE HERE =-->
                        <!--========================== SEARCH BAR ============================================================-->
                        <input type="text" class="form-control mt-2 mb-2" placeholder="Search.." id="search_col" onkeyup="filterFunction_col()"><!--==== CHANGE HERE =-->
                          <?php
                            if (mysqli_num_rows($result6) > 0) {
                              // output data of each row
                              while($row = mysqli_fetch_assoc($result6)) {
                                echo '<button class="btn btn-light btn-block" id="'.$row["ID"].'" onmouseover="hover_col(this)" onclick="change_col(this)" value="'.$row["Image"].','.$row["Socket"].','.$row["Price"].'" href="#about">'.$row["Name"].'Price'.$row["Price"].'<img src="'.$row["Image"].'" alt=""></button>';
                                //echo '<input type="text" id="socket'.$row["ID"].'" value="'.$row["Socket"].'" disabled><br>';    "Image":"'.$row["Image"].'", "Socket":"'.$row["Socket"].'"
                              }
                            } else {
                              echo "0 results";
                            }
                          
                          ?>
                        <!-- <button id="" onmouseover="product(this)" onclick="change(this)" value="photo/laptop/3.png" href="#tools"   >Tools   <img src="photo/laptop/3.png" alt=""></button> -->
                      </div>
                  </div>
    <!-- ====================================================================== JS SCRIPT ========================================================================== -->            
                  <script>
                  //==========================toggle hide myAV-a-dropdown_mb ============================================================
                  function show_col() {//====change here
                    document.getElementById("dropdown_col").classList.toggle("show");//===toggle show
                  }
                  //======================== CHANGE IMAGE WHEN HOVER ============================================
                  //=============================================================================================
                  function hover_col(x){
                      //==========================================
                        var res = x.value.split(",");
                        //console.log(res);
                      //==========================================
                      var photo = document.getElementById("photo_col");//====get image area
                      photo.src = res[0];
                  }
                  //======================== CHANGE IMAGE WHEN CLICKED ==========================================
                  //=============================================================================================
                  function change_col(x){//====chage here
                      var ButtonLable = document.getElementById("DropBtn_col");//====get dropdown button to change name
                      var total = document.getElementById("total");//====get total value lable to  change total price
                      var part = document.getElementById("cooling");//====get part to change name
                                  //============================================
                                  function filterFunction_onetime() {
                                      var input, filter, ul, li, a, i;
                                      div = document.getElementById("dropdown_mbd");//====dropdown area
                                      a = div.getElementsByTagName("button");//====get buttons in the dropdown area
                                      for (i = 0; i < a.length; i++) {
                                        var res = a[i].value.split(",");
                                        if(res[1]!=Processor_value){
                                          a[i].disabled = "true";
                                        }else{
                                          a[i].disabled = "";
                                        }
                                      }
                                    }

                                  //==========================================
                                    var res = x.value.split(",");
                                    //console.log(res);
                                    //Processor_value = res[1];//====change here
                                    //filterFunction_onetime();
                                  //=============== VALUE RESET ==============
                                    // document.getElementById("DropBtn_mbd").hidden="";

                                    // document.getElementById("motherboard").value="";
                                    // document.getElementById("DropBtn_mbd").innerHTML="Mother-Board";
                                    // document.getElementById("DropBtn_pro").style.background='#5cb85c';
                                    // document.getElementById("photo_mbd").src="assets/preview.png";
                  

                                    // document.getElementById("graphics").value="";
                                    // document.getElementById("DropBtn_gpu").innerHTML="Graphic-Card";
                                    // document.getElementById("photo_gpu").src="assets/preview.png";

                                    // document.getElementById("storage").value="";
                                    // document.getElementById("DropBtn_stg").innerHTML="Storage";
                                    // document.getElementById("photo_stg").src="assets/preview.png";

                                    // document.getElementById("RAM").value="";
                                    // document.getElementById("DropBtn_ram").innerHTML="Mother-Board";
                                    // document.getElementById("photo_ram").src="assets/preview.png";

                                    // document.getElementById("cooling").value="";
                                    // document.getElementById("DropBtn_col").innerHTML="Mother-Board";
                                    // document.getElementById("photo_col").src="assets/preview.png";

                                    // document.getElementById("power").value="";
                                    // document.getElementById("DropBtn_pow").innerHTML="Mother-Board";
                                    // document.getElementById("photo_pow").src="assets/preview.png";

                                    // document.getElementById("casing").value="";
                                    // document.getElementById("DropBtn_cas").innerHTML="Mother-Board";
                                    // document.getElementById("photo_cas").src="assets/preview.png";
                                  //==========================================

                      part.value = x.innerText;
                      ButtonLable.innerText = x.innerText;

                      total.innerHTML = parseInt(total.innerHTML)+parseInt(res[2]);
                      document.getElementById("dropdown_col").classList.toggle("show");//==== hide the dropdown area
                  }
                  //<!--========================== SEARCH BAR ============================================================-->
                  //=========================================================================================================
                  function filterFunction_col() {
                    var input, filter, ul, li, a, i;
                    input = document.getElementById("search_col");//====search button ID
                    filter = input.value.toUpperCase();
                    div = document.getElementById("dropdown_col");//====dropdown area
                    a = div.getElementsByTagName("button");//====get buttons in the dropdown area
                    for (i = 0; i < a.length; i++) {
                      txtValue = a[i].textContent || a[i].innerText;
                      if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        a[i].style.display = "";
                      } else {
                        a[i].style.display = "none";
                      }
                    }
                  }
                  </script>
    <!-- ================================================================================================================================================ -->    
    </div>
    <div class="col-1"></div>
    <div class="col-md-4 d-flex justify-content-center">
        <img id="photo_col" class="AV-a-dropimg" src="assets/preview.png" alt=""><!--==== CHANGE HERE =-->
    </div>
    <div class="col-md-1"></div>
    <div class="col-12"><br></div>
</div>
<!-- power -------->  
<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-4">
    <!-- ===================================================================== DROP DOWN BUTTON =========================================================================== -->
                  <div class="shadow">
                    <!--==========================toggle hide myAV-a-dropdown_mb ============================================================-->
                    <button onclick="show_pow()" class="btn btn-danger btn-lg btn-block" id="DropBtn_pow">Power-Supply</button><!--==== CHANGE HERE =-->
                      <div id="dropdown_pow" class="AV-a-dropdown-content"><!--==== CHANGE HERE =-->
                        <!--========================== SEARCH BAR ============================================================-->
                        <input type="text" class="form-control mt-2 mb-2" placeholder="Search.." id="search_pow" onkeyup="filterFunction_pow()"><!--==== CHANGE HERE =-->
                          <?php
                            if (mysqli_num_rows($result7) > 0) {//====change here
                              // output data of each row
                              while($row = mysqli_fetch_assoc($result7)) {
                                echo '<button class="btn btn-light btn-block" id="'.$row["ID"].'" onmouseover="hover_pow(this)" onclick="change_pow(this)" value="'.$row["Image"].','.$row["watt"].','.$row["Price"].'" href="#about">'.$row["Name"].'Price'.$row["Price"].'<img src="'.$row["Image"].'" alt=""></button>';
                                //echo '<input type="text" id="socket'.$row["ID"].'" value="'.$row["Socket"].'" disabled><br>';    "Image":"'.$row["Image"].'", "Socket":"'.$row["Socket"].'"
                              }
                            } else {
                              echo "0 results";
                            }
                          
                          ?>
                        <!-- <button id="" onmouseover="product(this)" onclick="change(this)" value="photo/laptop/3.png" href="#tools"   >Tools   <img src="photo/laptop/3.png" alt=""></button> -->
                      </div>
                  </div>
    <!-- ====================================================================== JS SCRIPT ========================================================================== -->            
                  <script>
                  //==========================toggle hide myAV-a-dropdown_mb ============================================================
                  function show_pow() {//====change here
                    document.getElementById("dropdown_pow").classList.toggle("show");//===toggle show
                  }
                  //======================== CHANGE IMAGE WHEN HOVER ============================================
                  //=============================================================================================
                  function hover_pow(x){
                      //==========================================
                        var res = x.value.split(",");
                        //console.log(res);
                      //==========================================
                      var photo = document.getElementById("photo_pow");//====get image area
                      photo.src = res[0];
                  }
                  //======================== CHANGE IMAGE WHEN CLICKED ==========================================
                  //=============================================================================================
                  function change_pow(x){//====chage here
                      var ButtonLable = document.getElementById("DropBtn_pow");//====get dropdown button to change name
                      var total = document.getElementById("total");//====get total value lable to  change total price
                      var part = document.getElementById("power");//====get part to change name
                                  //============================================
                                  function filterFunction_onetime() {
                                      var input, filter, ul, li, a, i;
                                      div = document.getElementById("dropdown_pow");//====dropdown area
                                      a = div.getElementsByTagName("button");//====get buttons in the dropdown area
                                      for (i = 0; i < a.length; i++) {
                                        var res = a[i].value.split(",");
                                        if(res[1]!=Processor_value){
                                          a[i].disabled = "true";
                                        }else{
                                          a[i].disabled = "";
                                        }
                                      }
                                    }

                                  //==========================================
                                    var res = x.value.split(",");
                                    //console.log(res);
                                    //Processor_value = res[1];//====change here
                                    //filterFunction_onetime();
                                  //=============== VALUE RESET ==============
                                    //document.getElementById("motherboard").value="";
                                    
                                    // document.getElementById("storage").value="";
                                    // document.getElementById("RAM").value="";
                                    // document.getElementById("cooling").value="";
                                    // document.getElementById("power").value="";
                                    // document.getElementById("casing").value="";
                                  //==========================================

                      part.value = x.innerText;
                      ButtonLable.innerText = x.innerText;

                      total.innerHTML = parseInt(total.innerHTML)+parseInt(res[2]);
                      document.getElementById("dropdown_pow").classList.toggle("show");//==== hide the dropdown area
                  }
                  //<!--========================== SEARCH BAR ============================================================-->
                  //=========================================================================================================
                  function filterFunction_pow() {
                    var input, filter, ul, li, a, i;
                    input = document.getElementById("search_pow");//====search button ID
                    filter = input.value.toUpperCase();
                    div = document.getElementById("dropdown_pow");//====dropdown area
                    a = div.getElementsByTagName("button");//====get buttons in the dropdown area
                    for (i = 0; i < a.length; i++) {
                      txtValue = a[i].textContent || a[i].innerText;
                      if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        a[i].style.display = "";
                      } else {
                        a[i].style.display = "none";
                      }
                    }
                  }
                  </script>
    <!-- ================================================================================================================================================ -->    
    </div>
    <div class="col-1"></div>
    <div class="col-md-4 d-flex justify-content-center">
        <img id="photo_pow" class="AV-a-dropimg" src="assets/preview.png" alt=""><!--==== CHANGE HERE =-->
    </div>
    <div class="col-md-1"></div>
    <div class="col-12"><br></div>
</div>
<!-- casing----- -->  
<div class="row">
    <div class="col-12"><br></div>
    <div class="col-md-2"></div>
    <div class="col-md-4">
    <!-- ===================================================================== DROP DOWN BUTTON =========================================================================== -->
                  <div class="shadow">
                    <!--==========================toggle hide myAV-a-dropdown_mb ============================================================-->
                    <button onclick="show_cas()" class="btn btn-danger btn-lg btn-block" id="DropBtn_cas">Casing</button><!--==== CHANGE HERE =-->
                      <div id="dropdown_cas" class="AV-a-dropdown-content"><!--==== CHANGE HERE =-->
                        <!--========================== SEARCH BAR ============================================================-->
                        <input type="text" class="form-control mt-2 mb-2" placeholder="Search.." id="search_cas" onkeyup="filterFunction_cas()"><!--==== CHANGE HERE =-->
                          <?php
                            if (mysqli_num_rows($result8) > 0) {
                              // output data of each row
                              while($row = mysqli_fetch_assoc($result8)) {
                                echo '<button class="btn btn-light btn-block" id="'.$row["ID"].'" onmouseover="hover_cas(this)" onclick="change_cas(this)" value="'.$row["Image"].','.$row["size"].','.$row["Price"].'" href="#about">'.$row["Name"].'Price'.$row["Price"].'<img src="'.$row["Image"].'" alt=""></button>';
                                //echo '<input type="text" id="socket'.$row["ID"].'" value="'.$row["Socket"].'" disabled><br>';    "Image":"'.$row["Image"].'", "Socket":"'.$row["Socket"].'"
                              }
                            } else {
                              echo "0 results";
                            }
                          
                          ?>
                        <!-- <button id="" onmouseover="product(this)" onclick="change(this)" value="photo/laptop/3.png" href="#tools"   >Tools   <img src="photo/laptop/3.png" alt=""></button> -->
                      </div>
                  </div>
    <!-- ====================================================================== JS SCRIPT ========================================================================== -->            
                  <script>
                  //==========================toggle hide myAV-a-dropdown_mb ============================================================
                  function show_cas() {//====change here
                    document.getElementById("dropdown_cas").classList.toggle("show");//===toggle show
                  }
                  //======================== CHANGE IMAGE WHEN HOVER ============================================
                  //=============================================================================================
                  function hover_cas(x){
                      //==========================================
                        var res = x.value.split(",");
                        //console.log(res);
                      //==========================================
                      var photo = document.getElementById("photo_cas");//====get image area
                      photo.src = res[0];
                  }
                  //======================== CHANGE IMAGE WHEN CLICKED ==========================================
                  //=============================================================================================
                  function change_cas(x){//====chage here
                      var ButtonLable = document.getElementById("DropBtn_cas");//====get dropdown button to change name
                      var total = document.getElementById("total");//====get total value lable to  change total price
                      var part = document.getElementById("casing");//====get part to change name
                                  //============================================
                                  function filterFunction_onetime() {
                                      var input, filter, ul, li, a, i;
                                      div = document.getElementById("dropdown_mbd");//====dropdown area
                                      a = div.getElementsByTagName("button");//====get buttons in the dropdown area
                                      for (i = 0; i < a.length; i++) {
                                        var res = a[i].value.split(",");
                                        if(res[1]!=Processor_value){
                                          a[i].disabled = "true";
                                        }else{
                                          a[i].disabled = "";
                                        }
                                      }
                                    }

                                  //==========================================
                                    var res = x.value.split(",");
                                    //console.log(res);
                                    //Processor_value = res[1];//====change here
                                    //filterFunction_onetime();
                                  //=============== VALUE RESET ==============
                                    // document.getElementById("DropBtn_mbd").hidden="";

                                    // document.getElementById("motherboard").value="";
                                    // document.getElementById("DropBtn_mbd").innerHTML="Mother-Board";
                                    // document.getElementById("DropBtn_pro").style.background='#5cb85c';
                                    // document.getElementById("photo_mbd").src="assets/preview.png";
                  

                                    // document.getElementById("graphics").value="";
                                    // document.getElementById("DropBtn_gpu").innerHTML="Graphic-Card";
                                    // document.getElementById("photo_gpu").src="assets/preview.png";

                                    // document.getElementById("storage").value="";
                                    // document.getElementById("DropBtn_stg").innerHTML="Storage";
                                    // document.getElementById("photo_stg").src="assets/preview.png";

                                    // document.getElementById("RAM").value="";
                                    // document.getElementById("DropBtn_ram").innerHTML="Mother-Board";
                                    // document.getElementById("photo_ram").src="assets/preview.png";

                                    // document.getElementById("cooling").value="";
                                    // document.getElementById("DropBtn_col").innerHTML="Mother-Board";
                                    // document.getElementById("photo_col").src="assets/preview.png";

                                    // document.getElementById("power").value="";
                                    // document.getElementById("DropBtn_pow").innerHTML="Mother-Board";
                                    // document.getElementById("photo_pow").src="assets/preview.png";

                                    // document.getElementById("casing").value="";
                                    // document.getElementById("DropBtn_cas").innerHTML="Mother-Board";
                                    // document.getElementById("photo_cas").src="assets/preview.png";
                                  //==========================================

                      part.value = x.innerText;
                      ButtonLable.innerText = x.innerText;

                      total.innerHTML = parseInt(total.innerHTML)+parseInt(res[2]);
                      document.getElementById("dropdown_cas").classList.toggle("show");//==== hide the dropdown area
                  }
                  //<!--========================== SEARCH BAR ============================================================-->
                  //=========================================================================================================
                  function filterFunction_cas() {
                    var input, filter, ul, li, a, i;
                    input = document.getElementById("search_cas");//====search button ID
                    filter = input.value.toUpperCase();
                    div = document.getElementById("dropdown_cas");//====dropdown area
                    a = div.getElementsByTagName("button");//====get buttons in the dropdown area
                    for (i = 0; i < a.length; i++) {
                      txtValue = a[i].textContent || a[i].innerText;
                      if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        a[i].style.display = "";
                      } else {
                        a[i].style.display = "none";
                      }
                    }
                  }
                  </script>
    <!-- ================================================================================================================================================ -->    
    </div>
    <div class="col-1"></div>
    <div class="col-md-4 d-flex justify-content-center">
        <img id="photo_cas" class="AV-a-dropimg" src="assets/preview.png" alt=""><!--==== CHANGE HERE =-->
    </div>
    <div class="col-md-1"></div>
    <div class="col-12"><br></div>
</div>


        
  <?php include 'preset/footer.php';?>
  <div class="row">
  <div class="col-12 m-0 p-0">
      
      <!-- Button trigger modal -->
      <button type="button" id="BuyItem" class="btn btn-warning btn-lg btn-block" data-toggle="modal" data-target="#exampleModalCenter" style="position: fixed;bottom: 0;z-index:3;height:40px;border-radius: 60px 60px 0px 0px;">
        Rs 0.00
      </button>

      <!-- Modal -->
      <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalCenterTitle">Modal title</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="cart.php" id="form"  method="post">
                <label>Processor   :</label>
                <input type="text" class="form-control" id="processor" name="processor"><br>
                <label>MotherBoard :</label>
                <input type="text" class="form-control" id="motherboard" name="motherboard"><br>
                <label>Graphics    :</label>
                <input type="text" class="form-control" id="graphics" name="graphics"><br>
                <label>HardDisk    :</label>
                <input type="text" class="form-control" id="storage" name="storage"><br>
                <label>RAM         :</label>
                <input type="text" class="form-control" id="RAM" name="RAM" ><br>
                <label>Cooling     :</label>
                <input type="text" class="form-control" id="cooling" name="cooling"><br>
                <label>Power       :</label>
                <input type="text" class="form-control" id="power" name="power"><br>
                <label>Casing      :</label>
                <input type="text" class="form-control" id="casing" name="casing"><br>
                <label>Total     :Rs</label><label id="total">0</label><label>.00/=</label><br>
                <input type="text" name="totalSub"                 id="totalSub" hidden><br>
                <input type="text" name="CustomPC" value="yes"                 hidden><br>
                
                <script>
                function formSubmit() {
                  
                  submit1 = document.getElementById("processor");
                  submit2 = document.getElementById("motherboard");
                  submit3 = document.getElementById("graphics");
                  submit4 = document.getElementById("storage");
                  submit5 = document.getElementById("RAM");
                  submit6 = document.getElementById("cooling");
                  submit7 = document.getElementById("power");
                  submit8 = document.getElementById("casing");

                  if(submit1.value == ""){submit1.placeholder="plz select a processor";}
                  if(submit2.value == ""){submit2.placeholder="plz select a motherboard";}
                  if(submit3.value == ""){submit3.placeholder="plz select a graphics";}
                  if(submit4.value == ""){submit4.placeholder="plz select a storage";}
                  if(submit5.value == ""){submit5.placeholder="plz select a RAM";}
                  if(submit6.value == ""){submit6.placeholder="plz select a cooling";}
                  if(submit7.value == ""){submit7.placeholder="plz select a power";}
                  if(submit8.value == ""){submit8.placeholder="plz select a casing";}

                  if(submit1.value==""||submit2.value==""||submit3.value==""||submit4.value==""||submit5.value==""||submit6.value==""||submit7.value==""||submit8.value==""){
                    return null;
                  }
                  else{
                    document.getElementById("totalSub").value = document.getElementById("total").innerHTML;
                    document.getElementById("form").submit();
                  }
                }
                </script>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <input type="button" onclick="formSubmit()" value="Submit" class="btn btn-primary">
              </form> 
            </div>
          </div>
        </div>
      </div>
      <!-- ---------------------------------- -->
</div>
      <div class="col-12" style="background-color: black;"><br></div>
      <script>
        var Processor_value;
        var MotherBoard_value;
        var Storage_value;
        var RAM_value;
        var GPU_value;

        var Processor_normal="assets/preview.png";
        var Processor_normal;
        var Processor_normal;
        var Processor_normal;
        //document.getElementById("DropBtn_mbd").hidden="true";
      </script>
  </div>
</div>





</body>
</html>

