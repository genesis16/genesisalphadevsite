jQuery(document).ready(function($) {
	
	$('.themer-pro-image-info-button').click(function() {
		var active_li = $(this).closest('li');
		
		active_li.find('.themer-pro-listed-image-inner').toggleClass('themer-pro-faded themer-pro-not-faded');
		active_li.find('.themer-pro-listed-image-info-inner').toggleClass('themer-pro-faded themer-pro-not-faded');
		active_li.find('.themer-pro-listed-image-inner.themer-pro-faded').toggle();
		active_li.find('.themer-pro-listed-image-inner.themer-pro-not-faded').fadeToggle();
		active_li.find('.themer-pro-listed-image-info-inner.themer-pro-faded').toggle();
		active_li.find('.themer-pro-listed-image-info-inner.themer-pro-not-faded').fadeToggle();
	});
	
	$('.themer-pro-image-rename-button').click(function() {
		var answer = confirm ('Are you sure you want to rename this image?');
		if(answer) {
			$('#themer-pro-image-file-control-form li').removeAttr('id');
			$(this).closest('li').attr('id', 'themer-pro-child-theme-images-list-rename');
			$('#themer-pro-image-file-control-form').submit();
		}
	});
	
	$('.themer-pro-image-delete-button').click(function() {
		var answer = confirm ('Are you sure you want to delete this image?');
		if(answer) {
			$('#themer-pro-image-file-control-form li').removeAttr('id');
			$(this).closest('li').attr('id', 'themer-pro-child-theme-images-list-delete');
			$('#themer-pro-image-file-control-form').submit();
		}
	});
	
	$('.themer-pro-image-delete-all-button').click(function() {
		var answer = confirm ('Are you sure you want to delete ALL Child Theme images?');
		if(answer) {
			$('#themer-pro-image-file-control-form li').removeAttr('id');
			$('.themer-pro-image-delete-all-button-container').attr('id', 'themer-pro-child-theme-images-list-delete-all');
			$('#themer-pro-image-file-control-form').submit();
		}
	});
	
	function show_message(response, theme_type) {
		$('#themer-pro-image-file-control-form #themer-pro-child-theme-images-list-rename .themer-pro-ajax-save-spinner').hide();
		$('#themer-pro-image-file-control-form #themer-pro-child-theme-images-list-rename .themer-pro-saved').html(response).fadeIn('slow');
		$('#themer-pro-image-file-control-form #themer-pro-child-theme-images-list-delete .themer-pro-ajax-save-spinner').hide();
		$('#themer-pro-image-file-control-form #themer-pro-child-theme-images-list-delete .themer-pro-saved').html(response).fadeIn('slow');
		$('#themer-pro-image-file-control-form #themer-pro-child-theme-images-list-delete-all .themer-pro-ajax-save-spinner').hide();
		$('#themer-pro-image-file-control-form #themer-pro-child-theme-images-list-delete-all .themer-pro-saved').html(response).fadeIn('slow');
		window.setTimeout(function() {
			$('#themer-pro-image-file-control-form .themer-pro-saved').fadeOut('slow');
			if(response.substring(0, 5) != 'Error') {
				location.reload();
			}
		}, 2222);
	}
	
	$('#themer-pro-image-file-control-form').on('submit', function() {
		$('#themer-pro-image-file-control-form #themer-pro-child-theme-images-list-rename .themer-pro-ajax-save-spinner').show();
		$('#themer-pro-image-file-control-form #themer-pro-child-theme-images-list-delete .themer-pro-ajax-save-spinner').show();
		$('#themer-pro-image-file-control-form #themer-pro-child-theme-images-list-delete-all .themer-pro-ajax-save-spinner').show();
		
		if($('#themer-pro-child-theme-images-list-rename').length != 0) {
			var action_type = 'rename';
			var name = $('#themer-pro-child-theme-images-list-rename .themer-pro-listed-image-name').attr('title');
			var new_name = $('#themer-pro-child-theme-images-list-rename .themer-pro-listed-image-name').val();
		} else if($('#themer-pro-child-theme-images-list-delete').length != 0) {
			var action_type = 'delete';
			var name = $('#themer-pro-child-theme-images-list-delete .themer-pro-listed-image-name').attr('title');
			var new_name = '';
		} else if($('#themer-pro-child-theme-images-list-delete-all').length != 0) {
			var action_type = 'delete_all';
			var name = '';
			var new_name = '';
		}
		var data = $(this).serialize()+'&action_type='+action_type+'&name='+name+'&new_name='+new_name;
		jQuery.post(ajaxurl, data, function(response) {
			if(response) {
				show_message(response);
			}
		});
		
		return false;
	});
	
});