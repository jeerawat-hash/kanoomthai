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




                <!-- Modal_ConfirmOrder -->
                <div class="modal fade" id="Modal_ConfirmOrder">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header bg-warning">
                                <h5 class="modal-title">Extra Large Modal</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-6">
                                        <h4>ลูกค้า</h4>
                                    </div>
                                    <div class="col-6">
                                        <h4>โต๊ะ</h4>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <input type="text" class="form-control" id="CustomerName" placeholder="ลูกค้า" disabled>
                                    </div>
                                    <div class="col-6">
                                        <input type="text" class="form-control" id="Table" placeholder="โต๊ะ" disabled>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <table id="TableBookingOrderDetail" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>รหัสสั่งซื้อ</th>
                                                    <th>สินค้า</th>
                                                    <th>จำนวน</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>ข้อความแนบถึงลูกค้า</label>
                                            <textarea class="form-control" rows="3" placeholder="แนบข้อความ"></textarea>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" id="SaveData">ยืนยันคำสั่งซื้อ</button>
                                <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
                            </div>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
                <!-- /.modal -->
                <!-- Modal_ConfirmOrder  -->




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
                        "data": "Option",
                        "title": "ดำเนินการ",
                        "className": "text-center"
                    },
                ]
            });

            var TableBookingOrderDetail = $("#TableBookingOrderDetail").DataTable({
                "responsive": true,
                "lengthChange": true,
                "autoWidth": false,
                // "pageLength": 10,
                // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
                // "buttons": ["copy", "csv", "excel", "pdf", "print"],
                dom: "<'row'<'col-sm-6'l><'col-sm-6'f>>" +
                    "<'row'<'col-sm-12'tr>>" +
                    "<'row'<'col-sm-5'i><'col-sm-7'p>>",
                columns: [{
                        "data": "ID",
                        "title": "#"
                    },
                    {
                        "data": "OrderID",
                        "title": "รหัสสั่งซื้อ"
                    },
                    {
                        "data": "GoodsName",
                        "title": "สินค้า"
                    },
                    {
                        "data": "OrderAmount",
                        "title": "จำนวน"
                    },
                ]
            });

            GetDataOrderPending();

            var BookingSessionID = "";
            var TableName = "";
            var CustomerName = "";
            var OrderPending = "";
            var OrderSuccess = "";

            $("#TableCustomerOrder").on("click", ".BTNOpenOrder", function() {

                BookingSessionID = $(this).attr("data-BookingSessionID");
                TableName = $(this).attr("data-TableName");
                CustomerName = $(this).attr("data-CustomerName");
                OrderPending = $(this).attr("data-OrderPending");
                OrderSuccess = $(this).attr("data-OrderSuccess");

                $("#Modal_ConfirmOrder").modal("show");
                $("#Modal_ConfirmOrder").find(".modal-title").text(CustomerName + " - " + TableName);
                $("#Modal_ConfirmOrder").find("#CustomerName").val(CustomerName);
                $("#Modal_ConfirmOrder").find("#Table").val(TableName);
                GetDataOrderPendingDetail(BookingSessionID);

            });

            $("#TableCustomerOrder").on("click", ".BTNSendInvoice", function() {

                BookingSessionID = $(this).attr("data-BookingSessionID");
                TableName = $(this).attr("data-TableName");
                CustomerName = $(this).attr("data-CustomerName");
                OrderPending = $(this).attr("data-OrderPending");
                OrderSuccess = $(this).attr("data-OrderSuccess"); 



            });

            $("#Modal_ConfirmOrder").find("#SaveData").on("click", function() {

                var data = new FormData();
                data.append('BookingSessionID', BookingSessionID);
                $.ajax({
                    url: "http://203.156.9.157/kanoomthai/index.php/Data/SetReceiveOrder",
                    type: "POST",
                    data: data,
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(data) {
                        /// Emit Event ///

                        /// Emit Event ///
                        GetDataOrderPending();
                        $("#Modal_ConfirmOrder").modal("hide");
                    },
                    error: function() {}
                });

            });





            //#region GetDataOrderPendingDetail
            function GetDataOrderPendingDetail(BookingSessionID) {
                var data = new FormData();
                data.append('BookingSessionID', BookingSessionID);
                $.ajax({
                    url: "http://203.156.9.157/kanoomthai/index.php/Data/GetDataOrderPendingDetail",
                    type: "POST",
                    data: data,
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(data) {

                        var Data = [];
                        try {
                            var obj = JSON.parse(data);
                            for (var i = 0; i < obj.length; i++) {
                                var ID = i + 1;
                                Data.push({
                                    "ID": ID,
                                    "OrderID": obj[i].GoodsOrderID,
                                    "GoodsName": obj[i].GoodsItemName,
                                    "OrderAmount": obj[i].Amount + " " + obj[i].Unit,
                                });
                            }
                            TableBookingOrderDetail.clear().rows.add(Data).draw(false);
                        } catch (error) {}
                    },
                    error: function() {}
                });
            }
            //#endregion 
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

                        var Data = [];
                        try {
                            var obj = JSON.parse(data);
                            for (var i = 0; i < obj.length; i++) {
                                var ID = i + 1;
                                var Option = "";
                                if (obj[i].OrderPending == "1") {
                                    Option += '<button class="btn btn-warning BTNOpenOrder" data-BookingSessionID="' + obj[i].BookingSessionID + '" data-TableName="' + obj[i].TableName + '" data-CustomerName="' + obj[i].CustomerName + '" data-OrderPending="' + obj[i].OrderPending + '" data-OrderSuccess="' + obj[i].OrderSuccess + '"  >รับรายการ</button>';

                                    if (obj[i].OrderSuccess != "0") {
                                        Option += '<button class="btn btn-danger BTNSendInvoice" data-BookingSessionID="' + obj[i].BookingSessionID + '" data-TableName="' + obj[i].TableName + '" data-CustomerName="' + obj[i].CustomerName + '" data-OrderPending="' + obj[i].OrderPending + '" data-OrderSuccess="' + obj[i].OrderSuccess + '"  >แจ้งยอดชำระ</button>';
                                    }

                                } else {
                                    Option += '<button class="btn btn-secondary" disabled>รอรายการสั่งสินค้า</button>';
                                }
                                Data.push({
                                    "ID": ID,
                                    "Table": obj[i].TableName,
                                    "CustomerName": obj[i].CustomerName,
                                    "PendingOrder": obj[i].OrderPending + " รายการ",
                                    "SuccessOrder": obj[i].OrderSuccess + " รายการ",
                                    "Option": Option,
                                });
                            }
                            TableCustomerOrder.clear().rows.add(Data).draw(false);
                        } catch (error) {}
                    },
                    error: function() {}
                });
            }
            //#endregion 





        });
    </script>