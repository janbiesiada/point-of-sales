<?php
require 'vendor/autoload.php';
$request = new \JBdev\PointOfSale\Request();
$inventory = \JBdev\PointOfSale\ContainerCreator::create(simplexml_load_file('data/products.xml'));
$terminal = new \JBdev\PointOfSale\Terminal($inventory);
$priceFormatter = new \JBdev\PointOfSale\PriceFormatter('$');
foreach($request->getProducts() as $code){
    $terminal->scan($code);
}
$view = new \JBdev\PointOfSale\View();
$body =  $view->generate('template/body.php',[
    'action' => $request->getAction() ,
    'cartTotal' => $terminal->getCartTotal(),
    'productCodes' => $request->getProductCodes(),
    'formattedPrice' => $priceFormatter->formatPrice($terminal->getCartTotal()),
    'errors' => $terminal->getErrors(),
]);
print $view->generate('template/home.php',['body' => $body]);


