<?php
if (! defined('ABSPATH')) {
	die();
}
add_action('wp_enqueue_scripts', 'iblig_enqueue_scripts');

function iblig_enqueue_scripts()

{

	wp_enqueue_style('ibl-gallery-user', IBLIG_URL . '/css/ibl-user-style.css',array(),'');

	wp_enqueue_style('ibl-lightgallery-css', IBLIG_URL . '/css/lightgallery.css',array(),'');
	wp_enqueue_style('ibl-lg-transitions-css', IBLIG_URL . '/css/lg-transitions.css',array(),'');
	wp_enqueue_style('ibl-video-js-css', IBLIG_URL . '/css/video-js.css',array(),'');
	wp_enqueue_style('ibl-carousel-css', IBLIG_URL . '/css/owl.carousel.css',array(),'');
	wp_enqueue_style('ibl-font-icon-awesome-css', IBLIG_URL . '/css/font-awesome.min.css',array(),'');

	
// wp_enqueue_style('ibl-owl-theme-css', IBLIG_URL . '/css/owl.theme.default.css',array(),'');

	wp_enqueue_script('ibl-jquery-js', IBLIG_URL . '/js/jquery.js',array(),'');

	wp_enqueue_script('ibl-picturefill-js', IBLIG_URL . '/js/picturefill.min.js', array('jquery'), false);

	wp_enqueue_script('ibl-mousewheel-js', IBLIG_URL . '/js/jquery.mousewheel.min.js',array(),'');

	wp_enqueue_script('ibl-lg-video-js', IBLIG_URL . '/js/video.js',array(),'');

	wp_enqueue_script('ibl-lightgallery-js', IBLIG_URL . '/js/lightgallery-all.min.js',array(),'');
	
	wp_enqueue_script('ibl-froo-js', IBLIG_URL . '/js/froogaloop2.min.js',array(),'');

	wp_enqueue_script('ibl-user-js', IBLIG_URL . '/js/ibl-user-custom.js', array(
		'jquery'
		), false);

	wp_enqueue_script('ibl-owl-carousel-js', IBLIG_URL . '/js/owl.carousel.js', array(
		'jquery'
		), false);



	wp_localize_script('ibl-instagram-gallery', 'ibligajax', array(
		'ajax_url' => admin_url('admin-ajax.php')
		));

}



function rudr_instagram_api_curl_connect( $api_url ){

	$connection_c = curl_init(); // initializing

	curl_setopt( $connection_c, CURLOPT_URL, $api_url ); // API URL to connect

	curl_setopt( $connection_c, CURLOPT_RETURNTRANSFER, 1 ); // return the result, do not print

	curl_setopt( $connection_c, CURLOPT_TIMEOUT, 60 );

	$json_return = curl_exec( $connection_c ); // connect and get json data

	curl_close( $connection_c ); // close connection

	return json_decode( $json_return ); // decode and return

}



function getdata($ibligid)

{

	global $wpdb;

	$wp_api_setting = $wpdb->get_results("SELECT * FROM `iblig_general_setting` where ig_shortcode_id='".$ibligid."' ");

	$result['api_setting'] = $wp_api_setting[0];



	$wp_gallery_setting = $wpdb->get_results("SELECT * FROM `iblig_gallery_setting` where ig_shortcode_id='".$ibligid."' ");

	$result['gallery_setting'] = $wp_gallery_setting[0];



	$wp_profile_setting = $wpdb->get_results("SELECT * FROM `iblig_profile_setting` where ig_shortcode_id='".$ibligid."' ");

	$result['profile_setting'] = $wp_profile_setting[0];



	$wp_lightbox_setting = $wpdb->get_results("SELECT * FROM `iblig_lightbox_setting` where ig_shortcode_id='".$ibligid."' ");

	$result['lightbox_setting'] = $wp_lightbox_setting[0];

	return $result;

}



function iblig_gallery($atts,$flag='',$ibligid='',$url='')

