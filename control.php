<?php
$state = $_GET["state"];
$node = $_GET["device"];

$code = "533";

if ($state == "on")
        $status = "F1";
else if ($state == "off" || $state == 0)
        $status = "F0";
else if (is_numeric($state))
        $status = "FdP" . ROUND($state * 0.32);


$broadcast_string = $code . ",!" . $node . $status;
sendMessage($broadcast_string);

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
}
?>
