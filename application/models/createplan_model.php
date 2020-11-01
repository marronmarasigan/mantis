<?php
class Createplan_model extends CI_model{

public function getItinerariesData() {
  $this->db->select('*');
  $this->db->from('place'); 
  $query=$this->db->get();
  return $query->result();
}

public function getItinerariesDataByTime() {
  $sql = 'select * from place order by time_open, time_closed asc';
  $query = $this->db->query($sql);
  return $query->result();
}

public function getItineraryIdByName($name) {
  $this->db->select('itinerary_id');
  $this->db->from('place'); 
  $this->db->where('name',$name);
  $query=$this->db->get();
  return $query->result();
}

public function getAverageRatingByName($name) {
  $idArray = $this->createplan_model->getItineraryIdByName($name);
  $itineraryId = 0;
    foreach ($idArray as $id) {
      $itineraryId = $id->itinerary_id;
    }
  $this->db->select('rating');
  $this->db->from('reviews'); 
  $this->db->where('itinerary_id',$itineraryId);
  $query=$this->db->get();

  $ratingsArray = $query->result();

  $average = 0;
  foreach ($ratingsArray as $rating) {
    $average += $rating->rating;
  }

  if ($average != 0) { $average = $average/count($ratingsArray); }

  return round($average, 1);
}

public function publish_itinerary($itinerary) {
  $this->db->insert('itinerary', $itinerary);
}

public function getItineraryIdByName2($name) {
  $this->db->select('itinerary_id');
  $this->db->from('itinerary'); 
  $this->db->where('name',$name);
  $query=$this->db->get();
  return $query->result();
}

public function getLatestItineraryId() {
  $sql = 'select itinerary_id from itinerary order by itinerary_id desc limit 1';
  $query = $this->db->query($sql);
  return $query->result();
}

public function getDistinctTags() {
  $sql = 'select tags from place';
  $query = $this->db->query($sql);
  $tagsStringArray = $query->result();

  $tagSplitArray = "";
  $tagsArray = array();
  foreach ($tagsStringArray as $tagString) {
    $tagSplitArray = preg_split('/\|/', $tagString->tags);
    foreach ($tagSplitArray as $tag) {
      array_push($tagsArray, $tag);
    }
  }

  return $tagsArray;

  //$allTags = array();

  //foreach($tagsStringArray as $tag) {

    //$tags = preg_split('/\|/', $tagsStringArray);
    
  //  foreach ($tags as $tag) {
      array_push($allTags, $tag);
  //  }

  //}

  //return $allTags;
}

public function testFunction() {
  return true;
}

}


?>