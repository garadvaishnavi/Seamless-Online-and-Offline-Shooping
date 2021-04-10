<?php
if(isset($_GET['vkey'])){
    $vkey = $_GET['vkey'];
    echo $vkey ;
$conn = NEW MYSQLi("localhost","root","","wdpbl");
$resultSet = $conn->query("SELECT verified,vkey FROM logindetails WHERE verified = 0 AND vkey = '$vkey' LIMIT 1");
if($resultSet->num_rows == 1){
   $update = $conn->query("UPDATE `logindetails` SET `verified`=1 WHERE vkey = '$vkey'");
   if($update){
     echo "your account is verified you may now login";
 }else{
    echo $conn->error ;
       }
  }
  else{
         echo "Account invalid or already verified";
    }
}else{
  die("Something went wrong");
}
?>
<html>
    <head>
        
    </head>
    <body>
        <center>
            
        </center>
    </body>
</html>