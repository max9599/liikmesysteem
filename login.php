<?php
include("config.php");

 session_start();
 header('Content-Type: text/html; charset=utf-8');
 include("check.php");
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
			<li><a href="contacts.php">Kontakt</a></li>
			
		</ul>
		<?php if (empty($_SESSION['login']) or empty($_SESSION['id'])){ ?>
		<ul class="nav nav-pills pull-right">
			<li class="active"><a href="login.php">Login</a></li>
			<li><a href="reg.php">Registreeru</a></li>
		</ul>
		<?php }else{ ?>
		<ul class="nav nav-pills pull-right">
			<li><a href="my.php" style="color=green"><?php echo $_SESSION['full_name']; ?></a></li>
			<li><a href="logout.php">Log out</a></li>
		</ul> <?php }?>
		
		
		
	</div>
	  <div class="panel panel-primary">
		<div class="panel-heading">Login</div>
  		<div class="panel-body">
  		<?php
		// Kui pole sisse logitud
    	if (empty($_SESSION['login']) or empty($_SESSION['id']))
    	{  echo $_message; ?>
  			<form method="POST">
    		<label>E-Mail:</label><br/>
  			<input name="login" type="text" size="15" maxlength="30"><br/>
    		<label>Parool:</label><br/>
  			<input name="password" type="password" size="15" maxlength="15"><br/><br/>

  			<input class="btn btn-success" name="submit" type="submit" value="Sisene"><br/><br/>
			</form>
			<a href="restore.php">Unustasid parooli?</a> 
		<?php
    	}
    	else  //Muidu. 
    	{
		 	$login=$_SESSION['login'];
		 
     	//Connect db
    		$dbcon = mysql_connect($dbhost, $dbusername, $dbpass); 
    		mysql_select_db($dbname, $dbcon);
			if (!$dbcon)
			{
    			echo "<p>Connection failured!</p>".mysql_error(); exit();
    		} 
			else {
    			if (!mysql_select_db($dbname, $dbcon))
    			{
    				echo("<p>No such database!</p>");
    			}
			}
		//Query
			$sqlCart = mysql_query("SELECT user_email FROM users WHERE user_email = '$login'", $dbcon);
			
 			while($row = mysql_fetch_array($sqlCart)) 
 			{
				$name = $row["user_email"];
  			}
  			mysql_close($dbcon);
    
		// Kui logitud
    		echo "<p style='color:green'>";
			echo "Tere tulemast, ", $_SESSION['full_name'],"!</p>";
    	}
    	?> 
  		</div>
		</div>
		

      <div class="footer">
        <p>&copy; ITÜN 2014</p>
      </div>
	
	
</div>

</body>

</html>