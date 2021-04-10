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


    

  <!---Short Details Section-->
  <section id="shortdetails">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-6 col-sm-6 col-lg-4 mb-4" data-aos="zoom-in" data-aos-duration="1200">
         <a href="product.php?sub=1" style="text-decoration: none; color: black;"><div class="short d-flex flex-wrap align-items-center">
            <div class="icon" style="padding: 17px 27px 17px 27px;">
              <i class="fas fa-male"></i>
            </div>
            <h4>Mens Clothing</h4>
          </div></a> 
        </div>

        <div class="col-md-6 col-sm-6 col-lg-4 mb-4" data-aos="zoom-in" data-aos-duration="1200">
         <a href="product.php?sub=2" style="text-decoration: none; color: black;">
          <div class="short d-flex flex-wrap align-items-center">
            <div class="icon" style="padding: 17px 27px 17px 27px;">
              <i class="fas fa-female"></i>
            </div>
            <h4>Womens Clothing</h4>
          </div>
        </a>

        </div>

        <div class="col-md-6 col-sm-6 col-lg-4 mb-4" data-aos="zoom-in" data-aos-duration="1200">
          <a href="product.php?sub=3" style="text-decoration: none; color: black;">
          <div class="short d-flex flex-wrap align-items-center">
            <div class="icon" >
              <i class="fas fa-child"></i>
            </div>
            <h4>Kids Clothing</h4>
          </div>
         </a>
        </div>

        <div class="col-md-6 col-sm-6 col-lg-4 mb-4" data-aos="zoom-in" data-aos-duration="1200">
          <a href="product.php?sub=4" style="text-decoration: none; color: black;">
          <div class="short d-flex flex-wrap align-items-center">
            <div class="icon">
              <i class="fas fa-list-alt"></i>
            </div>
            <h4>House Supplies</h4>
          </div>
         </a>
        </div>

        <div class="col-md-6 col-sm-6 col-lg-4 mb-4" data-aos="zoom-in" data-aos-duration="1200">
          <a href="product.php?sub=5" style="text-decoration: none; color: black;">
          <div class="short d-flex flex-wrap align-items-center">
            <div class="icon">
              <i class="fas fa-user"></i>
            </div>
            <h4>Personal Care</h4>
          </div>
         </a>
        </div>

        <div class="col-md-6 col-sm-6 col-lg-4 mb-4" data-aos="zoom-in" data-aos-duration="1200">
          <a href="product.php?sub=6" style="text-decoration: none; color: black;">
          <div class="short d-flex flex-wrap align-items-center">
            <div class="icon">
              <i class="fas fa-shoe-prints"></i>
            </div>
            <h4>Footwear</h4>
          </div>
         </a>
        </div>
      </div>
    </div>
  </section>

  <!---Services Section-->
  <section id="services">
    <div class="container">
      <div class="row">
        <div class="col-lg-6" data-aos="flip-up" data-aos-duration="1800">
          <div class="serviceContainer">

            <h6>Categories</h6>
            <h3> <span>ShopYourWay</span> Categories</h3>
            <p> Shop the way you like! ONLINE or OFFLINE?
              You choose!
            </p>
           <div class="accordion" id="accordionExample">
              <div class="card">
                <div class="card-header p-0" id="headingOne">
                  <h2 class="mb-0">
                    <button class="btn  btn-block text-left p-3" type="button" data-toggle="collapse"
                      data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                      01. Stylish and branded Clothing<i class="fas fa-location-arrow ml-3"></i>
                    </button>
                  </h2>
                </div>

                <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                  <div class="card-body">
                    Fresh Vegetables,spicy masalas,cooking ingredients dairy products- Milk,icecream,chocolates,cakes,eggs,breads and many more.
                  </div>
                </div>
              </div>
              <div class="card">
                <div class="card-header p-0" id="headingTwo">
                  <h2 class="mb-0">
                    <button class="btn  btn-block text-left collapsed p-3" type="button" data-toggle="collapse"
                      data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                      02. From Formals to Casuals<i class="fas fa-location-arrow ml-3"></i>
                    </button>
                  </h2>
                </div>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                  <div class="card-body">
                    We take care of all your necessities- Home essentials, Stationary products,etc  </div>
                </div>
              </div>
              <div class="card">
                <div class="card-header p-0" id="headingThree">
                  <h2 class="mb-0">
                    <button class="btn btn-block text-left collapsed p-3" type="button" data-toggle="collapse"
                      data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                      03. Home supplies and decor<i class="fas fa-location-arrow ml-3"></i>
                    </button>


                  </h2>
                </div>
                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                  <div class="card-body">
                    Electronic & electrical home appliances- Mixer,grinder,iron,stoves,tv,mobiles. </div>
                </div>
              </div>

              <div class="card">
                <div class="card-header p-0" id="headingFour">
                  <h2 class="mb-0">
                    <button class="btn btn-block text-left collapsed p-3" type="button" data-toggle="collapse"
                      data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                      04. Personal health & hygiene <i class="fas fa-location-arrow ml-3"></i>
                    </button>
                  </h2>
                </div>
                <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
                  <div class="card-body">
                    Health & hygiene- Personal care products.<br>
                    brushes,toothpaste,body washes,skin care products, baby care products.
                 </div>
                </div>
              </div>
            </div>

          </div>

        </div>

        <div class="col-lg-6 col-md-10 col-sm-8 mt-4 mt-lg-0" data-aos="zoom-out" data-aos-duration="1800">
          <div class="imageContainer">

            <svg viewBox="0 0 50 50">
              <circle cx="25" cy="25" r="25"></circle>
            </svg>

            <div class="round"></div>
            <img class="img1" style="height: 200px; width: 200px;" src="img/c3.png" alt="" srcset="">
            <img class="img2" style="height: 250px; width: 320px;" src="img/Capture2-removebg-preview.png" alt="" srcset="">
            <img class="img3" style="height: 250px; width: 200px;" src="img/Capture4-removebg-preview.png" alt="" srcset="">
            <img class="img4" style="height: 300px; width: 300px;" src="img/Capture7-removebg-preview (1).png" alt="" srcset="">

          </div>
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



