<?php
require_once "pdo.php";
session_start();
if(isset($_GET['add'])){ 
     if(isset($_SESSION['uid']))  {
       $quantity = $_GET['quantity'];
        $pid=$_GET['pid'];
        $uid=$_SESSION['uid'];
        $sql="SELECT * FROM cart WHERE uid= :xyz";
         $stmt=$pdo->prepare($sql);
         $stmt->execute(array(":xyz" => $uid));
         if($row= $stmt->fetch(PDO::FETCH_ASSOC)){
            $orderno=$row['orderno'];
          while($quantity!=0){
            $orderno = $orderno . "," . $pid ;

            $quantity=$quantity-1;
           }
        $sql1 = "UPDATE cart SET orderno = '$orderno' WHERE uid= :xyz";
        $stmt=$pdo->prepare($sql1);
        $stmt->execute(array(":xyz" =>$uid));
         }
         else{
            $orderno=$pid;
            $quantity=$quantity-1;
            while($quantity!=0){
            $orderno = $orderno . "," . $pid ;
            $quantity=$quantity-1;
           }
           $sql1 = "INSERT INTO cart (uid,orderno) values (?,?)";
          $stmt= $pdo->prepare($sql1);
          $stmt->execute([$uid,$orderno]);
         
         }       
     } 
      else{
        
             header('Location: signin.php');
             return;
      } 
}

