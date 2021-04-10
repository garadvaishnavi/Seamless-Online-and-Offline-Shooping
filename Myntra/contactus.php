<?php

session_start();

    if(isset($_POST['Submit'])){

      $feed=$_POST['comment'];
        $uid = $_SESSION['uid'];
        $conn = new mysqli("localhost","root","","wdpbl");
        $insert = "INSERT INTO feedback (uid,feed) VALUES('$uid','$feed')";
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
          }
        else{
         if($conn->query($insert) === TRUE){?>
         <script>
           window.location.href = "index.php";
        </script>
     <?php   }

    }       
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="stylesheet" href="styles.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="validation.js"></script>
<title>Society Portal</title>
<style type="text/css">
body{
background-image: url('loginbg.jpg');
background-repeat: no-repeat;
background-size: cover;
}
.wrapper{
max-width: 400px;
border-radius: 10px;
margin:auto;
background: #DCDCDC;
box-sizing: border-box;
padding: 40px;
color: #000000;
margin-top:50px;
margin-bottom: 50px;
}

</style>
</head>
<body onload="document.feedback.firstname.focus();">
<!--FEEDBACK FORM-->
<div class="wrapper" style="text-align: center;
">
   <img align="center" src="logo.png" style="width:150px;height:120px;"><br><br>
   <h1>Send us your Feedback</h1><br>
      <form action="" method="POST" id="feedback" name="feedback">
      <label for="firstname">Full Name: </label>
            <input type="text" class="form-control" id="firstname" name="firstname" placeholder="First Name" >                    
            <br><br>
      <label>Email ID: <input type="text" name="email" placeholder="Email Id" ></label>
            <br><br>
      <label>Contact No.: <input type="tel" name="contact" placeholder="Contact Number" ></label>
      <br><br>
     <label for="approve">
            <strong>May we contact you?</strong>
     </label>
     <input type="checkbox" name="approve" id="approve">
     <select>
         <option>Tel.</option>
         <option>Email</option>
    </select><br><br>
      <label for="comment">Your Feedback</label><br>
      <textarea style="width: 250px;" id="feedback" name="comment" value="comment"></textarea>
      <br><br>                  
<button type="clear" id="clear" >Clear</button>
<button type="submit" id="Submit" value="Submit" name="Submit">Send Feedback</button>
</form>
</div>

<!--FEEDBACK FORM-->

</body>
</html>