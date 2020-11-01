<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Manila Tourist Information System - View All Places</title>

    <!-- Bootstrap core CSS -->
    
    <!-- <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css"> -->
    <link href="<?php echo base_url(); ?>assets/vendor/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="<?php echo base_url(); ?>assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- Plugin CSS -->
    <link href="<?php echo base_url(); ?>assets/vendor/magnific-popup/magnific-popup.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template -->
    <link href="<?php echo base_url(); ?>assets/css/freelancer.css" rel="stylesheet">

    <style>
    .complete{
        display:none;
    }

    .more{
        background:lightblue;
        color:navy;
        font-size:13px;
        padding:3px;
        cursor:pointer;
    }
    .clickmore {
      text-align: center;
      text-decoration: none;
      color: white;
      font-size:20px;
      cursor:pointer;
    }
    .left-align {
      text-align: left;
    }
    </style>

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

    
    <br><br><br><br>

    <!-- Portfolio Grid Section -->
    <section class="portfolio" id="itineraries">
      <div class="container">
        <h2 class="text-center text-uppercase text-secondary mb-0">Places</h2>
        <!--<hr class="star-dark mb-5">-->
        <hr>
        <h3 class="text-center text-secondary mb-0">Museums</h3>
        <hr>

        <div class="row">
          <?php
            foreach ($places as $place) {
              if ($place->category == 1) {
                echo '<div class="col-md-6 col-lg-4">
                          <a style="text-decoration: none;" class="d-block mx-auto" href=' . base_url() . 'view/place/' . str_replace(' ', '_', $place->name) . '>
                            <img style="height:250px; width: 400px;" class="img-fluid" src="' . base_url() . 'assets/wp_content/images/' . str_replace(' ', '_', $place->image_url) . '.png" alt="">
                            <h4>' . $place->name . '</h4>
                            <h6>';
                              $itineraryMiniDesc=$place->mini_desc;
                              $imdArray = explode(" ", $itineraryMiniDesc);
                              $counter = 0;
                              for ($i = $counter; $i < count($imdArray) && $i < 7; $i++) {
                                echo $imdArray[$i] . ' ';
                              }
                              if (count($imdArray) > 7) {
                                echo '...';
                              }
                            echo '</h6>
                          </a>
                      </div> ';
              }
            }
          ?>
        </div>

        <hr>
        <h3 class="text-center text-secondary mb-0">Historical Buildings</h3>
        <hr>

        <div class="row">
          <?php
            foreach ($places as $place) {
              if ($place->category == 2) {
                echo '<div class="col-md-6 col-lg-4">
                          <a style="text-decoration: none;" class="d-block mx-auto" href=' . base_url() . 'view/place/' . str_replace(' ', '_', $place->name) . '>
                            <img style="height:250px; width: 400px;" class="img-fluid" src="' . base_url() . 'assets/wp_content/images/' . str_replace(' ', '_', $place->image_url) . '.png" alt="">
                            <h4>' . $place->name . '</h4>
                            <h6>';
                              $itineraryMiniDesc=$place->mini_desc;
                              $imdArray = explode(" ", $itineraryMiniDesc);
                              $counter = 0;
                              for ($i = $counter; $i < count($imdArray) && $i < 7; $i++) {
                                echo $imdArray[$i] . ' ';
                              }
                              if (count($imdArray) > 7) {
                                echo '...';
                              }
                            echo '</h6>
                          </a>
                      </div> ';
              }
            }
          ?>
        </div>

        <hr>
        <h3 class="text-center text-secondary mb-0">Open Parks</h3>
        <hr>

        <div class="row">
          <?php
            foreach ($places as $place) {
              if ($place->category == 3) {
                echo '<div class="col-md-6 col-lg-4">
                          <a style="text-decoration: none;" class="d-block mx-auto" href=' . base_url() . 'view/place/' . str_replace(' ', '_', $place->name) . '>
                            <img style="height:250px; width: 400px;" class="img-fluid" src="' . base_url() . 'assets/wp_content/images/' . str_replace(' ', '_', $place->image_url) . '.png" alt="">
                            <h4>' . $place->name . '</h4>
                            <h6>';
                              $itineraryMiniDesc=$place->mini_desc;
                              $imdArray = explode(" ", $itineraryMiniDesc);
                              $counter = 0;
                              for ($i = $counter; $i < count($imdArray) && $i < 7; $i++) {
                                echo $imdArray[$i] . ' ';
                              }
                              if (count($imdArray) > 7) {
                                echo '...';
                              }
                            echo '</h6>
                          </a>
                      </div> ';
              }
            }
          ?>
        </div>

        <hr>

        <h3 class="text-center text-secondary mb-0">Places of Worship</h3>
        <hr>

        <div class="row">
          <?php
            foreach ($places as $place) {
              if ($place->category == 4) {
                echo '<div class="col-md-6 col-lg-4">
                          <a style="text-decoration: none;" class="d-block mx-auto" href=' . base_url() . 'view/place/' . str_replace(' ', '_', $place->name) . '>
                            <img style="height:250px; width: 400px;" class="img-fluid" src="' . base_url() . 'assets/wp_content/images/' . str_replace(' ', '_', $place->image_url) . '.png" alt="">
                            <h4>' . $place->name . '</h4>
                            <h6>';
                              $itineraryMiniDesc=$place->mini_desc;
                              $imdArray = explode(" ", $itineraryMiniDesc);
                              $counter = 0;
                              for ($i = $counter; $i < count($imdArray) && $i < 7; $i++) {
                                echo $imdArray[$i] . ' ';
                              }
                              if (count($imdArray) > 7) {
                                echo '...';
                              }
                            echo '</h6>
                          </a>
                      </div> ';
              }
            }
          ?>
        </div>

        <hr>

        <h3 class="text-center text-secondary mb-0">Architectural</h3>
        <hr>

        <div class="row">
          <?php
            foreach ($places as $place) {
              if ($place->category == 5) {
                echo '<div class="col-md-6 col-lg-4">
                          <a style="text-decoration: none;" class="d-block mx-auto" href=' . base_url() . 'view/place/' . str_replace(' ', '_', $place->name) . '>
                            <img style="height:250px; width: 400px;" class="img-fluid" src="' . base_url() . 'assets/wp_content/images/' . str_replace(' ', '_', $place->image_url) . '.png" alt="">
                            <h4>' . $place->name . '</h4>
                            <h6>';
                              $itineraryMiniDesc=$place->mini_desc;
                              $imdArray = explode(" ", $itineraryMiniDesc);
                              $counter = 0;
                              for ($i = $counter; $i < count($imdArray) && $i < 7; $i++) {
                                echo $imdArray[$i] . ' ';
                              }
                              if (count($imdArray) > 7) {
                                echo '...';
                              }
                            echo '</h6>
                          </a>
                      </div> ';
              }
            }
          ?>
        </div>

        <hr>
        <h3 class="text-center text-secondary mb-0">Theme Parks</h3>
        <hr>

        <div class="row">
          <?php
            foreach ($places as $place) {
              if ($place->category == 6) {
                echo '<div class="col-md-6 col-lg-4">
                          <a style="text-decoration: none;" class="d-block mx-auto" href=' . base_url() . 'view/place/' . str_replace(' ', '_', $place->name) . '>
                            <img style="height:250px; width: 400px;" class="img-fluid" src="' . base_url() . 'assets/wp_content/images/' . str_replace(' ', '_', $place->image_url) . '.png" alt="">
                            <h4>' . $place->name . '</h4>
                            <h6>';
                              $itineraryMiniDesc=$place->mini_desc;
                              $imdArray = explode(" ", $itineraryMiniDesc);
                              $counter = 0;
                              for ($i = $counter; $i < count($imdArray) && $i < 7; $i++) {
                                echo $imdArray[$i] . ' ';
                              }
                              if (count($imdArray) > 7) {
                                echo '...';
                              }
                            echo '</h6>
                          </a>
                      </div> ';
              }
            }
          ?>
        </div>

        <!--
        portfolio style list of itineraries
        -->
        <!--<?php foreach($places as $itinerary){?>
          <div class="col-md-6 col-lg-4">
            <a style="text-decoration: none;" class="d-block mx-auto" href='<?php echo base_url() . 'view/place/' . str_replace(' ', '_', $itinerary->name); ?>'>
              <img style="height:250px; width: 400px;" class="img-fluid" src="<?php echo base_url(); ?>assets/wp_content/images/<?php echo str_replace(' ', '_', $itinerary->image_url); ?>.png" alt="">
              <h4><?=$itinerary->name;?></h4>
              <h6><?=$itinerary->mini_desc;?></h6>
            </a>
          </div>  
        <?php }?> 
        -->
        
        <hr>
      </div>
    </section>



    <section class="bg-secondary text-white mb-0" id="">
      <div class="container">
        
        <!--
        <div class="text-center mt-4">
          <a class="btn btn-xl btn-outline-light" href="#">
            <i class="fa fa-download mr-2"></i>
            Download Now!
          </a>
        </div>
        -->
      </div>
    </section>

    <div class="copyright py-4 text-center text-white">
      <div class="container">
        <small>Copyright &copy; Manila Tourist Information System 2018</small>
      </div>
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

    <script src="<?php echo base_url(); ?>assets/js/bootstrap-rating-input.js"></script>
    
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>

    <script>
      $('input.my_class').rating({
        'min': 1,
        'max': 5,
        'empty-value': 0,
        'iconLib': 'glyphicon',
        'activeIcon': 'glyphicon-star',
        'inactiveIcon': 'glyphicon-star-empty',
        'clearable': false,
        'clearableIcon': 'glyphicon-remove',
        'inline': false,
        'readonly': false,
        'copyClasses': true
      });
    </script>
    <script type="text/javascript">
      $(".more").toggle(function(){
          $(this).text("less..").siblings(".complete").show();    
      }, function(){
          $(this).text("more..").siblings(".complete").hide();    
      });
    </script>
    <script type="text/javascript">
      $(document).ready(function(){
          $(".clickmore").click(function(){
              $(".complete").toggle();
              $(this).text(($(this).text() === 'See less' ? 'See more' : 'See less'))
          });
      });
    </script>

  </body>

</html>