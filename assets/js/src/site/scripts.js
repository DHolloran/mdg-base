/* global MDG_GLOBALS */
/**
 * To activate the plugins for CodeKit remove the space between @ and codekit-prepend this
 * mirrors the order and default setup from Gruntfile.js
 */
// @codekit-prepend "../plugins/bootstrap/plugins.js"
// @ codekit-prepend "../plugins/imagesloaded.pkgd.js"
// @ codekit-prepend "../plugins/jquery.flexslider.js"
// @ codekit-prepend "../plugins/placeholders.jquery.min.js"
// @codekit-prepend "../plugins/jQuery.resizeEnd.js"
// @ codekit-prepend "../plugins/jquery.selectric.js"
// @codekit-prepend "../plugins/responsive-img.js"
// @ codekit-prepend "../plugins/waypoints.js"
// @codekit-prepend "bp.js"
jQuery((function($){
	var site    = {},
			bp      = MDG_GLOBALS.bp,
			ajaxurl = MDG_GLOBALS.ajaxurl
	;

console.log(bp);

	/**
	 * Initialize FlexSliders here
	 *
	 * @return boolean false
	 */
	site.initFlexslider = function() {
		var slider = $('.flexslider');

		// Check if a slider exists
		if ( slider.length === 0 ) {
			return false;
		}

		return false;
	}; // site.initFlexslider()



	/**
	 * Use for elements that need to be linked but should not be wrapped in a <a></a>
	 * Apply class faux-link to the element and a data attribute of data-link="{somelink}"
	 *
	 * @return Void
	 */
	site.initFauxLink = function() {
		$('.faux-link').on('click', function(){
			var that = $(this),
					location = that.data('link')
			;
			if ( location === undefined ) {
				location = '#';
			} // if()

			window.location = location;
		});
	}; // site.initFauxLink()



	/**
	 * Initializes the drop down menu
	 *
	 * @return Void
	 */
	site.initDropDownMenu = function() {
		// Activate Drop Down on hover non-touch devices
		$('.no-touch .dropdown').on('mouseover', function () {
			$(this).addClass('open');
		}).on('mouseout', function(){
			$(this).removeClass('open');
		});

		// Activate DropDown on click touch devices
		$('.touch .dropdown').on('click', function (e) {
			var that = $(this);

			if ( !that.hasClass('open') ) {
				that.addClass('open');
				e.preventDefault();
				return false;
			} // if()
		});
	}; // site.initDropDownMenu()



	/**
	 * Scrolls the page to the top of the provided element
	 *
	 * @param  object                elem  The jQuery selector object to scroll to.
	 * @param  mixed[integer,string] speed The speed to scroll.
	 *
	 * @return boolean               false
	 */
	site.scollTo = function( elem, easing, speed ) {
		speed = ( typeof speed === 'undefined' ) ? 1500 : speed;
		easing = ( typeof easing === 'undefined' ) ? 'linear' : easing;

		var offset = elem.offset().top - 10;
		$('html,body').animate({scrollTop: offset}, speed , easing);

		return false;
	};



	/**
	 * Document Ready
	 */
	$(document).ready(function(){
		site.initFauxLink();
		site.initDropDownMenu();
	});



	/**
	 * Window Resize.
	 * Resize end requires /assets/js/src/plugins/jQuery.resizeEnd.js
	 * to be included if it is not included change resizeEnd to resize.
	 */
	$(window).resizeEnd(function() {
	});



	/**
	 * Window Load
	 */
  $(window).load(function(){
		site.initFlexslider();
  });
})(jQuery));