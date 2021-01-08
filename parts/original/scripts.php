<?php
  $themePath = get_template_directory_uri().'/common/';
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="<?php echo $themePath; ?>js/common.bundle.js"></script>
<script src="<?php echo $themePath; ?>js/top.bundle.js"></script>
<script src="<?php echo $themePath; ?>js/gsap.min.js"></script>
<script src="<?php echo $themePath; ?>js/loading.js"></script>
<?php if(is_page('contact')) : ?>
<script>
  $(function(){
    var $selectbox = $('#js-selectbox');
    if(!$selectbox.length){return;}
    $selectbox.find('option').each(function(){
      var $this = $(this);
      if($this.val() === ''){
        $this.text('選択してください');
      }
    });

    var $formBackInput = $('.form__back-input');
    var $formBackBtn = $('.form__back-btn');
    var $formList = $('.form__list');
    var $selectWrap = $('.select-wrap');

    function confirmFn(){
      $('.form__item .form__desc').each(function(){
        var $this = $(this);
        var $inputHidden = $this.find('input[type="hidden"]');
        var val = $this.find('input[type="hidden"]').val();
        if(!$inputHidden.length){
          val = $this.find('textarea').val();
        }
        $this.find('.js-confirm').text(val).show();
      });
    }

    function checkBackBtn(){
      if($formBackInput.hasClass('wpcf7c-force-hide')){
        $formBackBtn.hide();
        $formList.removeClass('form__list--confirm');
        $selectWrap.removeClass('confirmed');
      }else{
        $formBackBtn.show();
        $formList.addClass('form__list--confirm');
        $selectWrap.addClass('confirmed');
        confirmFn();
      }
    }

    checkBackBtn();
    document.addEventListener( 'wpcf7submit', function() {
      setTimeout(function(){
        checkBackBtn();
      }, 500);
    });

    document.addEventListener( 'wpcf7mailsent', function() {
      window.scrollTo(0, 0);
      $('.js-contact-main').hide();
      $('.js-contact-complete').fadeIn();
    }, false );

    $('.wpcf7c-btn-back').on("click", function(){
      $formBackBtn.hide();
      $('.js-confirm').hide();
    });
  });
</script>
<?php endif; ?>