<!--Animate on Scroll JS CDN-->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

<!--Animate on Scroll Initialisation-->
<script>
  AOS.init();
</script>


<!--Typewriter-->

<script src="typed.js"></script>


<!---Typewriter for Testimonials-->

<script>
  var typed = new Typed('#arpan', {
    strings: [

     
     
     "Arpan Mohanty",
    
    ],

    typeSpeed: 85,
    backSpeed: 85,
    loop: true,
  });
</script>

<script>
  var typed = new Typed('#asutosh', {
    strings: [

     
     
     "Asutosh Dash",
    
    ],

    typeSpeed: 85,
    backSpeed: 85,
    loop: true,
  });
</script>


<script>
  var typed = new Typed('#subha', {
    strings: [

     
     
     "Subhankar Nayak",
    
    ],

    typeSpeed: 85,
    backSpeed: 85,
    loop: true,
  });
</script>

<!--Typewriter for Testimonials ends here-->







<!--Typewriter for download-->
<script>
  var typed = new Typed('#select', {
    strings: [

     
     
     "Select Your Food",
    
    ],

    typeSpeed: 100,
    backSpeed: 100,
    loop: true,
  });
</script>


<script>
  var typed = new Typed('#add', {
    strings: [

     
     
     "Add to Cart",
    
    ],

    typeSpeed: 100,
    backSpeed: 100,
    loop: true,
  });
</script>

<script>
  var typed = new Typed('#order', {
    strings: [

     
     
     "Order Food",
    
    ],

    typeSpeed: 100,
    backSpeed: 100,
    loop: true,
  });
</script>

<!--Typewriter for Download ends here-->


<!--Typewriter Delivery Man Section-->
<script>
  var typed = new Typed('#blink', {
    strings: [

     
     
     "Join As a Delivery Man",
    
    ],

    typeSpeed: 100,
    backSpeed: 100,
    loop: true,
  });
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
