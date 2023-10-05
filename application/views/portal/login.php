<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ระบบริหารจัดการร้านเท้งขนมไทย</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="http://203.156.9.157/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="http://203.156.9.157/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="http://203.156.9.157/dist/css/adminlte.min.css">
    <!-- sweetalert2 -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="#" class="h1"><b>ระบบริหารจัดการร้านเท้งขนมไทย</b></a>
            </div>
            <div class="card-body">
                <!-- <p class="login-box-msg">Sign in to start your session</p> -->

                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Username" id="Username">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" class="form-control" placeholder="Password" id="Password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!--<div class="col-8">
             <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                จดจำ
              </label>
            </div> 
          </div>-->
                    <!-- /.col -->
                    <div class="col-12">
                        <button type="button" class="btn btn-primary btn-block" id="BTNLogin">เข้าสู่ระบบ</button>
                    </div>
                    <!-- /.col -->
                </div>

            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="http://203.156.9.157/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="http://203.156.9.157/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="http://203.156.9.157/dist/js/adminlte.min.js"></script>
    
    <script>
        $(function() {
 
            // $("#BTNLogin").on("click", async function() { 
            //     var Telephone = $("#Password").val();
            //     var data = new FormData();
            //     data.append('Telephone', Telephone);
            //     $.ajax({
            //         url: "/Data/GetDataEmployeeForAuthenticationByTelephone",
            //         type: "POST",
            //         data: data,
            //         contentType: false,
            //         cache: false,
            //         processData: false,
            //         success: function(data) {
            //             try {
            //                 var obj = JSON.parse(data);
            //                 console.log(obj);
            //                 if(obj.IsSuccess == 0){
            //                     Swal.fire('ไม่พบข้อมูลบัญชี', '', 'error');
            //                 }else{
            //                     location.reload();
            //                 }
                             
            //             } catch (error) {}
            //         },
            //         error: function() {}
            //     });

            // });





        });
    </script>

</body>

</html>