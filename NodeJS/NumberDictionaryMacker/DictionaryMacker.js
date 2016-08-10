var fs = require('fs');
var Lnumber = 10000000;
var Mnumber = 99999999;
var filename = Lnumber+"~"+Mnumber+".txt";
fs.open(filename,"a",0644,function(e,fd){
	for (var Number =Lnumber;Number<=Mnumber;Number++){
    if(e) throw e;
	console.log("正在準備寫入 "+ Number+" 到 "+filename);
    fs.write(fd,Number+"\r\n",function(e){
        if(e) throw e;
        fs.closeSync(fd);
		//return binding.close(fd);
    })
	}
});