{
	
	if(!is_admin()) {

		if (empty($atts) || ! isset($atts['id'])) {

			return;

		}



		$ibligid = $atts['id'];

		$getdata = getdata($ibligid);



		$count = $getdata['gallery_setting']->noof_images_load;

		$count = $count + 1;

		if($getdata['gallery_setting']->show_type==2){

			$count = 33;

		}



		if($getdata['gallery_setting']->display_from == 'username'){



			$result = rudr_instagram_api_curl_connect('https://api.instagram.com/v1/users/self/media/recent/?access_token='.$getdata['api_setting']->ig_access_token.'&count='.$count);



		}
	// else if($getdata['gallery_setting']->display_from == 'userhash'){

	// 	$result = rudr_instagram_api_curl_connect('https://api.instagram.com/v1/tags/'.$getdata['gallery_setting']->username_tag.'/media/recent/?access_token='.$getdata['api_setting']->ig_access_token.'&count=' . $count);



	// }

		if($getdata['profile_setting']->show_header == 1){



			$presult = rudr_instagram_api_curl_connect('https://api.instagram.com/v1/users/self/?access_token='.$getdata['api_setting']->ig_access_token);

			$k1 = $presult->data;



		// if($getdata['gallery_setting']->display_from == 'userhash'){

		// 	$presult = rudr_instagram_api_curl_connect('https://api.instagram.com/v1/tags/'.$getdata['gallery_setting']->username_tag.'?access_token='.$getdata['api_setting']->ig_access_token);

		// 	$k1->hashpost = $presult->data;

		// }

		}



		$results = load_iblig_gallery($ibligid,$result,$k1);



		return $results;

	}

}

add_shortcode('ibl-instagram-gallery', 'iblig_gallery');



function load_iblig_gallery($ibligid,$result,$k1)

{

	$getdata = getdata($ibligid);

	$next_url = isset($result->pagination->next_url) ? $result->pagination->next_url : "";



	$medialimit = $getdata['gallery_setting']->noof_images_load;



	if($getdata['gallery_setting']->img_hover_effect == 1){

		$imghovercolor = $getdata['gallery_setting']->img_hover_color;

	}else{

		$imghovercolor = '';

	}



	$btn_bg_color = $getdata['gallery_setting']->btn_bg_color;

	$btn_bg_hover_color = $getdata['gallery_setting']->btn_bg_hover_color;

	$btn_text_color = $getdata['gallery_setting']->btn_text_color;

	$btn_text_hover_color = $getdata['gallery_setting']->btn_text_hover_color;



	$img_margin = $getdata['gallery_setting']->image_space;

	$item = $getdata['gallery_setting']->no_column;

	$caption = $getdata['lightbox_setting']->show_caption;

	$data = common_fun($getdata,$k1,$result);

	$customredirect = $data['customredirect'];
	$customredirectflag = $data['customredirectflag'];

	$lightboxid = $data['lightboxid'];
	$k = $data['k'];
	$flag = $data['flag'];

	$hiddenval = [];
	$hiddenval2 = [];
	$hiddenval['ibligid'] = $ibligid;
	$hiddenval['autoplay'] = $getdata['lightbox_setting']->autoplay;
	$hiddenval['prevnextbtn'] = $getdata['lightbox_setting']->show_nav_button;
	$hiddenval['lightboxeffect'] = $getdata['lightbox_setting']->lightbox_effect;
	$hiddenval['autoplay_progressbar'] = $getdata['lightbox_setting']->autoplay_progressbar;
	$hiddenval['lightbox_thumb'] = $getdata['lightbox_setting']->lightbox_thumb;
	$hiddenval['lightbox_fullscreen'] = $getdata['lightbox_setting']->lightbox_fullscreen;
	$hiddenval['download_media'] = $getdata['lightbox_setting']->download_media;
	$hiddenval['lightbox_loop'] = $getdata['lightbox_setting']->lightbox_loop;
	$hiddenval['show_pagination'] = $getdata['lightbox_setting']->show_pagination;
	$hiddenval['lightbox_zoom'] = $getdata['lightbox_setting']->lightbox_zoom;
	$hiddenval['lightbox_share'] = $getdata['lightbox_setting']->lightbox_share;
	$hiddenval['lightbox_mousedrag'] = $getdata['lightbox_setting']->lightbox_mousedrag;
	$hiddenval['nexturl'] = $next_url;
	$hiddenval['baseurl'] = admin_url();


	$hiddenval2['cautoplay'] = $getdata['gallery_setting']->autoplay_slides;
	$hiddenval2['show_nav_arrow'] = $getdata['gallery_setting']->show_nav_arrow;
	$hiddenval2['show_dotted_arrow'] = $getdata['gallery_setting']->show_dotted_arrow;
	$hiddenval2['item'] = $item;

	$hiddenvalc = array_merge($hiddenval,$hiddenval2);

	include('css/front.php');
	iblig_htmlentities($k1,$getdata);
	
	if($getdata['gallery_setting']->show_type==1){
		foreach ($hiddenval as $hkey => $hidden) {
			echo '<input type="hidden" value="'.esc_html($hidden).'" class="'.esc_html($hkey).'">';
		}
		include('gallery-view.php');
	}else{
		foreach ($hiddenvalc as $hkey => $hidden) {
			echo '<input type="hidden" value="'.esc_html($hidden).'" class="'.esc_html($hkey).'">';
		}

		include('carousel-view.php');
	}

}

