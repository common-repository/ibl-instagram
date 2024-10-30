<div class="panel">
	<div class="panel-heading" role="tab" id="headingOne">
		<h4 class="panel-title">
			<a role="button" data-toggle="collapse" data-target="#collapseOne">
				Advance
			</a>
		</h4>
	</div>


	<div id="collapseOne" class="panel-collapse collapse in" >
		<div class="panel-body">
			<div class="ibl_elements" style="display: block;">
				<div class="col-md-6 section_col">
					<div class="section_half">
						<div class="ibl_elements"  style=" margin: 0px 103px 18px 0px;">
							<div class="ibl_element_title">
								<span class="ibl_label">Show Gallery Header</span>
							</div>
							<div class="ibl_content">
								<input style="margin:2px;" type="radio" class="show_header" name="show_header" value="1" <?=(empty($id) || $profile_setting->show_header == 1) ? 'checked' : 'checked' ?> tab="lightbox_settings" id="show_header_1">
								<label for="show_header_1" class="disablelbl ibllbl"> Yes</label>
								<input style="margin:2px;" type="radio" class="show_header" name="show_header" value="0" <?=(!empty($id) && $profile_setting->show_header == 0) ? 'checked' : '' ?> tab="lightbox_settings" id="show_header_0">
								<label for="show_header_0" class="disablelbl ibllbl"> No</label>

							</div>
							<p class="ibl_about_filed">header includes user details</p>	
						</div>

						<div class="ibl_elements" style=" width: 45%;">
							<div class="ibl_element_title">
								<span class="ibl_label">Select Header Theme</span>
							</div>
							<div class="ibl_content">
								<select class="profile_theme" name="profile_theme" id="profile_theme" style=" resize:vertical; ">

									<option value="1" <?=(empty($id) || $profile_setting->profile_theme==1) ? 'selected' : '' ?>>	Basic </option>
									<option value="2" <?=(!empty($id) && $profile_setting->profile_theme==2) ? 'selected' : '' ?>> Style 1 </option>

								</select>

							</div>
						</div>

					</div>

					<div class="section_half">
						<div class="ibl_elements elementslides2">
							<div class="ibl_element_title">
								<span class="ibl_label">Header Text Color</span>
							</div>
							<div class="ibl_content">
								<input type="text" class="jscolor" name="header_txt_color" value="<?=($profile_setting->header_text_color) ? $profile_setting->header_text_color : 'E4405F' ?>" autocomplete="off" style="background-image: none; background-color: rgb(0, 122, 255); color: rgb(255, 255, 255);">

							</div>
						</div>



					<div class="ibl_elements">
						<div class="ibl_element_title">
							<span class="ibl_label">Show Username and Profile Picture</span>
						</div>
						<div class="ibl_content">

							<input style="margin:2px;" type="radio" class="show_username_img" name="show_username_img" value="1" <?=(empty($id) || $profile_setting->show_username_profile == 1) ? 'checked' : 'checked' ?> tab="lightbox_settings" id="show_username_img_1">
							<label for="show_username_img_1" class="disablelbl ibllbl"> Yes</label>
							<input style="margin:2px;" type="radio" class="show_username_img" name="show_username_img" value="0" <?=(!empty($id) && $profile_setting->show_username_profile == 0) ? 'checked' : '' ?> tab="lightbox_settings" id="show_username_img_0">
							<label for="show_username_img_0" class="disablelbl ibllbl"> No</label>

						</div>
					</div>

										</div>

					<div class="box box-info ibl_username_profile">    
						<div class="box-header ui-sortable-handle" style="cursor: move;">
							<h4 class="box-title">Username and Profile</h4>              
						</div>

						<div class="box-body">						
							<div class="section_half">
								<div class="ibl_elements ibl_display_media" style="display: block;margin: 0 55px 30px 0px;">
									<div class="ibl_title">
										<span class="ibl_label">Profile Picture Show As</span>
									</div>
									<div class="ibl_content">
										<div class="wdwt_param">
											<div class="block">   
												<div class="optioninput">
													
													<input style="margin:2px;" type="radio" class="profile_showas" name="profile_showas" value="0" <?=(!empty($id) && $profile_setting->profile_showas == 0) ? 'checked' : '' ?> tab="lightbox_settings" id="profile_showas_1">
													<label for="profile_showas_1" class="disablelbl ibllbl"> Square</label>
													<input style="margin:2px;" type="radio" class="profile_showas" name="profile_showas" value="1" <?=(empty($id) || $profile_setting->profile_showas == 1) ? 'checked' : '' ?> tab="lightbox_settings" id="profile_showas_0">
													<label for="profile_showas_0" class="disablelbl ibllbl"> Round</label>


												</div>

											</div>
										</div>
									</div>
								</div>
								<?php if(empty($id) || $profile_setting->profile_showas==1){
									$style1 ='border-radius: 50%;';
								}else{
									$style1 ='';
								} ?>
								<div class="ibl_elements">
									<label for="column"><img class="changeprofiletype" src="<?=IBLIG_URL.'/img/square_profile.jpg'?>" width="100" style="<?=$style1?>"></label>
								</div>

							</div>



							<div class="section_half">
								<div class="ibl_elements elementslides3">
									<div class="ibl_element_title">
										<span class="ibl_label">Show Profile Picture Border</span>
									</div>
									<div class="ibl_content">

										<input style="margin:2px;" type="radio" class="show_profile_border" name="show_profile_border" value="1" <?=(empty($id) || $profile_setting->profile_border == 1) ? 'checked' : 'checked' ?> tab="lightbox_settings" id="show_profile_border_1">
										<label for="show_profile_border_1" class="disablelbl ibllbl"> Yes</label>
										<input style="margin:2px;" type="radio" class="show_profile_border" name="show_profile_border" value="0" <?=(!empty($id) && $profile_setting->profile_border == 0) ? 'checked' : '' ?> tab="lightbox_settings" id="show_profile_border_0">
										<label for="show_profile_border_0" class="disablelbl ibllbl"> No</label>

									</div>
								</div>

								<div class="ibl_elements">
									<div class="ibl_element_title">
										<span class="ibl_label">Show User Bio and Website</span>
									</div>
									<div class="ibl_content">
										<input style="margin:2px;" type="radio" class="show_user_bio" name="show_user_bio" value="1" <?=(!empty($id) && $profile_setting->show_bio_website == 1) ? 'checked' : '' ?> tab="lightbox_settings" id="show_user_bio_1">
										<label for="show_user_bio_1" class="disablelbl ibllbl"> Yes</label>
										<input style="margin:2px;" type="radio" class="show_user_bio" name="show_user_bio" value="0" <?=(empty($id) || $profile_setting->show_bio_website == 0) ? 'checked' : '' ?> tab="lightbox_settings" id="show_user_bio_0">
										<label for="show_user_bio_0" class="disablelbl ibllbl"> No</label>

									</div>
								</div>

							</div>
							
						</div>
					</div>

				</div>

				<div class="col-md-6 section_col">
					<div class="section_half">
						<div class="ibl_elements elementslides3">
							<div class="ibl_element_title">
								<span class="ibl_label">Show Post Count</span>
							</div>
							<div class="ibl_content">

								<input style="margin:2px;" type="radio" class="show_post_count" name="show_post_count" value="1" <?=(empty($id) || $profile_setting->show_post_count == 1) ? 'checked' : '' ?> tab="lightbox_settings" id="show_post_count_1">
								<label for="show_post_count_1" class="disablelbl ibllbl"> Yes</label>
								<input style="margin:2px;" type="radio" class="show_post_count" name="show_post_count" value="0" <?=(!empty($id) && $profile_setting->show_post_count == 0) ? 'checked' : '' ?> tab="lightbox_settings" id="show_post_count_0">
								<label for="show_post_count_0" class="disablelbl ibllbl"> No</label>

							</div>
						</div>

						<div class="ibl_elements">
							<div class="ibl_element_title">
								<span class="ibl_label">Show Follower count</span>
							</div>
							<div class="ibl_content">

								<input style="margin:2px;" type="radio" class="show_follower_count" name="show_follower_count" value="1" <?=(empty($id) || $profile_setting->show_follower_count == 1) ? 'checked' : '' ?> tab="lightbox_settings" id="show_follower_count_1">
								<label for="show_follower_count_1" class="disablelbl ibllbl"> Yes</label>
								<input style="margin:2px;" type="radio" class="show_follower_count" name="show_follower_count" value="0" <?=(!empty($id) && $profile_setting->show_follower_count == 0) ? 'checked' : '' ?> tab="lightbox_settings" id="show_follower_count_0">
								<label for="show_follower_count_0" class="disablelbl ibllbl"> No</label>

							</div>
						</div>
					</div>
					<div class="section_half">

						<div class="ibl_elements elementslides3">
							<div class="ibl_element_title">
								<span class="ibl_label">Show Following count</span>
							</div>
							<div class="ibl_content">

								<input style="margin:2px;" type="radio" class="show_following_count" name="show_following_count" value="1" <?=(empty($id) || $profile_setting->show_following_count == 1) ? 'checked' : '' ?> tab="lightbox_settings" id="show_following_count_1">
								<label for="show_following_count_1" class="disablelbl ibllbl"> Yes</label>
								<input style="margin:2px;" type="radio" class="show_following_count" name="show_following_count" value="0" <?=(!empty($id) && $profile_setting->show_following_count == 0) ? 'checked' : '' ?> tab="lightbox_settings" id="show_following_count_0">
								<label for="show_following_count_0" class="disablelbl ibllbl"> No</label>

							</div>
						</div>

						<div class="ibl_elements">
							<div class="ibl_element_title">
								<span class="ibl_label">Show Follow Button</span>
							</div>
							<div class="ibl_content">
								<input style="margin:2px;" type="radio" class="show_follow_btn" name="show_follow_btn" value="1" <?=(empty($id) || $profile_setting->show_follow_button == 1) ? 'checked' : '' ?> tab="lightbox_settings" id="show_follow_btn_1">
								<label for="show_follow_btn_1" class="disablelbl ibllbl"> Yes</label>
								<input style="margin:2px;" type="radio" class="show_follow_btn" name="show_follow_btn" value="0" <?=(!empty($id) && $profile_setting->show_follow_button == 0) ? 'checked' : '' ?> tab="lightbox_settings" id="show_follow_btn_0">
								<label for="show_follow_btn_0" class="disablelbl ibllbl"> No</label>

							</div>
						</div>

					</div>


					<div class="box box-info ibl_follow_btn" style="height:270px;">    
						<div class="box-header ui-sortable-handle" style="cursor: move;">
							<h4 class="box-title">Follow Button</h4>              
						</div>

						<div class="box-body">	

							<div class="ibl_elements">

								<div class="ibl_content">
									<div class="wdwt_param">
										<div class="block singleflexdiv">
											<div class="ibl_title singleflextitle">
												<span class="ibl_label">Text Color</span>
											</div>   
											<div class="optioninput">
												<input type="text" name="follow_txt_color" class="jscolor" value="<?=($profile_setting->btn_text_color) ? $profile_setting->btn_text_color : 'ffffff' ?>" autocomplete="off" style="background-image: none; background-color: rgb(0, 122, 255); color: rgb(0, 0, 0);">
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
												<span class="ibl_label">Hover Text Color</span>
											</div>   
											<div class="optioninput">
												<input type="text" class="jscolor" name="follow_txt_hover_color" value="<?=($profile_setting->btn_text_hover_color) ? $profile_setting->btn_text_hover_color : 'ffffff' ?>" autocomplete="off" style="background-image: none; background-color: rgb(0, 122, 255); color: rgb(0, 0, 0);">
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
												<span class="ibl_label">Background Color</span>
											</div>   
											<div class="optioninput">
												<input type="text" class="jscolor" name="follow_bg_color" value="<?=($profile_setting->btn_bg_color) ? $profile_setting->btn_bg_color : 'e4405f' ?>" autocomplete="off" style="background-image: none; background-color: rgb(0, 122, 255); color: rgb(0, 0, 0);">
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
												<span class="ibl_label">Hover Background Color</span>
											</div>   
											<div class="optioninput">
												<input type="text" class="jscolor" name="follow_bg_hover_color" value="<?=($profile_setting->btn_bg_hover_color) ? $profile_setting->btn_bg_hover_color : 'ee623b' ?>" autocomplete="off" style="background-image: none; background-color: rgb(0, 122, 255); color: rgb(0, 0, 0);">
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
</div>
<!-- end of panel -->

