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

    <title>Manila Tourist Information System - Admin Dashboard - Edit Place</title>

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

    <header class="masthead bg-primary text-white text-center">
      <div class="container left-align">
        <!--
        <img class="img-fluid mb-5 d-block mx-auto" src="<?php echo base_url(); ?>assets/img/profile.png" alt="">
        
        <h1 style="text-align: left" class="text-uppercase mb-0">Welcome to CM Trip Planner</h1>
        <br />
        <h2 style="text-align: left" class="font-weight-light mb-0">This website helps local tourists and travel agencies in creating a trip planner that focuses on user's preferences.</h2>
        -->
        <h3 class="panel-title">Edit Place Details</h1>
        <!--<form role="form" method="post" action="add_itinerary">-->
        <?php echo form_open_multipart('user/edit_itinerary');?>
        <?php foreach ($itineraryDetails as $itineraryDetail) { ?>
        <fieldset>
            <div class="form-group"  >
                <input type="hidden" name="itinerary_id" value="<?php echo $itineraryDetail->itinerary_id; ?>"/>

                <label>Name</label>
                <input class="form-control" placeholder="<?php echo $itineraryDetail->name; ?>" name="name" type="text" autofocus value="<?php echo $itineraryDetail->name; ?>">


                <label>Edit Tags:<?php echo '\'' ?></label><br/>
                <!-- <input type="text" name="tags" placeholder="Tags" class="tm-input form-control tm-input-info"/> -->
                <!-- push tags -->
                <input class="form-control" placeholder="<?php echo str_replace('|', ',', $itineraryDetail->tags); ?>" name="tags" type="text" value="<?php echo str_replace('|', ',', $itineraryDetail->tags); ?>">

                <label>Category:</label>
                <!--<input class="form-control" placeholder="<?php echo $itineraryDetail->tour_time; ?>" name="tour_time" type="number" autofocus value="<?php echo $itineraryDetail->tour_time; ?>">-->
                <select class="form-control"  name="category">
                    <option <?php if (1 == $itineraryDetail->category) echo 'selected';?> value="1">Museums</option>
                    <option <?php if (2 == $itineraryDetail->category) echo 'selected';?> value="2">Historical Buildings</option>
                    <option <?php if (3 == $itineraryDetail->category) echo 'selected';?> value="3">Open Parks</option>
                    <option <?php if (4 == $itineraryDetail->category) echo 'selected';?> value="4">Places of Worship</option>
                    <option <?php if (5 == $itineraryDetail->category) echo 'selected';?> value="5">Architectural</option>
                    <option <?php if (6 == $itineraryDetail->category) echo 'selected';?> value="6">Theme Parks</option>
                </select>
          

                <label>Mini Description:</label>
                <input class="form-control" placeholder="<?php echo $itineraryDetail->mini_desc; ?>" name="mini_desc" type="text" autofocus value="<?php echo $itineraryDetail->mini_desc; ?>">                
                <label>Description:</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" name="description" rows="3" placeholder="<?php echo $itineraryDetail->description; ?>"><?php echo $itineraryDetail->description; ?></textarea>

                <label>Location:</label>
                <input class="form-control" placeholder="<?php echo $itineraryDetail->location; ?>" name="location" type="text" autofocus value="<?php echo $itineraryDetail->location; ?>">

                <label>Estimated Tour Time:</label>
                <!--<input class="form-control" placeholder="<?php echo $itineraryDetail->tour_time; ?>" name="tour_time" type="number" autofocus value="<?php echo $itineraryDetail->tour_time; ?>">-->
                <select class="form-control"  name="tour_time">
                    <option <?php if (10 == $itineraryDetail->tour_time) echo 'selected';?> value="10">10 minutes</option>
                    <option <?php if (15 == $itineraryDetail->tour_time) echo 'selected';?> value="15">15 minutes</option>
                    <option <?php if (20 == $itineraryDetail->tour_time) echo 'selected';?> value="20">20 minutes</option>
                    <option <?php if (30 == $itineraryDetail->tour_time) echo 'selected';?> value="30">30 minutes</option>
                    <option <?php if (60 == $itineraryDetail->tour_time) echo 'selected';?> value="60">1 hour</option>
                    <option <?php if (90 == $itineraryDetail->tour_time) echo 'selected';?> value="90">1 hour and 30 minutes</option>
                    <option <?php if (120 == $itineraryDetail->tour_time) echo 'selected';?> value="120">2 hours</option>
                    <option <?php if (150 == $itineraryDetail->tour_time) echo 'selected';?> value="150">2 hours and 30 minutes</option>
                    <option <?php if (180 == $itineraryDetail->tour_time) echo 'selected';?> value="180">3 hours</option>
                    <option <?php if (240 == $itineraryDetail->tour_time) echo 'selected';?> value="240">4 hours</option>
                  </select>

                <label>Days Open: </label>

                <div class="form-group row">

                  <div class="col">
                  <label>From:</label>
                  <select class="form-control" id="combostar" name="day_open_from">
                    <option <?php if (1 == $itineraryDetail->daysopen_from) echo 'selected';?> value="1">Sunday</option>
                    <option <?php if (2 == $itineraryDetail->daysopen_from) echo 'selected';?> value="2">Monday</option>
                    <option <?php if (3 == $itineraryDetail->daysopen_from) echo 'selected';?> value="3">Tuesday</option>
                    <option <?php if (4 == $itineraryDetail->daysopen_from) echo 'selected';?> value="4">Wednesday</option>
                    <option <?php if (5 == $itineraryDetail->daysopen_from) echo 'selected';?> value="5">Thursday</option>
                    <option <?php if (6 == $itineraryDetail->daysopen_from) echo 'selected';?> value="6">Friday</option>
                    <option <?php if (7 == $itineraryDetail->daysopen_from) echo 'selected';?> value="7">Saturday</option>
                  </select>
                  </div>
                  <div class="col">
                  <label>To:</label>
                  <select class="form-control" id="combostar" name="day_open_to">
                    <option <?php if (1 == $itineraryDetail->daysopen_to) echo 'selected';?> value="1">Sunday</option>
                    <option <?php if (2 == $itineraryDetail->daysopen_to) echo 'selected';?> value="2">Monday</option>
                    <option <?php if (3 == $itineraryDetail->daysopen_to) echo 'selected';?> value="3">Tuesday</option>
                    <option <?php if (4 == $itineraryDetail->daysopen_to) echo 'selected';?> value="4">Wednesday</option>
                    <option <?php if (5 == $itineraryDetail->daysopen_to) echo 'selected';?> value="5">Thursday</option>
                    <option <?php if (6 == $itineraryDetail->daysopen_to) echo 'selected';?> value="6">Friday</option>
                    <option <?php if (7 == $itineraryDetail->daysopen_to) echo 'selected';?> value="7">Saturday</option>
                  </select>
                  </div>
              </div>

              <!--
                <div class="input-group mb-3 row">
                <div class="input-group-prepend col">
                    <div class="input-group-text">
                      <input type="checkbox" onClick="toggle(this)" />&nbsp;Toggle All
                    </div>
                  </div>
                </div>
                <div class="input-group mb-3 row">
                  


                  <div class="input-group-prepend col">
                    <div class="input-group-text">
                      <input type="checkbox" aria-label="Checkbox for following text input" name="daylist[]" value="1" <?php if (strpos($itineraryDetail->days_open, '1') !== false) {echo 'checked';} ?>>
                    </div>
                    <input type="text" class="form-control" aria-label="Text input with checkbox" placeholder="Sunday">
                  </div>
                  <div class="input-group-prepend col">
                    <div class="input-group-text">
                      <input type="checkbox" aria-label="Checkbox for following text input" name="daylist[]" value="2" <?php if (strpos($itineraryDetail->days_open, '1') !== false) {echo 'checked';} ?>>
                    </div>
                    <input type="text" class="form-control" aria-label="Text input with checkbox" placeholder="Monday">
                  </div>
                  <div class="input-group-prepend col">
                    <div class="input-group-text">
                      <input type="checkbox" aria-label="Checkbox for following text input" name="daylist[]" value="3" <?php if (strpos($itineraryDetail->days_open, '1') !== false) {echo 'checked';} ?>>
                    </div>
                    <input type="text" class="form-control" aria-label="Text input with checkbox" placeholder="Tuesday">
                  </div>
                  <div class="input-group-prepend col">
                    <div class="input-group-text">
                      <input type="checkbox" aria-label="Checkbox for following text input" name="daylist[]" value="4" <?php if (strpos($itineraryDetail->days_open, '1') !== false) {echo 'checked';} ?>>
                    </div>
                    <input type="text" class="form-control" aria-label="Text input with checkbox" placeholder="Wednesday">
                  </div>
                  <div class="input-group-prepend col">
                    <div class="input-group-text">
                      <input type="checkbox" aria-label="Checkbox for following text input" name="daylist[]" value="5" <?php if (strpos($itineraryDetail->days_open, '1') !== false) {echo 'checked';} ?>>
                    </div>
                    <input type="text" class="form-control" aria-label="Text input with checkbox" placeholder="Thursday">
                  </div>
                  <div class="input-group-prepend col">
                    <div class="input-group-text">
                      <input type="checkbox" aria-label="Checkbox for following text input" name="daylist[]" value="6" <?php if (strpos($itineraryDetail->days_open, '1') !== false) {echo 'checked';} ?>>
                    </div>
                    <input type="text" class="form-control" aria-label="Text input with checkbox" placeholder="Friday">
                  </div>
                  <div class="input-group-prepend col">
                    <div class="input-group-text">
                      <input type="checkbox" aria-label="Checkbox for following text input" name="daylist[]" value="7" <?php if (strpos($itineraryDetail->days_open, '1') !== false) {echo 'checked';} ?>>
                    </div>
                    <input type="text" class="form-control" aria-label="Text input with checkbox" placeholder="Saturday">
                  </div>

                  
                </div>
                <script language="JavaScript">
                  function toggle(source) {
                    checkboxes = document.getElementsByName('daylist[]');
                    for(var i=0, n=checkboxes.length;i<n;i++) {
                      checkboxes[i].checked = source.checked;
                    }
                  }
                </script>

                -->


            <div class="form-group row">
                <div class="col">
                <label>Opening Time:</label>
                <select class="form-control" id="combostar" name="time_open">
                  <?php 
                      for ($i = 0; $i < 24; $i++) {
                        $timeString = '';
                        $twelve = 12;
                        if ($i <= 9) { if ($i == 0) {$timeString .= '12';} else {$timeString .= '0';}};
                        if ($i <= 12) { if ($i != 0) {$timeString .= $i;} } else { $timeString .= ($i - $twelve);}
                        if ($i <= 11 || $i == 0) { $timeString .= ':00 AM'; } else { $timeString .= ':00 PM'; }
                        echo '<option value="' . $i . '" ';
                        if ($i == $itineraryDetail->time_open) { echo 'selected'; }
                        echo '>' . $timeString . '</option>';
                      }
                    ?>

                </select>
                </div>
                <div class="col">
                <label>Closing Time:</label>
                <select class="form-control" id="combostar" name="time_closed">
                  <?php 
                      for ($i = 0; $i < 24; $i++) {
                        $timeString = '';
                        $twelve = 12;
                        if ($i <= 9) { if ($i == 0) {$timeString .= '12';} else {$timeString .= '0';}};
                        if ($i <= 12) { if ($i != 0) {$timeString .= $i;} } else { $timeString .= ($i - $twelve);}
                        if ($i <= 11 || $i == 0) { $timeString .= ':00 AM'; } else { $timeString .= ':00 PM'; }
                        echo '<option value="' . $i . '" ';
                        if ($i == $itineraryDetail->time_closed) { echo 'selected'; }
                        echo '>' . $timeString . '</option>';
                      }
                    ?>
                </select>
                </div>
            </div>
            <div class="form-group">
                <label>Notes:</label>
                <input class="form-control" placeholder="<?php echo $itineraryDetail->tips; ?>" name="tips" type="text" autofocus value="<?php echo $itineraryDetail->tips; ?>">

                <!--

                <div class="form-group">
                  <div class="row">
                      <div class="col-md-12">
                          <label for="filename" class="control-label">Upload Image</label>
                      </div>
                  </div>

                  <div class="row">
                      <div class="col-md-12">
                          <input type="file" name="filename" size="20" />
                          <span class="text-danger"><?php if (isset($error)) { echo $error; } ?></span>
                      </div>
                  </div>
                </div>
                -->

              <!--
              <div class="form-group">
                  <div class="row">
                      <div class="col-md-12">
                          <input type="submit" value="Upload File" class="btn btn-primary"/>
                      </div>
                  </div>
              </div>
              -->
              <div class="form-group">
                  <div class="row">
                      <div class="col-md-12">
                          <label for="filename" class="control-label">Upload Image</label>
                      </div>
                  </div>

                  <div class="row">
                      <div class="col-md-12">
                          <input type="file" name="filename" size="20" />
                          <span class="text-danger"><?php if (isset($error)) { echo $error; } ?></span>
                      </div>
                  </div>

                  <?php echo '<input type="hidden" name="originalImageLink" value="' . $itineraryDetail->image_url . '"></input>'; ?>

            </div>


                <input class="btn btn-lg btn-success btn-block" type="submit" value="Edit Place" name="go" >
                <button type="button" class="btn btn-lg btn-warning btn-block"><?php echo '<a style="text-decoration: none; color: black;" href="' . base_url('user/admin_dashboard') . '">Cancel</a>'; ?></button>

        </fieldset>
      <!--</form>-->
      <?php } ?>
      <?php echo form_close(); ?>
      </div>
    </header>



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

      <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/tagmanager/3.0.2/tagmanager.min.css">
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/tagmanager/3.0.2/tagmanager.min.js"></script>

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

  </body>

</html>