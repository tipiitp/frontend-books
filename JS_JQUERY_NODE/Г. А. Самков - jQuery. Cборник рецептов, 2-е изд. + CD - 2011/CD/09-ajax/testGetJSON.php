<?php
header('Content-Type: text/html; charset=utf-8');
if($_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest') {
  print '[{"name":"John","phone":"555-66-77"},
          {"name":"Mary","phone":"566-77-77"},
          {"name":"Helen","phone":"577-88-77"},
          {"name":"Bob","phone":"588-66-99"}]';
}
?>