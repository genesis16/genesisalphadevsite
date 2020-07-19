// Clipboard Plugin - clipboard.js v1.5.15 - https://zenorocha.github.io/clipboard.js - Licensed MIT
!function(e){if("object"==typeof exports&&"undefined"!=typeof module)module.exports=e();else if("function"==typeof define&&define.amd)define([],e);else{var t;t="undefined"!=typeof window?window:"undefined"!=typeof global?global:"undefined"!=typeof self?self:this,t.Clipboard=e()}}(function(){var e,t,n;return function e(t,n,i){function o(a,c){if(!n[a]){if(!t[a]){var l="function"==typeof require&&require;if(!c&&l)return l(a,!0);if(r)return r(a,!0);var s=new Error("Cannot find module '"+a+"'");throw s.code="MODULE_NOT_FOUND",s}var u=n[a]={exports:{}};t[a][0].call(u.exports,function(e){var n=t[a][1][e];return o(n?n:e)},u,u.exports,e,t,n,i)}return n[a].exports}for(var r="function"==typeof require&&require,a=0;a<i.length;a++)o(i[a]);return o}({1:[function(e,t,n){function i(e,t){for(;e&&e!==document;){if(e.matches(t))return e;e=e.parentNode}}if(Element&&!Element.prototype.matches){var o=Element.prototype;o.matches=o.matchesSelector||o.mozMatchesSelector||o.msMatchesSelector||o.oMatchesSelector||o.webkitMatchesSelector}t.exports=i},{}],2:[function(e,t,n){function i(e,t,n,i,r){var a=o.apply(this,arguments);return e.addEventListener(n,a,r),{destroy:function(){e.removeEventListener(n,a,r)}}}function o(e,t,n,i){return function(n){n.delegateTarget=r(n.target,t),n.delegateTarget&&i.call(e,n)}}var r=e("./closest");t.exports=i},{"./closest":1}],3:[function(e,t,n){n.node=function(e){return void 0!==e&&e instanceof HTMLElement&&1===e.nodeType},n.nodeList=function(e){var t=Object.prototype.toString.call(e);return void 0!==e&&("[object NodeList]"===t||"[object HTMLCollection]"===t)&&"length"in e&&(0===e.length||n.node(e[0]))},n.string=function(e){return"string"==typeof e||e instanceof String},n.fn=function(e){var t=Object.prototype.toString.call(e);return"[object Function]"===t}},{}],4:[function(e,t,n){function i(e,t,n){if(!e&&!t&&!n)throw new Error("Missing required arguments");if(!c.string(t))throw new TypeError("Second argument must be a String");if(!c.fn(n))throw new TypeError("Third argument must be a Function");if(c.node(e))return o(e,t,n);if(c.nodeList(e))return r(e,t,n);if(c.string(e))return a(e,t,n);throw new TypeError("First argument must be a String, HTMLElement, HTMLCollection, or NodeList")}function o(e,t,n){return e.addEventListener(t,n),{destroy:function(){e.removeEventListener(t,n)}}}function r(e,t,n){return Array.prototype.forEach.call(e,function(e){e.addEventListener(t,n)}),{destroy:function(){Array.prototype.forEach.call(e,function(e){e.removeEventListener(t,n)})}}}function a(e,t,n){return l(document.body,e,t,n)}var c=e("./is"),l=e("delegate");t.exports=i},{"./is":3,delegate:2}],5:[function(e,t,n){function i(e){var t;if("SELECT"===e.nodeName)e.focus(),t=e.value;else if("INPUT"===e.nodeName||"TEXTAREA"===e.nodeName)e.focus(),e.setSelectionRange(0,e.value.length),t=e.value;else{e.hasAttribute("contenteditable")&&e.focus();var n=window.getSelection(),i=document.createRange();i.selectNodeContents(e),n.removeAllRanges(),n.addRange(i),t=n.toString()}return t}t.exports=i},{}],6:[function(e,t,n){function i(){}i.prototype={on:function(e,t,n){var i=this.e||(this.e={});return(i[e]||(i[e]=[])).push({fn:t,ctx:n}),this},once:function(e,t,n){function i(){o.off(e,i),t.apply(n,arguments)}var o=this;return i._=t,this.on(e,i,n)},emit:function(e){var t=[].slice.call(arguments,1),n=((this.e||(this.e={}))[e]||[]).slice(),i=0,o=n.length;for(i;i<o;i++)n[i].fn.apply(n[i].ctx,t);return this},off:function(e,t){var n=this.e||(this.e={}),i=n[e],o=[];if(i&&t)for(var r=0,a=i.length;r<a;r++)i[r].fn!==t&&i[r].fn._!==t&&o.push(i[r]);return o.length?n[e]=o:delete n[e],this}},t.exports=i},{}],7:[function(t,n,i){!function(o,r){if("function"==typeof e&&e.amd)e(["module","select"],r);else if("undefined"!=typeof i)r(n,t("select"));else{var a={exports:{}};r(a,o.select),o.clipboardAction=a.exports}}(this,function(e,t){"use strict";function n(e){return e&&e.__esModule?e:{default:e}}function i(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}var o=n(t),r="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(e){return typeof e}:function(e){return e&&"function"==typeof Symbol&&e.constructor===Symbol&&e!==Symbol.prototype?"symbol":typeof e},a=function(){function e(e,t){for(var n=0;n<t.length;n++){var i=t[n];i.enumerable=i.enumerable||!1,i.configurable=!0,"value"in i&&(i.writable=!0),Object.defineProperty(e,i.key,i)}}return function(t,n,i){return n&&e(t.prototype,n),i&&e(t,i),t}}(),c=function(){function e(t){i(this,e),this.resolveOptions(t),this.initSelection()}return a(e,[{key:"resolveOptions",value:function e(){var t=arguments.length>0&&void 0!==arguments[0]?arguments[0]:{};this.action=t.action,this.emitter=t.emitter,this.target=t.target,this.text=t.text,this.trigger=t.trigger,this.selectedText=""}},{key:"initSelection",value:function e(){this.text?this.selectFake():this.target&&this.selectTarget()}},{key:"selectFake",value:function e(){var t=this,n="rtl"==document.documentElement.getAttribute("dir");this.removeFake(),this.fakeHandlerCallback=function(){return t.removeFake()},this.fakeHandler=document.body.addEventListener("click",this.fakeHandlerCallback)||!0,this.fakeElem=document.createElement("textarea"),this.fakeElem.style.fontSize="12pt",this.fakeElem.style.border="0",this.fakeElem.style.padding="0",this.fakeElem.style.margin="0",this.fakeElem.style.position="absolute",this.fakeElem.style[n?"right":"left"]="-9999px";var i=window.pageYOffset||document.documentElement.scrollTop;this.fakeElem.addEventListener("focus",window.scrollTo(0,i)),this.fakeElem.style.top=i+"px",this.fakeElem.setAttribute("readonly",""),this.fakeElem.value=this.text,document.body.appendChild(this.fakeElem),this.selectedText=(0,o.default)(this.fakeElem),this.copyText()}},{key:"removeFake",value:function e(){this.fakeHandler&&(document.body.removeEventListener("click",this.fakeHandlerCallback),this.fakeHandler=null,this.fakeHandlerCallback=null),this.fakeElem&&(document.body.removeChild(this.fakeElem),this.fakeElem=null)}},{key:"selectTarget",value:function e(){this.selectedText=(0,o.default)(this.target),this.copyText()}},{key:"copyText",value:function e(){var t=void 0;try{t=document.execCommand(this.action)}catch(e){t=!1}this.handleResult(t)}},{key:"handleResult",value:function e(t){this.emitter.emit(t?"success":"error",{action:this.action,text:this.selectedText,trigger:this.trigger,clearSelection:this.clearSelection.bind(this)})}},{key:"clearSelection",value:function e(){this.target&&this.target.blur(),window.getSelection().removeAllRanges()}},{key:"destroy",value:function e(){this.removeFake()}},{key:"action",set:function e(){var t=arguments.length>0&&void 0!==arguments[0]?arguments[0]:"copy";if(this._action=t,"copy"!==this._action&&"cut"!==this._action)throw new Error('Invalid "action" value, use either "copy" or "cut"')},get:function e(){return this._action}},{key:"target",set:function e(t){if(void 0!==t){if(!t||"object"!==("undefined"==typeof t?"undefined":r(t))||1!==t.nodeType)throw new Error('Invalid "target" value, use a valid Element');if("copy"===this.action&&t.hasAttribute("disabled"))throw new Error('Invalid "target" attribute. Please use "readonly" instead of "disabled" attribute');if("cut"===this.action&&(t.hasAttribute("readonly")||t.hasAttribute("disabled")))throw new Error('Invalid "target" attribute. You can\'t cut text from elements with "readonly" or "disabled" attributes');this._target=t}},get:function e(){return this._target}}]),e}();e.exports=c})},{select:5}],8:[function(t,n,i){!function(o,r){if("function"==typeof e&&e.amd)e(["module","./clipboard-action","tiny-emitter","good-listener"],r);else if("undefined"!=typeof i)r(n,t("./clipboard-action"),t("tiny-emitter"),t("good-listener"));else{var a={exports:{}};r(a,o.clipboardAction,o.tinyEmitter,o.goodListener),o.clipboard=a.exports}}(this,function(e,t,n,i){"use strict";function o(e){return e&&e.__esModule?e:{default:e}}function r(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}function a(e,t){if(!e)throw new ReferenceError("this hasn't been initialised - super() hasn't been called");return!t||"object"!=typeof t&&"function"!=typeof t?e:t}function c(e,t){if("function"!=typeof t&&null!==t)throw new TypeError("Super expression must either be null or a function, not "+typeof t);e.prototype=Object.create(t&&t.prototype,{constructor:{value:e,enumerable:!1,writable:!0,configurable:!0}}),t&&(Object.setPrototypeOf?Object.setPrototypeOf(e,t):e.__proto__=t)}function l(e,t){var n="data-clipboard-"+e;if(t.hasAttribute(n))return t.getAttribute(n)}var s=o(t),u=o(n),f=o(i),d=function(){function e(e,t){for(var n=0;n<t.length;n++){var i=t[n];i.enumerable=i.enumerable||!1,i.configurable=!0,"value"in i&&(i.writable=!0),Object.defineProperty(e,i.key,i)}}return function(t,n,i){return n&&e(t.prototype,n),i&&e(t,i),t}}(),h=function(e){function t(e,n){r(this,t);var i=a(this,(t.__proto__||Object.getPrototypeOf(t)).call(this));return i.resolveOptions(n),i.listenClick(e),i}return c(t,e),d(t,[{key:"resolveOptions",value:function e(){var t=arguments.length>0&&void 0!==arguments[0]?arguments[0]:{};this.action="function"==typeof t.action?t.action:this.defaultAction,this.target="function"==typeof t.target?t.target:this.defaultTarget,this.text="function"==typeof t.text?t.text:this.defaultText}},{key:"listenClick",value:function e(t){var n=this;this.listener=(0,f.default)(t,"click",function(e){return n.onClick(e)})}},{key:"onClick",value:function e(t){var n=t.delegateTarget||t.currentTarget;this.clipboardAction&&(this.clipboardAction=null),this.clipboardAction=new s.default({action:this.action(n),target:this.target(n),text:this.text(n),trigger:n,emitter:this})}},{key:"defaultAction",value:function e(t){return l("action",t)}},{key:"defaultTarget",value:function e(t){var n=l("target",t);if(n)return document.querySelector(n)}},{key:"defaultText",value:function e(t){return l("text",t)}},{key:"destroy",value:function e(){this.listener.destroy(),this.clipboardAction&&(this.clipboardAction.destroy(),this.clipboardAction=null)}}]),t}(u.default);e.exports=h})},{"./clipboard-action":7,"good-listener":4,"tiny-emitter":6}]},{},[8])(8)});

jQuery(document).ready(function($) {
	
	function themer_pro_ace_editor_build(textarea_id) {
	    $(textarea_id).each(function () {
	        var textarea = $(this);
	        var mode = textarea.data('editor');
	        var editDiv = $('<div>', {
	            position: 'absolute',
	            width: $('#themer-pro-file-editor-container').width(),
	            height: $('#themer-pro-file-tree-container').height() - 35,
	            'class': textarea.attr('class')
	        }).insertBefore(textarea);
	        textarea.css('display', 'none');
	        var editor = ace.edit(editDiv[0]);
	        editor.renderer.setShowGutter(true);
	        editor.setShowPrintMargin(false);
	        editor.getSession().setValue(textarea.val());
	        editor.getSession().setMode('ace/mode/'+mode);
			if(themerEditorL10n.aceEditorKeyBindings !== 'ace') {
				editor.setKeyboardHandler('ace/keyboard/'+themerEditorL10n.aceEditorKeyBindings);
			}
	        editor.setTheme('ace/theme/'+themerEditorL10n.aceEditorTheme);
			editor.setOptions({
				useWorker: themerEditorL10n.aceEditorSyntaxValidation,
			    enableBasicAutocompletion: true,
		        enableLiveAutocompletion: true,
		        enableSnippets: true,
		        useSoftTabs: true,
		        fontSize: themerEditorL10n.aceEditorFontSize+'px',
		        readOnly: themerEditorL10n.aceEditorReadOnly
			});
			
			editor.getSession().on('change', function() {
				textarea.val(editor.getSession().getValue());
				$('.themer-pro-file-editor-save-button').addClass('themer-pro-file-editor-save-button-active');
				$('.themer-pro-file-editor-copy').show();
				$('.themer-pro-file-editor-copied').hide();
			});
			
			editor.getSession().on('changeAnnotation', function() {
				$('.themer-pro-file-editor-active-form .themer-pro-file-editor-save-button').removeClass('themer-pro-file-editor-parse-error');
				var annot = editor.getSession().getAnnotations();
				for(var i = 0; i < annot.length; i++) {
					if(annot.hasOwnProperty(i)) {
						if(annot[i]['type'] == 'error' && annot[i].text != 'This.Node_Expr_Closure is not a function') {
							$('.themer-pro-file-editor-active-form .themer-pro-file-editor-save-button').addClass('themer-pro-file-editor-parse-error');	
						}
					}
				}
			});
	    });		
	}
	function resizeAce() {
		$('.ace_editor').width($('#themer-pro-file-editor-container').width());
		$('.ace_content').width($('#themer-pro-file-editor-container').width());
		$('.ace_editor').height($('#themer-pro-file-tree-container').height() - 35);
		$('.ace_content').height($('#themer-pro-file-tree-container').height() - 35);
	};
	// listen for changes
	$(window).resize(resizeAce);
	// set initially
	resizeAce();
	
	/* PHP File Tree */
	
	$('#themer-pro-file-editor-file-control-settings-icon .dashicons').click(function() {
		$('#themer-pro-file-editor-file-control-form').toggle();
		$('.themer-pro-file-tree').toggleClass('themer-pro-file-tree-short');
	});
	
	$('#themer-pro-file-editor-control-action').change(function() {
		var id_val = $(this).val().replace(/_/g, '-');
		var submit_val = $(this).val().replace(/_/g, ' ');
		submit_val = submit_val.toLowerCase().replace(/\b[a-z]/g, function(letter) {
			return letter.toUpperCase();
		});
		$('.themer-pro-file-editor-control-container').hide();
		$('#themer-pro-file-editor-'+id_val+'-container').fadeIn();
		$('.themer-pro-file-editor-control-input').removeClass('themer-pro-file-editor-control-input-active');
		$('#themer-pro-file-editor-'+id_val+'-container .themer-pro-file-editor-control-input').addClass('themer-pro-file-editor-control-input-active');
		$('#themer-pro-file-control-save-button').val(submit_val);
		if($(this).val() == 'create_file' || $(this).val() == 'delete_file') {
			$('#themer-pro-file-control-save-container .themer-pro-saved').css('left', '90px');
			$('#themer-pro-file-control-save-container .themer-pro-ajax-save-spinner').css('left', '90px');
		} else if($(this).val() == 'rename_file') {
			$('#themer-pro-file-control-save-container .themer-pro-saved').css('left', '99px');
			$('#themer-pro-file-control-save-container .themer-pro-ajax-save-spinner').css('left', '99px');
		} else if($(this).val() == 'rename_folder') {
			$('#themer-pro-file-control-save-container .themer-pro-saved').css('left', '114px');
			$('#themer-pro-file-control-save-container .themer-pro-ajax-save-spinner').css('left', '114px');
		} else {
			$('#themer-pro-file-control-save-container .themer-pro-saved').css('left', '');
			$('#themer-pro-file-control-save-container .themer-pro-ajax-save-spinner').css('left', '');
		}
	});
	$('#themer-pro-file-editor-control-action').change();
	
	$('.ctft-directory > a').click(function() {
		var folder_title = $(this).parent().attr('data-file-name');
		$('#themer-pro-file-editor-control-file-path.themer-pro-file-editor-control-input-active').val(folder_title);
		$('#themer-pro-file-editor-control-folder-path.themer-pro-file-editor-control-input-active').val(folder_title);
		$('#themer-pro-file-editor-control-folder-rename.themer-pro-file-editor-control-input-active').val(folder_title);
		$('#themer-pro-file-editor-control-delete-folder-path.themer-pro-file-editor-control-input-active').val(folder_title);
	});
	
	$('.ctft-file > a').click(function() {
		var file_title = $(this).parent().attr('data-file-name');
		$('#themer-pro-file-editor-control-file-rename.themer-pro-file-editor-control-input-active').val('/'+file_title);
		$('#themer-pro-file-editor-control-delete-file-path.themer-pro-file-editor-control-input-active').val('/'+file_title);
	});
	
	// Hide all subfolders on page load.
	$('.themer-pro-file-tree').find('ul').hide();

	$('.ctft-directory a').click(function() {
		if($(this).parent().find('.fa:first').hasClass('fa-caret-right')) {
			$(this).parent().not('#ctft-root-directory').find('.fa:first').removeClass('fa-caret-right').addClass('fa-caret-down');
		} else {
			$(this).parent().not('#ctft-root-directory').find('.fa:first').removeClass('fa-caret-down').addClass('fa-caret-right');
		}
		$(this).parent().find('ul:first').slideToggle('medium');
		if($(this).parent().attr('className') == 'ctft-directory') return false;
	});
	
	$('.ctft-file a').click(function(e) {
	    e.preventDefault();
	});
	
	$('.ctft-file-edit a').click(function() {
		if(!$(this).parent().hasClass('ctft-file-clicked')) {
			var file_rel_path = $(this).parent().attr('data-file-name');
			var file_ext = file_rel_path.substr(file_rel_path.lastIndexOf('.') + 1);
			
			if(file_ext == 'js') {
				var data_editor = 'javascript';
			} else if(file_ext == 'md' || file_ext == 'sh') {
				var data_editor = 'markdown';
			} else if(file_ext == 'txt' || file_ext == 'pot') {
				var data_editor = 'text';
			} else if(file_ext == 'json' || file_ext == 'less' || file_ext == 'sass' || file_ext == 'scss') {
				var data_editor = file_ext;
			} else {
				var data_editor = file_ext;
			}
			
			var file_name_id = file_rel_path.replace(/[/.]/g, '-');
			
			if(themerEditorL10n.aceEditorReadOnly) {
				var save_button = '<span class="themer-pro-parent-editor-read-only-button">'+themerEditorL10n.readOnlyText+'</span>';
			} else {
				var save_button = '<input class="themer-pro-file-editor-save-button" type="submit" value="'+themerEditorL10n.saveText+'" name="Submit" alt="Save Changes" />';
			}
			
			var textarea = '<div id="themer-pro-'+file_name_id+'-textarea-container" class="themer-pro-file-editor-textarea-container">';
			textarea += '<button class="themer-pro-file-editor-expand dashicons dashicons-editor-expand"></button>';
			textarea += '<button class="themer-pro-file-editor-contract dashicons dashicons-editor-contract"></button>';
			textarea += '<button id="themer-pro-'+file_name_id+'-copy" class="themer-pro-'+file_name_id+'-copy themer-pro-file-editor-copy" data-clipboard-action="copy">'+themerEditorL10n.copyCodeText+'</button>';
			textarea += '<button style="display:none;" id="themer-pro-'+file_name_id+'-copied" class="themer-pro-'+file_name_id+'-copy themer-pro-file-editor-copy themer-pro-file-editor-copied">'+themerEditorL10n.copiedText+'</button>';
			textarea += '<form action="/" id="themer-pro-'+file_name_id+'-textarea-form" class="themer-pro-file-editor-textarea-form" data-file-name="'+file_rel_path+'">';
			
			textarea += '<input type="hidden" name="action" value="themer_pro_file_editor_save" />';
			textarea += '<input type="hidden" name="security" value="'+themerEditorL10n.fileEditorNonce+'" />';
			
			textarea += '<h3>';
			textarea += save_button;
			textarea += '<img class="themer-pro-ajax-save-spinner" src="'+themerEditorL10n.pluginUrl+'/lib/css/images/ajax-save-in-progress.gif" />';
			textarea += '<span class="themer-pro-saved"></span>';
			textarea += '<span class="themer-pro-build-tools"></span>';
			textarea += '<span class="themer-pro-file-editor-heading">functions.php</span>';
			textarea += '</h3>';
			
			textarea += '<p style="margin:0;">';
			textarea += '<textarea data-editor="'+data_editor+'" wrap="off" id="themer-pro-'+file_name_id+'-textarea" class="themer-pro-tabby-textarea" name="themer[theme_file]" rows="27" style="display:none;">';
			textarea += '</textarea>';
			textarea += '</p>';
			
			textarea += '</form>';
			textarea += '</div>';
			
			$('#themer-pro-file-editor-container').append(textarea);
			
			themer_pro_file_tree_li_clicked_ajax(file_rel_path, file_name_id);
			
			/* Expand */
			
			$('.themer-pro-file-editor-expand').click(function() {
				$('#themer-pro-file-tree-editor-container').addClass('themer-pro-file-tree-editor-expanded');
				themer_pro_ace_editor_expand_css();
			});
			
			$('.wrap').on('click', '.themer-pro-file-tree-editor-expanded .ctft-file', function() {
				themer_pro_ace_editor_expand_css();
			});
			
			function themer_pro_ace_editor_expand_css() {
				$('.themer-pro-file-tree-editor-expanded .ace_editor').css('width','100%').css('height','-webkit-calc(100% - 35px)').css('height','calc(100% - 35px)');
				fire_refresh_event_on_window();
			}
			
			$('.themer-pro-file-editor-contract').click(function() {
				$('#themer-pro-file-tree-editor-container').removeClass('themer-pro-file-tree-editor-expanded');
				themer_pro_ace_editor_contract_css();
			});
			
			function themer_pro_ace_editor_contract_css() {
				$('.themer-pro-file-tree-editor-expanded .ace_editor').css('width','100%').css('height','auto');
				fire_refresh_event_on_window();
			}
			
			function fire_refresh_event_on_window() {
				var evt = document.createEvent('HTMLEvents');
				evt.initEvent('resize', true, false);
				window.dispatchEvent(evt);
				resizeAce();
			};
			
			/* END Expand */
			
		    /* Clipboard */
		    
		    var clipboard = new Clipboard('.themer-pro-'+file_name_id+'-copy', {
			    text: function() {
			        return document.getElementById('themer-pro-'+file_name_id+'-textarea').value;
			    }
			});
		    clipboard.on('success', function(e) {
		        console.log(e);
		    });
		    clipboard.on('error', function(e) {
		        console.log(e);
		    });
			$('#themer-pro-'+file_name_id+'-copy').click(function() {
				$('#themer-pro-'+file_name_id+'-copy').hide();
				$('#themer-pro-'+file_name_id+'-copied').show();				
			});
			
		    /* END Clipboard */
		}
		$(this).parent().addClass('ctft-file-clicked');
		
		var file_name = $(this).text();
		var li_id = $(this).parent().attr('id');
		themer_pro_file_tree_li_clicked(file_name, li_id);
	});
	
	function themer_pro_file_tree_li_clicked(file_name, li_id) {
		var textarea_id = li_id.slice(0,-3);
		$('.themer-pro-build-tools').html('');
		if(false !== themerEditorL10n.buildTools && file_name.slice(-4) === themerEditorL10n.buildTools) {
			if(themerEditorL10n.buildTools === 'scss') {
				var build_tool_class = 'fa-sass';
			} else {
				var build_tool_class = 'fa-less';
			}
			$('.themer-pro-build-tools').html('<i class="fab '+build_tool_class+'"></i>');
		}
		$('.themer-pro-file-editor-heading').text(file_name);
		$('.themer-pro-file-editor-textarea-container').hide();
		$('#'+textarea_id).show();
		$('form.themer-pro-file-editor-textarea-form').removeClass('themer-pro-file-editor-active-form');
		$('form#'+textarea_id.slice(0, -9)+'form').addClass('themer-pro-file-editor-active-form');
		$('.ctft-file-edit').removeClass('ctft-file-active');
		$('#'+li_id).addClass('ctft-file-active');		
	}
	
	function themer_pro_file_tree_li_clicked_ajax(file_rel_path, file_name_id) {
		if($('.themer-pro-optionbox-outer-1col').attr('id') == 'themer-pro-file-editor-settings-nav-child-editor-box') {
			var theme_type = 'child';
		} else {
			var theme_type = 'parent';
		}
		jQuery.ajax({
			type : 'post',
			url : ajaxurl,
			data : {
				action : 'themer_pro_file_tree_file_open',
				security : themerEditorL10n.themerAjaxNonce,
				file_rel_path : file_rel_path,
				theme_type : theme_type
			},
			success : function(response) {
				if(response) {
					if(response === 'thmr_empty_file') {
						response = '';
					}
					$('#themer-pro-'+file_name_id+'-textarea').text(response);
					themer_pro_ace_editor_build('#themer-pro-'+file_name_id+'-textarea');
				}
			}
		});
	}
	
	function themer_pro_file_editor_functions_file_delayed_click() {
		if(!themer_pro_get_url_parameter('activefile')) {
			setTimeout(function(){
				$('.ctft-file-functions a').click();
			}, 500);
		}
	}
	
	// First click to quickly load functions.php editor.
	$('.ctft-file-functions a').click();
	
	// Second (delayed) click to ensure proper ajax saving.
	themer_pro_file_editor_functions_file_delayed_click();
	
	function themer_pro_get_url_parameter(sParam) {
	    var sPageURL = decodeURIComponent(window.location.search.substring(1)),
	        sURLVariables = sPageURL.split('&'),
	        sParameterName,
	        i;

	    for(i = 0; i < sURLVariables.length; i++) {
	        sParameterName = sURLVariables[i].split('=');

	        if(sParameterName[0] === sParam) {
	            return sParameterName[1] === undefined ? true : sParameterName[1];
	        }
	    }
	}
	
	function show_message(response, theme_type) {
		$('#themer-pro-file-editor-file-control-form .themer-pro-ajax-save-spinner').hide();
		$('#themer-pro-file-editor-file-control-form .themer-pro-saved').html(response).fadeIn('slow');
		window.setTimeout(function() {
			$('#themer-pro-file-editor-file-control-form .themer-pro-saved').fadeOut('slow');
			if(response.substring(0, 5) != 'Error') {
				if(theme_type == 'child') {
					$('#themer-pro-file-editor-file-control-settings-icon').fadeIn().html('<span id="themer-pro-file-editor-reload-page"><a href="'+themerEditorL10n.adminUrl+'admin.php?page=themer-pro-child-editor">Reload Page</a> to see changes...</span><span class="dashicons dashicons-admin-generic"></span>');
				} else {
					$('#themer-pro-file-editor-file-control-settings-icon').fadeIn().html('<span id="themer-pro-file-editor-reload-page"><a href="'+themerEditorL10n.adminUrl+'admin.php?page=themer-pro-parent-editor">Reload Page</a> to see changes...</span><span class="dashicons dashicons-admin-generic"></span>');
				}
			}
		}, 2222);
	}
	
	$('#themer-pro-file-editor-file-control-form').on('submit', function() {
		$('#themer-pro-file-editor-file-control-form .themer-pro-ajax-save-spinner').show();
		
		if($('.themer-pro-optionbox-outer-1col').attr('id') == 'themer-pro-file-editor-settings-nav-child-editor-box') {
			var theme_type = 'child';
		} else {
			var theme_type = 'parent';
		}

		var action_type = $('#themer-pro-file-editor-control-action').val();
		if(action_type == 'create_file') {
			var name = $('#themer-pro-file-editor-control-file-name').val();
			var rel_path = $('#themer-pro-file-editor-control-file-path').val()+'/';
		} else if(action_type == 'create_folder') {
			var name = $('#themer-pro-file-editor-control-folder-name').val();
			var rel_path = $('#themer-pro-file-editor-control-folder-path').val()+'/';
		} else if(action_type == 'rename_file') {
			var name = $('#themer-pro-file-editor-control-new-file-name').val();
			var rel_path = $('#themer-pro-file-editor-control-file-rename').val();
		} else if(action_type == 'rename_folder') {
			var name = $('#themer-pro-file-editor-control-new-folder-name').val();
			var rel_path = $('#themer-pro-file-editor-control-folder-rename').val();
		} else if(action_type == 'delete_file') {
			var name = '';
			var rel_path = $('#themer-pro-file-editor-control-delete-file-path').val();
		} else if(action_type == 'delete_folder') {
			var name = '';
			var rel_path = $('#themer-pro-file-editor-control-delete-folder-path').val();
		}
		var data = $(this).serialize()+'&theme_type='+theme_type+'&action_type='+action_type+'&name='+name+'&rel_path='+rel_path;
		jQuery.post(ajaxurl, data, function(response) {
			if(response) {
				show_message(response, theme_type);
			}
		});
		
		return false;
	});
	
	/* END PHP File Tree */
	
	function themer_pro_file_editor_form_submit() {
		$('.themer-pro-file-editor-active-form .themer-pro-file-editor-save-button').mouseenter(function() {
			if($(this).hasClass('themer-pro-file-editor-parse-error') && $(this).closest('.themer-pro-file-editor-active-form').data('file-name').split('.').pop() != 'css') {
				$(this).val('Parse Error');
			}			
		}).mouseleave(function() {
			$(this).val('Save Changes');
		});
		
		function show_message(response) {
			$('#themer-pro-file-editor-container .themer-pro-ajax-save-spinner').hide();
			$('.themer-pro-file-editor-save-button').removeClass('themer-pro-file-editor-save-button-active');
			$('#themer-pro-file-editor-container .themer-pro-saved').html(response).fadeIn('slow');
			if(response === 'File Updated' || response === 'Parse Error, Check Code.') {
				window.setTimeout(function() {
					$('#themer-pro-file-editor-container .themer-pro-saved').fadeOut('slow'); 
				}, 2222);
			}
		}
		
		$('.themer-pro-file-editor-active-form').on('submit', function() {
			$('#themer-pro-file-editor-container .themer-pro-ajax-save-spinner').show();
			if($('.themer-pro-optionbox-outer-1col').attr('id') == 'themer-pro-file-editor-settings-nav-child-editor-box') {
				var theme_type = 'child';
			} else {
				var theme_type = 'parent';
			}
			if($('.themer-pro-file-editor-active-form .themer-pro-file-editor-save-button').hasClass('themer-pro-file-editor-parse-error') && $(this).data('file-name').split('.').pop() != 'css') {
				var file_rel_path = 'Parse Error';
			} else {
				var file_rel_path = $(this).attr('data-file-name');
			}
			var data = $(this).serialize()+'&theme_type='+theme_type+'&file_rel_path='+file_rel_path;
			jQuery.post(ajaxurl, data, function(response) {
				if(response) {
					$('#themer-pro-scss-php-error-message-container').remove();
					$('#themer-pro-less-php-error-message-container').remove();
					if(response !== 'File Updated' && response !== 'Parse Error, Check Code.') {
						show_message('File Updated - Compile Error: See below editor for full error message.');
						$('#themer-pro-admin-wrap').append(response);
					} else {
						show_message(response);
					}
				}
			});
			
			return false;
		});
	}
	
	$('.ctft-file').bind('click', themer_pro_file_editor_form_submit);
	
	$(window).keydown(function(e) {
		if((e.ctrlKey || e.metaKey) && e.which == 83) {
			$('.themer-pro-file-editor-active-form .themer-pro-file-editor-save-button').click();
			e.preventDefault();
			return false;
		}
		if((e.ctrlKey || e.metaKey) && e.which == 69) {
			if($('.themer-pro-file-editor-expand').is(':visible')) {
				$('.themer-pro-file-editor-expand').click();
			} else {
				$('.themer-pro-file-editor-contract').click();
			}
			e.preventDefault();
			return false;
		}
		if(e.which == 27) {
			if($('.themer-pro-file-editor-contract').is(':visible')) {
				$('.themer-pro-file-editor-contract').click();
				e.preventDefault();
				return false;
			}
		}
	});
	
});