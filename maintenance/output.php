<?php
session_start();

// 読み込み元ファイル
// $sourceFile = __DIR__ . '/../php_test/test.php';
$sourceFile = __DIR__ . '/file/input.txt';

// 出力先ファイル
$contactFile = __DIR__ . '/contact.dat';

// ファイル取得
$data = file_get_contents($sourceFile);
if ($data === false) {
    exit('source file not found');
}

// 改行
// $data .= PHP_EOL;

$data = $data . ',';

// 外部ファイルへ出力 
// file_put_contents($contactFile, $data);

// ファイルに追記
file_put_contents($contactFile, $data, FILE_APPEND);
file_put_contents($contactFile, $data, FILE_APPEND);

$allData = file($contactFile);

foreach($contactFile as $content){
    // 区切る
    $lines = explode(',',  $content);
    echo $content[0].= PHP_EOL;
    echo $content[1].= PHP_EOL;
    echo $content[2].= PHP_EOL;
}

echo 'output completed';


