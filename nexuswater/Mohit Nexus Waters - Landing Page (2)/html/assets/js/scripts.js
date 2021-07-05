$(document).ready(function() {
  "use strict";

  //Header Sticky
  $(".oildrop-header").sticky();

  //Add And Remove Class Script
  $('.oildrop-toggle').click(function() {
    $(this).toggleClass('active');
    $('.header-wrap').toggleClass('open');
  });

  //Add And Remove Class Script
  $('.pctrl-social-btn').click(function() {
    $(this).toggleClass('active');
    $('.post-controls').toggleClass('active');
  });

  // Outside Click Remove Class Script
  $(document).on('click', function(event) {
    if (!$(event.target).closest('.header-wrap, .oildrop-toggle').length)  {
      $('.header-wrap').removeClass('open');
      $('.oildrop-toggle').removeClass('active');
    }
  });

  jQuery('.close-icon').on('click', function() {
    jQuery('.header-wrap').removeClass('open');
    jQuery('.oildrop-toggle').removeClass('active');
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


 // Home Page Banner Owl Carousel
  $('.banner .owl-carousel').owlCarousel({
    loop:true,
    margin:0,
    responsiveClass:true,
    nav: true,
    dots:true,
    items:1,    
  });

  // Testimonials
  $('.testimonials .owl-carousel').owlCarousel({
    loop:true,
    margin:30,
    autoplay: false,
    responsiveClass:true,
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
        nav:false,
        dots: true
      }
    }
  });

  // Partners
  $('.partner .owl-carousel').owlCarousel({
    loop:true,
    margin:30,
    autoplay: true,
    responsiveClass:true,
    responsive:{
      0:{
        items:3,
      },
      479:{
        items:3,
      },
      575:{
        items:3,
      },
      767:{
        items:4,
      },
      992:{
        items:5,
      },
      1199:{
        items:6,
        nav:false,
        dots: true
      }
    }
  });

  // Testimonials
  $('.portfolio-slider .owl-carousel').owlCarousel({
    items:1,
    loop:true,
    margin:0,
    autoplay: false,
    responsiveClass:true, 
    animateOut: 'fadeOut',
    mouseDrag: false,
    nav:true,
    });

  // Testimonials
  $('.blog-banner .owl-carousel').owlCarousel({
    items:1,
    loop:true,
    margin:10,
    autoplay: false,
    responsiveClass:true, 
    mouseDrag: true,
    dots: true
    });



});