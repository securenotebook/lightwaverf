<?php
include ("php_config.php");


$state = $_GET["state"];
$node = $_GET["device"];
$siri = $_GET["siri"];

$code = "533";

//used for siri set everything to lower case
if ($siri == 'true'){
    $node = $global_devices[strtolower($node)];
}

if ($state == "on")
	$status = "F1";
else if ($state == "off" || $state == 0)
	$status = "F0";
else if (is_numeric($state))
	$status = "FdP" . ROUND($state * 0.32);


//loop though all the devices in php_config.php
if ($node == 'all'){
    foreach ($global_devices as $key=>$value){
        if ($value !='all'){
            $broadcast_string = $code . ",!" . $value . $status;
            sendMessage($broadcast_string);
        }
     }
}else{
    $broadcast_string = $code . ",!" . $node . $status;
    sendMessage($broadcast_string);
}


/**
 * @param $broadcast_string
 */
function sendMessage($broadcast_string){

    print $broadcast_string;
    $port = 9760;
    $sock = socket_create(AF_INET, SOCK_DGRAM, SOL_UDP);
    socket_set_option($sock, SOL_SOCKET, SO_BROADCAST, 1);
    socket_sendto($sock, $broadcast_string, strlen($broadcast_string), 0, '255.255.255.255', $port);
    socket_close($sock);
    //sleep between messages - wifi hub isnt fast enough
    //sleep(1);
	// This is better:
	if (time_nanosleep(0, 250000000) === true) {
	    //echo "Slept for 250ms\n";
	}
}


?>