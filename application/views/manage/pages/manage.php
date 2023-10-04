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
                                <h3 class="card-title">จัดการคลังสินค้าและราคาขาย</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="TableGoodsItems" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>ลำดับ</th>
                                            <th>ชื่อ</th>
                                            <th>ราคาต่อหน่วย</th>
                                            <th>ยอดคงเหลือ</th>
                                            <th>ภาพ</th>
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

            var TableGoodsItems = $("#TableGoodsItems").DataTable({
                "responsive": true,
                "lengthChange": true,
                "autoWidth": false,
                "pageLength": -1,
                "buttons": [{
                    text: 'เพิ่มสินค้า',
                    attr: {
                        id: 'BTNAddDataGoodsItem'
                    },
                    className: 'btn btn-success'
                }, "copy", "excel"],
                // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
                // "buttons": ["copy", "excel"],
                dom: "<'row'<'col-sm-6'B><'col-sm-6'f>>" +
                    "<'row'<'col-sm-12'tr>>" +
                    "<'row'<'col-sm-5'i><'col-sm-7'p>>",
                columns: [{
                        "data": "ID",
                        "title": "#"
                    },
                    {
                        "data": "GoodsName",
                        "title": "ชื่อ"
                    },
                    {
                        "data": "UnitPerPrice",
                        "title": "ราคาต่อหน่วย"
                    },
                    {
                        "data": "StockAmount",
                        "title": "ยอดคงเหลือ"
                    },
                    {
                        "data": "Image",
                        "title": "ภาพ"
                    },
                    {
                        "data": "Option",
                        "title": "ดำเนินการ",
                        "className": "text-center"
                    },
                ]
            });



            GetDataAllGoodsItemStock();





            //#region GetDataAllGoodsItemStock
            function GetDataAllGoodsItemStock() {
                $.ajax({
                    url: "http://203.156.9.157/kanoomthai/index.php/Data/GetDataAllGoodsItemStock",
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
                                // if (obj[i].OrderPending == "1") {
                                //     Option += '<button class="btn btn-warning BTNOpenOrder" data-BookingSessionID="' + obj[i].BookingSessionID + '" data-TableName="' + obj[i].TableName + '" data-CustomerName="' + obj[i].CustomerName + '" data-OrderPending="' + obj[i].OrderPending + '" data-OrderSuccess="' + obj[i].OrderSuccess + '"  >รับรายการ</button>';
                                // } else {
                                //     Option += '<button class="btn btn-secondary" disabled>รอรายการสั่งสินค้า</button>';
                                //     if (obj[i].OrderSuccess != "0") {
                                //         Option += ' <button class="btn btn-danger BTNSendInvoice" data-BookingSessionID="' + obj[i].BookingSessionID + '" data-TableName="' + obj[i].TableName + '" data-CustomerName="' + obj[i].CustomerName + '" data-OrderPending="' + obj[i].OrderPending + '" data-OrderSuccess="' + obj[i].OrderSuccess + '"  >แจ้งยอดชำระ</button>';
                                //     }
                                // }
                                Data.push({
                                    "ID": ID,
                                    "GoodsName": obj[i].GoodsItemName,
                                    "UnitPerPrice": obj[i].PricePerUnit+" บาท/"+obj[i].Unit,
                                    "StockAmount": obj[i].Available + " "+obj[i].Unit,
                                    "Image": obj[i].Image,
                                    "Option": Option,
                                });
                            }
                            TableGoodsItems.clear().rows.add(Data).draw(false);
                        } catch (error) {}
                    },
                    error: function() {}
                });
            }
            //#endregion 
 



        });
    </script>