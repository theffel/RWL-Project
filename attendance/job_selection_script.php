<?php
/**
 * This file provides the business functionality for the job selection part of the attendance index.php page.
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
 * @since       2015-01-20
 */

// Include the database.php file
include('../database.php');

// Get empId from session  
$empId = (!empty($_SESSION['empId'])) ? $_SESSION['empId'] : "";

// declare array
$jobIds = array();
    
// Create query for job type id
$query = "SELECT emp_type_id FROM job_type WHERE emp_id=" .$empId;
$result = $db->query($query);
  var_dump($query); 
while ($row = $result->fetch_assoc()){
    $empTypeId = $row['emp_type_id'];   
    $jobIds[] = $empTypeId;
}

// declare array
$jobDescs = array();
    
// Create query for job type id
$query = "SELECT type_description, type_alt_description FROM employee_type";
$result = $db->query($query);
   
while ($row = $result->fetch_assoc()){
    $typeDesc = $row['type_description'];
	$typeAltDesc = $row['type_alt_description'];   
		$jobDescs[] = $typeDesc;
		$jobAltDescs[] = $typeAltDesc;
}  

for ($x = 0; $x < count($jobIds); $x++) {
    $jobTypes[] = array($jobDescs[$x], $jobAltDescs[$x], $jobIds[$x]);
}

$_SESSION['jobTypes'] = $jobTypes;

 /* loop over array to set employee type. Done this way if another employee type is
 added to database will not effect employee type selection in time and attendence */   

for ($x = 0; $x < count($_SESSION['jobTypes']); $x++){
    if (isset($_POST[$jobTypes[$x][1]])) {
        $_SESSION['employeeType'] = $jobTypes[$x][2];

    $query = "INSERT INTO employee_type_change (type_change_time, emp_type_id, emp_id)  VALUES ('" . $dateTime . "'," 
        .$_SESSION['employeeType'] . "," . $empId . ")";
    $result = $db->query($query);
    }
}
?>