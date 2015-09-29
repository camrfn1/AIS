<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"

include 'dataConnection.php'; //API KEY AUTHENTICATION & DATA CONNECTION

/********** START ACCESS GRANTED **********/
if("$encryptedKey" == "$API_KEY")
{
  echo "<title>Check Out Record | iOS Programming</title>";

  if($assetID) { echo "Asset ID: $assetID<br>"; }
  if($assetDescription) { echo "Asset Description: $assetDescription<br>"; }
  if($assetStatus) { echo "Asset Status: $assetStatus<br>"; }

// Connection Parameters
  $con = mysqli_connect($server,$username,$password,$database);

// Check connection
  if (mysqli_connect_errno($con))
  {
    echo "Failed to connect to database: " . mysqli_connect_error();
    die();
  }

  /********** QUERY UPDATING HOWEVER WILL ALWAYS BE TRUE REGARDLESS OF ASSET ID UNLESS A STRING *********/

// Execute UPDATE QUERY
//http://lamp.cse.fau.edu/~cmiranda2012/checkOutAssetphp?aID=9999&aStatus=1&eKey=$encryptedKey
  if($assetID != "" && mysqli_query($con,"UPDATE ais_inventory
   SET assetStatus = !assetStatus
 WHERE assetID = $assetID;")) 
  {
   echo "Record updated into $table table successfully.<br>";
    return true;
   }
   else if($assetID == "" || $assetStatus == "")
   {
   echo "<strong>aID</strong> or <strong>aStatus</strong> can not be empty!<br>";
//	return false;
 }
 else
 {
   echo "Record was not inserted into $table table. <span style=\"color:red\">Asset: $aID does not exist in the inventory system.</span><br>";
//	return false;
 }

 mysqli_close($con);
 die();

}
/********** END ACCESS GRANTED **********/

?>
