<style>
body{
	font-family:monospace;
	background-color:black;
}
#base{
	position:absolute;
	left:0;
	margin:auto;
	text-align:center;
}.boundary{
	top:50vh;
	width:100vw;
	height:5px;
	background-color:green;
}h1,a{
	border-width:5px;	
	//border-style:dotted;
	text-decoration:none;
	font-size:1.15em;
}#info,a{
	color:white;
}
</style>
<div id="base">
<?php
	$json = file_get_contents('userdb.json');
	$obj=json_decode($json);
	foreach ( $obj as $unit ){
			echo '<div class="boundary"></div><div id="info">';
			echo '<h1>UserName：'.$unit->name.'</h1>';
			echo '</div><div class="boundary"></div>';
	}
	?>
<a href="./">返回|Back</a>
</div>