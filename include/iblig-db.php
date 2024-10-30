<?php

class IBL_IG {
	public function __construct() {
	}

	public function setup_db()
	{ 
		$date = date('Y-m-d H:i:s');
		global $table_prefix, $wpdb;

		$wp_general_setting = "iblig_general_setting";
		if($wpdb->get_var( "show tables like '$wp_general_setting'" ) != $wp_general_setting) 
		{
			$sql = "CREATE TABLE $wp_general_setting (
				`id` int(11) NOT NULL AUTO_INCREMENT,
				`ig_shortcode_id` varchar(200) NOT NULL,
				`ig_client_id` varchar(200) NOT NULL,
				`ig_secret` varchar(200) NOT NULL,
				`ig_access_token` varchar(200) NOT NULL,			
				`ig_redirect_url` varchar(200) NOT NULL,
				`ig_user_name` varchar(200) NOT NULL,
				
				`created_date` datetime NOT NULL,
				PRIMARY KEY (`id`)
				) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=latin1";

require_once( ABSPATH . '/wp-admin/includes/upgrade.php' );
dbDelta($sql);

}

$wp_gallery_setting = "iblig_gallery_setting";
if($wpdb->get_var( "show tables like '$wp_gallery_setting'" ) != $wp_gallery_setting) 
{
	$sql = "CREATE TABLE $wp_gallery_setting (
		`id` int(11) NOT NULL AUTO_INCREMENT,
		`ig_shortcode_id` varchar(200) NOT NULL,
		`gallery_title` text NOT NULL,
		`display_from` text NOT NULL,
		`username_tag` text NOT NULL,
		`sort_media` tinyint(4) NOT NULL COMMENT '1 for date/2 for comment/3 for random',
		`action_onclick`  tinyint(4) NOT NULL COMMENT '1 for lightbox/2 for instgram/3 for customurl/4 for none',
		`redirect_url` varchar(250) NOT NULL,
		`show_type` tinyint(4) NOT NULL COMMENT '1 for gallery/2 for carousel',
		`no_column` tinyint(4) NOT NULL,
		`noof_images_load` varchar(50) NOT NULL,
		`load_media` tinyint(4) NOT NULL COMMENT '1 for load more/2 for view on instgram/0 for left',
		`btn_title` varchar(50) NOT NULL,
		`btn_bg_color` varchar(50) NOT NULL,
		`btn_bg_hover_color` varchar(50) NOT NULL,
		`btn_text_color` varchar(50) NOT NULL,
		`btn_text_hover_color` varchar(50) NOT NULL,
		`img_resoultion_type` varchar(100) NOT NULL,
		`image_space` varchar(50) NOT NULL,
		`img_hover_effect` tinyint(4) NOT NULL COMMENT '0 for no/1 for yes',
		`img_hover_color` varchar(50) NOT NULL,
		`display_like` tinyint(4) NOT NULL COMMENT '0 for no/1 for yes',
		`display_comment` tinyint(4) NOT NULL COMMENT '0 for no/1 for yes',
		`autoplay_slides` tinyint(4) NOT NULL COMMENT '0 for no/1 for yes',
		`show_nav_arrow` tinyint(4) NOT NULL COMMENT '0 for no/1 for yes',
		`nav_arrow_color` varchar(50) NOT NULL,
		`show_dotted_arrow` tinyint(4) NOT NULL COMMENT '0 for no/1 for yes',
		`created_date` datetime NOT NULL,
		PRIMARY KEY (`id`)
		) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=latin1";

require_once( ABSPATH . '/wp-admin/includes/upgrade.php' );
dbDelta($sql);

// $wpdb->insert( 
// 	$wp_gallery_setting, 
// 	array( 
// 		'gallery_title' => '',
// 		'display_from' => "username",
// 		'username_tag'=>"",
// 		'sort_media'=>1,
// 		'action_onclick'=>1,
// 		'redirect_url'=>"",
// 		'show_type' => 1,
// 		'no_column'=>4,
// 		'load_media'=>2,
// 		'btn_title' => "View on Instagram",
// 		'btn_bg_color'=>"#e4405f",
// 		'btn_bg_hover_color'=>'#ee623b',
// 		'btn_text_color'=>'#ffffff',
// 		'btn_text_hover_color'=>'#fffff',
// 		'img_resoultion_type'=>'standard',
// 		'image_space'=>5,
// 		'img_hover_effect' =>1,
// 		'img_hover_color' => "#ee623b",
// 		'display_like' => 1,
// 		'display_comment' => 1,
// 		'autoplay_slides' => 0,
// 		'show_nav_arrow' => 1,
// 		'nav_arrow_color' => "#000000",
// 		'show_dotted_arrow' => 1,
// 		'created_date'=>$date 
// 		)
// 	);
}

