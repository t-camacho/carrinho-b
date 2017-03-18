<?php

namespace App\Model\Shopping;

class CartSession implements Cart
{
	private $items = [];

	public function __construct()
	{
		$this->items = $this->restore();
	}

	public function __destruct()
	{
		$_SESSION['cart'] = serialize($this->items);
	}

	public function restore()
	{
		return isset($_SESSION['cart'])?unserialize($_SESSION['cart']):array();
	}

	public function add(CartItem $item)
	{
		$id = $item->getProduct()->getId();
		if(!$this->has($id)){
			$this->items[$id] = $item;
		}
	}
	public function delete($id)
	{
		if($this->has($id))
		{
			unset($this->items[$id]);
		}
	}
	public function update(CartItem $item)
	{
		$id = $item->getProduct()->getId();
		if($this->has($id))
		{
			if($item->getQuantity() < 1)
			{
				$this->delete($id);
				return;
			}
			$this->items[$id] = $item;
		}
	}
	public function getTotal()
	{
		$total = 0;
		foreach($this->items as $item)
		{
			$total += $item->getProduct()->getPrice() * $item->getQuantity();
		}
		return $total;
	}
	public function getCartItems()
	{
		return $this->items;
	}
	public function has($id)
	{
		return isset($this->items[$id]);
	}
}