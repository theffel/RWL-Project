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
if (isset($_POST['submitBtn'])) {
	$date = $db->real_escape_string($_POST['date']);
	$truck = $db->real_escape_string($_POST['truck']);
	$trailer = $db->real_escape_string($_POST['trailer']);	
	if (isset($_POST['parkingBrake'])) {
		$parkingBrake = $db->real_escape_string($_POST['parkingBrake']);
	} else {
		$parkingBrake = 1;
	}

	if (isset($_POST['cleanliness'])) {
		$cleanliness = $db->real_escape_string($_POST['cleanliness']);
	} else {
		$cleanliness = 1;
	}

	if (isset($_POST['engineOilPressure'])) {
		$engineOilPressure = $db->real_escape_string($_POST['engineOilPressure']);
	} else {
		$engineOilPressure = 1;
	}

	if (isset($_POST['engineAirPressure'])) {
		$engineAirPressure = $db->real_escape_string($_POST['engineAirPressure']);
	} else {
		$engineAirPressure = 1;
	}

	if (isset($_POST['engineLowAir'])) {
		$engineLowAir = $db->real_escape_string($_POST['engineLowAir']);
	} else {
		$engineLowAir = 1;
	}

	if (isset($_POST['engineInstrumentPanel'])) {
		$engineInstrumentPanel = $db->real_escape_string($_POST['engineInstrumentPanel']);
	} else {
		$engineInstrumentPanel = 1;
	}

	if (isset($_POST['engineHorn'])) {
		$engineHorn = $db->real_escape_string($_POST['engineHorn']);
	} else {
		$engineHorn = 1;
	}

	if (isset($_POST['engineWindshieldWiper'])) {
		$engineWindshieldWiper = $db->real_escape_string($_POST['engineWindshieldWiper']);
	} else {
		$engineWindshieldWiper = 1;
	}

	if (isset($_POST['engineHeaterDefroster'])) {
		$engineHeaterDefroster = $db->real_escape_string($_POST['engineHeaterDefroster']);
	} else {
		$engineHeaterDefroster = 1;
	}

	if (isset($_POST['engineMirrors'])) {
		$engineMirrors = $db->real_escape_string($_POST['engineMirrors']);
	} else {
		$engineMirrors = 1;
	}

	if (isset($_POST['engineSteeringWheel'])) {
		$engineSteeringWheel = $db->real_escape_string($_POST['engineSteeringWheel']);
	} else {
		$engineSteeringWheel = 1;
	}

	if (isset($_POST['engineTrailerBrakesEmergency'])) {
		$engineTrailerBrakesEmergency = $db->real_escape_string($_POST['engineTrailerBrakesEmergency']);
	} else {
		$engineTrailerBrakesEmergency = 1;
	}

	if (isset($_POST['engineAllLights'])) {
		$engineAllLights = $db->real_escape_string($_POST['engineAllLights']);
	} else {
		$engineAllLights = 1;
	}

	if (isset($_POST['engineFireExtinguisher'])) {
		$engineFireExtinguisher = $db->real_escape_string($_POST['engineFireExtinguisher']);
	} else {
		$engineFireExtinguisher = 1;
	}

	if (isset($_POST['frontHeadlights'])) {
		$frontHeadlights = $db->real_escape_string($_POST['frontHeadlights']);
	} else {
		$frontHeadlights = 1;
	}

	if (isset($_POST['frontClearanceLights'])) {
		$frontClearanceLights = $db->real_escape_string($_POST['frontClearanceLights']);
	} else {
		$frontClearanceLights = 1;
	}

	if (isset($_POST['frontIdentificationLights'])) {
		$frontIdentificationLights = $db->real_escape_string($_POST['frontIdentificationLights']);
	} else {
		$frontIdentificationLights = 1;
	}

	if (isset($_POST['frontTurnSignals'])) {
		$frontTurnSignals = $db->real_escape_string($_POST['frontTurnSignals']);
	} else {
		$frontTurnSignals = 1;
	}

	if (isset($_POST['frontTiresWheels'])) {
		$frontTiresWheels = $db->real_escape_string($_POST['frontTiresWheels']);
	} else {
		$frontTiresWheels = 1;
	}

	if (isset($_POST['leftFuelTankCap'])) {
		$leftFuelTankCap = $db->real_escape_string($_POST['leftFuelTankCap']);
	} else {
		$leftFuelTankCap = 1;
	}

	if (isset($_POST['leftSidemarkerLights'])) {
		$leftSidemarkerLights = $db->real_escape_string($_POST['leftSidemarkerLights']);
	} else {
		$leftSidemarkerLights = 1;
	}

	if (isset($_POST['leftReflectors'])) {
		$leftReflectors = $db->real_escape_string($_POST['leftReflectors']);
	} else {
		$leftReflectors = 1;
	}

	if (isset($_POST['leftTiresWheels'])) {
		$leftTiresWheels = $db->real_escape_string($_POST['leftTiresWheels']);
	} else {
		$leftTiresWheels = 1;
	}

	if (isset($_POST['leftCargoTiedowns'])) {
		$leftCargoTiedowns = $db->real_escape_string($_POST['leftCargoTiedowns']);
	} else {
		$leftCargoTiedowns = 1;
	}

	if (isset($_POST['rearTailLights'])) {
		$rearTailLights = $db->real_escape_string($_POST['rearTailLights']);
	} else {
		$rearTailLights = 1;
	}

	if (isset($_POST['rearStopLights'])) {
		$rearStopLights = $db->real_escape_string($_POST['rearStopLights']);
	} else {
		$rearStopLights = 1;
	}

	if (isset($_POST['rearTurnSignals'])) {
		$rearTurnSignals = $db->real_escape_string($_POST['rearTurnSignals']);
	} else {
		$rearTurnSignals = 1;
	}

	if (isset($_POST['rearClearanceLights'])) {
		$rearClearanceLights = $db->real_escape_string($_POST['rearClearanceLights']);
	} else {
		$rearClearanceLights = 1;
	}

	if (isset($_POST['rearIdentificationLights'])) {
		$rearIdentificationLights = $db->real_escape_string($_POST['rearIdentificationLights']);
	} else {
		$rearIdentificationLights = 1;
	}

	if (isset($_POST['rearReflectors'])) {
		$rearReflectors = $db->real_escape_string($_POST['rearReflectors']);
	} else {
		$rearReflectors = 1;
	}

	if (isset($_POST['rearTiresWheels'])) {
		$rearTiresWheels = $db->real_escape_string($_POST['rearTiresWheels']);
	} else {
		$rearTiresWheels = 1;
	}

	if (isset($_POST['rearRearProtection'])) {
		$rearRearProtection = $db->real_escape_string($_POST['rearRearProtection']);
	} else {
		$rearRearProtection = 1;
	}

	if (isset($_POST['rearCargoTiedowns'])) {
		$rearCargoTiedowns = $db->real_escape_string($_POST['rearCargoTiedowns']);
	} else {
		$rearCargoTiedowns = 1;
	}

	if (isset($_POST['rightFuelTankCap'])) {
		$rightFuelTankCap = $db->real_escape_string($_POST['rightFuelTankCap']);
	} else {
		$rightFuelTankCap = 1;
	}

	if (isset($_POST['rightSidemarkerLights'])) {
		$rightSidemarkerLights = $db->real_escape_string($_POST['rightSidemarkerLights']);
	} else {
		$rightSidemarkerLights = 1;
	}

	if (isset($_POST['rightReflectors'])) {
		$rightReflectors = $db->real_escape_string($_POST['rightReflectors']);
	} else {
		$rightReflectors = 1;
	}

	if (isset($_POST['rightTiresWheels'])) {
		$rightTiresWheels = $db->real_escape_string($_POST['rightTiresWheels']);
	} else {
		$rightTiresWheels = 1;
	}
	
	if (isset($_POST['rightCargoTiedowns'])) {
		$rightCargoTiedowns = $db->real_escape_string($_POST['rightCargoTiedowns']);
	} else {
		$rightCargoTiedowns = 1;
	}

	if (isset($_POST['onCombinationsHosesCouplers'])) {
		$onCombinationsHosesCouplers = $db->real_escape_string($_POST['onCombinationsHosesCouplers']);
	} else {
		$onCombinationsHosesCouplers = 1;
	}

	if (isset($_POST['onCombinationsElectricalConnector'])) {
		$onCombinationsElectricalConnector = $db->real_escape_string($_POST['onCombinationsElectricalConnector']);
	} else {
		$onCombinationsElectricalConnector = 1;
	}

	if (isset($_POST['onCombinationsCouplings'])) {
		$onCombinationsCouplings = $db->real_escape_string($_POST['onCombinationsCouplings']);
	} else {
		$onCombinationsCouplings = 1;
	}

	if (isset($_POST['onHazMaterialsMarkingPlacards'])) {
		$onHazMaterialsMarkingPlacards = $db->real_escape_string($_POST['onHazMaterialsMarkingPlacards']);
	} else {
		$onHazMaterialsMarkingPlacards = 1;
	}

	if (isset($_POST['onHazMaterialsShippingPapers'])) {
		$onHazMaterialsShippingPapers = $db->real_escape_string($_POST['onHazMaterialsShippingPapers']);
	} else {
		$onHazMaterialsShippingPapers = 1;
	}

	if (isset($_POST['stopEngineReleaseTrailerBrakes'])) {
		$stopEngineReleaseTrailerBrakes = $db->real_escape_string($_POST['stopEngineReleaseTrailerBrakes']);
	} else {
		$stopEngineReleaseTrailerBrakes = 1;
	}

	if (isset($_POST['stopEngineApplyBrakesAir'])) {
		$stopEngineApplyBrakesAir = $db->real_escape_string($_POST['stopEngineApplyBrakesAir']);
	} else {
		$stopEngineApplyBrakesAir = 1;
	}

	
	$query = "INSERT INTO pretrip_inspection(emp_id, inspect_date, truck_id, trailer_id, park_break, cleanliness,
				 oil_pressure, air_pressure, low_air_warn, inst_pannel, horn, wiper_washer, heat_defrost, mirrors, 
				 steering_wheel, emerg_trailer_breaks, engine_lights,fire_extinguisher_warning_device, head_lights, clearence_lights, 
				 identfy_lights, turn_signals_4way_flashers, wheel_lug_front, fuel_tank_cap_left, sidemarker_lights_left,
				 reflectors_left, wheel_lug_left, cargo_tiedowns_doors_left, tail_lights, stop_lights, 
				 turn_signals_4way_flashers_rear, clearence_lights_rear, identfy_lights_rear, reflectors_rear, wheel_lug_rear,
				 bumper, cargo_tiedowns_doors_rear, fuel_tank_cap_right, sidemarker_lights_right, reflectors_right, wheel_lug_right,
				 cargo_tiedowns_doors_right, hoses_couplers, electrical_connector, couplings, marking_placecards, proper_ship_papers,
				 release_trailer_emerg_breaks, apply_service_breaks) 
			VALUES ( ". $empId . ", '" . $date . "'," . $truck . ", " . $trailer . ",". $parkingBrake . ", ". $cleanliness . ",
				" . $engineOilPressure . ",". $engineAirPressure . ", ". $engineLowAir . ", ". $engineInstrumentPanel . ", " . $engineHorn . ",
				" . $engineWindshieldWiper . "," . $engineHeaterDefroster . ", ". $engineMirrors . ", ". $engineSteeringWheel . ",
				" . $engineTrailerBrakesEmergency . ",".  $engineAllLights . ", " . $engineFireExtinguisher . ", " . $frontHeadlights . ",
				" . $frontClearanceLights . ", " . $frontIdentificationLights . "," . $frontTurnSignals . ", " . $frontTiresWheels . ", 
				" . $leftFuelTankCap . ", " . $leftSidemarkerLights . "," . $leftReflectors . ", " . $leftTiresWheels . ", ". $leftCargoTiedowns . ",
				" . $rearTailLights . ", " . $rearStopLights . "," . $rearTurnSignals . ", " . $rearClearanceLights . ",
				" . $rearIdentificationLights . ", " . $rearReflectors . "," . $rearTiresWheels . ", " . $rearRearProtection . ", 
				" . $rearCargoTiedowns . ", " . $rightFuelTankCap . ", " . $rightSidemarkerLights . "," . $rightReflectors . ", 
				" . $rightTiresWheels . ", " . $rightCargoTiedowns . ", " . $onCombinationsHosesCouplers . ",
				" . $onCombinationsElectricalConnector . ", " . $onCombinationsCouplings . ", " . $onHazMaterialsMarkingPlacards . ", 
				" . $onHazMaterialsShippingPapers . ", " . $stopEngineReleaseTrailerBrakes . ", " . $stopEngineApplyBrakesAir . ")";

	$result = $db->query($query);

}


