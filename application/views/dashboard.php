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
  <div class="mt-4 p-5 bg-primary text-white rounded">
    <h1>Jumbotron Example</h1> 
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat..</p> 
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
  
	 socket.on("RServer", function (Data) {
		 console.log("From : "+Data);
	 });

	//  $("#Click").on("click", function () {
	// 	 //alert("dsa");
	// 	 var Customer = $("#EmitID").val();
	// 	 if (socket.connected == true) {
	// 		 var AAA = JSON.stringify({
	// 			 "Source": "System",
	// 			 "Dest": "0616619956",
	// 			 "Msg": "TEST",
	// 			 "Type": "T",
	// 			 "Remark": "User"
	// 		 });
	// 		 socket.emit("MSGServer", AAA);
	// 	 }
	//  });

 } catch (error) {
	 console.log(error);
 }




});
</script>
</html>
