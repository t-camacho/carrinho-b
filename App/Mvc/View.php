<?php

namespace App\Mvc;

class View
{
	private $data = [];
	private $folder;

	public function __construct()
	{
		$this->folder = DIR.DS."App".DS."View".DS;
	}

	public function render($page)
	{
		$filename = $this->folder.DS.$page.".php";
		if(file_exists($filename)){
			extract($this->data);
			include $filename;
		}
	}

	public function set($index, $data)
	{
		$this->data[$index] = $data;
	}
}