<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if ($this->session->userdata('user_name') != 'admin') {
  //echo 'invalid';
  redirect('');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Central Manila Trip Planner - Admin Dashboard</title>

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
<body>
<body id="page-top">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg bg-secondary fixed-top text-uppercase" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="<?php echo base_url(); ?>">CM Trip Planner</a>
        <button class="navbar-toggler navbar-toggler-right text-uppercase bg-primary text-white rounded" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">

            <li class="nav-item mx-0 mx-lg-1">
              <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="<?php echo base_url('#itineraries'); ?>">Itineraries</a>
            </li>

            <li class="nav-item mx-0 mx-lg-1">
              <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="<?php echo base_url('createplan'); ?>">Create Trip Plan</a>
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
              echo '<a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="user/login_view">Login</a>';
            }
            else {
              
              echo '<a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="' . base_url() . 'user/user_logout">' . $user_id . ' | Logout</a>';
            }
            ?>
            </li>
          </ul>
        </div>
      </div>
    </nav>



    <header class="masthead bg-primary text-white text-center">
      <?php
        
        if ($modal_success_add) {
          echo '<div class="alert alert-success" role="alert">
          Success! The itinerary ' . $success_modal_itinerary_name . ' has been added. Click <a href="' . base_url() . 'view/itinerary/' . $success_modal_itinerary_link . '">here</a> to view.
        </div>';
        }
        if ($modal_success_edit) {
          echo '<div class="alert alert-info" role="alert">
          Success! The itinerary ' . $success_modal_itinerary_name . ' has been modified. Click <a href="' . base_url() . 'view/itinerary/' . $success_modal_itinerary_link . '">here</a> to view.
        </div>';
        }
        if ($modal_success_delete) {
          echo '<div class="alert alert-dark" role="alert">
          Success! The itinerary ' . $success_modal_itinerary_name . ' has been deleted.
        </div>';
        }
        
      ?>

      <div class="container left-align">
        <h1>Book List</h1>
        <table id="book-table" class="table table-dark table-bordered">
          <thead>
          <tr><td>Book Title</td><td>Book Price</td><td>Book Author</td><td>Rating</td><td>Publisher</td></tr>
          </thead>
          <tbody>
          <tr class="bg-success"><td>Book Title</td><td>Book Price</td><td>Book Author</td><td>Rating</td><td>Publisher</td></tr>
          <tr><td>Book Title</td><td>Book Price</td><td>Book Author</td><td>Rating</td><td>Publisher</td></tr>
          <tr><td>Book Title</td><td>Book Price</td><td>Book Author</td><td>Rating</td><td>Publisher</td></tr>
          <tr><td>Book Title</td><td>Book Price</td><td>Book Author</td><td>Rating</td><td>Publisher</td></tr>
          <tr><td>Book Title</td><td>Book Price</td><td>Book Author</td><td>Rating</td><td>Publisher</td></tr>
          <tr><td>Book Title</td><td>Book Price</td><td>Book Author</td><td>Rating</td><td>Publisher</td></tr>
          <tr><td>Book Title</td><td>Book Price</td><td>Book Author</td><td>Rating</td><td>Publisher</td></tr>
          <tr><td>Book Title</td><td>Book Price</td><td>Book Author</td><td>Rating</td><td>Publisher</td></tr>
          <tr><td>Book Title</td><td>Book Price</td><td>Book Author</td><td>Rating</td><td>Publisher</td></tr>
          <tr><td>Book Title</td><td>Book Price</td><td>Book Author</td><td>Rating</td><td>Publisher</td></tr>
          <tr><td>Book hello</td><td>Book Price</td><td>Book Author</td><td>Rating</td><td>Publisher</td></tr>
          </tbody>
        </table>

      </div>
      </header>

      <!-- DELETE ITINERARY MODAL -->

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Delete <?php echo $itinerariesList[0]->name?></h5>
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
            <form role="form" method="post" action="<?php echo base_url() . 'user/delete_itinerary/' . $itinerariesList[0]->itinerary_id; ?>">
              <input class="btn btn-danger btn-block" type="submit" value="Delete Itinerary" name="go" >
            </form>
          </div>
        </div>
      </div>
    </div>

    <div class="copyright py-4 text-center text-white">
      <div class="container">
        <small>Copyright &copy; Your Website 2018</small>
      </div>
    </div>

    </body>
    <script type="text/javascript">
      $(document).ready(function() {
          $('#book-table').DataTable();
      });
    </script>

    <!-- Contact Form JavaScript -->
    <script src="<?php echo base_url(); ?>assets/js/jqBootstrapValidation.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/contact_me.js"></script>

</html>