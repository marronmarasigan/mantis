<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('home_model');
		$this->load->model('view_model');
	}

	public function index()
	{
		$query = $this->home_model->getItineraries();
		$data['PLACES'] = null;
		if($query){
 			$data['PLACES'] =  $query;
		}

		$query = $this->home_model->getItineraries2();
		$data['ITINERARIES'] = null;
		if($query){
 			$data['ITINERARIES'] =  $query;
		}

		$this->load->view('splash', $data);
		//$this->load->view('splash')
	}
}
