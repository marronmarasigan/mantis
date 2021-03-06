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

    <title>Manila Tourist Information System - View Custom Itinerary</title>

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

      <h1 style="text-align: center" class="text-uppercase mb-0">your custom itinerary</h1><br><br>
      <h1></h1>

      <h5>
        Alloted Time: <?php echo $alloted_time . ' hours'; ?> &emsp; 
        

        Places of Intent: <?php echo $newTags; ?> &emsp; 
        
        Start Time: <?php
        if ($opening_time > 11) {
          if ($opening_time == 12) {
            echo $opening_time . ':00 PM';
          }
          else {
            echo ($opening_time - 12) . ':00 PM';
          }
        }
        else {
          if ($opening_time == 0) {
            echo '12:00 AM';
          }
          else {
            echo $opening_time . ':00 AM';
          }
        }
        ?> &emsp;
        
        Rating: <?php echo $user_reviews . ' star'; 
        if ($user_reviews < 5) { 
          if ($user_reviews != 1) { 
            echo  's';
          }
          echo ' and above';
        }
        else {
          echo 's';
        }
        ?>
        
      </h5><br>

        <table class="table table-bordered table-striped table-hover">
        <!--<form role="form" method="post" action="<?php echo base_url('createplan/create_pdf'); ?>">-->
        <form role="form" method="post" action="<?php echo base_url('createplan/save_plan'); ?>">
          <?php echo '<input type="hidden" name="alloted_time_sv" value="' . $alloted_time . '">'; ?>
          <?php echo '<input type="hidden" name="user_tags_sv" value="' . $newTags . '">'; ?>
          <?php echo '<input type="hidden" name="start_time_sv" value="';
        if ($opening_time > 11) {
          if ($opening_time == 12) {
            echo $opening_time . ':00 PM';
          }
          else {
            echo ($opening_time - 12) . ':00 PM';
          }
        }
        else {
          if ($opening_time == 0) {
            echo '12:00 AM';
          }
          else {
            echo $opening_time . ':00 AM';
          }
        }
        echo '">'; ?>
        <?php echo '<input type="hidden" name="rating_sv" value="';
        echo $user_reviews . ' star'; 
        if ($user_reviews < 5) { 
          if ($user_reviews != 1) { 
            echo  's';
          }
          echo ' and above';
        }
        else {
          echo 's';
        }
        echo '">'; ?>
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
          <tbody>
          <?php 
            $count = 1;
            
            $current_time = 0;
            $current_time = (int)$start_time;
            //echo $current_time;
            $current_minute = 0;

            /**
            function print_time() {
              global $current_time;
              global $current_minute;
              if ($current_time > 12) {
                echo ($current_time - 12) . ':' . $current_minute . ' PM';
              }
              else {
                if ($current_time == 0) {
                  echo '12:' . $current_minute . ' AM';
                }
                else {
                  echo $current_time . ':' . $current_minute . ' AM';
                }
              }
            }
            **/
            /**
            function add_time($addTime) {
              global $current_time;
              global $current_minute;

              echo '[' . $current_time . ']';

              if ($current_minute + $addTime >= 60)   {
                $current_time += floor(($current_minute + $addTime) / 60);
                $current_minute = ($current_minute + $addTime) % 60;
              }
              else {
                $current_minute += $addTime; 
              }

              echo '[' . $current_time . ']';
              /**
              $to_add = floor($addTime / 60);
              $remainder = $addTime % 60;
              global $current_time;
              global $current_minute;
              $current_time += $to_add;
              $current_minute += $remainder;
              if ($current_minute >= 60) {
                $toAdd = floor($current_minute / 60);
                echo '[&' . $current_time . ']';
                $current_time = ($current_time + $toAdd);
                echo '[*' . $current_time . ']';
                $current_minute = ($current_minute % 60);
              }
              
            }
            **/

            foreach ((array)$itineraryset as $itinerary) {
              
              echo '<input type="hidden" name="itineraryId[]" value="' . $itinerary->itinerary_id . '"></input>';

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
                  echo '12:' . $current_minute . ' AM';
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
                  echo '12:' . $current_minute . ' AM';
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
              if (($current_minute + (int)$itinerary->tour_time) >= 60) {
                $current_time += floor(($current_minute + (int)$itinerary->tour_time) / 60);
                $current_minute = ($current_minute + (int)$itinerary->tour_time) % 60;
              }
              else {
                $current_minute = $current_minute + (int)$itinerary->tour_time;
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
                  echo '12:' . $current_minute . ' AM';
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
                  echo '12:' . $current_minute . ' AM';
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
                $current_minute = ($current_minute + (int)$itinerary->tour_time) % 60;
              }
              else {
                $current_minute = $current_minute + 15;
              }

              echo '"></input>';
              //echo print_time() . '</td>';
              echo '<td><img style ="width:120px;height:90px;" src="' . base_url() . 'assets/wp_content/images/' . str_replace(' ', '_', $itinerary->image_url) . '.png" alt=""></td>';
              echo '<input type="hidden" name="itineraryImage[]" value="' . base_url() . 'assets/wp_content/images/' . str_replace(' ', '_', $itinerary->image_url) . '.png"></input>';
              echo '<td>' . $itinerary->name . '</td>';
              echo '<input type="hidden" name="itineraryName[]" value="' . $itinerary->name . '"></input>';
              echo '<td>' . $itinerary->mini_desc . '</td>';
              echo '<input type="hidden" name="itineraryDesc[]" value="' . $itinerary->mini_desc . '"></input>';
              echo '<td>' . $itinerary->location . '</td>';
              echo '<input type="hidden" name="itineraryLocation[]" value="' . $itinerary->location . '"></input>';
              echo '<td>';

              if ($itinerary->tour_time >= 60) {
                echo $itinerary->tour_time / 60 . ' hours</td>';
              }
              else {
                echo  $itinerary->tour_time . ' minutes</td>';
              }
              echo '<input type="hidden" name="itineraryTourTime[]" value="';
              if ($itinerary->tour_time >= 60) {
                echo $itinerary->tour_time / 60 . ' hours';
              }
              else {
                echo  $itinerary->tour_time . ' minutes';
              }
              echo '"</td></input>';
              echo '<td>';
              if ($itinerary->time_open > 12) {
                echo ($itinerary->time_open - 12) . ':00 PM';
              }
              else {
                if ($itinerary->time_open == 0) {
                  echo '12:00 AM';
                }
                else {
                  echo $itinerary->time_open . ':00 AM';
                }
              }
              //echo date ('h:i', strtotime($itinerary->time_open));
              echo '<center> - </center>';
              echo '<input type="hidden" name="itineraryTimeOpen[]" value="';
              if ($itinerary->time_open > 12) {
                echo ($itinerary->time_open - 12) . ':00 PM';
              }
              else {
                if ($itinerary->time_open == 0) {
                  echo '12:00 AM';
                }
                else {
                  echo $itinerary->time_open . ':00 AM';
                }
              }
              echo '"></input>';
              echo '';
              if ($itinerary->time_closed > 12) {
                echo ($itinerary->time_closed - 12) . ':00 PM';
              }
              else {
                if ($itinerary->time_closed == 0) {
                  echo '12:00 AM';
                }
                else {
                  echo $itinerary->time_closed . ':00 AM';
                }
              }
              //echo date ('h:i', strtotime($itinerary->time_closed)); 
              echo '</td>';
              echo '<input type="hidden" name="itineraryTimeClosed[]" value="';
              if ($itinerary->time_closed > 12) {
                echo ($itinerary->time_closed - 12) . ':00 PM';
              }
              else {
                if ($itinerary->time_closed == 0) {
                  echo '12:00 AM';
                }
                else {
                  echo $itinerary->time_closed . ':00 AM';
                }
              }
              echo '"></input>';
              
              echo '<td>' . $itinerary->tips . '</td>';
              echo '<input type="hidden" name="notes[]" value="' . $itinerary->tips . '"></input>';

              
              echo '</tr>';
              $count++;
            }
          ?>

          </tbody>
        
        </table>

        <center><input class="btn btn-light btn-success" type="submit" value="Save Itinerary" name="go" ></center>
        </form>



        <!-- HIDDEN FORM FOR PDF -->

        <form role="form" method="post" action="<?php echo base_url('createplan/create_pdf'); ?>">
          <?php echo '<input type="hidden" name="alloted_time_sv" value="' . $alloted_time . '">'; ?>
          <?php echo '<input type="hidden" name="user_tags_sv" value="' . $newTags . '">'; ?>
          <?php echo '<input type="hidden" name="start_time_sv" value="';
          if ($opening_time > 11) {
          if ($opening_time == 12) {
            echo $opening_time . ':00 PM';
          }
          else {
            echo ($opening_time - 12) . ':00 PM';
          }
        }
        else {
          if ($opening_time == 0) {
            echo '12:00 AM';
          }
          else {
            echo $opening_time . ':00 AM';
          }
        }
        echo '">'; ?>
        <?php echo '<input type="hidden" name="rating_sv" value="';
        echo $user_reviews . ' star'; 
        if ($user_reviews < 5) { 
          if ($user_reviews != 1) { 
            echo  's';
          }
          echo ' and above';
        }
        else {
          echo 's';
        }
        echo '">'; ?>
          
          <?php 
            $count = 1;
            
            $current_time = 0;
            $current_time = (int)$start_time;
            //echo $current_time;
            $current_minute = 0;

            foreach ((array)$itineraryset as $itinerary) {
              

              
              echo '<input type="hidden" name="timeframestart[]" value="';
              if ($current_time > 12) {
                echo ($current_time - 12) . ':'; if ($current_minute < 10) {echo '0';} echo $current_minute; echo ' PM';
              }
              else {
                if ($current_time == 0) {
                  echo '12:' . $current_minute . ' AM';
                }
                else {
                  echo $current_time . ':'; if ($current_minute < 10) {echo '0';} echo $current_minute; echo ' AM';
                }
              }
              echo '"></input>';
              //echo add_time($itinerary->tour_time);
              if (($current_minute + (int)$itinerary->tour_time) >= 60) {
                $current_time += floor(($current_minute + (int)$itinerary->tour_time) / 60);
                $current_minute = ($current_minute + (int)$itinerary->tour_time) % 60;
              }
              else {
                $current_minute = $current_minute + (int)$itinerary->tour_time;
              }

              

             
              echo '<input type="hidden" name="timeframeend[]" value="';
              if ($current_time > 12) {
                echo ($current_time - 12) . ':'; if ($current_minute < 10) {echo '0';} echo $current_minute; echo ' PM';
              }
              else {
                if ($current_time == 0) {
                  echo '12:' . $current_minute . ' AM';
                }
                else {
                  echo $current_time . ':'; if ($current_minute < 10) {echo '0';} echo $current_minute; echo ' AM';
                }
              }

              if (($current_minute + 15) >= 60) {
                $current_time += floor(($current_minute + 15) / 60);
                $current_minute = ($current_minute + (int)$itinerary->tour_time) % 60;
              }
              else {
                $current_minute = $current_minute + 15;
              }

              echo '"></input>';
              //echo print_time() . '</td>';
              //echo '<td><img style ="width:120px;height:90px;" src="' . base_url() . 'assets/wp_content/images/' . str_replace(' ', '_', $itinerary->image_url) . '.png" alt=""></td>';
              echo '<input type="hidden" name="itineraryImage[]" value="' . base_url() . 'assets/wp_content/images/' . str_replace(' ', '_', $itinerary->image_url) . '.png"></input>';
              //echo '<td>' . $itinerary->name . '</td>';
              echo '<input type="hidden" name="itineraryName[]" value="' . $itinerary->name . '"></input>';
              //echo '<td>' . $itinerary->mini_desc . '</td>';
              echo '<input type="hidden" name="itineraryDesc[]" value="' . $itinerary->mini_desc . '"></input>';
              //echo '<td>' . $itinerary->location . '</td>';
              echo '<input type="hidden" name="itineraryLocation[]" value="' . $itinerary->location . '"></input>';
              //echo '<td>';

              
              echo '<input type="hidden" name="itineraryTourTime[]" value="';
              if ($itinerary->tour_time >= 60) {
                echo $itinerary->tour_time / 60 . ' hours';
              }
              else {
                echo  $itinerary->tour_time . ' minutes';
              }
              echo '"</input>';
              

              echo '<input type="hidden" name="itineraryTimeOpen[]" value="';
              if ($itinerary->time_open > 12) {
                echo ($itinerary->time_open - 12) . ':00 PM';
              }
              else {
                if ($itinerary->time_open == 0) {
                  echo '12:00 AM';
                }
                else {
                  echo $itinerary->time_open . ':00 AM';
                }
              }
              echo '"></input>';
              
              echo '<input type="hidden" name="itineraryTimeClosed[]" value="';
              if ($itinerary->time_closed > 12) {
                echo ($itinerary->time_closed - 12) . ':00 PM';
              }
              else {
                if ($itinerary->time_closed == 0) {
                  echo '12:00 AM';
                }
                else {
                  echo $itinerary->time_closed . ':00 AM';
                }
              }
              echo '"></input>';
              
              //echo '<td>' . $itinerary->tips . '</td>';
              echo '<input type="hidden" name="notes[]" value="' . $itinerary->tips . '"></input>';

              
              //echo '</tr>';
              $count++;
            }
          ?>
          <br>
        <center><input class="btn btn-light btn-success" type="submit" value="Export as PDF" name="go" ></center>
        </form>

        <br><br>

        <?php if (count((array)$suggesteditineraryset) != 0) {
          echo '<h3>Suggested Additional Places</h3>
          <!--
          <h6>Modify your preferences to include these suggested places</h6>
          -->

          <br>
          <h6>Increase your alloted time to include these places:</h6>

          <table class="table table-bordered table-striped table-hover">
            <thead>
              <tr class="bg-success">
                <th scope="col">#</th>
                <th scope="col">Image</th>
                <th scope="col">Name</th>
                <th scope="col">Description</th>
                <th scope="col">Location</th>
                <th scope="col">Addt\'l. Tour Time</th>
              </tr>
            </thead>
            <tbody>';

              $count = 1;
              foreach ((array)$suggesteditineraryset as $itinerary) {
                echo '<tr class="table-light">';
                echo '<th scope="row">' . $count . '</th>';
                echo '<td><img style ="width:120px;height:90px;" src="' . base_url() . 'assets/wp_content/images/' . str_replace(' ', '_', $itinerary->name) . '.png" alt=""></td>';
                
                echo '<td>' . $itinerary->name . '</td>';
                
                echo '<td>' . $itinerary->mini_desc . '</td>';
                
                echo '<td>' . $itinerary->location . '</td>';
                
                echo '<td>';

                if ($itinerary->tour_time >= 60) {
                  echo $itinerary->tour_time / 60 . ' hours</td>';
                }
                else {
                  echo  $itinerary->tour_time . ' minutes</td>';
                }
                
                

                
                echo '</tr>';
                $count++;
              }

        }
        echo '</tbody>
        
        </table>';
         ?>
        
        
        

          

        <center><button type="button" class="btn btn-lg btn-light"><?php echo '<a style="text-decoration: none; color: black;" href="' . base_url('createplan') . '">Go Back</a>'; ?></button></center>

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

        

        <!--<button type="button" class="btn btn-light"><?php echo '<a style="text-decoration: none; color: black;" href="' . base_url('createplan/create_pdf') . '">Create PDF</a>'; ?></button> -->

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


    <!--
    <section class="bg-secondary text-white mb-0" id="reviews">
      <div class="container">
        <h2 class="text-center text-uppercase text-white">Reviews</h2>
        
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