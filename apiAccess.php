<?php
/********** API SECURITY STARTS **********/
// _GET Data
$encryptedKey = $_GET["eKey"]; //Retrieve Encrypted Key
// Trim Whitespace _GET Data String
$encryptedKey = trim($encryptedKey);

//PARAMETER EXAMPLE: http://lamp.cse.fau.edu/~cmiranda2012/checkOutAsset.php?aID=9999&aDesc=lapiz&aStatus=1&eKey=3q4FK!jcbHc@l7nQp82PoNaaj~kwGRfqOCGhtfCyZw@ws9igZ^XJq92HmmXJDKm$

if("$encryptedKey" == "3q4FK6jcbHc2l7nQp82PoNaaj0kwGRfqOCGhtfCyZw5ws9igZ9XJq92HmmXJDKm1")
{
// APPLICATION SECRET KEY

$API_KEY = "3q4FK6jcbHc2l7nQp82PoNaaj0kwGRfqOCGhtfCyZw5ws9igZ9XJq92HmmXJDKm1";
}
/********** API SECURITY ENDS **********/
?>
