//modules
var fs = require("fs");

//setting
var filename ="test.txt";
var need = 1;
var string = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890~!@#$%^&*()_+`-=";


var myArray = string.split("");
var dimensions = [];
var result = [];
for (var i=0;i<need;i++){
	dimensions.push(myArray);
}
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

console.log(result)
//fs.writeFile(filename,result.join("\r\n"),console.log("完成"));
