
<? include ("php_config.php");?>


<!-- You shouldnt really edit below unless you know what you are doing -->
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <title></title>
    <link rel="stylesheet" href="css/jquery.mobile-1.3.1.min.css">

    <!-- Extra Codiqa features -->
    <link rel="stylesheet" href="javascript/codiqa.ext.css">

    <!-- jQuery and jQuery Mobile -->
    <script src="javascript/jquery-1.9.1.min.js"></script>
    <script src="javascript/jquery.mobile-1.3.1.min.js"></script>


    <script type="text/javascript">


        var controlLights = function($deviceId, $state) {
	        
	       //if its all, then set all ToggleSwitch to off
	       if ($deviceId == 'all') {
		       //select all eclements that end with ToggleSwitch to off and refesh it...
		       $("[id$=ToggleSwitch]").val('off').slider("refresh");		       
	       }


            var control = 'control.php?device=' + $deviceId +'&state=' + $state + '&siri=false';
            $.ajax({
                url: control
            })

            var toggle = '#' + $deviceId + 'ToggleSwitch';

            //enable the button if the value is >0
            if ($state != 'on' && $state !='off'){

                if($state >0)
                    $('#' + $deviceId + 'ToggleSwitch').val('on').slider("refresh");
                else
                    $('#' + $deviceId + 'ToggleSwitch').val('off').slider("refresh");

            }
        };


        // Loads the slides change events
        // links the button to the slider
        var loadSliderEvents = function($deviceId) {

	        // think this can be cleaned up.... maybe just on stop...
            var sliderOpts = {
                change: function() {
                    controlLights($deviceId, this.value)
                },
                slide: function() {
                    controlLights($deviceId, this.value)
                },
                start: function() {
                    controlLights($deviceId, this.value)
                },
                stop: function() {
                    controlLights($deviceId, this.value)
                }
            };
            $('#' + $deviceId + 'Slider').slider(sliderOpts);
        };

        var loadSliderToggle = function($deviceId) {

            var sliderOpts = {
                change: function() {
                },
                slide: function() {
                },
                start: function() {
                },
                stop: function() {
                    var myswitch = $(this);
                    var show     = myswitch[0].selectedIndex == 1 ? true:false;

                    if (show)
                        controlLights($deviceId, 'on');
                    else
                        controlLights($deviceId, 'off');
                }
            };

            $('#' + $deviceId + 'ToggleSwitch').slider(sliderOpts);
        };

        var OffDevices = function($deviceId, $state) {
            controlLights($deviceId, $state);
        };

        
        $().ready(function(){

            <?	        
	        // loop through all the devices and assign the events to them
	        // took a long time to work this one out!!
            foreach ($roomDevices as $roomName => $device){
	            
	             //each device R1D1 R1D2 etc... assign events to the buttons and sliders
                 foreach ($device as $DeviceKey=>$value){

                     if ($value['DeviceType'] == 'Dimmer')
                         print "loadSliderEvents(\"" . $DeviceKey . "\");\n";

                     print "loadSliderToggle(\"" . $DeviceKey . "\");\n";
                     
                 }
             }
 ?>
        });

 </script>
<script src="javascript/codiqa.ext.js"></script>

</head>
<body>
<!-- Home -->
<div data-role="page" id="page1">
    <div id="Header" data-theme="c" data-role="header" data-position="fixed" class="header">
        <h3>
            LightWaveRF
            <input type="submit" id="all" data-icon="alert" data-iconpos="top" value="Leave House" onclick="controlLights('all', 'off')">
         </h3>


        <div data-role="collapsible-set">

            <?foreach ($roomDevices as $roomName => $device){?>

            <div data-role="collapsible" data-collapsed="true">
                <h3><? print $roomName; ?></h3>
                <div id="<? print $roomName; ?>">
                <table width="100%">
                    <?
                    //loop through all the rooms building the html
                    foreach ($device as $DeviceKey=>$deviceDetails){
                    ?>

                        <tr>
                            <td width=50%><img src="thumbs/light.png"/> <? print $deviceDetails['Name'] ;?></td>
                            <td width=50%>
                                <div data-role="fieldcontain">
                                    <select id="<? print $DeviceKey; ?>ToggleSwitch" data-role="slider">
                                        <option value="off">
                                            Off
                                        </option>
                                        <option value="on">
                                            On
                                        </option>
                                    </select>
                                </div>
                            </td>
                        </tr>

                        <!-- if its a dimmer then add the slider -->
                        <? if ($deviceDetails['DeviceType'] == 'Dimmer') {?>
                            <tr>
                                <td colspan="2">
                                    <div data-role="content">
                                       <input id="<? print $DeviceKey; ?>Slider" type="range" name="slider" value="0" min="0" max="100" data-highlight="true">
									</div>
                                </td>
                            </tr>
                        <?}?>

                    <?}?>

                    </div>

                    <!--tr>
                        <td colspan="2">
                            <input type="submit" data-icon="alert" data-iconpos="top" value="All Off">
                        </td>
                    </tr-->
                </table>
            </div>
        </div>
        <?

        //break;
        }?>

    </div>
</div>
</body>
</html>
