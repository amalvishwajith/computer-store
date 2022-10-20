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
        <div class="row">
            <div class="col-2 AVmenu">

            <br>

            <div class="list-group" id="list-tab" role="tablist">
                <a class="list-group-item list-group-item-action" id="list-home-list" data-toggle="list" href="#list-home" role="tab" aria-controls="home">Home</a>
                <a class="list-group-item list-group-item-action" id="list-statics-list" data-toggle="list" href="#list-statics" role="tab" aria-controls="statics">Statics</a>
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
            <div class="col-2">
                <h4>Chat</h4>
            </div>
        </div>
    </div>

</body>
</html>