jQuery(document).ready(function () {

  /* Intro Slider */
  var windowWidth = jQuery(window).width();

  function introSlider() {
    var $introslide = jQuery('.intro-block-main');
    var introlist = $introslide.children().length;
    if (windowWidth <= 1023) {

      $introslide.slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        infinite: true,
        speed: 2000,
        dots: true,
        arrows: false,
        variableWidth: true,
        draggable: true,
        swipeToSlide: true,
        touchThreshold: 100,
        autoplay: false,
        autoplaySpeed: 0,

        cssEase: 'linear',
      });

    }
  }
  introSlider();

  jQuery(window).on('resize load', function () {
    var newScreenWidth = jQuery(window).width();
    if (newScreenWidth !== windowWidth) {
      windowWidth = newScreenWidth;
      introSlider();
    }
  });
  /* End of Intro slider */

  /* Intro  row Slider */
  var windowWidth = jQuery(window).width();

  function introSliders() {
    var $introslides = jQuery('.intro-block-row');
    var introlists = $introslides.children().length;
    if (windowWidth <= 1023) {

      $introslides.slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        infinite: true,
        speed: 2000,
        dots: true,
        arrows: false,
        variableWidth: true,
        draggable: true,
        swipeToSlide: true,
        touchThreshold: 100,
        autoplay: false,
        autoplaySpeed: 0,

        cssEase: 'linear',
      });

    }
  }
  introSliders();

  jQuery(window).on('resize load', function () {
    var newScreenWidth = jQuery(window).width();
    if (newScreenWidth !== windowWidth) {
      windowWidth = newScreenWidth;
      introSliders();
    }
  });
  /* End of Intro row slider */


  /* prod  row Slider */
  var windowWidth = jQuery(window).width();

  function prodSliders() {
    var $prodslides = jQuery('.prod-block-row');
    var prodlists = $prodslides.children().length;
    if (windowWidth <= 1023) {

      $prodslides.slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        infinite: true,
        speed: 2000,
        dots: true,
        arrows: false,
        variableWidth: true,
        draggable: true,
        swipeToSlide: true,
        touchThreshold: 100,
        autoplay: false,
        autoplaySpeed: 0,

        cssEase: 'linear',
      });

    }
  }
  prodSliders();

  jQuery(window).on('resize load', function () {
    var newScreenWidth = jQuery(window).width();
    if (newScreenWidth !== windowWidth) {
      windowWidth = newScreenWidth;
      prodSliders();
    }
  });
  /* End of Intro row slider */


  /* servcie  Slider */
  var windowWidth = jQuery(window).width();

  function serviceSlider() {
    var $serviceslide = jQuery('.services-block-main');
    var servicelist = $serviceslide.children().length;
    if (windowWidth <= 1023) {

      $serviceslide.slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        infinite: true,
        speed: 2000,
        dots: true,
        arrows: false,
        variableWidth: true,
        draggable: true,
        swipeToSlide: true,
        touchThreshold: 100,
        autoplay: false,
        autoplaySpeed: 0,
        adaptiveHeight: true,
        cssEase: 'linear',
      });

    }
  }
  serviceSlider();


  jQuery(window).on('resize load', function () {
    var newScreenWidth = jQuery(window).width();
    if (newScreenWidth !== windowWidth) {
      windowWidth = newScreenWidth;
      serviceSlider();
    }
  });
  /* End of service slider */


  /* testimo  Slider */
  var windowWidth = jQuery(window).width();

  function testimoSlider() {
    var $testimoslide = jQuery('.testimo-row');
    var testimolist = $testimoslide.children().length;
    if (windowWidth <= 1023) {

      $testimoslide.slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        infinite: true,
        speed: 2000,
        dots: true,
        arrows: false,
        variableWidth: true,
        draggable: true,
        swipeToSlide: true,
        touchThreshold: 100,
        autoplay: false,
        autoplaySpeed: 0,
        adaptiveHeight: true,
        cssEase: 'linear',
      });

    }
  }
  testimoSlider();


  jQuery(window).on('resize load', function () {
    var newScreenWidth = jQuery(window).width();
    if (newScreenWidth !== windowWidth) {
      windowWidth = newScreenWidth;
      testimoSlider();
    }
  });
  /* End of testimo slider */


  /* feature  Slider */
  var windowWidth = jQuery(window).width();

  function featureSlider() {
    var $featureslide = jQuery('.features-inner, .features-two-inner, .features-three-inner');
    var featurelist = $featureslide.children().length;
    if (windowWidth <= 1023) {

      $featureslide.slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        infinite: true,
        speed: 2000,
        dots: true,
        arrows: false,
        variableWidth: true,
        draggable: true,
        swipeToSlide: true,
        touchThreshold: 100,
        autoplay: false,
        autoplaySpeed: 0,
        adaptiveHeight: false,
        cssEase: 'linear',
        responsive: [{
          breakpoint: 768,
          settings: {
            adaptiveHeight: true,

          }
        }]
      });

    }
  }
  featureSlider();


  jQuery(window).on('resize load', function () {
    var newScreenWidth = jQuery(window).width();
    if (newScreenWidth !== windowWidth) {
      windowWidth = newScreenWidth;
      testimoSlider();
    }
  });
  /* End of features slider */


  /* people  Slider */
  var windowWidth = jQuery(window).width();

  function peopleslider() {
    var $peopleslide = jQuery('.people-inner');
    var peoplelist = $peopleslide.children().length;
    if (windowWidth <= 1023) {

      $peopleslide.slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        infinite: true,
        speed: 2000,
        dots: true,
        arrows: false,
        variableWidth: true,
        draggable: true,
        swipeToSlide: true,
        touchThreshold: 100,
        autoplay: false,
        autoplaySpeed: 0,
        adaptiveHeight: true,
        cssEase: 'linear',
      });

    }
  }
  peopleslider();


  jQuery(window).on('resize load', function () {
    var newScreenWidth = jQuery(window).width();
    if (newScreenWidth !== windowWidth) {
      windowWidth = newScreenWidth;
      peopleslider();
    }
  });
  /* End of people slider */


  /* resource  Slider */
  var windowWidth = jQuery(window).width();

  function resourceslider() {
    var $resourceslide = jQuery('.resource-list-btm');
    var resourcelist = $resourceslide.children().length;
    if (windowWidth <= 1023) {

      $resourceslide.slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        infinite: true,
        speed: 2000,
        dots: true,
        arrows: false,
        variableWidth: true,
        draggable: true,
        swipeToSlide: true,
        touchThreshold: 100,
        autoplay: false,
        autoplaySpeed: 0,
        adaptiveHeight: true,
        cssEase: 'linear',
      });

    }
  }
  resourceslider();


  jQuery(window).on('resize load', function () {
    var newScreenWidth = jQuery(window).width();
    if (newScreenWidth !== windowWidth) {
      windowWidth = newScreenWidth;
      resourceslider();
    }
  });
  /* End of resource slider */


  /* Testimonial Slider */
  jQuery(".testimonial-slider").slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    draggable: true,
    swipeToSlide: true,
    touchThreshold: 100,
    infinite: false,
    speed: 1000,
    dots: false,
    arrows: true,
    adaptiveHeight: true,
    prevArrow: '<div class="slick-arrow slick-prev flex flex-center" aria-label="Previous Arrow" role="button"><span><i class="fa-sharp fa-regular fa-arrow-left"></i></span></div>',
    nextArrow: '<div class="slick-arrow slick-next flex flex-center" aria-label="Next Arrow" role="button"><span><i class="fa-sharp fa-regular fa-arrow-right"></i></span></div>',
  });

  /* Logo Slider */
  var windowWidth = jQuery(window).width();

