<?php 
	require("database.php");
	if(isset($_GET["s"])){
		$sound = Sound::forName($_GET["s"]);
		if(isset($_GET["d"])){
			echo Sound::_downloads($sound);
		}
	}
?>