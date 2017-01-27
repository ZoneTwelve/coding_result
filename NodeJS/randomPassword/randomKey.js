function randomKey(max,str){
	var arr = [ 'a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z','0', '9', '8', '7', '6', '5', '4', '3', '2', '1',1,2,3,4,5,6,7,8,9,0];
	if(str == undefined)str = '';
	str = str + arr[Math.floor(Math.random()*arr.length)];
	if(str.length < max)return randomKey(max,str);
	else return str
}
let j=1;
for(var i=0;i<12;i++){
	console.log(randomKey(j));
	console.log("----------");
	j+=j;
}