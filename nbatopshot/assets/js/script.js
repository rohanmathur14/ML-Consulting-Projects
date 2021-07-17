var swiper = new Swiper(".home-section-2-mob", {
      spaceBetween: 30,
      centeredSlides: true,
      speed: 1000,
      autoplay: {
        delay: 2500,
        disableOnInteraction: false,
      },
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
    });

 var swiper = new Swiper(".product-section-slider", {
        spaceBetween: 30,
        centeredSlides: true,
        speed: 1000,
        loop: true,
        autoplay: {
          delay: 5500,
          disableOnInteraction: false,
        },
        pagination: {
          el: ".swiper-pagination",
          clickable: true,
        },
        navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
        },
      });

 var swiper = new Swiper(".allBallers", {
        breakpoints: {
          640: {
            slidesPerView: 3,
            spaceBetween: 20,
          },
          768: {
            slidesPerView: 4,
            spaceBetween: 40,
          },
          1024: {
            slidesPerView: 7,
            spaceBetween: 50,
          },
        },
        spaceBetween: 30,
        freeMode: true,
        pagination: {
          el: ".swiper-pagination",
          clickable: true,
        },
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
      });