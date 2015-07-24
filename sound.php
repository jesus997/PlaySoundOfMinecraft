<?php
	require("php/database.php");
	$name = isset($_GET["n"]) ? $_GET["n"] : "none";
	$sound = Sound::forName($name);
	if($name === "none"){
		header('Location: index.php');
	}
	if(is_null($sound->name)){
		header('Location: index.php?error=1&sound='.$name);
	}
?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Listen the sounds <?php echo($sound->name) ?> | By VertexMC.net</title>
		<meta name="description" content="Listen to the sounds of minecraft | By VertexMC.net">
		<meta name="author" content="JessHilario.net">
		<link rel="icon" href="img/favicon.ico">
		<link rel="stylesheet" href="css/mediaelementplayer.css" />
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
		<style>
          .footer{
          	bottom: 0;
          	position: absolute;
          }
      </style>
	</head>

	<body>
		<!-- Fixed navbar -->
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">Plays sounds of minecraft</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li class="active"><a href="http://www.vertexmc.net">By VertexMC <span class="sr-only">(current)</span></a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

		<div class="container">
			<div class="sound-container panel panel-primary">
				<div class="sound-title panel-heading">
					<h3 class="panel-title pull-left"><?php echo $sound->name ?></h3>
					<span class="label label-success pull-right count"><?php echo $sound->downloads ?></span><a class="pull-right download" href="<?php echo $sound->souce ?>?download=1"><span class="glyphicon glyphicon-download-alt" aria-hidden="true"></span></a>
				</div>
				<div class="panel-body">
					<div class="sound-rep">
						<audio src="<?php echo $sound->souce ?>" type="audio/mp3" controls="controls" width="100%" height="60px;"></audio>
					</div>
				</div>
			</div>
		<footer class="footer">
		    <div class="container">
		    	<p class="text-muted">Developed by <a href="http://www.jesshilario.net">JessHilario</a> | Powered by <a href="http://www.vertexmc.net">VertexMC</a> <span class="glyphicon glyphicon-heart alert-link" aria-hidden="true"></span></p>
		    </div>
		</footer>	
	
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/jquery.js"></script>
		<script src="js/mediaelement-and-player.min.js"></script>
		<script>
			$('audio,video').mediaelementplayer();
		</script>
	</body>
</html>