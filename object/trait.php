<?php

trait ProductTrait1{
    public function echoTrait1(){
        echo 'trait1';
    }
    public function echoTraitOverride(){
    echo 'trait';
    }
}

trait ProductTrait2{
    public function echoTrait2(){
        echo 'trait2';
    }
}

class Product{
    use ProductTrait1;
    use ProductTrait2;

    public function echoTraitOverride(){
    echo 'override';
    }

}

$product = new Product();
$product->echoTrait1();
echo '<br>';

$product->echoTrait2();
echo '<br>';

$product->echoTraitOverride();
echo '<br>';

?>