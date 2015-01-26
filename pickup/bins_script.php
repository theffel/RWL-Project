<?php

include('../database.php');
	
	$warehouseId = intval($_GET['q']);
	$query="select bin_id, bin_name from warehouse_bin where warehouse_id=".$warehouseId;
	$result = $db->query($query);
	while($row = $result->fetch_assoc()) {
		$binId = $row['bin_id'];
		$binName = $row['bin_name'];
		$bins[] = array($binId, $binName);

	}

	echo json_encode($bins);
?>

