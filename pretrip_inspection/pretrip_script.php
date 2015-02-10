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

// Include php files
include('../database.php');
include('../session_load.php');

// get last Sample#



// Insert pickup
if (isset($_POST['submit'])) {
	$date = $db->real_escape_string($_POST['date']);
	$truck = $db->real_escape_string($_POST['truck']);
	$trailer = $db->real_escape_string($_POST['trailer']);	
	if (isset($_POST['parkingBrake'])) {
		$parkingBrake = $db->real_escape_string($_POST['parkingBrake']);
	} else {
		$parkingBrake = 0;
	}

	if (isset($_POST['cleanliness'])) {
		$cleanliness = $db->real_escape_string($_POST['cleanliness']);
	} else {
		$cleanliness = 0;
	}

	if (isset($_POST['engineOilPressure'])) {
		$engineOilPressure = $db->real_escape_string($_POST['engineOilPressure']);
	} else {
		$engineOilPressure = 0;
	}

	if (isset($_POST['engineAirPressure'])) {
		$engineAirPressure = $db->real_escape_string($_POST['engineAirPressure']);
	} else {
		$engineAirPressure = 0;
	}

	if (isset($_POST['engineLowAir'])) {
		$engineLowAir = $db->real_escape_string($_POST['engineLowAir']);
	} else {
		$engineLowAir = 0;
	}

	if (isset($_POST['engineInstrumentPanel'])) {
		$engineInstrumentPanel = $db->real_escape_string($_POST['engineInstrumentPanel']);
	} else {
		$engineInstrumentPanel = 0;
	}

	if (isset($_POST['engineHorn'])) {
		$engineHorn = $db->real_escape_string($_POST['engineHorn']);
	} else {
		$engineHorn = 0;
	}

	if (isset($_POST['engineWindshieldWiper'])) {
		$engineWindshieldWiper = $db->real_escape_string($_POST['engineWindshieldWiper']);
	} else {
		$engineWindshieldWiper = 0;
	}

	if (isset($_POST['engineHeaterDefroster'])) {
		$engineHeaterDefroster = $db->real_escape_string($_POST['engineHeaterDefroster']);
	} else {
		$engineHeaterDefroster = 0;
	}

	if (isset($_POST['engineMirrors'])) {
		$engineMirrors = $db->real_escape_string($_POST['engineMirrors']);
	} else {
		$engineMirrors = 0;
	}

	if (isset($_POST['engineSteeringWheel'])) {
		$engineSteeringWheel = $db->real_escape_string($_POST['engineSteeringWheel']);
	} else {
		$engineSteeringWheel = 0;
	}

	if (isset($_POST['engineTrailerBrakesEmergency'])) {
		$engineTrailerBrakesEmergency = $db->real_escape_string($_POST['engineTrailerBrakesEmergency']);
	} else {
		$engineTrailerBrakesEmergency = 0;
	}

	if (isset($_POST['engineAllLights'])) {
		$engineAllLights = $db->real_escape_string($_POST['engineAllLights']);
	} else {
		$engineAllLights = 0;
	}

	if (isset($_POST['engineFireExtinguisher'])) {
		$engineFireExtinguisher = $db->real_escape_string($_POST['engineFireExtinguisher']);
	} else {
		$engineFireExtinguisher = 0;
	}

	if (isset($_POST['frontHeadlights'])) {
		$frontHeadlights = $db->real_escape_string($_POST['frontHeadlights']);
	} else {
		$frontHeadlights = 0;
	}

	if (isset($_POST['frontClearanceLights'])) {
		$frontClearanceLights = $db->real_escape_string($_POST['frontClearanceLights']);
	} else {
		$frontClearanceLights = 0;
	}

	if (isset($_POST['frontIdentificationLights'])) {
		$frontIdentificationLights = $db->real_escape_string($_POST['frontIdentificationLights']);
	} else {
		$frontIdentificationLights = 0;
	}

	if (isset($_POST['frontTurnSignals'])) {
		$frontTurnSignals = $db->real_escape_string($_POST['frontTurnSignals']);
	} else {
		$frontTurnSignals = 0;
	}

	if (isset($_POST['frontTiresWheels'])) {
		$frontTiresWheels = $db->real_escape_string($_POST['frontTiresWheels']);
	} else {
		$frontTiresWheels = 0;
	}

	if (isset($_POST['leftFuelTankCap'])) {
		$leftFuelTankCap = $db->real_escape_string($_POST['leftFuelTankCap']);
	} else {
		$leftFuelTankCap = 0;
	}

	if (isset($_POST['leftSidemarkerLights'])) {
		$leftSidemarkerLights = $db->real_escape_string($_POST['leftSidemarkerLights']);
	} else {
		$leftSidemarkerLights = 0;
	}

	if (isset($_POST['leftReflectors'])) {
		$leftReflectors = $db->real_escape_string($_POST['leftReflectors']);
	} else {
		$leftReflectors = 0;
	}

	if (isset($_POST['leftTiresWheels'])) {
		$leftTiresWheels = $db->real_escape_string($_POST['leftTiresWheels']);
	} else {
		$leftTiresWheels = 0;
	}

	if (isset($_POST['leftCargoTiedowns'])) {
		$leftCargoTiedowns = $db->real_escape_string($_POST['leftCargoTiedowns']);
	} else {
		$leftCargoTiedowns = 0;
	}

	if (isset($_POST['rearTailLights'])) {
		$rearTailLights = $db->real_escape_string($_POST['rearTailLights']);
	} else {
		$rearTailLights = 0;
	}

	if (isset($_POST['rearStopLights'])) {
		$rearStopLights = $db->real_escape_string($_POST['rearStopLights']);
	} else {
		$rearStopLights = 0;
	}

	if (isset($_POST['rearTurnSignals'])) {
		$rearTurnSignals = $db->real_escape_string($_POST['rearTurnSignals']);
	} else {
		$rearTurnSignals = 0;
	}

	if (isset($_POST['rearClearanceLights'])) {
		$rearClearanceLights = $db->real_escape_string($_POST['rearClearanceLights']);
	} else {
		$rearClearanceLights = 0;
	}

	if (isset($_POST['rearIdentificationLights'])) {
		$rearIdentificationLights = $db->real_escape_string($_POST['rearIdentificationLights']);
	} else {
		$rearIdentificationLights = 0;
	}

	if (isset($_POST['rearReflectors'])) {
		$rearReflectors = $db->real_escape_string($_POST['rearReflectors']);
	} else {
		$rearReflectors = 0;
	}

	if (isset($_POST['rearTiresWheels'])) {
		$rearTiresWheels = $db->real_escape_string($_POST['rearTiresWheels']);
	} else {
		$rearTiresWheels = 0;
	}

	if (isset($_POST['rearRearProtection'])) {
		$rearRearProtection = $db->real_escape_string($_POST['rearRearProtection']);
	} else {
		$rearRearProtection = 0;
	}

	if (isset($_POST['rearCargoTiedowns'])) {
		$rearCargoTiedowns = $db->real_escape_string($_POST['rearCargoTiedowns']);
	} else {
		$rearCargoTiedowns = 0;
	}

	if (isset($_POST['onCombinationsHosesCouplers'])) {
		$onCombinationsHosesCouplers = $db->real_escape_string($_POST['onCombinationsHosesCouplers']);
	} else {
		$onCombinationsHosesCouplers = 0;
	}

	if (isset($_POST['onCombinationsElectricalConnector'])) {
		$onCombinationsElectricalConnector = $db->real_escape_string($_POST['onCombinationsElectricalConnector']);
	} else {
		$onCombinationsElectricalConnector = 0;
	}

	if (isset($_POST['onCombinationsCouplings'])) {
		$onCombinationsCouplings = $db->real_escape_string($_POST['onCombinationsCouplings']);
	} else {
		$onCombinationsCouplings = 0;
	}

	if (isset($_POST['onHazMaterialsMarkingPlacards'])) {
		$onHazMaterialsMarkingPlacards = $db->real_escape_string($_POST['onHazMaterialsMarkingPlacards']);
	} else {
		$onHazMaterialsMarkingPlacards = 0;
	}

	if (isset($_POST['onHazMaterialsShippingPapers'])) {
		$onHazMaterialsShippingPapers = $db->real_escape_string($_POST['onHazMaterialsShippingPapers']);
	} else {
		$onHazMaterialsShippingPapers = 0;
	}

	if (isset($_POST['stopEngineReleaseTrailerBrakes'])) {
		$stopEngineReleaseTrailerBrakes = $db->real_escape_string($_POST['stopEngineReleaseTrailerBrakes']);
	} else {
		$stopEngineReleaseTrailerBrakes = 0;
	}

	if (isset($_POST['stopEngineApplyBrakesAir'])) {
		$stopEngineApplyBrakesAir = $db->real_escape_string($_POST['stopEngineApplyBrakesAir']);
	} else {
		$stopEngineApplyBrakesAir = 0;
	}

	
	$query = INSERT INTO `pretrip_inspection`(`emp_id`, `inspect_date`, `truck_id`, `trailer_id`, `park_break`, `cleanliness`,
				 `oil_pressure`, `air_pressure`, `low_air_warn`, `inst_pannel`, `horn`, `wiper_washer`, `heat_defrost`, `mirrors`, 
				 `steering_wheel`, `emerg_trailer_breaks`, `fire_extinguisher_warning_device`, `headlights`, `clearence_lights`, 
				 `identfy_lights`, `turn_signals_4way_flashers`, `wheel_lug_front`, `fuel_tank_cap_left`, `sidemarker_lights_left`,
				 `reflectors_left`, `wheel_lug_left`, `cargo_tiedowns_doors_left`, `tail_lights`, `stop_lights`, 
				 `turn_signals_4way_flashers_rear`, `clearence_lights_rear`, `identfy_lights_rear`, `reflectors_rear`, `wheel_lug_rear`,
				 `bumper`, `cargo_tiedowns_doors_rear`, `fuel_tank_cap_right`, `sidemarker_lights_right`, `reflectors_right`, `wheel_lug_right`,
				 `cargo_tiedowns_doors_right`, `hoses_couplers`, `electrical_connector`, `couplings`, `marking_placecards`, `proper_ship_papers`,
				 `release_trailer_emerg_breaks`, `apply_service_breaks`) 
			VALUES ( . $empId . ", '" . $date . "'," . $truck . ", " . $trailer . ",)";
	$result = $db->query($query);

}


// Load array with incoming deliveries for day by employee
$query = "SELECT sample_id, sample_date, trailer_num, num_sample_per_load, potato_name FROM sample 
						INNER JOIN trailer ON sample.trailer_id = trailer.trailer_id
						INNER JOIN potato ON sample.potato_id = potato.potato_id						
			WHERE sample_date LIKE '" . $currentDate . "%' AND emp_id = " . $empId .  " ORDER BY sample_date DESC";
$result = $db->query($query);

if (!empty($result)) {
	while ($row = $result->fetch_assoc()){
		$sampleId = $row['sample_id'];
		$date = $row['sample_date'];
		$trailer = $row['trailer_num'];
		$potato = $row['potato_name'];   
		$numSample = $row['num_sample_per_load']; 
		$samples[] = array($sampleId, $date, $trailer, $numSample, $potato);
		$_SESSION['samples'] = $samples;
	}

	// Select incoming deliveries 
	for ($x = 0; $x < count($_SESSION['samples']); $x++){	
		if (isset($_POST[$samples[$x][0]])) {
			$_SESSION['sampleNum'] = $samples[$x][0];
			$query = "SELECT num_sample_per_load, sample_date, unuseable_weight, rot_weight, internal_weight, pit_rot_weight,
						wireworm_weight, jelly_end_weight, scab_weight, hollow_heart_weight, sunburn_weight, mech_bruise_weight, smalls_weight,
						ten_oz_weight, air_weight, water_weight, rock_foreign_weight, total_sample_weight, other_weight, trailer_num, potato_name,
						in_out FROM sample 
						INNER JOIN trailer ON sample.trailer_id = trailer.trailer_id
						INNER JOIN potato ON sample.potato_id = potato.potato_id
						WHERE sample_id = " . $_SESSION['sampleNum'];
				
			$result = $db->query($query);
			$row = $result->fetch_assoc();
			$trailer = $row['trailer_num'];
			$incomingOutgoing = $row['in_out'] ;
			$numOfSample = $row['num_sample_per_load'];
			$potato = $row['potato_name'];
			$date = $row['sample_date'];
			$totalWeight = $row['total_sample_weight'];
			$useableWeight = $row['unuseable_weight'];	
			$rotWeight = $row['rot_weight'];
			$pitrotWeight = $row['pit_rot_weight'];	
			$internalWeight = $row['internal_weight'];	
			$wirewormWeight = $row['wireworm_weight'];	
			$jellyEndWeight = $row['jelly_end_weight'];
			$otherWeight = $row['other_weight'];	
			$hollowHeartWeight = $row['hollow_heart_weight'];	
			$scabWeight = $row['scab_weight'];	
			$sunburnWeight = $row['sunburn_weight'];	
			$mechBruiseWeight = $row['mech_bruise_weight'];	
			$smallsWeight = $row['smalls_weight'];
			$tenozsWeight = $row['ten_oz_weight'];	
			$airWeight = $row['air_weight'];	
			$waterWeight = $row['water_weight'];	
			$rockMaterial = $row['rock_foreign_weight'];   
			$editSamples[] = array($trailer, $numSample, $incomingOutgoing, $potato, $date, $totalWeight, $useableWeight, $rotWeight,
				$pitrotWeight, $internalWeight, $wirewormWeight, $jellyEndWeight, $otherWeight, $hollowHeartWeight, $scabWeight,
				$sunburnWeight, $mechBruiseWeight, $smallsWeight, $tenozsWeight, $airWeight, $waterWeight, $rockMaterial); 
			$_SESSION['editSamples'] = $editSamples;
			header ("location:edit_sample.php?id=" . $_SESSION['sampleNum'] );
		}
	}
}

if (isset($_POST['update'])) {	
	$trailer = $db->real_escape_string($_POST['trailer']);
	$incomingOutgoing = $db->real_escape_string($_POST['incomingOutgoing']);
	$numOfSample = $db->real_escape_string($_POST['numOfSample']);
	$potato = $db->real_escape_string($_POST['potato']);
	$sample_date = $db->real_escape_string($_POST['date']);
	$totalWeight = $db->real_escape_string($_POST['totalWeight']);
	$unuseableWeight = $db->real_escape_string($_POST['unuseableWeight']);	
	$rotWeight = $db->real_escape_string($_POST['rotWeight']);
	$pitrotWeight = $db->real_escape_string($_POST['pitrotWeight']);	
	$internalWeight = $db->real_escape_string($_POST['internalWeight']);	
	$wirewormWeight = $db->real_escape_string($_POST['wirewormWeight']);	
	$jellyEndWeight = $db->real_escape_string($_POST['jellyendWeight']);
	$otherWeight = $db->real_escape_string($_POST['otherWeight']);	
	$hollowHeartWeight = $db->real_escape_string($_POST['hollowheartWeight']);	
	$scabWeight = $db->real_escape_string($_POST['scabWeight']);	
	$sunburnWeight = $db->real_escape_string($_POST['sunburnWeight']);	
	$mechBruiseWeight = $db->real_escape_string($_POST['mechbruiseWeight']);	
	$smallsWeight = $db->real_escape_string($_POST['smallsWeight']);
	$tenozsWeight = $db->real_escape_string($_POST['tenozsWeight']);	
	$airWeight = $db->real_escape_string($_POST['airWeight']);	
	$waterWeight = $db->real_escape_string($_POST['waterWeight']);	
	$rockMaterial = $db->real_escape_string($_POST['rockWeight']);

	$query = "SELECT trailer_id FROM trailer WHERE trailer_num = '" . $trailer . "'";
	$result = $db->query($query);
	$row = $result->fetch_assoc();
	$trailerId = $row['trailer_id'];

	$query = "SELECT potato_id FROM potato WHERE potato_name = '" . $potato . "'";
	$result = $db->query($query);
	$row = $result->fetch_assoc();
	$potatoId = $row['potato_id'];
	
	$query = "UPDATE sample SET num_sample_per_load = " . $numOfSample . ", sample_date = '" . $sample_date . "', 
		unuseable_weight = " . $unuseableWeight . ", rot_weight = " . $rotWeight . ", internal_weight = " . $internalWeight . ",
		pit_rot_weight = " . $pitrotWeight . ", wireworm_weight = " . $wirewormWeight . ", jelly_end_weight = " . $jellyEndWeight . ",
		scab_weight = " . $scabWeight . ", hollow_heart_weight = " . $hollowHeartWeight . ", sunburn_weight = " . $sunburnWeight . ",
		mech_bruise_weight = " . $mechBruiseWeight . ", smalls_weight = " . $smallsWeight . ", ten_oz_weight = " . $tenozsWeight . ",
		air_weight = " . $airWeight . ", water_weight = " . $waterWeight . ", rock_foreign_weight = " . $rockMaterial . ",
		total_sample_weight = " . $totalWeight . ", other_weight = " . $otherWeight . ", in_out = " . $incomingOutgoing . ",
		trailer_id = " . $trailerId . ", potato_id = " . $potatoId . ", emp_id = " . $empId ."
				WHERE sample_id = " . $_SESSION['sampleNum'];  

	$result = $db->query($query);
	
	// kill session var 'editIncomingDeliveries'
	unset($_SESSION['editIncomingDeliveries']);
	header("location:index.php");
} 
?>