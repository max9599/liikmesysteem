<?php
include("registration.php");
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
			<li><a href="contacts.php">Kontakt</a></li>
			
		</ul>
		<?php if (empty($_SESSION['login']) or empty($_SESSION['id'])){ ?>
		<ul class="nav nav-pills pull-right">
			<li><a href="login.php">Login</a></li>
			<li class="active"><a href="#">Registreeru</a></li>
		</ul>
		<?php }else{ ?>
		<ul class="nav nav-pills pull-right">
			<li><a href="my.php" style="color=green"><?php echo $_SESSION['full_name']; ?></a></li>
			<li><a href="logout.php">Log out</a></li>
		</ul> <?php }?>
	</div>
	  <div class="panel panel-primary">
		<div class="panel-heading">Registreerumine</div>
  		<div class="panel-body">
  			<?php if (empty($_SESSION['login']) or empty($_SESSION['id']))
    	{  echo $_message; ?>
    		<form method="POST">
    		<label>*E-Mail:</label><br/>
  			<input name="email" type="text" size="30" maxlength="40"><br/>
    		<label>*Täisnimi:</label><br/>
			<input name="fullname" type="text" size="30" maxlength="40"><br/>
    		<label>*Parool:</label><br/>
  			<input name="password" type="password" size="30" maxlength="15"><br/>
			<label>*Isikukood:</label><br/>
			<input name="isiccode" type="text" size="30" maxlength="40"><br/>
			<label>*Pangakonto nr.:</label><br/>
			<input name="banknumber" type="text" size="30" maxlength="50"><br/>
			<label>*Panga nimi:</label><br/>
			<input name="bankname" type="text" size="30" maxlength="50"><br/>
			<label>*Telefoni number:</label><br/>
			<input name="telnumber" type="text" size="30" maxlength="50"><br/>
			<label>*Eriala:</label><br/>
			<input name="profession" type="text" size="30" maxlength="50"><br/>
			<label>*Õppeaasta:</label><br/>
			<select size="1" name="studyyear">
				<option disabled>Vali</option>
				<option value="1">1</option>
				<option value="2">2</option>
				<option value="3">3</option>
			</select><br/>
			<label>*Huvialad:</label><br/>
  					<textarea style="width:400px;height:40px;" name="hobbies"></textarea><br/>
				<br/>
				
    		<button type="button" id="sel1" class="btn btn-danger" data-toggle="collapse" data-target="#demo">Vajuta, kui sa ei ole ITÜNi liige!</button>
     		<div id="demo" class="collapse" data-togglr>
					<label>*Kokkupuude ITÜNiga enne liitumist:</label><br/>
  					<textarea style="width:400px;height:75px;" name="ityn_kokkupuude"></textarea><br/>
    				<label>*Üldine arvamus ITÜNi kohta enne liitumist:</label><br/>
					<textarea style="width:400px;height:75px;" name="ityn_arvamus"></textarea><br/>
    				<label>*Mida loodad saada ITÜNist:</label><br/>
					<textarea style="width:400px;height:75px;" name="ityn_ootused"></textarea><br/>
			</div>
    
			<br/><br/>
  			<input class="btn btn-success" name="submit" type="submit" value="Registreeru"><br/><br/>
			</form>
			<?php }else{ ?>
			<p>Te olete juba registreerunud, <?php echo $_SESSION['full_name']; ?> !</p>
			<?php } ?>
  		</div>
		</div>
		

      <div class="footer">
        <p>&copy; ITÜN 2014</p>
      </div>
	
	
</div>

</body>

</html>