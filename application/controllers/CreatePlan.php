<?php


/**
  TO DO 7/16/2018
  - add more itineraries
  - fix create plan not getting suggested itineraries **
  - sort dashboard itineraries by recently added /
  - fix add/edit itinerary bug not getting tags (hidden-intent) /
  - add view link in dashboard (itinerary) /
  - display tags in dashboard /
  - include search tags in dashboard /

  - add itinerary main page
  - fix always redirect admin user to dashboard going home /

  - form validation
  - PDF CSS !!!!!!!!!!!

**/

class CreatePlan extends CI_Controller {

public function __construct(){

        parent::__construct();
  			$this->load->helper('url');
  	 		$this->load->model('createplan_model');
        $this->load->library('session');
        $this->load->library('Pdf');

}

public function index() {
  $this->load->view("create_plan.php");
}

public function view_plan($data) {
  $this->load->view('view_plan.php', $data);
}

public function create_trip() {
  
  //echo $this->input->post('alloted_time');

  /*
  $user_preferences=array(
    'alloted_time'=>$this->input->post('alloted_time'),
    'places_of_intent'=>$this->input->post('places_of_intent'),
    'opening_time'=>$this->input->post('opening_time'),
    'user_reviews'=>$this->input->post('user_reviews'),
    'directions'=>$this->input->post('directions')
  );
  */

  //echo $user_preferences;

  //$itinerariesData = $this->createplan_model->getItinerariesData();
  $itinerariesData = $this->createplan_model->getItinerariesDataByTime();

  
  $generatedTripArray = array();
  $suggestedItinerariesArray = array();
  $additionalTimeArray = array();
  $addTimeItinerariesArray = array();
  $timeframeArray = array();

  $newTags = "";
  $newTags2 = array();

  /*
    NOTES:
    missing reviews functionality
    - add review system
    - review database
    - review view (itinerary view, needs session login)
    - add in model, average review score for each itinerary

  */
  $total_alloted_time = $this->input->post('alloted_time') * 60;
  $current_time = $this->input->post('opening_time');

  $intentArray = $this->input->post('framework');
      
      for ($i = 0; $i < count($intentArray); $i++) {
        $newTags = $newTags . $intentArray[$i];
        if ($i < (count($intentArray) - 1)) {
          $newTags .= ",";
        }
      }

      $newTags2 = $intentArray[0];

  foreach ($itinerariesData as $itinerary) {
    $include_itinerary = FALSE;
    $suggest_itinerary = FALSE;
    $adjust_time_itinerary = FALSE;
    
    // if within user alloted time
    if ($total_alloted_time >= $itinerary->tour_time) {
      //if within user places of intent

      if ($newTags == '' || $this->checkIfPlaceOfIntent($newTags, $itinerary->tags)) {
        //if start time < within opening time
        if ($current_time >= $itinerary->time_open && $current_time <= $itinerary->time_closed) {
          // if within user reviews
          if ($this->createplan_model->getAverageRatingByName($itinerary->name) >= $this->input->post('rating') || $this->createplan_model->getAverageRatingByName($itinerary->name) == 0) {
            $include_itinerary = TRUE;
            $total_alloted_time -= $itinerary->tour_time;
            $current_time += ($itinerary->tour_time / 60);
            $current_time += 0.25;
          }

        }
        // else if not within opening time
        //else {
          //if ($this->createplan_model->getAverageRatingByName($itinerary->name) >= $this->input->post('rating') || $this->createplan_model->getAverageRatingByName($itinerary->name) == 0) {
            //$adjust_time_itinerary = TRUE;
            //$total_alloted_time -= $itinerary->tour_time;
            
          //}
        //}
      }
    }
    else {
      if ($newTags == '' || $this->checkIfPlaceOfIntent($newTags, $itinerary->tags)) {
        //if start time < within opening time
        //if ($this->input->post('opening_time') <= $itinerary->time_open) {
        if ($current_time >= $itinerary->time_open && $current_time <= $itinerary->time_closed) {
          // if within user reviews
          if ($this->createplan_model->getAverageRatingByName($itinerary->name) >= $this->input->post('rating') || $this->createplan_model->getAverageRatingByName($itinerary->name) == 0) {
            $suggest_itinerary = TRUE;
            //$total_alloted_time -= $itinerary->tour_time;
            
          }

        }
      }
    }
    if ($include_itinerary) {
      array_push($generatedTripArray, $itinerary);
      array_push($timeframeArray, $current_time);
    }
    if ($suggest_itinerary) {
      array_push($suggestedItinerariesArray, $itinerary);
      array_push($additionalTimeArray, $itinerary->tour_time);
    }
    if ($adjust_time_itinerary) {
      array_push($addTimeItinerariesArray, $itinerary);
    }
  }
  

  $data['itineraryset'] = null;
  if($generatedTripArray){
    $data['itineraryset'] =  $generatedTripArray;
  }

  $data['suggesteditineraryset'] = null;
  if($suggestedItinerariesArray){
    $data['suggesteditineraryset'] =  $suggestedItinerariesArray;
  }

  $data['additionalTime'] = null;
  if ($additionalTimeArray) {
    $data['additionalTime'] = $additionalTimeArray;
  }

  $data['addTimeItinerary'] = null;
  if ($additionalTimeArray) {
    $data['addTimeItinerary'] = $addTimeItinerariesArray;
  }

  $data['directions'] = FALSE;
  if ($this->input->post('directions') == 1) {
    $data['directions'] = TRUE;
  }

  $data['timeframe'] = FALSE;
  if ($timeframeArray) {
    $data['timeframe'] = $timeframeArray;
  }

  $data['checkbox'] = var_dump($this->input->post('directions'));

  $data['intent'] = $this->input->post('hidden-intent');
  $data['testtest'] = "hello";
  $ttttt = preg_split('/,/', $this->input->post('hidden-intent'));
  $data['total_alloted_time'] = $this->input->post('hidden-intent');
  $data['ifIntent'] = $this->checkIfPlaceOfIntent($this->input->post('hidden-intent'), $itinerary->tags);

  //if ($this->input->post(alloted_time)) { $data['user_alloted_time'] = $this->input->post(alloted_time);}

  $data['alloted_time'] = $this->input->post('alloted_time');
  $data['user_tags'] = $this->input->post('hidden-intent');
  $data['opening_time'] = $this->input->post('opening_time');
  $data['user_reviews'] = $this->input->post('rating');

  $data['start_time'] = (int)$this->input->post('opening_time');

  $data['newTags'] = $newTags;

  

  $this->load->view('view_plan', $data);
}

public function checkIfPlaceOfIntent($userIntent, $itineraryTags) {
  $placeOfIntent = FALSE;
  $tags = preg_split('/\|/', $itineraryTags);
  $userTags = preg_split('/,/', $userIntent);
  foreach ($tags as $tag) {
    foreach ($userTags as $userTag) {
      if (strcmp($tag, $userTag) == 0) {
        $placeOfIntent = TRUE;
        return $placeOfIntent;
      }
    }
  }
  return $placeOfIntent;
}

public function save_plan() {
  $data['alloted_time'] = $this->input->post('alloted_time_sv');
  $data['user_tags'] = $this->input->post('user_tags_sv');
  $data['start_time'] = $this->input->post('start_time_sv');
  $data['rating'] = $this->input->post('rating_sv');

  $data['itineraryName'] = $this->input->post('itineraryName');
  $data['itineraryImage'] = $this->input->post('itineraryImage');
  $data['itineraryTimeframeStart'] = $this->input->post('timeframestart');
  $data['itineraryTimeframeEnd'] = $this->input->post('timeframeend');
  $data['itineraryDesc'] = $this->input->post('itineraryDesc');
  $data['itineraryLocation'] = $this->input->post('itineraryLocation');
  $data['itineraryTourTime'] = $this->input->post('itineraryTourTime');
  $data['itineraryTimeOpen'] = $this->input->post('itineraryTimeOpen');
  $data['itineraryTimeClosed'] = $this->input->post('itineraryTimeClosed');
  $data['itineraryTips'] = $this->input->post('notes');

  $data['itineraryId'] = $this->input->post('itineraryId');

  $this->load->view('save_plan', $data);
}

public function publish_plan() {
  $alloted_time = $this->input->post('alloted_time_sv');
  $user_tags = $this->input->post('user_tags_sv');
  $start_time = $this->input->post('start_time_sv');
  $rating = $this->input->post('rating_sv');

  $itineraryName = $this->input->post('itineraryName');
  $itineraryImage = $this->input->post('itineraryImage');
  $itineraryTimeframeStart = $this->input->post('timeframestart');
  $itineraryTimeframeEnd = $this->input->post('timeframeend');
  //$itineraryTimeFrame = $itineraryTimeframeStart . ' - ' . $itineraryTimeframeEnd;
  $itineraryDesc = $this->input->post('itineraryDesc');
  $itineraryLocation = $this->input->post('itineraryLocation');
  $itineraryTourTime = $this->input->post('itineraryTourTime');
  $itineraryTimeOpen = $this->input->post('itineraryTimeOpen');
  $itineraryTimeClosed = $this->input->post('itineraryTimeClosed');
  $itineraryTips = $this->input->post('notes');
  $itineraryNewName = $this->input->post('itineraryNewName');

  $author = $this->input->post('author');

  $idArray = $this->input->post('itineraryId');
  $placesv2 = "";

  for ($i = 0; $i < count($idArray); $i++) {
    $placesv2 .= $idArray[$i];
    if ($i < (count($idArray) - 1)) {
      $placesv2 .= '|';
    }
  }

  $itinerary=array(
    'name'=>$itineraryNewName,
    'author'=>$author,
    'alloted_time'=>$alloted_time,
    'user_tags'=>$user_tags,
    'start_time'=>$start_time,
    'rating'=>$rating,
    //'timeframe_start'=>serialize($itineraryTimeframeStart),
    //'timeframe_end'=>serialize($itineraryTimeframeEnd),
    //'place_image_url'=>serialize($itineraryImage),
    //'place_name'=>serialize($itineraryName),
    //'place_desc'=>serialize($itineraryDesc),
    //'place_location'=>serialize($itineraryLocation),
    //'place_tourtime'=>serialize($itineraryTourTime),
    //'place_hours_open'=>serialize($itineraryTimeOpen),
    //'place_hours_closed'=>serialize($itineraryTimeClosed),
    //'place_notes'=>serialize($itineraryTips),
    'placesv2'=>$placesv2
  );

  $this->createplan_model->publish_itinerary($itinerary);

  //$id = $this->createplan_model->getItineraryIdByName2($itineraryNewName);

  $newId = $this->createplan_model->getLatestItineraryId(); //echo $newId[0]->itinerary_id;

  $newUri = base_url() . 'view/itinerary/' . str_replace(' ', '_', $itineraryNewName) . '/' . $newId[0]->itinerary_id;

  $data['success_publish'] = TRUE;

  //echo 'publish success';
  //$this->load->view($newUri);
  redirect($newUri);
}

public function create_pdf() {

 
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
  $notes = $this->input->post('notes');

  $timeframestart = $this->input->post('timeframestart');
  $timeframeend = $this->input->post('timeframeend');

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
  <tr align="center"><td style="font-size: 150%; color: white;">' . 'Alloted Time: ' . $this->input->post('alloted_time_sv') . ' hours &nbsp; Places of Intent: ' . $this->input->post('user_tags_sv') . '&nbsp; Start Time: ' . $this->input->post('start_time_sv') . '&nbsp; Rating: ' . $this->input->post('rating_sv');
/**
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
  **/

  $html .= '</td></tr>
  </table>

  <table  border="0" cellpadding="2" cellspacing="2" nobr="true" style="display: table-cell;text-align: center;vertical-align: middle;">
    <thead style="background-color: #0e4e5c; color:white;">
      <tr>
        <th style="font-weight: bold; background-color: #0e4e5c; color:white;" align="center" scope="col">Timeframe</th>
        <th style="font-weight: bold; background-color: #0e4e5c; color:white;" align="center" scope="col">Image</th>
        <th style="font-weight: bold; background-color: #0e4e5c; color:white;" align="center" scope="col">Name</th>
        <th style="font-weight: bold; background-color: #0e4e5c; color:white;" align="center" scope="col">Description</th>
        <th style="font-weight: bold; background-color: #0e4e5c; color:white;" align="center" scope="col">Sugg. Tour Time</th>
        <th style="font-weight: bold; background-color: #0e4e5c; color:white;" align="center" scope="col">Business Hours</th>
        <th style="font-weight: bold; background-color: #0e4e5c; color:white;" align="center" scope="col">Location</th>
        <th style="font-weight: bold; background-color: #0e4e5c; color:white;" align="center" scope="col">Notes</th>
      </tr>
    </thead>
    <tbody>
  ';

  for ($i = 0; $i < count($itineraryName); $i++) {
    $html .= '
    <tr style="display: table-cell;text-align: center;vertical-align: middle;">
        <td style="background-color: #e3f1f4; color:black;display: table-cell;text-align: center;vertical-align: middle;">' . $timeframestart[$i] . ' - ' . $timeframeend[$i] .'</td>
        <td style="background-color: #e3f1f4; color:black;display: table-cell;text-align: center;vertical-align: middle;"><img style ="" src="' . base_url() . 'assets/wp_content/images/' . str_replace(' ', '_', $itineraryName[$i]) . '.png" alt=""></td>
        <td style="background-color: #e3f1f4; color:black;display: table-cell;text-align: center;vertical-align: middle;">' . $itineraryName[$i] .'</td>
        <td style="background-color: #e3f1f4; color:black;display: table-cell;text-align: center;vertical-align: middle;">' . $itineraryDesc[$i] .'</td>
        <td style="background-color: #e3f1f4; color:black;display: table-cell;text-align: center;vertical-align: middle;">' . $itineraryTourTime[$i] . '</td>
        <td style="background-color: #e3f1f4; color:black;display: table-cell;text-align: center;vertical-align: middle;">' . $itineraryTimeOpen[$i] . ' - ' . $itineraryTimeClosed[$i] . '</td>
        <td style="background-color: #e3f1f4; color:black;display: table-cell;text-align: center;vertical-align: middle;">' . $itineraryLocation[$i] .'</td>
        <td style="background-color: #e3f1f4; color:black;display: table-cell;text-align: center;vertical-align: middle;">' . $notes[$i] .'</td>
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