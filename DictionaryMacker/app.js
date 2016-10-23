var fs = require("fs");

var filename ="test.txt";
var need = 3;
var myArray = ['A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z',"0","1","2","3","4","5","6","7","8","9"];

var dimensions = [];
for (var i=0;i<need;i++){
	dimensions.push(myArray);
}

var result = [];

function explore(curDim, prefix) {
	var nextDim = dimensions.shift();
	for (var i = 0; i < curDim.length; i++) {
		if (nextDim) 
			explore(nextDim, prefix + curDim[i]);
		else 
			result.push(prefix + curDim[i]);
	}
	if (nextDim) dimensions.push(nextDim);
}
explore(dimensions.shift(), "");

//console.log(result)
fs.writeFile(filename,result.join("\r\n"),console.log("完成"));