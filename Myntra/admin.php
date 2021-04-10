<?php 
session_start();
$conn = mysqli_connect("localhost","root","","wdpbl");
$retailerid = $_SESSION['rid'];
// SQL query to select data from database 
$sql = "SELECT * FROM offlinebookings where retailerid = '$retailerid'"; 
$result = $conn->query($sql); 

if(isset($_POST['submit'])){
    $bid_of_purchased = $_POST['bid'];
    $useremail = $_POST['useremail'];
    $sql12 = "UPDATE offlinebookings SET purchased=1 WHERE bid ='$bid_of_purchased'";
    $update = $conn->query($sql12);
    if($update){
      $to_email = $useremail;
      $subject = "Feedback For your Seamless Online/offline Shopping";
      $body = "Kindly fill this feedback form and help us to provide you a better user experience
      https://forms.gle/3BVmRRgpjdAMPrUN9 ";
      $headers = "From: salonigharge035@gmail.com";

      if (mail($to_email, $subject, $body, $headers)) {
         // echo "Email successfully sent to $to_email...";
      } else {
         // echo "Email sending failed...";
}
    }else{
        echo("error");
    }
}

?>  
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Shop&Safe</title>

  <!---Bootstrap CSS-->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/css/bootstrap.min.css"
    integrity="sha384-DhY6onE6f3zzKbjUPRc2hOzGAdEf4/Dz+WJwBvEYL/lkkIsI3ihufq9hk9K4lVoK" crossorigin="anonymous">


  <!---Custom CSS-->
  <link rel="stylesheet" href="styles.css">


  <!--Google Fonts-->
  <link href="https://fonts.googleapis.com/css2?family=EB+Garamond:wght@500&display=swap" rel="stylesheet">



  <!--Font awesome -->
  <script src="https://kit.fontawesome.com/5888afab31.js" crossorigin="anonymous"></script>



  <!--typed.js cdn-->
  <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.11"></script>



  <!--Animate on Scroll CSS-->
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

  <meta charset="UTF-8">  
    <!-- CSS FOR STYLING THE PAGE --> 
    <style> 
        table { 
            margin: 0 auto; 
            font-size: large; 
            border: 1px solid black; 
        } 
  
        h1 { 
            text-align: center; 
            color: #006600; 
            font-size: xx-large; 
            font-family: 'Gill Sans', 'Gill Sans MT',  
            ' Calibri', 'Trebuchet MS', 'sans-serif'; 
        } 
  
        td { 
            background-color: #E4F5D4; 
            border: 1px solid black; 
        } 
  
        th, 
        td { 
            font-weight: bold; 
            border: 1px solid black; 
            padding: 10px; 
            text-align: center; 
        } 
  
        td { 
            font-weight: lighter; 
        } 
    </style> 

</head>

<body>
   <!---Header Section-->
  <section id="header" style="background-color: #0B0320;">


    <!---Navigation-->

    <nav class="navbar navbar-expand-lg navbar-light" >
      <div class="container">
        <a class="navbar-brand" href="#">Shop&Safe</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="categories.php">Category</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="cart.php">Cart</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="aboutus.php">About Us</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="contactus.php">Contact</a>
            </li>
            <?php
                if(isset($_SESSION['uid'])){ ?>
               <li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>
          <?php   }
               else{?>
                <li class="nav-item"><a class="nav-link" href="signin.php">Login</a></li>
         <?php    }
              ?>

          </ul>
          <form class="d-flex">
            <input class="form-control mr-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn" type="btn"> <i class="fas fa-search"></i> </button>
          </form>
        </div>
      </div>
    </nav>
</section>

    <section style="padding:30px;"> 
        <h1>All booking Details</h1> 
        <!-- TABLE CONSTRUCTION--> 
        <table> 
            <tr style="background-color:#F7B614;"> 
                <th>User Name</th> 
                <th>Contact No</th> 
                <th>Product Booked</th> 
                <th>Cost</th>
                <th>Booking Date</th>
                <th>Booking Status</th>
            </tr> 
            <!-- PHP CODE TO FETCH DATA FROM ROWS--> 
            <?php   // LOOP TILL END OF DATA  
                while($row=$result->fetch_assoc()) 
                { 
                    $pid = $row['pid'];
                    
                    $sql2 = "SELECT * FROM products WHERE pno = '$pid'";
                    $result2 = $conn->query($sql2); 
                    $row2= $result2->fetch_assoc();
                    $pname = $row2['pname'];
                    

                    $uid = $row['uid'];
                    $sql3 = "SELECT * FROM logindetails WHERE uid = '$uid'";
                    $result3 = $conn->query($sql3); 
                    $row3=$result3->fetch_assoc();
                    $uname = $row3['fullname'];
                    $contact = $row3['phone'];
                    $email = $row3['email']
             ?> 
            <tr > 
                <!--FETCHING DATA FROM EACH  
                    ROW OF EVERY COLUMN--> 
                <td><?php echo $uname;?></td> 
                <td><?php echo $contact;?></td> 
                <td><?php echo $pname;?></td>
                <td><?php echo $row['Price'];?></td>  
                <td><?php echo $row['Date'];?></td>
                <td><form method = "post"><input type="hidden" value="<?php echo $row['bid'] ?>" name="bid" > <input type="hidden" value="<?php echo $email ?>" name="useremail" >
                  <button style="border-radius: 8px; background-color:#F7B614; " input type="submit"value="Purchased" name="submit" >Purchased</button></form></td>
            </tr> 
            <?php 
                } 
             ?> 
        </table> 
    </section> 


 
<section id="footer">
<div class="container">
    <div class="row">
        <div class="col-lg-3">
        <div class="footerContainer">
            <h5>Services</h5>
            <ul>
            <li><i class="fas fa-angle-right"></i> Support </li>
            <li><i class="fas fa-angle-right"></i> About </li>
            <li><i class="fas fa-angle-right"></i> Terms </li>
            <li><i class="fas fa-angle-right"></i> Privacy Policy </li>
            </ul>

        </div>
        </div>
        <div class="col-lg-3">
        <div class="footerContainer">
            <h5>Quick Links</h5>
            <ul>
            <li><i class="fas fa-angle-right"></i> Categories </li>
            <li><i class="fas fa-angle-right"></i> Cart </li>
            <li><i class="fas fa-angle-right"></i> About Us </li>
            <li><i class="fas fa-angle-right"></i> Contact Us </li>
            <li><i class="fas fa-angle-right"></i> Login </li>
            </ul>
            
        </div>
        </div>
        <div class="col-lg-3">
        <div class="footerContainer">
            <h5>Contact Us</h5>
            <ul>
            <li><i class="fas fa-phone-alt"></i> 9169068212 </li>
            <li><i class="fas fa-phone-alt"></i> 8457693211 </li>
            <li><i class="fas fa-envelope"></i>example@gmail.com </li>
            <li><i class="fas fa-envelope"></i>example@gmail.com </li>
            <li><i class="fas fa-map-marker-alt"></i> Panvel, Navi mumbai </li>
            </ul>
            
        </div>
        </div>
        <div class="col-lg-3">
        <div class="footerContainer sociallinks">
            <h5>Social Links</h5>
            <ul>
            <li><i class="fab fa-facebook"></i></li>
            <li><i class="fab fa-instagram"></i></li>
            <li><i class="fab fa-twitter"></i></li>
            <li></li>
            <li></li>
        </ul>


            
        </div>
        </div>

    </div>
</div>
</section>
</body> 
  
</html>