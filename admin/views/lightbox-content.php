<div class="panel">
	<div class="panel-heading" role="tab" id="headingOne">
		<h4 class="panel-title">
			<a role="button" data-toggle="collapse" data-target="#collapseOne">
				General
			</a>
		</h4>
	</div>


	<div id="collapseOne" class="panel-collapse collapse in" >
		<div class="panel-body">
			<div class="ibl_elements" style="display: block;">
				<div class="col-md-6 section_col">

					<div class="ibl_elements">
						<div class="ibl_element_title">
							<span class="ibl_label">Full width Lightbox</span>
						</div>
						<div class="ibl_content"> 
							<input style="margin:2px;" type="radio" class="lightbox_fullwidth" name="lightbox_fullwidth" value="1" <?=(empty($id) || $lightbox_setting->full_width == 1) ? 'checked' : 'checked' ?> tab="lightbox_settings" id="lightbox_fullwidth_1">
							<label for="lightbox_fullwidth_1" class="disablelbl ibllbl"> Yes</label>
							<input style="margin:2px;" type="radio" class="lightbox_fullwidth" name="lightbox_fullwidth" value="0" <?=(!empty($id) && $lightbox_setting->full_width == 0) ? 'checked' : '' ?> tab="lightbox_settings" id="lightbox_fullwidth_0">
							<label for="lightbox_fullwidth_0" class="disablelbl ibllbl"> No</label>


						</div>	
					</div>

					<?php 

					if(!empty($id) && $lightbox_setting->full_width == 0){
						$lightboxstyle = 'display:block !important;';
					}else{						
						$lightboxstyle = 'display:none;';
					}
					 ?>
					<div class="ibl_elements lightbox_setting" style="<?=$lightboxstyle?>">
						<div class="ibl_element_title">
							<span class="ibl_label">Lightbox Width</span>
						</div>
						<div class="ibl_content">
							<input type="number" id="lightbox_width" name="lightbox_width" value="<?=($lightbox_setting->width) ? $lightbox_setting->width : '640' ?>" class="ibl-numberbox lightbox_width" tab="lightbox_settings" min="100">
							<label for="lightbox_width">px</label>

						</div>
					</div>
					<div class="ibl_elements lightbox_setting" style="<?=$lightboxstyle?>">
						<div class="ibl_element_title">
							<span class="ibl_label">Lightbox Height</span>
						</div>
						<div class="ibl_content">
							<input type="number" id="lightbox_height" name="lightbox_height" value="<?=($lightbox_setting->height) ? $lightbox_setting->height : '640' ?>" class="ibl-numberbox lightbox_height" tab="lightbox_settings" min="100">
							<label for="lightbox_height">px</label>

						</div>
					</div>

					<div class="ibl_elements">
						<div class="ibl_element_title">
							<span class="ibl_label">Lightbox Effect</span>
						</div>
						<div class="ibl_content">
							<select name="lightbox_effect" id="lightbox_effect" select="" style=" resize:vertical;">
								<option value="none" <?=(empty($lightbox_setting->lightbox_effect) || $lightbox_setting->lightbox_effect == 'none') ? 'selected' : 'selected' ?>> None </option>
								<option value="fade" <?=($lightbox_setting->lightbox_effect == 'fade') ? 'selected' : '' ?>> Fade </option>
							</select>

						</div>
					</div>

				</div>

				<div class="col-md-6 section_col">
					<div class="ibl_elements">
						<div class="ibl_element_title">
							<span class="ibl_label">Lightbox Autoplay</span>
						</div>
						<div class="ibl_content">

							<input style="margin:2px;" type="radio" class="lightbox_autoplay" name="lightbox_autoplay" value="1" <?=(empty($id) || $lightbox_setting->autoplay == 1) ? 'checked' : 'checked' ?> tab="lightbox_settings" id="lightbox_autoplay_1">
							<label for="lightbox_autoplay_1" class="disablelbl ibllbl"> Yes</label>
							<input style="margin:2px;" type="radio" class="lightbox_autoplay" name="lightbox_autoplay" value="0" <?=(!empty($id) && $lightbox_setting->autoplay == 0) ? 'checked' : '' ?> tab="lightbox_settings" id="lightbox_autoplay_0">
							<label for="lightbox_autoplay_0" class="disablelbl ibllbl"> No</label>
						</div>	
					</div>

					<div class="ibl_elements">
						<div class="ibl_element_title">
							<span class="ibl_label">Show Caption</span>
						</div>
						<div class="ibl_content">
							<input style="margin:2px;" type="radio" class="lightbox_caption" name="lightbox_caption" value="1" <?=(empty($id) || $lightbox_setting->show_caption == 1) ? 'checked' : 'checked' ?> tab="lightbox_settings" id="lightbox_caption_1">
							<label for="lightbox_caption_1" class="disablelbl ibllbl"> Yes</label>
							<input style="margin:2px;" type="radio" class="lightbox_caption" name="lightbox_caption" value="0" <?=(!empty($id) && $lightbox_setting->show_caption == 0) ? 'checked' : '' ?> tab="lightbox_settings" id="lightbox_caption_0">
							<label for="lightbox_caption_0" class="disablelbl ibllbl"> No</label>

						</div>
						<p class="ibl_about_filed">show prev-next navigation arrows</p>
					</div>

					<div class="ibl_elements">
						<div class="ibl_element_title">
							<span class="ibl_label">Show Navigation Buttons</span>
						</div>
						<div class="ibl_content">
							<input style="margin:2px;" type="radio" class="lightbox_nav" name="lightbox_nav" value="1"  <?=(empty($id) || $lightbox_setting->show_nav_button == 1) ? 'checked' : 'checked' ?> tab="lightbox_settings" id="lightbox_nav_1">
							<label for="lightbox_nav_1" class="disablelbl ibllbl"> Yes</label>
							<input style="margin:2px;" type="radio" class="lightbox_nav" name="lightbox_nav" value="0"  <?=(!empty($id) && $lightbox_setting->show_nav_button == 0) ? 'checked' : '' ?> tab="lightbox_settings" id="lightbox_nav_0">
							<label for="lightbox_nav_0" class="disablelbl ibllbl"> No</label>
						</div>
						<p class="ibl_about_filed">show prev-next navigation arrows</p>
					</div>


				</div>

			</div>
		</div>
	</div>
</div>
<!-- end of panel -->

