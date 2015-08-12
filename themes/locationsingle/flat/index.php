<?php

/*
* @Author 		ParaTheme
* Copyright: 	2015 ParaTheme
*/

if ( ! defined('ABSPATH')) exit;  // if direct access

	
	$job_bm_locations_map_type = get_option('job_bm_locations_map_type');
	$job_bm_locations_map_zoom = get_option('job_bm_locations_map_zoom');	
	
	$location_post_data = get_post($location_id);
	
	$job_bm_location_country_code = get_post_meta($location_id,'job_bm_location_country_code', true);	
	$job_bm_location_latlang = get_post_meta($location_id,'job_bm_location_latlang', true);
	
	
	$job_bm_location_latlang = explode(',',$job_bm_location_latlang);
	$job_bm_location_latlang['lat'] =$job_bm_location_latlang[0];
	$job_bm_location_latlang['lng'] =$job_bm_location_latlang[1];	
	
	//var_dump($job_bm_location_latlang);
	
	
	
	$html .= '<div class="location-single">';	
	
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
        src="https://maps.googleapis.com/maps/api/js?signed_in=true&callback=initMap"></script>
	
	';	
	
		
	$html .= '<div class="logo"><img src="'.job_bm_locations_plugin_url.'/themes/locationsingle/flat/images/map.png" /></div>';
	
	
	$class_job_bm_locations_functions = new class_job_bm_locations_functions();
	$job_bm_locations_country_list = $class_job_bm_locations_functions->job_bm_locations_country_list();
	

	
	
	
	
	
	
	$html .= '<div class="name">'.$location_post_data->post_title.'<span class="country">'.$job_bm_locations_country_list[$job_bm_location_country_code].'</span></div>';	
	$html .= '<div class="content">'.wpautop($location_post_data->post_content).'</div>';		
	
	$html .= '</div>'; 	




	

