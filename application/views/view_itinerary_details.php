<?php
$user_id=$this->session->userdata('user_id');
$user_name = $this->session->userdata('user_name');

/*
if(!$user_id){
  //echo "no session";
  redirect('user/login_view');
}
*/



 ?>
 <!--
<html>
<body>
<h4><?=$testtest;?></h4>
-->

<?php 
  /*
  if($directions == FALSE) {
    echo 'FALSE';
  }
  else { echo 'TRUE';}

  echo $intent;
  echo '<br>';
  echo $ifIntent;
  echo '<br>';
  echo $total_alloted_time;

  echo 'CHECKBOX' . $checkbox;



  foreach ((array)$itineraryset as $itineraries) {
    echo $itineraries->name;
  }
  */
?>
<!--
</body>
</html>
-->

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

    <title>Manila Tourist Information System - <?php echo $itineraryDetails[0]->name ?></title>

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
      <div class="container left-align table-responsive-sm">

      <h1 style="text-align: center" class="text-uppercase mb-0"><?php echo $itineraryDetails[0]->name ?></h1><br><br>
      <h1></h1>

      <!--<?php $newId = $this->createplan_model->getLatestItineraryId(); echo $newId[0]->itinerary_id; ?>-->

      <h5>Created By: <?php echo $itineraryDetails[0]->author; ?></h5>
      <h5>
        Alloted Time: <?php echo $itineraryDetails[0]->alloted_time . ' hours'; ?> &emsp; 
        Places of Intent: <?php echo $itineraryDetails[0]->user_tags; ?> &emsp;
        Start Time: <?php 
        if ($itineraryDetails[0]->start_time > 12) {
          echo ($itineraryDetails[0]->start_time - 12) . ':00 PM';
        }
        else {
          if ($itineraryDetails[0]->start_time == 0) {
            echo '12:00 AM';
          }
          else if ($itineraryDetails[0]->start_time == 12) {
            echo '12:00 PM';
          }
          else {
            echo $itineraryDetails[0]->start_time . ':00 AM';
          }
        }
        ?> &emsp;</h5><h5>
        <!--User Rating Preference: <?php echo $itineraryDetails[0]->rating; echo ' star'; if ($itineraryDetails[0]->rating > 1) echo 's'; echo ' and above';
        ?>-->
      </h5>
      <h5>Itinerary Rating: <?php if ($itineraryDetails[0]->ratingv2 == 0) {echo 'No user ratings yet.';} else {echo $itineraryDetails[0]->ratingv2;} if ($itineraryDetails[0]->ratingv2 != 0){echo ' star'; if ($itineraryDetails[0]->ratingv2 > 1) echo 's'; echo ' and above';} ?></h5>
      <br>

        <table class="table table-bordered table-striped table-hover">
        <form role="form" method="post" action="<?php echo base_url('view/create_pdf2'); ?>">
        
        <?php echo '<input type="hidden" name="alloted_time_sv" value="' . $itineraryDetails[0]->alloted_time . '">'; ?>
        <?php echo '<input type="hidden" name="user_tags_sv" value="' . $itineraryDetails[0]->user_tags . '">'; ?>
        <?php echo '<input type="hidden" name="start_time_sv" value="' . $itineraryDetails[0]->start_time . '">'; ?>
        <?php echo '<input type="hidden" name="rating_sv" value="' . $itineraryDetails[0]->rating . '">'; ?>
          <thead>
            <tr class="bg-success">
              <th scope="col">#</th>
              <th scope="col">Timeframe</th>
              <th scope="col">Image</th>
              <th scope="col">Name</th>
              <th scope="col">Description</th>
              <th scope="col">Location</th>
              <th scope="col">Sugg. Tour Time</th>
              <th scope="col">Business Hours</th>
              <th scope="col">Notes</th>
            </tr>
          </thead>
          <tbody style="color: black;">
          <?php 
            $count = 1;

            $itineraryName = unserialize($itineraryDetails[0]->place_name);
            $itineraryTimeframeStart = unserialize($itineraryDetails[0]->timeframe_start);
            $itineraryTimeframeEnd = unserialize($itineraryDetails[0]->timeframe_end);
            $itineraryImage = unserialize($itineraryDetails[0]->place_image_url);
            $itineraryDesc = unserialize($itineraryDetails[0]->place_desc);
            $itineraryLocation = unserialize($itineraryDetails[0]->place_location);
            $itineraryTourTime = unserialize($itineraryDetails[0]->place_tourtime);
            $itineraryTimeOpen = unserialize($itineraryDetails[0]->place_hours_open);
            $itineraryTimeClosed = unserialize($itineraryDetails[0]->place_hours_closed);
            $itineraryTips = unserialize($itineraryDetails[0]->place_notes);

            $placesv2 = $itineraryDetails[0]->placesv2;
            $places = preg_split('/\|/', $placesv2);

            $count = 1;
            
            $current_time = 0;
            $current_time = (int)$itineraryDetails[0]->start_time;
            //echo $current_time;
            $current_minute = 0;

            foreach ($places as $placeID) {
              //echo $this->view_model->checkIfPlaceExists($placeID);
              if ($this->view_model->checkIfPlaceExists($placeID)) {

              $itinerary = $this->view_model->getPlaceDetailsByID($placeID);
                            
              echo '<input type="hidden" name="itineraryId[]" value="' . $itinerary[0]->itinerary_id . '"></input>';

              echo '<tr class="table-light">';
              echo '<th scope="row">' . $count . '</th>';
              echo '<td scope="row">';
              //echo print_time() . ' - ';
              //echo $current_time;
              if ($current_time > 12) {
                echo ($current_time - 12) . ':'; if ($current_minute < 10) {echo '0';} echo $current_minute; echo ' PM';
              }
              else {
                if ($current_time == 0) {
                  echo '12:'; if ($current_minute < 10) {echo '0';} echo $current_minute; echo ' AM';
                }
                else if ($current_time == 12) {
                  echo '12:'; if ($current_minute < 10) {echo '0';} echo $current_minute; echo ' PM';
                }
                else {
                  echo $current_time . ':'; if ($current_minute < 10) {echo '0';} echo $current_minute; echo ' AM';
                }
              }
              echo '<input type="hidden" name="timeframestart[]" value="';
              if ($current_time > 12) {
                echo ($current_time - 12) . ':'; if ($current_minute < 10) {echo '0';} echo $current_minute; echo ' PM';
              }
              else {
                if ($current_time == 0) {
                  echo '12:'; if ($current_minute < 10) {echo '0';} echo $current_minute; echo ' AM';
                }
                else if ($current_time == 12) {
                  echo '12:'; if ($current_minute < 10) {echo '0';} echo $current_minute; echo ' PM';
                }
                else {
                  echo $current_time . ':'; if ($current_minute < 10) {echo '0';} echo $current_minute; echo ' AM';
                }
              }
              echo '"></input>';
              //echo add_time($itinerary->tour_time);
              if (($current_minute + (int)$itinerary[0]->tour_time) >= 60) {
                $current_time += floor(($current_minute + (int)$itinerary[0]->tour_time) / 60);
                $current_minute = ($current_minute + (int)$itinerary[0]->tour_time) % 60;
              }
              else {
                $current_minute = $current_minute + (int)$itinerary[0]->tour_time;
              }

              

              echo ' - ';
              //echo check_time();
              //$current_time += 1;
              //echo '$' . $current_time . '$';
              if ($current_time > 12) {
                echo ($current_time - 12) . ':'; if ($current_minute < 10) {echo '0';} echo $current_minute; echo ' PM';
              }
              else {
                if ($current_time == 0) {
                  echo '12:'; if ($current_minute < 10) {echo '0';} echo $current_minute; echo ' AM';
                }
                else if ($current_time == 12) {
                  echo '12:'; if ($current_minute < 10) {echo '0';} echo $current_minute; echo ' PM';
                }
                else {
                  echo $current_time . ':'; if ($current_minute < 10) {echo '0';} echo $current_minute; echo ' AM';
                }
              }
              echo '<input type="hidden" name="timeframeend[]" value="';
              if ($current_time > 12) {
                echo ($current_time - 12) . ':'; if ($current_minute < 10) {echo '0';} echo $current_minute; echo ' PM';
              }
              else {
                if ($current_time == 0) {
                  echo '12:'; if ($current_minute < 10) {echo '0';} echo $current_minute; echo ' AM';
                }
                else if ($current_time == 12) {
                  echo '12:'; if ($current_minute < 10) {echo '0';} echo $current_minute; echo ' PM';
                }
                else {
                  echo $current_time . ':'; if ($current_minute < 10) {echo '0';} echo $current_minute; echo ' AM';
                }
              }

              if (($current_minute + 15) >= 60) {
                $current_time += floor(($current_minute + 15) / 60);
                $current_minute = ($current_minute + (int)$itinerary[0]->tour_time) % 60;
              }
              else {
                $current_minute = $current_minute + 15;
              }

              echo '"></input>';
              //echo print_time() . '</td>';
              echo '<td><img style ="width:120px;height:90px;" src="' . base_url() . 'assets/wp_content/images/' . str_replace(' ', '_', $itinerary[0]->image_url) . '.png" alt=""></td>';
              echo '<input type="hidden" name="itineraryImage[]" value="' . base_url() . 'assets/wp_content/images/' . str_replace(' ', '_', $itinerary[0]->image_url) . '.png"></input>';
              echo '<td>' . $itinerary[0]->name . '</td>';
              echo '<input type="hidden" name="itineraryName[]" value="' . $itinerary[0]->name . '"></input>';
              echo '<td>' . $itinerary[0]->mini_desc . '</td>';
              echo '<input type="hidden" name="itineraryDesc[]" value="' . $itinerary[0]->mini_desc . '"></input>';
              echo '<td>' . $itinerary[0]->location . '</td>';
              echo '<input type="hidden" name="itineraryLocation[]" value="' . $itinerary[0]->location . '"></input>';
              echo '<td>';

              if ($itinerary[0]->tour_time >= 60) {
                echo $itinerary[0]->tour_time / 60 . ' hours</td>';
              }
              else {
                echo  $itinerary[0]->tour_time . ' minutes</td>';
              }
              echo '<input type="hidden" name="itineraryTourTime[]" value="';
              if ($itinerary[0]->tour_time >= 60) {
                echo $itinerary[0]->tour_time / 60 . ' hours';
              }
              else {
                echo  $itinerary[0]->tour_time . ' minutes';
              }
              echo '"</td></input>';
              echo '<td>';
              if ($itinerary[0]->time_open > 12) {
                echo ($itinerary[0]->time_open - 12) . ':00 PM';
              }
              else {
                if ($itinerary[0]->time_open == 0) {
                  echo '12:00 AM';
                }
                else {
                  echo $itinerary[0]->time_open . ':00 AM';
                }
              }
              //echo date ('h:i', strtotime($itinerary->time_open));
              echo '<center> - </center>';
              echo '<input type="hidden" name="itineraryTimeOpen[]" value="';
              if ($itinerary[0]->time_open > 12) {
                echo ($itinerary[0]->time_open - 12) . ':00 PM';
              }
              else {
                if ($itinerary[0]->time_open == 0) {
                  echo '12:00 AM';
                }
                else {
                  echo $itinerary[0]->time_open . ':00 AM';
                }
              }
              echo '"></input>';
              echo '';
              if ($itinerary[0]->time_closed > 12) {
                echo ($itinerary[0]->time_closed - 12) . ':00 PM';
              }
              else {
                if ($itinerary[0]->time_closed == 0) {
                  echo '12:00 AM';
                }
                else {
                  echo $itinerary[0]->time_closed . ':00 AM';
                }
              }
              //echo date ('h:i', strtotime($itinerary->time_closed)); 
              echo '</td>';
              echo '<input type="hidden" name="itineraryTimeClosed[]" value="';
              if ($itinerary[0]->time_closed > 12) {
                echo ($itinerary[0]->time_closed - 12) . ':00 PM';
              }
              else {
                if ($itinerary[0]->time_closed == 0) {
                  echo '12:00 AM';
                }
                else {
                  echo $itinerary[0]->time_closed . ':00 AM';
                }
              }
              echo '"></input>';
              
              echo '<td>' . $itinerary[0]->tips . '</td>';
              echo '<input type="hidden" name="notes[]" value="' . $itinerary[0]->tips . '"></input>';

              
              echo '</tr>';
              $count++;
            }

            }
          
            
          ?>

          <?php
            /**
            //foreach ((array)$itineraryset as $itinerary) {
            for ($i = 0; $i < count($itineraryName); $i++) {
              

              echo '<tr class="table-light">';
              echo '<th scope="row" style="color: black;">' . $count . '</th>';
              echo '<td scope="row" style="color: black;">';
              //echo print_time() . ' - ';
              //echo $current_time;
              echo $itineraryTimeframeStart[$i];
              echo '<input type="hidden" name="timeframestart[]" value="';
              echo $itineraryTimeframeStart[$i];
              echo '"></input>';
              //echo add_time($itinerary->tour_time);
              //echo check_time();
              //$current_time += 1;
              echo ' - ';
              //echo '$' . $current_time . '$';
              echo $itineraryTimeframeEnd[$i];
              echo '<input type="hidden" name="timeframeend[]" value="';
              echo $itineraryTimeframeEnd[$i];
              echo '"></input>';
              //echo print_time() . '</td>';
              echo '<td  style="color: black;"><img style ="width:120px;height:90px;" src="' . $itineraryImage[$i] . '" alt=""></td>';
              echo '<input type="hidden" name="itineraryImage[]" value="' . $itineraryImage[$i] . '"></input>';
              echo '<td style="color: black;">' . $itineraryName[$i] . '</td>';
              echo '<input type="hidden" name="itineraryName[]" value="' . $itineraryName[$i] . '"></input>';
              echo '<td style="color: black;">' . $itineraryDesc[$i] . '</td>';
              echo '<input type="hidden" name="itineraryDesc[]" value="' . $itineraryDesc[$i] . '"></input>';
              echo '<td style="color: black;">' . $itineraryLocation[$i] . '</td>';
              echo '<input type="hidden" name="itineraryLocation[]" value="' . $itineraryLocation[$i] . '"></input>';
              echo '<td style="color: black;">';

              echo $itineraryTourTime[$i];

              //echo unserialize($itineraryDetails[0]->place_tourtime)[$i];
              //var_dump(unserialize($itineraryDetails[0]->place_tourtime)[$i]);

              //echo unserialize($itineraryDetails[0]->place_tourtime)[1];
              echo '</td>';
              echo '<input type="hidden" name="itineraryTourTime[]" value="' . $itineraryTourTime[$i] . '"></input>';
              echo '<input type="hidden" name="itineraryTT2[]" value="' . $itineraryTourTime[$i] . '"></input>';
              echo '<input type="hidden" name="TESTARRAY[]" value="' . unserialize($itineraryDetails[0]->place_tourtime)[$i] . '"></input>';
              echo '<td style="color: black;">';
              echo $itineraryTimeOpen[$i];
              //echo date ('h:i', strtotime($itinerary->time_open));
              echo '<center> - </center>';
              echo '<input type="hidden" name="itineraryTimeOpen[]" value="' . $itineraryTimeOpen[$i] . '"></input>';
              echo '';
              echo $itineraryTimeClosed[$i];
              //echo date ('h:i', strtotime($itinerary->time_closed)); 
              echo '</td>';
              echo '<input type="hidden" name="itineraryTimeClosed[]" value="' . $itineraryTimeClosed[$i] . '"></input>';
              
              echo '<td style="color: black;">' . $itineraryTips[$i] . '</td>';
              echo '<input type="hidden" name="notes[]" value="' . $itineraryTips[$i] . '"></input>';

              
              echo '</tr>';
              $count++;
            }
            **/
          ?>

          </tbody>
        
        </table>

        <input type="hidden" name="itineraryRealName" value="<?php echo $itineraryDetails[0]->name ?>">

        <input type="hidden" name="author" value="<?php echo $user_name; ?>">

        

        <center><input class="btn btn-light btn-success" type="submit" value="Export as PDF" name="go" <?php if (!$user_id) {echo 'disabled';} ?>"></center>
        </form>



        <br><br>

        
        
        
        

          

        

        <?php 
        /**
        if ($addTimeItinerary) {
          echo '<table class="table table-bordered table-striped table-hover">
          <thead>
            <tr class="bg-success">
              <th scope="col">#</th>
              <th scope="col">Image</th>
              <th scope="col">Name</th>
              <th scope="col">Description</th>
              <th scope="col">Location</th>
              <th scope="col">Time Open</th>
            </tr>
          </thead>
          <tbody>
          ';
        

        
          
            $count = 1;
            foreach ((array)$addTimeItinerary as $itinerary) {
              echo '<tr class="table-light">';
              echo '<th scope="row">' . $count . '</th>';
              echo '<td><img style ="width:auto;height:20%;" src="' . base_url() . 'assets/wp_content/images/' . str_replace(' ', '_', $itinerary->name) . '.png" alt=""></td>';
              
              echo '<td>' . $itinerary->name . '</td>';
              
              echo '<td>' . $itinerary->mini_desc . '</td>';
              
              echo '<td>' . $itinerary->location . '</td>';
              
              echo '<td>' . $itinerary->time_open . '</td>';
              
              
              

              
              echo '</tr>';
              $count++;
            }
          
            echo '
          </tbody>
        
        </table>';
      }
      **/
        ?>

        

        <!--<button type="button" class="btn btn-light"><?php echo '<a style="text-decoration: none; color: black;" href="' . base_url('createplan/create_pdf') . '">Create PDF</a>'; ?></button>-->

        <!--
        <img class="img-fluid mb-5 d-block mx-auto" src="<?php echo base_url(); ?>assets/img/profile.png" alt="">
        
        <h1 style="text-align: left" class="text-uppercase mb-0">Welcome to CM Trip Planner</h1>
        <br />
        <h2 style="text-align: left" class="font-weight-light mb-0">This website helps local tourists and travel agencies in creating a trip planner that focuses on user's preferences.</h2>
        -->
        <?php 
          /*
          foreach ($itineraryDetails as $itineraryDetail) { ?>
            <h1 style="text-align: center" class="text-uppercase mb-0"><?=$itineraryDetail->name;?></h1><br><br>
            <img style ="width:70%;height:auto;"class="img-fluid mb-5 d-block mx-auto" src="<?php echo base_url(); ?>assets/wp_content/images/<?php echo str_replace(' ', '_', $itineraryDetail->name) ?>.png" alt="">
            <h3 style="text-align: center" class="font-weight-light mb-0"><?=$itineraryDetail->mini_desc;?></h3><br><br>
            
            <div class="container row">
              <br><br>
              <div class="col">
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
              </div>
            </div>
            <br>
            <div class="container row">
              <br><br>
                <div class="col-sm-4">
                  <h4 style="left-align">Days Open</h4>
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

                  <br><br>
                  <h4 style="left-align">Estimated Tour Time</h4>
                  <?=$itineraryDetail->tour_time;?> minutes
                  <br><br>
                  <h4 style="left-align">Operating Hours</h4>
                  <?php $time = $itineraryDetail->time_open; echo date ('h:i A',strtotime($time)); ?> - <?php $time = $itineraryDetail->time_closed; echo date ('h:i A',strtotime($time)); ?>
                  <br><br>
                </div>
                <div class="col-sm-8">
              <h4 style="left-align">Notes</h4>
              <?=$itineraryDetail->tips;?>
              </div>
            </div>
        
        <?php  } */ ?>
      </div>
    </header>


    
    <section class="bg-secondary text-white mb-0" id="reviews">
      <div class="container">
        <h2 class="text-center text-uppercase text-white">Reviews</h2><br><br>
          <div class="">
                    <?php 
                      $userId=$this->session->userdata('user_id');
                      $counter = 0;
                      foreach($reviews as $review) {
                        if ($counter < 3) {
                          echo '<span class="teaser">';
                        }
                        else {
                          echo '<span class="complete">';
                        }
                        echo '<div class="col"><div class="alert alert-light" role="alert">';
                            echo '<h5>' . $this->view_model->getUserNameById($review->user_id) . '</h5>';
                            echo '<h6>' . $review->date . '</h6>';
                            echo '<h6>Rating: ' . $review->rating . '</h6>';
                            echo $review->comment;
                            $user_id=$this->session->userdata('user_name');
                            if($user_id == 'admin') {
                              echo '<a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="' . base_url() . 'user/delete_review2/'. $review->review_id . '/' . $itineraryDetails[0]->itinerary_id . '">Delete Review</a>';
                            }
                        echo '</div></div>';
                        echo '</span>'; 
                        $counter++;
                      }
                      
                    ?>
                    </div>

                    <div class="row">
                    <!--<span class="more"><h5>See more</h5></span>-->
                    <?php if ($counter > 3) echo '<a href="#reviews" class="clickmore col">See more</a>'; else if ($counter == 0) {echo '<center>No user reviews yet.</center>';} else {} ?>

                    </div>
                    <br><br>
                    
                    <div class="row">
                    <?php 
                        $user_id=$this->session->userdata('user_name');
                        if(!$user_id) {
                          //echo '<div class="col">';
                          //echo '<h5>Write a comment</h5><br>';
                          //echo 'You need to be logged in in order to write a comment.';
                          //echo '</div>';
                        }
                        else {
                          //echo 'Welcome ' . $user_id . '<a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="user/user_logout">Logout</a>';
                          
                          if ($this->view_model->checkUserCommentPlace(1, $userId, $itineraryDetails[0]->itinerary_id)) {
                            
                            $reviews = $this->view_model->checkUserCommentPlace(1, $userId, $itineraryDetails[0]->itinerary_id);
                            //var_dump($reviews);
                            $review = $reviews[count($reviews)-1];
                            //echo $review->rating;
                            echo '<div class="col">';
                            echo '<h4>Edit your last review</h4><br>';
                            echo '<form role="form" method="post" action="' . base_url('view/editComment2') . '">
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
                                            <input type="hidden" name="review_id" value="' . $review->review_id . '">
                                            <input type="hidden" name="itinerary_id_link" value="' . $itineraryDetails[0]->itinerary_id . '">
                                        </div>

                                        <br>
                                        <div class="col">
                                            <input class="btn btn-lg btn-success" type="submit" value="Edit Review" name="go" >
                                        </div>

                                    </fieldset>
                                  </form>
                            ';
                            echo '</div>';                          
                          }
                          else {
                          if($this->view_model->checkIfEligibleToComment3($userId, $itineraryDetails[0]->itinerary_id)){
                          echo '<div class="col">';
                          echo '<h4>Post a review</h4><br>';
                          echo '<form role="form" method="post" action="' . base_url('view/postCommentItinerary') . '">
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

                                      <div class="col">
                                        <input type="hidden" name="itinerary_id_link" value="' . $itineraryDetails[0]->itinerary_id . '">
                                          <input class="btn btn-lg btn-success" type="submit" value="go" name="go" >
                                      </div>

                                  </fieldset>
                                </form>
                          ';
                          echo '</div>'; }
                        }
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