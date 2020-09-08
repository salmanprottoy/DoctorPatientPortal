<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Patient Portal</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <section id="nav-bar">
        <nav class="navbar navbar-expand-lg navbar-light ">
            <a class="navbar-brand" href="#"><img src="images/logo1.png"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <i class="fa fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
              <ul class="navbar-nav ml-auto" align="right">
                <li class="nav-item active">
                  <a class="nav-link" href="index.php">Home </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#services">Services</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#about-us">About Us</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link " href="#testimonials" >Testimonials</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="#footer" >Contact Us</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link " href="login.php">LogIn</a>
                  </li>
              </ul>
            </div>
          </nav>
    </section>

    <!-----------Banner------------->
    <section id="banner">
        <div class="container">
            <div class="row">
                <div class="col-md-6" align="center">
                    <p class="title-index">Online<br>Doctor-Patient Portal</p>

                </div>
                <div class="col-md-6 text-center">
                    <img src="images/indexDoctors.png" class="heart_img">
                </div>
            </div> 
        </div>
        
    </section>
    <img src="images/UpperWave.svg" class="bottom-img">

    <!-----------------services------------>
    
    <section id="services">
        <div class="container text-center">
            <h1 class="title">WHAT WE DO?</h1>
            <div class="row text-center">
                <div class="col-md-4 services">
                    <img src="images/booking.png" class="service-img">
                    <h4>Appointment Service</h4>
                    <p></p>
                </div>
                <div class="col-md-4 services">
                    <img src="images/booking.png" class="service-img">
                    <h4>Organ Donation</h4>
                    <p></p>
                </div>
                <div class="col-md-4 services">
                    <img src="images/booking.png" class="service-img">
                    <h4>Corona Update</h4>
                    <p></p>
                </div>

           <!-- <button type="button" class="btn btn-primary">All Services</button>-->
        </div>
    </section>

    <!--------------------about us-------------->
    <section id="about-us">
        <div class="container">
            <h1 class="title text-center">WHY CHOOSE US?</h1>
            <div class="row">
                <div class="col-md-6 about-us">
                    <p class="about-title">Why we're different:</p>
                    <ul>
                        <li>Better service.</li>
                        <li>Realtime doctor updated list.</li>
                        <li>Can find donor easily.</li>
                        <!-- <li>Lorem ipsum dolor sit amet consectetur.</li>
                        <li>Lorem ipsum dolor sit amet consectetur.</li>
                        <li>Lorem ipsum dolor sit amet consectetur.</li> -->
                    </ul>
                </div>
                 <div class="col-md-6">
                     <img src="images/abou-us.png" class="img_about-us">
                 </div>
            </div>
        </div>
    </section>

    <!----------testimonials--------------->
    <section id="testimonials">
        <div class="container">
            <h1 class="title text-center">WHAT CLIENT SAY</h1>
            <div class="row">
                <div class="col-md-4 testimonials">
                    <p>Great service, loved it.</p>
                    <img src="images/ronaldo.jpg" alt="">
                    <p class="user-review"><b>Ronaldo</b><br>King at UCL</p>
                </div>
                <div class="col-md-4 testimonials">
                    <p>Never faced any problem.</p>
                    <img src="images/messi.jpg" alt="">
                    <p class="user-review"><b>Messi</b><br>Superstar at Barcelona</p>
                </div>
                <div class="col-md-4 testimonials">
                    <p>Got an appointment less than a minute.</p>
                    <img src="images/neymar.jpg" alt="">
                    <p class="user-review"><b>Neymar</b><br>Dribbler at PSG</p>
                </div>
            </div>
        </div>
    </section>

    <!------------social media------------->
    <section id="social-media">
   
    </section>

    <!------------footer-------------->
    <section id="footer">
        <img src="" alt="">
        <div class="container">
            <div class="row">
                <div class="col-md-4 footer-box">
                    <img src="images/logo1.png" alt="">
                    <p><a href="./suAdmin/suAdminLogin.php">..</a></p>
                </div>
                <div class="col-md-4 footer-box">
                    <p><b>CONTACT US</b></p>
                    <p> <i class="fa fa-map-marker"></i> AIUB</p>
                    <p><i class="fa fa-phone"></i> +8801711111111</p>
                    <p><i class="fa fa-envelope-o "></i> dppAdmin@gmail.com</p>
                </div>
                <div class="col-md-4 footer-box">
                    <p>FIND US ON SOCIAL MEDIA</p>
                    <div class="social-icon">
                        <a href="#"><img src="images/fb.png" alt=""></a>
                        <a href="#"><img src="images/insta.png" alt=""></a>
                        
                    </div>
                </div>
            </div>
            <hr>
            <p class="copyright">Designed by Rayhan, Salman, Alvy & Anika</p>
        </div>
    </section>
</body>
</html>