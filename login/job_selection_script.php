<?php
/**
 * This file provides the business functionality for the login index.php page.
 *
 * PHP version 5
 *
 *
 * @category    CategoryName
 * @package     PackageName
 * @author      Zachary Theriault
 * @copyright   2015 sCIS
 * @license     http://php.net/license/3_01.txt  PHP License 3.01
 * @version     x.xx
 * @link        http://pear.php.net/package/PackageName
 * @since       2015-01-12
 */

// Start the session
session_start();

// Include the database.php file
include('../database.php');
include('../session_load.php');

// Get empId from session  
$empId = $_SESSION['empId'];

// declare array
$jobIds = array();
    
// Create query for job type id
$query = "SELECT emp_type_id FROM job_type WHERE emp_id=" .$empId;
$result = $db->query($query);
   
while ($row = $result->fetch_assoc()){
    $empTypeId = $row['emp_type_id'];   
    $jobIds[] = $empTypeId;
}

// declare array
$jobDescs = array();
    
// Create query for job type id
$query = "SELECT type_description FROM employee_type";
$result = $db->query($query);
   
while ($row = $result->fetch_assoc()){
    $typeDesc = $row['type_description'];   
    $jobDescs[] = $typeDesc;
}  

for ($x = 0; $x < count($jobIds); $x++) {
    $jobTypes[] = array($jobDescs[$x],$jobIds[$x]);
}

$_SESSION['jobTypes'] = $jobTypes;

 /* loop over array to set employee type. Done this way if another employee type is
 added to database will not effect employee type selection in time and attendence */   

for ($x = 0; $x < count($_SESSION['jobTypes']); $x++){
    if (isset($_POST[$jobTypes[$x][0]])) {
        $_SESSION['employeeType'] = $jobTypes[$x][1];
        header("location: ../index.php");
    }
}

?>