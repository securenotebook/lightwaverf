<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="yes" name="apple-mobile-web-app-capable" />
<meta content="index,follow" name="robots" />
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<link href="pics/homescreen.gif" rel="apple-touch-icon" />
<meta content="minimum-scale=1.0, width=device-width, maximum-scale=0.6667, user-scalable=no" name="viewport" />
<link href="css/style.css" rel="stylesheet" media="screen" type="text/css" />
<script src="javascript/functions.js" type="text/javascript"></script>
<title>Home Controller</title>
<meta content="iPod,iPhone,Webkit,iWebkit,Website,Create,mobile,Tutorial,free" name="keywords" />
<meta content="now completly styles thanks to css these form elements are lighter and easier to use than ever before." name="description" />
</head>

<body>

<div id="topbar">
	<div id="leftnav">
		<a href="index.php"><img alt="home" src="images/home.png" /></a></div>
</div>
<div id="content">
	<form method="get" id="on" action="control.php">
	<ul class="pageitem">
		<li class="button"><input name="on" type="submit" value="On" /></li>
		<input name="device" type="hidden" value="<?php echo $_GET["device"]; ?>" />
		<input name="state" type="hidden" value="on" />
		
	</ul>
	</form>

	<form method="get" id="off" action="control.php">
	<ul class="pageitem">
		<li class="button"><input name="off" type="submit" value="Off" /></li>
		<input name="device" type="hidden" value="<?php echo $_GET["device"]; ?>" />
		<input name="state" type="hidden" value="off" />
		
	</ul>
	</form>
<?php
$d=$_GET["dim"];
if ($d=="y")
  {
?>
	<ul class="pageitem">
	<li class="button"><form method="get" id="highest" action="control.php">
		<input name="highest" type="submit" value="Highest" />
		<input name="device" type="hidden" value="<?php echo $_GET["device"]; ?>" />
		<input name="state" type="hidden" value="100" />
		
	</form></li>
	<li class="button"><form method="get" id="high" action="control.php">
		<input name="high" type="submit" value="High" />
		<input name="device" type="hidden" value="<?php echo $_GET["device"]; ?>" />
		<input name="state" type="hidden" value="75" />
		
	</form></li>
	<li class="button"><form method="get" id="med" action="control.php">
		<input name="medium" type="submit" value="Medium" />
		<input name="device" type="hidden" value="<?php echo $_GET["device"]; ?>" />
		<input name="state" type="hidden" value="50" />
		
	</form></li>
	<li class="button"><form method="get" id="low" action="control.php">
		<input name="device" type="hidden" value="<?php echo $_GET["device"]; ?>" />
		<input name="low" type="submit" value="Low" />
		<input name="state" type="hidden" value="25" />
		
	</form></li>
	<li class="button"><form method="get" id="lowest" action="control.php">
		<input name="device" type="hidden" value="<?php echo $_GET["device"]; ?>" /><input name="state" type="hidden" value="5" /><input name="lowest" type="submit" value="Lowest" />
		
	</form></li>
	</ul>

<?php
  }
?>

</div>

</body>

</html>
