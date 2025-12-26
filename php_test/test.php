<?php


/*  php起動コマンド

php -S localhost:8000
http://localhost:8080/


*/

// 先頭は英文字かアンダーバー
$datteo_str = 'だってお';

// 型チェック
var_dump($datteo_str);
$test_str = $datteo_str . 'www';
echo($test_str);

// exit;


// 日本語文字列の場合mb(マルチバイト)で見る必要がある
echo strlen($datteo_str);
echo mb_strlen($datteo_str);

$kusa_str = str_replace("だってお", "", $test_str);

echo($kusa_str);

//定数
const MAX = 10;
echo MAX;

//配列
$datteo_array = ['だ','っ','て','お'];

echo '<pre>';
echo(var_dump($datteo_array));

$datteo_www = array_push($datteo_array, $kusa_str);

print_r($datteo_www);

for ($i = 0; $i < count($datteo_array); $i++ ) {
    echo($datteo_array[$i] . 'w');
}

$i = 0;
while ($i < count($datteo_array)) {
    echo($datteo_array[$i] . 'w');
    $i++;
}

$array_2 = [
    $datteo_array,
    ['w','w','w']
];

echo '<pre>';
echo(var_dump($array_2));

// 連想配列
$oresama = [
    'sei' => '俺',
    'mei' => '様'
];

echo($oresama['sei'] . $oresama['mei'] . $datteo_str);

$ichininsyo = [
    'oresama' => [
        'sei' => '俺',
        'mei' => '様',
        'menhera' => 80
    ],
    'wagahai' => [
        'sei' => '吾',
        'mei' => '輩',
        'menhera' => 120
    ],
    'wagahai' => [
        'sei' => 'おい',
        'mei' => 'どん',
        'menhera' => 0
    ]
];

echo($ichininsyo['wagahai']['sei'] . $ichininsyo['wagahai']['mei']  . $datteo);

$who_are_you = function() use ($ichininsyo) {
    foreach ($ichininsyo as $val) {
        // $ichininsyo[1] のような 数値インデックスでは取れない
        $name = $val['sei'] . $val['mei'];
        if ($name === '俺様') {
            echo 'おれさま';
        } elseif ($name === '吾輩') {
            echo 'わがはい';
        } else {
            echo 'だれ<br>';
        }
    }
};

function are_you_oresama(array $ichininsyo){
    if ($ichininsyo['sei'] === '俺' && $ichininsyo['mei'] === '様') {
        return '俺様!!!';
    } else {
        return 'だれ!!!';
    }
}

echo(are_you_oresama($ichininsyo['oresama']));
echo(are_you_oresama($ichininsyo['wagahai']));
$who_are_you();

// 絶対パス
echo __DIR__;
echo __FILE__;

?>