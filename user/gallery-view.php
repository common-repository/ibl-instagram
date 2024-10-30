<input type="hidden" value="" class="active_sidebar">
<div class="iblig-lightgallery standardview <?=$lightboxid?>">
	<?php
	if($flag==1){
		if($getdata['gallery_setting']->sort_media==3){
			shuffle($k);
		} 
		foreach ($k as $key => $value) { 

			$type=$getdata['gallery_setting']->img_resoultion_type;					

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
			if($customredirectflag == 2){
				$customredirect = 'onclick="window.open(\''.$value->link.'\')"';
			}
			$customredirects = 'onclick="window.open(\''.$value->link.'\')"';

			?>


			<div class="item standard_ibl_lightgallery" data-responsive="<?=$lightboxurl?>" data-src="<?=$lightboxurl?>" data-sub-html="&nbsp;<?=$caption==1 ? $value->caption->text : ''?>" data-html="#video<?=$value->id?>"  <?=$customredirect?>>

				<div class="iblig_standard_postimg_div">

					<?php if(isset($value->videos->standard_resolution->url)){		?>

					<div style="display:none;" id="video<?=$value->id?>">
						<video class="lg-video-object lg-html5" controls muted preload="none">
							<source src="<?=$url?>" type="video/mp4">
							</video>
						</div>

						<img class="iblig_standard_postimg" src="<?=$posterurl?>" />

						<?php echo commonlikecomment($getdata,$value,$customredirect,$customredirectflag); ?>

						<div class="ibli_video">
							<div class="ibli_video_icon">
								<div class="ibli_video_icon_div">
									<i class="fa fa-play"></i>
								</div>
							</div>
						</div>
						<?php }else{ ?>

						<img class="iblig_standard_postimg" src="<?=$url; ?>">

						<?php echo commonlikecomment($getdata,$value,$customredirect,$customredirectflag); ?>

						<?php } ?>

					</div>

				</div>

				<?php }	}else{ ?>
				<p class=""><?=$k->meta->error_message?></p>
				<?php }		?>
			</div>

			<?php if($flag==1){ if($getdata['gallery_setting']->load_media != 0){
				if($getdata['gallery_setting']->load_media == 1){ ?>
				<p style=" text-align: center;">
					<input type="button" class="iblig-btnp loadmoremedia" data-flag="1" value="<?=$getdata['gallery_setting']->btn_title?>">
				</p>
				<?php }else if($getdata['gallery_setting']->load_media == 2){
					?> 
					<p style="text-align: center;">
						<a onclick="window.open('https://www.instagram.com/<?=$k1->username?>','_blank')" class="iblig-btnp"><?=$getdata['gallery_setting']->btn_title?></a>
					</p>
					<?php } } }?>	

				</div>
			</div>


