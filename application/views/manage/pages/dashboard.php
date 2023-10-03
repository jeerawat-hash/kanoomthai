    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0"><?php echo $page_name; ?></h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <!-- <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol> -->
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->








        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">



                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">จัดการรายการสั่งซื้อ</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="TableCustomerOrder" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>ลำดับ</th>
                                            <th>โต๊ะ</th>
                                            <th>ชื่อลูกค้า</th>
                                            <th>อยู่ระหว่างสั่งสินค้า</th>
                                            <th>สั่งสินค้าแล้ว</th>
                                            <th>ยอดสั่งซื้อ</th>
                                            <th>ดำเนินการ</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>







            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>

    <script>
        $(function() {

            var TableCustomerOrder = $("#TableCustomerOrder").DataTable({
                "responsive": true,
                "lengthChange": true,
                "autoWidth": false,
                // "pageLength": 10,
                // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
                "buttons": ["copy", "csv", "excel", "pdf", "print"],
                dom: "<'row'<'col-sm-6'l><'col-sm-6'f>>" +
                    "<'row'<'col-sm-12'tr>>" +
                    "<'row'<'col-sm-5'i><'col-sm-7'p>>",
                columns: [{
                        "data": "ID",
                        "title": "#"
                    },
                    {
                        "data": "Table",
                        "title": "โต๊ะ"
                    },
                    {
                        "data": "CustomerName",
                        "title": "ชื่อลูกค้า"
                    },
                    {
                        "data": "PendingOrder",
                        "title": "อยู่ระหว่างสั่งสินค้า"
                    },
                    {
                        "data": "SuccessOrder",
                        "title": "สั่งสินค้าแล้ว"
                    },
                    {
                        "data": "OrderChange",
                        "title": "ยอดสั่งซื้อ"
                    },
                    {
                        "data": "Option",
                        "title": "ดำเนินการ",
                        "className": "text-center"
                    },
                ]
            });



            GetDataOrderPending();


            //#region GetDataOrderPending
            function GetDataOrderPending() {
                $.ajax({
                    url: "http://203.156.9.157/kanoomthai/index.php/Data/GetDataAllOrderPending",
                    type: "POST",
                    // data: data,
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(data) {
                        var obj = JSON.parse(data);
                        console.log(obj);

                        // var Data = [];
                        // try {
                        //     var obj = JSON.parse(data);
                        //     //console.log(obj);
                        //     for (var i = 0; i < obj.Data.length; i++) {
                        //         var ID = i + 1;

                        //         var Option = "";

                        //         if (obj.Data[i].IsEnable == "0") {
                        //             Option = '<button class="btn btn-warning BTNApproveRegister" data-ID="' + obj.Data[i].ID + '" data-AndroidID="' + obj.Data[i].AndroidID + '" data-SetupLocation="' + obj.Data[i].SetupLocation + '">ดำเนินการ</button>';
                        //         } else {

                        //         }
                        //         Data.push({
                        //             "ID": ID,
                        //             "AndroidID": obj.Data[i].AndroidID,
                        //             "SetupLocation": obj.Data[i].SetupLocation,
                        //             "Onair": obj.Data[i].VideoTitle,
                        //             "Status": obj.Data[i].Status,
                        //             "Option": Option,
                        //         });
                        //     }
                        //     TableAndroidBoxRegister.clear().rows.add(Data).draw(false);
                        // } catch (error) {

                        // }
                    },
                    error: function() {}
                });
            }
            //#endregion 





        });
    </script>