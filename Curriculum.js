var request = require("request");
var cheerio = require("cheerio");
var fs = require("fs");
var iconv = require('iconv-lite');
var urlencode = require('urlencode');

var Class = '電機106甲';//班級課表連結 待轉為URL Encode
var ClassLink = "http://ta.taivs.tp.edu.tw/contact/show_class.asp?classn=" + urlencode(Class, 'big5');//將班級轉為URL Encode並製成課表連結
request({
		url: ClassLink,
		encoding: "binary",
		method: "GET"
		/************************************
		*  Daan VHS Class Curriculum Spider *
		*		大安高工日間課表爬蟲		*
		*			by.ZoneTwelve			*
		*	  持續開發中>>JSON DataBase		*
		*		  剩下不知道說甚麼			*
		*	 因為我都不寫說明整體的注解		*
		*----------------------------------	*
		*		   Class >> 班級 			*
		*		ClassLink >> 班級課表URL	*
		*	ClassCurriculum >> 將資料整合	*
		*		titles >> 搜索的tag			*
		*************************************/
	}, 
	function(error, response, body) {
			if (error || !body) {
			  return;
			}
		var $ = cheerio.load(iconv.decode(new Buffer(body, "binary"),"Big5"));
		var ClassCurriculum = [];
		var titles = $("table tr td");
		//var DB = 0;	//未來DataBase用
		for (var i = 1; i < titles.length; i++) {
			if (titles.eq(i).text() != "　　"){//移除無課的內容
				ClassCurriculum.push("'"+titles.eq(i).text()+"'");//簡單整理資料
			}
		}
		console.log(ClassCurriculum) //開發測試LOG,其實我有考慮不寫註解這行
		//fs.writeFile("curriculum.json",ClassCurriculum,function(){});	//將課表資料儲存為文件
	}
);