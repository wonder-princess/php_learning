<?php

session_start(); 

if (!isset($_SESSION['visited'])) {
    $_SESSION['visited'] = 1;
    $_SESSION['data'] = date('c');
    echo '初回';
} else {
    $_SESSION['visited']++;
    echo $_SESSION['visited'] . '回';
}

echo '<pre>';
var_dump($_SESSION);
echo '<pre>';

// setcookie('id', 'aaa', '/');

echo '<pre>';
var_dump($_COOKIE);
echo '<pre>';

?>
