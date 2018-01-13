$(window).on('load', function(){
  $('body').removeClass('fadeout');
   $('.facilityBox').removeClass('fadeout');
});

$(function() {
  // ハッシュリンク(#)と別ウィンドウでページを開く場合はスルー
  $('a:not([href^="#"]):not([target]):not([href^="javascript:void(0)"])').on('click', function(e){
    e.preventDefault(); // ナビゲートをキャンセル
    url = $(this).attr('href'); // 遷移先のURLを取得
    if (url !== '') {
      $('body').addClass('fadeout');  // bodyに class="fadeout"を挿入
      $('.facilityBox').addClass('fadeout');
      setTimeout(function(){
        window.location = url;  // 0.4秒後に取得したURLに遷移
      }, 400);
    }
    return false;
  });
});