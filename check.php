<?php
if (isset($_POST['submit'])){
if (isset($_POST['login'])) { $login = $_POST['login']; if ($login == '') { unset($login);} }
    if (isset($_POST['password'])) { $password=$_POST['password']; if ($password =='') { unset($password);} }
    
if (empty($login) or empty($password))
    {
    	$_message = "<p style='color:red'>Täitke kõik lahtrid.</p>";
    }
	else{
    //Töötleme sisestatud andmeid
    $login = stripslashes($login);
    $login = htmlspecialchars($login);
    $password = stripslashes($password);
    $password = htmlspecialchars($password);
    $login = trim($login);
    $password = trim($password);
	
    $dbcon = mysql_connect($dbhost, $dbusername, $dbpass); 
    mysql_select_db($dbname, $dbcon);
	if (!$dbcon)
	{
		$_message = "<p style='color:red'>Connection failured.</p>".mysql_error(); exit();

    } else {
    if (!mysql_select_db($dbname, $dbcon))
    {
    	$_message = "<p style='color:red'>Invalid database.</p>";
    }
	}
 //andmebaasist saame kasutaja andmeid
$result = mysql_query("SELECT * FROM users WHERE user_email='$login'", $dbcon);
    $myrow = mysql_fetch_array($result);
    if (empty($myrow["user_password"]))
    {
	$_message = "<p style='color:red'>Vabandame, sellise e-mailiga kasutajat ei leitud.</p>";
    }
    else {
    //kontrollime parooli
    if ($myrow["user_password"]==md5($password)) {
    //kõik ok
	$_SESSION['full_name']=$myrow["full_name"]; 
    $_SESSION['login']=$myrow["user_email"]; 
    $_SESSION['id']=$myrow["user_id"];
   header("Location:login.php"); 
    }
 else {
    //kui parool ei sobi
	$_message = "<p style='color:red'>Vabandame, e-mail või parool on vale.</p>";
    }
	}
}}
    ?>