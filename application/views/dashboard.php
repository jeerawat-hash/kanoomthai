<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.5.0/socket.io.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

  <!-- Font Awsome -->
  <link rel="stylesheet" href="lib/fontawsome/css/all.css" />
  <!-- Font Awsome -->


</head>

<body>

  <div class="container-fluid mt-3">

    <div class="row text-center">
      <div class="col-12">
        <h1 id="SocketStatus">Status</h1>
      </div>
    </div>
    <div class="row">
      <div class="col-7">
        <table id="example" class="display nowrap" style="width:100%">
          <thead>
            <tr>
              <th>ชื่อลูกค้า</th>
              <th>รอทำรายการ</th>
              <th>ยอดสั่งซื้อ</th>
              <th>สถานะ</th>
              <th>ดำเนินการ</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>ลุงโด้ 3 สี</td>
              <td>1 รายการ</td>
              <td>1 รายการ</td>
              <td>กำลังใช้บริการ</td>
              <td>
                <button type="button" class="btn btn-info">ตรวจสอบ</button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="col-5"></div>
    </div>
  </div>










  <div class="container">
    <div id="ContentMenu"></div>
  </div>




  <!-- Modal -->
  <div class="modal fade" id="ModalCommentCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="ModalLongTitle">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

          <div class="mb-3">
            <label for="MSGTEXT" class="form-label">เมนู</label>
            <input type="email" class="form-control" id="MSGTEXT" placeholder="menu">
          </div>
          <div class="mb-3">
            <label for="CommentTEXT" class="form-label">แนบข้อความ</label>
            <textarea class="form-control" id="CommentTEXT" rows="3"></textarea>
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" id="SaveData">บันทึก</button>
          <button type="button" class="btn btn-secondary" id="CloseData" data-dismiss="modal">ปิด</button>
        </div>
      </div>
    </div>
  </div>



</body>

<script>
  $(function() {

    $("#SocketStatus").text("Disconnected");
    try {

      const socket = io("http://203.156.9.157:8081");
      socket.on("connect", function() {
        console.log("Connected");
        $("#SocketStatus").text("Connected");

      });

      socket.on("RServer", function(Data) {
        console.log("From : " + Data);
        var obj = JSON.parse(Data);
        var html = '<div class="card mt-2">' +
          '<div class="card-header">' +
          '<h1>' + obj.Header + ' เวลา : ' + formatDate(new Date()) + '</h1>' +
          '</div>' +
          '<div class="card-body">' +
          '<h5 class="card-title">' + obj.Msg + '</h5>' +
          '<button id="BTNSend" type="button" class="btn btn-primary BTNReceive" data-header="' + obj.Header + '" data-Source="' + obj.Source + '" data-Dest="' + obj.Dest + '" data-Msg="' + obj.Msg + '" >รับรายการ</button>' +
          '</div>' +
          '</div>';
        $("#ContentMenu").prepend(html);
      });



      var header = "";
      var Source = "";
      var Dest = "";
      var Msg = ""

      $("#ContentMenu").on("click", ".BTNReceive", function() {

        header = $(this).attr("data-header");
        Source = $(this).attr("data-Source");
        Dest = $(this).attr("data-Dest");
        Msg = $(this).attr("data-Msg");

        $("#ModalCommentCenter").modal("show");
        $("#ModalCommentCenter").find("#ModalLongTitle").text("รายการของ " + header);
        $("#ModalCommentCenter").find("#MSGTEXT").val(Msg);
        $("#ModalCommentCenter").find("#CommentTEXT").val("");
      });

      $("#ModalCommentCenter").find("#SaveData").on("click", function() {

        $("#ModalCommentCenter").modal("hide");

        if (socket.connected == true) {
          var Data = JSON.stringify({
            "Source": "Dashboard",
            "Dest": Source,
            "Header": header,
            "Msg": $("#ModalCommentCenter").find("#CommentTEXT").val(),
          });
          socket.emit("MSGServer", Data);
        }
        swal("รับรายการ : " + header, Msg, "success");

      });

      $("#ModalCommentCenter").find("#CloseData").on("click", function() {

        $("#ModalCommentCenter").modal("hide");

      });

    } catch (error) {
      console.log(error);
    }




  });


  function padTo2Digits(num) {
    return num.toString().padStart(2, '0');
  }

  function formatDate(date) {
    return (
      [
        date.getFullYear(),
        padTo2Digits(date.getMonth() + 1),
        padTo2Digits(date.getDate()),
      ].join('-') +
      ' ' + [
        padTo2Digits(date.getHours()),
        padTo2Digits(date.getMinutes()),
        padTo2Digits(date.getSeconds()),
      ].join(':')
    );
  }
</script>

</html>