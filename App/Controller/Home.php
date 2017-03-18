<?php

namespace App\Controller;

use App\Mvc\Controller;
use App\Model\Product\ProductRepository;

class Home extends Controller
{
	private $products;

	public function __construct(ProductRepository $products)
	{
		parent::__construct();
		$this->products = $products;
	}

	public function index()
	{
		$this->view->set("products", $this->products->getProducts());
		$this->view->render("home");
	}
}