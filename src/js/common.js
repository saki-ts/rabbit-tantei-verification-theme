import {debounce} from "./lodash";

var events = new commonEvent();

function commonEvent(){
  stickyHeader();
  drawerControl();
  anchorLink();
  IE11SmoothScrollOff();
}

function drawerControl(){
  const
  interval = 50,
  $trigger = $('.h_nav__hamburger'),
  $headerNav = $('.h_nav');

  $(window).on('load resize', _.debounce(function() {
  const
  win_w = $(window).width(),
  bp = 900;

    if (win_w < bp) {
      drawer();
    }
    else {
      $headerNav.removeAttr('style').removeClass('js-nav-open');
      $trigger.removeClass('js-nav-trigger');
    }
  }, interval));
}

// --------------------------------------- drawer
function drawer(){
  let
  $trigger = $('.h_nav__hamburger'),
  $headerNav = $('.h_nav'),
  $navlinks = $('.h_nav__item').children('a'),
  $header = $('.h'),
  headerY = $header.outerHeight();
  
  $headerNav.css('top', Math.floor(headerY));

  $trigger.off('click');
  $trigger.on('click', function() {
    const checkClass = $trigger.hasClass('js-nav-trigger');

    if (!checkClass) {
      $(this).addClass('js-nav-trigger');
      $headerNav.addClass('js-nav-open').fadeIn(200);
    }

    else if (checkClass){
      $(this).removeClass('js-nav-trigger')
      $.when(
        $headerNav.fadeOut(200)
      ).done(function() {
        $headerNav.removeClass('js-nav-open')
      });
    }
  });

  $navlinks.on('click', function() {
    const checkClass = $trigger.hasClass('js-nav-trigger');

    if (checkClass) {
      $.when(
        $headerNav.fadeOut(200),
        $trigger.removeClass('js-nav-trigger')
      ).done(function() {
        $headerNav.removeClass('js-nav-open')
      });
    }
  });
}

function anchorLink() {
  $('a[href*="#"]').on('click', function ($target) {
    const speed = 700;
    const href = $(this).attr("href").split('#')[1];
    const headerY = $('.h').outerHeight();

    if (href == '') {
      const $target = $('body');
      const position = $target.offset().top - headerY;
      if(!position) return;
      if(position) {
        $("html, body").animate({
          scrollTop:position
        }, speed, "swing");
        return false;
      }
    }

    if (!href == '') {
      const $target = $('#'+href);
      const position = $target.offset().top - headerY;
      if(!position) return;
      if(position) {
        $("html, body").animate({
          scrollTop:position
        }, speed, "swing");
        return false;
      }
    }
  });
}

// ------------------------------------------------- sticky header
function stickyHeader(){
  let
  target = $(".js-sticky");

  if(target.hasClass('is-sticky')) {
    target.removeClass('is-sticky');
  }

  $(window).on('load', function() {
    let
    bp = 960,
    interval = 10;

    $(window).on('resize scroll', _.debounce(function() {
      let
      scroll = $(window).scrollTop(),
      w = window.innerWidth;// スクロールバーを含めた横幅

      targetH = target.outerHeight();

      // PCサイズ時
      if (w > bp) {
        const
        h = $('main').offset().top;

        // mainより大きかったら
        if(scroll > h) {
          target.addClass('is-sticky');
        }
        else if(scroll == 0) {
          target.removeClass('is-sticky');
        }
      }

      // スマホサイズ時
      else if(w < bp) {
        const h_sp = target.outerHeight();

        if(scroll > h_sp) {
          target.addClass('is-sticky');
        }
        else {
          target.removeClass('is-sticky');
        }
      }
    },interval));
  });
}

function IE11SmoothScrollOff() {
  if(navigator.userAgent.match(/MSIE 10/i) || navigator.userAgent.match(/Trident\/7\./) || navigator.userAgent.match(/Edge\/12\./)) {
    $('body').on("mousewheel", function () {
    event.preventDefault();
    var wd = event.wheelDelta;
    var csp = window.pageYOffset;
    window.scrollTo(0, csp - wd);
    });
  }
}