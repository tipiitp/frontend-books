<?php
// Подключение и выбор БД
$db = mysql_connect('localhost', 'user', 'password') or die("Ошибка подключения: " . mysql_error());
mysql_select_db('database') or die("Ошибка при подключении к БД");;

# ВНИМАНИЕ!!!
# Данный код не включает проверки данных
# Обязательно проверяйте все данные
# поступающие от клиента

$oper = $_POST['oper'];
$id = $_POST['id'];
$cc = $_POST['country_code'];
$rc = $_POST['region_code'];
$city = $_POST['city'];
$lat = $_POST['latitude'];
$lng = $_POST['longitude'];

switch ($oper) {
	case 'edit':
	$query = "UPDATE cities SET country_code = '$cc',region_code = '$rc',city = '$city',latitude = '$lat',longitude = '$lng' WHERE id = '$id'";
	break;
	case 'del':
	$query = "DELETE FROM cities WHERE id = '$id'";
	break;
	case 'add':
	$query = "INSERT INTO cities VALUES ('','$cc','$rc','$city','$lat','$lng','')";
	break;
}

mysql_query($query) or die("Ошибка операции!");
?>