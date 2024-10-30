var $ = jQuery;	
/* LIGHTGALLERY AUTOUPDATE */
!function(e,t,i,s){"use strict";var o={autoUpdate_itemsAutoUpdate:!0,autoUpdate_imageCount:0,autoUpdate_hasRefreshEvent:!1},r=function(e){return this.core=jQuery(e).data("lightGallery"),this.$el=jQuery(e),this.core.s=jQuery.extend({},o,this.core.s),this.init(),this};r.prototype.init=function(){if(this.core.s.autoUpdate_itemsAutoUpdate){if(0!==this.core.s.autoUpdate_imageCount){var e=this;this.$el.on("onAfterOpen.lg",function(){e.setCounter(e.core.s.autoUpdate_imageCount)})}this.core.s.autoUpdate_hasRefreshEvent||(this.$el.on("refreshItems",this.refreshItems),this.core.s.autoUpdate_hasRefreshEvent=!0)}},r.prototype.refreshItems=function(){var e=this;this.core=jQuery(this).data("lightGallery"),this.core.s.dynamic?this.core.$items=this.core.s.dynamicEl:"this"===this.core.s.selector?this.core.$items=this.core.$el:""!==this.core.s.selector?this.core.s.selectWithin?this.core.$items=jQuery(this.core.s.selectWithin).find(this.core.s.selector):this.core.$items=this.core.$el.find(jQuery(this.core.s.selector)):this.core.$items=this.core.$el.children();for(var t=this.core.$items.length-this.core.$outer.find(".lg-inner").find(".lg-item").length;t>0;){var i=jQuery('<div class="lg-item"></div>');this.core.$outer.find(".lg-inner").append(i),this.core.$slide=this.core.$outer.find(".lg-item"),t--}this.core.$items.on("click.lgcustom",function(t){try{t.preventDefault()}catch(e){t.returnValue=!1}e.core.$el.trigger("onBeforeOpen.lg"),e.core.index=e.core.s.index||e.core.$items.index(this),jQuery("body").hasClass("lg-on")||(e.core.build(e.core.index),jQuery("body").addClass("lg-on"))}),this.core.enableSwipe(),this.core.enableDrag(),0===this.core.s.autoUpdate_imageCount&&this.core.modules.autoUpdate.setCounter(this.core.$items.length)},r.prototype.setCounter=function(e){this.core.$outer.find("#lg-counter-all").html(e)},r.prototype.destroy=function(){},jQuery.fn.lightGallery.modules.autoUpdate=r}(jQuery,window,document);
/* END */

