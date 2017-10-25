<?php
namespace Models;

class Product extends \Database
{
	public $table = 'products';
	public $allowed = ['image', 'title', 'description', 'price'];
}

?>