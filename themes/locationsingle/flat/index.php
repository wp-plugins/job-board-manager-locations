<?php

/*
* @Author 		ParaTheme
* Copyright: 	2015 ParaTheme
*/

if ( ! defined('ABSPATH')) exit;  // if direct access

	
	$job_bm_locations_map_type = get_option('job_bm_locations_map_type');
	$job_bm_locations_map_zoom = get_option('job_bm_locations_map_zoom');	
	
	if(empty($job_bm_locations_map_type)){
		
		$job_bm_locations_map_type = 'static';
		}
	
	
	
	
	$location_post_data = get_post($location_id);
	
	$job_bm_location_country_code = get_post_meta($location_id,'job_bm_location_country_code', true);	
	$job_bm_location_latlang = get_post_meta($location_id,'job_bm_location_latlang', true);
	
	
	$job_bm_location_latlang = explode(',',$job_bm_location_latlang);
	$job_bm_location_latlang['lat'] =$job_bm_location_latlang[0];
	$job_bm_location_latlang['lng'] =$job_bm_location_latlang[1];	
	
	//var_dump($job_bm_location_latlang);
	
	
	
	$html .= '<div class="location-single">';	
	
	if($job_bm_locations_map_type=='dynamic'){
		
	$html .= '<div class="map-container"><div id="map"></div></div>';
	$html .= '<script>

function initMap() {
  var myLatLng = {lat: '.$job_bm_location_latlang['lat'].', lng: '.$job_bm_location_latlang['lng'].'};

  var map = new google.maps.Map(document.getElementById("map"), {
    zoom: '.$job_bm_locations_map_zoom.',
    center: myLatLng
  });

  var marker = new google.maps.Marker({
    position: myLatLng,
    map: map,
    title: "Hello World!"
  });
}

    </script>
	
	
<script async defer
        src="https://maps.googleapis.com/maps/api/js?signed_in=true&callback=initMap"></script>';
		}
	elseif($job_bm_locations_map_type=='static'){
		
		$html .= '<div class="map-container"><div id="map"><img src="https://maps.googleapis.com/maps/api/staticmap?center='.$job_bm_location_latlang['lat'].','.$job_bm_location_latlang['lng'].'&zoom='.$job_bm_locations_map_zoom.'&size=1000x300&markers=color:red|label:C|'.$job_bm_location_latlang['lat'].','.$job_bm_location_latlang['lng'].'"/></div></div>';
		}
	
	

	
	
	
	
	
		
	$html .= '<div class="logo"><img src="'.job_bm_locations_plugin_url.'/themes/locationsingle/flat/images/map.png" /></div>';
	
	
	$class_job_bm_locations_functions = new class_job_bm_locations_functions();
	$job_bm_locations_country_list = $class_job_bm_locations_functions->job_bm_locations_country_list();
	

	$html .= '<div class="name">'.$location_post_data->post_title.'<span class="country">'.$job_bm_locations_country_list[$job_bm_location_country_code].'</span></div>';	
	
	$location_content = $location_post_data->post_content;
	
	if(empty($location_content)){
		
		$job_bm_display_wiki_content = get_option('job_bm_display_wiki_content');
		
		if(!empty($job_bm_display_wiki_content) && $job_bm_display_wiki_content=='yes'){
			
				$wiki_content_json = json_decode(file_get_contents('https://en.wikipedia.org/w/api.php?action=query&prop=extracts&format=json&exintro=&titles='.str_replace(' ','_',$location_post_data->post_title)),true);
		
				 
				foreach($wiki_content_json['query'] as $query){
		
					foreach($query as $normalized){
						
							$page_content = $normalized['extract'];
						}
					}
				
				//var_dump($wiki_content_json);
				//var_dump($wiki_content_json['query']['pages']['56656']['extract']);
			
				$html .= '<div class="content"><strong>'.__('Source:','job_bm_location').' wikipedia.org</strong><br/>'.$page_content.'</div>';	
			
			}
		else{
			
			$html .= '<div class="content"></div>';	
			}
		
		

		}
	else{
		$html .= '<div class="content">'.wpautop($location_content).'</div>';	
		}
	
	
	
	
	
	
	$html .= '<div class="job-list-header">'.__('Jobs available from - '.$location_post_data->post_title.'','job_bm_locations').'</div>';		
	$html .= do_shortcode('[job_list meta_keys="job_bm_location" location="'.$location_post_data->post_title.'"]');
		
		
		
	$html .= '</div>'; 	




	

