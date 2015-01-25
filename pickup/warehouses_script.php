<?php

include('../database.php');

	// session_unset($_SESSION['warehouses']);
	$farmId = intval($_GET['q']);
	$query="select warehouse_id, warehouse_name from warehouse where farm_id=".$farmId;
	$result = $db->query($query);
	while($row = $result->fetch_assoc()) {
		$warehouseId = $row['warehouse_id'];
		$warehouseName = $row['warehouse_name'];
		$warehouses[] = array($warehouseId, $warehouseName);

	}
		// $_SESSION['warehouses'] = $warehouses;

		 echo json_encode($warehouses);

?>

