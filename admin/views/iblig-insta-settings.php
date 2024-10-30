<?php

if (! defined('ABSPATH')) {

	die();

}

?>





<table class="form-table" style="width: 60%;">

	<tbody>

		<tr>

			<td colspan="2" style=" padding: 0;">

				<div class="update-nag wdi_help_bar_wrap" style=" margin: 0;border-left: 4px solid #ff0000;">

					<span class="wdi_help_bar_text">
						<a class="iblig-btnp" href="https://iblinfotech.com/instagram-photo-gallery-wordpress-plugin-for-instagram-feeds/instagram-generate-token/" target="_blank">Get Token</a>
						<p>You need Fill up below needed Credential for use Instagram API. Click above Get Token button to get your Access Token. After that you may create gallery with desired user media. </p>
						<p>All other Setting will be affect after you Enter Access Token.</p>

					</span>

				</div>



			</td>

		</tr>

		<!-- <tr>

			<th scope="row">Client ID</th>

			<td>

				<div class="iblig_param" id="iblig_client_id">

					<div class="block">

						<div class="optioninput">

							<input type="text" name="ig_client_id" id="ig_client_id" class="ibl-textbox" value="<?= $api_setting->ig_client_id ? $api_setting->ig_client_id : ''?>" required>



						</div>

					</div>

				</div>  

			</td>

		</tr>

		<tr>

			<th scope="row">Client Secret</th>

			<td>

				<div class="iblig_param" id="iblig_secret">

					<div class="block">

						<div class="optioninput">

							<input type="text" name="ig_secret" id="ig_secret" class="ibl-textbox" value="<?= $api_setting->ig_secret ? $api_setting->ig_secret : ''?>" required>



						</div>

					</div>

				</div>  

			</td>

		</tr> -->

		<tr>

			<th scope="row">Access Token</th>

			<td>

				<div class="iblig_param" id="iblig_redirect_url">

					<div class="block">

						<div class="optioninput">

							<input type="text" name="ig_access_token" id="ig_access_token" class="ig_access_token ibl-textbox" value="<?= $api_setting->ig_access_token ? $api_setting->ig_access_token : ''?>" required>



						</div>



					</div>

				</div>  

			</td>

		</tr>

		<tr>

			<th scope="row">Username</th>

			<td>    <div class="iblig_param" id="iblig_user_name">

				<div class="block">

					<div class="optioninput">

						<input type="text" name="ig_user_name" id="ig_user_name" class="ibl-textbox" value="<?= $api_setting->ig_user_name ? $api_setting->ig_user_name : ''?>" required>



					</div>

				</div>

			</div>  

		</td>

	</tr>

</tbody>

</table>

<?php //submit_button(); ?>

<!-- <input type="submit" value="Submit" class="iblig-btnp" name="savesettings" style="border: 1px solid #e4405f;"> -->



<?php

// }

?>



