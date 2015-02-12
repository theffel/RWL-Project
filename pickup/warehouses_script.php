<?php
/**
 * This file provides the business functionality for the pickup index.php page.
 *
 * PHP version 5
 *
 *
 * @category    CategoryName
 * @package     PackageName
 * @author      Zachary Theriault
 * @author      Trevor Heffel
 * @copyright   2015 sCIS
 * @license     http://php.net/license/3_01.txt  PHP License 3.01
 * @version     1.00
 * @link        http://pear.php.net/package/PackageName
 * @since       2015-01-25
 */

// Include the database.php file
include('../database.php');

$farmId = intval($_GET['q']);
$query = "SELECT warehouse_id, warehouse_name FROM warehouse WHERE farm_id=" . $farmId;
$result = $db->query($query);

while($row = $result->fetch_assoc()) {
	$warehouseId = $row['warehouse_id'];
	$warehouseName = $row['warehouse_name'];
	$warehouses[] = array($warehouseId, $warehouseName);
}

echo json_encode($warehouses);
?>