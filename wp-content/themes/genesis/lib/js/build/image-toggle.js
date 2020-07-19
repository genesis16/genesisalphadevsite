!function(e){var t={};function n(r){if(t[r])return t[r].exports;var i=t[r]={i:r,l:!1,exports:{}};return e[r].call(i.exports,i,i.exports,n),i.l=!0,i.exports}n.m=e,n.c=t,n.d=function(e,t,r){n.o(e,t)||Object.defineProperty(e,t,{configurable:!1,enumerable:!0,get:r})},n.r=function(e){Object.defineProperty(e,"__esModule",{value:!0})},n.n=function(e){var t=e&&e.__esModule?function(){return e.default}:function(){return e};return n.d(t,"a",t),t},n.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},n.p="",n(n.s=21)}([function(e,t){!function(){e.exports=this.wp.element}()},function(e,t){!function(){e.exports=this.wp.i18n}()},function(e,t){!function(){e.exports=this.wp.data}()},function(e,t){!function(){e.exports=this.wp.components}()},function(e,t){e.exports=function(e,t,n){return t in e?Object.defineProperty(e,t,{value:n,enumerable:!0,configurable:!0,writable:!0}):e[t]=n,e}},function(e,t){!function(){e.exports=this.wp.compose}()},function(e,t){!function(){e.exports=this.wp.plugins}()},function(e,t,n){"use strict";n.d(t,"a",function(){return c});var r=n(4),i=n.n(r),o=n(8),s=n.n(o),a=n(2);
/**
 * Builds new meta for use when saving post data.
 *
 * @since   3.1.3
 * @package Genesis\JS
 * @author  StudioPress
 * @license GPL-2.0-or-later
 */
function c(e,t){var n=Object(a.select)("core/editor").getEditedPostAttribute("meta"),r=Object.keys(n).filter(function(e){return e.startsWith("_genesis")}).reduce(function(e,t){return e[t]=n[t],null===e[t]&&(e[t]=!1),e},{});return s()({},r,i()({},e,t))}},function(e,t,n){var r=n(4);e.exports=function(e){for(var t=1;t<arguments.length;t++){var n=null!=arguments[t]?arguments[t]:{},i=Object.keys(n);"function"==typeof Object.getOwnPropertySymbols&&(i=i.concat(Object.getOwnPropertySymbols(n).filter(function(e){return Object.getOwnPropertyDescriptor(n,e).enumerable}))),i.forEach(function(t){r(e,t,n[t])})}return e}},function(e,t){!function(){e.exports=this.wp.apiFetch}()},function(e,t){e.exports=function(e){if(void 0===e)throw new ReferenceError("this hasn't been initialised - super() hasn't been called");return e}},function(e,t,n){var r=n(16);e.exports=function(e,t){if("function"!=typeof t&&null!==t)throw new TypeError("Super expression must either be null or a function");e.prototype=Object.create(t&&t.prototype,{constructor:{value:e,writable:!0,configurable:!0}}),t&&r(e,t)}},function(e,t){function n(t){return e.exports=n=Object.setPrototypeOf?Object.getPrototypeOf:function(e){return e.__proto__||Object.getPrototypeOf(e)},n(t)}e.exports=n},function(e,t,n){var r=n(17),i=n(10);e.exports=function(e,t){return!t||"object"!==r(t)&&"function"!=typeof t?i(e):t}},function(e,t){function n(e,t){for(var n=0;n<t.length;n++){var r=t[n];r.enumerable=r.enumerable||!1,r.configurable=!0,"value"in r&&(r.writable=!0),Object.defineProperty(e,r.key,r)}}e.exports=function(e,t,r){return t&&n(e.prototype,t),r&&n(e,r),e}},function(e,t){e.exports=function(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}},function(e,t){function n(t,r){return e.exports=n=Object.setPrototypeOf||function(e,t){return e.__proto__=t,e},n(t,r)}e.exports=n},function(e,t){function n(e){return(n="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(e){return typeof e}:function(e){return e&&"function"==typeof Symbol&&e.constructor===Symbol&&e!==Symbol.prototype?"symbol":typeof e})(e)}function r(t){return"function"==typeof Symbol&&"symbol"===n(Symbol.iterator)?e.exports=r=function(e){return n(e)}:e.exports=r=function(e){return e&&"function"==typeof Symbol&&e.constructor===Symbol&&e!==Symbol.prototype?"symbol":n(e)},r(t)}e.exports=r},function(e,t){!function(){e.exports=this.wp.a11y}()},,,function(e,t,n){"use strict";n.r(t);var r=n(0),i=n(1),o=n(5),s=n(2),a=n(3),c=n(6),u=n(4),l=n.n(u),p=n(15),b=n.n(p),f=n(14),g=n.n(f),m=n(13),d=n.n(m),y=n(12),O=n.n(y),h=n(10),j=n.n(h),_=n(11),v=n.n(_),S=n(18),P=n(9),x=n.n(P),w=function(e){function t(e){var n;return b()(this,t),(n=d()(this,O()(t).call(this,e))).updateSingularImagesSetting=n.updateSingularImagesSetting.bind(j()(n)),n.state={typesWithSingularImagesEnabled:[],currentUserCanEditThemeOptions:!1,updating:!1},n}return v()(t,e),g()(t,[{key:"componentDidMount",value:function(){var e=this;x()({path:"/genesis/v1/singular-images"}).then(function(t){e.setState({typesWithSingularImagesEnabled:t})}),x()({path:"/wp/v2/users/me?context=edit"}).then(function(t){t.capabilities.edit_theme_options&&e.setState({currentUserCanEditThemeOptions:t.capabilities.edit_theme_options})})}},{key:"postTypeHasSingularImagesDisabled",value:function(){return!this.state.typesWithSingularImagesEnabled.includes(this.props.currentPostType)}},{key:"updateSingularImagesSetting",value:function(e){var t=this;this.setState({updating:!0});var n={path:"/genesis/v1/singular-images",method:"PUT",data:l()({},this.props.currentPostType,e)};return x()(n).then(function(e){t.setState({updating:!1,typesWithSingularImagesEnabled:e});var n=Object(i.sprintf)(Object(i.__)("Featured images now enabled on %s.","genesis"),t.props.currentPostTypeLabel);t.postTypeHasSingularImagesDisabled()&&(n=Object(i.sprintf)(Object(i.__)("Featured images now disabled on %s.","genesis"),t.props.currentPostTypeLabel)),Object(S.speak)(n,"assertive")}),!1}},{key:"render",value:function(){var e=this;if(!this.state.currentUserCanEditThemeOptions)return"";if(this.state.updating){var t=Object(i.sprintf)(Object(i.__)("Disabling images on %s...","genesis"),this.props.currentPostTypeLabel);return this.postTypeHasSingularImagesDisabled()&&(t=Object(i.sprintf)(Object(i.__)("Enabling images on %s...","genesis"),this.props.currentPostTypeLabel)),Object(r.createElement)("p",null,Object(r.createElement)("span",null,t),Object(r.createElement)(a.Spinner,null))}var n="genesis-sidebar-label-enabled",o=Object(i.sprintf)(Object(i.__)("Featured images are enabled on %s. ","genesis"),this.props.currentPostTypeLabel),s=Object(i.sprintf)(Object(i.__)("Disable featured images on all %s?"),this.props.currentPostTypeLabel),c=Object(i.__)("Disable images.","genesis"),u=0;return this.postTypeHasSingularImagesDisabled()&&(n="genesis-sidebar-label-disabled",o=Object(i.sprintf)(Object(i.__)("Featured images are disabled on %s.","genesis"),this.props.currentPostTypeLabel),s=Object(i.sprintf)(Object(i.__)("Enable featured images on all %s"),this.props.currentPostTypeLabel),c=Object(i.__)("Enable images.","genesis"),u=1),Object(r.createElement)("p",{className:n},o+" ",Object(r.createElement)("button",{className:"genesis-sidebar-text-button",onClick:function(){return e.updateSingularImagesSetting(u)},"aria-label":s},c))}}]),t}(r.Component),E=Object(o.compose)([Object(s.withSelect)(function(){var e=Object(s.select)("core/editor").getCurrentPostType();return{currentPostType:e,currentPostTypeLabel:Object(s.select)("core").getPostType(e).name||Object(i.__)("Entries","genesis")}})])(w),T=n(7);var I=Object(o.compose)([Object(s.withSelect)(function(){return{hideFeaturedImage:Object(s.select)("core/editor").getEditedPostAttribute("meta")._genesis_hide_singular_image}}),Object(s.withDispatch)(function(e){return{onUpdate:function(t){e("core/editor").editPost({meta:Object(T.a)("_genesis_hide_singular_image",!!t)})}}})])(
/**
 * Adds a “hide featured image” checkbox to Genesis Block Editor sidebar in an
 * Image panel. Unchecked by default.
 *
 * If checked and the post is updated or published,
 * `_genesis_hide_singular_image` is set to true in post meta.
 *
 * @since   3.1.0
 * @package Genesis\JS
 * @author  StudioPress
 * @license GPL-2.0-or-later
 */
function(e){var t=e.hideFeaturedImage,n=void 0!==t&&t,o=e.onUpdate;return Object(r.createElement)(r.Fragment,null,Object(r.createElement)(a.Fill,{name:"GenesisSidebar"},Object(r.createElement)(a.PanelBody,{initialOpen:!0,title:Object(i.__)("Images","genesis")},Object(r.createElement)(a.PanelRow,null,Object(r.createElement)(a.CheckboxControl,{label:Object(i.__)("Hide Featured Image","genesis"),checked:!!n,onChange:function(){return o(!n)}})),Object(r.createElement)(a.PanelRow,null,Object(r.createElement)(E,null)))))});Object(c.registerPlugin)("genesis-image-toggle",{render:I})}]);