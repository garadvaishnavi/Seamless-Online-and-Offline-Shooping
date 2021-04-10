<?php
require_once "pdo.php";
header("Pragma: no-cache");
header("Cache-Control: no-cache");
header("Expires: 0");
session_start();
error_reporting(0);
   if(isset($_GET['delete'])){
   

    $pid=$_GET['pid'];//product id to be deleted
    $uid=$_SESSION['uid'];//user id whose cart product pid has to be deleted
    
    $sql="SELECT * FROM cart WHERE uid= :xyz";
         $stmt=$pdo->prepare($sql);
         $stmt->execute(array(":xyz" => $uid));
         $row= $stmt->fetch(PDO::FETCH_ASSOC);
         $orderno=$row['orderno'];
         $orders = array_fill(0,50,0);
         $orders=(explode(",",$orderno));
         sort($orders);
         $final_array = array_diff($orders,array($pid));
         
         $order_due= implode(",",$final_array);
         if($order_due){
          $sql1 = "UPDATE cart SET orderno = '$order_due' WHERE uid= :xyz";
          $stmt=$pdo->prepare($sql1);
         }
        else{
          $sql1 = "DELETE FROM cart WHERE uid=:xyz";
         $stmt=$pdo->prepare($sql1);
        } 
        if($stmt->execute(array(":xyz" =>$uid))) 
   {
        echo '<script type="text/javascript">';
        echo "alert('Product Deleted Successfully');";

        echo " </script>";
    }
    else{echo '<script type="text/javascript">';
        echo "alert('Unable to delete the product;);";
        echo  " </script>" ;}
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ShopYourWay</title>

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


</head>

<body>

  <!---Header Section-->
  <section id="header" style="background-color: #0B0320;">


    <!---Navigation-->

    <nav class="navbar navbar-expand-lg navbar-light" >
      <div class="container">
        <a class="navbar-brand" href="#">ShopYourWay</a>
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
              <a class="nav-link" href="offlinecart.php">OfflineCart</a>
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
            <button class="btn" type="submit"> <i class="fas fa-search"></i> </button>
          </form>
        </div>
      </div>
    </nav>

</section>



<section id="food">
    <div class="container">
      <div class="row">
        <div class="col-12 text-center mb-5 heading">
          <h6>User's</h6>
          <h3>Shopping Cart</h3>
        </div>

<?php
        $total=0;
        $uid=$_SESSION['uid'];
        $sql="SELECT * FROM cart WHERE uid= :xyz";
         $stmt=$pdo->prepare($sql);
         $stmt->execute(array(":xyz" => $uid));
         $row= $stmt->fetch(PDO::FETCH_ASSOC);
   
    $orderno=$row['orderno'];
    $orders = array_fill(0,50,0);
    $orders=(explode(",",$orderno));
    sort($orders);
    $sorted_orders = array_count_values($orders);
    $sum=0;
    foreach($sorted_orders as $pid => $quantity) {
        $sql1 = "SELECT * FROM products WHERE pno = :xyz";
        $stmt=$pdo->prepare($sql1);
         $stmt->execute(array(":xyz" => $pid));
        if( $rows= $stmt->fetch(PDO::FETCH_ASSOC)){
          $sum= $sum+ ($rows['cost']*$quantity);
         ?>
        <div class="col-lg-4 col-md-6 col-sm-6 mb-4 ">
       <form method="get">   
        <div class="foodWrapper">

            <div class="foodImgContainer">
              <?php 
               echo '<img style="height: 200px; width: 150px;" class="img-fluid" src="data:image/jpeg;base64,'.base64_encode( $rows['img'] ).'" alt="" srcset="">'
              ?>
            <h5><?php echo htmlentities($rows['pname']); ?></h5>
            <h6>Quantity- <?php echo $quantity; ?></h6>
            <p><input type="hidden" name="pid" value="<?= $rows['pno'] ?>">
            <button input type="submit" name="delete" value="delete" class="btn">Delete from Cart <i class="fas fa-cart-plus"></i> </button>
            </div>
         </div>
       </form>
        </div> 
 <?php   }
 else{?>
   <p style="text-align: center;"><b>NO PRODUCT ADDED TO THE CART</b></p>
 <?php
}
 }
?>     
    </div>
    <hr>
    <form action="pgRedirect.php" method="post">
    <div class="row">
        <div class="col-12 text-center mb-5 heading">
          <h1>Proceed To Payment</h1>
          <div class="col-lg-12">
            <div class="foodWrapper">
              <div class="foodImgContainer">
                <H5>Sub Total of your Order : <?php echo $sum ; ?> </H5>
                <input type="hidden" id="total" name="total" value="<?php echo $sum ; ?>">
               <input type="hidden" id="CUST_ID" name="CUST_ID" value="CUST001">
                <input type="hidden" id="INDUSTRY_TYPE_ID" name="INDUSTRY_TYPE_ID" value="Retail">
                <input type="hidden"  id="CHANNEL_ID" name="CHANNEL_ID" value="WEB">
                <input type="hidden" class="form-control" id="ORDER_ID" name="ORDER_ID" size="20" maxlength="20" value="<?php echo  "ORDER" . rand(10000,99999999)?>">
                <input type="hidden" class="form-control" id="Cust_Name" name="Cust_Name" value="<?php echo $_SESSION['name'] ; ?>">
                <input type="hidden" class="form-control" id="TXN_AMOUNT" name="TXN_AMOUNT" value="<?php echo $sum ; ?>" >
                <input type="hidden" id="userid" name="userid" value="<?php echo $_SESSION['uid'] ; ?>">
                <input type="hidden" id="email" name="email" value="<?php echo $_SESSION['email'] ; ?>">
                <button input type="submit" name="pay" value="pay" class="btn">Pay Now<i class="fas fa-cart-plus"></i> </button>
              </div>
            </div>    
          </div>  
        </div>
       </div> 
     </form>  
   </div>
</section>      

<!--Footer Section-->
  <section id="footer">
    <hr style="height:3px;
        background-color:white;
        border: none;">
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
              <li><i class="fas fa-angle-right"></i> Blog </li>
            </ul>

          </div>
        </div>
        <div class="col-lg-3">
          <div class="footerContainer">
            <h5>Quick Links</h5>
            <ul>
              <li><i class="fas fa-angle-right"></i> Services </li>
              <li><i class="fas fa-angle-right"></i> Food Collection </li>
              <li><i class="fas fa-angle-right"></i> Online Order </li>
              <li><i class="fas fa-angle-right"></i> Blog </li>
              <li><i class="fas fa-angle-right"></i> Contact </li>
            </ul>
            
          </div>
        </div>
        <div class="col-lg-3">
          <div class="footerContainer">
            <h5>Contact Us</h5>
            <ul>
            <li><i class="fas fa-phone-alt"></i> 9169068212 </li>
            <li><i class="fas fa-phone-alt"></i> 8457693211 </li>
            <li><i class="fas fa-envelope"></i>example@gmail.com</li>
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