<?php
/*
Plugin Name: Job Board Manager - Locations
Plugin URI: http://paratheme.com
Description: Awesome location single page and display job list under any location via single page.
Version: 1.0.0
Author: paratheme
Author URI: http://paratheme.com
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/

if ( ! defined('ABSPATH')) exit;  // if direct access 


class JobBoardManagerLocations{
	
	public function __construct(){
	
	define('job_bm_locations_plugin_url', WP_PLUGIN_URL . '/' . plugin_basename( dirname(__FILE__) ) . '/' );
	define('job_bm_locations_plugin_dir', plugin_dir_path( __FILE__ ) );
	define('job_bm_locations_wp_url', 'https://wordpress.org/plugins/job-board-manager/' );
	define('job_bm_locations_wp_reviews', 'http://wordpress.org/support/view/plugin-reviews/job-board-manager' );
	define('job_bm_locations_pro_url','http://paratheme.com/' );
	define('job_bm_locations_demo_url', 'http://paratheme.com/demo/job-board-manager/' );
	define('job_bm_locations_conatct_url', 'http://paratheme.com/contact/' );
	define('job_bm_locations_qa_url', 'http://paratheme.com/qa/' );
	define('job_bm_locations_plugin_name', 'Job Board Manager' );
	define('job_bm_locations_plugin_version', '1.0.0' );
	define('job_bm_locations_customer_type', 'free' );	 // pro & free	
	define('job_bm_locations_share_url', 'https://wordpress.org/plugins/job-board-manager/' );
	define('job_bm_locations_tutorial_video_url', '//www.youtube.com/embed/YXwUFSU23iU?rel=0' );

	// Class
	require_once( plugin_dir_path( __FILE__ ) . 'includes/class-post-types.php');	
	require_once( plugin_dir_path( __FILE__ ) . 'includes/class-post-meta.php');	
	require_once( plugin_dir_path( __FILE__ ) . 'includes/class-shortcodes.php');	
	require_once( plugin_dir_path( __FILE__ ) . 'includes/class-functions.php');
	require_once( plugin_dir_path( __FILE__ ) . 'includes/class-settings.php');		

	// Function's
	require_once( plugin_dir_path( __FILE__ ) . 'includes/functions.php');

	add_action( 'admin_enqueue_scripts', 'wp_enqueue_media' );
	add_action( 'wp_enqueue_scripts', array( $this, 'job_bm_locations_front_scripts' ) );
	add_action( 'admin_enqueue_scripts', array( $this, 'job_bm_locations_admin_scripts' ) );
	
	}
	
	public function job_bm_locations_install(){
		
		do_action( 'job_bm_locations_action_install' );
		}		
		
	public function job_bm_locations_uninstall(){
		
		do_action( 'job_bm_locations_action_uninstall' );
		}		
		
	public function job_bm_locations_deactivation(){
		
		do_action( 'job_bm_locations_action_deactivation' );
		}
		
	public function job_bm_locations_front_scripts(){
		
		wp_enqueue_script('jquery');

		wp_enqueue_style('job_bm_locations_style', job_bm_locations_plugin_url.'css/style.css');
		
		wp_enqueue_style('font-awesome', job_bm_locations_plugin_url.'css/font-awesome.css');
		//ParaAdmin
		wp_enqueue_style('ParaAdmin', job_bm_locations_plugin_url.'ParaAdmin/css/ParaAdmin.css');
		wp_enqueue_script('ParaAdmin', plugins_url( 'ParaAdmin/js/ParaAdmin.js' , __FILE__ ) , array( 'jquery' ));		
		
		}

	public function job_bm_locations_admin_scripts(){
		
		wp_enqueue_script('jquery');
		wp_enqueue_script('jquery-ui-core');
		wp_enqueue_script('jquery-ui-autocomplete');		

		wp_enqueue_script('job_bm_locations_admin_js', plugins_url( '/admin/js/scripts.js' , __FILE__ ) , array( 'jquery' ));
		wp_localize_script( 'job_bm_locations_admin_js', 'job_bm_locations_ajax', array( 'job_bm_locations_ajaxurl' => admin_url( 'admin-ajax.php')));
		wp_enqueue_style('job_bm_locations_admin_style', job_bm_locations_plugin_url.'admin/css/style.css');

		//ParaAdmin
		wp_enqueue_style('ParaAdmin', job_bm_locations_plugin_url.'ParaAdmin/css/ParaAdmin.css');		
		wp_enqueue_script('ParaAdmin', plugins_url( 'ParaAdmin/js/ParaAdmin.js' , __FILE__ ) , array( 'jquery' ));

		}
	
	
	
	
	}

new JobBoardManagerLocations();