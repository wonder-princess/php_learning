<?php

function insertContact($request){

    require 'db_connection.php';
    // $params = [
    //     'id' => null,
    //     'email' => 'https://example.com',
    //     'url' => 'test@example.com',
    //     'os' => '2', 
    //     'browser' => 'safari',
    //     'contact' => 'お問い合わせ内容',
    //     'create_date' => null
    // ];

    $params = [
        'id' => null,
        'email' => $request['email'],
        'url' => $request['url'],
        'os' => $request['os'], 
        'browser' => $request['browser'],
        'contact' => $request['contact'],
        'create_date' => null
    ];

    $count = 0;
    $columns = '';
    $values = '';

    // array_keys -> keyの値を連想配列のkeyの値を取得
    foreach (array_keys($params) as $key){
        if ($count++>0){
            $columns .= ',';
            $values .= ',';
        }
        $columns .= $key;
        $values .= ':'.$key;
    }

    $sql = 'insert into contact (' . $columns . ') values ('. $values . ');';
    var_dump($sql);

    try{
        // ユーザー入力あり
        $stmt = $pdo->prepare($sql);
        $stmt->execute($params);

    }catch (PDOException $e){
        echo '<pre>' . htmlspecialchars($e->getMessage(), ENT_QUOTES, 'UTF-8') . '</pre>';
    }

}


?>