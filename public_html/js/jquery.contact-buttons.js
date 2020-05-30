/*!
 * Contact Buttons Plugin Demo 0.1.0
 * https://github.com/joege/contact-buttons-plugin
 *
 * Copyleft 2015, José Gonçalves
 *
 * Licensed under the MIT license:
 * http://www.opensource.org/licenses/MIT
 */
 
(function ($) {
  'use strict';

  // Main function
  $.contactButtons = function( options ){
    
    // Define the defaults
    var defaults = { 
      effect  : '', // slide-on-scroll
      buttons : {
        'facebook':   { class: 'facebook',  use: false, icon: 'fab fa-facebook',    link: '', title: 'Siguenos en Facebook' },
        'google':     { class: 'gplus',     use: false, icon: 'fa fa-google-plus', link: '', title: 'Visitanos en Google Plus' },
        'linkedin':   { class: 'linkedin',  use: false, icon: 'fa fa-linkedin',    link: '', title: 'Visitanos en LinkedIn' },
        'twitter':    { class: 'twitter',   use: false, icon: 'fa fa-twitter',     link: '', title: 'Siguenos en Twitter' },
        'pinterest':  { class: 'pinterest', use: false, icon: 'fa fa-pinterest',   link: '', title: 'Siguenos en Pinterest' },
        'phone':      { class: 'phone',     use: false, icon: 'fa fa-phone',       link: '', title: 'Llámanos', type: 'phone' },
        'email':      { class: 'email',     use: false, icon: 'fa fa-envelope',    link: '', title: 'Envianos un email', type: 'email' },
        'web' :       { class: 'web',       use: false, icon: 'fa fa-globe',       link: '', title: 'Visita nuestra página'},
        'android' :   { class: 'android',   use: false, icon: 'fab fa-android',     link: '', title: 'Descarga nuestra app!'},
        'top':        { class: 'top',       use: false, icon: 'fa fa-arrow-to-top', link: '', title: 'Volver Arriba',      }
      }
    };

    // Merge defaults and options
    var s,
        settings = options;
    for (s in defaults.buttons) {
      if (options.buttons[s]) {
        settings.buttons[s] = $.extend( defaults.buttons[s], options.buttons[s] );
      }
    }
    
    // Define the container for the buttons
    var oContainer = $("#contact-buttons-bar");

    // Check if the container is already on the page
    if ( oContainer.length === 0 ) {
      
      // Insert the container element
      $('body').append('<div id="contact-buttons-bar">');
      
      // Get the just inserted element
      oContainer = $("#contact-buttons-bar");
      
      // Add class for effect
      oContainer.addClass(settings.effect);
      
      // Add show/hide button
      var sShowHideBtn = '<button class="contact-button-link show-hide-contact-bar" style="background: #ccc;"><span class="fa fa-angle-left"></span></button>';
      oContainer.append(sShowHideBtn);
      
      var i;
      for ( i in settings.buttons ) {
        var bs = settings.buttons[i],
            sLink = bs.link,
            active = bs.use;
        
        // Check if element is active
        if (active) {
          
          // Change the link for phone and email when needed
          if (bs.type === 'phone') {
            sLink = 'tel:' + bs.link;
          } else if (bs.type === 'email') {
            sLink = 'mailto:' + bs.link;
          }
          
          // Insert the links
          var sIcon = '<span class="' + bs.icon + '"></span>',
              sButton = '<a href="' + sLink + 
                          '" class="contact-button-link cb-ancor ' + bs.class + '" ' + 
                          (bs.title ? 'title="' + bs.title + '"' : '') + 
                          (bs.extras ? bs.extras : '') + 
                          '>' + sIcon + '</a>';
          oContainer.append(sButton);
        }
      }
      
      // Make the buttons visible
      setTimeout(function(){
        oContainer.animate({ left : 0 });
      }, 200);
      
      // Show/hide buttons
      $('body').on('click', '.show-hide-contact-bar', function(e){
        e.preventDefault();
        e.stopImmediatePropagation();
        $('.show-hide-contact-bar').find('.fa').toggleClass('fa-angle-left fa-angle-left');
        oContainer.find('.cb-ancor').toggleClass('cb-hidden');
      });
    }
  };
  
  // Slide on scroll effect
  $(function(){
    
    // Define element to slide
    var el = $("#contact-buttons-bar.slide-on-scroll");
    
    // Load top default
    el.attr('data-top', el.css('top'));
    
    // Listen to scroll
    $(window).scroll(function() {
      clearTimeout( $.data( this, "scrollCheck" ) );
      $.data( this, "scrollCheck", setTimeout(function() {
        var nTop = $(window).scrollTop() + parseInt(el.attr('data-top'));
        el.animate({
          top : nTop
        }, 500);
      }, 250) );
    });
  });  
}( jQuery ));


// Initialize Share-Buttons
$.contactButtons({
  effect  : 'slide-on-scroll',
  buttons : {
    'facebook': { class: 'facebook',        use: true, link: 'https://www.facebook.com/jaguares128/',                              extras: 'target="_blank"' },
    'android' : { class:'android',          use: true, link: '/app/biblioteca.apk', extras: 'target="_blank" download="clickToInstall"' },
    'email':    { class: 'email separated', use: true, link: 'cbtis128.investigacion@uemstis.sems.gob.mx',                         extras: 'target="_blank"' },
    'web':      { class: 'web',             use: true, link: 'http://www.cbtis128.edu.mx/',                                        extras: 'target="_blank"' },
    'top':      { class: 'top',   use: true, link: '#',                                                                  extras: 'onclick="$(\'html, body\').animate({scrollTop: 0}, 1000);"'}
  }
});