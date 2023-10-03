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
                                            <th>เสริฟแล้ว</th>
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







                <div class="modal fade" id="ModalRegisterAndroidBox" style="display: none;" aria-hidden="true">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Create Stream</h4>
                            </div>
                            <div class="modal-body">


                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="INP_SetupPosition">ตำแหน่งติดตั้ง</label>
                                            <input type="text" class="form-control" id="INP_SetupPosition" placeholder="ตำแหน่งติดตั้ง">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                         <div class="form-group">
                                            <label>ช่องที่ต้องการออกอากาศ</label>
                                            <select class="custom-select" id="INP_StreamChannel"> 
                                                <option selected="selected" value="https://streaming.sakorncable.com/hls/CNP.m3u8">CablePool</option> 
                                                <option value="https://streaming.sakorncable.com/hls/Mono29.m3u8">Mono29</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="CommentDescription" class="form-label">รายละเอียด</label>
                                            <textarea class="form-control" id="CommentDescription" rows="3"></textarea>
                                        </div>
                                    </div>
                                </div>


                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" id="Save">Save</button>
                                <button type="button" class="btn btn-warning" id="Edit" style="display: none;">Edit</button>
                                <button type="button" class="btn btn-danger" id="Delete" style="display: none;">Delete</button>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
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

            $("#INP_StreamChannel").select2({
              tags: true
            });

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
                        "title": "เสริฟแล้ว"
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

            // var DataID = "";
            // var AndroidID = "";
            // var SetupLocation = "";

            // $("#TableCustomerOrder").on("click", ".BTNApproveRegister", function() {

            //     DataID = $(this).attr("data-ID");
            //     AndroidID = $(this).attr("data-AndroidID");
            //     SetupLocation = $(this).attr("data-SetupLocation");
            //     $("#ModalRegisterAndroidBox").modal("show");
            //     $("#ModalRegisterAndroidBox").find(".modal-title").text("ลงทะเบียน " + AndroidID);

            // });

            // $("#ModalRegisterAndroidBox").find("#Save").on("click",async function() {

            //     var SetupPosition = $("#ModalRegisterAndroidBox").find("#INP_SetupPosition").val();
            //     var StreamChannel = $("#ModalRegisterAndroidBox").find("#INP_StreamChannel option:selected").val();
            //     var StreamName = $("#ModalRegisterAndroidBox").find("#INP_StreamChannel option:selected").text();
            //     var Description = $("#ModalRegisterAndroidBox").find("#CommentDescription").val();

            //     if (SetupPosition == "") {

            //         return false;
            //     }
            //     if (StreamChannel == "None") {

            //         return false;
            //     }
            //     if (Description == "") {

            //         return false;
            //     }


            //     var data = new FormData();
            //     data.append('AndroidID', AndroidID);
            //     data.append('VideoTitle', StreamName);
            //     data.append('VideoDescript', StreamName);
            //     data.append('VideoURL', StreamChannel);
            //     data.append('SetupLocation', SetupPosition);

            //     await $.ajax({
            //         url: "/Data/SetDataAndroidBoxRTMPPlayerRegister",
            //         type: "POST",
            //         data: data,
            //         contentType: false,
            //         cache: false,
            //         processData: false,
            //         success: function(data) {
            //             try {
            //                 var obj = JSON.parse(data);
            //                 console.log(obj);
            //                 $("#ModalRegisterAndroidBox").modal("hide");
            //             } catch (error) {

            //             }
            //         },
            //         error: function() {}
            //     });


            //     console.log(SetupPosition);
            //     console.log(StreamChannel);
            //     console.log(Description);

            // });




            // LoadDataCustomerRegisterWaitApprove();

            // setInterval(function() {
            //     LoadDataCustomerRegisterWaitApprove();
            // }, 3000);

            // //#region LoadDataPayLogWaitApprove
            // function LoadDataCustomerRegisterWaitApprove() {
            //     $.ajax({
            //         url: "/Data/GetDataAndroidBoxRTMPPlayerRegister",
            //         type: "POST",
            //         // data: data,
            //         contentType: false,
            //         cache: false,
            //         processData: false,
            //         success: function(data) {
            //             var Data = [];
            //             try {
            //                 var obj = JSON.parse(data);
            //                 //console.log(obj);
            //                 for (var i = 0; i < obj.Data.length; i++) {
            //                     var ID = i + 1;

            //                     var Option = "";

            //                     if (obj.Data[i].IsEnable == "0") {
            //                         Option = '<button class="btn btn-warning BTNApproveRegister" data-ID="' + obj.Data[i].ID + '" data-AndroidID="' + obj.Data[i].AndroidID + '" data-SetupLocation="' + obj.Data[i].SetupLocation + '">ดำเนินการ</button>';
            //                     } else {

            //                     }
            //                     Data.push({
            //                         "ID": ID,
            //                         "AndroidID": obj.Data[i].AndroidID,
            //                         "SetupLocation": obj.Data[i].SetupLocation,
            //                         "Onair": obj.Data[i].VideoTitle,
            //                         "Status": obj.Data[i].Status,
            //                         "Option": Option,
            //                     });
            //                 }
            //                 TableCustomerOrder.clear().rows.add(Data).draw(false);
            //             } catch (error) {

            //             }
            //         },
            //         error: function() {}
            //     });
            // }
            //#endregion 







        });
    </script>
