<?php
	include 'connection.php';

	$db = new Database();
	$db->updateInventory($_GET['id'], $_POST['qty']);

	header('Location: addInventory.php');
?>