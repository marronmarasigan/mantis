<?php
class View_model extends CI_model{

public function getAllPlaces() {
	$this->db->select('*');
	$this->db->from('place');
	$query = $this->db->get();
	return $query->result();
}

public function getAllItineraries() {
	$this->db->select('*');
	$this->db->from('itinerary');
	$query = $this->db->get();
	return $query->result();
}

public function getPlaceDetailsByID($id) {
  $this->db->select('*');
  $this->db->from('place'); 
  $this->db->where('itinerary_id',$id);
  $query=$this->db->get();
  return $query->result();
}

public function getItineraryDetailsByName($name) {
  $this->db->select('*');
  $this->db->from('place'); 
  $this->db->where('name',$name);
  $query=$this->db->get();
  return $query->result();
}

public function getItineraryDetailsByName2($name, $id) {
  $this->db->select('*');
  $this->db->from('itinerary'); 
  $this->db->where('name',$name);
  $this->db->where('itinerary_id',$id);
  $query=$this->db->get();
  return $query->result();
}

public function getItineraryIdByName($name) {
	$this->db->select('itinerary_id');
	$this->db->from('place'); 
	$this->db->where('name',$name);
	$query=$this->db->get();
	return $query->result();
}

public function getItineraryIdByName2($name) {
	$this->db->select('itinerary_id');
	$this->db->from('itinerary'); 
	$this->db->where('name',$name);
	$query=$this->db->get();
	return $query->result();
}

public function getUserIdByName($name) {
	$this->db->select('user_id');
	$this->db->from('user'); 
	$this->db->where('user_name',$name);
	$query=$this->db->get();
	return $query->result();
}

public function getUsernameById($id) {
	$this->db->select('user_name');
	$this->db->from('user'); 
	$this->db->where('user_id',$id);
	$query=$this->db->get();

	  
	  $nameArray = $query->result();
	  $userName = "";
	  foreach ($nameArray as $name) {
	    $userName = $name->user_name;
	  }

	return $userName;
}

public function uploadComment($data){
	$this->db->insert('reviews', $data);
	//echo 'upload success';
}

public function editComment($category, $newRating, $userComment, $review_id, $date){
	$this->db->set('rating', $newRating);
	$this->db->set('comment', $userComment);
	$this->db->set('date', $date);
	$this->db->where('review_id', $review_id);
	$this->db->update('reviews');
}

public function getRatingById($id) {
	$this->db->select('rating');
	$this->db->from('place'); 
	$this->db->where('itinerary_id',$id);
	$query=$this->db->get();
	return $query->result();
}

public function checkUserCommentPlace($category, $userId, $itineraryId) {
  $this->db->select('*');
	$this->db->from('reviews'); 
	$this->db->where('category', $category);
	$this->db->where('itinerary_id', $itineraryId);
	$this->db->where('user_id', $userId);
	$query=$this->db->get();
	return $query->result();

}

public function getRatingById2($id) {
	$this->db->select('ratingv2');
	$this->db->from('itinerary'); 
	$this->db->where('itinerary_id',$id);
	$query=$this->db->get();
	return $query->result();
}

public function updateRating($category, $id, $rating, $test) {
	$newRating = 0;
	if ($category == 0) {
		$idArray = $this->view_model->getRatingById($id);
		$itineraryRating = 0;
		  foreach ($idArray as $id) {
		    $itineraryRating = $id->rating;
		    
		  }

		//var_dump($id);
		  
		if ($itineraryRating == 0) {$newRating = $rating;}
		else {$newRating = ($itineraryRating + $rating) / 2;}



		$this->db->set('rating', $newRating);
		$this->db->where('itinerary_id', $test);
		$this->db->update('place');

		//$newRating = array('rating' => 3.3);    
		//$this->db->where('itinerary_id', $id);
		//$this->db->update('place', $newRating); 

	}
	else {
		$idArray = $this->view_model->getRatingById2($id);
		$itineraryRating = 0;
		  foreach ($idArray as $id) {
		    $itineraryRating = $id->ratingv2;
		  }

		if ($itineraryRating == 0) {$newRating = $rating;}
		else {$newRating = ($itineraryRating + $rating) / 2;}

		$this->db->set('ratingv2', $newRating);
		$this->db->where('itinerary_id', $test);
		$this->db->update('itinerary');
	}
	
}

public function getReviewsByItineraryId($id) {
	$this->db->select('*');
	$this->db->from('reviews'); 
	$this->db->where('itinerary_id',$id);
	$this->db->where('category',0);
	$query=$this->db->get();
	return $query->result();
}

public function getReviewsByItineraryId2($id) {
	$this->db->select('*');
	$this->db->from('reviews'); 
	$this->db->where('itinerary_id',$id);
	$this->db->where('category',1);
	$query=$this->db->get();
	return $query->result();
}

public function getAverageRatingByName($name) {
	$idArray = $this->view_model->getItineraryIdByName($name);
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

public function checkIfEligibleToComment($id, $itinerary_id) {
	$this->db->select('*');
	$this->db->from('reviews'); 
	$this->db->where('user_id',$id);
		$this->db->where('itinerary_id', $itinerary_id);
	$this->db->where('category',0);
	$query=$this->db->get();
	
	//$dateLastComment = $query->result();

	$dateLastCommentQuery = $query->result();
	  $dateLastComment = "";
	  foreach ($dateLastCommentQuery as $dlc) {
	    $dateLastComment = $dlc->date;
	  }

	$diff = date_diff(date_create($dateLastComment),date_create(date("Y-m-d")));
	if ($dateLastComment == "") { return true;}
	else {
		if ($diff->format('%d') >= 14) {
			return true;
		}
		else {
			return false;
		}
	}
}

public function checkIfEligibleToCommentTEST($id, $itinerary_id) {
	$this->db->select('*');
	$this->db->from('reviews'); 
	$this->db->where('user_id',$id);
	$this->db->where('itinerary_id', $itinerary_id);
	$this->db->where('category',0);
	$query=$this->db->get();
	
	//$dateLastComment = $query->result();

	$dateLastCommentQuery = $query->result();
	$dateLastComment = "";
	  foreach ($dateLastCommentQuery as $dlc) {
	    $dateLastComment = $dlc->date;
	  }

	$diff = date_diff(date_create($dateLastComment),date_create(date("Y-m-d")));
	if ($dateLastComment == "") { return true;}
	else {
		if ($diff->format('%d') >= 14) {
			return true;
		}
		else {
			return false;
		}
	}
}

public function checkIfEligibleToComment3($id, $itinerary_id) {
	$this->db->select('*');
	$this->db->from('reviews'); 
	$this->db->where('user_id',$id);
	$this->db->where('itinerary_id', $itinerary_id);
	$this->db->where('category',1);
	$query=$this->db->get();
	
	//$dateLastComment = $query->result();

	$dateLastCommentQuery = $query->result();
	  $dateLastComment = "";
	  foreach ($dateLastCommentQuery as $dlc) {
	    $dateLastComment = $dlc->date;
	  }

	$diff = date_diff(date_create($dateLastComment),date_create(date("Y-m-d")));
	if ($dateLastComment == "") { return true;}
	else {
		if ($diff->format('%d') >= 14) {
			return true;
		}
		else {
			return false;
		}
	}
}

public function checkIfPlaceExists($id) {
	$this->db->select('*');
	$this->db->from('place'); 
	$this->db->where('itinerary_id',$id);
	$query=$this->db->get();

	if (count($query->result()) != 0) {
		return true;
	}
	else {
		return false;
	}
	//return $query->result();
}


}


?>