/*
 * $ prmenmu plugin v1.0.0
 * Copyright 2014 - 2015 by Steve George
 * http://www.pagerange.com/projects/prmenu
 * Released under the MIT license.
 * https://github.com/pagerange/prmenu/blob/master/LICENSE
 */

/*
 *   Usage:
 *
 *
 *		var options = {
 *			"fontsize": "14", // menu link text font-size
 *		  "height": "50", // height of the container element in px
 *			"case": "uppercase", // text transform on link text
 *			"linkbgcolor": "#000000", // base background color
 *			"linktextcolor": "#ffffff", // link text color
 *			"linktextweight": "400", // link text weight
 *			"linktextfont": "sans-serif", // link text font
 *			"hoverdark": false // hover background lighter or darker?
 *		};
 *
 *   $(document).ready(function(){
 * 	    $('ul#mymenu').prmenu(options);
 *   });
 *
 *
 */

; // close previous unclosed statements if any

(function($) {
	var plugin = {};

	$.prmenu = function(element, options) {

		// Set default options for plugin
		var defaults = {
			"fontsize": "14",
			"height": "50",
			"case": "uppercase",
			"linkbgcolor": "#000000",
			"linktextcolor": "#ffffff",
			"linktextweight": "400",
			"linktextfont": "sans-serif",
			"hoverdark": false
		};


		// create empty object to hold options
		plugin.o = {}


		// Function called when we initialize the plugin
		plugin.init = function() {

			// Merge user options with our defaults
			plugin.o = $.extend({}, defaults, options);

			plugin.o.shade = (plugin.o.hoverdark) ? -8 : 8;

			// Add the target element to the options object
			plugin.o.el = $(element);

			// resize elements to user specs
			plugin.activateMenu();

		} // end init

		plugin.activateMenu = function() {

			var links;
			links = plugin.o.el.children('li');

			// wrap element in prmenu_container div
			//plugin.o.el.wrap('<div class="prmenu_container"></div>');

			plugin.o.el.parent().css('height', plugin.o.height + 'px');

			// prepend the mobile menu toggle
			//plugin.o.el.parent().prepend('<ul class="menu-toggle"><li class="menu-toggle"><a href="#"></a></li></ul>');

			plugin.o.el.siblings('ul.menu-toggle').find('li').click(function() {
				plugin.o.el.toggle();
			});

			$(window).resize(function() {
					plugin.setupMenuDefaults();
			});

			plugin.setupMenuDefaults();

		} // end activateMenu


		plugin.setDefaultCss = function() {

			var anchors = plugin.o.el.find('a');

			anchors.css('font-size', plugin.o.fontsize + 'px');
			anchors.css('text-transform', plugin.o.case);
			anchors.css('color', plugin.o.linktextcolor);
			anchors.css('font-family', plugin.o.linktextfont);
			anchors.css('font-weight', plugin.o.linktextweight);

			plugin.o.el.parent('div').css('min-height', plugin.o.height + 'px');
			plugin.o.el.parent('div').find('li.menu-toggle a').each(function(){
			  $(this).css('background-color', plugin.o.linkbgcolor)
			});

			


		}

		plugin.setupMenuDefaults = function() {
					plugin.setDefaultCss();
					plugin.resizeLinks();
					plugin.setLinkHeight();
					plugin.resizeLinks();
		}

		plugin.setLinkHeight = function() {
				var anchors = plugin.o.el.children('li').children('a');
				var subanchors = plugin.o.el.children('li').children('ul').find('a');
				anchors.each(function(){
						var fontsize = anchors.css('font-size');
						var lineheight = parseInt(fontsize) + 3;
						var height = ($(this).height() > lineheight) ? lineheight * 2 : lineheight;
						var containerheight = plugin.o.height;
						var padding = Math.floor((containerheight - height) / 2);
						var paddingbottom = containerheight - (height + padding)

						$(this).css('line-height', lineheight + 'px');
						$(this).css('padding-top', padding + 'px');
						$(this).css('padding-bottom', paddingbottom + 'px');


				});

				subanchors.each(function(){
						var fontsize = anchors.css('font-size');
						var height = $(this).height();
						var lineheight = parseInt(fontsize) + 3;
						$(this).css('padding-top', '15px');
						$(this).css('padding-bottom', '15px');

				});

		}


		plugin.resizeLinks = function() {
			if ($(window).width() > 640) {
				plugin.setupMenuForDesktopDevices();
			} else {
				plugin.setupMenuForHandheldDevices();
			}
		}

		plugin.setupMenuForDesktopDevices = function() {

			var links, count, width, first, last, aheight;

			links = plugin.o.el.children('li');
			aheight = links.children('a').css('height');

			// Calculate space taken by all li, except for the last
			// Assign the remaining space to the last li
			if (links.length > 1) {
				count = links.length;
				width = 100 / count;
				first = width * (count - 1);
				last = 100 - first;
				width = width + '%';
				last = last + '%';
			} else {
				// If there's only a single element, make it 100% width'
				width = '100%';
				last = '100%';
			}

			// Set desktop navigation styling
			$('div.prmenu_container').css('height', aheight);
			links.css('width', width);
			links.last().css('width', last);
			plugin.o.el.css('display', 'block');


		}

		plugin.setupMenuForHandheldDevices = function() {

			var links, aheight;

			links = plugin.o.el.children('li');
			aheight = links.find('a').css('height');

			// Set mobile navigation styling
			plugin.o.el.css('width', '100%');
			plugin.o.el.css('display', 'none');
			plugin.o.el.parent().css('height', aheight);
			links.css('width', '100%');
			links.last().css('width', '100%');
			links.css('position', 'relative');
			links.css('left', '0');
			links.show();
			links.children('ul').show();


		}

		plugin.init();

	}

	$.fn.prmenu = function(options) {

		return this.each(function() {
			if (undefined == $(this).data('prmenu')) {
				var plugin = new $.prmenu(this, options);
				$(this).data('prmenu', plugin);
			}
		});

	}
	$(document).ready(function(){

		$('.review-top-menu').prmenu({
			"fontsize": "14",
			"height": "50",
			"case": "uppercase",
			"linkbgcolor": "#fe4444",
			"linktextcolor": "#ffffff",
			"linktextweight": "400",
			"linktextfont": "Montserrat",
			"hoverdark": false
		});
	});
})(jQuery);