// Load array with pretrips for day by employee
$query = "SELECT pretrip_id, inspect_date, trailer_num, truck_num FROM pretrip_inspection
						INNER JOIN trailer ON pretrip_inspection.trailer_id = trailer.trailer_id
						INNER JOIN truck ON pretrip_inspection.truck_id = truck.truck_id						
			WHERE inspect_date LIKE '" . $currentDate . "%' AND emp_id = " . $empId .  " ORDER BY inspect_date DESC";
$result = $db->query($query);

if (!empty($result)) {
	while ($row = $result->fetch_assoc()){
		$pretripId = $row['pretrip_id'];
		$date = $row['inspect_date'];
		$truck = $row['truck_num'];
		$trailer = $row['trailer_num'];
		$pretrips[] = array($pretripId, $date, $truck, $trailer);
		$_SESSION['pretrips'] = $pretrips;
	}

	// Select pretrips
	for ($x = 0; $x < count($_SESSION['pretrips']); $x++){	
		if (isset($_POST[$pretrips[$x][0]])) {
			$_SESSION['pretripNum'] = $pretrips[$x][0];
			$query = "SELECT inspect_date, truck_num, trailer_num, park_break, cleanliness,
				 oil_pressure, air_pressure, low_air_warn, inst_pannel, horn, wiper_washer, heat_defrost, mirrors, 
				 steering_wheel, emerg_trailer_breaks, engine_lights,fire_extinguisher_warning_device, head_lights, clearence_lights, 
				 identfy_lights, turn_signals_4way_flashers, wheel_lug_front, fuel_tank_cap_left, sidemarker_lights_left,
				 reflectors_left, wheel_lug_left, cargo_tiedowns_doors_left, tail_lights, stop_lights, 
				 turn_signals_4way_flashers_rear, clearence_lights_rear, identfy_lights_rear, reflectors_rear, wheel_lug_rear,
				 bumper, cargo_tiedowns_doors_rear, fuel_tank_cap_right, sidemarker_lights_right, reflectors_right, wheel_lug_right,
				 cargo_tiedowns_doors_right, hoses_couplers, electrical_connector, couplings, marking_placecards, proper_ship_papers,
				 release_trailer_emerg_breaks, apply_service_breaks FROM pretrip_inspection
						INNER JOIN trailer ON pretrip_inspection.trailer_id = trailer.trailer_id
						INNER JOIN truck ON pretrip_inspection.truck_id = truck.truck_id		
						WHERE pretrip_id = " . $_SESSION['pretripNum'];

			$result = $db->query($query);
			$row = $result->fetch_assoc();
			$inspectDate = $row['inspect_date'];
			$truck = $row['truck_num'];			
			$trailer = $row['trailer_num'];
			$parkBreak = $row['park_break'] ;
			$cleanliness = $row['cleanliness'];
			$oilPressure = $row['oil_pressure'];
			$airPressure = $row['air_pressure'];
			$lowAirWarn = $row['low_air_warn'];
			$instPannel = $row['inst_pannel'];	
			$horn = $row['horn'];
			$wiperWasher = $row['wiper_washer'];	
			$heatDefrost = $row['heat_defrost'];	
			$mirrors = $row['mirrors'];	
			$steeringWheel = $row['steering_wheel'];
			$emergTrailerBreaks = $row['emerg_trailer_breaks'];	
			$engineLights = $row['engine_lights'];	
			$fireExtinguisher = $row['fire_extinguisher_warning_device'];	
			$headlights = $row['head_lights'];	
			$clearenceLights = $row['clearence_lights'];	
			$identfyLights = $row['identfy_lights'];
			$turnSignals = $row['turn_signals_4way_flashers'];	
			$wheelLugFront = $row['wheel_lug_front'];	
			$fuelTankCapLeft = $row['fuel_tank_cap_left'];	
			$sidemarkerLightsLeft = $row['sidemarker_lights_left']; 
			$reflectorsLeft = $row['reflectors_left'];
			$wheelLugLeft = $row['wheel_lug_left'];			
			$cargoTiedownsLeft = $row['cargo_tiedowns_doors_left'];
			$tailLights = $row['tail_lights'] ;
			$stopLights = $row['stop_lights'];
			$turnSignalsRear = $row['turn_signals_4way_flashers_rear'];
			$clearenceLightsRear = $row['clearence_lights_rear'];
			$identfyLightsRear = $row['identfy_lights_rear'];
			$reflectorsRear = $row['reflectors_rear'];	
			$wheelLugRear = $row['wheel_lug_rear'];
			$bumper = $row['bumper'];	
			$cargoTiedownsRear = $row['cargo_tiedowns_doors_rear'];	
			$fuelTankRight = $row['fuel_tank_cap_right'];	
			$sidemarkerLightsRight = $row['sidemarker_lights_right'];
			$reflectorsRight = $row['reflectors_right'];	
			$wheelLugRight = $row['wheel_lug_right'];	
			$cargoTiedownsRight = $row['cargo_tiedowns_doors_right'];	
			$hosesCouplers = $row['hoses_couplers'];	
			$electricalConnector = $row['electrical_connector'];	
			$couplings = $row['couplings'];
			$markingPlacecards = $row['marking_placecards'];	
			$properShipPapers = $row['proper_ship_papers'];	
			$releaseTrailerBreaks = $row['release_trailer_emerg_breaks'];	
			$applyServiceBreaks = $row['apply_service_breaks']; 			

			$editPretrips[] = array($inspectDate, $truck, $trailer, $parkBreak, $cleanliness, $oilPressure, $airPressure, $lowAirWarn,
				$instPannel, $horn, $wiperWasher, $heatDefrost, $mirrors, $steeringWheel, $emergTrailerBreaks, $engineLights,
				$fireExtinguisher, $headlights, $clearenceLights, $identfyLights, $turnSignals, $wheelLugFront, $fuelTankCapLeft,
				$sidemarkerLightsLeft, $reflectorsLeft, $reflectorsLeft, $wheelLugLeft, $cargoTiedownsLeft, $tailLights, $stopLights,
				$turnSignalsRear, $clearenceLightsRear, $identfyLightsRear, $reflectorsRear, $wheelLugRear, $bumper, $cargoTiedownsRear, 
				$fuelTankRight, $sidemarkerLightsRight, $reflectorsRight, $wheelLugRight, $cargoTiedownsRight, $hosesCouplers, 
				$electricalConnector, $couplings, $markingPlacecards, $properShipPapers, $releaseTrailerBreaks, $applyServiceBreaks); 
			$_SESSION['editPretrips'] = $editPretrips;
			header ("location:edit_pretrip.php?id=" . $_SESSION['pretripNum'] );
		}
	}
}

