var http = require('http');
// var request = require('request');
// var fs = require('fs');
// var index = fs.readFileSync('index.html');

http.createServer(function (req, res) {
  // res.writeHead(200, {'Content-Type': 'text/plain'});
  res.writeHead(200, {"Content-Type": "text/plain; charset=utf-8"});
  // res.writeHead(200, {'Content-Type': 'application/xhtml+xml; charset=utf-8'});
  request(function(r){
	res.end(r);
  })
}).listen(1137);
function request(callback){
http.request(options, function(response) {
	var d = '';
	response.on('data', function(chunk){
		d += chunk;
	});
	response.on('end', function () {
		var res = JSON.parse(d).result.results;
		var str = '';
		str+=new Date()+"\r\n";
		for(var i=0;i<res.length;i++){
			var data = res[i];
			str+=data.Station+" 往 "+data.Destination+" ,資料時間:"+data.UpdateTime+"\r\n";
		}
		callback(str);
	});
}).end();
}
var options = {
	host: 'data.taipei',
	path: '/opendata/datalist/apiAccess?scope=resourceAquire&rid=55ec6d6e-dc5c-4268-a725-d04cc262172b'
};

