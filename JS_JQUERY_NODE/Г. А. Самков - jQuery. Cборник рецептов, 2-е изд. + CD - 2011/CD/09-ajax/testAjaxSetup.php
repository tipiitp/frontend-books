<?php
header('Content-Type: text/html; charset=utf-8');
if($_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest') {
  if($_POST['er'] == "yes") { for($i=0;$i<5;$i++) sleep(1); }
  if($_POST){
    print '<h3>Ответ сервера</h3>
           <p>В '.date("H:i:s d-m-Y", time()).' получены данные:<br />
           <strong>q = ' . $_POST['q'] . ', 
           er = ' . $_POST['er'] . '</strong></p>';
  }
}
?>