function LogoSlider() {
  var $logoSlider = jQuery('.logo-slider-row');
  var logoslideCount = $logoSlider.children().length;

  if ($logoSlider.hasClass('slick-initialized')) {
    $logoSlider.slick('unslick');
  }

  if (windowWidth >= 768) {
    if (logoslideCount > 5) {
      $logoSlider.removeClass('few-logos'); 
      $logoSlider.slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        infinite: true,
        speed: 1000,
        dots: false,
        arrows: true,
        variableWidth: true,
        draggable: true,
        swipeToSlide: true,
        touchThreshold: 100,
        autoplay: false,
        autoplaySpeed: 0,
        centerMode: true,
        centerPadding: '0',
        cssEase: 'linear',
        prevArrow:
          '<div class="slick-arrow slick-prev flex flex-center" aria-label="Previous Arrow" role="button"><span><i class="fa-sharp fa-regular fa-arrow-left"></i></span></div>',
        nextArrow:
          '<div class="slick-arrow slick-next flex flex-center" aria-label="Next Arrow" role="button"><span><i class="fa-sharp fa-regular fa-arrow-right"></i></span></div>',
        responsive: [
          {
            breakpoint: 1290,
            settings: {
              slidesToShow: 4,
              variableWidth: false,
            },
          },
          {
            breakpoint: 1024,
            settings: {
              slidesToShow: 3,
              variableWidth: false,
            },
          },
        ],
      });
    } else {
      $logoSlider.addClass('few-logos');
    }
  }
}
LogoSlider();

