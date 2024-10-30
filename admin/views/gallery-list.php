<?php

if (! defined('ABSPATH')) {

	die();

}

define('IBLIG_URL_ADMIN_PAGE', menu_page_url('ibl-instagram-gallery', false));


// function IBLIG_insta_gallery_settings()

// {



function randomString($length = 6) {

	$str = "";

	$characters = array_merge(range('A','Z'), range('a','z'), range('0','9'));

	$max = count($characters) - 1;

	for ($i = 0; $i < $length; $i++) {

		$rand = mt_rand(0, $max);

		$str .= $characters[$rand];

	}

	return $str;

}



// function addeditgallery() {

// echo "saddddd";

// print_r($_POST);

// die;

// $retrieved_nonce = $_POST['_wpnonce'];
// if (!wp_verify_nonce($retrieved_nonce, 'my_gallery_edit_action' ) ) die( 'Failed security check' );


if ( isset( $_POST["addedit_gallery"] ) != "" && check_admin_referer( 'my_gallery_edit_action', 'mygalleryform' )) {



	$date = date('Y-m-d H:i:s');

	global $table_prefix, $wpdb;

	$tbl_general_setting = "iblig_general_setting";

	$tbl_gallery_setting = "iblig_gallery_setting";

	$tbl_profile_setting = "iblig_profile_setting";

	$tbl_lightbox_setting = "iblig_lightbox_setting";

	$shortcode_id = sanitize_text_field(randomString(6));



	if(empty($_POST['shortcode_id'])){



		$wpdb->insert( 

			$tbl_general_setting, 

			array( 

				'ig_shortcode_id' =>$shortcode_id,

				// 'ig_client_id' =>  $_POST['ig_client_id'],

				// 'ig_secret'=> $_POST['ig_secret'],

				'ig_access_token' => sanitize_text_field($_POST['ig_access_token']),

				// 'ig_redirect_url'=> $_POST['ig_redirect_url'],

				'ig_user_name'=> sanitize_text_field($_POST['ig_user_name']),

				'created_date'=>$date 

				)

			);



		// update_option("iblig_settings","1");



		if($_POST['display_media_for']=='username'){

			$username_tag = sanitize_text_field($_POST['username']);

		}else{

			$username_tag = sanitize_text_field($_POST['userhash']);

		}



		if(intval($_POST['galleryshowas'])==1){

			$no_column = sanitize_text_field($_POST['no_column']);

		}else{

			$no_column = sanitize_text_field($_POST['slide_per_view']);

		}



		$sql = 	$wpdb->insert( 

			$tbl_gallery_setting, 

			array( 

				'ig_shortcode_id' =>$shortcode_id,

				'gallery_title' => sanitize_text_field($_POST['ibl_gallery_title']),

				'display_from' => sanitize_text_field($_POST['display_media_for']),

				'username_tag'=> $username_tag ? $username_tag : sanitize_text_field($_POST['ig_user_name']),

				'sort_media'=> sanitize_text_field($_POST['sort_media']),

				'action_onclick'=> sanitize_text_field($_POST['action_onclick']),

				'redirect_url'=> sanitize_text_field($_POST['redirect_url']),

				'show_type' => sanitize_text_field($_POST['galleryshowas']) ? sanitize_text_field($_POST['galleryshowas']) : 1,

				'no_column'=> $no_column,

				'noof_images_load'=> sanitize_text_field($_POST['media_load']),

				'load_media'=> sanitize_text_field($_POST['more_media_type']),

				'btn_title' => sanitize_text_field($_POST['load_btn_title']),

				'btn_bg_color'=> sanitize_text_field($_POST['load_btn_bg_color']),

				'btn_bg_hover_color'=> sanitize_text_field($_POST['load_btn_bg_hover_color']),

				'btn_text_color'=> sanitize_text_field($_POST['load_btn_text_color']),

				'btn_text_hover_color'=> sanitize_text_field($_POST['load_btn_text_hover_color']),

				'img_resoultion_type'=> sanitize_text_field($_POST['resoultion_type']),

				'image_space'=> sanitize_text_field($_POST['img_margin']),

				'img_hover_effect' => sanitize_text_field($_POST['img_hover_efffect']),

				'img_hover_color' => sanitize_text_field($_POST['img_hover_efffect_color']),

				'display_like' => $_POST['insta_likes'] ? sanitize_text_field($_POST['insta_likes']) : 0,

				'display_comment' => $_POST['insta_comments'] ? sanitize_text_field($_POST['insta_comments']) : 0,

				'autoplay_slides' => sanitize_text_field($_POST['slide_autoplay']),

				'show_nav_arrow' => sanitize_text_field($_POST['slide_nav_arrow']),

				'nav_arrow_color' => sanitize_text_field($_POST['slide_nav_arrow_color']),

				'show_dotted_arrow' => sanitize_text_field($_POST['slide_dot_arrow']),

				'created_date'=>$date 

				)

);  





$wpdb->insert( 

	$tbl_profile_setting, 

	array( 

		'ig_shortcode_id' =>$shortcode_id,

		'show_header' => sanitize_text_field($_POST['show_header']),

		'header_text_color'=> sanitize_text_field($_POST['header_txt_color']),

		'show_username_profile'=> sanitize_text_field($_POST['show_username_img']),

		'profile_border'=> sanitize_text_field($_POST['show_profile_border']),

		'profile_theme'=> sanitize_text_field($_POST['profile_theme']),

		'profile_showas'=> sanitize_text_field($_POST['profile_showas']),

		'show_bio_website'=> sanitize_text_field($_POST['show_user_bio']),

		'show_post_count' =>  sanitize_text_field($_POST['show_post_count']),

		'show_following_count'=>  sanitize_text_field($_POST['show_following_count']),

		'show_follower_count'=> sanitize_text_field($_POST['show_follower_count']),

		'show_follow_button'=> sanitize_text_field($_POST['show_follow_btn']),

		'btn_bg_color'=> sanitize_text_field($_POST['follow_bg_color']),

		'btn_bg_hover_color'=> sanitize_text_field($_POST['follow_bg_hover_color']),

		'btn_text_color'=> sanitize_text_field($_POST['follow_txt_color']),

		'btn_text_hover_color'=> sanitize_text_field($_POST['follow_txt_hover_color']),

		'created_date'=>$date 

		)

	);



$wpdb->insert( 

	$tbl_lightbox_setting, 

	array( 

		'ig_shortcode_id' =>$shortcode_id,

		'full_width' =>  sanitize_text_field($_POST['lightbox_fullwidth']),

		'width'=> sanitize_text_field($_POST['lightbox_width']),

		'height'=> sanitize_text_field($_POST['lightbox_height']),

		'lightbox_effect'=> sanitize_text_field($_POST['lightbox_effect']),

		'autoplay'=> sanitize_text_field($_POST['lightbox_autoplay']),

		'show_caption' =>  sanitize_text_field($_POST['lightbox_caption']),

		'show_nav_button'=> sanitize_text_field($_POST['lightbox_nav']),

		'created_date'=>$date 

		)

	);



}else{



	$wpdb->update( 

		$tbl_general_setting, 

		array( 

			// 'ig_client_id' =>  $_POST['ig_client_id'],

			// 'ig_secret'=> $_POST['ig_secret'],

			'ig_access_token'=> sanitize_text_field($_POST['ig_access_token']),

			'ig_user_name'=> sanitize_text_field($_POST['ig_user_name']),

			// 'created_date'=>$date 

			),

		array('ig_shortcode_id' => sanitize_text_field($_POST['shortcode_id']))

		);





	if($_POST['display_media_for']=='username'){

		$username_tag = sanitize_text_field($_POST['username']);

	}else{

		$username_tag = sanitize_text_field($_POST['userhash']);

	}



	if(intval($_POST['galleryshowas'])==1){

		$no_column = sanitize_text_field($_POST['no_column']);

	}else{

		$no_column = sanitize_text_field($_POST['slide_per_view']);

	}



	$sql = 	$wpdb->update( 

		$tbl_gallery_setting, 

		array( 

			'gallery_title' => sanitize_text_field($_POST['ibl_gallery_title']),

			'display_from' => sanitize_text_field($_POST['display_media_for']),

			'username_tag'=> $username_tag,

			'sort_media'=> sanitize_text_field($_POST['sort_media']),

			'action_onclick'=> sanitize_text_field($_POST['action_onclick']),

			'redirect_url'=> sanitize_text_field($_POST['redirect_url']),

			'show_type' => $_POST['galleryshowas'] ? sanitize_text_field($_POST['galleryshowas']) : 1,

			'no_column'=> $no_column,

			'noof_images_load'=> sanitize_text_field($_POST['media_load']),

			'load_media'=> sanitize_text_field($_POST['more_media_type']),

			'btn_title' => sanitize_text_field($_POST['load_btn_title']),

			'btn_bg_color'=> sanitize_text_field($_POST['load_btn_bg_color']),

			'btn_bg_hover_color'=> sanitize_text_field($_POST['load_btn_bg_hover_color']),

			'btn_text_color'=> sanitize_text_field($_POST['load_btn_text_color']),

			'btn_text_hover_color'=> sanitize_text_field($_POST['load_btn_text_hover_color']),

			'img_resoultion_type'=> sanitize_text_field($_POST['resoultion_type']),

			'image_space'=> sanitize_text_field($_POST['img_margin']),

			'img_hover_effect' => sanitize_text_field($_POST['img_hover_efffect']),

			'img_hover_color' => sanitize_text_field($_POST['img_hover_efffect_color']),

			'display_like' => $_POST['insta_likes'] ? sanitize_text_field($_POST['insta_likes']) : 0,

			'display_comment' => $_POST['insta_comments'] ? sanitize_text_field($_POST['insta_comments']) : 0,

			'autoplay_slides' => sanitize_text_field($_POST['slide_autoplay']),

			'show_nav_arrow' => sanitize_text_field($_POST['slide_nav_arrow']),

			'nav_arrow_color' => sanitize_text_field($_POST['slide_nav_arrow_color']),

			'show_dotted_arrow' => sanitize_text_field($_POST['slide_dot_arrow']),

			// 'created_date'=>$date 

			),

array('ig_shortcode_id' => sanitize_text_field($_POST['shortcode_id']))

);  



$wpdb->update( 

	$tbl_profile_setting, 

	array( 

		'show_header' => sanitize_text_field($_POST['show_header']),

		'header_text_color'=> sanitize_text_field($_POST['header_txt_color']),

		'show_username_profile'=> sanitize_text_field($_POST['show_username_img']),

		'profile_border'=> sanitize_text_field($_POST['show_profile_border']),
		
		'profile_theme'=> sanitize_text_field($_POST['profile_theme']),

		'profile_showas'=> sanitize_text_field($_POST['profile_showas']),

		'show_bio_website'=> sanitize_text_field($_POST['show_user_bio']),

		'show_post_count' =>  sanitize_text_field($_POST['show_post_count']),

		'show_following_count'=>  sanitize_text_field($_POST['show_following_count']),

		'show_follower_count'=> sanitize_text_field($_POST['show_follower_count']),

		'show_follow_button'=> sanitize_text_field($_POST['show_follow_btn']),

		'btn_bg_color'=> sanitize_text_field($_POST['follow_bg_color']),

		'btn_bg_hover_color'=> sanitize_text_field($_POST['follow_bg_hover_color']),

		'btn_text_color'=> sanitize_text_field($_POST['follow_txt_color']),

		'btn_text_hover_color'=> sanitize_text_field($_POST['follow_txt_hover_color']),

		// 'created_date'=>$date 

		),

	array('ig_shortcode_id' => sanitize_text_field($_POST['shortcode_id']))

	);



$wpdb->update( 

	$tbl_lightbox_setting, 

	array( 

		'full_width' =>  sanitize_text_field($_POST['lightbox_fullwidth']),

		'width'=> sanitize_text_field($_POST['lightbox_width']),

		'height'=>sanitize_text_field($_POST['lightbox_height']),

		'lightbox_effect'=> sanitize_text_field($_POST['lightbox_effect']),

		'autoplay'=> sanitize_text_field($_POST['lightbox_autoplay']),

		'show_caption' =>  sanitize_text_field($_POST['lightbox_caption']),

		'show_nav_button'=> sanitize_text_field($_POST['lightbox_nav']),

		// 'created_date'=>$date 

		),

	array('ig_shortcode_id' => sanitize_text_field($_POST['shortcode_id']))

	);

}

header('Location: '.$_SERVER['REQUEST_URI']);



}