$wp_profile_setting = "iblig_profile_setting";
if($wpdb->get_var( "show tables like '$wp_profile_setting'" ) == $wp_profile_setting) 
{

	$sql2 = "ALTER TABLE $wp_profile_setting ADD `profile_border` TINYINT NOT NULL DEFAULT '1' AFTER `profile_showas` ";

	$wpdb->query($sql2 );

	$sql3 = "ALTER TABLE $wp_profile_setting ADD `profile_theme` TINYINT NOT NULL DEFAULT '1' AFTER `show_header`;";

	$wpdb->query($sql3);

	$sql4 = "ALTER TABLE $wp_profile_setting ADD `show_following_count` TINYINT NOT NULL DEFAULT '1' AFTER `show_follower_count`;";

	$wpdb->query($sql4);

	require_once( ABSPATH . '/wp-admin/includes/upgrade.php' );
	// dbDelta($sql2);

}else
if($wpdb->get_var( "show tables like '$wp_profile_setting'" ) != $wp_profile_setting) 
{
	$sql = "CREATE TABLE $wp_profile_setting (
		`id` int(11) NOT NULL AUTO_INCREMENT,
		`ig_shortcode_id` varchar(200) NOT NULL,
		`show_header` tinyint(4) NOT NULL COMMENT '0 for no/1 for yes',
		`profile_theme` tinyint(4) NOT NULL COMMENT '0 for no/1 for yes',
		`header_text_color` varchar(250) NOT NULL,
		`show_username_profile` tinyint(4) NOT NULL COMMENT '0 for no/1 for yes',
		`profile_border` tinyint(4) NOT NULL COMMENT '0 for no/1 for yes',
		`profile_showas` tinyint(4) NOT NULL COMMENT '0 for square/1 for round',
		`show_bio_website` tinyint(4) NOT NULL COMMENT '0 for no/1 for yes',
		`show_post_count` tinyint(4) NOT NULL COMMENT '0 for no/1 for yes',
		`show_follower_count` tinyint(4) NOT NULL COMMENT '0 for no/1 for yes',
		`show_following_count` tinyint(4) NOT NULL COMMENT '0 for no/1 for yes',
		`show_follow_button` tinyint(4) NOT NULL COMMENT '0 for no/1 for yes',
		`btn_bg_color` varchar(50) NOT NULL,
		`btn_bg_hover_color` varchar(50) NOT NULL,
		`btn_text_color` varchar(50) NOT NULL,
		`btn_text_hover_color` varchar(50) NOT NULL,
		`created_date` datetime NOT NULL,
		PRIMARY KEY (`id`)
		) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=latin1";

require_once( ABSPATH . '/wp-admin/includes/upgrade.php' );
dbDelta($sql);

// $wpdb->insert( 
// 	$wp_profile_setting, 
// 	array( 
// 		'show_header' => 1,
// 		'header_text_color'=>"#e4405f",
// 		'show_username_profile'=>1,
// 		'profile_showas'=>0,
// 		'show_bio_website'=>1,
// 		'show_post_count' => 1,
// 		'show_follower_count'=>1,
// 		'show_follow_button'=>1,
// 		'btn_bg_color'=>"#e4405f",
// 		'btn_bg_hover_color'=>'#ee623b',
// 		'btn_text_color'=>'#ffffff',
// 		'btn_text_hover_color'=>'#fffff',
// 		'created_date'=>$date 
// 		)
// 	);
}
$wp_lightbox_setting = "iblig_lightbox_setting";
if($wpdb->get_var( "show tables like '$wp_lightbox_setting'" ) != $wp_lightbox_setting) 
{
	$sql = "CREATE TABLE $wp_lightbox_setting (
		`id` int(11) NOT NULL AUTO_INCREMENT,
		`ig_shortcode_id` varchar(200) NOT NULL,
		`full_width` tinyint(4) NOT NULL COMMENT '0 for no/1 for yes',
		`width` varchar(100) NOT NULL,
		`height` varchar(100) NOT NULL,
		`lightbox_effect` varchar(100) NOT NULL,
		`autoplay` tinyint(4) NOT NULL COMMENT '0 for no/1 for yes',
		`show_caption` tinyint(4) NOT NULL COMMENT '0 for no/1 for yes',
		`show_nav_button` tinyint(4) NOT NULL COMMENT '0 for no/1 for yes',
		`created_date` datetime NOT NULL,
		PRIMARY KEY (`id`)
		) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=latin1";

require_once( ABSPATH . '/wp-admin/includes/upgrade.php' );
dbDelta($sql);

// $wpdb->insert( 
// 	$wp_lightbox_setting, 
// 	array( 
// 		'full_width' => 0,
// 		'width'=>"640",
// 		'height'=>"640",
// 		'lightbox_effect'=>"none",
// 		'autoplay'=>0,
// 		'show_caption' => 1,
// 		'show_nav_button'=>1,
// 		'created_date'=>$date 
// 		)
// 	);
}

}



}