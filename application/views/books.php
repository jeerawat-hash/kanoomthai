<!doctype html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="theme-color" content="#000000">
    <title>ร้านขนมไทย</title>
    <meta name="description" content="Mobilekit HTML Mobile UI Kit">
    <meta name="keywords" content="bootstrap 4, mobile template, cordova, phonegap, mobile, html" />
    <link rel="icon" type="image/png" href="http://203.156.9.157/kanoomthai/assets/img/favicon.png" sizes="32x32">
    <link rel="apple-touch-icon" sizes="180x180" href="http://203.156.9.157/kanoomthai/assets/img/icon/3-192x192.png">
    <link rel="stylesheet" href="http://203.156.9.157/kanoomthai/assets/css/style.css">
    <link rel="manifest" href="http://203.156.9.157/kanoomthai/__manifest.json">
</head>

<style>
    .BTNInvoice {
        width: 200px;
        margin-top: 5px;
    }

    .swal2-container {
        z-index: 20000 !important;
    }
</style>

<body>

    <!-- loader -->
    <div id="loader">
        <div class="spinner-border text-success" role="status"></div>
    </div>
    <!-- * loader -->


    <!-- App Header -->
    <div class="appHeader">
        <div class="left">
        </div>
        <div class="pageTitle">
            ทดสอบระบบ
            <!-- <img src="http://203.156.9.157/kanoomthai/../assets/img/logo.png" alt="logo" class="logo"> -->
        </div>
        <div class="right">
            <!-- <a href="javascript:;" class="headerButton toggle-searchbox">
                <ion-icon name="search-outline"></ion-icon>
            </a> -->
        </div>
    </div>
    <!-- * App Header -->

    <!-- Search Component -->
    <div id="search" class="appHeader">
        <form class="search-form">
            <div class="form-group searchbox">
                <input type="text" class="form-control" placeholder="Search...">
                <i class="input-icon">
                    <ion-icon name="search-outline"></ion-icon>
                </i>
                <a href="javascript:;" class="ml-1 close toggle-searchbox">
                    <ion-icon name="close-circle"></ion-icon>
                </a>
            </div>
        </form>
    </div>
    <!-- * Search Component -->

    <!-- App Capsule -->
    <div id="appCapsule">


        <!-- Form -->
        <div class="section mt-2">

            <div class="section mt-2">
                <div class="row text-center">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <h2>ตัวอย่างระบบ PWA BarCode Reader</h2>
                    </div>
                </div>
            </div>



            <div class="section mb-5 ">
                <div class="row text-center" id="WorkContent">
 

                    <div id="CardScanDiv" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mt-1">
                        <!-- <div class="card">
                        <div class="card-body text-center"> -->
                        <!-- <h5 class="card-title">Barcode Reader</h5>
                        <p class="card-text"></p> -->
                        <div id="reader">
                            <font color="red">ไม่รองรับ</font>
                        </div>
                        <button class="btn btn-success" id="btnCloseScanner">ปิดกล้อง</button>
                        <!-- </div>
                    </div> -->
                    </div>

                    <div id="CardInfoDiv" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mt-1">
                        <!-- <div class="card">
                        <div class="card-body text-center"> -->
                        <h1 class="card-title" id="CodeResult"></h1>
                        <p class="card-text"></p>
                        <button class="btn btn-success" id="btnOpenScanner">เปิดใช้งานกล้อง</button>
                        <!-- </div>
                    </div> -->
                    </div>


                </div>
            </div>

        </div>
        <!-- Form -->



        <!-- app footer -->
        <div class="appFooter">
            <!-- <img src="http://203.156.9.157/kanoomthai/../assets/img/logo.png" alt="icon" class="footer-logo mb-2"> -->
            <div class="footer-title">

            </div>
        </div>
        <!-- * app footer -->

    </div>
    <!-- * App Capsule -->


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
        $(function() {




        })
    </script>

    <script>
        $("#CardInfoDiv").show();
        $("#CardScanDiv").hide();
        $("#btnReOpenCard").hide();
        const html5QrCode = new Html5Qrcode("reader");
        const qrCodeSuccessCallback = (decodedText, decodedResult) => {

            $("#CodeResult").text("Decode :"+decodedText);

            $("#CardInfoDiv").show();
            $("#CardScanDiv").hide();
            html5QrCode.stop();
        };

        const config = {
            fps: 5,
            qrbox: {
                width: 300,
                height: 100
            }
        };

        $("#btnOpenScanner").on("click", function() {

            $("#CardInfoDiv").hide();
            $("#CardScanDiv").show();
            html5QrCode.start({
                facingMode: "environment"
            }, config, qrCodeSuccessCallback);
            html5QrCode.start({
                facingMode: {
                    exact: "environment"
                }
            }, config, qrCodeSuccessCallback);

        });

        $("#btnCloseScanner").on("click", function() {
            
            $("#CodeResult").text("");
            $("#CardInfoDiv").show();
            $("#CardScanDiv").hide();
            html5QrCode.stop();

        });
    </script>
</body>

</html>