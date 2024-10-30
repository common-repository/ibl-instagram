<?php
if (! defined('ABSPATH')) {
	die();
}
define('IBLIG_URL_ADMIN_PAGE', menu_page_url('ibl-instagram-gallery', false));
$id = sanitize_text_field($_GET['iblig_id']);
$pg = sanitize_title($_GET['pg']);

global $wpdb;
if (isset($id) && !empty($id)) {
	$wp_gallery_setting = $wpdb->get_results("SELECT * FROM `iblig_gallery_setting` where ig_shortcode_id='".$id."' ");
	$gallery_setting = $wp_gallery_setting[0];

	$wp_api_setting = $wpdb->get_results("SELECT * FROM `iblig_general_setting` where ig_shortcode_id='".$id."' ");
	$api_setting = $wp_api_setting[0];

	$wp_profile_setting = $wpdb->get_results("SELECT * FROM `iblig_profile_setting` where ig_shortcode_id='".$id."' ");
	$profile_setting = $wp_profile_setting[0];

	$wp_lightbox_setting = $wpdb->get_results("SELECT * FROM `iblig_lightbox_setting` where ig_shortcode_id='".$id."' ");
	$lightbox_setting = $wp_lightbox_setting[0];

}



// $json['status'] = 1;
// die(json_encode($json));

// }

// add_action( 'wp_ajax_addeditgallery','addeditgallery' );
// add_action( 'wp_ajax_nopriv_addeditgallery','addeditgallery' );


?>
<div class="update-nag wdi_help_bar_wrap" style="display:block;">
	<span class="wdi_help_bar_text">
		This section allows you to set API parameters. <a style="color: #5CAEBD; text-decoration: none;border-bottom: 1px dotted;" class="wdi_hb_t_link" target="_blank" href="https://www.instagram.com/developer/clients/register/">Read More in User Guide</a>
	</span>
</div>

<p style="margin-top: 20px;">
	<a href="<?php echo esc_url(IBLIG_URL_ADMIN_PAGE); ?>" title="<?php _e('View Galleries List','ibl-instagram-gallery'); ?>" class="iblig-btnp"><span class="dashicons dashicons-arrow-left-alt"></span><span>Back to List</span></a>
</p>



<!-- Exifography sortable fix  -->
<form method="post" class="addeditform" name="form2" action="<?php echo esc_url(IBLIG_URL_ADMIN_PAGE); ?>">
<?php wp_nonce_field('my_gallery_edit_action','mygalleryform'); ?>
	<div class="ibl-page-header">
		<h1 class="ibl-heading">Gallery Title</h1>
		<input id="ibl_gallery_title" value="<?php echo esc_html($gallery_setting->gallery_title ? $gallery_setting->gallery_title : ''); ?>" class="ibl_gallery_title" name="ibl_gallery_title" type="text" placeholder="Enter title here" required style=" width: 50%;padding:10px 5px !important;">
		<div class="ibl_buttons">
			<div ><input type="submit" value="Update" class="iblig-btnp addedit_gallery" name="addedit_gallery" style="border: 1px solid #e4405f;"></div>
		</div>
	</div>

	<input type="hidden" class="hiddensiteurl" value="<?php echo esc_url(IBLIG_URL); ?>">
	<input type="hidden" class="hiddenurl" name="shortcode_id" value="<?=$gallery_setting->ig_shortcode_id ? $gallery_setting->ig_shortcode_id : ''?>">
	<input type="hidden" class="adminurl" value="<?php echo admin_url('admin-ajax.php'); ?>">
	<input type="hidden" class="listurl" value="<?php echo esc_url(IBLIG_URL_ADMIN_PAGE); ?>">
	


	<input id="tab1" type="radio" name="tabs" class="tabradio" value="1" checked>
	<label for="tab1" class="ibltablbl">API Setting</label>

	<input id="tab2" type="radio" name="tabs" class="tabradio" value="2">
	<label for="tab2" class="ibltablbl">Gallery Setting</label>

	<input id="tab3" type="radio" name="tabs" class="tabradio" value="3">
	<label for="tab3" class="ibltablbl">Instgram Profile Setting</label>

	<input id="tab4" type="radio" name="tabs" class="tabradio" value="4">
	<label for="tab4" class="ibltablbl">Lightbox Setting</label>

	<section id="apisetting" class="tabsection" class="tabradio" style="padding:0px !important;">

		<div class="col-md-12 col-sm-12">
			<div class="panel-group wrap">

				<?php include 'iblig-insta-settings.php'; ?>


			</div>
		</div>

	</section>


	<section id="gallerycontent" class="tabsection" class="tabradio">

		<div class="col-md-12 col-sm-12">
			<div class="panel-group wrap">

				<?php include 'gallery-content.php'; ?>


			</div>
		</div>

	</section>

	<section id="profilecontent" class="tabsection">
		
		<div class="col-md-12 col-sm-12">
			<div class="panel-group wrap">

				<?php include 'profile-content.php'; ?>


			</div>
		</div>
	</section>


	<section id="lightboxcontent" class="tabsection">
		<div class="col-md-12 col-sm-12">
			<div class="panel-group wrap">

				<?php include 'lightbox-content.php'; ?>


			</div>
		</div>
	</section>


</form>