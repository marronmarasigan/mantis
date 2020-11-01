<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<?php 
/**
if ($ths->session->userdata('user_name') == 'admin') {
  //echo 'invalid';
  redirect('user/admin_dashboard');
}
**/
?>

<!DOCTYPE html>
<html lang="en">

<!--
  TO DO:
  - add all itineraries
  - fix view_plan
  - provide directions ?
  - PDF

  - PAPER

-->

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Manila Tourist Information System - Home</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url(); ?>assets/vendor/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="<?php echo base_url(); ?>assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- Plugin CSS -->
    <link href="<?php echo base_url(); ?>assets/vendor/magnific-popup/magnific-popup.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template -->
    <link href="<?php echo base_url(); ?>assets/css/freelancer.css" rel="stylesheet">

  </head>

  <body id="page-top">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg bg-secondary fixed-top text-uppercase" id="mainNav">
      <div class="container">
        <a style="font-family: Montserrat; font-weight: bold; text-decoration: none; font-size: 400%; color: white;" class="js-scroll-trigger" href="<?php echo base_url(); ?>">ManTIS</a>&nbsp;
        <a class="" href="<?php echo base_url(); ?>">Manila Tourist <br> Information System</a>
        <button class="navbar-toggler navbar-toggler-right text-uppercase bg-primary text-white rounded" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">

            <li class="nav-item mx-0 mx-lg-1">
              <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="<?php echo base_url('view/place/all'); ?>">Places</a>
            </li>

            <li class="nav-item mx-0 mx-lg-1">
              <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="<?php echo base_url('view/itinerary/all'); ?>">Itineraries</a>
            </li>

            <!--
            <li class="nav-item mx-0 mx-lg-1">
              <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#about">About</a>
            </li>
            -->

            <li class="nav-item mx-0 mx-lg-1">
              <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="<?php echo base_url('createplan'); ?>">Create Itinerary</a>
            </li>
            
            <?php 
            $user=$this->session->userdata('user_name');
            if($user == 'admin') {
              echo '
                  <li class="nav-item mx-0 mx-lg-1">
                    <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="' . base_url('user/admin_dashboard'). '">Dashboard</a>
                  </li>
              ';
            }
            ?> 
            
            <li class="nav-item mx-0 mx-lg-1">
            <?php 
            $user_id=$this->session->userdata('user_name');
            if(!$user_id) {
              echo '<a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="' . base_url('user/login_view') . '">Login</a>';
            }
            else {
              
              echo '<a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="' . base_url('user/user_logout') . '">' . $user_id . ' | Logout</a>';
            }
            ?>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Header -->
    <header class="masthead bg-primary text-white text-center">
      <div class="container row">
        
        <!--<img class="img-fluid mb-5 d-block mx-auto" src="<?php echo base_url(); ?>assets/img/profile.png" alt="">-->

        <div class="col-sm-2"></div>
        <div class="col-sm-4">
        <h3>Welcome to</h3>
        <h3 class="text-uppercase mb-0"> Manila Tourist Information System</h3>
        <br />
        <h4 style="text-align: left" class="font-weight-light mb-0">This website helps local tourists and travel agencies in identifying the popular tourist attractions within Manila and creating a trip planner that focuses on user's preferences.</h4>
        </div>

        <div id="carouselExampleIndicators" class="carousel slide col-sm-6" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
          </ol>
          <div class="carousel-inner">
          <?php $itinerary = $PLACES[0];
            echo '<div class="carousel-item active">
              <img class="" src="' . base_url() . 'assets/wp_content/images/' . str_replace(' ', '_', $itinerary->image_url) .'.png" alt="Third slide" style="height: 400px; width: 550px;">
              <div class="carousel-caption d-none d-md-block">
                <h5>' . $itinerary->name . '</h5>
                <p>';

              $itineraryMiniDesc=$itinerary->mini_desc;
              $imdArray = explode(" ", $itineraryMiniDesc);
              $counter = 0;
              for ($i = $counter; $i < count($imdArray) && $i < 7; $i++) {
                echo $imdArray[$i] . ' ';
              }
              if (count($imdArray) > 7) {
                echo '...';
              }

                echo '</p>
              </div>
            </div>'
          ?>
          <?php $itinerary = $PLACES[1];
            echo '<div class="carousel-item">
              <img class="" src="' . base_url() . 'assets/wp_content/images/' . str_replace(' ', '_', $itinerary->image_url) .'.png" alt="Third slide" style="height: 400px; width: 550px;">
              <div class="carousel-caption d-none d-md-block">
                <h5>' . $itinerary->name . '</h5>
                <p>';

              $itineraryMiniDesc=$itinerary->mini_desc;
              $imdArray = explode(" ", $itineraryMiniDesc);
              $counter = 0;
              for ($i = $counter; $i < count($imdArray) && $i < 7; $i++) {
                echo $imdArray[$i] . ' ';
              }
              if (count($imdArray) > 7) {
                echo '...';
              }

                echo '</p>
              </div>
            </div>'
          ?>
          <?php $itinerary = $PLACES[2];
            echo '<div class="carousel-item">
              <img class="" src="' . base_url() . 'assets/wp_content/images/' . str_replace(' ', '_', $itinerary->image_url) .'.png" alt="Third slide" style="height: 400px; width: 550px;">
              <div class="carousel-caption d-none d-md-block">
                <h5>' . $itinerary->name . '</h5>
                <p>';

              $itineraryMiniDesc=$itinerary->mini_desc;
              $imdArray = explode(" ", $itineraryMiniDesc);
              $counter = 0;
              for ($i = $counter; $i < count($imdArray) && $i < 7; $i++) {
                echo $imdArray[$i] . ' ';
              }
              if (count($imdArray) > 7) {
                echo '...';
              }

                echo '</p>
              </div>
            </div>'
          ?>
          <?php $itinerary = $PLACES[3];
            echo '<div class="carousel-item">
              <img class="" src="' . base_url() . 'assets/wp_content/images/' . str_replace(' ', '_', $itinerary->image_url) .'.png" alt="Third slide" style="height: 400px; width: 550px;">
              <div class="carousel-caption d-none d-md-block">
                <h5>' . $itinerary->name . '</h5>
                <p>';

              $itineraryMiniDesc=$itinerary->mini_desc;
              $imdArray = explode(" ", $itineraryMiniDesc);
              $counter = 0;
              for ($i = $counter; $i < count($imdArray) && $i < 7; $i++) {
                echo $imdArray[$i] . ' ';
              }
              if (count($imdArray) > 7) {
                echo '...';
              }

                echo '</p>
              </div>
            </div>'
          ?>
          <?php $itinerary = $PLACES[4];
            echo '<div class="carousel-item">
              <img class="" src="' . base_url() . 'assets/wp_content/images/' . str_replace(' ', '_', $itinerary->image_url) .'.png" alt="Third slide" style="height: 400px; width: 550px;">
              <div class="carousel-caption d-none d-md-block">
                <h5>' . $itinerary->name . '</h5>
                <p>';

              $itineraryMiniDesc=$itinerary->mini_desc;
              $imdArray = explode(" ", $itineraryMiniDesc);
              $counter = 0;
              for ($i = $counter; $i < count($imdArray) && $i < 7; $i++) {
                echo $imdArray[$i] . ' ';
              }
              if (count($imdArray) > 7) {
                echo '...';
              }

                echo '</p>
              </div>
            </div>'
          ?>
            <!--<div class="carousel-item active">
              <img class="d-block w-100" src="..." alt="First slide">
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="..." alt="Second slide">
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="..." alt="Third slide">
            </div>-->

          </div>
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
        
        

      </div>
    </header>


    <!-- Portfolio Grid Section -->
    <section class="portfolio" id="places">
      <div class="container">
        <h2 class="text-center text-uppercase text-secondary mb-0">Places</h2>
        <!--<hr class="star-dark mb-5">-->
        <hr>
        <div class="row">

        <!--
        portfolio style list of itineraries
        -->
        <?php
        $count = 0;
         foreach($PLACES as $itinerary){?>
          <div class="col-md-6 col-lg-4">
            <a style="text-decoration: none;" class="d-block mx-auto" href='view/place/<?=str_replace(' ', '_', $itinerary->name); ?>'>
              <!--
              <div class="portfolio-item-caption d-flex position-absolute h-100 w-100">
                <div class="portfolio-item-caption-content my-auto w-100 text-center text-white">
                  <i class="fa fa-search-plus fa-3x"></i>
                </div>
              </div>
              -->
              <!--<img style="height:auto;" class="img-fluid" src="<?php echo base_url(); ?>assets/wp_content/images/<?php echo str_replace(' ', '_', $itinerary->name); ?>.png" alt="">-->
              <center>
              <img style="height:250px; width: 350px;" class="img-fluid" src="<?php echo base_url(); ?>assets/wp_content/images/<?php echo str_replace(' ', '_', $itinerary->image_url); ?>.png" alt="">
              <h4><?=$itinerary->name;?></h4>
              <span><?php
              $itineraryMiniDesc=$itinerary->mini_desc;
              $imdArray = explode(" ", $itineraryMiniDesc);
              $counter = 0;
              for ($i = $counter; $i < count($imdArray) && $i < 7; $i++) {
                echo $imdArray[$i] . ' ';
              }
              if (count($imdArray) > 7) {
                echo '...';
              }
              ?></span>
              </center>
            </a>
          </div>  

        <?php $count++; if ($count >= 6) {break;} }?> 
        


          
          
        </div>
        <br><h4 align="center"><a style="text-decoration: none;" class="d-block mx-auto" href="view/place/all">View all Places</a></h4>
      </div>
    </section>

    <section class="portfolio" id="itineraries">
      <div class="container">
        <h2 class="text-center text-uppercase text-secondary mb-0">Itineraries</h2>
        <!--<hr class="star-dark mb-5">-->
        <hr>
        <div class="row">

        <!--
        portfolio style list of itineraries
        -->
        <?php
        $count = 0;
        foreach($ITINERARIES as $itinerary){?>
          <div class="col-md-6 col-lg-4">
            <a style="text-decoration: none;" class="d-block mx-auto" href='<?php echo base_url() . 'view/itinerary/' . str_replace(' ', '_', $itinerary->name) . '/' . $itinerary->itinerary_id; ?>'>
              <!--
              <div class="portfolio-item-caption d-flex position-absolute h-100 w-100">
                <div class="portfolio-item-caption-content my-auto w-100 text-center text-white">
                  <i class="fa fa-search-plus fa-3x"></i>
                </div>
              </div>
              -->
              <!--<img style="height:auto;" class="img-fluid" src="<?php echo base_url(); ?>assets/wp_content/images/<?php echo str_replace(' ', '_', $itinerary->name); ?>.png" alt="">-->

              <?php 
                $placesArray = explode('|', $itinerary->placesv2);
                //var_dump($this->home_model->getPlaceImageById($placesArray[0]));

                foreach ($placesArray as $placeArray) {
                  //var_dump($placeArray);
                  if ($this->view_model->checkIfPlaceExists($placeArray)) {
                    $placeImgUrl = $this->home_model->getPlaceImageById($placeArray);
                    //var_dump($placeImgUrl);
                    foreach ($placeImgUrl as $img) {
                      //echo $img->image_url;
                      echo '<img style="height:125px; width: 170px;" class="img-fluid" src="' .base_url() . 'assets/wp_content/images/' . str_replace(' ', '_', $img->image_url) . '.png" alt="">';
                      
                    }
                  }
                }
                //$placeImgUrl = $this->home_model->getPlaceImageById($placesArray[0]);

                //echo $placeImgUrl;

                

              ?>
              
              <!--<?php for ($i = 0; $i < count(unserialize($itinerary->place_image_url)) && $i != 4; $i++) {
                echo '<img style="height:125px; width: 170px;" class="img-fluid" src="' . unserialize($itinerary->place_image_url)[$i] . '" alt="">';
              }
              ?>-->
              <h4><?=$itinerary->name;?></h4>
              <h6>By: <?=$itinerary->author;?></h6>
            </a>
          </div>  

        

        <?php $count++; if ($count >= 6) {break;} }?> 
        


          
          
        </div>
        <br><h4 align="center"><a style="text-decoration: none;" class="d-block mx-auto" href="view/itinerary/all">View all Itineraries</a></h4>
      </div>
    </section>

    <!--
    About Section
    <section class="bg-primary text-white mb-0" id="about">
      <div class="container">
        <h2 class="text-center text-uppercase text-white">About</h2>
        <hr class="star-light mb-5">
        <div class="row">
          <div class="col ml-auto">
            <p class="lead">Freelancer is a free bootstrap theme created by Start Bootstrap. The download includes the complete source files including HTML, CSS, and JavaScript as well as optional LESS stylesheets for easy customization. Whether you're a student looking to showcase your work, a professional looking to attract clients, or a graphic artist looking to share your projects, this template is the perfect starting point!</p>
          </div>
        </div>
        <div class="text-center mt-4">
          <a class="btn btn-xl btn-outline-light" href="#">
            <i class="fa fa-download mr-2"></i>
            Download Now!
          </a>
        </div>
      </div>
    </section>

    Contact Section
    <section id="contact">
      <div class="container">
        <h2 class="text-center text-uppercase text-secondary mb-0">Contact Me</h2>
        <hr class="star-dark mb-5">
        <div class="row">
          <div class="col-lg-8 mx-auto">
            To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19.
            The form should work on most web servers, but if the form is not working you may need to configure your web server differently.
            <form name="sentMessage" id="contactForm" novalidate="novalidate">
              <div class="control-group">
                <div class="form-group floating-label-form-group controls mb-0 pb-2">
                  <label>Name</label>
                  <input class="form-control" id="name" type="text" placeholder="Name" required="required" data-validation-required-message="Please enter your name.">
                  <p class="help-block text-danger"></p>
                </div>
              </div>
              <div class="control-group">
                <div class="form-group floating-label-form-group controls mb-0 pb-2">
                  <label>Email Address</label>
                  <input class="form-control" id="email" type="email" placeholder="Email Address" required="required" data-validation-required-message="Please enter your email address.">
                  <p class="help-block text-danger"></p>
                </div>
              </div>
              <div class="control-group">
                <div class="form-group floating-label-form-group controls mb-0 pb-2">
                  <label>Phone Number</label>
                  <input class="form-control" id="phone" type="tel" placeholder="Phone Number" required="required" data-validation-required-message="Please enter your phone number.">
                  <p class="help-block text-danger"></p>
                </div>
              </div>
              <div class="control-group">
                <div class="form-group floating-label-form-group controls mb-0 pb-2">
                  <label>Message</label>
                  <textarea class="form-control" id="message" rows="5" placeholder="Message" required="required" data-validation-required-message="Please enter a message."></textarea>
                  <p class="help-block text-danger"></p>
                </div>
              </div>
              <br>
              <div id="success"></div>
              <div class="form-group">
                <button type="submit" class="btn btn-primary btn-xl" id="sendMessageButton">Send</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
    -->
    

    <div class="copyright py-4 text-center text-white">
      <div class="container">
        <small>Copyright &copy; Manila Tourist Information System 2018</small>
      </div>
    </div>

    <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
    <div class="scroll-to-top d-lg-none position-fixed ">
      <a class="js-scroll-trigger d-block text-center text-white rounded" href="#page-top">
        <i class="fa fa-chevron-up"></i>
      </a>
    </div>

    <!-- Bootstrap core JavaScript -->
    <script src="<?php echo base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="<?php echo base_url(); ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendor/magnific-popup/jquery.magnific-popup.min.js"></script>

    <!-- Contact Form JavaScript -->
    <script src="<?php echo base_url(); ?>assets/js/jqBootstrapValidation.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/contact_me.js"></script>

    <!-- Custom scripts for this template -->
    <script src="<?php echo base_url(); ?>assets/js/freelancer.min.js"></script>

  </body>

</html>
