<?php

namespace App\Model\Shopping;

class CartItem
{
	private $product;
	private $quantity;

	public function __construct($product, $quantity)
	{
		$this->product = $product;
		$this->quantity = $quantity;
	}

	public function getProduct()
	{
		return $this->product;
	}

	public function getQuantity()
	{
		return $this->quantity;
	}

	public function setQuantity($qtd)
	{
		$this->qunatity = $qtd;
	}

	public function getTotal(){
		return $this->product->getPrice() * $this->quantity;
	}
}