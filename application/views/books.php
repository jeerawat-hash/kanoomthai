<!doctype html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="theme-color" content="#000000">
    <title>ร้านเท้งขนมไทย</title>
    <meta name="description" content="Mobilekit HTML Mobile UI Kit">
    <meta name="keywords" content="bootstrap 4, mobile template, cordova, phonegap, mobile, html" />
    <link rel="icon" type="image/png" href="http://203.156.9.157/kanoomthai/assets/img/favicon.png" sizes="32x32">
    <link rel="apple-touch-icon" sizes="180x180" href="http://203.156.9.157/kanoomthai/assets/img/icon/3-192x192.png">
    <link rel="stylesheet" href="http://203.156.9.157/kanoomthai/assets/css/style.css">
    <link rel="manifest" href="http://203.156.9.157/kanoomthai/__manifest.json">

    <!-- Font Awsome -->
    <link rel="stylesheet" href="http://203.156.9.157/kanoomthai/lib/fontawsome/css/all.css">
    <!-- Font Awsome -->
</head>

<style>
    .BTNInvoice {
        width: 200px;
        margin-top: 5px;
    }

    .swal2-container {
        z-index: 20000 !important;
    }

    /* 
    .cart-item .in .text .detail {
        line-height: 1.2em;
        margin: 0 0 4px 0;
        font-size: 18px;
        color: #A1A1A2;
    }

    .cart-item .in .text .title {
        font-weight: 500;
        font-size: 23px;
        line-height: 1.2em;
        margin: 0 0 6px 0;
    } 
    .cart-item .imaged {
        width: 200px;
        height: auto;
    } 
    .cart-item .in .text .price {
        font-weight: 500;
        font-size: 20px;
        color: #1E74FD;
    } */
</style>

