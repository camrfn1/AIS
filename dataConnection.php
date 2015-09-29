<?php
/********** API KEY AUTHENTICATION STARTS **********/
include 'apiAccess.php';

if("$encryptedKey" == "$API_KEY" && "$encryptedKey" != "")
{
	//echo "<p style=\"color:green; font-size:60px; font-weight:bold;text-align:center\">Access Granted</p>";

	$server = 'localhost';
	$username = 'cmiranda2012';
	$password = 'jebin1989';
	$database = 'cmiranda2012';
	$table = 'ais_inventory';

	// _GET Data
	$assetID = $_GET["aID"];
	$assetDescription = $_GET["aDesc"];
	$assetStatus = $_GET["aStatus"];

	// Trim Whitespace & Upper Case _GET Data String
	$assetID = trim(strtoupper($assetID));
	$assetDescription = trim(strtoupper($assetDescription));
	$assetStatus = trim(strtoupper($assetStatus));
}
/********** START ACCESS DENIED **********/
else
{
	echo "<p style=\"color:red; font-size:60px; font-weight:bold;text-align:center\">Access Denied</p>";
}

/********** END ACCESS DENIED **********/

/********** API KEY AUTHENTICATION ENDS **********/
?>
