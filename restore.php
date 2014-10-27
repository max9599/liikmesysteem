<?php
include("functions.php");
 session_start();
 header('Content-Type: text/html; charset=utf-8');

				if (isset($_POST['passrestore'])){
                    $user_email = CheckUserData($_POST['email']);
                    if(FindEmail($user_email) == 2) {

                        $new_password = random_password();
                        GetSetData('user_password', true, md5($new_password), $user_email);
                        $message = "Teie uus parool: " . $new_password;

                        if (mail($user_email, "Password restore", $message)) {
                            $_message = "Teie uus parool on saadetud meilile.";
                        } else {
                            $_message = "Parooli saatmisel tekis viga, pöörduge juhatuse poole.";
                        }
                    } else { $_message = "Sellise e-mailiga kasutajat ei leitud.";}
				}
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
			<li><a href="#">Meist</a></li>
			<li><a href="contacts.php">Kontakt</a></li>
			
		</ul>
		<?php if (empty($_SESSION['login']) or empty($_SESSION['id'])){ ?>
		<ul class="nav nav-pills pull-right">
			<li><a href="login.php">Login</a></li>
			<li><a href="reg.php">Registreeru</a></li>
		</ul>
		<?php }else{ ?>
		<ul class="nav nav-pills pull-right">
			<li><a href="my.php" style="color=green"><?php echo $_SESSION['full_name']; ?></a></li>
			<li><a href="logout.php">Log out</a></li>
		</ul> <?php }?>
	</div>
	  <div class="panel panel-primary">
		<div class="panel-heading">Password restore</div>
  		<div class="panel-body"><p style="color:green">
    		<?php if (empty($_SESSION['login']) or empty($_SESSION['id']))
    	{  echo $_message; ?></p>
  			<form method="POST">
    		<label>E-Mail:</label><br/>
  			<input name="email" type="text" size="20" maxlength="40"><br/><br/>
			<input class="btn btn-success" name="passrestore" type="submit" value="Saada uus parool"><br/><br/>
			</form>
			<?php } ?>
  		</div>
		</div>
		

      <div class="footer">
        <p>&copy; ITUN 2014</p>
      </div>
	
	
</div>

</body>

</html>