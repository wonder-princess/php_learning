<?php

const DB_HOST = 'mysql:dbname=mysql;localhost=127.0.0.1;charset=utf8';
const DB_USER = 'root';
const DB_PASSWORD = 'mysql';

try{
    $pdo = new PDO(DB_HOST, DB_USER, DB_PASSWORD, [
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, // 連想配列
        PDO::ATTR_ERRMODE=> PDO::ERRMODE_EXCEPTION, //例外
        PDO::ATTR_EMULATE_PREPARES => false, // SQLインジェクション対策
    ]);
    echo 'connection';
}
catch(PDOException $e){
echo $e->getMessage() . PHP_EOL;
exit;
}

?>