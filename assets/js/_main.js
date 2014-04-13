/* ========================================================================
 * DOM-based Routing
 * Based on http://goo.gl/EUTi53 by Paul Irish
 *
 * Only fires on body classes that match. If a body class contains a dash,
 * replace the dash with an underscore when adding it to the object below.
 *
 * .noConflict()
 * The routing is enclosed within an anonymous function so that you can 
 * always reference jQuery with $, even when in .noConflict() mode.
 *
 * Google CDN, Latest jQuery
 * To use the default WordPress version of jQuery, go to lib/config.php and
 * remove or comment out: add_theme_support('jquery-cdn');
 * ======================================================================== */

(function($) {

// Use this variable to set up the common and page specific functions. If you 
// rename this variable, you will also need to rename the namespace below.
var Achromatic_Attic = {
  // All pages
  common: {
    init: function() {
      // JavaScript to be fired on all pages
    }
  },
  // Home page
  home: {
    init: function() {
      // JavaScript to be fired on the home page
    }
  },
  // About us page, note the change from about-us to about_us.
  about_us: {
    init: function() {
      // JavaScript to be fired on the about us page
    }
  }
};

// The routing fires all common scripts, followed by the page specific scripts.
// Add additional events for more control over timing e.g. a finalize event
var UTIL = {
  fire: function(func, funcname, args) {
    var namespace = Achromatic_Attic;
    funcname = (funcname === undefined) ? 'init' : funcname;
    if (func !== '' && namespace[func] && typeof namespace[func][funcname] === 'function') {
      namespace[func][funcname](args);
    }
  },
  loadEvents: function() {
    UTIL.fire('common');

    $.each(document.body.className.replace(/-/g, '_').split(/\s+/),function(i,classnm) {
      UTIL.fire(classnm);
    });
  }
};

$(document).ready(UTIL.loadEvents);

$(function() {

  if ($("body").scrollTop() > 0) {
    bodyelem = $("body");
  } else {
    bodyelem = $("html,body");
  }

  $(window).on("scroll", function() {

    var fromTop = $(document).scrollTop();

    if (fromTop >= bodyelem.height()) {
      $('#top-navbar').removeClass('navbar-static-top').addClass('navbar-fixed-top');
      $('.banner').addClass('margin-bottom');
    }

    if (fromTop < bodyelem.height() && $('#top-navbar').hasClass('navbar-fixed-top')) {
      $('#top-navbar').removeClass('navbar-fixed-top').addClass('navbar-static-top');
      $('.banner').removeClass('margin-bottom');
    }

  });

  var altcrement = -1;
  $(window).resize(function(){
    var currentFontSize = parseFloat($('html').css('font-size'));
    $('html').css('font-size', currentFontSize + (altcrement *= -1) + 'px');
  });

  $('.arrow-header').on('click', function() {
    bodyelem.animate({scrollTop: bodyelem.height() }, 1000);
  });

  $('.arrow-nav').on('click', function() {
    bodyelem.animate({scrollTop: 0 }, 1000);
  });

  $('#top-navbar a.page-item').on('click', function(event) {
    event.preventDefault();

    var section = $(this).attr('href');
    if (section == '#news') scrollTo = bodyelem.height();
    else if (section == '#biography') scrollTo = $(section).offset().top + $('#top-navbar').height();
    else scrollTo = $(section).offset().top - $('#top-navbar').height();
    var animationSpeed = Math.abs($(document).scrollTop() - $(section).offset().top + $('#top-navbar').height());

    bodyelem.animate({scrollTop: scrollTo }, (animationSpeed > 500) ? 1000 : 500) ;

  });

  $('#top-navbar nav .visible-xs a').on('click', function(event) {
    $('.navbar-collapse').removeClass('in');
  });



});


})(jQuery); // Fully reference jQuery after this point.
