// アコーディオンメニューにactiveの付与と解除
$(function () {
  $(".openbtn").click(function () {
    $(this).toggleClass("active");
    if ($(this).hasClass("active")) {
      $(".header__nav").addClass("active");
    } else {
      $(".header__nav").removeClass("active");
    }
  });

  $(".header__nav").click(function () {
    $(".openbtn").removeClass("active");
    $(".header__nav").removeClass("active");
  });
});
