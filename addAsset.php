<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"

include 'dataConnection.php'; //API KEY AUTHENTICATION & DATA CONNECTION

/********** START ACCESS GRANTED **********/
if("$encryptedKey" == "$API_KEY")
{
  echo "<title>Add Record | iOS Programming</title>";

  if($assetStatus == "" || $assetStatus != 1 || $assetStatus == NULL)
  {
  $assetStatus = 0; //Default to 0 when adding item to inventory is not true
}

echo "Asset ID: $assetID<br>Asset Description: $assetDescription<br>Asset Status: $assetStatus<br><br>";

// Connection Parameters
$con = mysqli_connect($server,$username,$password,$database);

// Check connection
if (mysqli_connect_errno($con))
{
  echo "Failed to connect to database: " . mysqli_connect_error();
  die();
}
// Create Table IF DOES NOT EXIST
$createTableSQLQuery = "CREATE TABLE  $table (
  `id` INT( 11 ) NOT NULL AUTO_INCREMENT ,
  `assetID` VARCHAR( 25 ) CHARACTER SET utf8 NOT NULL ,
  `assetDescription` VARCHAR( 100 ) CHARACTER SET utf8 NOT NULL ,
  `assetStatus` BIT( 1 ) NOT NULL DEFAULT b'0',
  `assetCreatedDate` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ,
  PRIMARY KEY (  `id` ) ,
  UNIQUE KEY  `assetID` (  `assetID` ) ,
  KEY  `$table assetID` (  `assetID` )
  )";

// Execute CREATE TABLE QUERY
if (mysqli_query($con,$createTableSQLQuery))
{
  echo "$table table created successfully.<br>";
}
else
{
  //echo "Error creating $table table: " . mysqli_error($con) . ".<br>";
}

// Execute INSERT QUERY
//http://lamp.cse.fau.edu/~cmiranda2012/addAsset.php?aID=9999&aDesc=laptop&aStatus=0&eKey=$encryptedKey
if($assetID != "" && $assetDescription != "" && mysqli_query($con,"INSERT INTO $table (assetID, assetDescription, assetStatus)
  VALUES ('$assetID', '$assetDescription', $assetStatus)"))
{
  echo "Record inserted into $table table successfully.<br>";
}
else if($assetID == "" || $assetDescription == "")
{
  echo "<strong>aID</strong> or <strong>aDesc</strong> can not be empty!<br>";
}
else
{
  echo "Record was not inserted into $table table.<br>";

//INCLUDE FUNCTION TO CHECK IF ASSETEXISTS
  include 'functions.php'; 
assetExists($con, $server, $username, $password, $database, $table, $assetID); //Check if exists
}

mysqli_close($con);
die();

}
/********** END ACCESS GRANTED **********/

?>
