<?php
	include 'connection.php';

	$db = new Database();
	$db->updateInventory($_GET['id'], $_POST['qty']);

	echo $_POST['qty'];
?>