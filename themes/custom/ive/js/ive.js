(function($, Drupal, drupalSettings) {
	// External links....
	Drupal.behaviors.externalLink = {
		attach: function (context, settings) {
		  $("a[href^='http']", context).attr('target','_blank').addClass('externalLink');	
		}
	}
	// Collapsable block...
	Drupal.behaviors.collpsableBlock = {
		attach: function (context, settings) {
		  $('.sidebar .block h2', context).click(function(){
		  	$(this).parent().find('.content').slideToggle('fast');
		   });	
		}
	}	
	// match height
	Drupal.behaviors.matchHeight = {
		attach: function (context, settings) {
			$('.view-blog.view-display-id-page_2 .views-col').matchHeight();
		}
	}

})(jQuery, Drupal, drupalSettings);
