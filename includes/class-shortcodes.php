<?php

/*
* @Author 		ParaTheme
* Copyright: 	2015 ParaTheme
*/

if ( ! defined('ABSPATH')) exit;  // if direct access 

class class_job_bm_locations_shortcodes{
	
    public function __construct(){
		
		add_shortcode( 'location_list', array( $this, 'job_bm_locations_locationlist_display' ) );
		add_shortcode( 'location_single', array( $this, 'job_bm_locations_locationsingle_display' ) );		

   		}
		
		

	public function job_bm_locations_locationlist_display($atts, $content = null ) {
			$atts = shortcode_atts(
				array(
					'themes' => 'flat',
					), $atts);
	
			$html = '';
			$themes = $atts['themes'];
			
			//$job_bm_locations_themes = get_post_meta( $post_id, 'job_bm_locations_themes', true );
			//$job_bm_locations_license_key = get_option('job_bm_locations_license_key');
			
/*
			if(empty($job_bm_locations_license_key))
				{
					return '<b>"'.job_bm_locations_plugin_name.'" Error:</b> Please activate your license.';
				}

*/
			
			$class_job_bm_locations_functions = new class_job_bm_locations_functions();
			$job_bm_locations_locationlist_themes_dir = $class_job_bm_locations_functions->job_bm_locations_locationlist_themes_dir();
			$job_bm_locations_locationlist_themes_url = $class_job_bm_locations_functions->job_bm_locations_locationlist_themes_url();

			
			
			echo '<link  type="text/css" media="all" rel="stylesheet"  href="'.$job_bm_locations_locationlist_themes_url[$themes].'/style.css" >';				

			include $job_bm_locations_locationlist_themes_dir[$themes].'/index.php';				

			return $html;
	
	
		}
		

	public function job_bm_locations_locationsingle_display($atts, $content = null ) {
			$atts = shortcode_atts(
				array(
					'id' => '',				
					'themes' => 'flat',
					), $atts);
					
					
			$location_id = $atts['id'];			
			$job_bm_locations_locationsingle_themes = $atts['themes'];
	
			$html = '';

			
			//$job_bm_locations_themes = get_post_meta( $post_id, 'job_bm_locations_themes', true );
			//$job_bm_locations_license_key = get_option('job_bm_locations_license_key');
			
/*
			if(empty($job_bm_locations_license_key))
				{
					return '<b>"'.job_bm_locations_plugin_name.'" Error:</b> Please activate your license.';
				}
*/
			
			$class_job_bm_locations_functions = new class_job_bm_locations_functions();
			$job_bm_locations_locationsingle_themes_dir = $class_job_bm_locations_functions->job_bm_locations_locationsingle_themes_dir();
			$job_bm_locations_locationsingle_themes_url = $class_job_bm_locations_functions->job_bm_locations_locationsingle_themes_url();

			//var_dump($job_bm_locations_locationsingle_themes_url);
			
			$html.= '<link  type="text/css" media="all" rel="stylesheet"  href="'.$job_bm_locations_locationsingle_themes_url[$job_bm_locations_locationsingle_themes].'/style.css" >';				

			include $job_bm_locations_locationsingle_themes_dir[$job_bm_locations_locationsingle_themes].'/index.php';				

			return $html;
	
	
		}
			
	}
	
	new class_job_bm_locations_shortcodes();