add_action('wp_ajax_load_more_data', 'load_more_data');
add_action('wp_ajax_nopriv_load_more_data', 'load_more_data');

function load_more_data()
{
	$url = isset($_POST['url']) ? $_POST['url'] : "";
	$ibligid =isset($_POST['ibligid']) ? $_POST['ibligid'] : "" ;
	$flag = isset($_POST['flag']) ? $_POST['flag'] : "" ;
	$result = getdata($ibligid);

	$presult = rudr_instagram_api_curl_connect('https://api.instagram.com/v1/users/self/?access_token='.$result['api_setting']->ig_access_token);
	$k1 = $presult->data;

	common_fun($result,$k1);

	if($result['gallery_setting']->display_from == 'username'){
		$result['data'] = rudr_instagram_api_curl_connect($url);

	}
	// else if($result['gallery_setting']->display_from == 'userhash'){
	// 	$result['data'] = rudr_instagram_api_curl_connect($url);
	// }
	$max_id = $result['data']->pagination->next_max_id;
	$next_url = $result['data']->pagination->next_url;

	if($result['gallery_setting']->img_hover_effect == 1){
		$imghovercolor = $result['gallery_setting']->img_hover_color;
	}else{
		$imghovercolor = '';
	}

	$btn_bg_color = $result['gallery_setting']->btn_bg_color;
	$btn_bg_hover_color = $result['gallery_setting']->btn_bg_hover_color;
	$btn_text_color = $result['gallery_setting']->btn_text_color;
	$btn_text_hover_color = $result['gallery_setting']->btn_text_hover_color;

	$img_margin = $result['gallery_setting']->image_space;
	$caption = $result['lightbox_setting']->show_caption;

	if($flag==1){
		include('ajax-gallery-view.php');
	}else if($flag==2){
		include('ajax-carousel-view.php');
	}
	die;

}

function common_fun($getdata,$k,$result="")
{

	if($getdata['gallery_setting']->action_onclick == 1){
		$data['lightboxid'] = 'ibliglightgallery';
		$data['customredirect'] = '';
		$data['customredirectflag'] = 1;
	}else if($getdata['gallery_setting']->action_onclick == 2){
		$data['lightboxid'] = '';		
		$data['customredirect'] = '';
		$data['customredirectflag'] = 2;
	}else if($getdata['gallery_setting']->action_onclick == 3){
		$data['lightboxid'] = '';
		$data['customredirect'] = 'onclick="window.open(\''.$getdata['gallery_setting']->redirect_url.'\')"';
		$data['customredirectflag'] = 1;
	}else if($getdata['gallery_setting']->action_onclick == 4){
		$data['lightboxid'] = '';
		$data['customredirect'] = '';
		$data['customredirectflag'] = 1;
	}

	if(!empty($result)){
		if(isset($result->data)) {
			$data['k'] = $result->data;
			$data['flag']=1;
		}else{
			$data['k'] = $result;
			$data['flag']=2;
		}
	}

	return $data;
}

