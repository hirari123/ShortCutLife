$(function() {

  var $btn = $('.nav-button');
  var $menu = $('.menu-area');

  // クリック時のアニメーションとモーダルメニュー表示
  $btn.on('click', function() {
    if ($(this).hasClass('active')){
      $(this).removeClass('active');
      $menu.slideUp();
    } else {
      $(this).addClass('active');
      $menu.slideDown();
    }
    return false;
  });

});