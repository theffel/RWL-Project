<?php
/**
 * This file provides the business functionality for the fields.
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
 * @since       2015-01-30
 */

// Include database.php
include('../database.php');

$binId = intval($_GET['q']);
$query = "SELECT field_id, field_location FROM field WHERE bin_id=" . $binId;
$result = $db->query($query);

while($row = $result->fetch_assoc()) {
	$fieldId = $row['field_id'];
	$fieldLocation = $row['field_location'];
	$fields[] = array($fieldId, $fieldLocation);
}
echo json_encode($fields);
?>