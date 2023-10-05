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




                <!-- Modal_MaintainMember -->
                <div class="modal fade" id="Modal_MaintainMember">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header bg-success">
                                <h5 class="modal-title">Extra Large Modal</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-6">
                                        <h4>ชื่อ</h4>
                                    </div>
                                    <div class="col-6">
                                        <h4>Username</h4>
                                    </div> 
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <input type="text" class="form-control" id="MemberName" placeholder="ชื่อพนักงาน">
                                    </div>
                                    <div class="col-6">
                                        <input type="text" class="form-control" id="Username" placeholder="Username">
                                    </div> 
                                </div>  
                                <div class="row"> 
                                    <div class="col-6">
                                        <h4>Password</h4>
                                    </div> 
                                    <div class="col-6">
                                        <h4>สิทธิ์</h4>
                                    </div> 
                                </div>
                                <div class="row"> 
                                    <div class="col-6">
                                        <input type="password" class="form-control" id="Password" >
                                    </div> 
                                    <div class="col-6">
                                        <select id="IsAdmin" class="form-control">
                                            <option value="0">พนักงาน</option>
                                            <option value="1">เจ้าของร้าน</option>
                                        </select> 
                                    </div> 
                                </div>  
                                <hr>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" id="SaveData">บันทึกข้อมูล</button>
                                <button type="button" class="btn btn-warning" id="EditData">แก้ไขข้อมูล</button>
                                <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
                            </div>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
                <!-- /.modal -->
                <!-- Modal_MaintainGoodsItem  -->





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
                "pageLength": -1,
                // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
                "buttons": [{
                    text: 'เพิ่มผู้ใช้',
                    attr: {
                        id: 'BTNAddDataAccount'
                    },
                    className: 'btn btn-success'
                }, "copy", "excel"],
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


            GetDataAllGoodsItemStock();


            $("#BTNAddDataAccount").on("click", function() {

                $("#Modal_MaintainMember").modal("show");

            });




            //#region GetDataAllGoodsItemStock
            function GetDataAllGoodsItemStock() {
                $.ajax({
                    url: "http://203.156.9.157/kanoomthai/index.php/Data/GetDataAllSystemMember",
                    type: "POST",
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
                                Option += '<button class="btn btn-warning BTNEditMember" data-MemberID="' + obj[i].MemberID + '" data-MemberName="' + obj[i].MemberName + '" data-Username="' + obj[i].Username + '" data-IsAdmin="' + obj[i].IsAdmin + '" >แก้ไข</button> ';
                                var Position = "เจ้าของร้าน";
                                if (obj[i].IsAdmin == "0") {
                                    Position = "พนักงาน";
                                }
                                Data.push({
                                    "ID": ID,
                                    "MemberName": obj[i].MemberName,
                                    "Position": Position,
                                    "Username": obj[i].Username,
                                    "Option": Option,
                                });
                            }
                            TableMembers.clear().rows.add(Data).draw(false);
                        } catch (error) {}
                    },
                    error: function() {}
                });
            }
            //#endregion 


        });
    </script>