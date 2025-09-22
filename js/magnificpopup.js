// import $ from 'jquery';
// import 'magnific-popup';

const magnificPopup = {
  $youtube: document.querySelectorAll('.popup-youtube'),
  $video: document.querySelectorAll('.popup-vimeo'),
  $modal: document.querySelectorAll('.popup-modal'),
  init() {
    const _ = this;
    _.$youtube.forEach((youtube) => {
      const yt = jQuery(youtube);
      yt.magnificPopup({
        type: 'iframe',
        mainClass: 'mfp-video',
        removalDelay: 160,
        preloader: false,
        fixedContentPos: true,
        iframe: {
          patterns: {
            youtube: {
              index: 'youtube.com/',
              id: 'v=',
              src: getYouTubeSrc(), // Call a function to generate the appropriate YouTube URL
            },
          },
        },
      });
      function getYouTubeSrc() {
        var isChrome =
          /Chrome/.test(navigator.userAgent) &&
          /Google Inc/.test(navigator.vendor);
        var baseSrc = 'https://www.youtube.com/embed/%id%?autoplay=1&rel=0';
        if (isChrome) {
          return baseSrc + '&mute=1';
        } else {
          return baseSrc;
        }
      }
    });
    _.$video.forEach((video) => {
      const $vimeo = $(video);
      $vimeo.magnificPopup({
        type: 'iframe',
        mainClass: 'mfp-video',
        removalDelay: 160,
        preloader: false,
        fixedContentPos: true,
      });
    });
    _.$modal.forEach((modal) => {
      modal.magnificPopup({
        type: 'inline',
        fixedContentPos: true,
        fixedBgPos: true,
        overflowY: 'auto',
        preloader: false,
        removalDelay: 160,
        mainClass: 'my-mfp-slide-top',
      });
    });
  },
};

magnificPopup.init();
