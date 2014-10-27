<?php
 session_start();
 header('Content-Type: text/html; charset=utf-8');
?>
<!doctype html>
<html>

<head>
	<link rel="stylesheet" href="style/bootstrap.min.css">
	<link rel="stylesheet" href="style/bootstrap-theme.min.css">
	<link rel="stylesheet" href="style/style.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="UTF-8">
	<script src="js/jquery-1.11.1.min.js" type="text/javascript"></script>
	<script src="js/bootstrap.min.js" type="text/javascript"></script>
	<title>WEB</title>

</head>

<body>

<div class="container">
	<img class="media-object" src="img/header.jpg" width="700">
	<div class="header">
		<ul class="nav nav-pills pull-left">
			<li><a href="index.php">Esileht</a></li>
			<li><a href="about.php">Meist</a></li>
			<li class="active"><a href="#">Kontakt</a></li>
			
		</ul>
		<?php if (empty($_SESSION['login']) or empty($_SESSION['id'])){ ?>
		<ul class="nav nav-pills pull-right">
			<li><a href="login.php">Login</a></li>
			<li><a href="reg.php">Registreeru</a></li>
		</ul>
		<?php }else{ ?>
		<ul class="nav nav-pills pull-right">
			<li><a href="logout.php">Andmed</a></li>
			<li><a href="logout.php">Log out</a></li>
		</ul> <?php }?>
	</div>
	  <div class="panel panel-primary">
		<div class="panel-heading">Panel heading</div>
  		<div class="panel-body">
    		<p>...</p>
  		</div>
		</div>
		

      <div class="footer">
        <p>&copy; ITÜN 2014</p>
      </div>
	
	
</div>

</body>

</html>