jQuery(document).ready(function($) {
	
	$('body').addClass('themer-pro-hooks-map');
	$('#themer-pro-hooks-map').show();
	
	var show_hide_hooks_map_toggle_handler = function (event) {
		var clickCounter = $(event.target).data('clickCounter') || 0;
		
		if ( clickCounter == 0 ) {
			$('.themer-pro-mapped-hooks').addClass('themer-pro-mapped-hooks-styles').each(function(i){
			    var mapped_hook_id = $(this).attr('id');
			    $(this).text('Hook: '+mapped_hook_id);
			});
			clickCounter = 1;
		} else {
			$('.themer-pro-mapped-hooks').empty().removeClass('themer-pro-mapped-hooks-styles');
			clickCounter = 0;
		}
		
		$(event.target).data('clickCounter', clickCounter);
	};
		
	$('#themer-pro-hooks-map').bind('click', show_hide_hooks_map_toggle_handler);
	
});