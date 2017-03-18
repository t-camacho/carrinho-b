<?php

namespace App\Model\Product;

class ProductRepositoryPDO implements ProductRepository
{
	private $pdo;

	public function __construct($bd)
	{
		$this->pdo = $bd;
	}

	public function getProduct($id)
	{
		$stmt = $this->pdo->prepare("SELECT * FROM tbl_product WHERE pdt_id = :id");
		$stmt->bindParam(":id", $id, \PDO::PARAM_INT);
		$stmt->setFetchMode(\PDO::FETCH_CLASS, "App\Model\Product\Product");
		$stmt->execute();
		return $stmt->fetch();
	}

	public function getProducts(){
		$stmt = $this->pdo->prepare("SELECT * FROM tbl_product");
		$stmt->setFetchMode(\PDO::FETCH_CLASS, 'App\Model\Product\Product');
		$stmt->execute();
		return $stmt->fetchAll();
	}
}