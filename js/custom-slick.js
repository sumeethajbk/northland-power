jQuery(document).ready(function () {

  /* Homa Banner */
  jQuery('.caption-details, .slide-description').each((_, el) => {
    const text = jQuery(el).text().replace(/\u00A0/g, ' ').trim();
    const words = text.split(/\s+/);
    jQuery(el).html(
      words.map((w, i) => `<span style="animation-delay:${i * 0.05}s">${w}&nbsp;</span>`).join('')
    );
  });

  const slides = jQuery('.slide').map((_, el) => {
    const $el = jQuery(el);
    return {
      title: $el.find('.caption-details').text(),
      desc: $el.find('.slide-description').text(),
      image: $el.find('img').attr('src')
    };
  }).get();

  const total = slides.length;

  jQuery('.slide').first().addClass('initial-load');
  setTimeout(() => jQuery('.slide').first().removeClass('initial-load'), 1000);

  var $sliderm = jQuery('.main-slider');
  $sliderm.slick({
    dots: true,
    infinite: true,
    speed: 1070,
    autoplay: true,
    autoplaySpeed: 5000,
    fade: true,
    cssEase: 'cubic-bezier(0.645,0.045,0.355,1)',
    prevArrow: `<div class="slick-arrow slick-prev" aria-label="Previous Arrow" role="button"><div class="arrow-icon"><i class="fa-sharp fa-thin fa-arrow-left"></i></div></div>`,
    nextArrow: `<div class="slick-arrow slick-next" aria-label="Next Arrow" role="button"><div class="arrow-icon"><i class="fa-sharp fa-thin fa-arrow-right"></i></div></div>`
  });

  function updatePreviews(currentIndex) {
    var total = $sliderm.slick('getSlick').slideCount;

    var prevIndex = (currentIndex - 1 + total) % total;
    var $prevSlide = $sliderm.find('.slide').eq(prevIndex);
    jQuery('.prev-slick-img img').attr('src', $prevSlide.find('img').attr('src'));
    jQuery('.prev-slick-caption').html('<p>' + $prevSlide.find('.caption-details').text() + '</p>');

    var nextIndex = (currentIndex + 1) % total;
    var $nextSlide = $sliderm.find('.slide').eq(nextIndex);
    jQuery('.next-slick-img img').attr('src', $nextSlide.find('img').attr('src'));
    jQuery('.next-slick-caption').html('<p>' + $nextSlide.find('.caption-details').text() + '</p>');
  }

  setTimeout(function () {
    jQuery('.slick-prev').prepend(`
    <div class="prev-slick-img slick-thumb-nav">
      <div class="thumb-small"><img src="/prev.jpg"></div>
      <div class="prev-slick-caption"></div>
    </div>
  `);
    jQuery('.slick-next').append(`
    <div class="next-slick-img slick-thumb-nav">
      <div class="thumb-small"><img src="/next.jpg"></div>
      <div class="next-slick-caption"></div>
    </div>
  `);

    var current = $sliderm.slick('slickCurrentSlide');
    updatePreviews(current);
  }, 500);

  $sliderm
    .on('beforeChange', function (event, slick, curr, next) {
      const $c = jQuery('.slide').eq(curr).find('img');
      $c.css('transform', 'translateY(0) scale(1)');
      setTimeout(() => $c.css('transform', ''), 875);
    })
    .on('afterChange', function (event, slick, currentSlide) {
      updatePreviews(currentSlide);
    });

  jQuery('.slider-container .slick-dots li button').each(function () {
    jQuery(this).html(`
    <svg width="24" height="24">
      <circle class="bg" cx="12" cy="12" r="10"></circle>
      <circle class="progress" cx="12" cy="12" r="10"></circle>
    </svg>
  `);
  });


  /* Featured News */
  var $slider = jQuery('.featured-news-wrap');
  var slickInitialized = false;

  function initSlider() {
    if (jQuery(window).width() < 768) {
      jQuery(".featured-news-top-rt-inner, .featured-news-top-rt, .featured-news-top-lt, .featured-news-ftr").each(function () {
        jQuery(this).children().unwrap();
      });

      if (!slickInitialized) {
        $slider.slick({
          slidesToShow: 1,
          slidesToScroll: 1,
          infinite: false,
          speed: 1000,
          dots: true,
          arrows: false,
          variableWidth: true,
          draggable: true,
          swipeToSlide: true,
          touchThreshold: 100,
          autoplay: false,
          autoplaySpeed: 0,
          cssEase: 'linear',
          prevArrow: '<div class="slick-arrow slick-prev flex flex-center" aria-label="Previous Arrow" role="button"><span><i class="fa-light fa-chevron-left"></i></span></div>',
          nextArrow: '<div class="slick-arrow slick-next flex flex-center" aria-label="Next Arrow" role="button"><span><i class="fa-light fa-chevron-right"></i></span></div>',
        });
        slickInitialized = true;
      }
    } else {
      if (slickInitialized) {
        $slider.slick('unslick');
        slickInitialized = false;
      }
    }
  }

  initSlider();
  jQuery(window).on("resize", function () {
    initSlider();
  });


  jQuery('.case-studies-lists').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: true,
    speed: 1000,
    dots: false,
    variableWidth: true,
    infinite: false,
    prevArrow: '<div class="slick-arrow slick-prev flex flex-center" aria-label="Previous Arrow" role="button"><span><i class="fa-light fa-chevron-left"></i></span></div>',
    nextArrow: '<div class="slick-arrow slick-next flex flex-center" aria-label="Next Arrow" role="button"><span><i class="fa-light fa-chevron-right"></i></span></div>',
    responsive: [{
        breakpoint: 1024,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
          arrows: true,
          variableWidth: false,
          adaptiveHeight: true,
        }
      },
      {
        breakpoint: 768,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
          adaptiveHeight: true,
          arrows: true,
          variableWidth: false,
        }
      }
    ]

  });


  jQuery('.awards-lists').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: false,
    speed: 1000,
    dots: false,
    autoplay: true,
    variableWidth: true,
    draggable: true,
    infinite: true,
    prevArrow: '<div class="slick-arrow slick-prev flex flex-center" aria-label="Previous Arrow" role="button"><span><i class="fa-light fa-chevron-left"></i></span></div>',
    nextArrow: '<div class="slick-arrow slick-next flex flex-center" aria-label="Next Arrow" role="button"><span><i class="fa-light fa-chevron-right"></i></span></div>',
    responsive: [{
        breakpoint: 1024,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
          arrows: true,
          variableWidth: false,
          adaptiveHeight: true,
        }
      },
      {
        breakpoint: 768,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
          adaptiveHeight: false,
          arrows: false,
          variableWidth: false,
        }
      }
    ]

  });


  jQuery('.careers-banner-slider').slick({
    slidesToShow: 5,
    slidesToScroll: 1,
    arrows: false,
    speed: 800,
    dots: false,
    autoplay: true,
    variableWidth: true,
    draggable: true,
    infinite: true,
    responsive: [{
        breakpoint: 1024,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 1,
          arrows: false,
          variableWidth: true,
          adaptiveHeight: false,
        }
      },
      {
        breakpoint: 768,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
          adaptiveHeight: false,
          arrows: false,
          variableWidth: true,
        }
      }
    ]

  });

});
