var server = require('http').createServer();
var http = require('http');
var path = require('path');
var fs = require('fs');
var io = require('socket.io')(server);

http.createServer(function(request, response) {
    var filePath = path.join(__dirname, 'index.html');
    var stat = fs.statSync(filePath);

    response.writeHead(200, {
        'Content-Type': 'text/html',
        'Content-Length': stat.size
    });

    var readStream = fs.createReadStream(filePath);
    // We replaced all the event handlers with a simple call to readStream.pipe()
    readStream.pipe(response);
}).listen(2000);
var i=0;
var olData='伺服器重啟w';
io.on('connection', function(client){
	i++;
	console.log("someone connection")
	io.emit('news',olData);
	client.on('chat', function(data){
		olData=(data.N+" : "+data.M+"<br/>")+olData;
		console.log(olData)
		io.emit("chat",data);
	});
	client.on('disconnect', function(data){
		//io.emit('leave','');
		console.log("someone disconnect")
		i--;
	});
	//io.emit('connection',{'D':'連線成功'});
});
server.listen(1999);
