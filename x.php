<?php
include("functions.php");
echo "ok";
	if(isset($_POST['submit']))
	{
		$full_name = CheckUserData($_POST['full_name']);
		$isic_number = CheckUserNumber(CheckUserData($_POST['isic_number']));
		$bank_number = CheckUserNumber(CheckUserData($_POST['bank_number']));
		$bank = CheckUserData($_POST['bank']);
		$telephone_number = CheckUserNumber(CheckUserData($_POST['telephone_number']));
		$profession = CheckUserData($_POST['profession']);
		$study_year = CheckUserNumber(CheckUserData($_POST['study_year']));
		$hobbies = CheckUserData($_POST['hobbies']);
		echo $hobbies;
		echo "sdas";
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
				{$_message = "<p style='color:green'>Andmed on muudetud.</p>";}
	} else {$_message = "<p style='color:green'>Muutmine on ebaõnnestunud.</p>";}
	}
?>