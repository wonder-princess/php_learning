<?php 

require 'db_connection.php';

// ユーザー入力なし
// $sqlFile = __DIR__ . '/sql/selectAll.sql';
// $sql = file_get_contents($sqlFile);

// if ($sql === false) {
//     throw new RuntimeException('SQL file not found');
// }

// // SQL実行
// $stmt = $pdo->query($sql);
// $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

// echo '<pre>';
// var_dump($result);
// echo '<pre>';

try{
    // ユーザー入力あり
    $sqlFile = __DIR__ . '/sql/prepare.sql'; //名前付きプレースフォルダ
    $sql = file_get_contents($sqlFile);

    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':id', 2, PDO::PARAM_INT);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo '<pre>';
    var_dump($result);
    echo '<pre>';

}catch (PDOException $e){
    echo '<pre>' . htmlspecialchars($e->getMessage(), ENT_QUOTES, 'UTF-8') . '</pre>';
}

?>