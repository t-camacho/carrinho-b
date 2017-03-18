<?php

namespace App\Model\Product;

interface ProductRepository
{
	public function getProduct($id);
	public function getProducts();
}