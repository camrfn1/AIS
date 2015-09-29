<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"

include 'dataConnectiontest.php';//API KEY AUTHENTICATION & DATA CONNECTION
include 'apiAccess.php';

/********** START ACCESS GRANTED **********/

  //echo "<title>View All Assets | iOS Programming</title>";
// Connection Parameters
  $con = mysqli_connect($server, $username, $password, $database);
// Check connection
  if ($con->connect_errno)
  {
    echo "Failed to connect to database: " . $con->connect_errno;
    die();
  }
//ACUTAL QUERY
  $result=$con->query("SELECT assetID, assetDescription, assetStatus FROM $table ORDER BY assetID");

  if($result)
  {
// Check Table FOR ASSETS COUNT
    $assetRecordCountSQL = $result->num_rows;
    #echo $assetRecordCountSQL;
    if($assetRecordCountSQL > 0 )
    {
      //DISPLAYS THE WHOLE ASSET TABLE
      $rows= array();
      while ($r = $result->fetch_assoc())
      {
        $rows[]=$r;
      }
      // ********* NEED TO PARSE JSON **********/ 
      echo json_encode($rows);

    }
    elseif ($assetRecordCountSQL == 0)
    { 
      echo "false"; //No asset records in database
    }
  
    $con->close;
}
/********** END ACCESS GRANTED **********/
?>
