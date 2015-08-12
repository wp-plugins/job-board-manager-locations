<?php

/*
* @Author 		ParaTheme
* Copyright: 	2015 ParaTheme
*/

if ( ! defined('ABSPATH')) exit;  // if direct access 


class class_job_bm_locations_settings  {
	
	
    public function __construct(){

		//add_action( 'admin_menu', array( $this, 'admin_menu' ), 12 );
		add_filter('job_bm_settings_options',array( $this, 'job_bm_locations_settings_options_extra'));
		
    }
	

	public function admin_menu() {
		
		add_submenu_page( 'edit.php?post_type=job', __( 'Settings', 'job_bm_locations' ), __( 'Settings', 'job_bm_locations' ), 'manage_options', 'job_bm_locations-settings', array( $this, 'settings_page' ) );
		
		do_action( 'job_bm_locations_action_admin_menus' );
		
	}
	
	public function settings_page(){
		
		include( 'menu/settings.php' );
		}
	

// ############### Filter for settings_options ###################

function job_bm_locations_settings_options_extra($options){
	
	$options['Company extra'] = array(
								'job_bm_location_extra'=>array(
									'css_class'=>'location_extra',					
									'title'=>'Location _extra',
									'option_details'=>'Job Location _extra',						
									'input_type'=>'text', // text, radio, checkbox, select, 
									'input_values'=>'Dhaka_extra', // could be array
									),
								);
	return $options;
		
	}


	}


new class_job_bm_locations_settings();

