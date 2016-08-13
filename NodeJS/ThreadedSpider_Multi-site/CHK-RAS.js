var request = require("request");
var fs = require("fs");
var cheerio = require("cheerio");
var iconv = require('iconv-lite');
var BufferHelper = require('bufferhelper');
var link=1;
var linkmax=50030;
chk();

function chk(){
	if (link<=linkmax){
		RAS();
	}
}

//Request and Save to file function
function RAS(){
	//Count Link
	var links = 'I' + ( '000000' + link).substr(-7);
	//設定
	var URLs = "http://law.moj.gov.tw/LawClass/LawAll.aspx?PCode="+links;
	var filename = "Legal-"+link+".txt";
	link++;
	//	request - GET 
	request({
	url: URLs,
	method: "GET"
	}, 
	//get text and save
		function(e,r,b) {
			//console.log(URLs);
			if(e || !b) { return; }
			var $ = cheerio.load(b);
			var result = [];
			var titles = $("table.TableSearch");
			var bufferhelper = new BufferHelper();
			for(var i=0;i<titles.length;i++) {
			  result.push($(titles[i]).text());
			}
			//Start
			fs.open("./files/"+filename,"a",0644,function(e,fd){
				if(e) throw e;
				fs.write(fd,result,function(e){
				console.log("寫入完成 "+filename);
					if(e) throw e;
					fs.closeSync(fd);
				}),
				chk();
			});
			//End
	  });
}
