<?php
class Home_model extends CI_Model {

	function __construct(){
		parent::__construct();
	}

	function getItineraries() {
		$this->db->select('*');
		$this->db->from('place');
		$query = $this->db->get();
		return $query->result();
	}

	function getItineraries2() {
		$this->db->select('*');
		$this->db->from('itinerary');
		$query = $this->db->get();
		return $query->result();
	}

	function getPlaceImageById($id){
		$this->db->select('image_url');
		$this->db->from('place');
		$this->db->where('itinerary_id', $id);
		$query = $this->db->get();
		return $query->result();
	}



 function getEmployees(){
  $this->db->select("EMPLOYEE_ID,FIRST_NAME,LAST_NAME,EMAIL");
  $this->db->from('trn_employee');
  $query = $this->db->get();
  return $query->result();
 }
}
?>