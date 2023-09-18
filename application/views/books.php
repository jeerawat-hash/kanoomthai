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

  สั่งขนม Realtime
  <div class="row"> 
        <div class="col-6">ชื่อ : <input id="Title" type="text">
        </div>
        <div class="col-6">
            <button id="BTNSend" type="button" class="btn btn-primary">สั่งอาหาร</button>
        </div>
    </div> 

    <div class="row">
        <div class="col-12 text-center"> 
            <h1>เอาไรพิมพ์</h1>
        </div> 
        <div class="col-12 text-center"> 
            <textarea id="TEXTMSG" cols="30" rows="10"></textarea>
        </div> 
    </div> 

</div>
 
    

</body>

<audio id="myAudio">
  <source src="http://203.156.9.157/kanoomthai/sound/alert.mp3" type="audio/mpeg"> 
</audio>

<script>
$(function () {

$("#SocketStatus").text("Disconnected");
var Receive = "";
 try {
	
	 const socket = io("http://203.156.9.157:8081");
	 socket.on("connect", function () {
		 console.log("Connected");
		$("#SocketStatus").text("Connected");
	 });
   
	 $("#BTNSend").on("click", function () {  
		 var Title = $("#Title").val();  
		 var text = $("#TEXTMSG").val();  
         playAudio();
		 if (socket.connected == true) {
			 var AAA = JSON.stringify({
				 "Source": Title,
				 "Dest": "RServer",
				 "Header": Title,
				 "Msg": text,
			 });
		socket.emit("MSGServer", AAA); 
             	$("#Title").attr("disabled",true);   
             	$("#TEXTMSG").val("");  
             	swal("สั่งสำเร็จ!", "ส่งรายการของ "+Title+" แล้วรอมันรับแปป!", "success");
		}
		 if(Receive == ""){
			 Receive = Title;
			 socket.on(Receive, function (Data) { 
				 var Objdata = JSON.parse(Data);
				 console.log(Objdata); 
                 
				 swal("รับออเดอร์ "+Objdata.Header+" แล้ว!",Objdata.Msg , "info");
			 }); 
		 }

	 });

 } catch (error) {
	 console.log(error);
 }




});

var x = document.getElementById("myAudio"); 

function playAudio() { 
  x.play(); 
} 

function pauseAudio() { 
  x.pause(); 
} 
</script>
</html>
