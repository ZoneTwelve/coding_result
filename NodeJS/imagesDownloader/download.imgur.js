var request = require('request');
var cheerio = require('cheerio');
var download = require("download-file")

request("http://imgur.com",function(error,response,data){
	if(error){
		return error;
	}else{
		var $ = cheerio.load(data)
		var res = $("div.post a");
		var result = [];
		for(var i=0;i<res.length;i++){
			var D = res.eq(i).html().match(/src="[^"]*/)[0]
			result.push({
				url:D.replace(/src="\/\//g,''),
				name:D.replace(/src="\/\/i.imgur.com\//g,'')
			});
		}
		// console.log(result)
		return Download(result);
	}
})
function Download(DB){
	var arr = DB.shift();
	if(arr){ 
		var url = arr.url
		var options = {
			directory: "./imgur_images/",
			filename: arr.name
		} 
		// return console.log(url,options)
		download(url, options, function(err){
			if (err) throw err
			console.log("done > "+options.filename);
			return Download(DB);
		})
	}else{
		console.log("沒有了owo")
	}
}