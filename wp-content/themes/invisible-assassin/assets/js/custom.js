jQuery(document).ready( function () {
	jQuery('#site-navigation li').find('ul').hide();
		jQuery('#site-navigation li').hover(
			function(){
				
				jQuery(this).find('> ul').slideDown('fast');
			},
			function(){
				jQuery(this).find('ul').hide();
			});	
		
		jQuery('.menu-toggle').toggle(function() {
				jQuery('#site-navigation ul.menu').slideDown();
				jQuery('#site-navigation div.menu').fadeIn();
			},
			function() {
				jQuery('#site-navigation ul.menu').hide();
				jQuery('#site-navigation div.menu').hide();
		});
	
	});//end ready