$(document).ready(function(){

	var autoplay = $('.autoplay').val();

	if(autoplay==1){

		var flag = true;

	}else{

		var flag = false;

	}

	var prevnextbtn = $('.prevnextbtn').val();

	if(prevnextbtn==1){

		var prevnext = true;

	}else{

		var prevnext = false;

	}

	var lightboxeffect = $('.lightboxeffect').val();

	if(lightboxeffect=='none'){

		var light_effect = 'lg-slide';

	}else{

		var light_effect = 'lg-fade';

	}

	function createLightGallery()
	{
		var methods = $('.ibliglightgallery');

		methods.lightGallery({
    // videojs: true,
    mode: light_effect,
    selector: '.item',
    cssEasing : 'ease',
    speed: 600,

    controls: prevnext,

    autoplay: flag,

    toogleThumb:false,

    thumbnail:false,

    share:false,

    actualSize:false,

    fullScreen:false,

    download:false,

    zoom:false,

});
	}

// on document load
$(document).ready(function(){
	createLightGallery();
});
var baseurl = $('.baseurl').val();

var ajaxurl = baseurl + 'admin-ajax.php';

function handleClick(e) {
	var url = $('.nexturl').val();

	var ibligid = $('.ibligid').val();

	$(".loadmoremedia").attr("disabled",true);
	$(".loadmoremedia").attr("style","cursor:not-allowed !important");
	$('.loadmoremedia').off('click');
	if(url != ""){

		$.ajax(

		{

			url : ajaxurl,

			type : 'post',

			dataType:'JSON',

			data : {

				action : 'load_more_data',

				url : url,

				ibligid:ibligid,

				flag:1

			},

			success : function(response) {

				if(response.Data !=''){

					// $('.text').html(response.html);

					$(".nexturl").attr("value",response.next_url);

					$('.iblig-lightgallery').append(response.Data);

					// methods.trigger('refreshItems');
					if($(".ibliglightgallery").data("lightGallery")){
						$(".ibliglightgallery").data("lightGallery").destroy(true);
						createLightGallery();
					}


				}else{

					$(".loadmoremedia").attr("style",'display:none!important');

				}

			},

			complete: function() {
				$(".loadmoremedia").removeAttr("disabled");
				$(".loadmoremedia").attr("style","cursor:pointer!important;");
				$('.loadmoremedia').bind('click'); 
			}

		});
	}else{
		$(".loadmoremedia").attr("style",'display:none!important');
	}
}

	// $(".loadmoremedia").on('click', function (e) {

	// });

$(document).on('click','.loadmoremedia', handleClick);


var item = $('.item').val();

var cautoplay = $('.cautoplay').val();

if(cautoplay==1){

	var cflag = true;

}else{

	var cflag = false;

}

var show_nav_arrow = $('.show_nav_arrow').val();

if(show_nav_arrow==1){

	var nflag = true;

}else{

	var nflag = false;

}

var show_dotted_arrow = $('.show_dotted_arrow').val();

if(show_dotted_arrow==1){

	var dflag = true;

}else{

	var dflag = false;

}



$("#owl-demo").owlCarousel({



	slideSpeed : 5000,

	paginationSpeed : 800,

	autoplay: cflag,

	autoPlaySpeed: 5000,

	autoPlayTimeout: 5000,

	autoplayHoverPause: true,

	items : 1,

	itemsDesktop : [1199,3],

	itemsDesktopSmall : [979,3],

	goToFirst : true,

	goToFirstSpeed : 1000,

	nav : nflag,

	navText : "",

	dots: dflag,

	pagination : true,

	paginationNumbers: true,

	responsive : {
		0: {
			items: 2
		},
		479: {
			items: 3
		},
		768: {
			items: 4
		},
		1024 : { items : item }
	},	

});

var navheight = $('.iblig_standard_postimg_div').outerHeight();

console.log(navheight);

$('.owl-prev').attr("style","height:"+navheight+"px !important");

$('.owl-next').attr("style","height:"+navheight+"px !important");


if(navheight < 100){

	$('.owl-prev').attr("style","height:"+navheight+"px !important;font-size:30px !important");

	$('.owl-next').attr("style","height:"+navheight+"px !important;font-size:30px !important");	

	if( navigator.userAgent.match(/Android/i) || navigator.userAgent.match(/BlackBerry/i) || navigator.userAgent.match(/iPhone|iPad|iPod/i) || navigator.userAgent.match(/Opera Mini/i) || navigator.userAgent.match(/IEMobile/i) ) {

		$('.iblig-likescomments').attr("style","top: 40% !important;");

	}else{

		$('.iblig-likescomments').attr("style","font-size:13px !important;top: 40% !important;");	

	}

}







var owl = $('.owl-carousel');

owl.owlCarousel();


$(".prev-next-button.next").on('click',function(){  

	$('.owl-next').click();

	// $("#owl-demo").trigger('owl.next');

})

$(".prev-next-button.previous").on('click',function(){  

	$('.owl-prev').click();

	// $("#owl-demo").trigger('owl.prev');

})



});


var resizeTimer;

$(window).on('resize', function(e) {

	clearTimeout(resizeTimer);
	resizeTimer = setTimeout(doneResizing, 400);

});

function doneResizing(){
	var navheight = $('.iblig_standard_postimg_div').outerHeight();

	console.log(navheight);

	$('.owl-prev').attr("style","height:"+navheight+"px !important");

	$('.owl-next').attr("style","height:"+navheight+"px !important");
}