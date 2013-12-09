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
	function productHandler() {
		$data = $_POST;
		print_r($data);
		$db->insertProduct($data['name'], $data['price'], $data['shipping'], $data['description'], $data['category']);
	}
	/* end function section */

	// delegate based on type
	switch ($type) {
		case "product": 
			productHandler(); 
			break;
	}

?>