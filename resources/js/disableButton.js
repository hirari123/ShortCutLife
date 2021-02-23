$(function() {

  // 送信ボタンを1度クリックすると無効化する(二重送信防止)
  $('form').submit(function() {
    $("button[type='submit]").prop("disabled", true);
  });
  
});