<body>

    <!-- loader -->
    <div id="loader">
        <div class="spinner-border text-warning" role="status"></div>
    </div>
    <!-- * loader -->


    <!-- App Header -->
    <div class="appHeader">
        <div class="left">
        </div>
        <div class="pageTitle">
            ร้านเท้งขนมไทย
        </div>
        <div class="right">

        </div>
    </div>
    <!-- * App Header -->

    <!-- App Capsule -->
    <div id="appCapsule">

        <!-- Form -->
        <div class="section mt-2">

            <div class="header-large-title">
                <h2 id="WelcomeTitle"></h2>
            </div>

            <!-- Carousel Menu -->
            <div class="section full mt-3 mb-3">
                <div class="carousel-single owl-carousel owl-theme">
                    <div class="item caroitem" data-ModalType="RecommandMenu">
                        <div class="card">
                            <img src="http://203.156.9.157/kanoomthai/assets/img/sample/photo/d3.jpg" class="card-img-top" alt="image">
                            <div class="card-body pt-2">
                                <h4 class="mb-0 title">เมนูแนะนำ</h4>
                            </div>
                        </div>
                    </div>

                    <div class="item caroitem" data-ModalType="OrderGoods">
                        <div class="card">
                            <img src="http://203.156.9.157/kanoomthai/assets/img/sample/photo/d3.jpg" class="card-img-top" alt="image">
                            <div class="card-body pt-2">
                                <h4 class="mb-0 title">สั่งสินค้า</h4>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!-- Carousel Menu -->




        </div>
        <!-- Form -->


        <div id="CardStatusPendingOrder" class="section mt-2">
            <div id="CardColor" class="card text-white mb-2 bg-warning">
                <div class="card-header">รายการอยู่ระหว่างสั่งซื้อ</div>
                <div class="card-body">
                    <h5 class="card-title">0 คำสั่งซื้อ</h5>
                    <p class="card-text">0 รายการ</p>
                </div>
            </div>
        </div>
        <div id="CardStatusChange" class="section mt-2">
            <div id="CardColor" class="card text-white mb-2 bg-success">
                <div class="card-header">ค่าใช้จ่ายเรียกเก็บ</div>
                <div class="card-body">
                    <h5 class="card-title">0 บาท</h5>
                    <p class="card-text">0 รายการ</p>
                </div>
            </div>
        </div>


        <!-- Notify -->
        <div class="section full mt-2 mb-2">
            <div class="pt-2 pb-1">

                <!-- ios style notification-success-->
                <div id="notification-success" class="notification-box">
                    <div class="notification-dialog ios-style">
                        <div class="notification-header">
                            <div class="in">
                                <strong>แจ้งเตือน</strong>
                            </div>
                            <div class="right">
                                <span id="Time">Time</span>
                                <a href="#" class="close-button">
                                    <ion-icon name="close-circle" role="img" class="md hydrated" aria-label="close circle"></ion-icon>
                                </a>
                            </div>
                        </div>
                        <div class="notification-content">
                            <div class="in">
                                <h3 class="subtitle" id="title">Hello There</h3>
                                <div class="text" id="content">
                                    This is a simple iOS style notification.
                                </div>
                            </div>
                            <div class="icon-box text-success">
                                <ion-icon name="checkmark-circle-outline" role="img" class="md hydrated" aria-label="checkmark circle outline"></ion-icon>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- * ios style notification-success -->

                <!-- ios style notification-danger-->
                <div id="notification-danger" class="notification-box">
                    <div class="notification-dialog ios-style">
                        <div class="notification-header">
                            <div class="in">
                                <strong>แจ้งเตือน</strong>
                            </div>
                            <div class="right">
                                <span id="Time">Time</span>
                                <a href="#" class="close-button">
                                    <ion-icon name="close-circle" role="img" class="md hydrated" aria-label="close circle"></ion-icon>
                                </a>
                            </div>
                        </div>
                        <div class="notification-content">
                            <div class="in">
                                <h3 class="subtitle" id="title">Hello There</h3>
                                <div class="text" id="content">
                                    This is a simple iOS style notification.
                                </div>
                            </div>
                            <div class="icon-box text-danger">
                                <ion-icon name="close-circle" role="img" class="md hydrated" aria-label="close circle"></ion-icon>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- * ios style notification-danger -->

                <!-- ios style notification-warning-->
                <div id="notification-warning" class="notification-box">
                    <div class="notification-dialog ios-style">
                        <div class="notification-header">
                            <div class="in">
                                <strong>แจ้งเตือน</strong>
                            </div>
                            <div class="right">
                                <span id="Time">Time</span>
                                <a href="#" class="close-button">
                                    <ion-icon name="close-circle" role="img" class="md hydrated" aria-label="close circle"></ion-icon>
                                </a>
                            </div>
                        </div>
                        <div class="notification-content">
                            <div class="in">
                                <h3 class="subtitle" id="title">Hello There</h3>
                                <div class="text" id="content">
                                    This is a simple iOS style notification.
                                </div>
                            </div>
                            <div class="icon-box text-warning">
                                <ion-icon name="warning" role="img" class="md hydrated" aria-label="close circle"></ion-icon>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- * ios style notification-warning -->


            </div>
        </div>
        <!-- Notify -->


        <!-- Modal Login -->
        <div class="modal fade modalbox" id="ModalLogin" data-backdrop="static" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header text-cetner">
                        <h5 class="modal-title">ร้านเท้งขนมไทย</h5>
                    </div>
                    <div class="modal-body">

                        <div class="login-form">
                            <div class="section mt-2">
                                <h1>ระบุชื่อคุณลูกค้า</h1>
                            </div>
                            <div class="section mt-4 mb-5">

                                <form>
                                    <div class="form-group boxed">
                                        <div class="input-wrapper">
                                            <label class="label" for="Inp_CustomerName">ชื่อลูกค้า</label>
                                            <input type="text" class="form-control" id="Inp_CustomerName" value="" autocomplete="off" placeholder="ชื่อลูกค้า">
                                            <i class="clear-input">
                                                <ion-icon name="close-circle" role="img" class="md hydrated" aria-label="close circle"></ion-icon>
                                            </i>
                                        </div>
                                    </div>

                                    <div class="form-group boxed">
                                        <div class="input-wrapper">
                                            <label class="label" for="city4">จอง/สั่งกลับบ้าน</label>
                                            <select class="form-control custom-select" id="Inp_Booktable">
                                                <!-- <option value="None">--- กรุณาเลือก ---</option>  -->
                                            </select>
                                        </div>
                                    </div>

                                    <div class="mt-2">
                                        <button type="button" class="btn btn-warning btn-lg" id="BTNLogin">เริ่มสั่งอาหาร</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Login -->

        
        <!-- Modal Order Goods -->
        <div class="modal fade modalbox" id="ModalOrderGoods" data-backdrop="static" tabindex="-1" role="dialog" style="display: none;" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">สั่งสินค้า</h5>
                        <a href="javascript:;" data-dismiss="modal" class="btn btn-warning">ปิด</a>
                    </div>
                    <div class="modal-body">

                        <div class="section mt-2">

                            <!-- item -->
                            <div class="card cart-item mb-2">
                                <div class="card-body">
                                    <div class="in">
                                        <img src="http://203.156.9.157/kanoomthai/assets/img/sample/photo/product1.jpg" alt="product" class="imaged">
                                        <div class="text">
                                            <h3 class="title">ขนมครก #1</h3>
                                            <p class="detail">ขนมครก ปกติแหละ</p>
                                            <strong class="price">5 บาท</strong>
                                        </div>
                                    </div>
                                    <div class="cart-item-footer">
                                        <div class="stepper stepper-lg stepper-secondary">
                                            <a href="#" class="stepper-button stepper-down">-</a>
                                            <input type="text" class="form-control" value="0" disabled="">
                                            <a href="#" class="stepper-button stepper-up">+</a>
                                        </div>
                                        <a href="#" class="btn btn-outline-secondary btn-lg">เพิ่ม</a>
                                    </div>
                                </div>
                            </div>
                            <!-- * item -->

                            <!-- item -->
                            <div class="card cart-item mb-2">
                                <div class="card-body">
                                    <div class="in">
                                        <img src="http://203.156.9.157/kanoomthai/assets/img/sample/photo/product4.jpg" alt="product" class="imaged">
                                        <div class="text">
                                            <h3 class="title">ขนมครก #2</h3>
                                            <p class="detail">ขนมครก ปกติแหละ</p>
                                            <strong class="price">5 บาท</strong>
                                        </div>
                                    </div>
                                    <div class="cart-item-footer">
                                        <div class="stepper stepper-lg stepper-secondary">
                                            <a href="#" class="stepper-button stepper-down">-</a>
                                            <input type="text" class="form-control" value="0" disabled="">
                                            <a href="#" class="stepper-button stepper-up">+</a>
                                        </div>
                                        <a href="#" class="btn btn-outline-secondary btn-lg">เพิ่ม</a>
                                    </div>
                                </div>
                            </div>
                            <!-- * item -->



                        </div>

                        <div class="section mt-2 mb-2">
                            <div class="card">
                                <ul class="listview flush transparent simple-listview">
                                    <li>ยอดรวม<span class="text-primary font-weight-bold">500 บาท</span></li>
                                </ul>
                            </div>
                        </div>

                        <div class="section mb-2">
                            <a href="#" class="btn btn-warning btn-block btn-lg">สั่งซื้อ</a>
                        </div>




                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Recommand Goods -->

        <!-- Modal Recommand Goods -->
        <div class="modal fade modalbox" id="ModalRecommandGoods" data-backdrop="static" tabindex="-1" role="dialog" style="display: none;" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">เมนูแนะนำ</h5>
                        <a href="javascript:;" data-dismiss="modal" class="btn btn-warning">ปิด</a>
                    </div>
                    <div class="modal-body">
 
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Recommand Goods -->


    </div>
    <!-- * App Capsule -->

    <!-- Dialog Basic -->
    <div class="modal fade dialogbox" id="DialogBasic" data-backdrop="static" tabindex="-1" role="dialog" style="display: none;" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Dialog title</h5>
                </div>
                <div class="modal-body">
                    This is a dialog message
                </div>
                <div class="modal-footer">
                    <div class="btn-inline">
                        <a href="#" class="btn btn-text-primary" data-dismiss="modal">ตกลง</a>
                        <a href="#" class="btn btn-text-secondary" data-dismiss="modal">ปิด</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Dialog Basic -->

    <!-- App Bottom Menu -->
    <div class="appBottomMenu">

        <a href="javascript:;" id="BTNCheckOut" class="item">
            <div class="col">
                <span class="iconedbox iconedbox-md">
                    <i class="fa-sharp fa-light fa-money-check-dollar fa-2xl" style="color: #000000;"></i>
                </span>
            </div>
        </a>
        <a href="javascript:;" id="BTNSignOut" class="item">
            <div class="col">
                <span class="iconedbox iconedbox-md">
                    <i class="fa-duotone fa-person-to-door fa-2xl" style="color: #000000;"></i>
                </span>
            </div>
        </a>

    </div>
    <!-- App Bottom Menu -->

    <!-- ///////////// Js Files ////////////////////  -->
    <!-- Jquery -->
    <script src="http://203.156.9.157/kanoomthai/assets/js/lib/jquery-3.4.1.min.js"></script>

    <!-- Datatable -->
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap4.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap4.min.css">



    <!-- Bootstrap-->
    <script src="http://203.156.9.157/kanoomthai/assets/js/lib/popper.min.js"></script>
    <script src="http://203.156.9.157/kanoomthai/assets/js/lib/bootstrap.min.js"></script>
    <!-- Ionicons -->
    <script type="module" src="https://unpkg.com/ionicons@5.0.0/dist/ionicons/ionicons.js"></script>
    <!-- Owl Carousel -->
    <script src="http://203.156.9.157/kanoomthai/assets/js/plugins/owl-carousel/owl.carousel.min.js"></script>
    <!-- jQuery Circle Progress -->
    <script src="http://203.156.9.157/kanoomthai/assets/js/plugins/jquery-circle-progress/circle-progress.min.js"></script>
    <!-- Base Js File -->
    <script src="http://203.156.9.157/kanoomthai/assets/js/base.js"></script>
    <!-- sweetalert2 -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.5.0/socket.io.js"></script>

    <script src="https://unpkg.com/html5-qrcode@2.2.1/html5-qrcode.min.js" type="text/javascript"></script>


    <script>
        LoadDataSelectTable();
        $("#ModalLogin").modal({
            backdrop: 'static',
            keyboard: false
        });
        

        $(function() {

            var Receive = "";
            try {
                const socket = io("http://203.156.9.157:8081");
                socket.on("connect", async function() {
                    console.log("Connected");

                    if ("<?php echo $BookingSessionID; ?>" != "") {
                        await socket.emit("SetID", <?php echo $BookingSessionID; ?>);
                        setTimeout(function() {
                            $.ajax({
                                url: "http://203.156.9.157/kanoomthai/index.php/Data/CheckLogin",
                                type: "POST",
                                contentType: false,
                                cache: false,
                                processData: false,
                                success: function(data) {
                                    try {
                                        var obj = JSON.parse(data);
                                        console.log(obj);
                                        if (obj.Status == "Success") {
                                            notification('notification-success', "สำเร็จ", "ยินดีต้อนรับคุณ " + obj.Data.CustomerName, 1000);
                                            $("#WelcomeTitle").text("ยินดีต้อนรับคุณ " + obj.Data.CustomerName);
                                            socket.emit("SetID", obj.Data.BookingSessionID);

                                            if (socket.connected == true) {
                                                var PayLoad = JSON.stringify({
                                                    "Source": obj.Data.BookingSessionID,
                                                    "Dest": "AllEvent",
                                                    "Header": obj.Data.CustomerName,
                                                    "Msg": "Booking",
                                                });
                                                socket.emit("MSGServer", PayLoad);
                                            }

                                            $("#ModalLogin").modal("hide");
                                        } else {
                                            notification('notification-danger', "ผิดพลาด", "ไม่สามารถเข้าสู่ระบบได้", 1000);
                                            return false;
                                        }
                                    } catch (error) {}
                                },
                                error: function() {}
                            });
                        }, 1000);
                    }

                });

                socket.on("AllEvent", function(data) {

                    console.log(data);
                    var obj = JSON.parse(data);
                    if (obj.Msg == "Booking") {
                        LoadDataSelectTable();
                    }

                });


                //#region SignOut
                $("#BTNSignOut").on("click", function() {

                    $.ajax({
                        url: "http://203.156.9.157/kanoomthai/index.php/Data/SignOut",
                        type: "POST",
                        contentType: false,
                        cache: false,
                        processData: false,
                        success: function(data) {
                            $("#ModalLogin").modal("show");
                            notification('notification-success', "สำเร็จ", "ทำการออกจากระบบแล้ว", 1000);
                            $("#ModalLogin").find("#Inp_CustomerName").val("");
                            $("#ModalLogin").find("#Inp_Booktable").val("None");
                            LoadDataSelectTable();
                        },
                        error: function() {}
                    });

                });
                //#endregion


                //#region Login
                $("#ModalLogin").find("#BTNLogin").on("click", async function() {

                    var CustomerName = $("#ModalLogin").find("#Inp_CustomerName").val();
                    var TableID = $("#ModalLogin").find("#Inp_Booktable option:selected").val();

                    if (CustomerName == "") {
                        notification('notification-danger', "แจ้งเตือน", "กรุณาระบุชื่อ", 1000);
                        return false;
                    }
                    if (TableID == "None") {
                        notification('notification-danger', "แจ้งเตือน", "กรุณาทำการจอง", 1000);
                        return false;
                    }

                    var data = new FormData();
                    data.append('CustomerName', CustomerName);
                    data.append('TableID', TableID);

                    await $.ajax({
                        url: "http://203.156.9.157/kanoomthai/index.php/Data/SignIn",
                        type: "POST",
                        data: data,
                        contentType: false,
                        cache: false,
                        processData: false,
                        success: function(data) {
                            try {
                                var obj = JSON.parse(data);
                            } catch (error) {}
                        },
                        error: function() {}
                    });

                    await $.ajax({
                        url: "http://203.156.9.157/kanoomthai/index.php/Data/CheckLogin",
                        type: "POST",
                        contentType: false,
                        cache: false,
                        processData: false,
                        success: function(data) {
                            try {
                                var obj = JSON.parse(data);
                                console.log(obj);
                                if (obj.Status == "Success") {
                                    socket.emit("SetID", obj.Data.BookingSessionID);
                                    $("#ModalLogin").modal("hide");
                                    notification('notification-success', "สำเร็จ", "ยินดีต้อนรับคุณ " + obj.Data.CustomerName, 1000);
                                    $("#WelcomeTitle").text("ยินดีต้อนรับคุณ " + obj.Data.CustomerName);
                                    if (socket.connected == true) {
                                        var PayLoad = JSON.stringify({
                                            "Source": obj.Data.BookingSessionID,
                                            "Dest": "AllEvent",
                                            "Header": obj.Data.CustomerName,
                                            "Msg": "Booking",
                                        });
                                        socket.emit("MSGServer", PayLoad);
                                    }
                                } else {
                                    notification('notification-danger', "ผิดพลาด", "ไม่สามารถเข้าสู่ระบบได้", 1000);
                                    return false;
                                }
                            } catch (error) {}
                        },
                        error: function() {}
                    });




                });
                //#region Login

                $(".caroitem").on("click", async function() {
                    var ModalType = $(this).attr("data-ModalType");
                    switch (ModalType) {
                        case "RecommandMenu":
                            
                            $("#ModalRecommandGoods").modal("show");

                            break;
                        case "OrderGoods":

                            await LoadDataGoodsItemForSale();
                            await $("#ModalOrderGoods").modal("show");

                            break;
                    }
                });







            } catch (error) {
                console.log(error);
            }







        });

        function LoadDataSelectTable() {
            $.ajax({
                url: "http://203.156.9.157/kanoomthai/index.php/Data/GetDataAvailableTable",
                type: "POST",
                contentType: false,
                cache: false,
                processData: false,
                success: function(data) {
                    try {
                        var obj = JSON.parse(data);
                        console.log(obj);
                        var html = "<option value=\"None\">--- กรุณาเลือก ---</option>";
                        for (let index = 0; index < obj.length; index++) {
                            html += "<option value=\"" + obj[index].TableID + "\">" + obj[index].TableName + "</option>";
                        }
                        $("#Inp_Booktable").html(html);

                    } catch (error) {}
                },
                error: function() {}
            });
        }

        function LoadDataGoodsItemForSale() {
            $.ajax({
                url: "http://203.156.9.157/kanoomthai/index.php/Data/GetDataAllGoodsItemForSale",
                type: "POST",
                contentType: false,
                cache: false,
                processData: false,
                success: function(data) {
                    try {
                        var obj = JSON.parse(data);
                        console.log(obj); 

                    } catch (error) {}
                },
                error: function() {}
            });
        }
    </script>
</body>

</html>