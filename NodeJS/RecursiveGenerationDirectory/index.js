let recurrenceKey=0;makeDir='.';
function rgdir(dir){
	makeDir = makeDir + '/' + dir[recurrenceKey];
	recurrenceKey++;
	fs.exists(makeDir, function (value) {
		if(!value){
			fs.mkdir(makeDir,0777, function (err) {
				if(recurrenceKey<dir.length)
					return rgdir(dir);
			});
		}else if(recurrenceKey<dir.length){
			return rgdir(dir);
		}
	});	
}
