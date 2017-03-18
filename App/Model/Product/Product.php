<?php

namespace App\Model\Product;

class Product
{
	private $pdt_id;
	private $pdt_name;
	private $pdt_price;

	public function getId()
	{
		return $this->pdt_id;
	}

	public function setId($id)
	{
		$this->pdt_id = $id;
	}

	public function getName()
	{
		return $this->pdt_name;
	}

	public function setProduct($name)
	{
		$this->pdt_name = $name;
	}

	public function getPrice()
	{
		return $this->pdt_price;
	}

	public function setPrice($price)
	{
		$this->pdt_price = $price;
	}
}