<?php

class View extends CI_Controller {

public function __construct(){

        parent::__construct();
  			$this->load->helper('url');
  	 		$this->load->model('view_model');
        $this->load->model('home_model');
        $this->load->model('createplan_model');
        $this->load->library('session');

        $this->load->library('Pdf');

}

public function index()
{
  echo $this->uri->segment(2);
  //$this->load->view("view_itinerary.php");
}

public function place() {
  $param = $this->uri->segment(3);
  $name = str_replace('_', ' ', $param);

  if ($param == 'all') {
    $query = $this->view_model->getAllPlaces();
    $data['places'] = null;
    if($query){
      $data['places'] =  $query;
    }

    
    $this->load->view("view_place_all.php", $data);
  }
  else {
    $data['itineraryDetails'] = $this->view_model->getItineraryDetailsByName($name);

    $idArray = $this->view_model->getItineraryIdByName($name);
    $itineraryId = 0;
    foreach ($idArray as $id) {
      $itineraryId = $id->itinerary_id;
    }
    $data['reviews'] = $this->view_model->getReviewsByItineraryId($itineraryId);

    $this->load->view("view_itinerary.php", $data);
  }
}

public function itinerary() {
  //echo $this->uri->segment(3);
  $param = $this->uri->segment(3);
  $param2 = $this->uri->segment(4);
  $name = str_replace('_', ' ', $param);

  if ($param == 'all') {
    $query = $this->view_model->getAllItineraries();
    $data['itineraries'] = null;
    if($query){
      $data['itineraries'] =  $query;
    }

    
    $this->load->view("view_itinerary_all.php", $data);
  }
  else {
    $data['itineraryDetails'] = $this->view_model->getItineraryDetailsByName2($name, $param2);

    $idArray = $this->view_model->getItineraryIdByName2($name);
    $itineraryId = 0;
    foreach ($idArray as $id) {
      $itineraryId = $id->itinerary_id;
    }
    $data['reviews'] = $this->view_model->getReviewsByItineraryId2($param2);

    $this->load->view("view_itinerary_details.php", $data);
  }
}

public function postComment() {
  //$directions = $this->input->post('directions');
  //echo 'comment';
  $rating = $this->input->post('rating');
  $userComment = $this->input->post('user_comment');
  //echo $rating;
  //echo $userComment;
  $param = $this->uri->segment(3);
  $name = str_replace('_', ' ', $param);
  $idArray = $this->view_model->getItineraryIdByName($this->input->post('itineraryName'));
  $itineraryId = 0;
  foreach ($idArray as $id) {
    $itineraryId = $id->itinerary_id;
  }
  $idArray = $this->view_model->getUserIdByName($this->session->userdata('user_name'));
  $userId = 0;
  foreach ($idArray as $id) {
    $userId = $id->user_id;
  }
  //echo $testId["itinerary_id"];

  $dt = new DateTime(date("F j, Y, g:i a T"), new DateTimeZone('UTC'));
  $dt->setTimezone(new DateTimeZone('Asia/Manila'));

  $review=array(
    'itinerary_id'=>$itineraryId,
    'category'=>0,
    'user_id'=>$userId,
    'rating'=>$rating,
    'comment'=>$userComment,
    'date'=>$dt->format("F j, Y, g:i A")
  );
  $test = $review['itinerary_id'];

  $this->view_model->uploadComment($review);
  $this->view_model->updateRating(0, $itineraryId, $rating, $test);
  $param = $this->input->post('itineraryName');
  $name = str_replace(' ', '_', $param);
  $newUri = 'view/place/' . $name;
  //echo $newUri;
  redirect($newUri, 'refresh');
}

public function postCommentItinerary() {
  //$directions = $this->input->post('directions');
  //echo 'comment';
  $rating = $this->input->post('rating');
  $userComment = $this->input->post('user_comment');
  $itinerary_id_link = $this->input->post('itinerary_id_link');
  //echo $rating;
  //echo $userComment;
  $param = $this->uri->segment(3);
  $param2 = $this->uri->segment(4);
  $name = str_replace('_', ' ', $param);
  $idArray = $this->view_model->getItineraryIdByName2($this->input->post('itineraryName'));
  $itineraryId = 0;
  foreach ($idArray as $id) {
    $itineraryId = $id->itinerary_id;
  }
  $idArray = $this->view_model->getUserIdByName($this->session->userdata('user_name'));
  $userId = 0;
  foreach ($idArray as $id) {
    $userId = $id->user_id;
  }
  //echo $testId["itinerary_id"];

  $dt = new DateTime(date("F j, Y, g:i a T"), new DateTimeZone('UTC'));
  $dt->setTimezone(new DateTimeZone('Asia/Manila'));

  $review=array(
    'itinerary_id'=>$itineraryId,
    'category'=>1,
    'user_id'=>$userId,
    'rating'=>$rating,
    'comment'=>$userComment,
    'date'=>$dt->format("F j, Y, g:i A")
  );
  $test = $review['itinerary_id'];
  $this->view_model->uploadComment($review);
  $this->view_model->updateRating(1, $itineraryId, $rating, $test);
  $param = $this->input->post('itineraryName');
  $name = str_replace(' ', '_', $param);
  $newUri = 'view/itinerary/' . $name . '/' . $itinerary_id_link;
  //echo $newUri;
  redirect($newUri, 'refresh');
}

public function editComment() {
  //$directions = $this->input->post('directions');
  //echo 'comment';
  $rating = $this->input->post('rating');
  $userComment = $this->input->post('user_comment');
  $review_id = $this->input->post('review_id');
  //echo $rating;
  //echo $userComment;
  $param = $this->uri->segment(3);
  $name = str_replace('_', ' ', $param);
  $idArray = $this->view_model->getItineraryIdByName2($this->input->post('itineraryName'));
  $itineraryId = 0;
  foreach ($idArray as $id) {
    $itineraryId = $id->itinerary_id;
  }
  $idArray = $this->view_model->getUserIdByName($this->session->userdata('user_name'));
  $userId = 0;
  foreach ($idArray as $id) {
    $userId = $id->user_id;
  }
  //echo $testId["itinerary_id"];

  $dt = new DateTime(date("F j, Y, g:i a T"), new DateTimeZone('UTC'));
  $dt->setTimezone(new DateTimeZone('Asia/Manila'));

  $review=array(
    'itinerary_id'=>$itineraryId,
    'category'=>1,
    'user_id'=>$userId,
    'rating'=>$rating,
    'comment'=>$userComment,
    'date'=>$dt->format("F j, Y, g:i A")
  );
  $test = $review['itinerary_id'];


  $this->view_model->editComment(0, $rating, $userComment, $review_id, $dt->format("F j, Y, g:i A"));
  $this->view_model->updateRating(0, $itineraryId, $rating, $test);
  $param = $this->input->post('itineraryName');
  $name = str_replace(' ', '_', $param);
  $newUri = 'view/place/' . $name;
  //echo $newUri;
  redirect($newUri, 'refresh');
}

public function editComment2() {
  //$directions = $this->input->post('directions');
  //echo 'comment';
  $rating = $this->input->post('rating');
  $userComment = $this->input->post('user_comment');
  $review_id = $this->input->post('review_id');
  $itinerary_id_link = $this->input->post('itinerary_id_link');
  //echo $rating;
  //echo $userComment;
  $param = $this->uri->segment(3);
  $param2 = $this->uri->segment(4);
  $name = str_replace('_', ' ', $param);
  $idArray = $this->view_model->getItineraryIdByName2($this->input->post('itineraryName'));
  $itineraryId = 0;
  foreach ($idArray as $id) {
    $itineraryId = $id->itinerary_id;
  }
  $idArray = $this->view_model->getUserIdByName($this->session->userdata('user_name'));
  $userId = 0;
  foreach ($idArray as $id) {
    $userId = $id->user_id;
  }
  //echo $testId["itinerary_id"];

  $dt = new DateTime(date("F j, Y, g:i a T"), new DateTimeZone('UTC'));
  $dt->setTimezone(new DateTimeZone('Asia/Manila'));

  $review=array(
    'itinerary_id'=>$itineraryId,
    'category'=>1,
    'user_id'=>$userId,
    'rating'=>$rating,
    'comment'=>$userComment,
    'date'=>$dt->format("F j, Y, g:i A")
  );
  $test = $review['itinerary_id'];


  $this->view_model->editComment(1, $rating, $userComment, $review_id, $dt->format("F j, Y, g:i A"));
  $this->view_model->updateRating(1, $itineraryId, $rating, $test);
  $param = $this->input->post('itineraryName');
  $name = str_replace(' ', '_', $param);
  $newUri = 'view/itinerary/' . $name . '/' . $itinerary_id_link;
  //echo $newUri;
  redirect($newUri, 'refresh');
}

