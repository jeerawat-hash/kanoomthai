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
                }, ],
                // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
                "buttons": ["copy", "excel"],
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
 


            

        });
    </script>
