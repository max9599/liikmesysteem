<?php
include('functions.php');
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

<div class="modal" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h1 id="myModalLabel"><?php echo GetSetData('full_name',FALSE,"",$_GET['id']); ?><br/></h1>
        <h4><?php GetMemberStatus($_GET['id']) ?></h4>
    </div>
    <div class="modal-body">
        <table class="table table-bordered">

            <tbody>
            <tr>
                <td id="userTable"><h3>Nimi</h3></td>
                <td id="userTableValues"><?php echo GetSetData('full_name',FALSE,"",$_GET['id']); ?></td>
            </tr>
            <tr>
                <td id="userTable"><h3>E-Mail</h3></td>
                <td id="userTableValues"><?php echo GetSetData('user_email',FALSE,"",$_GET['id']); ?></td>
            </tr>
            <tr>
                <td id="userTable"><h3>Tel. number</h3></td>
                <td id="userTableValues"><?php echo GetSetData('telephone_number',FALSE,"",$_GET['id']); ?></td>
            </tr>
            <tr>
                <td id="userTable"><h3>Eriala</h3></td>
                <td id="userTableValues"><?php echo GetSetData('profession',FALSE,"",$_GET['id']); ?></td>
            </tr>
            <tr>
                <td id="userTable"><h3>Käesolevad projektid</h3></td>
                <td id="userTableValues"><?php echo GetSetData('projects_now',FALSE,"",$_GET['id']); ?></td>
            </tr>
            <tr>
                <td id="userTable"><h3>Lõpetatud projektid</h3></td>
                <td id="userTableValues"><?php echo GetSetData('projects_past',FALSE,"",$_GET['id']); ?></td>
            </tr>
            <tr>
                <td id="userTable"><h3>Muu info</h3></td>
                <td id="userTableValues"><?php echo GetSetData('information',FALSE,"",$_GET['id']); ?></td>
            </tr>
            </tbody>
        </table>

    </div>
    <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
    </div>
</div>

<div class="container">
	<img class="media-object" src="img/header.jpg" width="700">
	<div class="header">
		<ul class="nav nav-pills pull-left">
			<li class="active"><a href="#">Esileht</a></li>
			<li><a href="about.php">Meist</a></li>
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
		<div class="panel-heading">ITÜNi liikmed</div>
  		<div class="panel-body">
    		<?php
				$conn = ConnectDB();
				$result = mysql_query("SELECT user_id,user_email,full_name,member_status FROM users ORDER BY FIELD(member_status,3,2,1,4,5)", $conn);
				
				

				echo "<table id='liikmed' class='table table-bordered'>";
				echo "<tr><th>Täisnimi</th><th>Liikmestaatus</th></tr>";
                $numb = 0;
				while($myrow = mysql_fetch_array($result))
				{
					if($myrow[member_status] != "0" and $myrow[member_status] != "")
					{
						echo "<tr><td><a id = 'user' href='?id=".$myrow[user_id]."' data-toggle='modal' role='button' class='btn'>",$myrow[full_name],"</a></td><td>",GetMemberStatus($myrow[user_email]),"</td></tr>";
					}
                    elseif($myrow[member_status] != "4" or $myrow[member_status] != "5")
                    {
                        //vilistlanelahkunudmassiiv
                    }
				}
                setcookie("Vilistlasedlahkunud", serialize($vilistlane), time()+3600);
				echo "</table>";
			?>
  		</div>
		</div>
    <a id = 'linkk' data-target = '#myModal' data-toggle='modal'></a>
    <?php
    if(isset($_GET['id']))
    {
        echo "<script>document.getElementById('linkk').click();</script>";
    }?>

      <div class="footer">
        <p>&copy; ITÜN 2014</p>
      </div>
	
	
</div>
</body>

</html>