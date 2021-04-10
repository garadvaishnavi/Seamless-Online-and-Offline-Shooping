<?php
session_start();
  if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $psw=$_POST['pwd'];
   
    $conn = mysqli_connect("localhost","root","","wdpbl");
    $psw=md5($psw);
    $sql = "SELECT * FROM retailer WHERE RetailerEmail = '$email'";
    $result = $conn->query($sql);
    $row= $result->fetch_assoc();


    if(empty($row)){?>
        <script type="text/javascript">
                        alert("Account doesn't exist");
                        window.location.href = "signup.php"
                        </script>
                       <?php return;

    }
    else{
      if($row['RetailerPassword'] == $psw){
        $_SESSION['rid']=$row['retailerid'];
        //echo ($_SESSION['rid']);
        $_SESSION['email']=$email;
        $_SESSION['name']=$row['RetailerName'];?>
        <script>
        window.location.href = "admin.php";
        </script>
        
<?php }
      else{?>
          <script>
        alert("please enter correct password");
      </script> <?php }
    }
  }
?>
<!DOCTYPE html>  
<html lang="en">  
<head>
  <meta charset="utf-8">  
  <meta name="viewport" content="width=device-width, initial-scale=1.0">  
  <title>Sign in</title>
  <link rel="stylesheet" type="text/css" href="mystyles.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/css/bootstrap.min.css"
    integrity="sha384-DhY6onE6f3zzKbjUPRc2hOzGAdEf4/Dz+WJwBvEYL/lkkIsI3ihufq9hk9K4lVoK" crossorigin="anonymous">

  <style type="text/css">
    body{
    background-image: url('loginbg.jpg');
    background-repeat: no-repeat;
    background-size: cover;
    }
  </style>
</head>  
<body>  
<center>	
<form action="" method="post">  
  <div class="wrapper">  
    <center><img src="logo.png" style="width:150px;height:120px;"></center>
  <div class="image">  
  </div>  
  <div>
  	<h2 style=" text-align: center;"><u>Retailer login</u></h2></div>
  <div>
  	<label for="Username or Email"><b><h3>Email </h3></b></label>  
    <input type="text" placeholder="Username or Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" name="email" title="Please Enter correct Email "required>  
  </div>
  <div>
    <label for="psw"><b><h3>Password </h3></b></label> 
    <input type="password" placeholder="Enter Password" title="Password must contain at least 6 characters,
including UPPER/lowercase and numbers."  name="pwd" class="input" required>
  </div>
  <div>
    <input type="submit" class="registerbtn" value="Signin" name="submit">
    <br><br>
</div>
</form>
</centre>
</body>
</html>