function commonlikecomment($getdata,$value,$customredirect,$customredirectflag){

	$html = '<span class="iblig-likescomments">';
	if($getdata['gallery_setting']->display_like==1){ 

		$html .= '<span class="lcspan"><i class="fa fa-heart"></i>'.$value->likes->count.'</span>';
	} 
	if($getdata['gallery_setting']->display_comment==1){ 
		$html .= '<span class="lcspan"><i class="fa fa-comment"></i>'.$value->comments->count.'</span>';
	} 
	if($customredirectflag == 2){ 
		$html .= '<span class="iblig-instalink"><a '.$customredirect.'><i class="fab fa-instagram"></i></a></span>';
	} 
	$html .= '</span>';
	return $html;
}

function iblig_htmlentities($k1,$getdata)
{

	if(!empty($k1)) {
		if($getdata['profile_setting']->profile_theme == 2 ){

			$html2 = '<div class="mainiblgallery">
			<div class="iblig-gallery"><div class="profile">

			<div class="profile-image">

				<img class="iblig_user_img" src="'.$k1->profile_picture.'" alt="user image">

			</div>

			<div class="profile-user-settings">

				<a href="https://www.instagram.com/"'.$k1->username.'" target="_blank
					"><h1 class="profile-user-name iblig_profilename">'.$k1->username.'</h1></a>

					<a class="iblig-follow-btn iblig_follow siblig_follow" href="http://instagram.com/'.$k1->username.'"  target="_blank">Follow</a>
				</div>

				<div class="profile-stats">

					<ul>
						<li class="spostcount"><span class="profile-stat-count">'.$k1->counts->media.'</span> posts</li>
						<li class="sfollowercount"><span class="profile-stat-count">'.$k1->counts->followed_by.'</span> followers</li>
						<li class="sfollowingcount"><span class="profile-stat-count">'.$k1->counts->follows.'</span> following</li>
					</ul>

				</div>

				<div class="profile-bio">
					<p class="iblig_bio"><span class="profile-real-name">'.$k1->full_name.'</span> </p>
					<p class="iblig_bio">'.$k1->bio.'</p>
					<p class="iblig_website"><span class="profile-real-website"><a href="'.$k1->website.'">'.$k1->website.'</a></span></p>

				</div>

			</div>';
			echo $html2;

		}else{
			$html = '<div class="mainiblgallery">
			<div class="iblig-gallery">';

				$html .= '<div class="user-block">
				<img class="iblig_user_img" src="'.$k1->profile_picture.'" alt="user image">
				<span class="iblig_hedaer">
					<a class="iblig_profilename" href="https://www.instagram.com/"'.$k1->username.'" target="_blank
						">'.$k1->username.'';
					// if($getdata["gallery_setting"]->display_from == "userhash"){
					// 	$html .= '(hashtag #'.$getdata['gallery_setting']->username_tag.')';
					// }
						$url = "https://www.instagram.com/".$k1->username;
						$html .= "</a><a href='https://www.instagram.com/'".$k1->username."' target='_blank' class='iblig-follow-btn iblig_follow'>Follow</a>";
						$html .= '</span>
						<p class="iblig_posts" >
							<span class="fa fa-camera-retro"></span>';
							if(isset($k1->hashpost)){
								$hash = $k1->hashpost->media_count;
							}else{
								$hash = $k1->counts->media;
							}
							$html .= $hash.'</p>
							<p class="iblig_followers ">
								<span class="fa fa-users"></span>'.$k1->counts->followed_by.'</p>
								<p class="iblig_following ">
									<span class="fa fa-user"></span>'.$k1->counts->follows.'</p>

									<p class="iblig_bio ">'.$k1->bio.'</p>
									<p class="iblig_website ">	<a target="_blank" href="'.$k1->website.'">'.$k1->website.'</a></p>
								</div>';
								echo $html;

							}
						} 
					}

					?>