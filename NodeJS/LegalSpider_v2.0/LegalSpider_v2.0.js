var request = require("request");
var cheerio = require("cheerio");
var fs = require("fs");
var link=1;
var linkmax=50030;
compare();

function compare(){
	if (link<=linkmax){
		start();
	}
}

function start(){
	//Count Link
	var links = 'I' + ( '000000' + link).substr(-7);
	//設定
	var URLs = "http://law.moj.gov.tw/LawClass/LawAll.aspx?PCode="+links;
	//http://law.moj.gov.tw/LawClass/LawAll.aspx?PCode=J0070017 >> 著作權法 
	request({
    url: URLs,
    method: "GET"
	}, function(error, response, body) {
    if (error || !body) {
      return;
    }
	var $ = cheerio.load(body);
	var result = [];
	var titles = $("table.TableSearch tr td a");
	//table.TableSearch
	var location;
	//for (var i = 0; i < titles.length; i++)由於法律標題就在第三位所以就取3,省資源(o Wo)b,然而方便各位修改,所以使用for.
	for (var i = 0; i < 3; i++) {
		result.push(titles.eq(i).text());
		var title = result.slice(2, 3);
	}
	if (title != ''){
		var result = [];
		var titles = $("table.TableSearch tr");
		console.log(title)
		for (var i = 0; i < titles.length; i++) {
			result.push(titles.eq(i).text());
			var newresult = result.slice(1, titles.length);
		}
		fs.writeFile("./files/"+title+".txt", newresult, function() {
		});
	}else(
		console.log("Unfind >> "+links)
	)
	link++;
	compare();
  });
};





