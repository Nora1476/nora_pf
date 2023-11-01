$(function () {
  //메뉴이동
  $(".main_menu .links").click(function () {
    var menu1 = $("#admin1").offset();
    var menu2 = $("#admin2").offset();

    if ($(this).text() == "CERTIFICATION") {
      $("body,html").animate({ scrollTop: menu1.top - 80 }, 400);
    }
    if ($(this).text() == "COMMENT") {
      $("body,html").animate({ scrollTop: menu2.top - 80 }, 400);
    }
  });
});
