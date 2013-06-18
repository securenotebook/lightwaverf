<?

//Used for Sir integration
$global_devices['tv']               ='R1D1';
$global_devices['living room']      ='R1D1';
$global_devices['kitchen']      	='R1D3';

$global_devices['webcam']           ='R1D6';

$global_devices['bedroom']          ='R2D1';
$global_devices['ensuite']          ='R2D2';

$global_devices['bathroom']         ='R3D1';
$global_devices['all'] 				='all';

$roomDevices['Living Room']['R1D1']['DeviceType'] = 'Dimmer';
$roomDevices['Living Room']['R1D1']['Name'] = 'Main Lights';
$roomDevices['Living Room']['R1D1']['OffState'] = 'Off';

$roomDevices['Living Room']['R1D5']['DeviceType'] = 'Dimmer';
$roomDevices['Living Room']['R1D5']['Name'] = 'Kitchen';
$roomDevices['Living Room']['R1D5']['OffState'] = 'Off';

$roomDevices['Living Room']['R1D6']['DeviceType'] = 'Switch';
$roomDevices['Living Room']['R1D6']['Name'] = 'Webcam';
$roomDevices['Living Room']['R1D6']['OffState'] = 'On';


$roomDevices['Master Bedroom']['R2D1']['DeviceType'] = 'Dimmer';
$roomDevices['Master Bedroom']['R2D1']['Name'] = 'Master Bedroom';
$roomDevices['Master Bedroom']['R2D1']['OffState'] = 'Off';

$roomDevices['Master Bedroom']['R2D2']['DeviceType'] = 'Dimmer';
$roomDevices['Master Bedroom']['R2D2']['Name'] = 'Bathroom';
$roomDevices['Master Bedroom']['R2D2']['OffState'] = 'Off';

$roomDevices['Bathroom']['R3D1']['DeviceType'] = 'Dimmer';
$roomDevices['Bathroom']['R3D1']['Name'] = 'Bathroom';
$roomDevices['Bathroom']['R3D1']['OffState'] = 'Off';

?>

