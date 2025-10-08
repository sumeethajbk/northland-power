jQuery(document).ready(function () {

  /* Fixed Header */
  jQuery(window).on("scroll", function () {
    var scroll = jQuery(this).scrollTop();
    if (scroll >= 2) {
      jQuery(".main_header").addClass("fixed-header");
    } else {
      jQuery(".main_header").removeClass("fixed-header");
    }
  });

  /* Header Search */
  jQuery(document).on("click", ".search-icon", function (e) {
    e.preventDefault();
    if (jQuery(window).width() >= 1024) {
      var box = jQuery(".header-search").toggleClass("active").find(".search-field").focus().end();
      jQuery("nav.mobile_main_menu").toggleClass("active", box.hasClass("active"));
    } else {
      jQuery(this).toggleClass("active");
      jQuery(".search_form").slideToggle(300);
    }
  });

  jQuery(document).on("click", function (e) {
    if (jQuery(window).width() >= 1024 && !jQuery(e.target).closest(".header-search").length) {
      jQuery(".header-search, nav.mobile_main_menu").removeClass("active");
    }
  });


  /* Notification Banner */
  var $banner = jQuery('.notification-bar');
  var $closeBtn = jQuery('.notification-close');

  if ($banner.length && $closeBtn.length) {
    $closeBtn.on('click', function () {
      $banner.fadeOut(500);
    });
  }

  /* Dynamic Top value for maincontent */
  var basePad = parseInt(jQuery('#mainContent').css('padding-top')) || 0,
    baseTop = parseInt(jQuery('.main_header .header_right.mobile_menu').css('top')) || 0;

  function setOffsets() {
    var h = jQuery('.notification-bar:visible').outerHeight() || 0;
    jQuery('#mainContent').css('padding-top', basePad + h);
    jQuery('.main_header .header_right.mobile_menu').css('top', baseTop + h);
  }

  jQuery(window).on('load resize', setOffsets);
  jQuery(document).on('click', '.notification-bar .notification-close', function () {
    jQuery('.notification-bar').slideUp(300, setOffsets);
  });

  if (jQuery('.notification-bar').length)
    new ResizeObserver(setOffsets).observe(jQuery('.notification-bar')[0]);


  /* Menu */
  if (jQuery(window).width() <= 1023) {
    jQuery(".toggle_button").on("click", function (event) {
      event.preventDefault();
      jQuery(this).toggleClass("active");
      jQuery(".mobile_menu").toggleClass("navOpen");
      jQuery(".main_header").toggleClass("menu-open");
      jQuery("html").toggleClass("no-scroll");
    });
    jQuery("ul.main_menu > li.menu-item-has-children > a").on(
      "click",
      function (event) {
        event.preventDefault();
        jQuery("ul.main_menu > li.menu-item-has-children > a")
          .not(jQuery(this))
          .removeClass("active");
        jQuery(this).toggleClass("active");
        jQuery(this).parent().siblings().find("ul.sub-menu").slideUp();
        jQuery(this).next("ul.sub-menu").slideToggle();
        jQuery(this).parent().siblings().toggleClass("sib");
      }
    );
    jQuery("ul.main_menu ul > li.menu-item-has-children > a").on(
      "click",
      function (event) {
        event.preventDefault();
        jQuery("ul.main_menu ul > li.menu-item-has-children > a")
          .not(jQuery(this))
          .removeClass("active");
        jQuery(this).toggleClass("active");
        jQuery(this).parent().siblings().find("ul.sub-menu").slideUp();
        jQuery(this)
          .siblings("ul.main_menu ul > li > ul.sub-menu")
          .slideToggle();
      }
    );
  }

  /* Footer */
  if (jQuery(window).width() <= 767) {
    jQuery(".menu-list > li.menu-item-has-children > a").on("click", function (e) {
      e.preventDefault();
      let $link = jQuery(this),
        $submenu = $link.next(".sub-menu");
      jQuery(".menu-list > li.menu-item-has-children > a").not($link).removeClass("active")
        .next(".sub-menu").slideUp(300);
      $link.toggleClass("active");
      $submenu.stop(true, true).slideToggle(300);
    });
  }


  /* Accorrdion */
  jQuery(".accordion-item .accordion-heading").on("click", function (e) {
    e.preventDefault();
    if (jQuery(this).closest(".accordion-item").hasClass("active")) {
      jQuery(".accordion-item").removeClass("active");
    } else {
      jQuery(".accordion-item").removeClass("active");
      jQuery(this).closest(".accordion-item").addClass("active");
    }
    var jQuerycontent = jQuery(this).next();
    jQuerycontent.slideToggle(600);
    jQuery(".accordion-item .content").not(jQuerycontent).slideUp("600");
  });


  /* Form */
  jQuery(".frm_forms .frm_form_fields input, .frm_forms .frm_form_fields textarea").on('focus', function () {
    jQuery(this).siblings(".frm_form_field").addClass("input-has-value");
    jQuery(this).parent(".frm_form_field ").removeClass("frm_blank_field");

    jQuery(this).siblings(".frm_error").hide();
  }).on('blur', function () {
    if (!jQuery(this).val()) {
      jQuery(this).siblings(".frm_form_field").removeClass("input-has-value");
      jQuery(this).siblings(".frm_error").show();
      jQuery(this).parent(".frm_form_field ").addClass("frm_blank_field");

    } else {
      jQuery(this).siblings(".frm_form_field").addClass("input-has-value");
      jQuery(this).parent(".frm_form_field ").removeClass("frm_blank_field");

      jQuery(this).siblings(".frm_error").hide();
    }
  });


  /* Services Grid */    
const $grids = jQuery(".grid-wrapper .grid-single");

function handleHover() {
  if (window.innerWidth < 768) return;

  jQuery(".arrow").on("mouseenter", function () {
    const $grid = jQuery(this).closest(".grid-wrapper .grid-single");
    const $other = $grids.not($grid);

    $grids.find(".content").stop(true, true).animate({ left: 0 }, 500, "linear");
    $grids.removeClass("expanded-left expanded-right shrunk-left shrunk-right show-graph");

    if ($grid.index() === 0) {
      $grid.addClass("expanded-left show-graph")
           .find(".content").stop(true, true).animate({ left: "-61%" }, 500, "linear");
      $other.addClass("shrunk-right");
    } else {
      $grid.addClass("expanded-right show-graph")
           .find(".content").stop(true, true).animate({ left: "61%" }, 500, "linear");
      $other.addClass("shrunk-left");
    }
  });

  jQuery(".grid-wrapper").on("mouseleave", () => {
    $grids.find(".content").stop(true, true).animate({ left: 0 }, 500, "linear");
    $grids.removeClass("expanded-left expanded-right shrunk-left shrunk-right show-graph");
  });
}

handleHover();
jQuery(window).on("resize", handleHover);    
    





  // Get OS
  var os = ['iphone', 'ipad', 'windows', 'mac', 'linux'];
  var match = navigator.appVersion
    .toLowerCase()
    .match(new RegExp(os.join("|")));
  if (match) {
    jQuery("body").addClass(match[0]);
  }

  /* Sticky Fixed Social Icons */
  if (jQuery(window).width() >= 1024) {
    let $i = jQuery(".fixed-social-icons"),
      $p = jQuery(".general-default-inner"),
      $b = jQuery(".hero-banner-section"),
      o = 100;

    if ($i.length && $p.length && $b.length) {
      if ($p.css("position") === "static") $p.css("position", "relative");

      $i.css({
        position: "fixed",
        top: o,
        right: 0,
        transition: "all 0.3s ease"
      });

      jQuery(window).on("scroll", function () {
        let s = jQuery(this).scrollTop(),
          pt = $p.offset().top,
          pb = pt + $p.outerHeight(),
          ih = $i.outerHeight(),
          bb = $b.offset().top + $b.outerHeight();

        $i.css(
          s + ih + o >= pb
          ? {
            position: "absolute",
            top: "auto",
            bottom: 0
          }
          : s < bb
          ? {
            position: "absolute",
            top: 0,
            bottom: "auto"
          }
          : {
            position: "fixed",
            top: o,
            right: 0,
            bottom: "auto",
            opacity: 1
          }
        );
      });
    }
  }


  /* Leadership */
  jQuery(".card").hover(
    function () {
      jQuery(this).find(".content").css("visibility", "visible").stop(true, true).animate({
        opacity: 1
      }, 300);
    },
    function () {
      jQuery(this).find(".content").stop(true, true).animate({
        opacity: 0
      }, 300, function () {
        jQuery(this).css("visibility", "hidden");
      });
    }
  );

  jQuery(".leader-close").on("click", function (e) {
    e.stopPropagation();
    jQuery(this).closest(".card").find(".content").stop(true, true).animate({
      opacity: 0
    }, 300, function () {
      jQuery(this).css("visibility", "hidden");
    });
  });

  /* News Filter Toggle */
  if (jQuery(window).width() <= 767) {
    jQuery(document).on('click', '.heading_mobile_menu', function (e) {
      e.preventDefault();
      jQuery(this).toggleClass('active');
      jQuery('.news-search').toggleClass('inactive', jQuery(this).hasClass('active'));
      jQuery('.news-filter-inner ul').slideToggle();
    }).on('click', '.news-filter-inner ul li a', function (e) {
      e.preventDefault();
      jQuery('.heading_mobile_menu').contents().filter(function () {
        return this.nodeType === 3;
      }).first().replaceWith(jQuery(this).text());
      jQuery('.heading_mobile_menu').removeClass('active');
      jQuery('.news-search').toggleClass('inactive');
      jQuery('.news-filter-inner ul').slideUp();
    });
  }

  jQuery(".link-box-main .link-box:first-child a").addClass("active");
  jQuery(".link-box-main .link-box a").on("click", function (e) {
    e.preventDefault();

    jQuery(this)
      .addClass("active")
      .closest(".link-box")
      .siblings(".link-box")
      .find("a")
      .removeClass("active");
  });

  if (jQuery(window).width() <= 767) {
      jQuery('.map-filter-dropdown').on('click', function (event) {
        event.preventDefault();
        jQuery(this).toggleClass('open');
        jQuery('ul.map-filter').slideToggle(500);
      });

      jQuery('ul.map-filter > li').on('click', function () {
        event.preventDefault();
        jQuery('ul.map-filter').slideUp(500);
        jQuery('.map-filter-dropdown').removeClass('open');

          let mapText = jQuery(this).find('.map-filter-title').text();

          // Update the dropdown's first span text
          jQuery('.map-filter-dropdown span:first').text(mapText);
      });
  }

  if (jQuery(window).width() <= 1023) {
      jQuery('.map-project-count-dropdown').on('click', function (event) {
        event.preventDefault();
        jQuery(this).toggleClass('open');
        jQuery('ul.map-sub-filter').slideToggle(500);
      });

      jQuery('ul.map-sub-filter > li').on('click', function () {
        event.preventDefault();
        jQuery('ul.map-sub-filter').slideUp(500);
        jQuery('.map-project-count-dropdown').removeClass('open');

           let newText = jQuery(this).find('.map-sub-filter-title').text();

          // Update the dropdown's first span text
          jQuery('.map-project-count-dropdown span:first').text(newText);
      });
  }

  jQuery("ul.map-filter  li:first-child").addClass("active");
  jQuery("ul.map-filter  li").on("click", function (e) {
    e.preventDefault();

    jQuery(this)
      .addClass("active")
      .closest("ul.map-filter  li")
      .siblings("ul.map-filter  li")
      .removeClass("active");
  });

  jQuery("ul.map-sub-filter  li").on("click", function (e) {
    e.preventDefault();

    jQuery(this)
      .addClass("active")
      .closest("ul.map-sub-filter  li")
      .siblings("ul.map-sub-filter  li")
      .removeClass("active");
  });


});
