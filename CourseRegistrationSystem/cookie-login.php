<?php
die();

echo '<script>
	expire_days = 1;
	var d = new Date();
	d.setTime(d.getTime() + (expire_days * 24 * 60 * 60 * 1000));
	document.cookie = "name="+"admin"+";"
	document.cookie="competence="+"1137";
	document.cookie="expires=" + d.toGMTString();
	</script>';
echo '<script>
	expire_days = 1;
	var d = new Date();
	d.setTime(d.getTime() + (expire_days * 24 * 60 * 60 * 1000));
	document.cookie = "name="+"'.$unit->name.'"+";"
	document.cookie="competence="+"'.$unit->competence.'";
	document.cookie="expires=" + d.toGMTString();
	</script>';
?>