if(isset($_GET['bookslot'])){ 
  if(isset($_SESSION['uid']))  {
    $quantity = $_GET['quantity'];
     $pid1=$_GET['pid'];
     $uid1=$_SESSION['uid'];
     //$sql="SELECT * FROM cart WHERE uid= :xyz";
      //$stmt=$pdo->prepare($sql);
      //$stmt->execute(array(":xyz" => $uid));
      //if($row= $stmt->fetch(PDO::FETCH_ASSOC)){
      //   $orderno=$row['orderno'];
       /* while($quantity!=0){
         $orderno = $orderno . "," . $pid ;

         $quantity=$quantity-1;
        }
     $sql1 = "UPDATE cart SET orderno = '$orderno' WHERE uid= :xyz";
     $stmt=$pdo->prepare($sql1);
     $stmt->execute(array(":xyz" =>$uid));
      }
      else{
         $orderno=$pid;
         $quantity=$quantity-1;
         while($quantity!=0){
         $orderno = $orderno . "," . $pid ;
         $quantity=$quantity-1;
        }
        $sql1 = "INSERT INTO cart (uid,orderno) values (?,?)";
       $stmt= $pdo->prepare($sql1);
       $stmt->execute([$uid,$orderno]);
      
      }  */     
  } 
   else{
     
          header('Location: signin.php');
          return;
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
            <button class="btn" type="submit"> <i class="fas fa-search"></i> </button>
          </form>
        </div>
      </div>
    </nav>

</section>

<!---Food Section--->
  <section id="food">
    <div class="container">
    <div class="row">
      <?php
     if($_GET['sub']==1){?>
         <div class="col-12 text-center mb-5 heading">
          <h6>Quick Pick</h6>
          <h3>Mens Clothing</h3>
        </div>
  
       <div class="col-12 filter d-flex justify-content-center align-items-center mb-4">
          <ul class="d-flex flex-wrap mx-auto">
            <li class="list active" data-filter="All">All Items</li>
            <li class="list" data-filter="Tea">TopWear</li>
            <li class="list" data-filter="Healthyfood">Indian&Festive</li>
            <li class="list" data-filter="Vegetables">BottomWear</li>
            <li class="list" data-filter="Masala">FashionAccessories</li>
          </ul>
        </div>
<?php
     }
     elseif($_GET['sub']==2){?>
      <div class="col-12 text-center mb-5 heading">
          <h6>Quick Pick</h6>
          <h3>Medical Suppulies</h3>
        </div>
  
       <div class="col-12 filter d-flex justify-content-center align-items-center mb-4">
          <ul class="d-flex flex-wrap mx-auto">
            <li class="list active" data-filter="All">All Items</li>
            <li class="list" data-filter="Medicines">Medicines</li>
            <li class="list" data-filter="Healthcare">Health care </li>
            <li class="list" data-filter="Equipements">Equipments</li>
          </ul>
        </div>
 <?php     
   }
   elseif($_GET['sub']==3){?>
      <div class="col-12 text-center mb-5 heading">
          <h6>Quick Pick</h6>
          <h3>Dairy Products</h3>
        </div>
  
       <div class="col-12 filter d-flex justify-content-center align-items-center mb-4">
          <ul class="d-flex flex-wrap mx-auto">
            <li class="list active" data-filter="All">All Items</li>
            <li class="list" data-filter="cheese">Cheese/butter/paneer items</li>
            <li class="list" data-filter="Icecream">Ice-creams </li>
            <li class="list" data-filter="pantry">Pantry Products</li>
          </ul>
        </div>
 <?php     
   }
   elseif($_GET['sub']==4){?>
      <div class="col-12 text-center mb-5 heading">
          <h6>Quick Pick</h6>
          <h3>Household Supplies</h3>
        </div>
  
       <div class="col-12 filter d-flex justify-content-center align-items-center mb-4">
          <ul class="d-flex flex-wrap mx-auto">
            <li class="list active" data-filter="All">All Items</li>
            <li class="list" data-filter="Furniture">Furniture</li>
            <li class="list" data-filter="Dining">Dining supplies</li>
            <li class="list" data-filter="Art">Art&Decor</li>
          </ul>
        </div>
 <?php     
   }
    elseif($_GET['sub']==5){?>
      <div class="col-12 text-center mb-5 heading">
          <h6>Quick Pick</h6>
          <h3>Personal Care</h3>
        </div>
  
       <div class="col-12 filter d-flex justify-content-center align-items-center mb-4">
          <ul class="d-flex flex-wrap mx-auto">
            <li class="list active" data-filter="All">All Items</li>
            <li class="list" data-filter="Moisturizers">Moisturizers</li>
            <li class="list" data-filter="Facewash">Facewash</li>
            <li class="list" data-filter="Bodylotion">Body lotion</li>
            <li class="list" data-filter="Hygiene">Hygiene Products</li>
          </ul>
        </div>
 <?php     
   }
    elseif($_GET['sub']==6){?>
      <div class="col-12 text-center mb-5 heading">
          <h6>Quick Pick</h6>
          <h3>Electronic Apllicances</h3>
        </div>
  
       <div class="col-12 filter d-flex justify-content-center align-items-center mb-4">
          <ul class="d-flex flex-wrap mx-auto">
            <li class="list active" data-filter="All">All Items</li>
            <li class="list" data-filter="small">Home&Kitchen</li>
            <li class="list" data-filter="large">Large Appliances </li>
            <li class="list" data-filter="home">Home improvement</li>
          </ul>
        </div>
 <?php     
   }
 ?>      
    
        
<?php 
    $sql="SELECT * FROM products WHERE cno= :xyz";
    $stmt=$pdo->prepare($sql);
    $stmt->execute(array(":xyz" => $_GET['sub']));
  while($row= $stmt->fetch(PDO::FETCH_ASSOC)){ 
      if($row['subno']==1){ ?>
         <div class="col-lg-4 col-md-6 col-sm-6 mb-4 main Tea">
      <?php }    
      elseif($row['subno']==2){?>
         <div class="col-lg-4 col-md-6 col-sm-6 mb-4 main Healthyfood">    
      <?php }     
      elseif($row['subno']==3){?>
         <div class="col-lg-4 col-md-6 col-sm-6 mb-4 main Vegetables">    
     <?php } 
     elseif($row['subno']==4){?>
         <div class="col-lg-4 col-md-6 col-sm-6 mb-4 main Masala">    
     <?php }
     elseif($row['subno']==5){?>
         <div class="col-lg-4 col-md-6 col-sm-6 mb-4 main Dryfruits">    
     <?php } 
     elseif($row['subno']==6){?>
         <div class="col-lg-4 col-md-6 col-sm-6 mb-4 main Icecream">    
     <?php }
     elseif($row['subno']==7){?>
         <div class="col-lg-4 col-md-6 col-sm-6 mb-4 main Moisturizers">    
     <?php } 
     elseif($row['subno']==8){?>
         <div class="col-lg-4 col-md-6 col-sm-6 mb-4 main Facewash">    
     <?php }  
     elseif($row['subno']==9){?>
         <div class="col-lg-4 col-md-6 col-sm-6 mb-4 main Bodylotion">    
     <?php } 
     elseif($row['subno']==10){?>
         <div class="col-lg-4 col-md-6 col-sm-6 mb-4 main Hygiene">    
     <?php } 
     elseif($row['subno']==11){?>
         <div class="col-lg-4 col-md-6 col-sm-6 mb-4 main cheese">    
     <?php }
     elseif($row['subno']==12){?>
         <div class="col-lg-4 col-md-6 col-sm-6 mb-4 main pantry">    
     <?php }
     elseif($row['subno']==13){?>
         <div class="col-lg-4 col-md-6 col-sm-6 mb-4 main Medicines">    
     <?php }
     elseif($row['subno']==14){?>
         <div class="col-lg-4 col-md-6 col-sm-6 mb-4 main Healthcare">    
     <?php }
     elseif($row['subno']==15){?>
         <div class="col-lg-4 col-md-6 col-sm-6 mb-4 main Equipements">    
     <?php }
      elseif($row['subno']==16){?>
         <div class="col-lg-4 col-md-6 col-sm-6 mb-4 main small">    
     <?php }
      elseif($row['subno']==17){?>
         <div class="col-lg-4 col-md-6 col-sm-6 mb-4 main large">    
     <?php }
      elseif($row['subno']==18){?>
         <div class="col-lg-4 col-md-6 col-sm-6 mb-4 main home">    
     <?php }
      elseif($row['subno']==19){?>
         <div class="col-lg-4 col-md-6 col-sm-6 mb-4 main Furniture">    
     <?php }
     elseif($row['subno']==20){?>
         <div class="col-lg-4 col-md-6 col-sm-6 mb-4 main Dining">    
     <?php }
      elseif($row['subno']==21){?>
         <div class="col-lg-4 col-md-6 col-sm-6 mb-4 main Art">    
     <?php }
      ?>
      <form method="get">
          <div class="foodWrapper">

            <div class="foodImgContainer">
              <?php 
               echo '<img style="height: 200px; width: 150px;" class="img-fluid" src="data:image/jpeg;base64,'.base64_encode( $row['img'] ).'" alt="" srcset="">'
              ?>
            
            </div>

            <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i
              class="fas fa-star"></i><i class="fas fa-star"></i>

            <h5><?php echo htmlentities($row['pname']); ?></h5>
            <p>₹ <?php echo htmlentities($row['cost']); ?> <br>
              <label for="product">*Quantity :-</label>
                   <select id="quantity" name="quantity">
                   <option value="1">1</option>
                   <option value="2">2</option>
                   <option value="3">3</option>
                   </select>
            </p>
            <p><input type="hidden" name="pid" value="<?= $row['pno'] ?>">
            <p><input type="hidden" name="sub" value="<?= $_GET['sub'] ?>">
            
            <button input type="submit" name="add" value="add" class="btn">Add to Cart <i class="fas fa-cart-plus"></i> </button>
            <button input type="submit" name="bookslot" value="bookslot" class="btn"><a style="text-decoration: none; color: black;" href="bookslot.php?pid=<?php echo $row['pno']; ?>">Book Offline <i class="fas fa-thumbtack"></i></a> </button>
          </div>
       </form>   
        </div>      
 <?php 
 }
?> 


        <div class="col-12 text-center my-4 view">
          <p><a style="text-decoration: none; color: black;" href="categories.php">View More Category</a> <i class="fas fa-location-arrow"></i> </p>
        </div>

      </div>
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

<!---Filter jquery Code-->
<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
    crossorigin="anonymous"></script>

  <script>
    $(document).ready(function () {
      $('.list').click(function () {
        const value = $(this).attr('data-filter');
        if (value == 'All') {
          $('.main').show('1000');
        }

        else {
          $('.main').not('.' + value).hide('1000');
          $('.main').filter('.' + value).show('1000');
        }
      })

      //add active class on selected item

      $('.list').click(function () {
        $(this).addClass('active').siblings().removeClass('active');
      })
    }


    )
  </script>


<!---Bootstrap JS-->
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
    integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/js/bootstrap.min.js"
    integrity="sha384-5h4UG+6GOuV9qXh6HqOLwZMY4mnLPraeTrjT5v07o347pj6IkfuoASuGBhfDsp3d"
    crossorigin="anonymous"></script>

</body>
</html>