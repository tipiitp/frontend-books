<?php
// Подключение и выбор БД
$db = mysql_connect('localhost', 'user', 'password') or die("Ошибка подключения: " . mysql_error());
mysql_select_db('database') or die("Ошибка при подключении к БД");

# ВНИМАНИЕ!!!
# Данный код не включает проверки данных
# Обязательно проверяйте все данные
# поступающие от клиента

// Номер запришиваемой страницы
$page = $_GET['page'];

// Количество запрашиваемых записей
$limit = $_GET['rows'];

// Поле, по которому
// следует производить сортировку
$sidx = $_GET['sidx'];

// Направление сортировки
$sord = $_GET['sord'];

// Если не указано поле сортировки,
// то производить сортировку по первому полю
if(!$sidx) $sidx =1;

// Выполним запрос, который
// вернет суммарное кол-во записей в таблице
$result = mysql_query("SELECT COUNT(*) AS count FROM cities");
$row = mysql_fetch_array($result,MYSQL_ASSOC);

// Теперь эта переменная хранит кол-во записей в таблице
$count = $row['count'];

// Рассчитаем сколько всего страниц займут данные в БД
if( $count > 0 && $limit > 0) {
    $total_pages = ceil($count/$limit);
} else {
    $total_pages = 0;
}

// Если по каким-то причинам клиент запросил
if ($page > $total_pages) $page = $total_pages;

// Рассчитываем стартовое значение для LIMIT
$start = $limit * $page - $limit;

// Зашита от отрицательного значения
if($start < 0) $start = 0;

// Запрос выборки данных
$query = "SELECT * FROM cities ORDER BY ".$sidx." ".$sord." LIMIT ".$start.", ".$limit;
$result = mysql_query($query);

// Создаем объект response
$response->page = $page;
$response->total = $total_pages;
$response->records = $count;
$i=0;
while($row = mysql_fetch_assoc($result)) {

	$response->rows[$i]['id']=$row['id'];
	$response->rows[$i]['cell']=array($row['id'],$row['country_code'],$row['region_code'],$row['city'],$row['latitude'],$row['longitude']);
	$i++;
}

// Перед выводом не забывайте выставить header
// с указанием типа контента и кодировки
header("Content-type: application/json;charset=utf-8");
echo json_encode($response);
?>