<?php

require_once __DIR__ . '/vendor/autoload.php';

use src\Controllers\Controller;
use Carbon\Carbon;

$app = new Controller;
$app->run();
echo '<br>';

echo Carbon::now();

exit;

echo 'hello'

?>