if (isset($_GET['iblig_delete'])) {

	global $table_prefix, $wpdb;

	$tbl_general_setting = "iblig_general_setting";

	$tbl_gallery_setting = "iblig_gallery_setting";

	$tbl_profile_setting = "iblig_profile_setting";

	$tbl_lightbox_setting = "iblig_lightbox_setting";



	$delid = $_GET['iblig_delete'];



	$wpdb->delete(

		$tbl_general_setting,

		array('ig_shortcode_id' => $delid)

		);

	$wpdb->delete(

		$tbl_gallery_setting,

		array('ig_shortcode_id' => $delid)

		);

	$wpdb->delete(

		$tbl_profile_setting,

		array('ig_shortcode_id' => $delid)

		);

	$wpdb->delete(

		$tbl_lightbox_setting,

		array('ig_shortcode_id' => $delid)

		);

	header('Location: '.$_SERVER['REQUEST_URI']);



}





global $wpdb;

$iblig_list = $wpdb->get_results("SELECT * FROM `iblig_gallery_setting` ");

?>

<h2 id="settings_ibl_title">Gallery Settings</h2>



<p>

	<a href="<?php echo esc_url(IBLIG_URL_ADMIN_PAGE); ?>&pg=add" title="<?php _e('Add New Gallery','ibl-instagram-gallery'); ?>" class="iblig-btnp"><?php esc_html_e('Add New Gallery','ibl-instagram-gallery'); ?></a>

