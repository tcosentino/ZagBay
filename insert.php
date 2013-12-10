<?php
	include 'connection.php';

	// This file will handle all the inserts from forms.

	// The object that we are inserting is passed in the query string variable type.
	// Possible types:
	//		product
	$type = $_GET['type'];

	// Create our database object
	$db = new Database();

	/* function section */
	function productHandler($db) {
		$data = $_POST;

		$db->insertProduct($data['name'], $data['price'], $data['shipping'], $data['description'], $data['imgUrl'], $data['category']);

		$db->addInventory($db->db->insert_id, $data['qty']);

		header('Location: sellerHome.php');
	}

	function creditHandler($db) {
		$data = $_POST;

		$db->addCardInfo($data['name'], $data['cardType'], $data['cardNumber'], $data['cvv'], $data['expire']);
		$db->fulfillOrder();
		$db->createCart();

		header('Location: index.php');
	}
	/* end function section */

	// delegate based on type
	switch ($type) {
		case "product": 
			productHandler($db); 
			break;
		case "credit":
			creditHandler($db);
			break;
	}

?>