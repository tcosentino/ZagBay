<?php
	include 'connection.php';

	$db = new Database();
	$db->addToCart($_GET['id']);

	header('Location: cart.php');
?>