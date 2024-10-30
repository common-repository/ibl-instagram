<div class="panel">

	<div class="panel-heading" role="tab" id="headingOne">

		<h4 class="panel-title">

			<a role="button" data-toggle="collapse" data-target="#collapseOne">

				Display Gallery

			</a>

		</h4>

	</div>





	<div id="collapseOne" class="panel-collapse collapse in" >

		<div class="panel-body">

			<div class="ibl_elements" style="display: block;">

				<div class="col-md-6 section_col">



					<div class="ibl_elements ibl_display_media" style="display: block;">

						<div class="ibl_title">

							<span class="ibl_label">Display Instagram Gallery from</span>

						</div>

						<div class="ibl_content">

							<div class="wdwt_param">

								<div class="block">   

									<div class="optioninput"> 

										<select name="display_media_for" id="display_media_for" select="" style=" resize:vertical;">



											<option value="username" <?=(empty($gallery_setting->display_from) || $gallery_setting->display_from=='username') ? 'selected' : 'selected' ?>> Username </option>

											<option value="userhash" style="display:none;" <?=($gallery_setting->display_from=='userhash') ? 'selected' : '' ?>> Hashtag </option>



											

										</select>

									</div>

								</div>

							</div>

						</div>



					</div>

					<?php 

					$ustyle2 = 'display:block;';
					$ustyle = 'display:none;'; 
					// if(!empty($id) && $gallery_setting->display_from=='userhash'){
					// 	$ustyle = 'display:block;';
					// 	$ustyle2 = 'display:none;';
					// }else{
					// 	$ustyle = 'display:none;';
					// 	$ustyle2 = 'display:block;';
					// }

					?>

					<div class="ibl_elements forusername" style="<?=$ustyle2?>">

						<div class="ibl_element_title">

							<span class="ibl_label">Username</span>

						</div>

						<div class="ibl_content">

							<input type="text" class="ibl-textbox" name="username" id="ibl_username" value="<?= $gallery_setting->username_tag ? $gallery_setting->username_tag : ''?>" placeholder="Enter Username">

							<p class="ibl_about_filed">Usernames shouldn't start with @.</p>

						</div>

					</div>



					<div class="ibl_elements foruserhash" style="<?=$ustyle?>">

						<div class="ibl_element_title">

							<span class="ibl_label">Hashtag</span>

						</div>

						<div class="ibl_content">

							<input type="text" class="ibl-textbox" name="userhash" id="ibl_userhash" value="<?= $gallery_setting->username_tag ? $gallery_setting->username_tag : ''?>" placeholder="Enter Hashtag" >

							<p class="ibl_about_filed">Hashtags shouldn't start with #</p>

						</div>

					</div>



				</div>



				<div class="col-md-6 section_col">

					<div class="ibl_elements" style="display: block;">

						<div class="ibl_element_title">

							<span class="ibl_label">Sort Media</span>

						</div>

						<div class="ibl_content">

							<div class="wdwt_param" id="ibl_wrap_feed_item_onclick">

								<div class="block">   

									<div class="optioninput"> 

										<select name="sort_media" id="ibl_sort_media" select="" style="resize:vertical;" tab="feed_settings" section="thumbnails,masonry,blog_style,image_browser">

											

											<option value="1" <?=(empty($gallery_setting->sort_media) || $gallery_setting->sort_media=='1') ? 'selected' : 'selected' ?>> Date </option>

											<!-- <option value="2" <?=($gallery_setting->sort_media=='2') ? 'selected' : '' ?>>	Comments </option> -->

											<option value="3" <?=($gallery_setting->sort_media=='3') ? 'selected' : '' ?>>	Random </option>



										</select>

									</div>

								</div>

							</div>

						</div>

					</div>



					<div class="ibl_elements" style="display: block;">

						<div class="ibl_element_title">

							<span class="ibl_label">Action OnClick</span>

						</div>

						<div class="ibl_content">



							<div class="wdwt_param" id="ibl_wrap_feed_item_onclick">

								<div class="block">   

									<div class="optioninput"> 

										<select name="action_onclick" id="ibl_action_onclick" style=" resize:vertical;" >

											

											<option value="1" <?=(empty($id) || $gallery_setting->action_onclick=='1') ? 'selected' : 'selected' ?>>	Open Lightbox  </option>

											<option value="2" <?=($gallery_setting->action_onclick=='2') ? 'selected' : '' ?>>	Redirect To Instagram </option>

											<option value="3" <?=($gallery_setting->action_onclick=='3') ? 'selected' : '' ?>>	Custom Redirect  </option>

											<option value="4" <?=($gallery_setting->action_onclick=='4') ? 'selected' : '' ?>> Do Nothing </option>



										</select>

									</div>

								</div>

							</div>

							<p class="ibl_about_filed">do this action when user clicks on image/video in the Gallery</p>	

						</div>

					</div>

					<?php if($gallery_setting->action_onclick=='3'){

						$ibl_action_hidden = '';

					}else{

						$ibl_action_hidden = 'ibl_action_hidden'; 

					}?>

					<div class="ibl_elements actionclass <?=$ibl_action_hidden?>" >

						<div class="ibl_element_title">

							<span class="ibl_label">Redirect URL</span>

						</div>

						<div class="ibl_content">

							<div class="wdwt_param" id="ibl_wrap_redirect_url">

								<div class="block">

									<div class="optioninput">

										<input type="url" class="ibl-textbox" id="ibl_redirect_url" name="redirect_url" value="<?=$gallery_setting->redirect_url ? $gallery_setting->redirect_url : ''?>">

										<p class="ibl_about_filed">Redirect URL must start with https or http</p>

									</div>

								</div>

							</div> 

						</div>

					</div>



				</div>





				<div class="col-md-12" style="padding:0px;">



					<div class="col-md-6" style="padding:0px;">

						<div class="ibl_elements">

							<div class="ibl_element_title">

								<span class="ibl_label">Show As</span>

							</div>

							<div class="ibl_content">



								<input id="gallerytab" type="radio" value="1" name="galleryshowas" class="img_showas tabradio" <?=(empty($id) || $gallery_setting->show_type=='1') ? 'checked' : '' ?>>

								<label for="gallerytab" class="ibltablbl2">Gallery</label>



								<input id="carouseltab" type="radio" value="2" name="galleryshowas" class="img_showas tabradio" <?=($gallery_setting->show_type=='2') ? 'checked' : '' ?>>

								<label for="carouseltab" class="ibltablbl2">Carousel</label>





							</div>

						</div>

						<?php if(empty($id) || $gallery_setting->show_type==1){ 

							$gstyle = 'display:block!important;';

							$cstyle = 'display:none!important;';

						}else if($gallery_setting->show_type==2){ 

							$cstyle = 'display:block!important;';

							$gstyle = 'display:none!important;';

						} ?>



						<div id="" class="display_type_div img_show_as_gallery" style="<?=$gstyle?>">



							<div class="box box-info">

								<div class="box-header ui-sortable-handle" style="cursor: move;">

									<h4 class="box-title">Select Layout</h4>              

								</div>

								<div class="box-body " style="  display: flex;">



									<div class="ibl_display_type ibl_elements">

										<div style="text-align:center;padding: 0px 5px;">

											<input type="radio" id="twocolumn" class="display_type" name="no_column" value="2" <?=(!empty($id) && $gallery_setting->no_column==2) ? 'checked' : '' ?>>

											<label for="twocolumn" class="displaylbl">Two Column</label>

										</div>

										<label for="twocolumn" class="ibl_action_hidden"><img src="<?=IBLIG_URL.'/img/column_2.png'?>" width="150" height="100"></label>

									</div>



									<div class="ibl_display_type ibl_elements">

										<div style="text-align:center;padding: 0px 5px;">

											<input type="radio" id="threecolumn" class="display_type radiogallery" name="no_column" value="3" <?=(!empty($id) && $gallery_setting->no_column==3) ? 'checked' : '' ?>>

											<label for="threecolumn" class="displaylbl">Three Column</label>

										</div>

										<label for="threecolumn" class="ibl_action_hidden"><img src="<?=IBLIG_URL.'/img/column_3.png'?>" width="150" height="100"></label>

									</div>



									<div class="ibl_display_type ibl_elements">

										<div style="text-align:center;padding: 0px 5px;">

											<input type="radio" id="fourcolumn" class="display_type" name="no_column" value="4" <?=( empty($id) || $gallery_setting->no_column>=4) ? 'checked' : '' ?>>

											<label for="fourcolumn" class="displaylbl">Four Column</label>

										</div>

										<label for="fourcolumn" class="ibl_action_hidden"><img src="<?=IBLIG_URL.'/img/column_4.png'?>" width="150" height="100"></label>

									</div>

								</div>



							</div>

						</div>







					</div>



					<div class="col-md-6 img_show_as_gallery" style="<?=$gstyle?>">

						<div>

							<label for="column"><img class="gallerypreviewimg" src="<?=IBLIG_URL.'/img/column_4.png'?>" width="450"></label>



						</div>

					</div>

					<div class="col-md-12 img_show_as_carousel" style="<?=$cstyle ? $cstyle : 'display:none;'?>">



						<div class="col-md-3 box box-info">

							<div class="box-header ui-sortable-handle" style="cursor: move;">

								<h4 class="box-title">Enter Slides per view</h4>              

							</div>

							<div class="box-body ibl_elements">



								<div class="ibl_display_type ibl_elements">

									<div>

										<input type="number" id="slide_per_view" name="slide_per_view" value="<?=($gallery_setting->show_type == 2) ? $gallery_setting->no_column : '4' ?>" class="slide_per_view ibl-numberboxslide" min="4" max="8" pattern="[4-8]+" >

									</div>

									<p class="error"></p>

								</div>

							</div>



						</div>

						<div class="col-md-9">

							<label for="column" class="carousel" style=" display: table;">

								<div class="prev-next-button previous">

									<i class="fa fa-angle-left"></i>

								</div>



								<?php //for ($i=1; $i<=4 ; $i++) { ?>

								<img src="<?=IBLIG_URL.'/img/image_4.png'?>" class="carousel_img">



								<?php //} ?>

								<div class="prev-next-button next">

									<i class="fa fa-angle-right"></i>

								</div>

							</label>

						</div>



					</div>



				</div>



			</div>

		</div>

	</div>

