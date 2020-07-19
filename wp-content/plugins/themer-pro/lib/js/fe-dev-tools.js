// Clipboard Plugin - clipboard.js v1.5.15 - https://zenorocha.github.io/clipboard.js - Licensed MIT
!function(e){if("object"==typeof exports&&"undefined"!=typeof module)module.exports=e();else if("function"==typeof define&&define.amd)define([],e);else{var t;t="undefined"!=typeof window?window:"undefined"!=typeof global?global:"undefined"!=typeof self?self:this,t.Clipboard=e()}}(function(){var e,t,n;return function e(t,n,i){function o(a,c){if(!n[a]){if(!t[a]){var l="function"==typeof require&&require;if(!c&&l)return l(a,!0);if(r)return r(a,!0);var s=new Error("Cannot find module '"+a+"'");throw s.code="MODULE_NOT_FOUND",s}var u=n[a]={exports:{}};t[a][0].call(u.exports,function(e){var n=t[a][1][e];return o(n?n:e)},u,u.exports,e,t,n,i)}return n[a].exports}for(var r="function"==typeof require&&require,a=0;a<i.length;a++)o(i[a]);return o}({1:[function(e,t,n){function i(e,t){for(;e&&e!==document;){if(e.matches(t))return e;e=e.parentNode}}if(Element&&!Element.prototype.matches){var o=Element.prototype;o.matches=o.matchesSelector||o.mozMatchesSelector||o.msMatchesSelector||o.oMatchesSelector||o.webkitMatchesSelector}t.exports=i},{}],2:[function(e,t,n){function i(e,t,n,i,r){var a=o.apply(this,arguments);return e.addEventListener(n,a,r),{destroy:function(){e.removeEventListener(n,a,r)}}}function o(e,t,n,i){return function(n){n.delegateTarget=r(n.target,t),n.delegateTarget&&i.call(e,n)}}var r=e("./closest");t.exports=i},{"./closest":1}],3:[function(e,t,n){n.node=function(e){return void 0!==e&&e instanceof HTMLElement&&1===e.nodeType},n.nodeList=function(e){var t=Object.prototype.toString.call(e);return void 0!==e&&("[object NodeList]"===t||"[object HTMLCollection]"===t)&&"length"in e&&(0===e.length||n.node(e[0]))},n.string=function(e){return"string"==typeof e||e instanceof String},n.fn=function(e){var t=Object.prototype.toString.call(e);return"[object Function]"===t}},{}],4:[function(e,t,n){function i(e,t,n){if(!e&&!t&&!n)throw new Error("Missing required arguments");if(!c.string(t))throw new TypeError("Second argument must be a String");if(!c.fn(n))throw new TypeError("Third argument must be a Function");if(c.node(e))return o(e,t,n);if(c.nodeList(e))return r(e,t,n);if(c.string(e))return a(e,t,n);throw new TypeError("First argument must be a String, HTMLElement, HTMLCollection, or NodeList")}function o(e,t,n){return e.addEventListener(t,n),{destroy:function(){e.removeEventListener(t,n)}}}function r(e,t,n){return Array.prototype.forEach.call(e,function(e){e.addEventListener(t,n)}),{destroy:function(){Array.prototype.forEach.call(e,function(e){e.removeEventListener(t,n)})}}}function a(e,t,n){return l(document.body,e,t,n)}var c=e("./is"),l=e("delegate");t.exports=i},{"./is":3,delegate:2}],5:[function(e,t,n){function i(e){var t;if("SELECT"===e.nodeName)e.focus(),t=e.value;else if("INPUT"===e.nodeName||"TEXTAREA"===e.nodeName)e.focus(),e.setSelectionRange(0,e.value.length),t=e.value;else{e.hasAttribute("contenteditable")&&e.focus();var n=window.getSelection(),i=document.createRange();i.selectNodeContents(e),n.removeAllRanges(),n.addRange(i),t=n.toString()}return t}t.exports=i},{}],6:[function(e,t,n){function i(){}i.prototype={on:function(e,t,n){var i=this.e||(this.e={});return(i[e]||(i[e]=[])).push({fn:t,ctx:n}),this},once:function(e,t,n){function i(){o.off(e,i),t.apply(n,arguments)}var o=this;return i._=t,this.on(e,i,n)},emit:function(e){var t=[].slice.call(arguments,1),n=((this.e||(this.e={}))[e]||[]).slice(),i=0,o=n.length;for(i;i<o;i++)n[i].fn.apply(n[i].ctx,t);return this},off:function(e,t){var n=this.e||(this.e={}),i=n[e],o=[];if(i&&t)for(var r=0,a=i.length;r<a;r++)i[r].fn!==t&&i[r].fn._!==t&&o.push(i[r]);return o.length?n[e]=o:delete n[e],this}},t.exports=i},{}],7:[function(t,n,i){!function(o,r){if("function"==typeof e&&e.amd)e(["module","select"],r);else if("undefined"!=typeof i)r(n,t("select"));else{var a={exports:{}};r(a,o.select),o.clipboardAction=a.exports}}(this,function(e,t){"use strict";function n(e){return e&&e.__esModule?e:{default:e}}function i(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}var o=n(t),r="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(e){return typeof e}:function(e){return e&&"function"==typeof Symbol&&e.constructor===Symbol&&e!==Symbol.prototype?"symbol":typeof e},a=function(){function e(e,t){for(var n=0;n<t.length;n++){var i=t[n];i.enumerable=i.enumerable||!1,i.configurable=!0,"value"in i&&(i.writable=!0),Object.defineProperty(e,i.key,i)}}return function(t,n,i){return n&&e(t.prototype,n),i&&e(t,i),t}}(),c=function(){function e(t){i(this,e),this.resolveOptions(t),this.initSelection()}return a(e,[{key:"resolveOptions",value:function e(){var t=arguments.length>0&&void 0!==arguments[0]?arguments[0]:{};this.action=t.action,this.emitter=t.emitter,this.target=t.target,this.text=t.text,this.trigger=t.trigger,this.selectedText=""}},{key:"initSelection",value:function e(){this.text?this.selectFake():this.target&&this.selectTarget()}},{key:"selectFake",value:function e(){var t=this,n="rtl"==document.documentElement.getAttribute("dir");this.removeFake(),this.fakeHandlerCallback=function(){return t.removeFake()},this.fakeHandler=document.body.addEventListener("click",this.fakeHandlerCallback)||!0,this.fakeElem=document.createElement("textarea"),this.fakeElem.style.fontSize="12pt",this.fakeElem.style.border="0",this.fakeElem.style.padding="0",this.fakeElem.style.margin="0",this.fakeElem.style.position="absolute",this.fakeElem.style[n?"right":"left"]="-9999px";var i=window.pageYOffset||document.documentElement.scrollTop;this.fakeElem.addEventListener("focus",window.scrollTo(0,i)),this.fakeElem.style.top=i+"px",this.fakeElem.setAttribute("readonly",""),this.fakeElem.value=this.text,document.body.appendChild(this.fakeElem),this.selectedText=(0,o.default)(this.fakeElem),this.copyText()}},{key:"removeFake",value:function e(){this.fakeHandler&&(document.body.removeEventListener("click",this.fakeHandlerCallback),this.fakeHandler=null,this.fakeHandlerCallback=null),this.fakeElem&&(document.body.removeChild(this.fakeElem),this.fakeElem=null)}},{key:"selectTarget",value:function e(){this.selectedText=(0,o.default)(this.target),this.copyText()}},{key:"copyText",value:function e(){var t=void 0;try{t=document.execCommand(this.action)}catch(e){t=!1}this.handleResult(t)}},{key:"handleResult",value:function e(t){this.emitter.emit(t?"success":"error",{action:this.action,text:this.selectedText,trigger:this.trigger,clearSelection:this.clearSelection.bind(this)})}},{key:"clearSelection",value:function e(){this.target&&this.target.blur(),window.getSelection().removeAllRanges()}},{key:"destroy",value:function e(){this.removeFake()}},{key:"action",set:function e(){var t=arguments.length>0&&void 0!==arguments[0]?arguments[0]:"copy";if(this._action=t,"copy"!==this._action&&"cut"!==this._action)throw new Error('Invalid "action" value, use either "copy" or "cut"')},get:function e(){return this._action}},{key:"target",set:function e(t){if(void 0!==t){if(!t||"object"!==("undefined"==typeof t?"undefined":r(t))||1!==t.nodeType)throw new Error('Invalid "target" value, use a valid Element');if("copy"===this.action&&t.hasAttribute("disabled"))throw new Error('Invalid "target" attribute. Please use "readonly" instead of "disabled" attribute');if("cut"===this.action&&(t.hasAttribute("readonly")||t.hasAttribute("disabled")))throw new Error('Invalid "target" attribute. You can\'t cut text from elements with "readonly" or "disabled" attributes');this._target=t}},get:function e(){return this._target}}]),e}();e.exports=c})},{select:5}],8:[function(t,n,i){!function(o,r){if("function"==typeof e&&e.amd)e(["module","./clipboard-action","tiny-emitter","good-listener"],r);else if("undefined"!=typeof i)r(n,t("./clipboard-action"),t("tiny-emitter"),t("good-listener"));else{var a={exports:{}};r(a,o.clipboardAction,o.tinyEmitter,o.goodListener),o.clipboard=a.exports}}(this,function(e,t,n,i){"use strict";function o(e){return e&&e.__esModule?e:{default:e}}function r(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}function a(e,t){if(!e)throw new ReferenceError("this hasn't been initialised - super() hasn't been called");return!t||"object"!=typeof t&&"function"!=typeof t?e:t}function c(e,t){if("function"!=typeof t&&null!==t)throw new TypeError("Super expression must either be null or a function, not "+typeof t);e.prototype=Object.create(t&&t.prototype,{constructor:{value:e,enumerable:!1,writable:!0,configurable:!0}}),t&&(Object.setPrototypeOf?Object.setPrototypeOf(e,t):e.__proto__=t)}function l(e,t){var n="data-clipboard-"+e;if(t.hasAttribute(n))return t.getAttribute(n)}var s=o(t),u=o(n),f=o(i),d=function(){function e(e,t){for(var n=0;n<t.length;n++){var i=t[n];i.enumerable=i.enumerable||!1,i.configurable=!0,"value"in i&&(i.writable=!0),Object.defineProperty(e,i.key,i)}}return function(t,n,i){return n&&e(t.prototype,n),i&&e(t,i),t}}(),h=function(e){function t(e,n){r(this,t);var i=a(this,(t.__proto__||Object.getPrototypeOf(t)).call(this));return i.resolveOptions(n),i.listenClick(e),i}return c(t,e),d(t,[{key:"resolveOptions",value:function e(){var t=arguments.length>0&&void 0!==arguments[0]?arguments[0]:{};this.action="function"==typeof t.action?t.action:this.defaultAction,this.target="function"==typeof t.target?t.target:this.defaultTarget,this.text="function"==typeof t.text?t.text:this.defaultText}},{key:"listenClick",value:function e(t){var n=this;this.listener=(0,f.default)(t,"click",function(e){return n.onClick(e)})}},{key:"onClick",value:function e(t){var n=t.delegateTarget||t.currentTarget;this.clipboardAction&&(this.clipboardAction=null),this.clipboardAction=new s.default({action:this.action(n),target:this.target(n),text:this.text(n),trigger:n,emitter:this})}},{key:"defaultAction",value:function e(t){return l("action",t)}},{key:"defaultTarget",value:function e(t){var n=l("target",t);if(n)return document.querySelector(n)}},{key:"defaultText",value:function e(t){return l("text",t)}},{key:"destroy",value:function e(){this.listener.destroy(),this.clipboardAction&&(this.clipboardAction.destroy(),this.clipboardAction=null)}}]),t}(u.default);e.exports=h})},{"./clipboard-action":7,"good-listener":4,"tiny-emitter":6}]},{},[8])(8)});

jQuery(document).ready(function($) {
	
	var fe_dev_tools = '<div id="themer-pro-fe-dev-tools" style="display:none;">';
	fe_dev_tools += '<h3><span class="dashicons dashicons-move" style="padding-top:3px;"></span></h3>';
	fe_dev_tools += '<div id="themer-pro-fe-dev-tools-nav">';
	fe_dev_tools += '<span id="themer-pro-css-sandbox-heading" style="display:none">'+themerDevToolsL10n.cssSandboxHeading+'</span>';
	fe_dev_tools += '<span id="themer-pro-html-sandbox-heading" style="display:none">'+themerDevToolsL10n.htmlSandboxHeading+'</span>';
	fe_dev_tools += '<span id="themer-pro-css-sandbox-cut-icon" class="themer-pro-fe-dev-tools-icons themer-pro-sandbox-copy-icons themer-pro-code-builder-output-cut dashicons dashicons-admin-page" data-clipboard-action="cut" data-clipboard-target="#themer-pro-css-sandbox-output" title="'+themerDevToolsL10n.htmlTitleCopyCss+'" style="display:none"></span>';
	fe_dev_tools += '<span id="themer-pro-css-sandbox-copied-text" class="themer-pro-code-builder-output-cut themer-pro-sandbox-copy-icons" style="display:none">'+themerDevToolsL10n.cssSandboxCopied+'</span>';
	fe_dev_tools += '<span id="themer-pro-html-sandbox-cut-icon" class="themer-pro-fe-dev-tools-icons themer-pro-sandbox-copy-icons themer-pro-code-builder-output-cut dashicons dashicons-admin-page" data-clipboard-action="cut" data-clipboard-target="#themer-pro-html-sandbox-output" title="'+themerDevToolsL10n.htmlTitleCopyHtml+'" style="display:none"></span>';
	fe_dev_tools += '<span id="themer-pro-html-sandbox-copied-text" class="themer-pro-code-builder-output-cut themer-pro-sandbox-copy-icons" style="display:none">'+themerDevToolsL10n.htmlSandboxCopied+'</span>';
	fe_dev_tools += '<span id="themer-pro-fe-dev-tools-style-icon" class="themer-pro-fe-dev-tools-icons themer-pro-fe-dev-tool-icon dashicons dashicons-editor-code themer-pro-fe-dev-tool-active" title="'+themerDevToolsL10n.htmlTitleOpenStyle+'"></span>';
	fe_dev_tools += '<span id="themer-pro-fe-dev-tools-css-icon" class="themer-pro-fe-dev-tools-icons themer-pro-fe-dev-tool-icon dashicons dashicons-admin-customizer" title="'+themerDevToolsL10n.htmlTitleOpenCss+'"></span>';
	fe_dev_tools += '<span id="themer-pro-fe-dev-tools-html-icon" class="themer-pro-fe-dev-tools-icons themer-pro-fe-dev-tool-icon dashicons dashicons-edit" title="'+themerDevToolsL10n.htmlTitleOpenHtml+'"></span>';
	fe_dev_tools += '<span id="themer-pro-fe-dev-tools-contract-icon" class="themer-pro-fe-dev-tools-icons dashicons dashicons-editor-contract" title="'+themerDevToolsL10n.htmlTitleUndoResize+'"></span>';
	fe_dev_tools += '<span id="themer-pro-css-sandbox-clear-icon" class="themer-pro-fe-dev-tools-icons themer-pro-sandbox-clear-icons dashicons dashicons-dismiss" title="'+themerDevToolsL10n.htmlTitleClearTextarea+'" style="display:none;"></span>';
	fe_dev_tools += '<span id="themer-pro-html-sandbox-clear-icon" class="themer-pro-fe-dev-tools-icons themer-pro-sandbox-clear-icons dashicons dashicons-dismiss" title="'+themerDevToolsL10n.htmlTitleClearTextarea+'" style="display:none"></span>';
	fe_dev_tools += '<span id="themer-pro-html-sandbox-outdent-icon" class="themer-pro-fe-dev-tools-icons themer-pro-html-sandbox-word-wrap-icons dashicons dashicons-editor-outdent" title="'+themerDevToolsL10n.htmlTitleWrapOn+'"></span>';
	fe_dev_tools += '<span id="themer-pro-html-sandbox-justify-icon" class="themer-pro-fe-dev-tools-icons themer-pro-html-sandbox-word-wrap-icons dashicons dashicons-editor-justify" title="'+themerDevToolsL10n.htmlTitleWrapOff+'" style="display:none;"></span>';
	fe_dev_tools += '</div><!-- END #themer-pro-fe-dev-tools-nav -->';
	fe_dev_tools += '<div id="themer-pro-style-editor-container">';
	fe_dev_tools += '<form action="/" id="themer-pro-style-editor-form" name="themer-pro-style-editor-form">';
	fe_dev_tools += '<input type="hidden" name="action" value="themer_pro_style_editor_save" />';
	fe_dev_tools += '<input type="hidden" name="security" value="'+themerDevToolsL10n.styleEditorNonce+'" />';
	fe_dev_tools += '<input id="themer-pro-style-editor-save-button" type="submit" value="'+themerDevToolsL10n.saveButtonText+'" name="Submit" alt="Save Changes" />';
	fe_dev_tools += '<img class="themer-pro-ajax-save-spinner" src="'+themerDevToolsL10n.saveSpinner+'" />';
	fe_dev_tools += '<span class="themer-pro-saved"></span>';
	fe_dev_tools += '<textarea data-editor="css" wrap="off" id="themer-pro-style-editor-output" class="themer-pro-code-builder-output" name="themer-pro-style-editor[styles]">'+themerDevToolsL10n.childStyles+'</textarea>';
	fe_dev_tools += '</form><!-- END #themer-pro-style-editor-form -->';
	fe_dev_tools += '</div><!-- END #themer-pro-style-editor-container -->';
	fe_dev_tools += '<div id="themer-pro-css-sandbox-container" style="display:none;">';
	fe_dev_tools += '<form action="/" id="themer-pro-css-sandbox-form" name="themer-pro-css-sandbox-form">';
	fe_dev_tools += '<textarea data-editor="css" wrap="off" id="themer-pro-css-sandbox-output" class="themer-pro-code-builder-output" name="themer-pro-css-sandbox-output"></textarea>';				
	fe_dev_tools += '</form><!-- END #themer-pro-css-sandbox-form -->';
	fe_dev_tools += '</div><!-- END #themer-pro-css-sandbox-container -->';
	fe_dev_tools += '<div id="themer-pro-html-sandbox-container" style="display:none;">';
	fe_dev_tools += '<form action="/" id="themer-pro-html-sandbox-form" name="themer-pro-html-sandbox-form">';
	fe_dev_tools += '<textarea data-editor="html" wrap="off" id="themer-pro-html-sandbox-output" class="themer-pro-code-builder-output" name="themer-pro-html-sandbox-output"></textarea>';			
	fe_dev_tools += '</form><!-- END #themer-pro-html-sandbox-form -->';
	fe_dev_tools += '</div><!-- END #themer-pro-html-sandbox-container -->';
	fe_dev_tools += '</div><!-- END #themer-pro-fe-dev-tools -->';
	
	$('body').addClass('themer-pro-fe-dev-tools').append('<span id="themer-pro-viewport-size-indicator" style="display:none;"></span>').wrapInner('<div id="themer-pro-fe-dev-tools-body-wrap"></div>');
	$('#themer-pro-fe-dev-tools-body-wrap').before('<span id="themer-pro-fe-dev-tools-tab" class="themer-pro-fe-dev-tool-icon"><span class="dashicons dashicons-editor-code"></span></span>');
	$('#themer-pro-fe-dev-tools-body-wrap').before(themerDevToolsL10n.themeStylesOutput);
	$('#themer-pro-fe-dev-tools-body-wrap').before('<span id="themer-pro-style-editor-css" style="display:none;"></span>');
	$('#themer-pro-fe-dev-tools-body-wrap').before('<span id="themer-pro-css-sandbox-css" style="display:none;"></span>');
	$('#themer-pro-fe-dev-tools-body-wrap').before(fe_dev_tools);
	
	var resizeTimer;
	
	$(window).on('resize', function() {
		
		var width = $(this).width() + scrollbar_width();
		var height = $(this).height();
		
		if(width <= 782) {
			$('body').addClass('themer-pro-wordpress-admin-bar-tall');
		} else {
			$('body').removeClass('themer-pro-wordpress-admin-bar-tall');
		}
		$('#themer-pro-viewport-size-indicator').text('w: '+width+'px / h: '+height+'px').show();
		
		clearTimeout(resizeTimer);
		resizeTimer = setTimeout(function() {
			$('#themer-pro-viewport-size-indicator').hide().text('');
		}, 1000);
		
	});
	
	function scrollbar_width() {
		if( $('body').height() > $(window).height()) {
			var calculation_content = $('<div style="width:50px;height:50px;overflow:hidden;position:absolute;top:-200px;left:-200px;"><div style="height:100px;"></div>');
			$('body').append( calculation_content );
			var width_one = $('div', calculation_content).innerWidth();
			calculation_content.css('overflow-y', 'scroll');
			var width_two = $('div', calculation_content).innerWidth();
			$(calculation_content).remove();
			return ( width_one - width_two );
		}
		return 0;
	}
	
	function themer_pro_fe_dev_tools_toggle_handler() {
		
		if($(this).attr('id') == 'themer-pro-fe-dev-tools-tab') {
			
			var clickCounter = $('#themer-pro-fe-dev-tools-tab').data('clickCounter') || 0;
			
			if ( clickCounter == 0 ) {
				
				$('body').removeClass('themer-pro-style-editor-deactivate');
				$('body').removeClass('themer-pro-html-sandbox-deactivate');
				$('body').addClass('themer-pro-fe-dev-tools-active');
				$('#themer-pro-fe-dev-tools').show();
				var css_editor_h3_draggable_mouseenter = function() {
					$('#themer-pro-fe-dev-tools').draggable();
					$('#themer-pro-fe-dev-tools').draggable( 'enable' );
					$('#themer-pro-fe-dev-tools').draggable();
				};
				var css_editor_h3_draggable_mouseleave = function() {
					$('#themer-pro-fe-dev-tools').draggable();
					$('#themer-pro-fe-dev-tools').draggable( 'disable' );
					$('#themer-pro-fe-dev-tools').draggable();
				};
				$('#themer-pro-fe-dev-tools').addClass('themer-pro-fe-dev-tools-draggable');
				$('#themer-pro-fe-dev-tools h3').on('mouseenter', css_editor_h3_draggable_mouseenter);
				$('#themer-pro-fe-dev-tools h3').on('mouseleave', css_editor_h3_draggable_mouseleave);
				clickCounter = 1;
				
			} else {
				
				if($('body').hasClass('themer-pro-style-editor-active')) {
					$('body').addClass('themer-pro-style-editor-deactivate');
				}
				if($('body').hasClass('themer-pro-html-sandbox-active')) {
					$('body').addClass('themer-pro-html-sandbox-deactivate');
				}
				$('body').removeClass('themer-pro-fe-dev-tools-active');
				$('#themer-pro-fe-dev-tools').hide();
				clickCounter = 0;
				
			}
			
			$('#themer-pro-fe-dev-tools-tab').data('clickCounter', clickCounter);
			
		} else if($(this).attr('id') == 'themer-pro-fe-dev-tools-style-icon') {
			
			$('body').removeClass('themer-pro-css-sandbox-active');
			$('body').removeClass('themer-pro-html-sandbox-active');
			$('body').addClass('themer-pro-style-editor-active');
			$('.themer-pro-fe-dev-tool-icon').removeClass('themer-pro-fe-dev-tool-active');
			$('#themer-pro-fe-dev-tools-style-icon').addClass('themer-pro-fe-dev-tool-active');
			$('#themer-pro-css-sandbox-container').hide();
			$('#themer-pro-css-sandbox-heading').hide();
			$('#themer-pro-html-sandbox-container').hide();
			$('#themer-pro-html-sandbox-heading').hide();
			$('.themer-pro-sandbox-copy-icons').hide();
			$('.themer-pro-sandbox-clear-icons').hide();
			$('.themer-pro-html-sandbox-word-wrap-icons').css('text-indent', '-9999px');
			$('#themer-pro-style-editor-container').show();
			$('#themer-pro-style-editor-save-button').show();

		} else if($(this).attr('id') == 'themer-pro-fe-dev-tools-css-icon') {
			
			$('body').removeClass('themer-pro-style-editor-active');
			$('body').removeClass('themer-pro-html-sandbox-active');
			$('body').addClass('themer-pro-css-sandbox-active');
			$('.themer-pro-fe-dev-tool-icon').removeClass('themer-pro-fe-dev-tool-active');
			$('#themer-pro-fe-dev-tools-css-icon').addClass('themer-pro-fe-dev-tool-active');
			$('#themer-pro-style-editor-container').hide();
			$('#themer-pro-style-editor-save-button').hide();
			$('#themer-pro-html-sandbox-container').hide();
			$('#themer-pro-html-sandbox-heading').hide();
			$('#themer-pro-css-sandbox-container').show();
			$('#themer-pro-css-sandbox-heading').show();
			$('.themer-pro-sandbox-copy-icons').hide();
			$('#themer-pro-css-sandbox-cut-icon').show();
			$('.themer-pro-html-sandbox-word-wrap-icons').css('text-indent', '-9999px');
			$('#themer-pro-html-sandbox-clear-icon').hide();
			$('#themer-pro-css-sandbox-clear-icon').show();
			
		} else if($(this).attr('id') == 'themer-pro-fe-dev-tools-html-icon') {
			
			$('body').removeClass('themer-pro-style-editor-active');
			$('body').removeClass('themer-pro-css-sandbox-active');
			$('body').addClass('themer-pro-html-sandbox-active');
			$('.themer-pro-fe-dev-tool-icon').removeClass('themer-pro-fe-dev-tool-active');
			$('#themer-pro-fe-dev-tools-html-icon').addClass('themer-pro-fe-dev-tool-active');
			$('#themer-pro-style-editor-container').hide();
			$('#themer-pro-style-editor-save-button').hide();
			$('#themer-pro-css-sandbox-container').hide();
			$('#themer-pro-css-sandbox-heading').hide();
			$('#themer-pro-html-sandbox-container').show();
			$('#themer-pro-html-sandbox-heading').show();
			$('.themer-pro-sandbox-copy-icons').hide();
			$('#themer-pro-html-sandbox-cut-icon').show();
			$('.themer-pro-html-sandbox-word-wrap-icons').css('text-indent', '0');
			$('#themer-pro-css-sandbox-clear-icon').hide();
			$('#themer-pro-html-sandbox-clear-icon').show();
			
		}
	};
	
	$('body').on('click', '.themer-pro-fe-dev-tool-icon', themer_pro_fe_dev_tools_toggle_handler);

	// Remove Genesis Sample stylesheet link from page.
	if(themerDevToolsL10n.genesisThemeHandle != '') {
		$('#'+themerDevToolsL10n.genesisThemeHandle+'-css').remove();
	}
	
	$('#themer-pro-fe-dev-tools-tab').one('click', themer_pro_fe_dev_tools_activate).one('click', themer_pro_style_editor_activate);
	
	function themer_pro_fe_dev_tools_activate() {
	
		$('#themer-pro-fe-dev-tools').addClass('themer-pro-fe-dev-tools-element');
		$('#themer-pro-fe-dev-tools *').addClass('themer-pro-fe-dev-tools-element');
		$('#theme-styles-echo-temp').remove();
	    
	    var clipboard = new Clipboard('.themer-pro-code-builder-output-cut');
	    clipboard.on('success', function(e) {
	        console.log(e);
	    });
	    clipboard.on('error', function(e) {
	        console.log(e);
	    });
	    
		$(window).keydown(function(e) {
			if((e.ctrlKey || e.metaKey) && e.which == 83 && $('body').hasClass('themer-pro-style-editor-active') && ! $('body').hasClass('themer-pro-style-editor-deactivate')) {
				$('#themer-pro-style-editor-save-button').click();
				e.preventDefault();
				return false;
			}
			if(e.which == 27 && $('body').hasClass('themer-pro-fe-dev-tools-active')) {
				$('#themer-pro-fe-dev-tools-tab').click();
				e.preventDefault();
				return false;
			}
		});
		
	    $('#themer-pro-fe-dev-tools-contract-icon').click(function() {
	    	if($('body').hasClass('themer-pro-css-sandbox-active')) {
	    		$('#themer-pro-css-sandbox-form').attr('style', '');
	    	} else if($('body').hasClass('themer-pro-html-sandbox-active')) {
	    		$('#themer-pro-html-sandbox-form').attr('style', '');
	    	} else if($('body').hasClass('themer-pro-style-editor-active')) {
	    		$('#themer-pro-style-editor-form').attr('style', '');
	    	}
	    });
	}
	
	function themer_pro_style_editor_activate() {
		
		$('body').addClass('themer-pro-style-editor-active');
	    
	    $('#themer-pro-style-editor-container textarea[data-editor]').each(function () {
	        var textarea = $(this);
	        var mode = textarea.data('editor');
	        var editDiv = $('<div>', {
	            position: 'absolute',
	            width: '100%',
	            height: '100%',
	            'class': textarea.attr('class')
	        }).insertBefore(textarea);
	        textarea.css('display', 'none');
	        var editor = ace.edit(editDiv[0]);
	        editor.renderer.setShowGutter(true);
	        editor.setShowPrintMargin(false);
    		editor.getSession().setValue(textarea.val());
	        editor.getSession().setMode('ace/mode/'+mode);
			if(themerDevToolsL10n.aceEditorKeyBindings !== 'ace') {
				editor.setKeyboardHandler('ace/keyboard/'+themerDevToolsL10n.aceEditorKeyBindings);
			}
	        editor.setTheme('ace/theme/'+themerDevToolsL10n.aceEditorTheme);
			editor.setOptions({
				useWorker: themerDevToolsL10n.aceEditorSyntaxValidation,
			    enableBasicAutocompletion: true,
		        enableLiveAutocompletion: true,
		        enableSnippets: true,
		        useSoftTabs: true,
		        fontSize: themerDevToolsL10n.aceEditorFontSize+'px'
			});
			
			$('#themer-pro-style-editor-form').resizable({
				resize: function( event, ui ) {
					$('#themer-pro-viewport-size-indicator').hide();
					editor.resize();
				}
			});
		    
			editor.getSession().on('change', function() {
				textarea.val(editor.getSession().getValue());
				themer_pro_style_editor_css_change2();
				$('#themer-pro-style-editor-save-button').addClass('themer-pro-style-editor-save-button-active');
			});
			
			editor.getSession().on('changeAnnotation', function() {
				$('#themer-pro-style-editor-save-button').removeClass('themer-pro-style-editor-parse-error');
				var annot = editor.getSession().getAnnotations();
				for(var i = 0; i < annot.length; i++) {
					if(annot.hasOwnProperty(i)) {
						if(annot[i]['type'] == 'error') {
							$('#themer-pro-style-editor-save-button').addClass('themer-pro-style-editor-parse-error');	
						}
					}
				}
			});
	    });
	    
		$(window).keydown(function(e) {
			if((e.ctrlKey || e.metaKey) && e.which == 69 && $('body').hasClass('themer-pro-css-sandbox-active')) {
				if($('#themer-pro-style-editor-outdent-icon').is(':visible')) {
					$('#themer-pro-style-editor-outdent-icon').click();
				} else {
					$('#themer-pro-style-editor-justify-icon').click();
				}
				e.preventDefault();
				return false;
			}
		});
	    
		function themer_pro_style_editor_css_change() {
			var css = $('#themer-pro-style-editor-output').val();
			$('#themer-pro-style-editor-css').html('<span class="dashicons dashicons-editor-code"></span><style id="themer-pro-style-editor-style" type="text/css">' + css + '</style>');
		}
		
		function themer_pro_style_editor_css_change2() {
			themer_pro_style_editor_css_change();
			var val = $('#themer-pro-style-editor-style').text();
			$('#themer-pro-style-editor-style').text(val.replace(/url\(\images/g, themerDevToolsL10n.childImagesUrl).replace(/url\(\'images/g, themerDevToolsL10n.childImagesUrlSingleQuotes).replace(/url\(\"images/g, themerDevToolsL10n.childImagesUrlDoubleQuotes).replace(/url\(config\/import\/images/g, themerDevToolsL10n.childConfigImagesUrl).replace(/url\(\'config\/import\/images/g, themerDevToolsL10n.childConfigImagesUrlSingleQuotes).replace(/url\(\"config\/import\/images/g, themerDevToolsL10n.childConfigImagesUrlDoubleQuotes));
		}
		
		$('#themer-pro-style-editor-output').bind('keyup paste', function(e) {
			if (e.type == 'paste') {
				setTimeout(themer_pro_style_editor_css_change2, 20);
			} else {
				themer_pro_style_editor_css_change2();
			}
		});
		
		themer_pro_style_editor_css_change2();
		$('#theme-styles-echo').html('');
		
		$('#themer-pro-style-editor-save-button').mouseenter(function() {
			if($(this).hasClass('themer-pro-style-editor-parse-error')) {
				$(this).val('Parse Error');
			}			
		}).mouseleave(function() {
			$(this).val('Save Changes');
		});
		
		function show_message(response) {
			$('.themer-pro-ajax-save-spinner').hide();
			$('#themer-pro-style-editor-save-button').removeClass('themer-pro-style-editor-save-button-active');
			$('.themer-pro-saved').html(response).fadeIn('slow');
			window.setTimeout(function(){
				$('.themer-pro-saved').fadeOut('slow'); 
			}, 2222);
		}
		
		$('form#themer-pro-style-editor-form').submit(function() {
			$('.themer-pro-ajax-save-spinner').show();
			if($('#themer-pro-style-editor-save-button').hasClass('themer-pro-style-editor-parse-error')) {
				var code_state = 'Parse Error';
			} else {
				var code_state = 'Clean';
			}
			var data = $(this).serialize()+'&code_state='+code_state;
			jQuery.post(themerDevToolsL10n.ajaxurl, data, function(response) {
				if (response) {
					show_message(response);
				}
			});
			return false;
		});
	}
	
	$('#themer-pro-fe-dev-tools-css-icon').one('click', themer_pro_css_sandbox_activate);

	function themer_pro_css_sandbox_activate() {
		
		$('body').addClass('themer-pro-css-sandbox-active');
	    
	    $('#themer-pro-css-sandbox-container textarea[data-editor]').each(function () {
			if(localStorage.getItem('sandbox_css') === null) {
				localStorage.setItem('sandbox_css', '');
			}
	    	var saved_css = localStorage.sandbox_css;
	        var textarea = $(this);
	        var mode = textarea.data('editor');
	        var editDiv = $('<div>', {
	            position: 'absolute',
	            width: '100%',
	            height: '100%',
	            'class': textarea.attr('class')
	        }).insertBefore(textarea);
	        var editor = ace.edit(editDiv[0]);
	        editor.renderer.setShowGutter(true);
	        editor.setShowPrintMargin(false);
    		if(saved_css != '') {
    			editor.getSession().setValue(localStorage.sandbox_css);
				textarea.val(editor.getSession().getValue());
				themer_pro_css_sandbox_css_change2();
    		} else {
    			editor.getSession().setValue('');
    		}
	        editor.getSession().setMode('ace/mode/'+mode);
			if(themerDevToolsL10n.aceEditorKeyBindings !== 'ace') {
				editor.setKeyboardHandler('ace/keyboard/'+themerDevToolsL10n.aceEditorKeyBindings);
			}
	        editor.setTheme('ace/theme/'+themerDevToolsL10n.aceEditorTheme);
			editor.setOptions({
				useWorker: themerDevToolsL10n.aceEditorSyntaxValidation,
			    enableBasicAutocompletion: true,
		        enableSnippets: true,
		        enableLiveAutocompletion: true,
		        useSoftTabs: true,
		        fontSize: themerDevToolsL10n.aceEditorFontSize+'px'
			});
			
			$('#themer-pro-css-sandbox-form').resizable({
				resize: function( event, ui ) {
					$('#themer-pro-viewport-size-indicator').hide();
					editor.resize();
				}
			});
			
			$('#themer-pro-css-sandbox-clear-icon').on('click', function() {
				editor.getSession().setValue('');
			});
			
		    $(window).on('beforeunload', function() {
		        localStorage.sandbox_css = editor.getSession().getValue();
		    });
			
			editor.getSession().on('change', function() {
				textarea.val(editor.getSession().getValue());
				themer_pro_css_sandbox_css_change2();
			});
			
			$('#themer-pro-css-sandbox-cut-icon').click(function() {
				// Get editor value before wiping it.
				var textarea_val = editor.getSession().getValue();
				if(textarea_val != '') {
					editor.getSession().setValue('');
					// Give the actual textarea the editor value to be copied.
					textarea.val(textarea_val);
					$('#themer-pro-css-sandbox-cut-icon').hide();
					$('#themer-pro-css-sandbox-copied-text').show();
					$('.themer-pro-code-builder-output-cut').addClass('themer-pro-code-builder-output-cut-copied');
					$(this).addClass('themer-pro-css-sandbox-cut-icon-clicked');
				} else {
					$('#themer-pro-css-sandbox-cut-icon').show();
					$('#themer-pro-css-sandbox-copied-text').hide();
					$('.themer-pro-code-builder-output-cut').removeClass('themer-pro-code-builder-output-cut-copied');
					$(this).removeClass('themer-pro-css-sandbox-cut-icon-clicked');
				}
			});
			
			editor.getSession().on('change', function() {
				var textarea_val = editor.getSession().getValue();
				if(textarea_val != '') {
					$('#themer-pro-css-sandbox-cut-icon').show();
					$('#themer-pro-css-sandbox-copied-text').hide();
					$('.themer-pro-code-builder-output-cut').removeClass('themer-pro-code-builder-output-cut-copied');
					$('#themer-pro-css-sandbox-cut-icon').removeClass('themer-pro-css-sandbox-cut-icon-clicked');
				} else if($('#themer-pro-css-sandbox-cut-icon').hasClass('themer-pro-css-sandbox-cut-icon-clicked')) {
					$('#themer-pro-css-sandbox-cut-icon').hide();
					$('#themer-pro-css-sandbox-copied-text').show();
					$('.themer-pro-code-builder-output-cut').addClass('themer-pro-code-builder-output-cut-copied');				
				}
			});
	    });
	    
		$(window).keydown(function(e) {
			if((e.ctrlKey || e.metaKey) && e.which == 69 && $('body').hasClass('themer-pro-css-sandbox-active')) {
				if($('#themer-pro-css-sandbox-outdent-icon').is(':visible')) {
					$('#themer-pro-css-sandbox-outdent-icon').click();
				} else {
					$('#themer-pro-css-sandbox-justify-icon').click();
				}
				e.preventDefault();
				return false;
			}
		});
		
		function themer_pro_css_sandbox_css_change() {
			var css = $('#themer-pro-css-sandbox-output').val();
			$('#themer-pro-css-sandbox-css').html('<style id="themer-pro-css-sandbox-style" type="text/css">' + css + '</style>');
		}
		
		function themer_pro_css_sandbox_css_change2() {
			themer_pro_css_sandbox_css_change();
			var val = $('#themer-pro-css-sandbox-style').text();
			$('#themer-pro-css-sandbox-style').text(val.replace(/url\(\images/g, themerDevToolsL10n.childImagesUrl).replace(/url\(\'images/g, themerDevToolsL10n.childImagesUrlSingleQuotes).replace(/url\(\"images/g, themerDevToolsL10n.childImagesUrlDoubleQuotes));
		}
	}
	
	$('#themer-pro-fe-dev-tools-html-icon').one('click', themer_pro_html_sandbox_activate);

	function themer_pro_html_sandbox_activate() {
		
		$('body').addClass('themer-pro-html-sandbox-active');
	    
	    $('#themer-pro-html-sandbox-container textarea[data-editor]').each(function () {
			if(localStorage.getItem('sandbox_html') === null) {
				localStorage.setItem('sandbox_html', '');
			}
	    	var saved_html = localStorage.sandbox_html;
	        var textarea = $(this);
	        var mode = textarea.data('editor');
	        var editDiv = $('<div>', {
	            position: 'absolute',
	            width: '100%',
	            height: '100%',
	            'class': textarea.attr('class')
	        }).insertBefore(textarea);
	        var editor = ace.edit(editDiv[0]);
	        editor.renderer.setShowGutter(true);
	        editor.setShowPrintMargin(false);
    		if(saved_html != '') {
    			editor.getSession().setValue(localStorage.sandbox_html);
				textarea.val(editor.getSession().getValue());
				themer_pro_html_sandbox_html_change();
    		} else {
    			editor.getSession().setValue('');
    		}
	        editor.getSession().setMode('ace/mode/'+mode);
			if(themerDevToolsL10n.aceEditorKeyBindings !== 'ace') {
				editor.setKeyboardHandler('ace/keyboard/'+themerDevToolsL10n.aceEditorKeyBindings);
			}
	        editor.setTheme('ace/theme/'+themerDevToolsL10n.aceEditorTheme);
			editor.setOptions({
				useWorker: themerDevToolsL10n.aceEditorSyntaxValidation,
			    enableBasicAutocompletion: false,
		        enableSnippets: false,
		        enableLiveAutocompletion: false,
		        useSoftTabs: true,
		        fontSize: themerDevToolsL10n.aceEditorFontSize+'px'
			});
			
			$('#themer-pro-html-sandbox-clear-icon').on('click', function() {
				$('.themer-pro-html-sandbox-temp-wrapper').removeClass('themer-pro-html-sandbox-temp-wrapper');
				editor.getSession().setValue('');
			});
			
		    $('#themer-pro-html-sandbox-outdent-icon').on('click', function() {
				editor.setOptions({
			        wrap: true
				});
		    });
		    
		    $('#themer-pro-html-sandbox-justify-icon').on('click', function() {
				editor.setOptions({
			        wrap: false
				});
		    });
			
			$('#themer-pro-html-sandbox-form').resizable({
				resize: function( event, ui ) {
					$('#themer-pro-viewport-size-indicator').hide();
					editor.resize();
				}
			});
			
		    $(window).on('beforeunload', function() {
		        localStorage.sandbox_html = editor.getSession().getValue();
		    });
			
			editor.getSession().on('change', function() {
				textarea.val(editor.getSession().getValue());
				themer_pro_html_sandbox_html_change();
			});
			
			$('#themer-pro-fe-dev-tools-body-wrap').on('click', html_sandbox_click_action);
			
			function html_sandbox_click_action() {
				if($('body').hasClass('themer-pro-html-sandbox-active') && ! $('body').hasClass('themer-pro-html-sandbox-deactivate')) {
					event.preventDefault();
					$('.themer-pro-html-sandbox-temp-wrapper').removeClass('themer-pro-html-sandbox-temp-wrapper');
					$(event.target).addClass('themer-pro-html-sandbox-temp-wrapper');
					editor.getSession().setValue($.trim($(event.target).html()));
				}
			}
			
			$('#themer-pro-html-sandbox-cut-icon').click(function() {
				$('.themer-pro-html-sandbox-temp-wrapper').removeClass('themer-pro-html-sandbox-temp-wrapper');
				// Get editor value before wiping it.
				var textarea_val = editor.getSession().getValue();
				if(textarea_val != '') {
					editor.getSession().setValue('');
					// Give the actual textarea the editor value to be copied.
					textarea.val(textarea_val);
					$('#themer-pro-html-sandbox-cut-icon').hide();
					$('#themer-pro-html-sandbox-copied-text').show();
					$('.themer-pro-code-builder-output-cut').addClass('themer-pro-code-builder-output-cut-copied');
					$(this).addClass('themer-pro-html-sandbox-cut-icon-clicked');
				} else {
					$('#themer-pro-html-sandbox-cut-icon').show();
					$('#themer-pro-html-sandbox-copied-text').hide();
					$('.themer-pro-code-builder-output-cut').removeClass('themer-pro-code-builder-output-cut-copied');
					$(this).removeClass('themer-pro-html-sandbox-cut-icon-clicked');
				}
			});
			
			editor.getSession().on('change', function() {
				var textarea_val = editor.getSession().getValue();
				if(textarea_val != '') {
					$('#themer-pro-html-sandbox-cut-icon').show();
					$('#themer-pro-html-sandbox-copied-text').hide();
					$('.themer-pro-code-builder-output-cut').removeClass('themer-pro-code-builder-output-cut-copied');
					$('#themer-pro-html-sandbox-cut-icon').removeClass('themer-pro-html-sandbox-cut-icon-clicked');
				} else if($('#themer-pro-html-sandbox-cut-icon').hasClass('themer-pro-html-sandbox-cut-icon-clicked')) {
					$('#themer-pro-html-sandbox-cut-icon').hide();
					$('#themer-pro-html-sandbox-copied-text').show();
					$('.themer-pro-code-builder-output-cut').addClass('themer-pro-code-builder-output-cut-copied');				
				}
			});
	    });
	    
		$(window).keydown(function(e) {
			if((e.ctrlKey || e.metaKey) && e.which == 69 && $('body').hasClass('themer-pro-html-sandbox-active')) {
				if($('#themer-pro-html-sandbox-outdent-icon').is(':visible')) {
					$('#themer-pro-html-sandbox-outdent-icon').click();
				} else {
					$('#themer-pro-html-sandbox-justify-icon').click();
				}
				e.preventDefault();
				return false;
			}
		});
	    
	    $('.themer-pro-html-sandbox-word-wrap-icons').click(function() {
	    	$('.themer-pro-html-sandbox-word-wrap-icons').toggle();
	    });
		
		function themer_pro_html_sandbox_html_change() {
			var html = $('#themer-pro-html-sandbox-output').val();
			$('.themer-pro-html-sandbox-temp-wrapper').html(html);
		}
	}
	
});