$(document).ready(function() {
  "use strict";

  //Header Sticky
  $(".header").sticky();

  //Add And Remove Class Script
  $('.header-toggle').click(function() {
    $(this).toggleClass('active');
    $('.mobile-menu').toggleClass('open');
    $('body').toggleClass('menu-open');
  });

  $(".mobile-dropdown > a").on("click", function () {
    $(".mobile-dropdown").find(".mobile-dropdown-nav").stop().slideUp();
    $(this).closest(".mobile-dropdown").find(".mobile-dropdown-nav").stop().slideToggle();
  });

  jQuery('.close-icon').on('click', function() {
    jQuery('.mobile-menu').removeClass('open');
    jQuery('.header-toggle').removeClass('active');
    $('body').removeClass('menu-open');
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

   $('.entry-filter').click(function() {
    $(this).toggleClass('active');
  });

    


 // Home Page Banner Owl Carousel
  $('.banner .owl-carousel').owlCarousel({
    loop:true,
    margin:0,
    autoplay: true,    
    responsiveClass:true,
    nav: false,
    dots:false,
    mouseDrag: false,
    animateOut: 'fadeOut',
    items:1,    
  });

  // Testimonials
  $('.popular-restaurants .owl-carousel').owlCarousel({
    loop:false,
    margin:30,
    autoplay: false,
    responsiveClass:true,
    nav:true,
    dots: true,
    responsive:{
      0:{
        items:1,
        nav:false,
      },
      479:{
        items:2,
        nav:false,
      },
      575:{
        items:3,
        nav:false,
      },
      767:{
        items:3,
        nav:false,
      },
      992:{
        items:4,
        nav:false,
      },
      1199:{
        items:4,
        
      }
    }
  });

   $('.search-dish .owl-carousel').owlCarousel({
    loop:true,
    margin:30,
    autoplay: false,
    responsiveClass:true,
    nav:true,
    dots: true,
    responsive:{
      0:{
        items:2,
        nav:false,
      },
      479:{
        items:3,
        nav:false,
      },
      575:{
        items:3,
        nav:false,
      },
      767:{
        items:5,
        nav:false,
      },
      992:{
        items:5,
        nav:false,
        
      },
      1199:{
        items:6,
        
      }
    }
  });

   $('.about-us .owl-carousel').owlCarousel({
    loop:true,
    margin:30,
    autoplay: false,
    responsiveClass:true,
    nav:true,
    dots: true,
    responsive:{
      0:{
        items:1,
        nav:false,
      },
      479:{
        items:1,
        nav:false,
      },
      575:{
        items:1,
        nav:false,
      },
      767:{
        items:1,
        nav:false,
      },
      992:{
        items:1,
        nav:false,
      },
      1199:{
        items:2,
        
      }
    }
  });


   $('select').niceSelect();   



   $('.entry-center a').click(function(){
    $('.entry-center a').removeClass('active');
    $(this).addClass('active');
   });

   $('.entry-center a').click(function(){
    $('.area-places .col-lg-3').toggleClass('grid-view');
    $('.area-places .col-lg-3').toggleClass('list-view');
    $('body').toggleClass('list-view-body')
   });

});