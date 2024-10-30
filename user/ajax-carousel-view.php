<?php

$k = $result['data']->data; 

if($result['gallery_setting']->sort_media==3){

	shuffle($k);

}

$html1 = [];

$html = "";

foreach ($k as $key => $value) { 

	$html = "";
	$type=$result['gallery_setting']->img_resoultion_type;

	if(isset($value->videos->standard_resolution->url)){
		if($type=='thumbnail'){
			$type1 = 'low_resolution';
		}else{
			$type1 = $type.'_resolution';
		}
		$url = $value->videos->$type1->url;
		$posterurl = $value->images->standard_resolution->url;
		$lightboxurl="";
	}else{
		if($type=='thumbnail'){
			$type1 = 'thumbnail';
		}else{
			$type1 = $type.'_resolution';
		}
		$url = $value->images->$type1->url;
		$lightboxurl=$value->images->standard_resolution->url;
	}

	if($caption==1){
		$caption = '&nbsp;'.$value->caption->text;
	}else{
		$caption = "";
	}

	if($result['gallery_setting']->action_onclick == 1){
		$customredirect = '';
		$customredirectflag = 1;
	}else if($result['gallery_setting']->action_onclick == 2){
		$customredirect = 'onclick="window.open(\''.$value->link.'\')"';
		$customredirectflag = 2;		
	}else if($result['gallery_setting']->action_onclick == 3){
		$customredirect = 'onclick="window.open(\''.$result['gallery_setting']->redirect_url.'\')"';
		$customredirectflag = 1;
	}else if($result['gallery_setting']->action_onclick == 4){
		$customredirect = '';
		$customredirectflag = 1;
	}
	
	$customredirects = 'onclick="window.open(\''.$value->link.'\')"';

	$html .= '<div class="iblig_standard_postimglink" '.$customredirect.'>
	<div class="item" data-responsive="'.esc_html($lightboxurl).'" data-src="'.esc_html($lightboxurl).'" data-sub-html="'.esc_html($caption).'"  data-html="#video'.esc_html($value->id).'"  '.esc_html($customredirect).' >';

		$html .= '<div class="iblig_standard_postimg_div">';

		if(isset($value->videos->standard_resolution->url)){			

			$html .= '<div style="display:none;" id="video'.esc_html($value->id).'">

			<video class="lg-video-object lg-html5" controls muted preload="none">

				<source src="'.esc_html($url).'" type="video/mp4">

				</video>

			</div>

			<img class="iblig_standard_postimg" src="'.esc_html($posterurl).'" style="'.esc_html($style).'"/>';

			$html .= commonlikecomment($getdata,$value,$customredirect,$customredirectflag);

			$html .= '<div class="ibli_video">

			<div class="ibli_video_icon">

				<div class="ibli_video_icon_div">

					<i class="fa fa-play"></i>

				</div>

			</div>

		</div>';



	}else{ 



		$html .= '	<img src="'.esc_html($url).'" class="iblig_standard_postimg">';   

		$html .= commonlikecomment($getdata,$value,$customredirect,$customredirectflag);

	} 

	$html .= '</div> </div> </div>';

				// $html1[] = $html;
} 



$output['Data'] = $html;

$output['next_url'] = $next_url;

echo json_encode($output);

