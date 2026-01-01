<?php

session_start();

?>

<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>form</title>
  </head>
<body>

<?php
echo 'セッション破棄';
$_SESSION = [];

if(isset($_COOKIE['PHPSESSID'])){
    setcookie('PHPSESSID', '', time() - 1800, '/');
}

echo '<pre>';
var_dump($_SESSION);
echo '<pre>';

echo '<pre>';
var_dump($_COOKIE);
echo '<pre>';

?>

</body>

