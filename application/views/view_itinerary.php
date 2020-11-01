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

    <title>Manila Tourist Information System - <?php echo $itineraryDetails[0]->name; ?></title>

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
        <?php 
          foreach ($itineraryDetails as $itineraryDetail) { ?>
            <h1 style="text-align: center" class="text-uppercase mb-0"><?=$itineraryDetail->name;?></h1><br><br>
            <!--<img style ="width:70%;height:auto;"class="img-fluid mb-5 d-block mx-auto" src="<?php echo base_url(); ?>assets/wp_content/images/<?php echo str_replace(' ', '_', $itineraryDetail->name) ?>.png" alt="">-->
            <img style ="width:70%;height:auto;"class="img-fluid mb-5 d-block mx-auto" src="<?php echo base_url(); ?>assets/wp_content/images/<?php echo str_replace(' ', '_', $itineraryDetail->image_url) ?>.png" alt="">
            <h3 style="text-align: center; font-weight: bold;" class=""><?=$itineraryDetail->mini_desc;?></h3><br><br>
            
            <div class="container row">
              <br><br>
              <div class="col col-sm-8" style="background-color: #2C3E50;">
              <br>  
                <h4 style="left-align">Rating</h4>
                <?php if ($this->view_model->getAverageRatingByName($itineraryDetail->name) == 0) { echo 'No user ratings yet.'; } else { echo $this->view_model->getAverageRatingByName($itineraryDetail->name) . '/ 5'; } ?>
                <br><br>
                <h4 style="left-align">Description</h4>
                <?=$itineraryDetail->description;?>
                <br><br>
                <h4 style="left-align">Location</h4>
                <?=$itineraryDetail->location;?>
                <br><br>
                <h4 style="left-align">Tags</h4>
                <?php 
                  $itineraryTags = preg_split('/\|/', $itineraryDetail->tags);
                  foreach ($itineraryTags as $tag) {
                    echo '<button type="button" class="btn btn-sm btn-primary" disabled>' . $tag . '</button> ';
                  }
                ?>
                <br><br>
                <h4 style="left-align">Estimated Tour Time</h4>
                  <?=$itineraryDetail->tour_time;?> minutes
                  <br><br>
                <h4 style="left-align">Days Open</h4>
                <!--
                <ul>
                <?php 
                  $days = str_split($itineraryDetail->days_open);
                  foreach ($days as $day) {
                    switch ($day) {
                      case '1':
                        echo '<li>Sunday</li>';
                        break;
                      case '2':
                        echo '<li>Monday</li>';
                        break;
                      case '3':
                        echo '<li>Tuesday</li>';
                        break;
                      case '4':
                        echo '<li>Wednesday</li>';
                        break;
                      case '5':
                        echo '<li>Thursday</li>';
                        break;
                      case '6':
                        echo '<li>Friday</li>';
                        break;
                      case '7':
                        echo '<li>Saturday</li>';
                        break;
                      
                      
                      default:
                        # code...
                        break;
                    }
                  }

                ?>
                </ul>
                -->
                
                <?php 
                  $day = $itineraryDetail->daysopen_from;
                  switch ($day) {
                    case '1':
                      echo 'Sunday';
                      break;
                    case '2':
                      echo 'Monday';
                      break;
                    case '3':
                      echo 'Tuesday';
                      break;
                    case '4':
                      echo 'Wednesday';
                      break;
                    case '5':
                      echo 'Thursday';
                      break;
                    case '6':
                      echo 'Friday';
                      break;
                    case '7':
                      echo 'Saturday';
                      break;
                    
                    
                    default:
                      # code...
                      break;
                  }
                  

                ?>
                 -  
                <?php 
                  $day = $itineraryDetail->daysopen_to;
                  switch ($day) {
                    case '1':
                      echo 'Sunday';
                      break;
                    case '2':
                      echo 'Monday';
                      break;
                    case '3':
                      echo 'Tuesday';
                      break;
                    case '4':
                      echo 'Wednesday';
                      break;
                    case '5':
                      echo 'Thursday';
                      break;
                    case '6':
                      echo 'Friday';
                      break;
                    case '7':
                      echo 'Saturday';
                      break;
                    
                    
                    default:
                      # code...
                      break;
                  }
                  

                ?>
                <br>
                <br>
                  
                  
                  <h4 style="left-align">Operating Hours</h4>
                  <?php 
                  if ($itineraryDetail->time_open > 12) {
                    echo ($itineraryDetail->time_open - 12) . ':00 PM';
                  }
                  else {
                    if ($itineraryDetail->time_open == 0) {
                      echo '12:00 AM';
                    }
                    else {
                      echo $itineraryDetail->time_open . ':00 AM';
                    }
                  }
                  
                  echo ' - ';

                  if ($itineraryDetail->time_closed > 12) {
                    echo ($itineraryDetail->time_closed - 12) . ':00 PM';
                  }
                  else {
                    if ($itineraryDetail->time_closed == 0) {
                      echo '12:00 AM';
                    }
                    else {
                      echo $itineraryDetail->time_closed . ':00 AM';
                    }
                  }
                  ?>
                  <br><br>
                  <h4 style="left-align">Notes</h4>
                    <?=$itineraryDetail->tips;?>
                    <br><br>
                  </div>


                  <!-- reviews -->

                  <div class="col" style="background-color: #1a252f; height: 900px; overflow: scroll;">

                  <br>
                  <h4 id="reviews" style="left-align">Reviews</h4>
                  <br>
                    <?php echo '<div class=""><br>';
                    
                      $counter = 0;
                      foreach($reviews as $review) {
                        if ($counter < 3) {
                          echo '<span class="teaser">';
                        }
                        else {
                          echo '<span class="complete">';
                        }
                        echo '<div class="col" style="word-wrap: break-word"><div class="alert alert-light" role="alert" style="width: 300px; word-wrap: break-word">';
                            echo '<h5>' . $this->view_model->getUserNameById($review->user_id) . '</h5>';
                            echo '<h6>' . $review->date . '</h6>';
                            echo '<h6>Rating: ' . $review->rating . '</h6>';
                            echo $review->comment;
                            $user_id=$this->session->userdata('user_name');
                            if($user_id == 'admin') {
                              echo '<a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="' . base_url() . 'user/delete_review/'. $review->review_id . '/' . str_replace(' ', '_', $itineraryDetail->name) . '">Delete Review</a>';
                            }
                        echo '</div></div>';
                        echo '</span>'; 
                        $counter++;
                      }
                      
                    
                    echo '</div>';

                    echo '<div class="row">';
                    
                    if ($counter == 0) echo'<a class="col">No reviews.</a>';
                    echo '<a href="#reviews" class="clickmore col">'; 
                    if ($counter > 3) echo'See more';
                    echo '</a>';
                    echo '</div>';

                    ?>

<?php
$date1=date_create("2013-03-15");
$date2=date_create("2013-12-12");
$diff=date_diff($date1,$date2);
$diff2= $diff->format("%a");

//echo date("F j, Y, g:i a T");
$dt = new DateTime(date("F j, Y, g:i a T"), new DateTimeZone('UTC'));
$dt->setTimezone(new DateTimeZone('Asia/Manila'));
//print_r($dt);
//echo $dt->format("F j, Y, g:i A");

$difftemp = date_diff(date_create('September 10, 2018, 10:22 AM'),date_create(date("F j, Y, g:i A")));
  //var_dump($difftemp);
  //echo $difftemp->format('%d');
  if ($difftemp->format('%d') >= 7) {
    //echo 'x';
  }
  else {
    //echo 'y';
  }

?>

                    <br><br>
                    
                    <div class="row">
                    <?php 
                        $user_id=$this->session->userdata('user_name');
                        $userId=$this->session->userdata('user_id');

                        


                        if(!$user_id) {
                          //echo '<div class="col">';
                          //echo '<h5>Write a comment</h5><br>';
                          //echo 'You need to be logged in in order to write a comment.';
                          //echo '</div>';
                        }
                        else {
                          //echo 'Welcome ' . $user_id . '<a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="user/user_logout">Logout</a>';
                          
                          if ($this->view_model->checkUserCommentPlace(0, $userId, $itineraryDetails[0]->itinerary_id)) {
                            $reviews = $this->view_model->checkUserCommentPlace(0, $userId, $itineraryDetails[0]->itinerary_id);
                            //var_dump($reviews);
                            $review = $reviews[count($reviews)-1];
                            //var_dump($review);
                            //echo $review->rating;
                            echo '<div class="col">';
                            echo '<h4>Edit your last review</h4><br>';
                            echo '<form role="form" method="post" action="' . base_url('view/editComment') . '">
                                    <fieldset>
                                        
                                        <div class="form-group">
                                            <div class="form-group col-6">
                                              <label>Rating:</label><br/>
                                              <select class="form-control" name="rating">
                                                
                                                <option value="1"'; if($review->rating == 1) echo ' selected'; echo '>1 star</option>
                                                <option value="2"'; if($review->rating == 2) echo ' selected'; echo '>2 stars</option>
                                                <option value="3"'; if($review->rating == 3) echo ' selected'; echo '>3 stars</option>
                                                <option value="4"'; if($review->rating == 4) echo ' selected'; echo '>4 stars</option>
                                                <option value="5"'; if($review->rating == 5) echo ' selected'; echo '>5 stars</option>
                                              </select>
                                            </div>

                                        </div>
                                        
                                        <div class="form-group col">
                                            <label>Comment:</label>
                                            <textarea class="form-control" id="exampleFormControlTextarea1" name="user_comment" rows="5" placeholder="">' . $review->comment . '</textarea>

                                            <input type="hidden" name="itineraryName" value="';
                                            foreach ($itineraryDetails as $itineraryDetail) { echo $itineraryDetail->name; };
                                            echo '">
                                            <input type="hidden" name="review_id" value="' . $review->review_id . '"
                                        </div>

                                        <div class="col">
                                            <input class="btn btn-lg btn-success" type="submit" value="Edit Review" name="go" >
                                        </div>

                                    </fieldset>
                                  </form>
                            ';
                            echo '</div>';                          
                          }
                          //echo $userId;
                          //echo '?' . var_dump($this->view_model->checkIfEligibleToCommentTEST($userId, $itineraryDetail->itinerary_id)) . '?';  
                          if($this->view_model->checkIfEligibleToComment($userId, $itineraryDetail->itinerary_id)){
                          echo '<div class="col">';
                          echo '<h4>Post a new review</h4><br>';
                          echo '<form role="form" method="post" action="' . base_url('view/postComment') . '">
                                  <fieldset>
                                      
                                      <div class="form-group">
                                          <div class="form-group col-6">
                                            <label>Rating:</label><br/>
                                            <select class="form-control" name="rating">
                                              <option selected>Choose...</option>
                                              <option value="1">1 star</option>
                                              <option value="2">2 stars</option>
                                              <option value="3">3 stars</option>
                                              <option value="4">4 stars</option>
                                              <option value="5">5 stars</option>
                                            </select>
                                          </div>

                                      </div>
                                      
                                      <div class="form-group col">
                                          <label>Comment:</label>
                                          <textarea class="form-control" id="exampleFormControlTextarea1" name="user_comment" rows="5"></textarea>
                                          <input type="hidden" name="itineraryName" value="';
                                          foreach ($itineraryDetails as $itineraryDetail) { echo $itineraryDetail->name; };
                                          echo '">
                                      </div>

                                      <br>
                                      <div class="col">
                                          <input class="btn btn-lg btn-success" type="submit" value="go" name="go" >
                                      </div>

                                  </fieldset>
                                </form>
                          ';
                          echo '</div>'; }
                        }
                        ?>
                    <!--
                      <div class="col-lg-4 ml-auto">
                        <p class="lead">Freelancer is a free bootstrap theme created by Start Bootstrap. The download includes the complete source files including HTML, CSS, and JavaScript as well as optional LESS stylesheets for easy customization.</p>
                      </div>
                      <div class="col-lg-4 mr-auto">
                        <p class="lead">Whether you're a student looking to showcase your work, a professional looking to attract clients, or a graphic artist looking to share your projects, this template is the perfect starting point!</p>
                      </div>
                      -->
                    </div>

                  </div>
            </div>
            <br>
            
          
        <?php } ?>
      </div>
    </header>



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