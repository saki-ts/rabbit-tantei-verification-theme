var topEvents = new topEvent();

function topEvent() {
  firstView();
  topFadeIn();
}

function firstView() {
  const
  target = $('.js-firstview'),
  targetH = target.outerHeight() + 160,
  interval = 10;

  $(window).on('load scroll', _.debounce(function() {
    const scroll = $(window).scrollTop();
    if(scroll == 0) {
      target.addClass('is-active');
    }
    else if(scroll < targetH) {
      target.addClass('is-active');
    }
    else if(scroll > targetH) {
      target.removeClass('is-active');
    }
  },interval));
}

// --------------------------------------- fade in event
function topFadeIn() {
  const APP = (window.APP = window.APP || {});

  APP.SetFadeEffect = function($elm) {
      const that = this;
      that.$elm = $elm;
      that.offset = 0.8;
      that.ACTIVE = 'is-active';

      that.fade();
      $(window).on('scroll resize', function() {
          that.fade();
      });
  };

  APP.SetFadeEffect.prototype = {
      fade: function() {
          const that = this;
          const st = $(window).scrollTop();
          const wh = $(window).height();
          const targetPoint = that.$elm.offset().top - parseInt(that.$elm.css('transform').match(/[0-9]+/g)[5]);
          const startPoint = Math.floor(targetPoint - wh * that.offset);
          const endPoint = Math.floor(targetPoint + wh * (1 - that.offset));

          if (
              st >= startPoint &&
              st <= endPoint &&
              !that.$elm.hasClass(that.ACTIVE)
          ) {
              setTimeout(function() {
                  that.$elm.addClass(that.ACTIVE);
              }, 100);
          }
      }
  };

  $(function() {
      $('.js-fadein').each(function() {
          new APP.SetFadeEffect($(this));
      });
  });
}