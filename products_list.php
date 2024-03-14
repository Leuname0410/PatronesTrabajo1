<?php

# Patron usado: Prototype

class Product {

    public $nameProduct;
    public $typeProduct;
    public $priceProduct;
    public $expireDateProduct;

    public function __construct($name, $type, $price, $expireDate) {

        $this->nameProduct = $name;
        $this->typeProduct = $type;
        $this->priceProduct = $price;
        $this->expireDateProduct = $expireDate;
    }

    public function clone() {

        return clone $this;
    }

}

class ProductList {

    public $productList;

    public function __construct() {

        $this->productList = array();
    }

    public function getProducts() {

        // Get all products from DB
        array_push($this->productList, new Product('Milk', 1, 3600, '2024-03-15'));
        array_push($this->productList, new Product('Bread', 2, 5000, '2024-04-15'));
        array_push($this->productList, new Product('Crakers',2, 2000, '2024-07-15'));
    }

    public function __clone() {

        $tempProductList = array();

        foreach ($this->productList as $product) {

            array_push($tempProductList, clone $product);
        }

        $this->productList = $tempProductList;
    }
}

$baseList = new ProductList();
$baseList->getProducts();

$dayDisscountProducts = clone $baseList;

foreach ($dayDisscountProducts->productList as $product) {

    if ($product->typeProduct == 2) {

        $product->priceProduct *= 0.9;
    }
}

echo 'Original Product list'.'<br/>';
var_dump($baseList);
echo '<br/>';


echo 'Cloned Product list to modify and use in production'.'<br/>';
var_dump($dayDisscountProducts);
echo '<br/>';