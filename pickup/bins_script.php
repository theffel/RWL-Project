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
 * @since       2015-01-2r
 */

// Include database.php
include('../database.php');

$warehouseId = intval($_GET['q']);
$query = "SELECT bin_id, bin_name FROM warehouse_bin WHERE warehouse_id=" . $warehouseId;
$result = $db->query($query);

while($row = $result->fetch_assoc()) {
	$binId = $row['bin_id'];
	$binName = $row['bin_name'];
	$bins[] = array($binId, $binName);
}
echo json_encode($bins);
?>