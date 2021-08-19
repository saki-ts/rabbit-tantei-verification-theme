
  $(function(){

    $(function(){
    $(".accordionbox dt").on("click", function() {
     $(this).next().slideToggle();
     // activeが存在する場合
     if ($(this).children(".accordion_icon").hasClass('active')) {
    	 // activeを削除
    	 $(this).children(".accordion_icon").removeClass('active');
     }
     else {
    	 // activeを追加
    	 $(this).children(".accordion_icon").addClass('active');
     }
    });
    });


    $('div.menu ul li')
    .click(function(){

      $('div.menu ul li')
      .removeClass('selected');

      $('ul.table li')
      .removeClass('selected');

      var index = $('div.menu ul li').index(this);
      $('div.menu ul li')
      .eq(index)
      .addClass('selected');

      $('ul.table li').eq(index).addClass('selected');

    });

    $('form#contact_input')
    .submit(function(){
      var err = new Array();
      if( $('#name').val() == '' ){
        err[err.length] = 'お名前をご記入ください。';
      }

      if( $('input[name="gender_id"]:checked').size() < 1 ){
        err[err.length] = '性別をお選びください。';
      }
      if( $('#age').val() == '' ){
        err[err.length] = '年齢をご記入ください。';
      }
      if( $('#pref_id').val() == '' ){
        err[err.length] = '都道府県をお選びください。';
      }
      if( $('#address').val() == '' ){
        err[err.length] = 'ご住所をご記入ください。';
      }
      if( $('#email').val() == '' )
      {
        err[err.length] = 'メールアドレスをご記入ください。';
      }else if( !chMail( $('#email').val() ) )
      {
        err[err.length] = '正しいをメールアドレスをご記入ください。';
      }
      if( $('input[name="jobtype_id"]:checked').size() < 1 ){
        err[err.length] = '希望職種をお選びください。';
      }
      if( $('#motive').val() == '' ){
        err[err.length] = '志望動機をご記入ください。';
      }
      if( err.length > 0 )
      {
        alert( err.join("\n") );
        return false;
      }
    });
  })

  function chMail(mf)
  {
    ml = /.+@.+\..+/;
    if(!mf.match(ml)) {
      return false;
    }
    return true;
  }

// recruitページ アンカーリンク
$(window).on('load', function() {
  if($('.button2 a').length) {
    var target = $('.button2 a');
    target.on('click', function() {
      var speed = 1000;
      var href= $(this).attr("href");
      var target = $(href == "#" || href == "" ? 'html' : href);
      var position = target.offset().top;
      $("html, body").animate({scrollTop:position}, speed, "swing");
      return false;
    });
  }
});