 public function create_pdf2() {
    //============================================================+
    // File name   : example_001.php
    //
    // Description : Example 001 for TCPDF class
    //               Default Header and Footer
    //
    // Author: Muhammad Saqlain Arif
    //
    // (c) Copyright:
    //               Muhammad Saqlain Arif
    //               PHP Latest Tutorials
    //               http://www.phplatesttutorials.com/
    //               saqlain.sial@gmail.com
    //============================================================+
 
   
  
    // create new PDF document
    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);    
  
    // set document information
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('CMSYS');
    $pdf->SetTitle('Generated Trip Plan');
    $pdf->SetSubject('');
    $pdf->SetKeywords('');   
  
    // remove default header/footer
    $pdf->setPrintHeader(false);
    $pdf->setPrintFooter(false);

    // set default monospaced font
    $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED); 

    // set margins
    $pdf->SetMargins(-1, -1, -1);
    //$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
    //$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);    

    // set auto page breaks
    $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM); 

    // set image scale factor
    $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);   
  
    // set some language-dependent strings (optional)
    if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
        require_once(dirname(__FILE__).'/lang/eng.php');
        $pdf->setLanguageArray($l);
    }   
  
    // ---------------------------------------------------------    
  
    // set default font subsetting mode
    $pdf->setFontSubsetting(true);   
  
    // Set font
    // dejavusans is a UTF-8 Unicode font, if you only need to
    // print standard ASCII chars, you can use core fonts like
    // helvetica or times to reduce file size.
    $pdf->SetFont('helvetica', '', 9, '', true);   
  
    // Add a page
    // This method has several options, check the source code documentation for more information.
    $pdf->AddPage('L'); 
  
    // set text shadow effect
    $pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));   

    $alloted_time = $this->input->post('alloted_time_sv');
  
    // Set some content to print

  $timeframeStart = $this->input->post('timeframestart');
  $timeframeEnd = $this->input->post('timeframeend');
  $itineraryName = $this->input->post('itineraryName');
  $itineraryImage = $this->input->post('itineraryImage');
  $itineraryDesc = $this->input->post('itineraryDesc');
  $itineraryLocation = $this->input->post('itineraryLocation');
  $itineraryTourTime = $this->input->post('itineraryTourTime');
  $itineraryTT2 = $this->input->post('itineraryTT2');
  $itineraryTimeOpen = $this->input->post('itineraryTimeOpen');
  $itineraryTimeClosed = $this->input->post('itineraryTimeClosed');
  $itineraryTips = $this->input->post('notes');
  $TEST = $this->input->post('TESTARRAY');

  $allesttourtime = $this->input->post('allesttourtime');
  

  $html = '
  <!--<img style="text-align:center;display:block;" align="center" src="https://my.mixtape.moe/ebmeqi.png">-->

  <table border="0" cellpadding="2" cellspacing="2" nobr="true" style="background-color: #20c997;display: table-cell;vertical-align: middle; background-color: #2C3E50; height: 400px">
    <tr  style="text-align: right;">
      <td rowspan="2" style="font-size: 300%; height: 40px; color: white;"><b>MANTIS</b></td>
      <td  style="text-align: left; font-size: 100%; height: 18px; vertical-align: middle; color: #20c997;"><b>MANILA TOURIST</b></td>
    </tr>
    <tr style="text-align: left; font-size: 100%;">
      <td style=" height: 18px; vertical-align: middle; color: #20c997;"><b>INFORMATION SYSTEM</b></td>
    </tr>
  </table>

  <!--<h1  align="center" style="sans-serif;">Your Generated Trip Plan</h1>-->

  <table border="0" cellpadding="2" cellspacing="2" nobr="true" style="display: table-cell;vertical-align: middle; background-color: #20c997; height: 200px;">
  <tr align="center"><td style="font-size: 200%; color: white;">' . $this->input->post('itineraryRealName') . '</td></tr>
  <tr align="center"><td style="font-size: 150%; color: white;">' . 'Alloted Time: ' . $this->input->post('alloted_time_sv') . ' hours &nbsp; Places of Intent: ' . $this->input->post('user_tags_sv') . '&nbsp; Start Time: ';

  $current_time = $this->input->post('start_time_sv');

  if ($current_time > 12) {
    $html .=   ($current_time - 12) . ':00 PM';
  }
  else {
    if ($current_time == 0) {
      $html .=   '12:00 AM';
    }
    else if ($current_time == 12) {
      $html .=   '12:00 PM';
    }
    else {
      $html .=   $current_time . ':00 AM';
    }
  }

  $html .=  ' &nbsp; Rating: ';

  $rating_form = $this->input->post('rating_sv');
  if ($rating_form != 1) {
    $html .= $rating_form . ' stars and above';
  }
  else {
    $html .= $rating_form . ' star and above'; 
  }

  $html .= '</td></tr>
  </table>

  <table  border="0" cellpadding="2" cellspacing="2" nobr="true" style="display: table-cell;text-align: center;vertical-align: middle;">
    <thead style="background-color: #0e4e5c; color:white;">
      <tr>
        <!--<th style="font-weight: bold; background-color: #0e4e5c; color:white;" align="center" scope="col">#</th>-->
        <th style="font-weight: bold; background-color: #0e4e5c; color:white;" align="center" scope="col">Time Frame</th>
        <th style="font-weight: bold; background-color: #0e4e5c; color:white;" align="center" scope="col">Image</th>
        <th style="font-weight: bold; background-color: #0e4e5c; color:white;" align="center" scope="col">Name</th>
        <th style="font-weight: bold; background-color: #0e4e5c; color:white;" align="center" scope="col">Description</th>
        <th style="font-weight: bold; background-color: #0e4e5c; color:white;" align="center" scope="col">Location</th>
        <th style="font-weight: bold; background-color: #0e4e5c; color:white;" align="center" scope="col">Est. Tour Time</th>
        <th style="font-weight: bold; background-color: #0e4e5c; color:white;" align="center" scope="col">Business Hours</th>
        <th style="font-weight: bold; background-color: #0e4e5c; color:white;" align="center" scope="col">Notes</th>
      </tr>
    </thead>
    <tbody>
  ';

  for ($i = 0; $i < count($itineraryName); $i++) {
    $j = $i+1;
    $testt = $TEST;

    $html .= '
    <tr style="display: table-cell;text-align: center;vertical-align: middle;">';
    //$html .= '<td style="background-color: #e3f1f4; color:black;display: table-cell;text-align: center;vertical-align: middle;">' . $j . '</td>';
    $html .= '<td style="background-color: #e3f1f4; color:black;display: table-cell;text-align: center;vertical-align: middle;">' . $timeframeStart[$i] . ' - ' . $timeframeEnd[$i] . '</td>
        <td style="background-color: #e3f1f4; color:black;display: table-cell;text-align: center;vertical-align: middle;"><img style ="" src="' . $itineraryImage[$i] . '" alt=""></td>
        
        <td style="background-color: #e3f1f4; color:black;display: table-cell;text-align: center;vertical-align: middle;">' . $itineraryName[$i] . '</td>
        <td style="background-color: #e3f1f4; color:black;display: table-cell;text-align: center;vertical-align: middle;">' . $itineraryDesc[$i] . '</td>
        <td style="background-color: #e3f1f4; color:black;display: table-cell;text-align: center;vertical-align: middle;">' . $itineraryLocation[$i] . '</td>';

    $html .= '<td style="background-color: #e3f1f4; color:black;display: table-cell;text-align: center;vertical-align: middle;">' . $itineraryTourTime[$i] . '</td>
        <td style="background-color: #e3f1f4; color:black;display: table-cell;text-align: center;vertical-align: middle;">' . $itineraryTimeOpen[$i] . ' - ' . $itineraryTimeClosed[$i] . '</td>
        <td style="background-color: #e3f1f4; color:black;display: table-cell;text-align: center;vertical-align: middle;">' . $itineraryTips[$i] . '</td>
    </tr>
    ';
  }

  

  $html .= '</tbody></table>';
  
    // Print text using writeHTMLCell()
    $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);   
  
    // ---------------------------------------------------------    
  
    // Close and output PDF document
    // This method has several options, check the source code documentation for more information.
    ob_end_clean();
    $pdf->Output('example_001.pdf', 'I');    
  
    //============================================================+
    // END OF FILE
    //============================================================+
    }

