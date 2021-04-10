<?php

header("Pragma: no-cache");
header("Cache-Control: no-cache");
header("Expires: 0");

// following files need to be included
require_once("./lib/config_paytm.php");
require_once("./lib/encdec_paytm.php");

$paytmChecksum = "";
$paramList = array();
$isValidChecksum = "FALSE";

$paramList = $_POST;
$paytmChecksum = isset($_POST["CHECKSUMHASH"]) ? $_POST["CHECKSUMHASH"] : ""; //Sent by Paytm pg

//Verify all parameters received from Paytm pg to your application. Like MID received from paytm pg is same as your application�s MID, TXN_AMOUNT and ORDER_ID are same as what was sent by you to Paytm PG for initiating transaction etc.
$isValidChecksum = verifychecksum_e($paramList, PAYTM_MERCHANT_KEY, $paytmChecksum); //will return TRUE or FALSE string.


if($isValidChecksum == "TRUE") {
	if ($_POST["STATUS"] == "TXN_SUCCESS") {
	    
		
		echo "<body style='background-color:teal'>";
		echo "<h1 style='text-align:center;font-size:40px;padding-top:200px;'>Your payment is successful!</h1></body>" ;
		echo "<h1 style='text-align:center;font-size:40px;'>Thankyou for Shopping.</h1>" ;?>
		<form class="d-flex" action="index.php">
           <center> <button type="submit" class="btn">Back to home <i class="fas fa-search"></i> </button></center>
          </form>
<?php	}
	else {
		echo "<body style='background-color:teal'><b style='font-size:40px;padding:250px;text-align:center;'>Transaction status is failure</b></body>" . "<br/>";
	}



	/*if (isset($_POST) && count($_POST)>0 )
	{ 
		foreach($_POST as $paramName => $paramValue) {
				echo "<br/>" . $paramName . " = " . $paramValue;
		}
	}*/
	

}
else {
	echo "<b>Checksum mismatched.</b>";
	//Process transaction as suspicious.
}

?>