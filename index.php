<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Listen to the sounds of minecraft | By VertexMC.net</title>
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
	</head>

	<body>
	<?php 
		require("php/database.php");
		$page = isset($_GET["page"]) ? $_GET["page"] : 0;
		$error = isset($_GET["error"]) ? $_GET["error"] : 0;
		$sound = isset($_GET["sound"]) ? $_GET["sound"] : 0;
	?>
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
          <a class="navbar-brand" href="index.php">Sounds of minecraft</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li class="active"><a href="http://www.vertexmc.net">By VertexMC <span class="sr-only">(current)</span></a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

		<div class="container">
			<div class="jumbotron">
				<h1>Search sound.</h1>
				<p>You can find the sound you are looking for directly from here.</p><br/>
				<p>
				<?php if($error == 1){ ?>
					<div class="alert alert-danger alert-dismissible" role="alert">
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					  <strong>Error!</strong> <?php echo $sound ?> not exist. Try again.
					</div>
				<?php } ?>
					<form class="search-form center" method="get" action="sound.php">
						<div class="input-group">
							<input id="sound" name="n" type="text" placeholder="Search for..." class="form-control">
						</div>
						<button type="submit" class="btn btn-success">Search</button>
					</form>
				</p>
			</div>
			<div class="sounds panel panel-default">
				<div class="panel-body">
			<?php 
				$size = 0;
				if(Sound::all() != null){
					$size = count(Sound::all());
					$all = Sound::all();
					for ($i = $page * 10; $i < $page * 10 + 10; $i++) {
						if(!isset($all[$i])) continue; 
						$sound = $all[$i];?>
						<div class="sound-container panel panel-default">
							<div class="sound-title panel-heading">
								<h3 class="panel-title pull-left"><a href="sound.php?n=<?php echo $sound->name ?>"><?php echo $sound->name ?></a></h3>
								<span id="label-download" meta-name="<?php echo $sound->name ?>" class="label label-success pull-right count"><?php echo $sound->downloads ?></span><a id="download" class="pull-right download" href="php/options.php?s=<?php echo $sound->name ?>&d=true" onclick="setTimeout(function(){window.location.reload()}, 1000)" target="_blank"><span class="glyphicon glyphicon-download-alt" aria-hidden="true"></span></a>
							</div>
							<div class="panel-body">
								<div class="sound-rep">
									<audio src="<?php echo $sound->souce ?>" type="audio/mp3" controls="controls" width="100%" height="60px;"></audio>
								</div>
							</div>
						</div>
					<?php } ?>
				<?php }else{
					echo '<h2>Sin resultados.</h2>';
					} ?>
					</div>
			</div>

			<nav class="pag-nav">
                <ul class="pagination">
                    <?php for ($i = 0; $i < count($all) / 10; $i++) { ?>
                        <li class="<?php if ($page == $i) echo("active") ?> <?php if($size < ($i*10)) echo("disabled") ?>"><a href="?page=<?php echo $i ?>"><?php echo $i + 1 ?></a></li>
                    <?php } ?>
                </ul>
            </nav>
            <br><br>
		</div>
		<footer class="footer">
		    <div class="container">
		    	<p class="pull-right">Developed by <a href="http://www.jesshilario.net">JessHilario</a> | Powered by <a href="http://www.vertexmc.net">VertexMC</a> <span class="glyphicon glyphicon-heart heart" aria-hidden="true"></span></p>
		    </div>
		</footer>	
	
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/jquery.js"></script>
		<script src="js/mediaelement-and-player.min.js"></script>
		<script type="text/javascript">
            $('audio,video').mediaelementplayer();
		</script>
	</body>
</html>