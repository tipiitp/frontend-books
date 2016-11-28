<?php
header('Content-Type: text/html; charset=utf-8');
if($_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest') {
  for($i=0;$i<2;$i++){
    sleep(1);
  }
  if($_POST){
    print '<h3>Ответ сервера</h3><p>Время: '.date("H:i:s", time()).'</p>';
  }
}
?>