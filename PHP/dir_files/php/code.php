<?php
$dir_path = './files';
	list_all_file($dir_path);
	function list_all_file($dir_path)
	{
		if(is_dir($dir_path))
		{
			foreach(scandir($dir_path) as $file)
			{
				if($file != '.' && $file != '..')
				{
					list_all_file($dir_path . '/' . $file);
				}
			}
		}
		
		if(is_file($dir_path))
		{
			$fne = explode('.', $dir_path);
			$fnes = $fne[2];
			$FN = str_replace('./files/','<br>',$dir_path);
			$fnlow = strtolower($fnes);
			
			echo '<div><ul><ii><a href="'.$dir_path.'">'.$FN.'</a><br/></li></ul><br>';
			
			
			if ($fnlow == 'mp4' or $fnlow == 'webm' or $fnlow == 'ogg'){
				echo '<video controls="controls" width="50%" src="'.$dir_path.'" type="video/'.$fnes.'"></video>';
			}elseif ($fnlow == 'png' or $fnlow == 'jpg' or $fnlow == 'jpeg' or $fnlow == 'bmp' or $fnlow == 'svg'){
				echo '<img src="'.$dir_path.'" height="60%">';
			}else{
				echo '<a href="'.$dir_path.'">'.$FN.' 沒有線上播放或者展示的途徑,想查看請下載.</a>';
			}
			
			echo '</div>';
		}
	}
	
?>