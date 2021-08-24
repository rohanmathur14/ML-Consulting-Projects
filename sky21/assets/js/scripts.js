$(document).ready(function() {
  "use strict";

  //Header Sticky
  $(".header").sticky();

  //Add And Remove Class Script
  $('.header-toggle').click(function() {
    $(this).toggleClass('active');
    $('.header-wrap').toggleClass('open');
  });

  jQuery('.close-icon').on('click', function() {
    jQuery('.header-wrap').removeClass('open');
    jQuery('.header-toggle').removeClass('active');
  });

  // Sub Menu Scripts
  jQuery('.dropdown-arrow').on('click', function() {
    var element = jQuery(this).parent('.menu-item-has-children');
    if (element.hasClass('open')) {
      element.removeClass('open');
      element.find('.btn-prev').remove();
      element.find('.menu-item-has-children').removeClass('open');
      element.find('.sub-menu, .submenu-inner').removeClass('open');
    }
    else {
      var name = element.find('a').html();
      element.addClass('open');
      element.children('.sub-menu, .submenu-inner').addClass('open');
      element.find('.btn-prev').remove();
      element.children('.sub-menu, .submenu-inner').prepend('<li class="btn-prev"><a href="javascript:void(0)">' + name + '</a></li>')
      element.siblings('.menu-item-has-children').children('.sub-menu, .submenu-inner').removeClass('open');
      element.siblings('.menu-item-has-children').removeClass('open');
      element.siblings('.menu-item-has-children').find('.menu-item-has-children').removeClass('open');
      element.siblings('.menu-item-has-children').find('.sub-menu, .submenu-inner').removeClass('open');
      jQuery('.sub-menu .btn-prev, .submenu-inner .btn-prev').click(function() {
        jQuery(this).parent().removeClass('open');
        jQuery(this).parent().parent().removeClass('open');
      });
    }
  });

  // Banner Slider
  $('.banner .owl-carousel').owlCarousel({
    autoplayHoverPause:true,
    loop:true,
    margin:0,
    nav:true,
    dot: true,
    items: 1,
    autoplay:true,
    autoplayTimeout:3000,
    slideSpeed: 1000, 
  });


  $('.counter').counterUp({
    delay:50,
    time:8000
  });

  // Testimonials
  $('.testimonials .owl-carousel').owlCarousel({
    loop:true,
    autoplay: true,
    responsiveClass:true,
    center:true,
    nav:false,
    dot: false,
    responsive:{
      0:{
        items:2,
      },
      479:{
        items:2,
        margin:0,
      },
      575:{
        items:2,
      },
      767:{
        items:2,
      },
      992:{
        items:5,
      },
      1199:{
        items:5,
        margin:20,
      }
    }
  });

  // Testimonials
  $('.testimonial.style-two .owl-carousel').owlCarousel({
    loop:true,
    margin:30,
    autoplay: true,
    responsiveClass:true,
    center:true,
    nav:false,
    dot: true, 
    items: 1,
    responsive:{
      0:{
        items:1,
      },
      479:{
        items:2,
      },
      575:{
        items:2,
      },
      767:{
        items:2,
      },
      992:{
        items:3,
      },
      1199:{
        items:3,
      }
    }   
  });

  // Gallery
  $('.gallery .owl-carousel').owlCarousel({
    loop:true,
    margin:0,
    autoplay: false,
    responsiveClass:true,
    nav:true,
    dots: false,
    mouseDrag: false,
    responsive:{
      0:{
        items:1,
      },
      479:{
        items:2,
      },
      575:{
        items:2,
      },
      767:{
        items:2,
      },
      992:{
        items:3,
      },
      1199:{
        items:3,
      }
    }
  });

  // Banner Slider
  $('.our-blogs .owl-carousel').owlCarousel({
    autoplayHoverPause:true,
    loop:true,
    margin:0,
    nav:true,
    dot: true,
    items: 1,
    autoplay:true,
    autoplayTimeout:3000,
    slideSpeed: 1000, 
  });

  // Banner Slider
  $('.blog-details .owl-carousel').owlCarousel({
    autoplayHoverPause:true,
    loop:true,
    margin:0,
    nav:true,
    dot: true,
    items: 1,
    autoplay:true,
    autoplayTimeout:3000,
    slideSpeed: 1000, 
  });

  //Progress Bar Script
  $('.progress-wrap').waypoint(function () {
    var delay = 600;
    $('.progress-bar').each(function (i) {
      $(this).delay(delay * i).animate({
        width: $(this).attr('aria-valuenow') + '%'
      }, delay);
      $(this).prop('Counter', 0).animate({
        Counter: $(this).text()
      },
      {
        duration: delay,
        easing: 'swing',
      });
    });
  },
  {
    offset: '100%',
    triggerOnce: true,
  });

});