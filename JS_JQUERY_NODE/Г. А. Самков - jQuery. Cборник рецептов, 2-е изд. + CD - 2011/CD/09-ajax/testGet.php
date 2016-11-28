<?php
header('Content-Type: text/html; charset=utf-8');
if($_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest') {
  if($_GET) {
    print 'Имя: ' . $_GET['name'] . ', возраст: ' . $_GET['age'] . ', время: ' . date('H:i:s', time());
  }
}
?>