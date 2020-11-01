<?php


/**
  TO DO: 8/8/18
  - edit days open field, change to dropdown /
  - file input validation page missing /
  - edit db to show proper daysopen /
  - add timeframe in itinerary /
  - add additional buttons for save, export, go back /
  - add separate pages for itineraries and places /
  - edit links in nav bar ?
  - dont show suggest itineraries if no suggestions /
  - dont show post a comment if not logged in ?
  - transfer itineraries table to places table, fix model and views affected /
  - create new table itineraries /

  - fix edit itinerary modal !


**/

class User extends CI_Controller {

public function __construct(){

    parent::__construct();
		//$this->load->helper('url');
    $this->load->database();
 		$this->load->model('user_model');
    $this->load->library('session');
    $this->load->library('pagination');
    $this->load->helper(array('form', 'url'));

}

public function index()
{
$this->load->view("register.php");
}

public function register_user(){

      $user=array(
      'user_name'=>$this->input->post('user_name'),
      'user_email'=>$this->input->post('user_email'),
      'user_password'=>md5($this->input->post('user_password'))
        );
        print_r($user);

$email_check=$this->user_model->email_check($user['user_email']);

if($email_check){
  $this->user_model->register_user($user);
  $this->session->set_flashdata('success_msg', 'Registered successfully.Now login to your account.');
  redirect('user/login_view');

}
else{

  $this->session->set_flashdata('error_msg', 'Email address already in use. Please use another.');
  redirect('user');


}

}

public function login_view(){

$this->load->view("login.php");

}

public function admin_dashboard() {
  //pagination settings
  $config['base_url'] = base_url().'user/admin_dashboard/';
  $config['total_rows'] = $this->db->count_all('itineraries');
  $config['per_page'] = "5";
  $config["uri_segment"] = 3;
  $choice = $config["total_rows"] / $config["per_page"];
  $config["num_links"] = floor($choice);

  //config for bootstrap pagination class integration
  $config['full_tag_open'] = '<ul class="pagination">';
  $config['full_tag_close'] = '</ul>';
  $config['first_link'] = false;
  $config['last_link'] = false;
  $config['first_tag_open'] = '<li>';
  $config['first_tag_close'] = '</li>';
  $config['prev_link'] = '&laquo';
  $config['prev_tag_open'] = '<li class="prev">';
  $config['prev_tag_close'] = '</li>';
  $config['next_link'] = '&raquo';
  $config['next_tag_open'] = '<li>';
  $config['next_tag_close'] = '</li>';
  $config['last_tag_open'] = '<li>';
  $config['last_tag_close'] = '</li>';
  $config['cur_tag_open'] = '<li class="active"><a href="#">';
  $config['cur_tag_close'] = '</a></li>';
  $config['num_tag_open'] = '<li>';
  $config['num_tag_close'] = '</li>';

  $this->pagination->initialize($config);
  $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

  //call the model function to get the department data
  $data['itinerariesList'] = $this->user_model->getAllItineraries($config["per_page"], $data['page']);
  $data['itinerariesList2'] = $this->user_model->getAllItineraries2();
  //$data['deptlist'] = $this->department_model->get_department_list($config["per_page"], $data['page']);           

  $data['pagination'] = $this->pagination->create_links();

  //load the department_view
  //$this->load->view('department_view',$data);

  //$this->load->view('manage_itineraries.php', $data);

  $data['modal_success_add'] = FALSE;
  $data['modal_success_edit'] = FALSE;
  $data['modal_success_delete'] = FALSE;
  $data['modal_success_edit_2'] = FALSE;
  $data['modal_success_delete_2'] = FALSE;

  $data['success_modal_itinerary_name'] = '';
      $data['success_modal_itinerary_link'] = '';

  $this->load->view('admin_page.php', $data);
}



function login_user(){
  $user_login=array(

  'user_email'=>$this->input->post('user_email'),
  'user_password'=>md5($this->input->post('user_password'))

    );

    $data=$this->user_model->login_user($user_login['user_email'],$user_login['user_password']);
      if($data)
      {
        $this->session->set_userdata('user_id',$data['user_id']);
        $this->session->set_userdata('user_email',$data['user_email']);
        $this->session->set_userdata('user_name',$data['user_name']);

        $this->session->set_flashdata('error_msg', 'Error occured,Try again. XD');

        if ($data['user_name'] == "admin" && $data['user_id'] == 7) {
          redirect('user/admin_dashboard', 'refresh');
        }
        else {
          redirect('', 'refresh');
        }

        

        /*
        
        if ($this->session->userdata('user_name') == 'qwerty') {
          //redirect('', 'refresh');
          $this->load->view('admin_page.php', $data);
        }
        else {
          $this->load->view('User_profile.php');
        }

        */

        

      }

      else{
        $this->session->set_flashdata('error_msg', 'Error occured,Try again.');
        $this->load->view("login.php");

      }


}

function user_profile(){

$this->load->view('user_profile.php');

}
public function user_logout(){

  $this->session->sess_destroy();
  redirect('', 'refresh');
}

public function add_itinerary_page() {
  $data['modal_success_add'] = TRUE;
  $this->load->view('add_itinerary.php', $data);
}

public function manage_itinerary_page() {
  //pagination settings
  $config['base_url'] = base_url().'user/manage_itinerary_page/';
  $config['total_rows'] = $this->db->count_all('reviews');
  $config['per_page'] = "1";
  $config["uri_segment"] = 3;
  $choice = $config["total_rows"] / $config["per_page"];
  $config["num_links"] = floor($choice);

  //config for bootstrap pagination class integration
  $config['full_tag_open'] = '<ul class="pagination">';
  $config['full_tag_close'] = '</ul>';
  $config['first_link'] = false;
  $config['last_link'] = false;
  $config['first_tag_open'] = '<li>';
  $config['first_tag_close'] = '</li>';
  $config['prev_link'] = '&laquo';
  $config['prev_tag_open'] = '<li class="prev">';
  $config['prev_tag_close'] = '</li>';
  $config['next_link'] = '&raquo';
  $config['next_tag_open'] = '<li>';
  $config['next_tag_close'] = '</li>';
  $config['last_tag_open'] = '<li>';
  $config['last_tag_close'] = '</li>';
  $config['cur_tag_open'] = '<li class="active"><a href="#">';
  $config['cur_tag_close'] = '</a></li>';
  $config['num_tag_open'] = '<li>';
  $config['num_tag_close'] = '</li>';

  $this->pagination->initialize($config);
  $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

  //call the model function to get the department data
  $data['reviewslist'] = $this->user_model->getAllItineraries($config["per_page"], $data['page']);
  //$data['deptlist'] = $this->department_model->get_department_list($config["per_page"], $data['page']);   
  $data['itinerariesList2'] = $this->user_model->getAllItineraries2();        

  $data['pagination'] = $this->pagination->create_links();

  //load the department_view
  //$this->load->view('department_view',$data);

  $this->load->view('manage_itineraries.php', $data);
}

public function edit_itinerary_page() {
  $id = $this->uri->segment(3);
  
  $data['itineraryDetails'] = $this->user_model->getItineraryDetailsById($id);

  //echo var_dump($data['itineraryDetails']);
  $this->load->view('edit_itinerary.php', $data);
}

public function edit_itinerary(){
  

  $origImageLink = $this->input->post('originalImageLink');

  $days_open = "";

  $daylistArray = $this->input->post('daylist');

  //NOTE: CHECKER IF UNCHECKED ALL

  //foreach ($daylistArray as $day) {
  //  $days_open = $days_open . $day;
  //}

  $tags = str_replace(',', '|', $this->input->post('tags'));


  //set preferences
  $config['overwrite'] = TRUE;
  $config['upload_path'] = 'assets/wp_content/images';
  $config['allowed_types'] = 'png';
  $config['max_size']    = '4000';
  $config['file_name'] = $this->input->post('originalImageLink');

  //load upload class library
  $this->load->library('upload', $config);

  if (!$this->upload->do_upload('filename'))
  {
      
      
  }
  else
  {

  }


  $itinerary=array(
  'name'=>$this->input->post('name'),
  'tags'=>$tags,
  'mini_desc'=>$this->input->post('mini_desc'),
  'thumb'=>"",
  'image_url'=>$origImageLink,
  'description'=>$this->input->post('description'),
  'location'=>$this->input->post('location'),
  'days_open'=>$days_open,
  'daysopen_from'=>$this->input->post('day_open_from'),
  'daysopen_to'=>$this->input->post('day_open_to'),
  'tour_time'=>$this->input->post('tour_time'),
  'time_open'=>$this->input->post('time_open'),
  'time_closed'=>$this->input->post('time_closed'),
  'tips'=>$this->input->post('tips')
    );

  $itineraryId = $this->input->post('itinerary_id');

  $this->user_model->edit_itinerary($itinerary, $itineraryId);

  $data['success_modal_itinerary_name'] = $this->input->post('name');
  $data['success_modal_itinerary_link'] = str_replace(' ', '_', $this->input->post('name'));
  $data['modal_success_add'] = FALSE;
  $data['modal_success_edit'] = TRUE;
  $data['modal_success_delete'] = FALSE;
  $data['modal_success_edit_2'] = FALSE;
      $data['modal_success_delete_2'] = FALSE;
  //$this->load->view('upload_file_view', $data);
  
  //$this->admin_dashboard();
  //$this->load->view('admin_page', $data);
  //redirect('/user/admin_dashboard');
  //echo $tags;
  //echo 'upload success';

  //pagination settings
  $config['base_url'] = base_url().'user/admin_dashboard/';
  $config['total_rows'] = $this->db->count_all('itineraries');
  $config['per_page'] = "5";
  $config["uri_segment"] = 3;
  $choice = $config["total_rows"] / $config["per_page"];
  $config["num_links"] = floor($choice);

  //config for bootstrap pagination class integration
  $config['full_tag_open'] = '<ul class="pagination">';
  $config['full_tag_close'] = '</ul>';
  $config['first_link'] = false;
  $config['last_link'] = false;
  $config['first_tag_open'] = '<li>';
  $config['first_tag_close'] = '</li>';
  $config['prev_link'] = '&laquo';
  $config['prev_tag_open'] = '<li class="prev">';
  $config['prev_tag_close'] = '</li>';
  $config['next_link'] = '&raquo';
  $config['next_tag_open'] = '<li>';
  $config['next_tag_close'] = '</li>';
  $config['last_tag_open'] = '<li>';
  $config['last_tag_close'] = '</li>';
  $config['cur_tag_open'] = '<li class="active"><a href="#">';
  $config['cur_tag_close'] = '</a></li>';
  $config['num_tag_open'] = '<li>';
  $config['num_tag_close'] = '</li>';

  $this->pagination->initialize($config);
  $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

  //call the model function to get the department data
  $data['itinerariesList'] = $this->user_model->getAllItineraries($config["per_page"], $data['page']);
  //$data['deptlist'] = $this->department_model->get_department_list($config["per_page"], $data['page']);   
  $data['itinerariesList2'] = $this->user_model->getAllItineraries2();        

  $data['pagination'] = $this->pagination->create_links();

  //load the department_view
  //$this->load->view('department_view',$data);

  //$this->load->view('manage_itineraries.php', $data);
  $this->load->view('admin_page.php', $data);
}

public function delete_itinerary() {
  //$this->load->view('add_itinerary.php');
  $id = $this->uri->segment(3);
  $this->user_model->deleteItineraryById($id);
  //pagination settings
  $config['base_url'] = base_url().'user/admin_dashboard/';
  $config['total_rows'] = $this->db->count_all('itineraries');
  $config['per_page'] = "5";
  $config["uri_segment"] = 3;
  $choice = $config["total_rows"] / $config["per_page"];
  $config["num_links"] = floor($choice);

  //config for bootstrap pagination class integration
  $config['full_tag_open'] = '<ul class="pagination">';
  $config['full_tag_close'] = '</ul>';
  $config['first_link'] = false;
  $config['last_link'] = false;
  $config['first_tag_open'] = '<li>';
  $config['first_tag_close'] = '</li>';
  $config['prev_link'] = '&laquo';
  $config['prev_tag_open'] = '<li class="prev">';
  $config['prev_tag_close'] = '</li>';
  $config['next_link'] = '&raquo';
  $config['next_tag_open'] = '<li>';
  $config['next_tag_close'] = '</li>';
  $config['last_tag_open'] = '<li>';
  $config['last_tag_close'] = '</li>';
  $config['cur_tag_open'] = '<li class="active"><a href="#">';
  $config['cur_tag_close'] = '</a></li>';
  $config['num_tag_open'] = '<li>';
  $config['num_tag_close'] = '</li>';

  $this->pagination->initialize($config);
  $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

  //call the model function to get the department data
  $data['itinerariesList'] = $this->user_model->getAllItineraries($config["per_page"], $data['page']);
  //$data['deptlist'] = $this->department_model->get_department_list($config["per_page"], $data['page']);           
  $data['itinerariesList2'] = $this->user_model->getAllItineraries2();

  $data['pagination'] = $this->pagination->create_links();

  //load the department_view
  //$this->load->view('department_view',$data);

  //$this->load->view('manage_itineraries.php', $data);

  $data['modal_success_add'] = FALSE;
  $data['modal_success_edit'] = FALSE;
  $data['modal_success_delete'] = TRUE;
  $data['modal_success_edit_2'] = FALSE;
      $data['modal_success_delete_2'] = FALSE;
  $data['success_modal_itinerary_name'] = '';
      $data['success_modal_itinerary_link'] = '';

  $this->load->view('admin_page.php', $data);
}

public function edit_itinerary2() {
  $id = $this->uri->segment(3);
  //$this->user_model->deleteItineraryById2($id);
  $itinerary_id = $this->input->post('itineraryId');
  $itinerary_name = $this->input->post('itineraryNewName');
  $this->user_model->editItineraryById2($itinerary_id, $itinerary_name);
  

  $data['modal_success_add'] = FALSE;
  $data['modal_success_edit'] = FALSE;
  $data['modal_success_delete'] = FALSE;
  $data['modal_success_edit_2'] = TRUE;
  $data['modal_success_delete_2'] = FALSE;

  $data['itinerariesList'] = $this->user_model->getAllItineraries(0, 0);
  $data['itinerariesList2'] = $this->user_model->getAllItineraries2();

  $data['success_modal_itinerary_name'] = $itinerary_name;

  $this->load->view('admin_page.php', $data);
  //redirect('user/admin_dashboard');
}

public function delete_itinerary2() {
  $id = $this->uri->segment(3);
  $this->user_model->deleteItineraryById2($id);

  $data['modal_success_add'] = FALSE;
  $data['modal_success_edit'] = FALSE;
  $data['modal_success_delete'] = FALSE;
  $data['modal_success_edit_2'] = FALSE;
      $data['modal_success_delete_2'] = TRUE;

      $data['itinerariesList'] = $this->user_model->getAllItineraries(0, 0);
  $data['itinerariesList2'] = $this->user_model->getAllItineraries2();

  //$data['success_modal_itinerary_name'] = $itinerary_name;
  
  $this->load->view('admin_page.php', $data);
  //redirect('user/admin_dashboard');
}

public function delete_review() {
  //$this->load->view('add_itinerary.php');
  $id = $this->uri->segment(3);
  $place_name = $this->uri->segment(4);
  $this->user_model->deleteReviewById($id);
  //echo 'delete success';
  $newUri = 'view/place/' . $place_name;

  redirect($newUri, 'refresh');
}

public function delete_review2() {
  //$this->load->view('add_itinerary.php');
  $review_id = $this->uri->segment(3);
  $itinerary_id = $this->uri->segment(4);

  $this->user_model->deleteReviewById($review_id);
  //echo 'delete success';

  //var_dump($this->user_model->getPlaceNameById($itinerary_id));

  $newUri = 'view/itinerary/' . str_replace(' ', '_', $this->user_model->getPlaceNameById2($itinerary_id)->name) . '/' . $itinerary_id;
  //echo $newUri;
  redirect($newUri, 'refresh');
}

public function add_itinerary() {
  //set preferences
  $config['upload_path'] = 'assets/wp_content/images';
  $config['allowed_types'] = 'png';
  $config['max_size']    = '4000';
  $config['file_name'] = str_replace('_', ' ', $this->input->post('name'));

  //load upload class library
  $this->load->library('upload', $config);

  if (!$this->upload->do_upload('filename'))
  {
      // case - failure
      //$upload_error = array('error' => $this->upload->display_errors());
      //$this->load->view('upload_file_error', $upload_error);
      //foreach ($upload_error as $error) {
      //  echo $error;
      //}
      $data['modal_success_add'] = FALSE;
      $this->load->view('add_itinerary', $data);
      
  }
  else
  {
      // case - success
      $upload_data = $this->upload->data();

      $days_open = "";

      $daylistArray = $this->input->post('daylist');
      //foreach ($daylistArray as $day) {
      //  $days_open = $days_open . $day;
      //}

      $tags = str_replace(',', '|', $this->input->post('tags'));
      //$tour_time = $this->input->post('tour_time') * 60;
      $tour_time = $this->input->post('tour_time');

      $itinerary=array(
      'name'=>$this->input->post('name'),
      'tags'=>$tags,
      'category'=>$this->input->post('category'),
      'mini_desc'=>$this->input->post('mini_desc'),
      'thumb'=>"",
      'image_url'=>str_replace('_', ' ', $this->input->post('name')),
      'description'=>$this->input->post('description'),
      'location'=>$this->input->post('location'),
      'days_open'=>$days_open,
      'daysopen_from'=>$this->input->post('day_open_from'),
      'daysopen_to'=>$this->input->post('day_open_to'),
      'tour_time'=>$tour_time,
      'time_open'=>$this->input->post('time_open'),
      'time_closed'=>$this->input->post('time_closed'),
      'tips'=>$this->input->post('tips')
        );

      $this->user_model->add_itinerary($itinerary);

      //$data['success_msg'] = '<div class="alert alert-success text-center">Your file <strong>' . $upload_data['file_name'] . '</strong> was successfully uploaded!</div>';
      $data['success_modal_itinerary_name'] = $this->input->post('name');
      $data['success_modal_itinerary_link'] = str_replace(' ', '_', $this->input->post('name'));

      $data['modal_success_add'] = TRUE;
      $data['modal_success_edit'] = FALSE;
      $data['modal_success_delete'] = FALSE;
      $data['modal_success_edit_2'] = FALSE;
      $data['modal_success_delete_2'] = FALSE;
      //$this->load->view('upload_file_view', $data);
      
      //$this->admin_dashboard();
      //$this->load->view('admin_page', $data);
      //redirect('/user/admin_dashboard');
      //echo $tags;
      //echo 'upload success';

      //pagination settings
      $config['base_url'] = base_url().'user/admin_dashboard/';
      $config['total_rows'] = $this->db->count_all('itineraries');
      $config['per_page'] = "5";
      $config["uri_segment"] = 3;
      $choice = $config["total_rows"] / $config["per_page"];
      $config["num_links"] = floor($choice);

      //config for bootstrap pagination class integration
      $config['full_tag_open'] = '<ul class="pagination">';
      $config['full_tag_close'] = '</ul>';
      $config['first_link'] = false;
      $config['last_link'] = false;
      $config['first_tag_open'] = '<li>';
      $config['first_tag_close'] = '</li>';
      $config['prev_link'] = '&laquo';
      $config['prev_tag_open'] = '<li class="prev">';
      $config['prev_tag_close'] = '</li>';
      $config['next_link'] = '&raquo';
      $config['next_tag_open'] = '<li>';
      $config['next_tag_close'] = '</li>';
      $config['last_tag_open'] = '<li>';
      $config['last_tag_close'] = '</li>';
      $config['cur_tag_open'] = '<li class="active"><a href="#">';
      $config['cur_tag_close'] = '</a></li>';
      $config['num_tag_open'] = '<li>';
      $config['num_tag_close'] = '</li>';

      $this->pagination->initialize($config);
      $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

      //call the model function to get the department data
      $data['itinerariesList'] = $this->user_model->getAllItineraries($config["per_page"], $data['page']);
      //$data['deptlist'] = $this->department_model->get_department_list($config["per_page"], $data['page']);   
      $data['itinerariesList2'] = $this->user_model->getAllItineraries2();        

      $data['pagination'] = $this->pagination->create_links();

      //load the department_view
      //$this->load->view('department_view',$data);

      //$this->load->view('manage_itineraries.php', $data);

      $data['add_success'] = 1;
      
      $this->load->view('admin_page.php', $data);
  }

}

}

?>