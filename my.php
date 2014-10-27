<?php
include('functions.php');
session_start();
header('Content-Type: text/html; charset=utf-8');
$login_sess = $_SESSION['login'];
?>
<?php
if (isset($_POST['sendChange'])){
$full_name = CheckUserData($_POST['full_name']);
$isic_number = CheckUserNumber(CheckUserData($_POST['isic_number']));
$bank_number = CheckUserNumber(CheckUserData($_POST['bank_number']));
$bank = CheckUserData($_POST['bank']);
$telephone_number = CheckUserNumber(CheckUserData($_POST['telephone_number']));
$profession = CheckUserData($_POST['profession']);
$study_year = CheckUserNumber(CheckUserData($_POST['study_year']));
$hobbies = CheckUserData($_POST['hobbies']);
if (
    $full_name != "" &&
    $isic_number != "" &&
    $bank_number != "" &&
    $bank != "" &&
    $profession != "" &&
    $telephone_number != "" &&
    $study_year != "" &&
    $hobbies != ""
)
{
    $conn = ConnectDB();
    $result = mysql_query("UPDATE `users` SET `full_name` = '$full_name', `isic_number` = '$isic_number', `bank_number` = '$bank_number', `bank` = '$bank', `profession` = '$profession', `telephone_number` = '$telephone_number', `study_year` = '$study_year', `hobbies` = '$hobbies' WHERE user_email = '$login_sess'",$conn);
    if (!$result) {
        $_message  = 'Wrong query: ' . mysql_error() . "\n";
        die($_message);
    }
    else
    {$_message = "<p style='color:green'>Andmed on muudetud.</p>";
        $_SESSION['full_name']=$full_name; }
} else {$_message = "<p style='color:green'>Muutmine on ebaõnnestunud. Kontrollige kõik väljad</p>";}

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
			<li class="active"><a href="my.php" style="color=green"><?php echo $_SESSION['full_name']; ?></a></li>
			<li><a href="logout.php">Log out</a></li>
		</ul> <?php }?>
	</div>
	  <div class="panel panel-primary">
		<div class="panel-heading"><?php echo $_SESSION['full_name']; ?></div>
  		<div class="panel-body">
  			<?php echo $_message;?>
  			<form id="myform" method="POST">
    		<table id="datatable" class="table table-bordered">

  <tbody>
    <tr>
      <td>Nimi</td>
      <td id="fadde"><?php echo GetSetData('full_name',FALSE,"",$login_sess); ?></td>
    </tr>
	<tr>
      <td>E-Mail</td>
      <td id="fadde"><?php echo GetSetData('user_email',FALSE,"",$login_sess); ?></td>
    </tr>
	<tr>
      <td>Liikmestaatus</td>
      <td id="fadde"><?php echo GetMemberStatus($login_sess); ?></td>
    </tr>
	<tr>
      <td>Telefoni number</td>
      <td id="fadde"><?php echo GetSetData('telephone_number',FALSE,"",$login_sess); ?></td>
    </tr>
	<tr>
      <td>Pangakonto.</td>
      <td id="fadde"><?php echo GetSetData('bank_number',FALSE,"",$login_sess); ?></td>
    </tr>
	<tr>
      <td>Pank.</td>
      <td id="fadde"><?php echo GetSetData('bank',FALSE,"",$login_sess); ?></td>
    </tr>
	<tr>
      <td>Isikukood</td>
      <td id="fadde"><?php echo GetSetData('isic_number',FALSE,"",$login_sess); ?></td>
    </tr>
	<tr>
      <td>Eriala</td>
      <td id="fadde"><?php echo GetSetData('profession',FALSE,"",$login_sess); ?></td>
    </tr>
	<tr>
      <td>Kursus</td>
      <td id="fadde"><?php echo GetSetData('study_year',FALSE,"",$login_sess); ?></td>
    </tr>
	<tr>
      <td>ITÜNi liige alates</td>
      <td id="fadde"><?php echo GetSetData('date_accepted',FALSE,"",$login_sess); ?></td>
    </tr>
	<tr>
      <td>Sünnipäev</td>
      <td id="fadde"><?php echo IsicCodeToBD($login_sess); ?></td>
    </tr>
	<tr>
      <td>Vilistlane alates</td>
      <td id="fadde"><?php echo GetSetData('date_ended_university',FALSE,"",$login_sess); ?></td>
    </tr>
	<tr>
      <td>Täisliige alates</td>
      <td id="fadde"><?php echo GetSetData('date_got_full_member',FALSE,"",$login_sess); ?></td>
    </tr>
	<tr>
      <td>ITÜNist lahkunud alates</td>
      <td id="fadde"><?php echo GetSetData('date_left',FALSE,"",$login_sess); ?></td>
    </tr>
	<tr>
      <td>Käesolevad projektid</td>
      <td id="fadde"><?php echo GetSetData('projects_now',FALSE,"",$login_sess); ?></td>
    </tr>
	<tr>
      <td>Lõpetatud projektid</td>
      <td id="fadde"><?php echo GetSetData('projects_past',FALSE,"",$login_sess); ?></td>
    </tr>
	<tr>
      <td>Huvialad</td>
      <td id="fadde"><?php echo GetSetData('hobbies',FALSE,"",$login_sess); ?></td>
    </tr>
	<tr>
      <td>Muu info</td>
      <td id="fadde"><?php echo GetSetData('information',FALSE,"",$login_sess); ?></td>
    </tr>
  </tbody>
  
</table>
<input class="btn btn-success" id="changedata" onclick="changeMe()" value="Muutmine"><br/>
</form>
  		</div>
		</div>
		

      <div class="footer">
        <p>&copy; ITÜN 2014</p>
      </div>
	
	
</div>
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script language="javascript">
	function changeMe()
	{
		var iarray = [0,3,4,5,6,7,8,16]
		var inames = ['full_name','telephone_number','bank_number','bank','isic_number','profession','study_year','hobbies']
		for(i in iarray)
		{
			var table = document.getElementById('datatable')
			var value = table.rows[iarray[i]].cells[1].innerHTML
			var input = "<input name='"+inames[i]+"' value='"+value+"' type='text' size='40' maxlength='5000'>"
		
			table.rows[iarray[i]].cells[1].innerHTML = input
			i++;
		}

        $('#changedata').attr("onclick","changeData()");

		$('#changedata').attr("value","Kinnitan andmete muutmist.");
		$('#changedata').attr("size","40");
	}
	function changeData()
	{
		if(confirm("Oled kindel?"))
		{
            $('#changedata').attr("name","sendChange");
            $('#myform').submit();
		}
	}
	
</script>
</body>
</html>