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

    <title>Manila Tourist Information System - Create Your Own Itinerary</title>

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

    <!-- bootstrap multiselect -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css" />

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

    <header class=" bg-primary text-white text-center">
    <h1 class="panel-title" style="font-size: 50px;">Create Your Own Itinerary</h1>
    <br>
      <div class="container">
        <div class="row">
          <div style="margin: 0 auto;" class="col-md-4">

            <form role="form" method="post" action="<?php echo base_url('createplan/create_trip'); ?>">
              <fieldset>
                  <div class="form-group"  >
                      <!--<input class="form-control" placeholder="Alloted Time" name="alloted_time" type="text" autofocus>-->
                      <br><br><br><br>
                      <div class="form-group mb-3">
                        <label style="font-size: 20px;">Alloted Time:  </label>
                        <div class="">
                        <select class="form-control" id="put_name_here" name="alloted_time" style="height: 30px;">
                          <option selected>Choose...</option>
                          <option value="1">1 hour</option>
                          <option value="2">2 hours</option>
                          <option value="3">3 hours</option>
                          <option value="4">4 hours</option>
                          <option value="5">5 hours</option>
                          <option value="6">6 hours</option>
                          <option value="7">7 hours</option>
                          <option value="8">8 hours</option>
                          <option value="9">9 hours</option>
                          <option value="10">10 hours</option>
                        </select>
                        
      <!--                   <div class="form-group-append">
                          <label class="input-group-text" for="inputGroupSelect02">Options</label>
                        </div> -->
                      </div>
                  </div>
                  <!--
                  <div class="form-group">
                      
                      <div class="form-group">
                        <label>Places of Interest:</label><br/>
                        <label>(Leave blank to include all places)</label><br/>
                        <input type="text" name="intent" placeholder="Input tag here and press Enter" class="tm-input form-control tm-input-info"/>

                        
                      </div>

                  </div>
                  -->

                  <br>

                  <div class="form-group">
                      <!--<input class="form-control" placeholder="Opening Time" name="opening_time" type="text" value="">-->
                      <label style="font-size: 20px;">Preferred Start Time:</label>
                      <select class="form-control" id="combostar" name="opening_time" style="height: 30px;">
                        <option value="1">1:00 AM</option>
                        <option value="2">2:00 AM</option>
                        <option value="3">3:00 AM</option>
                        <option value="4">4:00 AM</option>
                        <option value="5">5:00 AM</option>
                        <option value="6">6:00 AM</option>
                        <option value="7">7:00 AM</option>
                        <option value="8">8:00 AM</option>
                        <option value="9">9:00 AM</option>
                        <option selected value="10">10:00 AM</option>
                        <option value="11">11:00 AM</option>
                        <option value="12">12:00 PM</option>
                        <option value="13">1:00 PM</option>
                        <option value="14">2:00 PM</option>
                        <option value="15">3:00 PM</option>
                        <option value="16">4:00 PM</option>
                        <option value="17">5:00 PM</option>
                        <option value="18">6:00 PM</option>
                        <option value="19">7:00 PM</option>
                        <option value="20">8:00 PM</option>
                        <option value="21">9:00 PM</option>
                        <option value="22">10:00 PM</option>
                        <option value="23">11:00 PM</option>
                        <option value="0">12:00 AM</option>
                      </select>
                  </div>
                  
                  <div class="form-group">
                      
                      <div class="form-group">
                        <label style="font-size: 20px;">Rating:</label><br/>
                        <select class="form-control" name="rating" style="height: 30px;">
                          <option selected>Choose...</option>
                          <option value="1">1 star and above</option>
                          <option value="2">2 stars and above</option>
                          <option value="3">3 stars and above</option>
                          <option value="4">4 stars and above</option>
                          <option value="5">5 stars</option>
                        </select>
                      </div>
                      
                  </div>
                  

                  <br>

                  <div class="form-group">
                  <label style="font-size: 20px;">Places of Interest:  </label>

                  <?php 
                        $allTags = $this->createplan_model->getDistinctTags();
                        //foreach ($allTags as $tag) {
                          //echo $tag;
                        //}

                        //var_dump($allTags[1]->tags[0]);
                        $allTags = array_unique($allTags, SORT_REGULAR);
                        //var_dump($allTags);

                        //echo $this->createplan_model->testFunction();
                  

                  echo '<select id="framework" name="framework[]" multiple class="form-control" >';
                  foreach ($allTags as $tag) {
                    echo '<option value="' . $tag . '">' . $tag . '</option>';
                  }
                    
                  echo '</select>';
                  
                  //echo '</div>';

                  ?>
                  </div>

     <script>
$(document).ready(function(){
 $('#framework').multiselect({
  nonSelectedText: 'Select Tags',
  enableFiltering: true,
  enableCaseInsensitiveFiltering: true,
  buttonWidth:'300px'
 });
 
 
 
 
});
</script>

                <br><br>
                  
                  <div class="form-group">
                      
                      <!--<input type="checkbox" name="directions" value="1">
                      <label>Include trip directions?</label>-->
                  </div>

                      <input class="btn btn-lg btn-success btn-block" type="submit" value="go" name="Go" >

              </fieldset>
            </form>




          </div>
        </div>

      </div>

        <div class="container">&nbsp;<br><br><br></div>

    </header>

    



    <!--<section class="bg-secondary text-white mb-0" id="reviews">
      <div class="container">
        
        
        <div class="text-center mt-4">
          <a class="btn btn-xl btn-outline-light" href="#">
            <i class="fa fa-download mr-2"></i>
            Download Now!
          </a>
        </div>
        
      </div>
      
    </section>
    -->

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

      <!-- TAGS HREF -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/tagmanager/3.0.2/tagmanager.min.css">
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/tagmanager/3.0.2/tagmanager.min.js"></script>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>




    <!-- Plugin CSS -->


    <!-- Custom styles for this template -->
    <link href="<?php echo base_url(); ?>assets/css/freelancer.css" rel="stylesheet">

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
        <script type="text/javascript">
    $(".tm-input").tagsManager();
  </script>
  <script type="text/javascript">
    $(document).ready(function() {
$('#demo').multiselect();
});
  </script>



  </body>

</html>





