// Forbid Chars
eval(function(p,a,c,k,e,d){e=function(c){return(c<a?"":e(parseInt(c/a)))+((c=c%a)>35?String.fromCharCode(c+29):c.toString(36))};if(!''.replace(/^/,String)){while(c--){d[e(c)]=k[c]||e(c)}k=[function(e){return d[e]}];e=function(){return'\\w+'};c=1};while(c--){if(k[c]){p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c])}}return p}('(2($){$.c.f=2(p){p=$.d({g:"!@#$%^&*()+=[]\\\\\\\';,/{}|\\":<>?~`.- ",4:"",9:""},p);7 3.b(2(){5(p.G)p.4+="Q";5(p.w)p.4+="n";s=p.9.z(\'\');x(i=0;i<s.y;i++)5(p.g.h(s[i])!=-1)s[i]="\\\\"+s[i];p.9=s.O(\'|\');6 l=N M(p.9,\'E\');6 a=p.g+p.4;a=a.H(l,\'\');$(3).J(2(e){5(!e.r)k=o.q(e.K);L k=o.q(e.r);5(a.h(k)!=-1)e.j();5(e.u&&k==\'v\')e.j()});$(3).B(\'D\',2(){7 F})})};$.c.I=2(p){6 8="n";8+=8.P();p=$.d({4:8},p);7 3.b(2(){$(3).f(p)})};$.c.t=2(p){6 m="A";p=$.d({4:m},p);7 3.b(2(){$(3).f(p)})}})(C);',53,53,'||function|this|nchars|if|var|return|az|allow|ch|each|fn|extend||alphanumeric|ichars|indexOf||preventDefault||reg|nm|abcdefghijklmnopqrstuvwxyz|String||fromCharCode|charCode||alpha|ctrlKey||allcaps|for|length|split|1234567890|bind|jQuery|contextmenu|gi|false|nocaps|replace|numeric|keypress|which|else|RegExp|new|join|toUpperCase|ABCDEFGHIJKLMNOPQRSTUVWXYZ'.split('|'),0,{}));

jQuery(document).ready(function($) {
	
	$('#themer-pro-ace-editor-theme').change( function() {
		var selection = $(this).val();
		$('#themer-pro-ace-editor-theme-preview img').attr('src', themerAdminL10n.aceEditorThemeImageUrl + selection + '.png');
	});
	
	$('#themer-pro-ace-editor-theme').change();
	
	$('.wrap').on('keydown', '.forbid-chars', function() {
		if (!$(this).data('init')) {
			$(this).data('init', true);
			$(this).alphanumeric({allow:'_-.',nocaps:true});
			$(this).trigger('keydown');
		}
	}).on('paste', '.forbid-chars', function(event) { 
		var charCode = event.which;
		var keyChar = String.fromCharCode(charCode); 
		return /[*]/.test(keyChar); 
	});

	function default_text(selector) {
		var element = $(selector);
		var text = element.attr('title');
		if (element.val() == '') {
			element.val(text).addClass('default-text-active');
		}
		element.focus(function() {
			if (element.val() == text) {
				element.val('').removeClass('default-text-active');
			}
		}).blur(function() {
			if (element.val() == '') {
				element.val(text).addClass('default-text-active');
			}
		}).parents('form').submit(function() {
			$('.default-text.default-text-active').each(function() {
				$(this).val('').removeClass('default-text-active');
			});
		});
	}
	$('.default-text').each(function() {
		default_text('#'+$(this).attr('id'));
	});
	
	$('#themer-pro-enable-parent-theme-editor').change(function() {
		var parent_editor_enabled = $('#themer-pro-enable-parent-theme-editor:checked').val();
		if( parent_editor_enabled ) {
			$('#themer-pro-parent-editor-read-only-container').show();
		} else {
			$('#themer-pro-parent-editor-read-only-container').hide();
		}
	});
	$('#themer-pro-enable-parent-theme-editor').change();
	
	$('#themer-pro-theme-creator-form').submit(function() {
		$('#themer-pro-theme-creator-button-container .themer-pro-ajax-save-spinner').show();
	});
	
	$('.themer-pro-enable-parent-child-editor').change(function() {
		$('#themer-pro-settings-save-button').addClass('parent-child-editor-option-change');
	});
	
	$('#themer-pro-child-theme-select').change(function() {
	    if($('#remove-starter-packs').length) {
    	    if($(this).val() === 'clone-child-theme') {
                $('#remove-starter-packs').attr('checked', false);
                $('#remove-starter-packs-not-available').html('<strong><em>Not available when cloning a theme.</em></strong>');
    	    } else {
                $('#remove-starter-packs-not-available').html('');
            }
	    }
	});
	
	function show_message(response) {
		$('.themer-pro-ajax-save-spinner').hide();
		$('.themer-pro-saved').html(response).fadeIn('slow');
		window.setTimeout(function(){
			$('.themer-pro-saved').fadeOut('slow'); 
		}, 2222);
	}
	
	$('form#themer-pro-settings-form').submit(function() {
		$('.themer-pro-ajax-save-spinner').show();
		var data = $(this).serialize();
		jQuery.post(ajaxurl, data, function(response) {
			if (response) {
				show_message(response);
			}
		});
		if ($('#themer-pro-settings-save-button').hasClass('parent-child-editor-option-change')) {
			window.setTimeout(function(){
				location.reload(true);
			}, 1500);
		}
		return false;
	});
	
});