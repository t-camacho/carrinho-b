<?php

namespace App\Controller;

use App\Model\Shopping\Cart as ICart;
use App\Model\Product\ProductRepository;
use App\Model\Shopping\CartItem;
use App\Mvc\Controller;

class Cart extends Controller
{
	private $products;
	private $cart;

	public function __construct(ProductRepository $products, ICart $cart)
	{
		parent::__construct();
		$this->products = $products;
		$this->cart = $cart;
	}

	public function add()
	{
		if(isset($_POST['c_id']))
		{
			$product = $this->products->getProduct($_POST['c_id']);
			$item = new CartItem($product, 1);
			$this->cart->add($item);
		}
		header("Location: index.php?page=cart");
	}

	public function alterar()
	{	
		$id = $_POST['id'];
		$qtd = $_POST['qtd'];
		if(isset($_POST['id']) and isset($_POST['qtd']) and preg_match("/[0-9]/",$_POST['qtd']))
		{
			$id = $_POST['id'];
			$qtd = $_POST['qtd'];
			$product = $this->products->getProduct($id);
			$item = new CartItem($product, $qtd);
			$this->cart->update($item);
			header("Location: index.php?page=cart&action=index");
		}
	}

	public function deletar()
	{
		if(isset($_POST['id']))
		{
			$this->cart->delete($_POST['id']);
		}
		header("Location: index.php?page=cart&action=index");
	}

	public function index()
	{
		$this->view->set("itemsTotal", $this->cart->getTotal());
		$this->view->set("itemsCart", $this->cart->getCartItems());
		$this->view->render("cart");
	}
}