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
		print_r($data);
		echo "test";
		$db->insertProduct($data['name'], $data['price'], $data['shipping'], $data['description'], $data['imgUrl'], $data['category']);
		echo $db->db->insert_id;
		$db->addInventory($db->db->insert_id, $data['qty']);
		echo $db->db->insert_id;
	}
	/* end function section */

	// delegate based on type
	switch ($type) {
		case "product": 
			productHandler($db); 
			break;
	}

?>