</div>

<!-- end of panel -->



<div class="panel">



	<div class="panel-heading">

		<h4 class="panel-title">

			<a  role="button" class="collapsed"  data-toggle="collapse" data-target="#collapseTwo">

				Layout and Pagination

			</a>

		</h4>

	</div>



	<?php if(empty($id) || $gallery_setting->show_type==1){ 

		$disabled = '';

		$loadtext = 'Load More';

		$readonly = "";

		if(!empty($gallery_setting->noof_images_load)){

			$noof_images_load = $gallery_setting->noof_images_load;

		}else{

			$noof_images_load ="12";

		}

		

	}else if($gallery_setting->show_type==2){ 

		$disabled = 'disabled';

		$loadtext = 'Load More (Pro Version)';

		$readonly = 'readonly';

		$noof_images_load ="33";

	} 



	?>



	<div id="collapseTwo" class="panel-collapse collapse in" >

		<div class="panel-body">



			<div class="ibl_elements" style="display: block;">

				<div class="col-md-6 section_col">



					<div class="section_half">

						<div class="col-md-6 ibl_elements ibl_display_media section_halfcol1" style="display: block;">

							<div class="ibl_title">

								<span class="ibl_label">New Media Loading</span>

							</div>

							<div class="ibl_content">

								<div class="wdwt_param">

									<div class="block">   

										<div class="optioninput"> 

											<select name="more_media_type" id="more_media_type" select="" style=" resize:vertical;">

												<option value="1" <?=(!empty($id) && $gallery_setting->load_media==1) ? 'selected' : '' ?> <?=$disabled?>> <?=$loadtext?> </option>

												<option value="2" <?=(empty($id) || $gallery_setting->load_media==2) ? 'selected' : '' ?>> View On Instagram </option>

												<option value="0" <?=(!empty($id) && $gallery_setting->load_media==0) ? 'selected' : '' ?>> None </option>

											</select>

										</div>

										<p class="ibl_more_txt" style="margin:0px;">if choose none below settings not affect</p>

									</div>

								</div>

							</div>

						</div>





						<div class="col-md-6 section_halfcol2 ibl_elements ibl_display_media" style="display: block;">

							<div class="ibl_title">

								<span class="ibl_label">Number of Media</span>

							</div>

							<div class="ibl_content">

								<div class="wdwt_param">

									<div class="block">   

										<div class="optioninput"> 

											<input type="number" id="media_load" name="media_load" value="<?=$noof_images_load ?>" class="media_load ibl-numberboxslide" min="2" <?=$readonly?>>

										</div>

										<p class="ibl_more_txt" style="margin:0px;">media to show when loaded first time</p>

									</div>

								</div>

							</div>



						</div>





					</div>









					<div class="box box-info ibl_load_more_design boxsettigs" style="<?=$boxstyle?>">

						<div class="box-header ui-sortable-handle">

							<h4 class="box-title">Button Settings</h4>              

						</div>

						<div class="box-body">

							<div class="boxtitle ibl_elements">

								<span class="ibl_label">Button Title</span>

								<input type="text" name="load_btn_title" class="ibl-boxbodyinput load_btn_title" id="ibl_loadmore_title" value="<?=($gallery_setting->btn_title) ? $gallery_setting->btn_title : 'View on Instagram' ?>" >

							</div>

							<div class="box-body-next">

								<div class="box-nextafter-div">

									<span class="ibl_label">Background Color</span>

									<input type="text" name="load_btn_bg_color" class="jscolor" name="add_wishlist_bg" value="<?=($gallery_setting->btn_bg_color) ? $gallery_setting->btn_bg_color : '#e4405f' ?>" autocomplete="off" style="background-image: none; background-color: rgb(0, 122, 255); color: rgb(0, 0, 0);">

								</div>

								<div>

									<span class="ibl_label">Background Hover Color</span>

									<input type="text" name="load_btn_bg_hover_color" class="jscolor" name="add_wishlist_bg" value="<?=($gallery_setting->btn_bg_hover_color) ? $gallery_setting->btn_bg_hover_color : '#ee623b' ?>" autocomplete="off" style="background-image: none; background-color: rgb(0, 122, 255); color: rgb(0, 0, 0);">

								</div>

							</div>



							<div class="box-body-next">

								<div class="box-nextafter-div">

									<span class="ibl_label">Text Color</span>

									<input type="text" name="load_btn_text_color" class="jscolor" name="add_wishlist_bg" value="<?=($gallery_setting->btn_text_color) ? $gallery_setting->btn_text_color : '#ffffff' ?>" autocomplete="off" style="background-image: none; background-color: rgb(0, 122, 255); color: rgb(0, 0, 0);">

								</div>

								<div>

									<span class="ibl_label">Text Hover Color</span>

									<input type="text" name="load_btn_text_hover_color" class="jscolor" name="add_wishlist_bg" value="<?=($gallery_setting->btn_text_hover_color) ? $gallery_setting->btn_text_hover_color : '#ffffff' ?>" autocomplete="off" style="background-image: none; background-color: rgb(0, 122, 255); color: rgb(0, 0, 0);">

								</div>

							</div>



						</div>

					</div>

				</div>



				<div class="col-md-6 section_col">



					<div class="col-md-6 section_halfcol1">



						<div class="ibl_elements ibl_display_media" style="display: block;">

							<div class="ibl_title">

								<span class="ibl_label">Gallery Media Resolution</span>

							</div>

							<div class="ibl_content">

								<div class="wdwt_param">

									<div class="block">   

										<div class="optioninput">

											<select name="resoultion_type" id="img_resoultion_type" select="" style=" resize:vertical;">

												<option value="standard" <?=(empty($gallery_setting->img_resoultion_type) || $gallery_setting->img_resoultion_type=='standard') ? 'selected' : 'selected' ?>> Standard (640 pixels) </option>

												<option value="low" <?=($gallery_setting->img_resoultion_type=='low') ? 'selected' : '' ?>> Low (320 pixels) </option>

												<option value="thumbnail" <?=($gallery_setting->img_resoultion_type=='thumbnail') ? 'selected' : '' ?>> Thumbnail (150 pixels) </option>

											</select>

										</div>



									</div>

								</div>

								<p class="ibl_about_filed">media size is according to selected size.</p>

							</div>



						</div>



					</div>



					<div class="col-md-6 section_halfcol2">



						<div class="ibl_elements ibl_display_media" style="display: block;">

							<div class="ibl_title">

								<span class="ibl_label">Space Between Images</span>

							</div>

							<div class="ibl_content">

								<div class="wdwt_param">

									<div class="block">   

										<div class="optioninput">





											<input type="number" id="img_space" name="img_margin" value="<?=isset($gallery_setting->image_space) ? $gallery_setting->image_space : '5' ?>" class="ibl-numberbox img_margin" tab="lightbox_settings" min="0">

											<label for="img_space">px</label>

										</div>



									</div>

								</div>

								<p class="ibl_about_filed">0px means no space between media</p>

							</div>



						</div>



					</div>

				</div>

				<!-- img_show_as_gallery -->

				<div class="col-md-6 section_col">

					<div class="">						



						<div class="box box-info ibl_img_hover_color" style="height:289px;">    

							<div class="box-header ui-sortable-handle">

								<h4 class="box-title">Images/Videos Hover</h4>              

							</div>



							<div class="box-body">	

								<div class="section_half">

									<div class="ibl_elements ibl_display_media" style="display: block;">

										<div class="ibl_title">

											<span class="ibl_label">Images/Videos Hover Effect</span>

										</div>

										<div class="ibl_content">

											<div class="wdwt_param">

												<div class="block">   

													<div class="optioninput">

														<input style="margin:2px;" type="radio" class="img_hover" name="img_hover_efffect" value="1" <?=(empty($id) || $gallery_setting->img_hover_effect == 1) ? 'checked' : '' ?> tab="lightbox_settings" id="hover_image_click_1">

														<label for="hover_image_click_1" class="disablelbl ibllbl"> Yes</label>

														<input style="margin:2px;" type="radio" class="img_hover" name="img_hover_efffect" value="0" <?=(!empty($id) && $gallery_setting->img_hover_effect == 0) ? 'checked' : '' ?> tab="lightbox_settings" id="hover_image_click_0">

														<label for="hover_image_click_0" class="disablelbl ibllbl"> No</label>

													</div>



												</div>

											</div>

											<p class="ibl_about_filed">if choose no hover effect not apply on images</p>

										</div>



									</div>					



									<div class="ibl_elements">

										<div class="ibl_element_title">

											<span class="ibl_label">Hover Effect Color</span>

										</div>

										<div class="ibl_content">

											<input type="text" class="jscolor" name="img_hover_efffect_color" value="<?=($gallery_setting->img_hover_color) ? $gallery_setting->img_hover_color : '#ee623b' ?>" autocomplete="off" style="background-image: none; background-color: rgb(0, 122, 255); color: rgb(255, 255, 255);">



										</div>

									</div>

								</div>



								<div class="ibl_elements">



									<div class="ibl_content">

										<div class="wdwt_param">

											<div class="block singleflexdiv">

												<div class="ibl_title singleflextitle">

													<span class="ibl_label">Display Likes</span>

												</div>   

												<div class="optioninput">



													<input name="insta_likes" type="checkbox" value="1" <?=(empty($id) || $gallery_setting->display_like == 1) ? 'checked' : '' ?>>

													<span class="description">Display Likes Count of Images on Hover. </span>

													

												</div>



											</div>

										</div>

									</div>

								</div>





								<div class="ibl_elements">



									<div class="ibl_content">

										<div class="wdwt_param">

											<div class="block singleflexdiv">

												<div class="ibl_title singleflextitle">

													<span class="ibl_label">Display Comments</span>

												</div>   

												<div class="optioninput">

													<input name="insta_comments" type="checkbox" value="1" <?=(empty($id) || $gallery_setting->display_comment == 1) ? 'checked' : '' ?>>

													<span class="description">Display Comment Count of Images on Hover. </span>

												</div>



											</div>

										</div>

									</div>

								</div>



							</div>

						</div>



					</div>



					



				</div>



				<div class="col-md-12 section_col">

					<div class="img_show_as_carousel" style="<?=$cstyle?>">



						<div class="box box-info ibl_img_hover_color">    

							<div class="box-header ui-sortable-handle" style="cursor: move;">

								<h4 class="box-title">Carousel</h4>              

							</div>



							<div class="box-body">	

								<div class="section_half">

									<div class="ibl_elements elementslides4">

										<div class="ibl_element_title">

											<span class="ibl_label">Autoplay Slides</span>

										</div>

										<div class="ibl_content">



											<input style="margin:2px;" type="radio" class="slide_autoplay" name="slide_autoplay" value="1" <?=(empty($id) || $gallery_setting->autoplay_slides == 1) ? 'checked' : '' ?> tab="lightbox_settings" id="slide_autoplay_1">

											<label for="slide_autoplay_1" class="disablelbl ibllbl"> Enable</label>

											<input style="margin:2px;" type="radio" class="slide_autoplay" name="slide_autoplay" value="0" <?=(!empty($id) && $gallery_setting->autoplay_slides == 0) ? 'checked' : '' ?> tab="lightbox_settings" id="slide_autoplay_0">

											<label for="slide_autoplay_0" class="disablelbl ibllbl"> Disable</label>





										</div>

									</div>



									<div class="ibl_elements elementslides4">

										<div class="ibl_element_title">

											<span class="ibl_label">Dotted Navigation</span>

										</div>

										<div class="ibl_content">

											<input style="margin:2px;" type="radio" class="slide_dot_arrow" name="slide_dot_arrow" value="1" <?=(empty($id) || $gallery_setting->show_dotted_arrow == 1) ? 'checked' : '' ?> tab="lightbox_settings" id="slide_dot_arrow_1">

											<label for="slide_dot_arrow_1" class="disablelbl ibllbl"> Enable</label>

											<input style="margin:2px;" type="radio" class="slide_dot_arrow" name="slide_dot_arrow" value="0" <?=(!empty($id) && $gallery_setting->show_dotted_arrow == 0) ? 'checked' : '' ?> tab="lightbox_settings" id="slide_dot_arrow_0">

											<label for="slide_dot_arrow_0" class="disablelbl ibllbl"> Disable</label>



										</div>

									</div>



									<div class="ibl_elements elementslides4">

										<div class="ibl_element_title">

											<span class="ibl_label">Navigation Arrows</span>

										</div>

										<div class="ibl_content"> 

											<input style="margin:2px;" type="radio" class="slide_nav_arrow" name="slide_nav_arrow" value="1" <?=(empty($id) || $gallery_setting->show_nav_arrow == 1) ? 'checked' : '' ?> tab="lightbox_settings" id="slide_nav_arrow_1">

											<label for="slide_nav_arrow_1" class="disablelbl ibllbl"> Enable</label>

											<input style="margin:2px;" type="radio" class="slide_nav_arrow" name="slide_nav_arrow" value="0" <?=(!empty($id) && $gallery_setting->show_nav_arrow == 0) ? 'checked' : '' ?> tab="lightbox_settings" id="slide_nav_arrow_0">

											<label for="slide_nav_arrow_0" class="disablelbl ibllbl"> Disable</label>



										</div>

									</div>





									<div class="ibl_elements elementslides4">

										<div class="ibl_element_title">

											<span class="ibl_label">Navigation Arrows Color</span>

										</div>

										<div class="ibl_content">

											<input type="text" class="jscolor" name="slide_nav_arrow_color" value="<?=($gallery_setting->nav_arrow_color) ? $gallery_setting->nav_arrow_color : '' ?>" autocomplete="off" style="background-image: none; background-color: rgb(0, 122, 255); color: rgb(255, 255, 255);">



										</div>

									</div>



									

								</div>



							</div>

						</div>

					</div>



				</div>

			</div>

		</div>

	</div>





</div>

<!-- end of panel Pagination -->