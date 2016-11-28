<?php
header('Content-Type: text/html; charset=utf-8');
if($_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest') {
  if($_POST) {
    print 'Имя: ' . $_POST['name'] . ', возраст: ' . $_POST['age'] . ', время: ' . date('H:i:s', time());
  }
}
?>