if (isset($_POST['updateBtn'])) {	
	$date = $db->real_escape_string($_POST['date']);
	$truck = $db->real_escape_string($_POST['truck']);
	$trailer = $db->real_escape_string($_POST['trailer']);	
	if (isset($_POST['parkingBrake'])) {
		$parkingBrake = $db->real_escape_string($_POST['parkingBrake']);
	} else {
		$parkingBrake = 1;
	}

	if (isset($_POST['cleanliness'])) {
		$cleanliness = $db->real_escape_string($_POST['cleanliness']);
	} else {
		$cleanliness = 1;
	}

	if (isset($_POST['engineOilPressure'])) {
		$engineOilPressure = $db->real_escape_string($_POST['engineOilPressure']);
	} else {
		$engineOilPressure = 1;
	}

	if (isset($_POST['engineAirPressure'])) {
		$engineAirPressure = $db->real_escape_string($_POST['engineAirPressure']);
	} else {
		$engineAirPressure = 1;
	}

	if (isset($_POST['engineLowAir'])) {
		$engineLowAir = $db->real_escape_string($_POST['engineLowAir']);
	} else {
		$engineLowAir = 1;
	}

	if (isset($_POST['engineInstrumentPanel'])) {
		$engineInstrumentPanel = $db->real_escape_string($_POST['engineInstrumentPanel']);
	} else {
		$engineInstrumentPanel = 1;
	}

	if (isset($_POST['engineHorn'])) {
		$engineHorn = $db->real_escape_string($_POST['engineHorn']);
	} else {
		$engineHorn = 1;
	}

	if (isset($_POST['engineWindshieldWiper'])) {
		$engineWindshieldWiper = $db->real_escape_string($_POST['engineWindshieldWiper']);
	} else {
		$engineWindshieldWiper = 1;
	}

	if (isset($_POST['engineHeaterDefroster'])) {
		$engineHeaterDefroster = $db->real_escape_string($_POST['engineHeaterDefroster']);
	} else {
		$engineHeaterDefroster = 1;
	}

	if (isset($_POST['engineMirrors'])) {
		$engineMirrors = $db->real_escape_string($_POST['engineMirrors']);
	} else {
		$engineMirrors = 1;
	}

	if (isset($_POST['engineSteeringWheel'])) {
		$engineSteeringWheel = $db->real_escape_string($_POST['engineSteeringWheel']);
	} else {
		$engineSteeringWheel = 1;
	}

	if (isset($_POST['engineTrailerBrakesEmergency'])) {
		$engineTrailerBrakesEmergency = $db->real_escape_string($_POST['engineTrailerBrakesEmergency']);
	} else {
		$engineTrailerBrakesEmergency = 1;
	}

	if (isset($_POST['engineAllLights'])) {
		$engineAllLights = $db->real_escape_string($_POST['engineAllLights']);
	} else {
		$engineAllLights = 1;
	}

	if (isset($_POST['engineFireExtinguisher'])) {
		$engineFireExtinguisher = $db->real_escape_string($_POST['engineFireExtinguisher']);
	} else {
		$engineFireExtinguisher = 1;
	}

	if (isset($_POST['frontHeadlights'])) {
		$frontHeadlights = $db->real_escape_string($_POST['frontHeadlights']);
	} else {
		$frontHeadlights = 1;
	}

	if (isset($_POST['frontClearanceLights'])) {
		$frontClearanceLights = $db->real_escape_string($_POST['frontClearanceLights']);
	} else {
		$frontClearanceLights = 1;
	}

	if (isset($_POST['frontIdentificationLights'])) {
		$frontIdentificationLights = $db->real_escape_string($_POST['frontIdentificationLights']);
	} else {
		$frontIdentificationLights = 1;
	}

	if (isset($_POST['frontTurnSignals'])) {
		$frontTurnSignals = $db->real_escape_string($_POST['frontTurnSignals']);
	} else {
		$frontTurnSignals = 1;
	}

	if (isset($_POST['frontTiresWheels'])) {
		$frontTiresWheels = $db->real_escape_string($_POST['frontTiresWheels']);
	} else {
		$frontTiresWheels = 1;
	}

	if (isset($_POST['leftFuelTankCap'])) {
		$leftFuelTankCap = $db->real_escape_string($_POST['leftFuelTankCap']);
	} else {
		$leftFuelTankCap = 1;
	}

	if (isset($_POST['leftSidemarkerLights'])) {
		$leftSidemarkerLights = $db->real_escape_string($_POST['leftSidemarkerLights']);
	} else {
		$leftSidemarkerLights = 1;
	}

	if (isset($_POST['leftReflectors'])) {
		$leftReflectors = $db->real_escape_string($_POST['leftReflectors']);
	} else {
		$leftReflectors = 1;
	}

	if (isset($_POST['leftTiresWheels'])) {
		$leftTiresWheels = $db->real_escape_string($_POST['leftTiresWheels']);
	} else {
		$leftTiresWheels = 1;
	}

	if (isset($_POST['leftCargoTiedowns'])) {
		$leftCargoTiedowns = $db->real_escape_string($_POST['leftCargoTiedowns']);
	} else {
		$leftCargoTiedowns = 1;
	}

	if (isset($_POST['rearTailLights'])) {
		$rearTailLights = $db->real_escape_string($_POST['rearTailLights']);
	} else {
		$rearTailLights = 1;
	}

	if (isset($_POST['rearStopLights'])) {
		$rearStopLights = $db->real_escape_string($_POST['rearStopLights']);
	} else {
		$rearStopLights = 1;
	}

	if (isset($_POST['rearTurnSignals'])) {
		$rearTurnSignals = $db->real_escape_string($_POST['rearTurnSignals']);
	} else {
		$rearTurnSignals = 1;
	}

	if (isset($_POST['rearClearanceLights'])) {
		$rearClearanceLights = $db->real_escape_string($_POST['rearClearanceLights']);
	} else {
		$rearClearanceLights = 1;
	}

	if (isset($_POST['rearIdentificationLights'])) {
		$rearIdentificationLights = $db->real_escape_string($_POST['rearIdentificationLights']);
	} else {
		$rearIdentificationLights = 1;
	}

	if (isset($_POST['rearReflectors'])) {
		$rearReflectors = $db->real_escape_string($_POST['rearReflectors']);
	} else {
		$rearReflectors = 1;
	}

	if (isset($_POST['rearTiresWheels'])) {
		$rearTiresWheels = $db->real_escape_string($_POST['rearTiresWheels']);
	} else {
		$rearTiresWheels = 1;
	}

	if (isset($_POST['rearRearProtection'])) {
		$rearRearProtection = $db->real_escape_string($_POST['rearRearProtection']);
	} else {
		$rearRearProtection = 1;
	}

	if (isset($_POST['rearCargoTiedowns'])) {
		$rearCargoTiedowns = $db->real_escape_string($_POST['rearCargoTiedowns']);
	} else {
		$rearCargoTiedowns = 1;
	}

	if (isset($_POST['rightFuelTankCap'])) {
		$rightFuelTankCap = $db->real_escape_string($_POST['rightFuelTankCap']);
	} else {
		$rightFuelTankCap = 1;
	}

	if (isset($_POST['rightSidemarkerLights'])) {
		$rightSidemarkerLights = $db->real_escape_string($_POST['rightSidemarkerLights']);
	} else {
		$rightSidemarkerLights = 1;
	}

	if (isset($_POST['rightReflectors'])) {
		$rightReflectors = $db->real_escape_string($_POST['rightReflectors']);
	} else {
		$rightReflectors = 1;
	}

	if (isset($_POST['rightTiresWheels'])) {
		$rightTiresWheels = $db->real_escape_string($_POST['rightTiresWheels']);
	} else {
		$rightTiresWheels = 1;
	}
	
	if (isset($_POST['rightCargoTiedowns'])) {
		$rightCargoTiedowns = $db->real_escape_string($_POST['rightCargoTiedowns']);
	} else {
		$rightCargoTiedowns = 1;
	}

	if (isset($_POST['onCombinationsHosesCouplers'])) {
		$onCombinationsHosesCouplers = $db->real_escape_string($_POST['onCombinationsHosesCouplers']);
	} else {
		$onCombinationsHosesCouplers = 1;
	}

	if (isset($_POST['onCombinationsElectricalConnector'])) {
		$onCombinationsElectricalConnector = $db->real_escape_string($_POST['onCombinationsElectricalConnector']);
	} else {
		$onCombinationsElectricalConnector = 1;
	}

	if (isset($_POST['onCombinationsCouplings'])) {
		$onCombinationsCouplings = $db->real_escape_string($_POST['onCombinationsCouplings']);
	} else {
		$onCombinationsCouplings = 1;
	}

	if (isset($_POST['onHazMaterialsMarkingPlacards'])) {
		$onHazMaterialsMarkingPlacards = $db->real_escape_string($_POST['onHazMaterialsMarkingPlacards']);
	} else {
		$onHazMaterialsMarkingPlacards = 1;
	}

	if (isset($_POST['onHazMaterialsShippingPapers'])) {
		$onHazMaterialsShippingPapers = $db->real_escape_string($_POST['onHazMaterialsShippingPapers']);
	} else {
		$onHazMaterialsShippingPapers = 1;
	}

	if (isset($_POST['stopEngineReleaseTrailerBrakes'])) {
		$stopEngineReleaseTrailerBrakes = $db->real_escape_string($_POST['stopEngineReleaseTrailerBrakes']);
	} else {
		$stopEngineReleaseTrailerBrakes = 1;
	}

	if (isset($_POST['stopEngineApplyBrakesAir'])) {
		$stopEngineApplyBrakesAir = $db->real_escape_string($_POST['stopEngineApplyBrakesAir']);
	} else {
		$stopEngineApplyBrakesAir = 1;
	}
	
	$query = "UPDATE pretrip_inspection SET emp_id = " . $empId .", inspect_date = '" . $date . "', truck_id = " . $truck .",
				 trailer_id = " . $trailer .", park_break = " . $parkingBrake .", cleanliness = " . $cleanliness .",
				 oil_pressure = " . $engineOilPressure .", air_pressure = " . $engineAirPressure .", low_air_warn = " . $engineLowAir .",
				 inst_pannel = " . $engineInstrumentPanel .", horn = " . $engineHorn .", wiper_washer = " . $engineWindshieldWiper .", 
				 heat_defrost = " . $engineHeaterDefroster .", mirrors = " . $engineMirrors .", steering_wheel = " . $engineSteeringWheel .", 
				 emerg_trailer_breaks = " . $engineTrailerBrakesEmergency .", engine_lights = " . $engineAllLights .",
				 fire_extinguisher_warning_device  = " . $engineFireExtinguisher .", head_lights = " . $frontHeadlights .", 
				 clearence_lights = " . $frontClearanceLights .", identfy_lights = " . $frontIdentificationLights .", 
				 turn_signals_4way_flashers = " . $frontTurnSignals .", wheel_lug_front = " . $frontTiresWheels .", fuel_tank_cap_left = " . $leftFuelTankCap .", 
				 sidemarker_lights_left = " . $leftSidemarkerLights .", reflectors_left = " . $leftReflectors .", wheel_lug_left = " . $leftTiresWheels .", 
				 cargo_tiedowns_doors_left = " . $leftCargoTiedowns .", tail_lights = " . $rearTailLights .", stop_lights = " . $rearStopLights .", 
				 turn_signals_4way_flashers_rear = " . $rearTurnSignals .", clearence_lights_rear = " . $rearClearanceLights .", 
				 identfy_lights_rear = " . $rearIdentificationLights .", reflectors_rear = " . $rearReflectors .", wheel_lug_rear = " . $rearTiresWheels .",
				 bumper = " . $rearRearProtection .", cargo_tiedowns_doors_rear = " . $rearCargoTiedowns .", fuel_tank_cap_right = " . $rightFuelTankCap .",
				 sidemarker_lights_right = " . $rightSidemarkerLights .", reflectors_right = " . $rightReflectors .", wheel_lug_right = " . $rightTiresWheels .",
				 cargo_tiedowns_doors_right = " . $rightCargoTiedowns .", hoses_couplers = " . $onCombinationsHosesCouplers .",
				 electrical_connector = " . $onCombinationsElectricalConnector .", couplings = " . $onCombinationsCouplings .", marking_placecards = " . $onHazMaterialsMarkingPlacards .",
				 proper_ship_papers = " . $onHazMaterialsShippingPapers .", release_trailer_emerg_breaks = " . $stopEngineReleaseTrailerBrakes .", 
				 apply_service_breaks = " . $stopEngineApplyBrakesAir ."	
			   WHERE pretrip_id = " . $_SESSION['pretripNum'];  
			  
	$result = $db->query($query);
	
	// kill session var 'pretrips'
	unset($_SESSION['pretrips']);
	header("location:index.php");
} 
?>