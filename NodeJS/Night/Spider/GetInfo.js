//�]�w��T����
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
	
//���x�s�����
var filename = "Search.txt";

	fs.open(filename,"a",0644,function(e,fd){
    if(e) throw e;
	console.log("���b�ǳƼg�J "+filename);
    fs.write(fd,result,function(e){
        if(e) throw e;
        fs.closeSync(fd);
    })
	});
	
});
	
	/*
	*/