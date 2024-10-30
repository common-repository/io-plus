jQuery(function ($) {

    $('.oi_plus_options_page_settings .iop_tabs .iop_tab').click(function(){
		$('.oi_plus_options_page_settings .iop_tabs .iop_tab').removeClass('active');
		$(this).addClass('active');
		let _type=$(this).attr('data');
		$('.oi_plus_options_page_settings .iop_tabs_view').removeClass('active');
		$('.oi_plus_options_page_settings .iop_tabs_view.'+_type).addClass('active');
	});


});



