$(function () {
  //pc버전 header 고정
  $(window).scroll(function () {
    var t_point = $(window).scrollTop();
    if (t_point > 200) {
      $("header .gnb_wrap, .gnb.pc_ver .main_menu .links").addClass("on");
    } else {
      $("header .gnb_wrap, .gnb.pc_ver .main_menu .links").removeClass("on");
    }
  });

  //gallery slide
  $(".slider_gallery").slick({
    dots: true,
    infinite: true,
    speed: 300,
    slidesToShow: 1,
    adaptiveHeight: true,
    prevArrow: "<button type='button' class='slick_next'></button>", // 이전 화살표 모양 설정"<button type='button' class='slick-prev'>Previous</button>"
    nextArrow: "<button type='button' class='slick_prev'></button>", // 다음 화살표 모양 설정"<button type='button' class='slick-next'>Next</button>"
  });

  // toTop버튼
  // $("#toTop").hide();
  $(window).scroll(function () {
    if ($(this).scrollTop() > 100) {
      $("#toTop").fadeIn();
    } else {
      $("#toTop").fadeOut();
    }
  });
  $("#toTop").click(function () {
    $("body,html").animate({ scrollTop: 0 }, 800);
  });
});