jQuery(window).on('resize load', function () {
  var newScreenWidth = jQuery(window).width();
  if (newScreenWidth !== windowWidth) {
    windowWidth = newScreenWidth;
    LogoSlider();
  }
});


  /* Products Slider */
  jQuery('.slider-nav').slick({
    slidesToShow: 5,
    slidesToScroll: 1,
    infinite: true,
    dots: false,
    speed: 1000,
    arrows: false,
    vertical: true,
    verticalSwiping: true,
    swipeToSlide: true,
    focusOnSelect: true,
    asNavFor: '.slider-for',
  }).on('setPosition', function () {
    jQuery('.slider-nav .slick-list').css('height', '1020px');
  });
  jQuery('.slider-for').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: false,
    speed: 1000,
    fade: true,
    focusOnSelect: true,
    infinite: true,
    asNavFor: '.slider-nav',
    prevArrow: '<div class="slick-arrow slick-prev flex flex-center" aria-label="Previous Arrow" role="button"><span><i class="fa-sharp fa-regular fa-arrow-left"></i></span></div>',
    nextArrow: '<div class="slick-arrow slick-next flex flex-center" aria-label="Next Arrow" role="button"><span><i class="fa-sharp fa-regular fa-arrow-right"></i></span></div>',
    responsive: [{
        breakpoint: 1024,
        settings: {
          slidesToShow: 3,
          arrows: true,
          fade: false,
          variableWidth: true,
          adaptiveHeight: true,
        }
      },
      {
        breakpoint: 740,
        settings: {
          slidesToShow: 1,
          adaptiveHeight: true,
          arrows: true,
          fade: false,
          variableWidth: true,
        }
      }
    ]

  });


  /* Services Slider */
  jQuery('.sf-for').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    infinite: true,
    dots: false,
    speed: 1000,
    arrows: false,
    focusOnSelect: true,
    asNavFor: '.sf-nav',
    fade: true,
    draggable: true,
    swipeToSlide: true,
    touchThreshold: 100,
  });

  var $nav = jQuery('.sf-nav');
  var navCount = $nav.children().length;

  $nav.slick({
    slidesToShow: 3,
    slidesToScroll: 1,
    speed: 1000,
    focusOnSelect: true,
    infinite: (navCount > 3),
    variableWidth: true,
    draggable: (navCount > 3),
    swipe: (navCount > 3),
    swipeToSlide: (navCount > 3),
    touchMove: (navCount > 3),
    accessibility: (navCount > 3),
    touchThreshold: 100,
    asNavFor: '.sf-for',
    arrows: (navCount > 3),
    prevArrow: '<div class="slick-arrow slick-prev flex flex-center" aria-label="Previous Arrow" role="button"><span><i class="fa-sharp fa-regular fa-arrow-left"></i></span></div>',
    nextArrow: '<div class="slick-arrow slick-next flex flex-center" aria-label="Next Arrow" role="button"><span><i class="fa-sharp fa-regular fa-arrow-right"></i></span></div>',
    responsive: [{
      breakpoint: 768,
      settings: {
        slidesToShow: 1,
        infinite: (navCount > 1),
        draggable: (navCount > 1),
        swipe: (navCount > 1),
        swipeToSlide: (navCount > 1),
        touchMove: (navCount > 1),
        arrows: (navCount > 1)
      }
    }]
  });


});


