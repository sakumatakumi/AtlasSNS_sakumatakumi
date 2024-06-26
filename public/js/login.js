// アコーディオンメニューにactiveの付与と解除
$(function () {
  $(".btn--open").click(function () {
    $(this).toggleClass("active");
    if ($(this).hasClass("active")) {
      $(".header__nav").addClass("active");
    } else {
      $(".header__nav").removeClass("active");
    }
  });

  $(".header__nav").click(function () {
    $(".btn--open").removeClass("active");
    $(".header__nav").removeClass("active");
  });
});


// 編集用ボタンとモーダル
$(function () {
  // 編集ボタン(class="js-modal-open")が押されたら発火
  $('.js-modal-open').on('click', function () {
    // モーダルの中身(class="js-modal")の表示
    $('.js-modal').fadeIn();
    // 押されたボタンから投稿内容を取得し変数へ格納
    var post = $(this).attr('post');
    // 押されたボタンから投稿のidを取得し変数へ格納（どの投稿を編集するか特定するのに必要な為）
    var post_id = $(this).attr('post_id');

    // 取得した投稿内容をモーダルの中身へ渡す
    $('.modal_post').text(post);
    // 取得した投稿のidをモーダルの中身へ渡す
    $('.modal_id').val(post_id);
    return false;
  });

  // 背景部分や閉じるボタン(js-modal-close)が押されたら発火
  $('.js-modal-close').on('click', function () {
    // モーダルの中身(class="js-modal")を非表示
    $('.js-modal').fadeOut();
    return false;
  });
});


// 要確認
// 投稿部分の自動可変
 $(document).ready(function() {
            const ta = document.getElementById('posts__text');
            const ch = ta.clientHeight;
            ta.addEventListener('input', function() {
                ta.style.height = 'auto'; // 一旦高さをリセット
                const sh = ta.scrollHeight;
                ta.style.height = sh + 'px'; // scrollHeightに基づいて高さを設定
            });
        });
