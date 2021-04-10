<?php 
require_once "pdo.php";
session_start();
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
  <link rel="stylesheet" href="style12.css">


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
  <section id="header">


    <!---Navigation-->

    <nav class="navbar navbar-expand-lg navbar-light"style="background-color:#0b0320;">
      <div class="container">
        <a class="navbar-brand" href="#">SHOP & <span>SAFE</span></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="categories.php">Category</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="cart.php">Cart</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="aboutus.html">About Us</a>
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
<section id="about">
    <div class="container">
      <div class="row">
        <div class="col-lg-6"  data-aos="fade-right" data-aos-duration="1500">
          <div class="imgContainer">
            <img class="img-fluid" src="imageshome/aboutus1.png" alt="" srcset="">
          </div>
        </div>
        <div class="col-lg-6 mt-5 mt-lg-0" data-aos="fade-left" data-aos-duration="1500">
          <div class="aboutText">
            <h6><u>About Us</u></h6>
            <h3>Safe Shopping Experience With<br> <span> SHOP & SAFE </span>
            </h3>
            <p>This is an online platform for societies to easy shop. Here, from grocery to electronics, 
            all types of commodities are available. Just one click and your things are delivered.</p>

            <p>STAY SAFE!&nbsp&nbsp&nbsp SHOP SAFE!
            </p>
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

<!--Scroll to Top Button-->

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



<!--Animate on Scroll JS CDN-->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

<!--Animate on Scroll Initialisation-->
<script>
AOS.init();
</script>

<!--Typewriter-->

<script src="typed.js"></script>
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