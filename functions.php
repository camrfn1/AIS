<?php

/****** START OF FUNCTION ******/
//Function checks to see if asset ID already exists in the database
function assetExists($aCon, $aServer, $aUsername, $aPassword, $aDatabase, $aTable, $aID)
{
// Trim Whitespace & Upper Case _GET Data String
$aID = trim(strtoupper($aID));

// Check Table IF ASSET EXISTS
$sql = mysqli_query($aCon, "SELECT COUNT(assetID) FROM $aTable WHERE assetID ='$aID'");

// Check connection
if (mysqli_connect_errno($aCon))
  {
	echo "Failed to connect to database: " . mysqli_connect_error();
	die();
  }
else
  {
//	echo "Connected to database.<br>";
	if(mysqli_num_rows($sql) > 0 )
	{
		echo "<span style=\"color:red\">Duplicate: $aID exists in the inventory system already.</span><br>";
		return true;
	}
	else if (mysqli_num_rows($sql) == 0)
	{
		echo "$aID does not exist in the inventory.<br>";
		return false;
	}
  }
}

/****** END OF FUNCTION ******/

/****** START OF FUNCTION ******/
//Function checks to see if asset ID already exists in the database
function viewAsset($aCon, $aServer, $aUsername, $aPassword, $aDatabase, $aTable)
{
// Check Table FOR ASSETS COUNT
$assetRecordCountSQL = mysqli_query($aCon, "SELECT COUNT(assetID) FROM $aTable");

// Check connection
if (mysqli_connect_errno($aCon))
  {
	echo "Failed to connect to database: " . mysqli_connect_error();
	die();
  }
else
  {
	if($myCount = mysqli_num_rows($assetRecordCountSQL) > 0 )
	{
	//	echo "Record Count: $assetRecordCountSQL";	//Returns asset record count
		echo "true";
		//return "$assetRecordCountSQL";
		
	}
	else if ($myCount = mysqli_num_rows($assetRecordCountSQL) == 0)
	{
		echo "false";	//No asset records in database
	}
  }
}

/****** END OF FUNCTION ******/

?>
