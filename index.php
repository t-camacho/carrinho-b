<?php
session_start();
include "vendor/autoload.php";

define("DIR", __DIR__);
define("DS", DIRECTORY_SEPARATOR);

$page = isset($_GET["page"])?$_GET["page"]:"";
$action = isset($_GET["action"])?$_GET["action"]:"index";
//BANCO DE DADOS
$db = new PDO("mysql:host=localhost;dbname=shop", "root", "");
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$product = new App\Model\Product\ProductRepositoryPDO($db);

if($page == "cart"){
	$cartSession = new App\Model\Shopping\CartSession();
	$cart = new App\Controller\Cart($product, $cartSession);
	call_user_func_array(array($cart, $action), array());
}else{
	$home = new App\Controller\Home($product);
	call_user_func_array(array($home, $action), array());
}