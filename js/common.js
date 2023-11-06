$(function () {
  //aos 스크롤 이벤트
  setTimeout(() => {
    AOS.init({
      offset: 120,
      // once: true,
    });
  }, 120);

  //pc버전 header 고정
  $(window).scroll(function () {
    var t_point = $(window).scrollTop();
    if (t_point > 10) {
      $("header .gnb_wrap, .gnb.pc_ver .main_menu .links").addClass("on");
    } else {
      $("header .gnb_wrap, .gnb.pc_ver .main_menu .links").removeClass("on");
    }
  });

  // toTop버튼
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

  // 모바일 메뉴 탭
  $(".mo_menu").click(function () {
    $("header .mo_ver .main_menu").addClass("on");
    $("body").css("overflow", "hidden");
  });
  $(".btn_close, .mo_ver .main_menu .links").click(function () {
    $("header .mo_ver .main_menu").removeClass("on");
    $("body").css("overflow", "auto");
  });

  //gallery 그룹필터링
  filterSelection("all");
  //클릭한 버튼에 avtive클래스 추가
  var btnContainer = $("#btnFilter");
  var $btns = btnContainer.find(".btn");
  $btns.click(function () {
    $(this).addClass("active").siblings().removeClass("active");
  });
});

function filterSelection(name) {
  var $col = $(".column");
  if (name == "all") {
    name = "";
    $col.removeClass("hide");
  }
  if ($col.hasClass(name) === true) {
    $col.each(function () {
      $col.addClass("hide");
      $("." + name).removeClass("hide");
    });
  }
}

//휴대폰 번호에서 대시 ('-') 빼는 함수
function NumReplace(val) {
  var num = 0;
  if (typeof val != "undefined" && val != null && val != "") {
    num = String(val.replace(/-/gi, ""));
  }
  return num;
}
//Serialize에서 특정값 변경하는 함수
function changeSerialize(values, k, v) {
  var found = false;

  for (i = 0; i < values.length && !found; i++) {
    if (values[i].name == k) {
      values[i].value = v;
      found = true;
    }
  }
  if (!found) {
    values.push({
      name: k,
      value: v,
    });
  }
  return values;
}
