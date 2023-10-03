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
                                <h3 class="card-title">จัดการบัญชีผู้ใช้งานระบบ</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="TableMembers" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>ลำดับ</th>
                                            <th>ชื่อ</th>
                                            <th>ตำแหน่ง</th>
                                            <th>Username</th> 
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
  
            var TableMembers = $("#TableMembers").DataTable({
                "responsive": true,
                "lengthChange": true,
                "autoWidth": false,
                // "pageLength": 10,
                // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
                "buttons": ["copy", "csv", "excel", "pdf", "print"],
                dom: "<'row'<'col-sm-6'B><'col-sm-6'f>>" +
                    "<'row'<'col-sm-12'tr>>" +
                    "<'row'<'col-sm-5'i><'col-sm-7'p>>",
                columns: [{
                        "data": "ID",
                        "title": "#"
                    },
                    {
                        "data": "MemberName",
                        "title": "ชื่อ"
                    },
                    {
                        "data": "Position",
                        "title": "ตำแหน่ง"
                    },
                    {
                        "data": "Username",
                        "title": "Username"
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
