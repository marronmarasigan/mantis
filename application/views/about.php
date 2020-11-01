<?php

$user_id=$this->session->userdata('user_name');


if(!$user_id){
			echo "no session wtf";
		}
else {
	echo $user_id;
}
/**
if($user_id){
  //echo "no session";
  echo "hello";
  echo $this->session->userdata('user_name');
}

else {
	redirect('user/login_view');
}

**/