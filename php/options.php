<?php  
	require("database.php");
	$download = isset($_GET["d"]) ? $_GET["d"] : "false";
	if(!isset($_GET["s"])){
		echo "E505<br/>";
		header('Location: ../index.php');
	}else{
		$sound = Sound::forName($_GET["s"]);
	}
	if($download === "false"){
		echo "E101<br/>";
		header('Location: ../index.php');
	}else{
		if($sound != "none"){
			Sound::downUp($sound);
			header('Location: '. $sound->souce.'?download=1');
		}
	}
?>