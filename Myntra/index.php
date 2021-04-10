<?php
require_once "pdo.php";
session_start();
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

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <!---Custom CSS-->
  <link rel="stylesheet" href="style1.css">


  <!--Google Fonts-->
  <link href="https://fonts.googleapis.com/css2?family=EB+Garamond:wght@500&display=swap" rel="stylesheet">



  <!--Font awesome -->
  <script src="https://kit.fontawesome.com/5888afab31.js" crossorigin="anonymous"></script>



  <!--typed.js cdn-->
  <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.11"></script>

<!--Animate on Scroll CSS-->
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

  <!--Animate on Scroll CSS-->

</head>

<body>

  <!---Header Section-->
<section id="header" style="background: linear-gradient(rgba(0, 0, 0, 0.2), rgba(0, 0, 0, 0.9)), url(img/bg.jpg);">


    <!---Navigation-->

<nav class="navbar navbar-expand-lg navbar-light" >
      <div class="container">
        <a class="navbar-brand" href="#">ShopYourWay</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent">
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

    <!---header Text Section-->
    <section id="headertext">
      <div class="container">
        <div class="row">
          <div class="col-lg-7 p-2 d-flex align-items-center justify-content-center texthead">
            <div class="textContainer">
              <h2>Shop Your Way <span>Online</span> Or <span>Offline</span>! </h2>
              <p>
                One stop solution for seamless Online/Offline retail.<br>
                Online discovery & Offline purchase.
              </p>

              <button class="btn"><a href="#aboutus" style="color:black;">Read More</a></button>

              <div class="line">
                <i class="fas fa-shopping-cart"></i>
                <i class="fas fa-shopping-cart"></i>
                <i class="fas fa-shopping-cart"></i>
              </div>
            </div>
          </div>

        </div>
      </div>
    </section>


</section>
<section id="download">
    <div class="container">
      <div class="row">
        <div class="col-lg-7">
          <div class="appDetails">
            <h3>Seamless journey from onlne to offline Using<span> ShopYourWay</span></h3>

            <div class="step d-flex flex-wrap align-items-center">
              <div class="numContainer">
                <h2>01</h2>

              </div>
              <h4> <span id="selectc"></span> </h4>

            </div>
            <div class="step d-flex flex-wrap align-items-center">
              <div class="numContainer">
                <h2>02</h2>

              </div>
              <h4> <span id="selectp"></span></h4>
            </div>
            <div class="step d-flex flex-wrap align-items-center">
              <div class="numContainer">
                <h2>03</h2>

              </div>
              <h4> <span id="add"></span></h4>
          </div>
            <div class="step d-flex flex-wrap align-items-center">
              <div class="numContainer">
                <h2>04</h2>

              </div>
              <h4><span id="order"></span></h4>
            </div>
          </div>

        </div>
        <div class="col-lg-5  mt-5 mt-lg-0">
          <div class="appContainer">
            <img class="img-fluid" src="img/start2r.png" alt="" srcset="">

          </div>
        </div>
      </div>
    </div>
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
<!--Scroll to Top Button-->
  <button onclick="topFunction()" id="myBtn" title="Go to top"> <i class="fas fa-rocket"></i> </button>

  <!--Scroll to top JS-->
  <script>
    //Get the button
    var mybutton = document.getElementById("myBtn");
    
    // When the user scrolls down 20px from the top of the document, show the button
    window.onscroll = function() {scrollFunction()};
    
    function scrollFunction() {
      if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        mybutton.style.display = "block";
      } else {
        mybutton.style.display = "none";
      }
    }
    
    // When the user clicks on the button, scroll to the top of the document
    function topFunction() {
      document.body.scrollTop = 0;
      document.documentElement.scrollTop = 0;
    }
    </script>



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



<script>
  var typed = new Typed('#selectc', {
    strings: [

     
     
     "Select Your Product",
    
    ],

    typeSpeed: 100,
    backSpeed: 100,
    loop: true,
  });
</script>

<script>
  var typed = new Typed('#selectp', {
    strings: [

     
     
     "Order Online",
    
    ],

    typeSpeed: 110,
    backSpeed: 110,
    loop: true,
  });
</script>

<script>
  var typed = new Typed('#add', {
    strings: [

     
     
     "Discover Offline",
    
    ],

    typeSpeed: 180,
    backSpeed: 180,
    loop: true,
  });
</script>

<script>
  var typed = new Typed('#order', {
    strings: [

     
     
     "Purchase and Enjoy!",
    
    ],

    typeSpeed: 130,
    backSpeed: 130,
    loop: true,
  });
</script>

</body>
</html>