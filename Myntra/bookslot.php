<?php
session_start();
    $pid = $_GET['pid'];
    $conn = NEW MYSQLi("localhost","root","","wdpbl");
    $sql = "SELECT * FROM products WHERE pno = '$pid'";
    $result = $conn->query($sql);
    $row= $result->fetch_assoc();
    $pname = $row['pname'];
    $pcost = $row['cost'];
    $retailerid = $row['retailerid'];
    $uid = $_SESSION['uid'];
    $sql1 = "SELECT * FROM retailer WHERE retailerid = '$retailerid'";
    $result1 = $conn->query($sql1);
    $row1= $result1->fetch_assoc();
    $retaileradd = $row1['Address'];
    $shopname = $row1['ShopName'];

  if(isset($_POST['submit'])){
      $date = $_POST['date'];
    $sql2 = "INSERT INTO offlinebookings (uid, pid, retailerid, Date, Price) VALUES ('$uid','$pid','$retailerid','$date','$pcost')";
    if(mysqli_query($conn,$sql2)){ ?>
        <script>alert("Slot booked successfully");
                        window.location.href = "categories.php"
        </script> <?php
             return;
    }else{
        echo("error");
    }
  }
?>
<!DOCTYPE html>  
<html lang="en">  
<head>
  <meta charset="utf-8">  
  <meta name="viewport" content="width=device-width, initial-scale=1.0">  
  <title>bookslot</title>
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
<form method="post">  
  <div class="wrapper">   
  <div>
    <h2 style=" text-align: center;"><i>BookSlot</i></h2></div><hr>
  <div>
    <label for="ShopName"><b><h4>Shop: <?php echo $shopname ; ?></h4></b></label>  
  </div>
  <div>
    <label for="Shopadd"><b><h4>Address: <?php echo $retaileradd ; ?></h4></b></label><hr>  
  </div>
  <div>
    <label for="pdtname"><b><h5>Product Booked: <?php echo $pname ; ?></h5></b></label>  
  </div>
  <div>
    <label for="pdtcost"><b><h6>Total Amount: <?php echo $pcost ; ?></h6></b></label><hr>  
  </div>
  <div>
    <label for="slotdate"><b><h4>Preferable Slot- </h4></b></label> 
    <input type="date" id="slotdate" name="date" required>
  </div>
  <div>
    <BUTTON type="submit" class="registerbtn" value="submit" name="submit">Book slot</BUTTON> 
    <br><br>
</div>
</form>
</centre>
</body>
</html>