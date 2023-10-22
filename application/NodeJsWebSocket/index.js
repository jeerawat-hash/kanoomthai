const httpServer = require("http").createServer();
var request = require('request');
const io = require("socket.io")(httpServer, {
	cors: {
		origin: "*",
		methods: ["GET", "POST"],
		//credentials: true
	}
});
io.on('connection', function (socket,req) {
  
	console.log(socket.connected); // true 
	
	
	socket.on('SetID', function (data) {
                socket.id = data;
                console.log('client connected : ' + socket.id);
        });
	 
	socket.on("disconnect", function() {
		console.log(socket.connected); // false
		console.log('client disconnected : ' + socket.id);
	});


 
	socket.on('MSGServer', function (data) {
		try {
			var obj = JSON.parse(data);
			console.log(obj);
			var ResData = JSON.stringify({
				"Source": obj.Source,
				"Dest": obj.Dest,
				"Header": obj.Header,
				"Msg": obj.Msg
			});
			io.emit(obj.Dest, ResData);
			console.log(data);
		} catch (error) {

		}
	});

});



httpServer.listen(8081);