function toggleSlider() {
  var slider = jQuery('.results-mod-lists');
  if (slider.hasClass('slick-initialized')) slider.slick('unslick');
  if (slider.children().length > 2 && jQuery(window).width() <= 1023) {
    slider.slick({
      slidesToShow: 2,
      slidesToScroll: 1,
      dots: true,
      arrows: false,
      speed: 1000,
      variableWidth: true,
      draggable: true,
      swipeToSlide: true,
      touchThreshold: 100,
      autoplay: false,
      autoplaySpeed: 0,
      adaptiveHeight: true
    });
  }
}
jQuery(toggleSlider);
jQuery(window).on('resize', toggleSlider);


/* about-stats Slider */
function aboutstatsSlider() {
  var s = jQuery('.about-stats-slider');
  if (s.hasClass('slick-initialized')) s.slick('unslick');
  if (s.children().length > 2) s.slick({
    slidesToShow: 2,
    dots: false,
    arrows: true,
    speed: 1000,
    variableWidth: true,
    draggable: true,
    swipeToSlide: true,
    touchThreshold: 100,
    adaptiveHeight: true,
    prevArrow: '<div class="slick-arrow slick-prev flex flex-center" aria-label="Previous Arrow" role="button"><span><i class="fa-sharp fa-regular fa-arrow-left"></i></span></div>',
    nextArrow: '<div class="slick-arrow slick-next flex flex-center" aria-label="Next Arrow" role="button"><span><i class="fa-sharp fa-regular fa-arrow-right"></i></span></div>',
    responsive: [{
      breakpoint: 1024,
      settings: {
        slidesToShow: 1,
        dots: true,
      }
    }]
  });
}
jQuery(aboutstatsSlider);
jQuery(window).on('resize', aboutstatsSlider);


/* Stats Slider */
function statsSlider() {
  var s = jQuery('.stats-slider');
  var p = s.parent();

  if (!s.hasClass('slick-initialized')) {
    s.slick({
      slidesToShow: 2,
      dots: false,
      arrows: true,
      speed: 1000,
      variableWidth: true,
      draggable: true,
      swipeToSlide: true,
      touchThreshold: 100,
      adaptiveHeight: true,
      prevArrow: '<div class="slick-arrow slick-prev flex flex-center" aria-label="Previous Arrow" role="button"><span><i class="fa-sharp fa-regular fa-arrow-left"></i></span></div>',
      nextArrow: '<div class="slick-arrow slick-next flex flex-center" aria-label="Next Arrow" role="button"><span><i class="fa-sharp fa-regular fa-arrow-right"></i></span></div>',
      responsive: [{
        breakpoint: 1024,
        settings: {
          slidesToShow: 1
        }
      }]
    });
  }

  if (s.children().length < 3) {
    p.addClass('no-slider');
  } else {
    p.removeClass('no-slider');
  }
}

jQuery(statsSlider);
jQuery(window).on('resize', statsSlider);
