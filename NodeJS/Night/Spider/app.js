//module
var querystring = require('querystring');
var url = require('url');
var http = require('http');
var https = require('https');
var util = require('util');
var request = require("request");
var fs = require("fs");
var cheerio = require("cheerio");
var BufferHelper = require('bufferhelper');
//JS
//var GetInfo = require('./GetInfo.js')
//var config = require('./config.js')


//config.js Start

//POST URL
var urlstr = 'http://210.70.131.56/online/login.asp';
//POST 內容
var bodyQueryStr = {
    Loginid: 'StudentID',
    LoginPwd: 'password',
    Enter: 'LOGIN'
};

var contentStr = querystring.stringify(bodyQueryStr);
var contentLen = Buffer.byteLength(contentStr, 'utf8');
console.log(util.format('post data: %s, with length: %d', contentStr, contentLen));
var httpModule = urlstr.indexOf('https') === 0 ? https : http;
var urlData = url.parse(urlstr);

//HTTP請求選項
var opt = {
    hostname: urlData.hostname,
    path: urlData.path,
    method: 'POST',
    headers: {
        'Content-Type': 'text/html; charset=big5',
        'Content-Length': contentLen,
		'Accept-Encoding':'gzip, deflate, lzma',
		'User-Agent':'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.82 Safari/537.36 OPR/39.0.2256.48'

    }
};
//config.js End

//處理事件回調
var req = httpModule.request(opt, function(httpRes) {
    var buffers = [];
    httpRes.on('data', function(chunk) {
        buffers.push(chunk);
    });

    httpRes.on('end', function(chunk) {
        var wholeData = Buffer.concat(buffers);
        var dataStr = wholeData.toString('utf8');
        console.log('content ' + wholeData);
    });
}).on('error', function(err) {
    console.log('error ' + err);
});;


//寫入數據，完成發送
req.write(contentStr);

//GetInfo Start

//設定資訊頁面
var achievementURL = "";
var HTMLelement = "";
  request({
    url: AchievementURL ,
    method: "GET"
  }, 
  //get text and save
function(e,r,b) {
    if(e || !b) { return; }
    var $ = cheerio.load(b);
    var result = [];
    var titles = $(HTMLelement);
	var bufferhelper = new BufferHelper();
	for(var i=0;i<titles.length;i++) {
      result.push($(titles[i]).text());
	  console.log(result);
    }
	
//並儲存為文件
var filename = "Search.txt";
	fs.open(filename,"a",0644,function(e,fd){
    if(e) throw e;
	console.log("正在準備寫入 "+filename);
    fs.write(fd,result,function(e){
        if(e) throw e;
        fs.closeSync(fd);
    })
	});
	
});
		
//GetInfo End

req.end();