public function create_pdf() {
  //============================================================+
  // File name   : example_001.php
  // Begin       : 2008-03-04
  // Last Update : 2013-05-14
  //
  // Description : Example 001 for TCPDF class
  //               Default Header and Footer
  //
  // Author: Nicola Asuni
  //
  // (c) Copyright:
  //               Nicola Asuni
  //               Tecnick.com LTD
  //               www.tecnick.com
  //               info@tecnick.com
  //============================================================+

  /**
  * Creates an example PDF TEST document using TCPDF
  * @package com.tecnick.tcpdf
  * @abstract TCPDF - Example: Default Header and Footer
  * @author Nicola Asuni
  * @since 2008-03-04
  */

  // create new PDF document
  $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);    

  // set document information
  $pdf->SetCreator(PDF_CREATOR);
  $pdf->SetAuthor('CMSYS');
  $pdf->SetTitle('Generated Trip Plan');
  $pdf->SetSubject('');
  $pdf->SetKeywords('');   

  // remove default header/footer
  $pdf->setPrintHeader(false);
  $pdf->setPrintFooter(false);

  // set default monospaced font
  $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED); 

  // set margins
  $pdf->SetMargins(-1, -1, -1);
  //$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
  //$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);    

  // set auto page breaks
  $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM); 

  // set image scale factor
  $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);  

  // set some language-dependent strings (optional)
  if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
      require_once(dirname(__FILE__).'/lang/eng.php');
      $pdf->setLanguageArray($l);
  }   

  // ---------------------------------------------------------    

  // set default font subsetting mode
  $pdf->setFontSubsetting(true);   

  // Set font
  // dejavusans is a UTF-8 Unicode font, if you only need to
  // print standard ASCII chars, you can use core fonts like
  // helvetica or times to reduce file size.
  $pdf->SetFont('helvetica', '', 9, '', true);   

  // Add a page
  // This method has several options, check the source code documentation for more information.
  $pdf->AddPage(); 

  // set text shadow effect
  $pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));    

  // Set some content to print
  /*
  $html = <<<EOD
  <h1>Welcome to <a href="http://www.tcpdf.org" style="text-decoration:none;background-color:#CC0000;color:black;">&nbsp;<span style="color:black;">TC</span><span style="color:white;">PDF</span>&nbsp;</a>!</h1>
  <i>This is the first example of TCPDF library.</i>
  <p>This text is printed using the <i>writeHTMLCell()</i> method but you can also use: <i>Multicell(), writeHTML(), Write(), Cell() and Text()</i>.</p>
  <p>Please check the source code documentation and other examples for further information.</p>
  <p style="color:#CC0000;">TO IMPROVE AND EXPAND TCPDF I NEED YOUR SUPPORT, PLEASE <a href="http://sourceforge.net/donate/index.php?group_id=128076">MAKE A DONATION!</a></p>
  EOD;
  */

  //$img = file_get_contents('/images/mantis.png');
  //$pdf->Image('@' . $img);

  $itineraryName = $this->input->post('itineraryName');
  $itineraryDesc = $this->input->post('itineraryDesc');
  $itineraryLocation = $this->input->post('itineraryLocation');
  $itineraryTourTime = $this->input->post('itineraryTourTime');
  $itineraryTimeOpen = $this->input->post('itineraryTimeOpen');
  $itineraryTimeClosed = $this->input->post('itineraryTimeClosed');

  $html = '
  <!--<img style="text-align:center;display:block;" align="center" src="https://my.mixtape.moe/ebmeqi.png">-->

  <table border="0" cellpadding="2" cellspacing="2" nobr="true" style="background-color: #20c997;display: table-cell;vertical-align: middle; background-color: #2C3E50; height: 400px">
    <tr  style="text-align: right;">
      <td rowspan="2" style="font-size: 300%; height: 40px; color: white;"><b>MANTIS</b></td>
      <td  style="text-align: left; font-size: 100%; height: 18px; vertical-align: middle; color: #20c997;"><b>MANILA TOURIST</b></td>
    </tr>
    <tr style="text-align: left; font-size: 100%;">
      <td style=" height: 18px; vertical-align: middle; color: #20c997;"><b>INFORMATION SYSTEM</b></td>
    </tr>
  </table>

  <!--<h1  align="center" style="sans-serif;">Your Generated Trip Plan</h1>-->

  <table border="0" cellpadding="2" cellspacing="2" nobr="true" style="display: table-cell;vertical-align: middle; background-color: #20c997; height: 200px;">
  <tr align="center"><td style="font-size: 150%; color: white;">Your Generated Trip Plan</td></tr>
  </table>

  <table  border="0" cellpadding="2" cellspacing="2" nobr="true" style="display: table-cell;text-align: center;vertical-align: middle;">
    <thead style="background-color: #0e4e5c; color:white;">
      <tr>
        <th style="font-weight: bold; background-color: #0e4e5c; color:white;" align="center" scope="col">Image</th>
        <th style="font-weight: bold; background-color: #0e4e5c; color:white;" align="center" scope="col">Name</th>
        <th style="font-weight: bold; background-color: #0e4e5c; color:white;" align="center" scope="col">Description</th>
        <th style="font-weight: bold; background-color: #0e4e5c; color:white;" align="center" scope="col">Est. Tour Time</th>
        <th style="font-weight: bold; background-color: #0e4e5c; color:white;" align="center" scope="col">Time Open</th>
        <th style="font-weight: bold; background-color: #0e4e5c; color:white;" align="center" scope="col">Time Closed</th>
        <th style="font-weight: bold; background-color: #0e4e5c; color:white;" align="center" scope="col">Location</th>
      </tr>
    </thead>
    <tbody>
  ';

  for ($i = 0; $i < count($itineraryName); $i++) {
    $html .= '
    <tr style="display: table-cell;text-align: center;vertical-align: middle;">
        <td style="background-color: #e3f1f4; color:black;display: table-cell;text-align: center;vertical-align: middle;"><img style ="" src="' . base_url() . 'assets/wp_content/images/' . str_replace(' ', '_', $itineraryName[$i]) . '.png" alt=""></td>
        <td style="background-color: #e3f1f4; color:black;display: table-cell;text-align: center;vertical-align: middle;">' . $itineraryName[$i] .'</td>
        <td style="background-color: #e3f1f4; color:black;display: table-cell;text-align: center;vertical-align: middle;">' . $itineraryDesc[$i] .'</td>
        <td style="background-color: #e3f1f4; color:black;display: table-cell;text-align: center;vertical-align: middle;">';
        if ($itineraryTourTime[$i] >= 60) {
          $html .= '' . ($itineraryTourTime[$i] / 60) . ' hours';
        }
        else {
          $html .= '' . $itineraryTourTime[$i] . ' minutes';
        }

        //$html .=  $itineraryTourTime[$i];
        $html .= '</td>
        <td style="background-color: #e3f1f4; color:black;display: table-cell;text-align: center;vertical-align: middle;">';
        if ($itineraryTimeOpen[$i] > 12) {
          $html .= '' . ($itineraryTimeOpen[$i] - 12) . ':00 PM';
        }
        else {
          if ($itineraryTimeOpen[$i] == 0) {
            $html .= '12:00 AM';
          }
          else {
            $html .= '' . $itineraryTimeOpen[$i] . ':00 AM';
          }
        }
        $html .= '</td>
        <td style="background-color: #e3f1f4; color:black;display: table-cell;text-align: center;vertical-align: middle;">';
        if ($itineraryTimeClosed[$i] > 12) {
          $html .= '' . ($itineraryTimeClosed[$i] - 12) . ':00 PM';
        }
        else {
          if ($itineraryTimeClosed[$i] == 0) {
            $html .= '12:00 AM';
          }
          else {
            $html .= '' . $itineraryTimeClosed[$i] . ':00 AM';
          }
        }
        $html .= '</td>
        <td style="background-color: #e3f1f4; color:black;display: table-cell;text-align: center;vertical-align: middle;">' . $itineraryLocation[$i] .'</td>
    </tr>
    ';
  }

  $html .= '</tbody></table>';

   //. $itineraryName[0];

  // Print text using writeHTMLCell()
  $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 0, 0, true, '', true);   

  // ---------------------------------------------------------    

  // Close and output PDF document
  // This method has several options, check the source code documentation for more information.
  $pdf->Output('example_001.pdf', 'I');    

  //============================================================+
  // END OF FILE
  //============================================================+
  }

}

?>