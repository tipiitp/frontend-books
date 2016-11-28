<?php
header('Content-Type: text/html; charset=utf-8');
$time = date("H:i:s", time());
print '<h3>Ответ сервера</h3>Время: '.$time.'<br />';
var_dump($_POST);
foreach($_FILES as $file) {
  $n = $file['name'];
  $s = $file['size'];
  if (!$n) continue;
  print "File: $n ($s bytes)";
} 
?>