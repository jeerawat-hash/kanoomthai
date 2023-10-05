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
                         <div class="modal-header bg-success">
                             <h5 class="modal-title">Extra Large Modal</h5>
                             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                 <span aria-hidden="true">&times;</span>
                             </button>
                         </div>
                         <div class="modal-body">
                             <div class="row">
                                 <div class="col-4">
                                     <h4>ชื่อ</h4>
                                 </div>
                                 <div class="col-4">
                                     <h4>ราคาต่อหน่วย</h4>
                                 </div>
                                 <div class="col-4">
                                     <h4>หน่วย</h4>
                                 </div>
                             </div>
                             <div class="row">
                                 <div class="col-4">
                                     <input type="text" class="form-control" id="GoodsName" placeholder="ชื่อสินค้า">
                                 </div>
                                 <div class="col-4">
                                     <input type="number" class="form-control" id="PricePerUnit" placeholder="ราคาต่อหน่วย">
                                 </div>
                                 <div class="col-4">
                                     <input type="text" class="form-control" id="Unit" placeholder="หน่วย">
                                 </div>
                             </div>
                             <div class="row">
                                 <div class="col-6">
                                     <h4>จำนวนสินค้า</h4>
                                 </div>
                                 <div class="col-6">
                                     <h4>แนบภาพ</h4>
                                 </div>
                             </div>
                             <div class="row">
                                 <div class="col-6">
                                     <input type="text" class="form-control" id="StockAmount" placeholder="จำนวนสินค้า">
                                 </div>
                                 <div class="col-6">
                                     <input type="file" class="custom-file-input" id="GoodsImageUpload" name="filename">
                                     <label class="custom-file-label" for="GoodsImageUpload">Choose file</label>
                                 </div>
                             </div>
                             <hr>
                             <div class="row">
                                 <div class="col-12">
                                     <center>
                                         <img id="GoodsImagePreview" width="500px" class="img-fluid img-thumbnail">
                                     </center>
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
             <!-- Modal_ConfirmOrder  -->






         </div><!-- /.container-fluid -->
     </section>
     <!-- /.content -->
 </div>

 <script>
     $(function() {

         // Add the following code if you want the name of the file appear on select
         $(".custom-file-input").on("change", function() {
             var fileName = $(this).val().split("\\").pop();
             $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
         });


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

         var GoodsItemID = "";
         var GoodsItemName = "";
         var Available = "";
         var Image = "";
         var StockAmount = "";
         var PricePerUnit = "";
         var Unit = "";
         var Used = "";
         var StockSub = 0;
         var GoodsImageUpload;

         $("#TableGoodsItems").on("click", ".BTNEditGoodsItem", function() {

             GoodsItemID = $(this).attr("data-goodsItemID");
             GoodsItemName = $(this).attr("data-goodsItemName");
             Available = $(this).attr("data-available");
             Image = $(this).attr("data-image");
             StockAmount = $(this).attr("data-stockAmount");
             PricePerUnit = $(this).attr("data-pricePerUnit");
             Unit = $(this).attr("data-unit");
             Used = $(this).attr("data-used");

             StockSub = (StockAmount - Used);

             $("#Modal_MaintainGoodsItem").modal("show");
             $("#Modal_MaintainGoodsItem").find(".modal-title").text("แก้ไข " + GoodsItemName);
             $("#Modal_MaintainGoodsItem").find("#GoodsName").val(GoodsItemName);
             $("#Modal_MaintainGoodsItem").find("#PricePerUnit").val(PricePerUnit);
             $("#Modal_MaintainGoodsItem").find("#Unit").val(Unit);
             $("#Modal_MaintainGoodsItem").find("#StockAmount").val(StockAmount);
             $("#Modal_MaintainGoodsItem").find("#GoodsImageUpload").val("").trigger("change");
             //  $("#Modal_MaintainGoodsItem").find("#GoodsImagePreview").attr("src", "http://203.156.9.157/kanoomthai/Upload/thubnail.svg");
             $("#Modal_MaintainGoodsItem").find("#GoodsImagePreview").attr("src", Image);
             $("#Modal_MaintainGoodsItem").find("#SaveData").hide();
             $("#Modal_MaintainGoodsItem").find("#EditData").show();

         });

         $("#Modal_MaintainGoodsItem").find("#EditData").on("click", function() {

             StockAmount = $("#Modal_MaintainGoodsItem").find("#StockAmount").val();
             GoodsImageUpload = $("#Modal_MaintainGoodsItem").find("#GoodsImageUpload").prop('files')[0];
             Unit = $("#Modal_MaintainGoodsItem").find("#Unit").val();
             PricePerUnit = $("#Modal_MaintainGoodsItem").find("#PricePerUnit").val(PricePerUnit);

             if (StockAmount <= StockSub) {
                 alert("ไม่ควรกำหนดน้อยกว่ายอดคงเหลือปัจจุบัน " + StockSub + " " + Unit);
                 return false;
             }

             if (GoodsImageUpload == undefined) { 
                 alert("กรุณาแนบภาพสินค้า");
                 return false;
             }

             var data = new FormData();
             data.append('GoodsItemID', GoodsItemID);
             data.append('GoodsItemName', GoodsItemName);
             data.append('StockAmount', StockAmount);
             data.append('PricePerUnit', PricePerUnit);
             data.append('GoodsImageUpload', GoodsImageUpload);
             data.append('Unit', Unit);

             $.ajax({
                 url: "http://203.156.9.157/kanoomthai/index.php/Data/EditGoodsItems",
                 type: "POST",
                 data: data,
                 contentType: false,
                 cache: false,
                 processData: false,
                 success: function(data) {
                     try {
                         var obj = JSON.parse(data);
                         console.log(obj);
                         $("#Modal_MaintainGoodsItem").modal("hide");

                     } catch (error) {}
                 },
                 error: function() {}
             });


         });


         $("#BTNAddDataGoodsItem").on("click", function() {
             $("#Modal_MaintainGoodsItem").modal("show");
             $("#Modal_MaintainGoodsItem").find(".modal-title").text("CreateGoodsItem");
             $("#Modal_MaintainGoodsItem").find("#GoodsName").val("");
             $("#Modal_MaintainGoodsItem").find("#PricePerUnit").val("");
             $("#Modal_MaintainGoodsItem").find("#Unit").val("");
             $("#Modal_MaintainGoodsItem").find("#StockAmount").val("");
             $("#Modal_MaintainGoodsItem").find("#GoodsImageUpload").val("").trigger("change");
             $("#Modal_MaintainGoodsItem").find("#GoodsImagePreview").attr("src", "http://203.156.9.157/kanoomthai/Upload/thubnail.svg");

             $("#Modal_MaintainGoodsItem").find("#SaveData").show();
             $("#Modal_MaintainGoodsItem").find("#EditData").hide();
         });

         $("#Modal_MaintainGoodsItem").find("#SaveData").on("click", function() {

             var GoodsName = $("#Modal_MaintainGoodsItem").find("#GoodsName").val();
             var PricePerUnit = $("#Modal_MaintainGoodsItem").find("#PricePerUnit").val();
             var Unit = $("#Modal_MaintainGoodsItem").find("#Unit").val();
             var StockAmount = $("#Modal_MaintainGoodsItem").find("#StockAmount").val();
             var GoodsImageUpload = $("#Modal_MaintainGoodsItem").find("#GoodsImageUpload").prop('files')[0];

         });






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