</p>



<div>

	<table class="widefat ig-gallery-list">

		<thead>

			<tr>

				<th></th>

				<th><?php esc_html_e('Title','ibl-instagram-gallery'); ?></th>

				<th><?php esc_html_e('Username','ibl-instagram-gallery'); ?></th>

				<th><?php esc_html_e('Shortcode','ibl-instagram-gallery'); ?></th>

				<th><?php esc_html_e('Action','ibl-instagram-gallery'); ?></th>

			</tr>

		</thead>

		<tbody>

			<?php $i = 1;



			foreach($iblig_list as $k => $list){

				?>

				<tr>

					<td><?php echo esc_html($i++); ?></td>

					<td><?php echo esc_html($list->gallery_title); ?></td>

					<td>

						<?php



						if ($list->display_from == 'username') {

							echo esc_html($list->username_tag ? $list->username_tag : "");

						} else {

							echo 'Hashtag / ' .  esc_html($list->username_tag ? $list->username_tag : "");

						}

						?>

					</td>

					<td>

						<input type="text" value='[ibl-instagram-gallery id="<?php echo $list->ig_shortcode_id; ?>"]' readonly="readonly" style="width: 90%;">

					</td>

					<td><a title="Edit" href="<?php echo  esc_url(IBLIG_URL_ADMIN_PAGE); ?>&pg=edit&iblig_id=<?php echo $list->ig_shortcode_id; ?>" class="btn btn-primary actionbtn"><span class="fa fa-pencil-square-o"></span></a>

						<a title="Delete" href="<?php echo esc_url(IBLIG_URL_ADMIN_PAGE); ?>&iblig_delete=<?php echo $list->ig_shortcode_id; ?>" class="btn btn-danger actionbtn"><span class="fa fa-trash"></span></a></td>

					</tr>

					<?php } unset($i); ?>

				</tbody>

			</table>

		</div>

		<br />

		<hr />



		<?php



		// }

		?>



