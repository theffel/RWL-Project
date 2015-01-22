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
$trucks[] = null;
$query = "SELECT truck_id, truck_num FROM truck";
$result = $db->query($query);
while ($row = $result->fetch_assoc()){        
	$truckId = $row['truck_id'];  
	$truckNum = $row['truck_num'];
	$trucks[] = array($truckId, $truckNum);
	var_dump($trucks);
}
$_SESSION['trucks'] = $trucks;	

// Store trailers in the session
$trailers[] = null;
$query = "SELECT trailer_id, trailer_num FROM trailer";
$result = $db->query($query);
while ($row = $result->fetch_assoc()){        
	$trailerId = $row['trailer_id'];  
	$trailerNum = $row['trailer_num'];
	$trailers[] = array($trailerId, $trailerNum);
}
$_SESSION['trailers'] = $trailers;



?>