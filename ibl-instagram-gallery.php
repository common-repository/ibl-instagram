<?php
/*
Plugin Name:  Instagram Photo Gallery  - Wordpress Plugin for Instagram Feeds
Description: Create Instagram Photo Gallery Dynamic for Multiple Account. Instagram Photo Gallery is Display Customizable Instagram Images/Videos Gallery with Lightbox Effect. 
Plugin URI: https://iblinfotech.com/instagram-photo-gallery-wordpress-plugin-for-instagram-feeds/
Author: IBL Infotech
Text Domain: instagram-photo-gallery
Author URI: https://iblinfotech.com/
Version: 1.0.4
*/

if( ! defined('ABSPATH')){
	die;
}

// if( ! defined('DIRPATH')){
// 	define('DIRPATH',site_url());
// }
// if( ! defined('IBLIG_PREFIX')){
// 	define('IBLIG_PREFIX','iblig');
// }

if( ! defined('IBLIG_DOMAIN')){
	define('IBLIG_DOMAIN', 'instagram-photo-gallery');
}
if( ! defined('IBLIG_PATH')){
	define('IBLIG_PATH', plugin_dir_path(__FILE__));
}
if( ! defined('IBLIG_BASENAME')){
	define('IBLIG_BASENAME',plugin_basename(__FILE__));
}
if( ! defined ('PLUGIN_PATH')){
	define('PLUGIN_PATH' , __FILE__);
}
if (! defined('PLUGIN_PATH_DIR')){
	define('PLUGIN_PATH_DIR', untrailingslashit(dirname(PLUGIN_PATH)));
}
define('IBLIG_URL', plugins_url(plugin_basename(dirname(__FILE__))));

// require_once dirname( __FILE__ ) . DIRECTORY_SEPARATOR . 'include' . DIRECTORY_SEPARATOR . 'wp-main.php';
require_once dirname( __FILE__ ) . DIRECTORY_SEPARATOR . 'include' . DIRECTORY_SEPARATOR . 'iblig-db.php';
require_once dirname( __FILE__ ) . DIRECTORY_SEPARATOR . 'user' . DIRECTORY_SEPARATOR . 'iblig-front.php';

add_filter('plugin_row_meta', 'add_gopro_link', 10, 2);

function add_gopro_link($links, $file)
{
	if ( plugin_basename( __FILE__ ) == $file ) {
		$row_meta = array(
			'docs'    => '<a href="' . esc_url( 'https://codecanyon.net/item/instagram-photo-gallery-wordpress-plugin-for-instagram-feeds/22994365' ) . '" target="_blank" aria-label="' . esc_attr__( 'Plugin Additional Links', 'domain' ) . '" style="color:green;font-weight:bold;">' . esc_html__( 'Get Pro', 'domain' ) . '</a>'
			);

		return array_merge( $links, $row_meta );
	}
	return (array) $links;

}

