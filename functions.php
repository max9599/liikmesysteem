<?php
	
  function GetMemberStatus($email)
  {
  	$conn = ConnectDB();
	$result = mysql_fetch_array(mysql_query("select member_status from users where user_email = '$email' OR user_id = '$email'",$conn));
  	//Liikmestaatused:
	//**Registreerinud,aga kinnitamata = 0
	//*NOORLIIGE = 1
	//*TÄISLIIGE = 2
	//*JUHATUS = 3
	//*VILISTLANE = 4
	//*LAHKUNUD = 5
      // Juhatus, Täisliige, Noorliige, Vilistlane, lahkunud 3,2,1,4,5
	if($result["member_status"] == "0")
	{$output = "Kinnitamata";}
	elseif($result["member_status"] == "1")
	{$output = "Noorliige";}
	elseif($result["member_status"] == "2")
	{$output = "Täisliige";}
	elseif($result["member_status"] == "3")
	{$output = "Juhatus";}
	elseif($result["member_status"] == "4")
	{$output = "Vilistlane";}
	elseif($result["member_status"] == "5")
	{$output = "Lahkunud";}
	echo $output;
  }
  function GetSetData($data,$set,$setdata,$login)
  {
  	
	if(!$set)
	{
		$conn = ConnectDB();
		$result = mysql_query("SELECT * FROM users WHERE user_email='$login' OR user_id='$login'", $conn);
		$myrow = mysql_fetch_array($result);
		$output = $myrow["$data"];
		return $output;
	}
	elseif($set)
	{
		$conn = ConnectDB();
		mysql_query("UPDATE users set $data = '$setdata' WHERE user_email='$login'", $conn);
		$result = mysql_query("SELECT * FROM users WHERE user_email='$login'", $conn);
		$myrow = mysql_fetch_array($result);
	}
  }
  function random_password() {
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    $password = substr( str_shuffle( $chars ), 0, 8 );
    return $password;
	}

  function IsicCodeToBD($email)
  {
  	$conn = ConnectDB();
	$isicc = mysql_fetch_array(mysql_query("select isic_number from users where user_email = '$email'",$conn));
	$isicc = join("",$isicc);
  	//xxxxxxxxxxx
	// index 1;2 - year
	//index 3;4 - month
	//index 5;6 - day
	$theYear = substr($isicc,1,2);
	$theMonth = substr($isicc,3,2);
	$theDay = substr($isicc,5,2);
	$output = $theDay.".".$theMonth.".".$theYear;
	return $output;
  }
  
  //Подключение к базе данных
  function ConnectDB()
  {
  	include("config.php");
    //подключаемся к базе данных
    $dbcon = mysql_connect($dbhost, $dbusername, $dbpass);
	$result = mysql_select_db($dbname,$dbcon);
 
    //если произошла ошибка то выводим сообщение
    if (!$result)
      throw new Exception('Не удалось подключиться к базе данных.');
    //если соединение прошло удачно, то возвращаем результат - соединение
    else
      return $dbcon;
  }
 
  //проверка на вредоносные символы
  function CheckUserData($var)
  {
    //обрабатываем вредоносные символы
    $res = htmlspecialchars($var, ENT_QUOTES);
 
    //при возвращении результата обрабатываем строку слешами
    return addslashes($res);
 
    //описание работы htmlspecialchars и addslashes вы можете посмотреть в любом справочнике php
  }
 
  //этот метод необходим для вырезания из текстовой строки всего кроме чисел
  //например после обработки строки "43rtrt56" останется "4356"
  //зачем это нужно увидите дальше
  function CheckUserNumber($number)
  {
    // составляем шаблон
    $patt = '[[:alpha:]]|[[:punct:]]|[[:cntrl:]]|[[:space:]]';
    // или вот так $patt = '[^0-9]';
    //меняем на '', т.е. на пустое место
    $replace = '';
    //ereg_replace - функция php для работы с регулярными выражениями
    return @ ereg_replace($patt, $replace, $number);
    // с версии php 5.3 используйте функцию preg_replace вместо ereg_replace
  }
 
 
  //Поиск email'а в базе данных
  function FindEmail($email)
  {
    //соединяемся с бд
    $conn = ConnectDB();
 
   //осуществляем поиск $email в базе данных
   $result = mysql_fetch_array(mysql_query("select user_id from users where user_email = '$email'",$conn));
   //получаем количество результатов поиска
   $colich_results = count($result);
 
   //возвращаем количество результатов поиска
   return $colich_results;
  }
?>