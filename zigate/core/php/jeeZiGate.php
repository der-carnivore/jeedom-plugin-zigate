<?php

require_once dirname(__FILE__) . "/../../../../core/php/core.inc.php";

if (!jeedom::apiAccess(init('apikey'), 'zigate')) {
	echo __('Vous n\'êtes pas autorisé à effectuer cette action', __FILE__);
	die();
}

$results = json_decode(file_get_contents("php://input"), true);
$response = array('success' => true);
log::add('zigate','debug',print_r($results,true));
$action = $results['action'];

if ($action == 'syncEqLogicWithZiGate'){
    zigate::syncEqLogicWithZiGate();
}
elseif ($action == 'ZIGATE_DEVICE_ADDED'){
    $addr = zigate::syncDevice($results['device']);
    event::add('jeedom::alert', array(
        'level' => 'warning',
        'page' => 'zigate',
        'message' => 'Nouvel équipement ZiGate ajouté',
    ));
    $eqLogic = zigate::byLogicalId($addr, 'zigate');
    event::add('zigate::device_changed',$eqLogic->getId());
}
elseif ($action == 'ZIGATE_DEVICE_UPDATED'){
    zigate::syncDevice($results['device']);
}
elseif ($action == 'ZIGATE_DEVICE_REMOVED'){
    zigate::removeDevice($results['addr']);
    event::add('zigate::device_changed','');
}
elseif ($action == 'ZIGATE_DEVICE_NEED_REFRESH'){
    $device = $results['device'];
    $eqLogic = zigate::byLogicalId($device['addr'], 'zigate');
    message::add('zigate', 'L\'équipement ZiGate '.$eqLogic->getName().' requiert un rafraichissement.');
}
elseif ($action == 'ZIGATE_ATTRIBUTE_ADDED'){
    zigate::syncDevice($results['device']);
}
elseif ($action == 'ZIGATE_ATTRIBUTE_UPDATED'){
    if (isset($results['device'])) {
        $device = $results['device'];
        $eqLogic = zigate::byLogicalId($device['addr'], 'zigate');
        if (is_object($eqLogic)) {
            $attribute = $results['attribute'];
            $endpoint = $attribute['endpoint'];
            $logicId = $device['addr'].'.'.$attribute['endpoint'].'.'.$attribute['cluster'].'.'.$attribute['attribute'];
          	if (isset($attribute['value'])){
              $value = $attribute['value'];
            }
          	else {
            	$value = $attribute['data'];
            }
            log::add('zigate','debug','Device Update '.$logicId.' '.$value);
            $cmd = $eqLogic->getCmd(null,$logicId);
          	if (is_object($cmd)){
            	$cmd->event($value);
            	$eqLogic->setStatus('lastCommunication', $device['info']['last_seen']);
            	$eqLogic->setStatus('rssi', $device['info']['rssi']);
            	if (isset($attribute['name'])){
                	if ($attribute['name'] == 'battery'){
                	    $eqLogic->evaluateBattery($value);
                	}
            	}
            }
          	else {
          	    zigate::syncDevice($device);
          	}
        }
    }
}
elseif ($action == 'ZIGATE_FAILED_TO_CONNECT'){
    message::add('zigate', $results['message']);
}
elseif ($action == 'message'){
    message::add('zigate', $results['message']);
}
echo json_encode($response);
?>
