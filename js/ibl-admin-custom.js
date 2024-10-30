	jQuery(document).ready(function($){

		$('.ig_access_token').on('keyup',function(){

			var lengthCount = this.value.length;       

			if(lengthCount >= 40){

				$('input[name=tabs]').removeAttr("disabled");

			}else{

				$('input[name=tabs]').attr("disabled",true);

			}

		});

		$('#ibl_action_onclick').on('change', function (e) {

			var optionSelected = $("option:selected", this);

			var valueSelected = this.value;



			if(valueSelected=="3"){

				$('.ibl_elements.actionclass').attr('style','display:block');

			}else{

				$('.ibl_elements.actionclass').attr('style','display:none');

			}



		});



		$('.img_showas').on('change', function (e) {

			var optionSelected = $("option:selected", this);

			var valueSelected = this.value;

			if(valueSelected==1){

				$('.img_show_as_gallery').attr("style","display:block!important;");

				$('.img_show_as_carousel').attr("style","display:none!important;");

				// $('.boxsettigs').attr('style','');

				$('#more_media_type').children('option[value="1"]').attr('disabled', false);

				$('#more_media_type').children('option[value="1"]').text('Load More');

				$('.media_load').attr('readonly', false);

				$('.media_load').attr('value', '12');

			}else{

				$('.img_show_as_carousel').attr("style","display:block!important;");

				$('.img_show_as_gallery').attr("style","display:none!important;");

				$('#more_media_type').children('option[value="1"]').attr('disabled', true);

				$('#more_media_type').children('option[value="1"]').text('Load More (Pro Version)');

				$('.media_load').attr('readonly', true);

				$('.media_load').attr('value', '33');

				// $('.boxsettigs').attr('style','height:318px;');

			}



		});



	var site_url = $('.hiddensiteurl').val();

	$('.display_type').on('change', function (e) {

		var optionSelected = $("option:selected", this);

		var valueSelected = this.value;

		if(valueSelected=="2"){

			$('.gallerypreviewimg').attr('src',site_url+'/img/column_2.png');

		}else if(valueSelected=="3"){

			$('.gallerypreviewimg').attr('src',site_url+'/img/column_3.png');

		}else{

			$('.gallerypreviewimg').attr('src',site_url+'/img/column_4.png');

		}



	});



	$("#slide_per_view").bind('keyup mouseup', function () {

		var val = $(this).val();  

		var site_url = $('.hiddensiteurl').val();

		if(val==4){

			$('.carousel_img').attr('src',site_url+'/img/image_4.png');

				// $('.carousel_img').attr('width','');

				$('.error').text('');

			}else if(val==5){

				$('.carousel_img').attr('src',site_url+'/img/image_5.png');

				// $('.carousel_img').attr('width','');

				$('.error').text('');

			}else if(val==6){

				$('.carousel_img').attr('src',site_url+'/img/image_6.png');

				// $('.carousel_img').attr('width','');

				$('.error').text('');

			}else if(val==7){

				$('.carousel_img').attr('src',site_url+'/img/image_7.png');

				// $('.carousel_img').attr('width','780');

				$('.error').text('');

			}else if(val==8){

				$('.carousel_img').attr('src',site_url+'/img/image_8.png');

				// $('.carousel_img').attr('width','780');

				$('.error').text('');

			}else if(val <=3 ){

				$('.error').text('value must be grater than or equal to 4');

			}else if(val >=9 ){

				$('.error').text('value must be less than or equal to 8');

			}      

		});



	var tab = $('input[name=tabs]:checked').val();

	if(tab==2){

		$('.ibl_username').prop('required',true);

	}

	// $('#display_media_for').on('change', function (e) {

	// 	var optionSelected = $("option:selected", this);

	// 	var valueSelected = this.value;

	// 	var tab = $('input[name=tabs]:checked').val();



	// 	if(valueSelected=="username"){

	// 		$('.ibl_elements.forusername').attr('style','display:block');

	// 		$('.ibl_elements.foruserhash').attr('style','display:none');

	// 		if(tab==2){

	// 			$('.ibl_username').prop('required',true);

	// 			$('.ibl_userhash').removeAttr('required');

	// 		}

	// 	}else{

	// 		$('.ibl_elements.foruserhash').attr('style','display:block');

	// 		$('.ibl_elements.forusername').attr('style','display:none');

	// 		if(tab==2){

	// 			$('.ibl_userhash').prop('required',true);

	// 			$('.ibl_username').removeAttr('required');

	// 		}

	// 	}



	// });



	$('.lightbox_fullwidth').on('change', function (e) {

		var optionSelected = $("option:selected", this);

		var valueSelected = this.value;



		if(valueSelected=="0"){

			$('.lightbox_setting').show();

		}else{

			$('.lightbox_setting').hide();

		}



	});



	$('.profile_showas').on('change', function (e) {

		var optionSelected = $("option:selected", this);

		var valueSelected = this.value;

		console.log(valueSelected);

		if(valueSelected==1){

			$('.changeprofiletype').attr("style","border-radius: 50%;");

		}else{

			$('.changeprofiletype').attr("style","");

		}



	});



	$('#more_media_type').on('change', function (e) {

		var optionSelected = $("option:selected", this);

		var valueSelected = this.value;

		if(valueSelected==1){

			$('.load_btn_title').attr("value","Load More");

		}else if(valueSelected==2){

			$('.load_btn_title').attr("value","View on Instagram");

		}



	});



	

});





	$(document).ready(function() {

		

		$('table.ig-gallery-list').each(function() {

			var currentPage = 0;

			var numPerPage = 10;

			var $table = $(this);

			$table.bind('repaginate', function() {

				$table.find('tbody tr').hide().slice(currentPage * numPerPage, (currentPage + 1) * numPerPage).show();

			});

			$table.trigger('repaginate');

			var numRows = $table.find('tbody tr').length;

			var numPages = Math.ceil(numRows / numPerPage);

			var $pager = $('<div class="pager"></div>');

			var $previous = $('<span class="previous"><<</spnan>');

			var $next = $('<span class="next">>></spnan>');

			for (var page = 0; page < numPages; page++) {

				$('<span class="page-number"></span>').text(page + 1).bind('click', {

					newPage: page

				}, function(event) {

					currentPage = event.data['newPage'];

					$table.trigger('repaginate');

					$(this).addClass('active').siblings().removeClass('active');

				}).appendTo($pager).addClass('clickable');

			}

			$pager.insertAfter($table).find('span.page-number:first').addClass('active');

			$previous.insertBefore('span.page-number:first');

			$next.insertAfter('span.page-number:last');



			$next.click(function (e) {

				$previous.addClass('clickable');

				$pager.find('.active').next('.page-number.clickable').click();

			});

			$previous.click(function (e) {

				$next.addClass('clickable');

				$pager.find('.active').prev('.page-number.clickable').click();

			});

			$table.on('repaginate', function () {

				$next.addClass('clickable');

				$previous.addClass('clickable');



				setTimeout(function () {

					var $active = $pager.find('.page-number.active');

					if ($active.next('.page-number.clickable').length === 0) {

						$next.removeClass('clickable');

					} else if ($active.prev('.page-number.clickable').length === 0) {

						$previous.removeClass('clickable');

					}

				});

			});

			$table.trigger('repaginate');

		});

});