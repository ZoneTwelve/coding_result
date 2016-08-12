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



//GetInfo End

req.end();