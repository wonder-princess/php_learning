<?php 

interface ProductInterface{
    public function echoInterface();
}

abstract class ProductAbstract{
    // 親クラスのメソッド
    public function echProduct(){
        echo 'abstract';
    }

    abstract public function getProduct();
}

class BaseProduct{
    // 親クラスのメソッド
    public function echoBaseProduct(){
        echo 'base';
    }

    // オーバーライドされる想定のメソッド（親）
    public function echoOverrideProduct(){
        echo 'base';
    }
}

class Product extends BaseProduct implements ProductInterface{

    // 商品データ（文字列として扱う）
    private $product = '';

    // 初回に起動するメソッド
    function __construct($product){
        $this->product = $product;
    }

    // 商品を取得
    public function getProduct(){
        echo $this->product;
    }

    // 商品を追加
    public function addProduct($item){
        $this->product .= $item;
    }

    // staticメソッド
    public static function getStaticProduct($str){
        echo $str;
    }

    // 親クラスのメソッドをオーバーライド
    public function echoOverrideProduct(){
        echo 'override';
    }

    public function echoInterface(){
        echo 'Interface';
    }
}

$instance = new Product('test');

$instance->getProduct();
echo '<br>';

$instance->addProduct('add');
$instance->getProduct();
echo '<br>';

// static
Product::getStaticProduct('static');
echo '<br>';

$instance->echoBaseProduct();
echo '<br>';

$instance->echoOverrideProduct();
echo '<br>';

$instance->echoInterface();
echo '<br>';
?>
