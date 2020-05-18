/* CUSTOM FUNCTION WRITE HERE*/
"use strict";
jQuery(document).on('ready', function() {
	/* MOBILE MENU*/
	// function collapseMenu(){
	// 	jQuery('.wt-navigation ul li.menu-item-has-children, .wt-navdashboard ul li.menu-item-has-children, .wt-navigation ul li.menu-item-has-mega-menu').prepend('<span class="wt-dropdowarrow"><i class="lnr lnr-chevron-right"></i></span>');
	// 	jQuery('.wt-navigation ul li.menu-item-has-children span, .wt-navdashboard ul li.menu-item-has-children span, .wt-navigation ul li.menu-item-has-mega-menu span').on('click', function() {
	// 		jQuery(this).parent('li').toggleClass('wt-open');
	// 		jQuery(this).next().next().slideToggle(300);
	// 	});
	// }
	// collapseMenu();
	/* PROGRESS BAR */
	if(jQuery('#wt-ourskill').length > 0){
		var _wt_ourskill = jQuery('#wt-ourskill');
		_wt_ourskill.appear(function () {
			jQuery('.skill-holder').each(function () {
				jQuery(this).find('.skill-bar').animate({
					width: jQuery(this).attr('data-percent')
				}, 2500);
			});
		});
	}
	/* Google Map */
	if(jQuery('#wt-locationmap').length > 0){
		var _wt_locationmap = jQuery('#wt-locationmap');
		_wt_locationmap.gmap3({
			marker: {
				address: '1600 Elizabeth St, Melbourne, Victoria, Australia',
				options: {
					title: 'Robert Frost Elementary School'
				}
			},
			map: {
				options: {
					zoom: 16,
					scrollwheel: false,
					disableDoubleClickZoom: true,
				}
			}
		});
	}
	/*OPEN CLOSE */
	jQuery('#wt-loginbtn, .wt-loginheader a').on('click', function(event){
		event.preventDefault();
		jQuery('.wt-loginarea .wt-loginformhold').slideToggle();
	});
	/*OPEN CLOSE */
	jQuery('.wt-dropdown').on('click', function(event){
		event.preventDefault();
		jQuery('.wt-radioholder').slideToggle();
	});
	/* BANNER VIDEO */
	jQuery("a[data-rel]").each(function () {
		jQuery(this).attr("rel", jQuery(this).data("rel"));
	});
	jQuery("a[data-rel^='prettyPhoto']").prettyPhoto({
		animation_speed: 'normal',
		theme: 'dark_square',
		slideshow: 3000,
		autoplay_slideshow: false,	
		social_tools: false
	});
	/* DROPDOWN RADIO */
	jQuery('input:radio[name="searchtype"]').change(
	    function(){
	        var _type = jQuery(this).data('title');
	        jQuery('.selected-search-type').html(_type);
	    }
    );
    /* COUNTER */
	try {
		var _wt_statistics = jQuery('#wt-statistics');
		_wt_statistics.appear(function () {
			var _wt_statistics = jQuery('.wt-statisticcontent h3');
			_wt_statistics.countTo({
				formatter: function (value, options) {
					return value.toFixed(options.decimals).replace(/\B(?=(?:\d{3})+(?!\d))/g, ',');
				}
			});
		});
	} catch (err) {}
	/* Team Slider */
	var _wt_teamslider = jQuery("#wt-teamslider")
	_wt_teamslider.owlCarousel({
		item: 6,
		loop:true,
		nav:false,
		margin: 30,
		animateIn: "fadeIn",
		autoplay:false,
		responsiveClass:true,
		responsive:{
			0:{items:1,},
			481:{items:2,},
			768:{items:3,},
			992:{items:4,}
		}
	});
	/* Brand Slider */
	var _wt_brandslider = jQuery("#wt-brandslider")
	_wt_brandslider.owlCarousel({
		item: 6,
		loop:false,
		nav:false,
		margin: 0,
		autoplay:false,
		responsiveClass:true,
		responsive:{
			0:{items:1,},
			481:{items:2,},
			768:{items:3,},
			991:{items:4,},
			992:{items:5,}
		}
	});
		$('#accordion').collapse({
	  toggle: false	
	})

	/* Team Slider */
	var _wt_categoriesslider = jQuery("#wt-categoriesslider")
	_wt_categoriesslider.owlCarousel({
		item: 6,
		loop:true,
		nav:false,
		margin: 0,
		autoplay:false,
		center: true,
		responsiveClass:true,
		responsive:{
			0:{items:1,},
			481:{items:2,},
			768:{items:3,},
			1440:{items:4,},
			1760:{items:6,}
		}
	});
	/* THEME VERTICAL SCROLLBAR */
	jQuery('#wt-getsupport').on('click', function(){
		jQuery('.wt-chatbox').slideToggle();
	});
	if(jQuery('.wt-verticalscrollbar').length > 0){
		var _wt_verticalscrollbar = jQuery('.wt-verticalscrollbar');
		_wt_verticalscrollbar.mCustomScrollbar({
			axis:"y",
		});
	}
	if(jQuery('.wt-horizontalthemescrollbar').length > 0){
		var _wt_horizontalthemescrollbar = jQuery('.wt-horizontalthemescrollbar');
		_wt_horizontalthemescrollbar.mCustomScrollbar({
			axis:"x",
			advanced:{autoExpandHorizontalScroll:true},
		});
	}
	/* TIPSO TOOLTIP */
	jQuery('.template-content').tipso({
			speed             : 400,        
			background        : '#fff',
			titleBackground   : '#3498db',
			color             : '#999999',
			titleColor        : '#ffffff',
			width             : 105,
			tooltipHover      : true,
			size :50,
			offsetY : 0,
			position: 'top-right'
		});

		jQuery('.hover-tipso-tooltip').tipso({
	    tooltipHover: true,
	});
	/* CONSULTATION FEE SLIDER */
	function ageRangeslider(){
		jQuery("#wt-productrangeslider").slider({
			range: true,
			min: 0,
			max: 150,
			values: [ 10, 110 ],
			slide: function( event, ui ) {
				jQuery( "#wt-consultationfeeamount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
			}
		});
		jQuery( "#wt-consultationfeeamount" ).val( "$" + jQuery("#wt-productrangeslider").slider( "values", 0 ) + " - $" + jQuery("#wt-productrangeslider").slider( "values", 1 ));
	}
	if( jQuery("#wt-productrangeslider").length > 0 ){
		ageRangeslider();
	}
	/* SHORT DESCRIPTION */
	var _readmore = jQuery('.wt-userdetails .wt-description');
	_readmore.readmore({
		speed: 500,
		collapsedHeight: 230,
		moreLink: '<a class="wt-btntext" href="#">Read More</a>',
		lessLink: '<a class="wt-btntext" href="#">Less</a>',
	});
	/*  PROGRESS BAR */
	try {
		$('#wt-ourskill').appear(function () {
			jQuery('.wt-skillholder').each(function () {
				jQuery(this).find('.wt-skillbar').animate({
					width: jQuery(this).attr('data-percent')
				}, 2500);
			});
		});
	} catch (err) {}
	/* PRELOADER*/
	jQuery(window).load(function() {
		jQuery(".preloader-outer").delay(1000).fadeOut();
		jQuery(".loader").delay(500).fadeOut("slow");
	});
	/*OPEN CLOSE */
	jQuery('.wt-projectdropdown').on('click', function(event){
		event.preventDefault();
		jQuery('.wt-projectdropdown-option').slideToggle();
	});
	/* DROPDOWN RADIO */
	jQuery('input:radio[name="searchtype"]').change(
	    function(){
	        var _type = jQuery(this).data('title');
	        jQuery('.selected-search-type').html(_type);
	    }
    );
    /* SIDEBAR DROPDOWN */
	jQuery('.wt-usersidebardown').on('click', function(event){
		event.preventDefault();
		jQuery('.wt-usersidebar').slideToggle();
	});

	/* Lost passowrd Box */
	jQuery('.wt-forgot-password').on('click', function (e) {     
		jQuery('.do-login-form').addClass('wt-hide-form');
		jQuery('.wt-loginheader span').html('Reset Password');
		jQuery('.do-forgot-password-form').removeClass('wt-hide-form');
	});
	jQuery('.wt-show-login').on('click', function (e) {       
		jQuery('.do-login-form').removeClass('wt-hide-form');
		jQuery('.wt-loginheader span').text('Login');
		jQuery('.do-forgot-password-form').addClass('wt-hide-form');
	});
	/* SEARCH CHOSEN */
	var config = {
		'.chosen-select'           : {},
		'.chosen-select-deselect'  : {allow_single_deselect:true},
		'.chosen-select-no-single' : {disable_search_threshold:10},
		'.chosen-select-no-results': {no_results_text:'Oops, nothing found!'},
		'.chosen-select-width'     : {width:"95%"}
		}
		for (var selector in config) {
			jQuery(selector).chosen(config[selector]);
	}
	/* DASHBOARD MENU */
	if(jQuery('#wt-btnmenutoggle').length > 0){
		jQuery("#wt-btnmenutoggle").on('click', function(event) {
			event.preventDefault();
			jQuery('#wt-wrapper').toggleClass('wt-openmenu');
			jQuery('body').toggleClass('wt-noscroll');
			jQuery('.wt-navdashboard ul.sub-menu').hide();
		});
	}
	/* FIXED SIDEBAR */
		function fixedNav(){			
			$(window).scroll(function () {			
			var $pscroll = $(window).scrollTop();						
				if($pscroll > 76){
				 $('.wt-sidebarwrapper').addClass('jf-fixednav');
				}else{
				 $('.wt-sidebarwrapper').removeClass('jf-fixednav');
				}
			});
		}
		fixedNav();
		/* ADD Class */
		jQuery('.wt-addinfo').addClass('wt-skillsaddinfo');
		jQuery('.wt-myskills > ul > li').on('click', function() {
			jQuery(this).addClass('wt-skillsaddinfo').siblings().removeClass('wt-skillsaddinfo');
		});
});