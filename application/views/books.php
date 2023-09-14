<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.5.0/socket.io.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container mt-3">
  <h2 id="SocketStatus">Status</h2> 
</div>

<div class="container">
    <div class="row">
        <div class="col-4">SEND TEXT</div>
        <div class="col-4">
            <textarea id="TEXTMSG" cols="30" rows="10"></textarea>
        </div>
        <div class="col-4">
            <button id="BTNSend" type="button" class="btn btn-primary">Send</button>
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

		 var text = $("#TEXTMSG").text();

         alert(text);
         
		 if (socket.connected == true) {
			 var AAA = JSON.stringify({
				 "Source": "RClient",
				 "Dest": "RServer",
				 "Msg": text,
			 });
			 socket.emit("MSGServer", AAA);
		 }
	 });

 } catch (error) {
	 console.log(error);
 }




});
</script>
</html>
