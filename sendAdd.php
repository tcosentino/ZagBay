<?php
	include 'connection.php';

	$db = new Database();
	$inventory = $db->addInventory($_GET['id'], $_POST['qty']);

	echo $_POST['qty'];
?>