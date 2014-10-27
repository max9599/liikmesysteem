<?php
include("functions.php");
if (isset($_POST['submit'])){
	$date_get = date("Y-m-d H:i");
	
	$user_email = CheckUserData($_POST['email']);
	$full_name = CheckUserData($_POST['fullname']);
	$password = md5(CheckUserData($_POST['password']));
	$isic_number = CheckUserNumber(CheckUserData($_POST['isiccode']));
	$bank_number = CheckUserNumber(CheckUserData($_POST['banknumber']));
	$bank = CheckUserData($_POST['bankname']);
	$telephone_number = CheckUserNumber(CheckUserData($_POST['telnumber']));
	$profession = CheckUserData($_POST['profession']);
	$study_year = CheckUserNumber(CheckUserData($_POST['studyyear']));
	$hobbies = CheckUserData($_POST['hobbies']);
	
	$ityn_kokkupuude = CheckUserData($_POST['ityn_kokkupuude']);
	$ityn_arvamus = CheckUserData($_POST['ityn_arvamus']);
	$ityn_ootused = CheckUserData($_POST['ityn_ootused']);
	
	if (
		$user_email != "" &&
		$full_name != "" &&
		$password != "" &&
		$isic_number != "" &&
		$bank_number != "" &&
		$bank != "" &&
		$profession != "" &&
		$telephone_number != "" &&
		$study_year != "" &&
		$hobbies != ""
	)
	{
		if(strlen($_POST['password']) > 4)
		{
			if(FindEmail($user_email) == 1)
			{
				$conn = ConnectDB();
				$result = mysql_query("INSERT INTO `users` (`user_email`, `full_name`, `user_password`, `isic_number`, `bank_number`, `bank`, `profession`, `telephone_number`, `study_year`, `hobbies`, `ityn_kokkupuude`, `ityn_arvamus`, `ityn_ootused`, `date_created`) VALUES ('$user_email', '$full_name', '$password', '$isic_number', '$bank_number', '$bank', '$profession', '$telephone_number', '$study_year', '$hobbies', '$ityn_kokkupuude', '$ityn_arvamus', '$ityn_ootused', '$date_get')",$conn);
				if (!$result) {
    				$_message  = 'Wrong query: ' . mysql_error() . "\n";
    				die($_message);
					}
				else
				{$_message = "<p style='color:green'>Registreerumine on õnnestunud.</p>";}
			}else
				$_message = "<p style='color:red'>Sellise e-mailiga kasutaja on juba registreeritud.</p>";
		}else
			$_message = "<p style='color:red'>Paroolis peab olema vähemalt 5 tähemärki.</p>";
	} else
		$_message = "<p style='color:red'>Kõik vajalikud väljad pole täidetud.</p>";
}
 ?>