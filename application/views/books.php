<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.5.0/socket.io.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</head>
<body>

<div class="container mt-3">
  <h2 id="SocketStatus">Status</h2> 

  <div class="row">
        <div class="col-4">สั่งขนม Realtime</div>
        <div class="col-4">
        ชื่อ : <input id="Title" type="text">
        </div>
        <div class="col-4">
            <button id="BTNSend" type="button" class="btn btn-primary">สั่งอาหาร</button>
        </div>
    </div> 

    <div class="row">
        <div class="col-12">
            เอาไรพิมพ์ : 
            <textarea id="TEXTMSG" cols="30" rows="10"></textarea>
        </div> 
    </div> 

</div>
 
    

</body>

<script>
$(function () {

$("#SocketStatus").text("Disconnected");
 try {
	
	 const socket = io("http://203.156.9.157:8081");
	 socket.on("connect", function () {
		 console.log("Connected");
		$("#SocketStatus").text("Connected");

	 });
 
	//  socket.on("System", function (Data) {
	// 	 console.log("From : "+Data);
	//  });

	 $("#BTNSend").on("click", function () { 

		 var Title = $("#Title").val();  
		 var text = $("#TEXTMSG").val();  
		 if (socket.connected == true) {
			 var AAA = JSON.stringify({
				 "Source": "RClient",
				 "Dest": "RServer",
				 "Header": Title,
				 "Msg": text,
			 });
			 socket.emit("MSGServer", AAA);
             $("#Title").val("");  
             $("#TEXTMSG").val("");  
             swal("สั่งสำเร็จ!", "ส่งรายการของ "+Title+" แล้วรอมันรับแปป!", "success");
		 }
	 });

 } catch (error) {
	 console.log(error);
 }




});
</script>
</html>
