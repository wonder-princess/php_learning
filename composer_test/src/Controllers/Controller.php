<?php

namespace src\Controllers;

use src\Models\Model;

class Controller{
    public function run() {
        $model = new Model;
        echo $model->getFuck();
    }
}
?>