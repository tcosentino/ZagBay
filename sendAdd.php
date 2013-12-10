<?php
	include 'connection.php';

	$db = new Database();
	$inventory = $db->updateInventory($_GET['id'], $_POST['qty']);

	echo $_POST['qty'];
?>