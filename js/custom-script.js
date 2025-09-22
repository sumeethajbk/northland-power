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
      $p = jQuery(".general-default-inner");
    if ($i.length && $p.length) {
      if ($p.css("position") === "static") $p.css("position", "relative");
      let o = 300;
      jQuery(window).on("scroll", function () {
        let s = jQuery(this).scrollTop(),
          pt = $p.offset().top,
          pb = pt + $p.outerHeight(),
          ih = $i.outerHeight();
        if (s + o >= pt && s + ih + o < pb) $i.css({
          position: "fixed",
          top: o + "px",
          bottom: "auto"
        });
        else if (s + ih + o >= pb) $i.css({
          position: "absolute",
          top: "auto",
          bottom: 0
        });
        else $i.css({
          position: "absolute",
          top: 0,
          bottom: "auto"
        });
      });
    }
  }

  /* Leadership */
  jQuery(".card").hover(
    function(){ jQuery(this).find(".content").css("visibility","visible").stop(true,true).animate({opacity:1},300); },
    function(){ jQuery(this).find(".content").stop(true,true).animate({opacity:0},300,function(){ jQuery(this).css("visibility","hidden"); }); }
  );

  jQuery(".leader-close").on("click", function(e){
    e.stopPropagation();
    jQuery(this).closest(".card").find(".content").stop(true,true).animate({opacity:0},300,function(){ jQuery(this).css("visibility","hidden"); });
  });

});
