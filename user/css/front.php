<style type="text/css">

	#owl-demo .item{

		margin:  <?php echo $img_margin?>px;

	}

	.owl-prev ,.owl-next,.prev-next-button{

		color: #<?php echo $getdata['gallery_setting']->nav_arrow_color?> !important;

	}

	@media (max-width: 767px) and (min-width: 319px){

		.iblig-follow-btn{

			padding: 10px 10px !important;

		}

		.iblig_hedaer {

			font-size: 14px !important;

			margin-left: 90px !important;

		}

	}

	@media (max-width: 320px){



		.iblig-follow-btn{

			padding: 10px 10px !important;

		}

		.iblig_hedaer {

			font-size: 12px !important;

			margin-left: 70px !important;

		}



		.user-block .iblig_user_img {

			width: 60px !important;

			height: 60px !important;

		}

		.iblig_follow {

			margin: 0px 0px !important;

		}

	}

	<?php if($getdata['gallery_setting']->no_column == 4){ ?>

		@media (max-width: 767px){

			.standard_ibl_lightgallery {
				width: calc(50% - <?php echo $img_margin*2?>px) !important;
			}
		}
		.standard_ibl_lightgallery {
			width: calc(25% - <?php echo $img_margin*2?>px);
		}

		<?php } ?>

		<?php if($getdata['gallery_setting']->no_column == 3){ ?>
			@media (max-width: 767px){

				.standard_ibl_lightgallery {
					width: calc(100% - <?php echo $img_margin*2?>px) !important;
				}
			}

			.standard_ibl_lightgallery {
				width: calc(33.33% - <?php echo $img_margin*2?>px);
			}

			<?php } ?>

			<?php if($getdata['gallery_setting']->no_column == 2){ ?>

				@media (max-width: 767px){

					.standard_ibl_lightgallery {
						width: calc(100% - <?php echo $img_margin*2?>px) !important;
					}
				}

				.standard_ibl_lightgallery {
					width: calc(49% - <?php echo $img_margin*20?>px);
				}

				<?php } ?>

				.standard_ibl_lightgallery{
					margin:<?php echo $img_margin?>px;;
				}

				.iblig_standard_postimg_div:hover::after {
					background: #<?php echo $imghovercolor?>;
					width: 100%;
					height: 100%;
					opacity: .5;
					left: 0;
					top: 0;
					cursor: pointer;
				}

				.iblig-btnp {

					background: #<?php echo $btn_bg_color?> !important;

					color: #<?php echo $btn_text_color?> !important;
					border: none !important;

				}

				.iblig-btnp:hover{

					background: #<?php echo $btn_bg_hover_color?> !important;

					color: #<?php echo $btn_text_hover_color?> !important;

				}

				.iblig_hedaer{

					display: block;

					margin-left: 90px;

				}

				<?php 

				if($getdata['profile_setting']->header_text_color == 'fffff' || $getdata['profile_setting']->header_text_color == 'FFFFFF' || $getdata['profile_setting']->header_text_color == 'FFF'){

					$header_text_color = 'E4405F';

				}else{

					$header_text_color = $getdata['profile_setting']->header_text_color;

				}

				?>

				.profile-stats li,.iblig_profilename,.iblig_posts,.iblig_followers,.iblig_following,.iblig_bio,.iblig_website a{

					color: #<?php echo $header_text_color ?> !important;

				}


				<?php

				if($getdata['profile_setting']->profile_border==1){?>
					.iblig_user_img{ background: linear-gradient(40deg, #f99b4a 15%, #dd3071 50%, #c72e8d 85%);
						padding: 3px;
					} <?php } ?>


					<?php if($getdata['profile_setting']->profile_showas==1){?>

						.iblig_user_img{border-radius:50%;}

						<?php } ?>

						<?php if($getdata['profile_setting']->show_username_profile==0){?>
							.iblig_profilename,.iblig_user_img{display:none;}
							.iblig_posts,.iblig_followers{
								margin-top: 10px !important;
							}
							.iblig_hedaer{margin-left: 0px; }
							@supports (display: grid) {
								.profile {
									display: grid;

								}
								.siblig_follow {
									margin: 0px !important; 
								}
							}
							<?php }else{ ?>
								@supports (display: grid) {
									.profile {
										display: grid;
										grid-template-columns: 1fr 2fr;
										grid-template-rows: repeat(3, auto);
										grid-column-gap: 3rem;
										align-items: center;
									}
								}
								<?php } ?>

								<?php if($getdata['profile_setting']->show_post_count==0){?>
									.iblig_posts{display:none;}
									.spostcount{display:none !important;}
									.iblig_followers{margin-left: 10px !important;}
									<?php	} ?>
									<?php if($getdata['profile_setting']->show_follower_count==0){?>
										.iblig_followers{display:none;}
										.sfollowercount{display:none !important;}
										.iblig_posts{margin-left: 10px !important;}

										<?php	} ?>

										<?php if($getdata['profile_setting']->show_post_count==0 && $getdata['profile_setting']->show_follower_count==0){?>
											.iblig_following{margin-left: 10px !important;}
											<?php	} ?>

											<?php if($getdata['profile_setting']->show_following_count==0){?>
												.iblig_following{display:none;}
												.sfollowingcount{display:none !important;}
												.iblig_posts{margin-left: 10px !important;}

												<?php	} ?>


												<?php if($getdata['profile_setting']->show_follow_button==0){?>

													.iblig-follow-btn{display:none;}

													<?php	} ?>



													<?php if($getdata['profile_setting']->btn_bg_color=='FFFFFF' || $getdata['profile_setting']->btn_bg_color=='FFF') {?>

														.iblig-follow-btn{

															border: 1px solid #<?php echo $getdata['profile_setting']->btn_text_color?>;

														}

														<?php } ?>

														<?php 



														if(($getdata['profile_setting']->btn_text_color == 'fffff' || $getdata['profile_setting']->btn_text_color == 'FFFFFF' || $getdata['profile_setting']->btn_text_color == 'FFF') && ($getdata['profile_setting']->btn_bg_color == 'fffff' || $getdata['profile_setting']->btn_bg_color == 'FFFFFF' || $getdata['profile_setting']->btn_bg_color == 'FFF')){

															$followbtn_color = 'E4405F';

														}else{

															$followbtn_color = $getdata['profile_setting']->btn_bg_color;

														}

														?>

														.iblig-follow-btn{

															background: #<?php echo $followbtn_color?> !important;

															color: #<?php echo $getdata['profile_setting']->btn_text_color?> !important;

														}

														<?php if(($getdata['profile_setting']->btn_text_hover_color == 'fffff' || $getdata['profile_setting']->btn_text_hover_color == 'FFFFFF' || $getdata['profile_setting']->btn_text_hover_color == 'FFF') && ($getdata['profile_setting']->btn_bg_hover_color == 'fffff' || $getdata['profile_setting']->btn_bg_hover_color == 'FFFFFF' || $getdata['profile_setting']->btn_bg_hover_color == 'FFF')){

															$followbtn_hover_color = 'EE623B';

														}else{

															$followbtn_hover_color = $getdata['profile_setting']->btn_bg_hover_color;

														}?>

														.iblig-follow-btn:hover{

															background: #<?php echo $followbtn_hover_color?> !important;

															color: #<?php echo $getdata['profile_setting']->btn_text_hover_color?> !important;



														}

														<?php if($getdata['profile_setting']->show_bio_website==0){?>

															.iblig_bio,.iblig_website{display:none;}

															<?php	} ?>



															<?php if($getdata['lightbox_setting']->full_width == 0){ ?>

																.lg-outer .lg-image{

																	width: <?php echo $getdata['lightbox_setting']->width?>px !important;

																	height: <?php echo $getdata['lightbox_setting']->height?>px !important;

																}

																<?php } ?>



															</style>