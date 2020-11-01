<?php
class User_model extends CI_model{



public function register_user($user){


$this->db->insert('user', $user);

}

public function login_user($email,$pass){

  $this->db->select('*');
  $this->db->from('user');
  $this->db->where('user_email',$email);
  $this->db->where('user_password',$pass);

  if($query=$this->db->get())
  {
      return $query->row_array();
  }
  else{
    return false;
  }


}
public function email_check($email){

  $this->db->select('*');
  $this->db->from('user');
  $this->db->where('user_email',$email);
  $query=$this->db->get();

  if($query->num_rows()>0){
    return false;
  }else{
    return true;
  }

}

public function add_itinerary($itinerary) {
  $this->db->insert('place', $itinerary);
}

public function edit_itinerary($itinerary, $id) {
  //$this->db->insert('itineraries', $itinerary);
  $this->db->where('itinerary_id', $id); // here is the id
  $this->db->update('place', $itinerary);
}

public function editItineraryById2($id, $newName) {
  //$this->db->where('itinerary_id', $id);
  //$this->db->update('itinerary', $itinerary);
  $this->db->set('name', $newName);
  $this->db->where('itinerary_id', $id);
  $this->db->update('itinerary');
}

public function deleteItineraryById($id) {
  $this->db->where('itinerary_id', $id);
  $this->db->delete('place');
}

public function deleteItineraryById2($id) {
  $this->db->where('itinerary_id', $id);
  $this->db->delete('itinerary');
}

public function deleteReviewById($id) {
  $this->db->where('review_id', $id);
  $this->db->delete('reviews');
}

public function getAllItineraries($limit, $start) {
  $sql = 'select itinerary_id, name, mini_desc, tags, location, description from place order by itinerary_id desc';
  $query = $this->db->query($sql);
  return $query->result();
}

public function getAllItineraries2() {
  $sql = 'select itinerary_id, name, author, user_tags from itinerary';
  $query = $this->db->query($sql);
  return $query->result();
}

public function getItineraryDetailsById($id) {
  $this->db->select('*');
  $this->db->from('place'); 
  $this->db->where('itinerary_id', $id);
  $query=$this->db->get();
  return $query->result();
}

public function getItineraryDetailsById2($id) {
  $this->db->select('*');
  $this->db->from('itinerary'); 
  $this->db->where('itinerary_id', $id);
  $query=$this->db->get();
  return $query->result();
}

public function getPlaceNameById($id) {
  $this->db->select('name');
  $this->db->from('place'); 
  $this->db->where('itinerary_id', $id);
  $query=$this->db->get();
  return $query->row();
}

public function getPlaceNameById2($id) {
  $this->db->select('name');
  $this->db->from('itinerary'); 
  $this->db->where('itinerary_id', $id);
  $query=$this->db->get();
  return $query->row();
}

}


?>