if ( ! class_exists( 'ActivateIBLIGPlugin' ) ) {

	class ActivateIBLIGPlugin{

		public function __construct(){
			add_action('admin_menu',array($this,'settings_page') );
			add_action('admin_enqueue_scripts', array($this,'custom_iblig_styles' ));
			add_action('admin_init',array($this,'iblig_plugin_loaded'));

			

			register_activation_hook( __FILE__, array( 'IBL_IG', 'setup_db' )  );
			register_activation_hook( IBLIG_PATH.'/ibl-instagram-gallery.php', array($this,'iblig_activate' ));
			register_deactivation_hook( IBLIG_PATH.'/ibl-instagram-gallery.php', array($this,'iblig_deactivate'));

		}


		public function settings_page(){    

			add_menu_page( 'Instagram Photo Gallery', 'Instagram Photo Gallery', 'manage_options', 'ibl-instagram-gallery',IBLIG_insta_main, IBLIG_URL .'/img/insta-icon.png',25); 

			// add_menu_page(__('IBL Instagram Gallery', 'ibl-instagram-gallery'), __('IBL Instagram Gallery', 'ibl-instagram-gallery'), 'manage_options', 'ibl-instagram-gallery', array(
        //     $this,
        //     'iblig_plugin_loaded'
        // ));

			// add_submenu_page( 'ibl-insta-settings', 'Settings', 'Settings',
			// 	'manage_options', 'ibl-insta-settings',IBLIG_insta_main);

			// if(get_option( "iblig_settings" ) == 1){

			add_submenu_page( 'ibl-instagram-gallery', 'Gallery', 'Gallery',
				'manage_options', 'ibl-instagram-gallery',IBLIG_insta_main);
			add_submenu_page( 'ibl-instagram-gallery', 'Add new', 'Add new',
				'manage_options', 'ibl-insta-add-new',IBLIG_insta_add_new);
			// }
		}

		public function iblig_plugin_loaded()
		{
			include('admin/iblig-insta-add-new.php');
			// include('admin/iblig-insta-gallery-settings.php');
			include('admin/wp-main.php');			

		}
		public function iblig_deactivate() {
			if ( is_admin() )
				flush_rewrite_rules();
		}



		public function custom_iblig_styles(){
			if(sanitize_key($_GET['page']) == 'ibl-instagram-gallery' || sanitize_key($_GET['page']) == 'ibl-insta-add-new')
			{
			// wp_enqueue_style( 'demo-style-css', plugins_url( '/css/demo-styles.css', __FILE__ ),array(),'');
				wp_enqueue_style( 'ibl-style-css', plugins_url( '/css/styles.css', __FILE__ ),array(),'');

				wp_enqueue_style('ibl-gallery-admin', plugins_url('/css/ibl-admin-style.css',__FILE__) );

				wp_enqueue_style( 'ibl-bootstrap-select-css', plugins_url( '/css/bootstrap-select.min.css', __FILE__ ),array(),'');
				wp_enqueue_style( 'ibl-bootstrap-min-css', plugins_url( '/css/bootstrap.min.css', __FILE__ ),array(),'');
				wp_enqueue_style( 'ibl-datatable-bootstrap-min-css', plugins_url( '/css/dataTables.bootstrap.min.css', __FILE__ ),array(),'');
				wp_enqueue_style('ibl-font-icon-awesome-css',plugins_url('/css/font-awesome.min.css',__FILE__));
				wp_enqueue_style('ibl-bootstrap-toggle-min-css',plugins_url('/css/bootstrap-toggle.min.css',__FILE__));
				wp_enqueue_script( 'ibl-jquery-js', plugins_url(  '/js/jquery.js',__FILE__), array('jquery') , false );

				wp_enqueue_script( 'ibl-bootstrap-select-js', plugins_url(  '/js/bootstrap-select.min.js',__FILE__), array('jquery') , false );
				wp_enqueue_script( 'ibl-bootstrap-js', plugins_url(  '/js/bootstrap.min.js',__FILE__), array('jquery') , false );

				wp_enqueue_script( 'ibl-jquery-datatable-js', plugins_url(  '/js/jquery.dataTables.min.js',__FILE__), array('jquery') , false );
				wp_enqueue_script( 'ibl-datatable-bootstrap-min-js', plugins_url(  '/js/dataTables.bootstrap.min.js',__FILE__), array('jquery') , false );			

				wp_enqueue_script( 'ibl-jquery-validate-js', plugins_url(  '/js/jquery.validate.js',__FILE__), array('jquery') , false );
				wp_enqueue_script( 'ibl-bootstrap-toggle-min-js', plugins_url(  '/js/bootstrap-toggle.min.js',__FILE__), array('jquery') , false );
				wp_enqueue_script( 'ibl-validator-js', plugins_url(  '/js/validator.js',__FILE__), array('jquery') , false );

				wp_enqueue_script( 'ibl-admin-custom-js', plugins_url(  '/js/ibl-admin-custom.js',__FILE__), array('jquery') , false );

				wp_enqueue_script( 'jscolor', plugins_url(  '/js/jscolor.js',__FILE__), array('jquery'), false );

				wp_enqueue_media();
				wp_enqueue_style( 'wp-color-picker');

			}
		}

	}
}
$my_settings_page = new ActivateIBLIGPlugin();
?>