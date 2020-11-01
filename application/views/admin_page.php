<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<?php 
if ($this->session->userdata('user_name') != 'admin') {
  //echo 'invalid';
  redirect('');
}

$modalAdd = FALSE;
?>

<!--
    TO DO:

    - retrieve time open/clo itinerary view *
    - improve pdf *


    TYPES OF SUGGESTIONS
    - extra alloted time, include more *within
    - itineraries within user tags but no alloted time


    TO DO 8/9/18
     - documentation

    - add edit modal for itinerary /
    - fix navbar and links /
    - fix est tour time in pdf
    - review system for itineraries /
    - limit review to one per account /

-->


<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Manila Tourist Information System - Admin Dashboard</title>

    <!-- Bootstrap core CSS -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    
    
    <link href="<?php echo base_url(); ?>assets/vendor/bootstrap/css/bootstrap.css" rel="stylesheet">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css" />
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.13/css/dataTables.bootstrap.min.css" />
  <script type="text/javascript" src="https://cdn.datatables.net/1.10.13/js/dataTables.bootstrap.min.js"></script>

  <!-- Custom styles for this template -->
  <link href="<?php echo base_url(); ?>assets/css/freelancer.css" rel="stylesheet">

  <!-- datatables -->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"/>
  <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script> 

  <!-- <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css"> -->
  

    <!-- Custom fonts for this template -->
    <link href="<?php echo base_url(); ?>assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- Plugin CSS -->
    <link href="<?php echo base_url(); ?>assets/vendor/magnific-popup/magnific-popup.css" rel="stylesheet" type="text/css">



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
      <?php


        if ($modal_success_add) {
          echo '<div class="alert alert-light" role="alert"><div class="alert alert-info" role="alert"><h4>
          Success! The place ' . $success_modal_itinerary_name . ' has been added. Click <a href="' . base_url() . 'view/place/' . $success_modal_itinerary_link . '">here</a> to view.</h4>
        </div></div>';
        }
        if ($modal_success_edit) {
          echo '<div class="alert alert-light" role="alert"><div class="alert alert-info" role="alert"><h4>
          Success! The place ' . $success_modal_itinerary_name . ' has been modified. Click <a href="' . base_url() . 'view/place/' . $success_modal_itinerary_link . '">here</a> to view.</h4>
        </div></div>';
        }
        if ($modal_success_delete) {
          echo '<div class="alert alert-light" role="alert"><div class="alert alert-dark" role="alert"><h4>
          Success! The place ' . $success_modal_itinerary_name . ' has been deleted.</h4>
        </div></div>';
        }
        if ($modal_success_edit_2) {
          echo '<div class="alert alert-light" role="alert"><div class="alert alert-dark" role="alert"><h4>
          Success! The itinerary ' . $success_modal_itinerary_name . ' has been edited.</h4>
        </div></div>';
        }
        if ($modal_success_delete_2) {
          echo '<div class="alert alert-light" role="alert"><div class="alert alert-dark" role="alert"><h4>
          Success! The itinerary has been deleted.</h4>
        </div></div>';
        }
        
      ?>

      <div class="container left-align">
        <!--
        <img class="img-fluid mb-5 d-block mx-auto" src="<?php echo base_url(); ?>assets/img/profile.png" alt="">
        
        <h1 style="text-align: left" class="text-uppercase mb-0">Welcome to CM Trip Planner</h1>
        <br />
        <h2 style="text-align: left" class="font-weight-light mb-0">This website helps local tourists and travel agencies in creating a trip planner that focuses on user's preferences.</h2>
        -->
        <h1 >Manage Places</h1>
        <button type="button" class="btn btn-lg btn-light"><?php echo '<a style="text-decoration: none; color: black;" href="' . base_url('user/add_itinerary_page') . '">Add Place</a>'; ?></button>
        <br><br>
      </div>

      <div class="container">
        <div class="row">
            <div class="col-md-12">
                <table id = "itineraries-table" class="table table-dark">
                    <thead>
                        <tr>
                            <th style="display:none;">#</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Tags</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php for ($i = 0; $i < count($itinerariesList); ++$i) { ?>
                        <tr valign="middle" style="color: black;">
                            <td style="display:none;"><?php echo ($page+$i+1); ?></td>
                            <td valign="middle"><?php echo '<a style="text-decoration: none; color: black;" href="' . base_url() . 'view/place/' . str_replace(' ', '_', $itinerariesList[$i]->name) . '/">' . $itinerariesList[$i]->name . '</a>'; ?></td>
                            
                            <td><?php echo $itinerariesList[$i]->mini_desc; ?></td>
                            <td><?php echo str_replace('|', ', ', $itinerariesList[$i]->tags); ?></td>
                            <td style="column-width: 200px;">
                              <button type="button" class="btn btn-sm"><?php echo '<a style="text-decoration: none; color: black;" href="' . base_url() . 'view/place/' . str_replace(' ', '_', $itinerariesList[$i]->name) . '/">View</a>'; ?></button>
                              <button type="button" class="btn btn-sm"><?php echo '<a style="text-decoration: none; color: black;" href="' . base_url() . 'user/edit_itinerary_page/' . $itinerariesList[$i]->itinerary_id . '/">Edit</a>'; ?></button>
                              <button type="button" class="btn btn-sm" data-toggle="modal" data-target="#exampleModal<?php echo $i; ?>">Delete</button>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>

      </div>

      <h1 >Manage Itineraries</h1>

      <div class="container">
        <div class="row">
            <div class="col-md-12">
                <table id = "itineraries-table-2" class="table table-dark">
                    <thead>
                        <tr>
                            <th style="display:none;">#</th>
                            <th width="30%">Name</th>
                            <th>Author</th>
                            <th width="30%">Tags</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php for ($i = 0; $i < count($itinerariesList2); ++$i) { ?>
                        <tr valign="middle" style="color: black;">
                            <td style="display:none;"><?php echo ($page+$i+1); ?></td>
                            <td valign="middle"><?php echo '<a style="text-decoration: none; color: black;" href="' . base_url() . 'view/itinerary/' . str_replace(' ', '_', $itinerariesList2[$i]->name) . '/' . $itinerariesList2[$i]->itinerary_id . '">' . $itinerariesList2[$i]->name . '</a>'; ?></td>
                            
                            <td><?php echo $itinerariesList2[$i]->author; ?></td>
                            <td><?php echo str_replace('|', ', ', $itinerariesList2[$i]->user_tags); ?></td>
                            <td style="column-width: 200px;">
                              <button type="button" class="btn btn-sm"><?php echo '<a style="text-decoration: none; color: black;" href="' . base_url() . 'view/itinerary/' . str_replace(' ', '_', $itinerariesList2[$i]->name) . '/' . $itinerariesList2[$i]->itinerary_id . '">View</a>'; ?></button>
                              <!--<button type="button" class="btn btn-sm"><?php echo '<a style="text-decoration: none; color: black;" href="' . base_url() . 'user/edit_itinerary_page/' . $itinerariesList2[$i]->itinerary_id . '/">Edit</a>'; ?></button>-->
                              <button type="button" class="btn btn-sm" data-toggle="modal" data-target="#editModal<?php echo $i ?>">Edit</button>
                              <button type="button" class="btn btn-sm" data-toggle="modal" data-target="#deleteModal2<?php echo $i ?>">Delete</button>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>

      </div>



    </header>

    <!-- DELETE PLACE MODAL -->

    <?php for ($i = 0; $i < count($itinerariesList); $i++) {
    echo '<div class="modal fade" id="exampleModal' . $i . '" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Delete ' . $itinerariesList[$i]->name . '</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            Are you sure you want to delete this place?
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <!--<button type="button" class="btn btn-primary">Save changes</button>-->
            <form role="form" method="post" action="' . base_url() . 'user/delete_itinerary/' . $itinerariesList[$i]->itinerary_id . '">
              <input class="btn btn-danger btn-block" type="submit" value="Delete Place" name="go" >
            </form>
          </div>
        </div>
      </div>
    </div>';
    } ?>

    <!-- DELETE ITINERARY MODAL -->

    <?php for ($i = 0; $i < count($itinerariesList2); $i++) {
    echo '<div class="modal fade" id="deleteModal2' . $i . '" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Delete ' . $itinerariesList2[$i]->name . '</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            Are you sure you want to delete this itinerary?
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <!--<button type="button" class="btn btn-primary">Save changes</button>-->
            <form role="form" method="post" action="' . base_url() . 'user/delete_itinerary2/' . $itinerariesList2[$i]->itinerary_id . '">
              <input class="btn btn-danger btn-block" type="submit" value="Delete Itinerary" name="go" >
            </form>
          </div>
        </div>
      </div>
    </div>';
    } ?>

    <!-- EDIT ITINERARY MODAL -->

    <?php for ($i = 0; $i < count($itinerariesList2); $i++) {
    echo '<div class="modal fade" id="editModal' . $i . '" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit ' . $itinerariesList2[$i]->name . '</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form role="form" method="post" action="' . base_url() . 'user/edit_itinerary2/' . $itinerariesList2[$i]->itinerary_id . '">
            <label>Name</label>
                <input class="form-control" placeholder="' .  $itinerariesList2[$i]->name . '" name="itineraryNewName" type="text" autofocus value="' . $itinerariesList2[$i]->name . '">
                <input type="hidden" name="itineraryId" value="' . $itinerariesList2[$i]->itinerary_id . '">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <!--<button type="button" class="btn btn-primary">Save changes</button>-->
            
              <input class="btn btn-warning btn-block" type="submit" value="Edit Itinerary" name="go" >
            </form>
          </div>
        </div>
      </div>
    </div>';
    } ?>

    <!-- ADD ITINERARY MODAL -->
    
    <div class="modal fade" id="addSuccessModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="addModalLabel">Add Itinerary</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            The itinerary <?php echo $success_modal_itinerary_name ?> has been added. Click <a href="<?php echo base_url() . 'view/itinerary/' . $success_modal_itinerary_link ?>">here</a> to view the itinerary.
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <!--<button type="button" class="btn btn-primary">Save changes</button>-->
            
          </div>
        </div>
      </div>
    </div>

    <div class="modal hide fade" id="myModal">
      <div class="modal-header">
        <a class="close" data-dismiss="modal">×</a>
        <h3>Modal header</h3>
      </div>
      <div class="modal-body">
        <p>One fine body…</p>
      </div>
      <div class="modal-footer">
        <a href="#" class="btn">Close</a>
        <a href="#" class="btn btn-primary">Save changes</a>
      </div>
    </div>



    <!-- Portfolio Modal 1 -->
    <div class="portfolio-modal mfp-hide" id="portfolio-modal-1">
      <div class="portfolio-modal-dialog bg-white">
        <a class="close-button d-none d-md-block portfolio-modal-dismiss" href="#">
          <i class="fa fa-3x fa-times"></i>
        </a>
        <div class="text-center">
          <!--
          <div class="row">
            <div class="col-lg-8 mx-auto">
              <h2 class="text-secondary text-uppercase mb-0">Project Name</h2>
              <hr class="star-dark mb-5">
              <img class="img-fluid mb-5" src="img/portfolio/cabin.png" alt="">
              <p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia neque assumenda ipsam nihil, molestias magnam, recusandae quos quis inventore quisquam velit asperiores, vitae? Reprehenderit soluta, eos quod consequuntur itaque. Nam.</p>
              <a class="btn btn-primary btn-lg rounded-pill portfolio-modal-dismiss" href="#">
                <i class="fa fa-close"></i>
                Close Project</a>
            </div>
          </div>
          -->
        </div>
      </div>
    </div>



    <div class="copyright py-4 text-center text-white">
      <div class="container">
        <small>Copyright &copy; Manila Tourist Information System 2018</small>
      </div>
    </div>


    <!-- Contact Form JavaScript -->
    <script src="<?php echo base_url(); ?>assets/js/jqBootstrapValidation.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/contact_me.js"></script>





    <!-- datatables -->
    <script type="text/javascript">
      $(document).ready(function() {
          $('#itineraries-table').DataTable();
      });
      </script>
    <script type="text/javascript">
      $(document).ready(function() {
          $('#itineraries-table-2').DataTable();
      });
      </script>


  </body>

</html>

