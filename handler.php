<?php
spl_autoload_register();

if (isset($_POST['edit'])) {
	$products = new \Models\Product();
	$data = [
		'title' => $_POST['title'],
		'description' => $_POST['description'],
		'price' => $_POST['price'],
	];

	$products->update($_POST['id'], $data);
	header('Location: index.php');
}

if (isset($_POST['delete'])) {
	$products = new \Models\Product();
	$product = $products->delete($_POST['id']);
	header('Location: index.php');
die();
}

if(isset($_POST['add'])){

if (!empty($_POST['title']) and !empty($_POST['description']) and !empty($_POST['price'])) {
	$products = new \Models\Product();
 	
$data = [
		'title' => $_POST['title'],
		'description' => $_POST['description'],
		'price' => $_POST['price'],
	];
$product = $products->create($data);
header('Location: index.php');
}else{
	echo "<h1>Заполните все поля!</h1>";
	
}
}

if (isset($_POST['edit_r'])) {
	$reviews = new \Models\Review();
	$data = [
		'name' => $_POST['name'],
		'phone' => $_POST['phone'],
		'text' => $_POST['text'],
	];

	$reviews->update($_POST['id'], $data);
	header('Location: index.php');
}


if (isset($_POST['delete_r'])) {
	$reviews = new \Models\Review();
	$review = $reviews->delete($_POST['id']);
	header('Location: index.php');
die();
}

if(isset($_POST['add_r'])){

if (!empty($_POST['name']) and !empty($_POST['phone']) and !empty($_POST['text'])) {
	$reviews = new \Models\Review();
 	
$data = [
		'name' => $_POST['name'],
		'phone' => $_POST['phone'],
		'text' => $_POST['text'],
	];
$review = $reviews->create($data);
header('Location: index.php');
}else{
	echo "<h1>Заполните все поля</h1>";
}
}
if (isset($_POST['delete_r'])) {
	$reviews = new \Models\Review();
	$review = $review->delete($_POST['id']);
	header('Location: index.php');
die();
}
?>