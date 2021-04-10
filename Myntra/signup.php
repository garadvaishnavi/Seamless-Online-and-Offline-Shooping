<?php
    ob_start();
    $error=NULL;
    if(isset($_POST['submit']))
    {
 
        $fname=$_POST['fullname'];
        $phone=$_POST['phone'];
        $wing=$_POST['wing'];
        $floor=$_POST['floor'];
        $e=$_POST['email'];
        $pwd=$_POST['pwd'];
        $p2=$_POST['pwd2'];
        
       
        if($p2 != $pwd){?>
            <script> alert("Your passwords do not match"); </script>
       <?php }
        else{
            //form is valid
            //connect to mysql database
            $conn = mysqli_connect("localhost","root","","wdpbl");

            //sanitize form data
            $fname = $conn->real_escape_string($fname);
            $phone = $conn->real_escape_string($phone);
            $wing = $conn->real_escape_string($wing);
            $floor = $conn->real_escape_string($floor);
            $e = $conn->real_escape_string($e);
            $pwd = $conn->real_escape_string($pwd);
            $p2 = $conn->real_escape_string($p2);
            
            $sql = "Select * from logindetails where email = '$e'";
            $result = $conn->query($sql);
            $row= $result->fetch_assoc();
            //if(empty($row))
            if($row){?>
                <script> alert("Email already exists"); </script>
            <?php }
            else{
            //generate vkey
            $vkey = md5(time().$e);

            //insert into database
            $pwd = md5($pwd);
            $insert = "INSERT INTO logindetails (fullname,phone,wing,floor,email,password,vkey) VALUES('$fname','$phone','$wing','$floor','$e','$pwd','$vkey')";
            if(mysqli_query($conn,$insert)){
                
                    $adminmail = "garadvaishnavi04@gmail.com";
                    $subject = "Email Verification";
                    $body = "http://localhost/pbl/SignupVerification.php/SignupVerification.php?vkey=$vkey";
                    $headers = "From: garadvaishnavi04@gmail.com";
                    $headers1 = "From: $adminmail";
                    if (mail($e, $subject, $body, $headers) && mail($e,$subject,$body,$headers1)) {?>
                       <script>
                            alert("Email successfully sent");
                            window.location.href = "signin.php";
                       </script>
                    
                   <?php } else {?>
                   <script>
                       alert("Email sending failed...");
                   </script>
                      
                 <?php   }
                    
                ob_end_flush();
                
            }
            else{
                echo mysqli_error($conn);
            
                }


        }

    }
}
?>

<!DOCTYPE html>  
<html lang="en">  
<head>  
<meta name="viewport" content="width=device-width, initial-scale=1">  
<title>Sign up</title>
<link rel="stylesheet" type="text/css" href="mystyles.css">
<style>
  body
  {
    background-image: url('loginbg.jpg');
    background-repeat: no-repeat;
    background-size: cover;
  }
</style>
</head>  
<body onload="document.signup.fullname.focus();">  
<script src="signup.js"></script>  
<center>
<form name='signup' action="" onSubmit="return formValidation();" method="post">  
  <div class="wrapper">   
  <div>
    <h2 style=" text-align: center; "><u>Account Sign up</u></h2>
    <div>
      <label for="fullname"><b>User name </b></label>   
        <input type="text" name="fullname" placeholder= "User name" size="20" required />
    </div>  
    <br>
    <div>  
      <label for="phone"><b>Phone no. <b></label>
        <input type="text" name="phone" placeholder="phone no." size="15"/ required>
    </div>
    <br>
    <div>
      <label><b>Wing </b></label>  
         <select style="box-sizing: border-box;height: 27px; width: 50px;border-radius: 10px;background: #C0C0C0;color: #fff;" id="select" class="required" name="wing" required>  
          <option value="wing">-</option>  
          <option value="A">A</option>
          <option value="B">B</option> 
          <option value="C">C</option> 
          <option value="D">D</option>    
        </select>  
      <label><b>Floor </b></label>  
        <select style="box-sizing: border-box;height: 30px; width: 100px;border-radius: 10px;background: #C0C0C0;color: #fff;" id="select" class="required" name="floor" required>  
          <option value="floor">Floor</option>  
          <option value="1st Floor">1st Floor</option>
          <option value="2nd Floor">2nd Floor</option>  
          <option value="3rd Floor">3rd Floor</option>  
          <option value="4th Floor">4th Floor</option>  
          <option value="5th Floor">5th Floor</option>  
          <option value="6th Floor">6th Floor</option>    
        </select>  
    </div>
    <br>
    <div>
      <label for="email"><b>Email</b></label>  
        <input type="text" placeholder="Enter Email" name="email" title="Enter correct password" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required>  
    </div>
    <br>  
    <div>
      <label for="psw"><b>Password</b></label>  
        <input type="password" placeholder="Enter Password" title="Password must contain at least 6 characters,
including UPPER/lowercase and numbers." pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" name="pwd" required>  
    </div>
    <br>
    <div>  
      <label for="psw_repeat"><b>Re-type Password</b></label>  
        <input type="password" placeholder="Retype Password" name="pwd2" required>  
    </div>
    <p><input type="checkbox" checked="checked" name="terms">By creating an account you agree to our <a href="terms.html">Terms & Privacy</a>.</p>
    <input type="submit" name="submit" value="Sign up" class="registerbtn">
</form>  
</center>
</body>  
</html>