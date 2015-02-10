<?php
// Require the database.php file
require_once('database.php');

// Store emp_id in the session
$username = (!empty($_SESSION['username'])) ? $_SESSION['username'] : "";
$query = "SELECT emp_id FROM users WHERE username='" .$username ."'";
$result = $db->query($query);
$row = $result->fetch_assoc();
$empId = $row['emp_id'];    
$_SESSION['empId'] = $empId;

// Store destinations in the session
$query = "SELECT * FROM destination";
$result = $db->query($query);
while ($row = $result->fetch_assoc()){        
	$destId = $row['dest_id'];  
	$destName = $row['dest_name'];
	$destinations[] = array($destId, $destName);
}
$_SESSION['destinations'] = $destinations;

// Store potatoes in the session
$query = "SELECT * FROM potato";
$result = $db->query($query);
while ($row = $result->fetch_assoc()){        
	$potatoId = $row['potato_id'];  
	$potatoName = $row['potato_name'];
	$potatoes[] = array($potatoId, $potatoName);
}
$_SESSION['potatoes'] = $potatoes;

//  Store trucks in the session
$query = "SELECT truck_id, truck_num FROM truck";
$result = $db->query($query);
while ($row = $result->fetch_assoc()){        
	$truckId = $row['truck_id'];  
	$truckNum = $row['truck_num'];
	$trucks[] = array($truckId, $truckNum);
	
}
$_SESSION['trucks'] = $trucks;

// Store trailers in the session
$query = "SELECT trailer_id, trailer_num FROM trailer";
$result = $db->query($query);
while ($row = $result->fetch_assoc()){        
	$trailerId = $row['trailer_id'];  
	$trailerNum = $row['trailer_num'];
	$trailers[] = array($trailerId, $trailerNum);
}
$_SESSION['trailers'] = $trailers;

// Store drivers in the session
$query = "SELECT employee.emp_id, emp_first_name, emp_last_name, emp_type_id FROM employee INNER JOIN job_type ON employee.emp_id = job_type.emp_id WHERE emp_type_id = 1";
$result = $db->query($query);
while ($row = $result->fetch_assoc()){        
	$empId = $row['emp_id'];  
	$firstName = $row['emp_first_name'];
	$lastName = $row['emp_last_name'];
	$jobId = $row['emp_type_id'];
	$name = $firstName . " " . $lastName;
	$drivers[] = array($empId, $name, $jobId);
}

$_SESSION['drivers'] = $drivers;

// Store dispatchers in the session
$query = "SELECT employee.emp_id, emp_first_name, emp_last_name, emp_type_id FROM employee INNER JOIN job_type ON employee.emp_id = job_type.emp_id WHERE emp_type_id = 2";
$result = $db->query($query);
while ($row = $result->fetch_assoc()){        
	$empId = $row['emp_id'];  
	$firstName = $row['emp_first_name'];
	$lastName = $row['emp_last_name'];
	$jobId = $row['emp_type_id'];
	$name = $firstName . " " . $lastName;
	$dispatchers[] = array($empId, $name, $jobId);
}

$_SESSION['dispatchers'] = $dispatchers;

// Store production managers in the session
$query = "SELECT employee.emp_id, emp_first_name, emp_last_name, emp_type_id FROM employee INNER JOIN job_type ON employee.emp_id = job_type.emp_id WHERE emp_type_id = 3";
$result = $db->query($query);
while ($row = $result->fetch_assoc()){        
	$empId = $row['emp_id'];  
	$firstName = $row['emp_first_name'];
	$lastName = $row['emp_last_name'];
	$jobId = $row['emp_type_id'];
	$name = $firstName . " " . $lastName;
	$productionManagers[] = array($empId, $name, $jobId);
}

$_SESSION['productionManagers'] = $productionManagers;

// Store samplers in the session
$query = "SELECT employee.emp_id, emp_first_name, emp_last_name, emp_type_id FROM employee INNER JOIN job_type ON employee.emp_id = job_type.emp_id WHERE emp_type_id = 4";
$result = $db->query($query);
while ($row = $result->fetch_assoc()){        
	$empId = $row['emp_id'];  
	$firstName = $row['emp_first_name'];
	$lastName = $row['emp_last_name'];
	$jobId = $row['emp_type_id'];
	$name = $firstName . " " . $lastName;
	$samplers[] = array($empId, $name, $jobId);
}

$_SESSION['samplers'] = $samplers;

// Store farms in the session
$query = "SELECT farm_id, farm_name FROM farm";
$result = $db->query($query);
while ($row = $result->fetch_assoc()){        
	$farmId = $row['farm_id'];  
	$farmName = $row['farm_name'];
	$farms[] = array($farmId, $farmName);
}
$_SESSION['farms'] = $farms;

$query = "SELECT break_id FROM break WHERE start_break LIKE '". $currentDate . "%' AND emp_id = " . $empId . " ORDER BY start_break DESC";
$result = $db->query($query);
if (!empty($result)) {
	$row = $result->fetch_assoc();
	$breakId = $row['break_id'];    
	$_SESSION['breakId'] = $breakId;
}

?>