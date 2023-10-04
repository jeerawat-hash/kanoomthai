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





             <!-- Modal_MaintainGoodsItem -->
             <div class="modal fade" id="Modal_MaintainGoodsItem">
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
                                     <h4>ชื่อ</h4>
                                 </div>
                                 <div class="col-6">
                                     <h4>ราคาต่อหน่วย</h4>
                                 </div>
                             </div>
                             <div class="row">
                                 <div class="col-6">
                                     <input type="text" class="form-control" id="GoodsName" placeholder="ชื่อสินค้า">
                                 </div>
                                 <div class="col-6">
                                     <input type="text" class="form-control" id="PricePerUnit" placeholder="ราคาต่อหน่วย">
                                 </div>
                             </div>
                             <div class="row">
                                 <div class="col-6">
                                     <h4>ยอดคงเหลือ</h4>
                                 </div>
                                 <div class="col-6">
                                     <h4>แนบภาพ</h4>
                                 </div>
                             </div>
                             <div class="row">
                                 <div class="col-6">
                                     <input type="text" class="form-control" id="StockAmount" placeholder="ยอดคงเหลือ">
                                 </div>
                                 <div class="col-6">
                                     <div class="custom-file">
                                         <input type="file" class="custom-file-input" id="GoodsImage">
                                         <label class="custom-file-label" for="GoodsImage"></label>
                                     </div>
                                 </div>
                             </div>
                             <hr>
                             <div class="row">
                                 <div class="col-12">
                                     <center>
                                         <img src="https://s3.eu-central-1.amazonaws.com/bootstrapbaymisc/blog/24_days_bootstrap/sheep-3.jpg" width="500px" class="img-fluid img-thumbnail">
                                     </center>
                                 </div>
                             </div>
                             <hr>
                          
                         </div>
                         <div class="modal-footer">
                             <button type="button" class="btn btn-primary" id="SaveData">บันทึกข้อมูล</button>
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

         bsCustomFileInput.init();


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

         $("#Modal_MaintainGoodsItem").modal("show");




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

                             Option += '<button class="btn btn-warning BTNEditGoodsItem" data-GoodsItemID="' + obj[i].GoodsItemID + '" data-GoodsItemName="' + obj[i].GoodsItemName + '" data-Available="' + obj[i].Available + '" data-Image="' + obj[i].Image + '" data-PricePerUnit="' + obj[i].PricePerUnit + '" data-StockAmount="' + obj[i].StockAmount + '" data-Unit="' + obj[i].Unit + '" data-Used="' + obj[i].Used + '"  >แก้ไข</button>';

                             Data.push({
                                 "ID": ID,
                                 "GoodsName": obj[i].GoodsItemName,
                                 "UnitPerPrice": obj[i].PricePerUnit + " บาท/" + obj[i].Unit,
                                 "StockAmount": obj[i].Available + " " + obj[i].Unit,
                                 "Image": '<img src="' + obj[i].Image + '" class="w-25 img-fluid img-thumbnail">',
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