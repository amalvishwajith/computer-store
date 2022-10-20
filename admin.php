<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["ADMINloggedin"]) || $_SESSION["ADMINloggedin"] !== true){
    header("location: database/admin_login.php");
    exit;
}


require_once "database/config.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="icon" href="assets/sitelogo.png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    <link rel="stylesheet" href="style/owl.carousel.min.css">
    <link rel="stylesheet" href="style/owl.theme.default.min.css">

    <title>Horizon Computers</title>

        <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="style/owl.carousel.min.js"></script>
    <style>
        .AVmenu{
            border-right: 1px solid rgb(158, 158, 158);
        }
        .AVmenu_hide{
            visibility:hidden;
        }


        @media only screen and (max-width: 768px) {
            .AVmenu_hide{
                visibility:visible
            }
            .AVmenu{
                display: none;
            }
        }



    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row bg-primary">
            <div class="col-md-6"><h2 class="float-left">Horizon Computers</h2><br></div>
            <div class="col-md-6">
                        <div class="AVmenu_hide btn-group dropdown float-right">
                        <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Dropright
                        </button>
                        <div class="dropdown-menu">
                            <!-- Dropdown menu links -->
                            <div class="list-group" id="list-tab" role="tablist">
                            <a class="list-group-item list-group-item-action" id="list-home-list" data-toggle="list" href="#list-home" role="tab" aria-controls="home">Home</a>
                            <a class="list-group-item list-group-item-action" id="list-products-list" data-toggle="list" href="#list-products" role="tab" aria-controls="products">Products</a>
                            <a class="list-group-item list-group-item-action" id="list-messages-list" data-toggle="list" href="#list-messages" role="tab" aria-controls="messages">Messages</a>
                            <a class="list-group-item list-group-item-action" id="list-settings-list" data-toggle="list" href="#list-settings" role="tab" aria-controls="settings">Settings</a>

                            <a class="list-group-item list-group-item-action" id="list-home-list" data-toggle="list" href="#list-home" role="tab" aria-controls="home">Home</a>
                            <a class="list-group-item list-group-item-action" id="list-customer-list" data-toggle="list" href="#list-customer" role="tab" aria-controls="customer">Customers</a>
                            <a class="list-group-item list-group-item-action" id="list-messages-list" data-toggle="list" href="#list-messages" role="tab" aria-controls="messages">Messages</a>
                            <a class="list-group-item list-group-item-action" id="list-settings-list" data-toggle="list" href="#list-settings" role="tab" aria-controls="settings">Settings</a>
                        </div>
                        </div>
                        </div>
            </div>
        </div>
        <div class="row">
            <div class="col-2 AVmenu">

                    <br>

                      <div class="list-group" id="list-tab" role="tablist">
                        <a class="list-group-item list-group-item-action" id="list-home-list" data-toggle="list" href="#list-home" role="tab" aria-controls="home">Home</a>
                        <a class="list-group-item list-group-item-action" id="list-statics-list" data-toggle="list" href="#list-statics" role="tab" aria-controls="statics" onclick="drowchart()">Statics</a>
                        <a class="list-group-item list-group-item-action" id="list-add-list" data-toggle="list" href="#list-add" role="tab" aria-controls="add">Add Products</a>
                        <a class="list-group-item list-group-item-action" id="list-update-list" data-toggle="list" href="#list-update" role="tab" aria-controls="update">Update Products</a>

                        <a class="list-group-item list-group-item-action" id="list-orders-list" data-toggle="list" href="#list-orders" role="tab" aria-controls="orders">Orders</a>
                        <a class="list-group-item list-group-item-action" id="list-customer-list" data-toggle="list" href="#list-customer" role="tab" aria-controls="customer">Customers</a>
                        <a class="list-group-item list-group-item-action" id="list-messages-list" data-toggle="list" href="#list-messages" role="tab" aria-controls="messages">Messages</a>
                        <a class="list-group-item list-group-item-action" id="list-settings-list" data-toggle="list" href="#list-settings" role="tab" aria-controls="settings">Settings</a>
                      </div>
                      <div style="border: 1px solid red;width:100%;height: 400px;" id="UserInformation">

                    </div>

            </div>



            <div class="col-md-10">

                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
                        1
                        <h4>Welcome Admin</h4><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                        <a href="database/admin_logout.php">logout</a>
                    </div>
                    <div class="tab-pane fade" id="list-statics" role="tabpanel" aria-labelledby="list-statics-list">
                        2
                        <h5 >products</h5>
                        <div class="row">
                            <div class="col-4">

                            </div>
                            <div class="col-4">
                                    <?php
                                        $sql="SELECT SUM(Quantity) FROM products WHERE Category = 'casing' 
                                        UNION SELECT SUM(Quantity) FROM products WHERE Category = 'cooling' 
                                        UNION SELECT SUM(Quantity) FROM products WHERE Category = 'graphics' 
                                        UNION SELECT SUM(Quantity) FROM products WHERE Category = 'laptop' 
                                        UNION SELECT SUM(Quantity) FROM products WHERE Category = 'motherboard' 
                                        UNION SELECT SUM(Quantity) FROM products WHERE Category = 'monitors' 
                                        UNION SELECT SUM(Quantity) FROM products WHERE Category = 'power' 
                                        UNION SELECT SUM(Quantity) FROM products WHERE Category = 'proccessor' 
                                        UNION SELECT SUM(Quantity) FROM products WHERE Category = 'ram' 
                                        UNION SELECT SUM(Quantity) FROM products WHERE Category = 'storage' ";

                                        $result=mysqli_query($link, $sql);
                                        echo mysqli_error($link);
                                        $piedata="";
                                        while($row = mysqli_fetch_assoc($result)){
                                            $piedata.= $row['SUM(Quantity)'].",";
                                        }
                                    ?>
                                    <canvas id="pie-chart"></canvas>
                                    <script>
                                        var chart1 = new Chart();
                                        function drowchart(){
                                            setTimeout(function(){ 
                                                chart1.destroy();

                                                chart1 = new Chart(document.getElementById("pie-chart"), {
                                                    type: 'pie',
                                                    data: {
                                                    labels: ["casing", "cooling", "graphics", "laptop", "motherboard", "monitors", "power", "proccessor", "ram", "storage"],
                                                    datasets: [{
                                                        label: "Population (millions)",
                                                        backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850","#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"],
                                                        data: [<?php echo $piedata; ?>]
                                                    }]
                                                    },
                                                    options: {
                                                    title: {
                                                        display: true,
                                                        text: 'Predicted world population (millions) in 2050'
                                                    }
                                                    }
                                                });
                                                
                          


                                             }, 500);

                                        }

                                    </script>
                            </div>
                            <div class="col-4"></div>
                        </div>

    
                    </div>
                    <div class="tab-pane fade" id="list-add" role="tabpanel" aria-labelledby="list-add-list">
                        3
                        <form id="MB" enctype="multipart/form-data">
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label>Category</label>
                                    <select class="form-control" name="Category" onchange="changeSpec(this);">
                                    <option>Laptop</option>
                                    <option>Desktop</option>
                                    <option>Casing</option>
                                    <option>Cooling</option>
                                    <option>Graphics</option>
                                    <option>MotherBoard</option>
                                    <option>Monitors</option>
                                    <option>PowerSupply</option>
                                    <option>Processor</option>
                                    <option>RAM</option>
                                    <option>Storage</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Price</label>
                                    <input type="number" class="form-control" name="Price">
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Brand</label>
                                    <select class="form-control" name="Brand">
                                    <option>ASUS</option>
                                    <option>ACER</option>
                                    <option>SAMSUNG</option>
                                    <option>G-SKILL</option>
                                    <option>ADATA</option>
                                    <option>GIGABYTE</option>
                                    <option>Monitors</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" class="form-control" name="Name">
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-3">
                                    <label id="spec1a">Processor</label>
                                    <input id="spec1b" type="text" class="form-control" name="Spec1">
                                </div>
                                <div class="form-group col-md-3">
                                    <label id="spec2a">GPU</label>
                                    <input id="spec2b" type="text" class="form-control" name="Spec2">
                                </div>
                                <div class="form-group col-md-3">
                                    <label id="spec3a">RAM</label>
                                    <input id="spec3b" type="number" class="form-control" name="Spec3">
                                </div>
                                <div class="form-group col-md-3">
                                    <label id="spec4a">Size</label>
                                    <input id="spec4b" type="number" class="form-control" name="Spec4">
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Quantity</label>
                                <input type="number" class="form-control" name="Quantity">
                            </div>
                            <div class="form-group">
                                <label>About</label>
                                <textarea class="form-control" rows="5" name="About"></textarea>
                                <input type="text" name="task" value="AddNew" hidden>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-3">
                                    <label>Image</label>
                                    <input type="file" class="form-control-file" name="image" required onchange="readURL(this);">
                                </div>
                                <div class="form-group col-md-3">
                                    <img id="preview" src="http://placehold.it/180" alt="your image" style="width: 200px;">
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="submit" class="form-control-file" value="Add">
                            </div>
                        </form>
                        <script>
                                    const myForm2 = document.getElementById('MB');

                                    myForm2.addEventListener('submit', function(e){
                                        e.preventDefault();

                                        const formData = new FormData(this);

                                        fetch('products.php', {
                                            method:"POST",
                                            body: formData
                                        }).then(function (response) {
                                            return response.text();
                                        })
                                        .then(function (data) {
                                            console.log(data);
                                        })

                                        console.log("send");

                                    })
                                    /////////////////////////////////////PREVIEW CHANGE///////////////////////////////////////////
                                    function readURL(input) {
                                        if (input.files && input.files[0]) {
                                            var reader = new FileReader();

                                            reader.onload = function (e) {
                                                $('#preview')
                                                    .attr('src', e.target.result);
                                            };

                                            reader.readAsDataURL(input.files[0]);
                                        }
                                    }

                                    function changeSpec(input) {
                                        var spec1a = document.getElementById('spec1a')
                                        var spec1b = document.getElementById('spec1b')
                                        var spec2a = document.getElementById('spec2a')
                                        var spec2b = document.getElementById('spec2b')
                                        var spec3a = document.getElementById('spec3a')
                                        var spec3b = document.getElementById('spec3b')
                                        var spec4a = document.getElementById('spec4a')
                                        var spec4b = document.getElementById('spec4b')

                                        var cat = input.value;

                                        switch(cat) {
                                        case 'Laptop':
                                            spec1a.innerHTML = 'Processor';spec2a.innerHTML='GPU';spec3a.innerHTML='RAM';spec4a.innerHTML='Size';
                                            spec1b.hidden='';spec2b.hidden='';spec3b.hidden='';spec4b.hidden='';
                                            break;
                                        case 'Desktop':
                                            spec1a.innerHTML = 'Processor';spec2a.innerHTML='GPU';spec3a.innerHTML='RAM';spec4a.innerHTML='Size';
                                            spec1b.hidden='';spec2b.hidden='';spec3b.hidden='';spec4b.hidden='';
                                            break;
                                        case 'Casing':
                                            spec1a.innerHTML = 'Form Factor';spec2a.innerHTML='';spec3a.innerHTML='';spec4a.innerHTML='';
                                            spec1b.hidden='';spec2b.hidden=true;spec3b.hidden=true;spec4b.hidden=true;
                                            break;
                                        case 'Cooling':
                                            spec1a.innerHTML = 'Socket';spec2a.innerHTML='Liquid/Air';spec3a.innerHTML='Number of Fans';spec4a.innerHTML='';
                                            spec1b.hidden='';spec2b.hidden='';spec3b.hidden='';spec4b.hidden=true;
                                            break;
                                        case 'Graphics':
                                            spec1a.innerHTML = 'Chipset';spec2a.innerHTML='PCI Version';spec3a.innerHTML='Size';spec4a.innerHTML='Rated Power Supply';
                                            spec1b.hidden='';spec2b.hidden='';spec3b.hidden='';spec4b.hidden='';
                                            break;
                                        case 'MotherBoard':
                                            spec1a.innerHTML = 'CPU Socket';spec2a.innerHTML='Latest hard disk socket';spec3a.innerHTML='DDR Version';spec4a.innerHTML='PCI Version';
                                            spec1b.hidden='';spec2b.hidden='';spec3b.hidden='';spec4b.hidden='';
                                            break;
                                        case 'Monitors':
                                            spec1a.innerHTML = 'Resolution';spec2a.innerHTML='';spec3a.innerHTML='Hertz';spec4a.innerHTML='Size';
                                            spec1b.hidden='';spec2b.hidden=true;spec3b.hidden='';spec4b.hidden='';
                                            break;
                                        case 'PowerSupply':
                                            spec1a.innerHTML = 'Efficiency';spec2a.innerHTML='Watt';spec3a.innerHTML='';spec4a.innerHTML='';
                                            spec1b.hidden='';spec2b.hidden='';spec3b.hidden=true;spec4b.hidden=true;
                                            break;
                                        case 'Processor':
                                            spec1a.innerHTML = 'Socket';spec2a.innerHTML='';spec3a.innerHTML='Cores';spec4a.innerHTML='';
                                            spec1b.hidden='';spec2b.hidden=true;spec3b.hidden='';spec4b.hidden=true;
                                            break;
                                        case 'RAM':
                                            spec1a.innerHTML = 'DDR Version';spec2a.innerHTML='Package Size';spec3a.innerHTML='Memory';spec4a.innerHTML='Hertz';
                                            spec1b.hidden='';spec2b.hidden='';spec3b.hidden='';spec4b.hidden='';
                                            break;
                                        case 'Storage':
                                            spec1a.innerHTML = 'Des/Lap/Both';spec2a.innerHTML='Socket';spec3a.innerHTML='Capacity';spec4a.innerHTML='';
                                            spec1b.hidden='';spec2b.hidden='';spec3b.hidden='';spec4b.hidden=true;
                                            break;
                                        default:
                                            // code block
                                        }
                                    }
                                    ////////////////////////////////////////////////////////////////////////////////


                                
                                </script>
                        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                    </div>
                    <div class="tab-pane fade" id="list-update" role="tabpanel" aria-labelledby="list-update-list">
                                    4
                        <form id="filter" >
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label>Category</label>
                                        <select class="form-control" id="editcat" name="Category" onchange="filter(this)">
                                        <option value="laptop" >Laptop</option>
                                        <option value="desktop" >Desktop</option>
                                        <option value="casing" >Casing</option>
                                        <option value="cooling" >Cooling</option>
                                        <option value="graphics" >Graphics</option>
                                        <option value="motherboard" >MotherBoard</option>
                                        <option value="monitors" >Monitors</option>
                                        <option value="power" >PowerSupply</option>
                                        <option value="proccessor" >Processor</option>
                                        <option value="ram" >RAM</option>
                                        <option value="storage" >Storage</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>Brand</label>
                                        <select class="form-control" name="Brand">
                                        <?php
                                            $sql="SELECT DISTINCT Brand FROM products ORDER BY Brand";
                                            $result = mysqli_query($link, $sql);
                                            while($row = mysqli_fetch_assoc($result)){
                                        ?>
                                        
                                        <option><?=$row['Brand']; ?></option>

                                        <?php }?>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>limit</label>
                                        <input type="number" class="form-control" name="limit">
                                        <input type="text" name="task" value="Update" hidden>
                                    </div>

                                </div>
                        </form>
                        <script>
                            function filter(input) {
                                const formData = new FormData(document.getElementById('filter'));
                                console.log("amal2");
                                fetch('products.php', {
                                    method:"POST",
                                    body: formData
                                }).then(function (response) {
                                    return response.text();
                                })
                                .then(function (data) {
                                    document.getElementById("TableBody").innerHTML = data;
                                })

                                console.log("send");

                            }


                        </script>
                        <br><br><br><br>








                        <table class="table">
                        <caption>List of users</caption>
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name<h6>Spec1</h6></th>
                            <th scope="col">Brand<h6>Spec2</h6></th>
                            <th scope="col">Availability<h6>Spec3</h6></th>
                            <th scope="col">Quantity<h6>Spec4</h6></th>
                            <th scope="col">Price</th>
                            <th scope="col">About</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Update</th>
                            </tr>
                        </thead>
                        <tbody id="TableBody">
                        <?php
                            $sql="SELECT ID,Spec1,Spec2,Spec3,Spec4,Price,Brand,Name,Availability,Quantity,About,Price FROM products  LIMIT 20";
                            $result = mysqli_query($link, $sql);
                            $number=1;
                            while($row = mysqli_fetch_assoc($result)){
                        ?>
                            <tr>
                                <th scope="row"><?= $number ?><hr><h6>Specs</h6></th>
                            <form id="<?= $row['ID'] ?>">
                                <th scope="col"                      >      <input      class="form-control <?= $row['ID'] ?>" type="text" name="Name" value="<?= $row['Name'] ?>"         style="pointer-events: none;"><input class="form-control <?= $row['ID'] ?>" type="text" name="Spec1" value="<?= $row['Spec1'] ?>" style="pointer-events: none;margin-top:10px;"></th>
                                <th style="width: 100px;" scope="col">      <input      class="form-control <?= $row['ID'] ?>" type="text" name="Brand" value="<?= $row['Brand'] ?>"        style="pointer-events: none;"><input class="form-control <?= $row['ID'] ?>" type="text" name="Spec2" value="<?= $row['Spec2'] ?>" style="pointer-events: none;margin-top:10px;"></th>
                                <th style="width: 50px;" scope="col" >      <input      class="form-control <?= $row['ID'] ?>" type="text" name="Availability" value="<?= $row['Availability'] ?>" style="pointer-events: none;"><input class="form-control <?= $row['ID'] ?>" type="text" name="Spec3" value="<?= $row['Spec3'] ?>" style="pointer-events: none;margin-top:10px;"></th>
                                <th style="width: 50px;" scope="col" >      <input      class="form-control <?= $row['ID'] ?>" type="text" name="Quantity" value="<?= $row['Quantity'] ?>"     style="pointer-events: none;"><input class="form-control <?= $row['ID'] ?>" type="text" name="Spec4" value="<?= $row['Spec4'] ?>" style="pointer-events: none;margin-top:10px;"></th>
                                <th style="width: 50px;" scope="col" >      <input      class="form-control <?= $row['ID'] ?>" type="text" name="Price" value="<?= $row['Price'] ?>"        style="pointer-events: none;"></th>
                                <th scope="col"                      >      <textarea   class="form-control <?= $row['ID'] ?>" rows="4"    name="About"  cols="50"                    style="pointer-events: none;"><?= $row['About'] ?></textarea></th>
                            </form>
                                <th scope="col"                      >      <button onclick="table('<?= $row['ID'] ?>')">Edit</button></th>
                                <th scope="col"                      >      <button class="<?= $row['ID'] ?>" onclick="submitForm('<?= $row['ID'] ?>')" style="pointer-events: none;">Update</button></th>
                            </tr>

                        <?php $number+=1; }?>
                        </tbody>
                        </table>
                        <script>
                            function table(id) {
                                var x = document.getElementsByClassName(id);
                                //console.log(id);
                                x[0].style.pointerEvents = 'all';
                                x[1].style.pointerEvents = 'all';
                                x[2].style.pointerEvents = 'all';
                                x[3].style.pointerEvents = 'all';
                                x[4].style.pointerEvents = 'all';
                                x[5].style.pointerEvents = 'all';
                                x[6].style.pointerEvents = 'all';
                                x[7].style.pointerEvents = 'all';
                                x[8].style.pointerEvents = 'all';
                                x[9].style.pointerEvents = 'all';
                                x[10].style.pointerEvents = 'all';

                            }
                            function submitForm(id){

                                var y = document.getElementsByClassName(id);
                                const formData = new FormData();
                                formData.append("Name"  , y[0].value);
                                formData.append("Spec1" , y[1].value);
                                formData.append("Brand" , y[2].value);
                                formData.append("Spec2" , y[3].value);
                                formData.append("Availability" , y[4].value);
                                formData.append("Spec3" , y[5].value);
                                formData.append("Quantity" , y[6].value);
                                formData.append("Spec4" , y[7].value);
                                formData.append("Price" , y[8].value);
                                formData.append("About" , y[9].value);
                                formData.append("ID" , id);
                                
                                formData.append("task", "ProductUpdate");

                                fetch('products.php', {
                                    method:"POST",
                                    body: formData
                                }).then(function (response) {
                                    return response.text();
                                })
                                .then(function (data) {
                                    console.log(data);
                                    if(data == "updated"){

                                    }else{

                                    }
                                })
                            }
                        </script>
                    </div>

                    <div class="tab-pane fade overflow-auto" style="height: 1000px;" id="list-orders" role="tabpanel" aria-labelledby="list-orders-list">5
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
                            <th scope="col">Customer</th>
                            <th scope="col">DeliveryState</th>
                            </tr>
                        </thead>
                        <tbody id="showtable">

                        <?php 
                            $sql = "SELECT orders.*, products.Image, products.Name FROM orders INNER JOIN products ON orders.ItemID = products.ID;";

                            $sql2 = "SELECT orders.*, custompc.Name, custompc.CPU, custompc.MotherBoard, custompc.GPU, custompc.RAM, custompc.Cooling, custompc.Storage, custompc.Power, custompc.Casing, custompc.Image FROM orders INNER JOIN custompc ON orders.ItemID = custompc.ID;";

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
                            <td onclick="userinformation('<?=$row['CustomerEmail']; ?>')"><?=$row['CustomerEmail']; ?></td>
                            <td><?php if($row['DeliveryState'] == "pending"){echo "<span class='badge badge-warning'>Pending</span>";}else{echo "<span class='badge badge-success'>Delivered</span>";}  ?><button onclick="delivery('<?=$row['ID']; ?>')">Delivered</button></td>
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
                            <td onclick="userinformation('<?=$row['CustomerEmail']; ?>')"><?=$row['CustomerEmail']; ?></td>
                            <td><?php if($row['DeliveryState'] == "pending"){echo "<span class='badge badge-warning'>Pending</span>";}else{echo "<span class='badge badge-success'>Delivered</span>";}  ?><button onclick="delivery('<?=$row['ID']; ?>')">Delivered</button></td>
                            </tr>

                                <?php } ?>

                        </tbody>
                        <script>
                                function userinformation(id){
                                    const formDataCustomer = new FormData();
                                    formDataCustomer.append("CustomerEmail", id);
                                    formDataCustomer.append("task", "showcustomer");

                                    fetch('database/admin_update.php', {
                                            method:"POST",
                                            body: formDataCustomer
                                        }).then(function (response) {
                                            return response.text();
                                        })
                                        .then(function (data) {
                                            document.getElementById('UserInformation').innerHTML = data;
                                        })
                                }
                                function delivery(id){
                                    swal({
                                        title: "Are you sure?",
                                        text: "Once Changed, you will not be able to undo !",
                                        icon: "warning",
                                        dangerMode: true,
                                        buttons: true,
                                        })
                                        .then((willDelete) => {
                                        if (willDelete) {
                                            console.log("a");
                                            const formDatadelivery = new FormData();
                                            formDatadelivery.append("ID", id);
                                            formDatadelivery.append("task", "delivery");

                                            fetch('database/admin_update.php', {
                                                    method:"POST",
                                                    body: formDatadelivery
                                                }).then(function (response) {
                                                    return response.text();
                                                })
                                                .then(function (data) {
                                                    swal("Done!", data, "success");
                                                    showtable();
                                                })
                                        } else {
                                            
                                        }
                                        });

                                }
                                function showtable(){
                                    const formDatashow = new FormData();
                                    formDatashow.append("task", "tableupdate");

                                    fetch('database/admin_update.php', {
                                            method:"POST",
                                            body: formDatashow
                                        }).then(function (response) {
                                            return response.text();
                                        })
                                        .then(function (data) {
                                            document.getElementById('showtable').innerHTML = data;
                                        })
                                }
                            </script>
                        </table><br><br><br><br><br><br><br><br><br>
                    </div>
                    <div class="tab-pane fade" id="list-customer" role="tabpanel" aria-labelledby="list-customer-list">6
                        
                    </div>
                    <div class="tab-pane fade" id="list-messages" role="tabpanel" aria-labelledby="list-messages-list">...</div>
                    <div class="tab-pane fade" id="list-settings" role="tabpanel" aria-labelledby="list-settings-list">8
                    <br><h1>Settings</h1><br>
                        <!-- ======================================================================================================================================================== -->            
                  
                        <!-- ======================================================================================================================================================== -->
                        <h4>Update Password</h4>

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

                                        fetch('database/admin_reset_password.php', {
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
                                    <h4>Update Name</h4>

                            <form id="userUpdate" >

                                <div class="form-group">
                                <label>First Name</label>
                                <input type="text" class="form-control" name="FirstName"  required>
                                </div>

                                <div class="form-group">
                                <label>Last Name</label>
                                <input type="text" class="form-control" name="LastName"  required>
                                </div>

                                <input type="text" hidden name="task" value="adminUpdate">
                                <button type="submit" class="btn btn-primary">Update</button>
                                
                            </form><br><br><br><br><br><br><br>
                            <script>
                                    const myForm3 = document.getElementById('userUpdate');

                                    myForm3.addEventListener('submit', function(e){
                                        console.log("ssssss");
                                        e.preventDefault();

                                        const formData = new FormData(this);

                                        fetch('database/admin_update.php', {
                                            method:"POST",
                                            body: formData
                                        }).then(function (response) {
                                            return response.text();
                                        })
                                        .then(function (data) {
                                            alert(data);
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