$(function () {
  //pc버전 header 고정
  $(window).scroll(function () {
    var t_point = $(window).scrollTop();
    if (t_point > 20) {
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

  //갤러리(masonry 라이브러리 사용)
  var $container = $(".sec3 .gallery");
  $container.masonry({
    // options
    itemSelector: ".gallery_item",
    columnWidth: 200,
    gutter: 10,
  });

  // $.getJSON("파일경로", function(data){});
  // 이미지데이터 사용
  $.getJSON("./data/content.json", function (data) {
    var elements = [];
    $.each(data, function (i, item) {
      //1. json파일에 있는 이미지 정보를 반복문을 돌며 li태그로 셋팅
      var itemHTML = '<li class="gallery_item is_loading">' + '<a href="' + item.images.large + '">' + '<img src="' + item.images.thumb + '" alt="' + item.title + '">' + "</a>" + "</li>";

      elements.push($(itemHTML).get(0)); // 2. $붙여 jquery 객체형태 바꾸고, get(0)을 사용하여 html태그형식으로 바꾸어 배열에 집어넣음
    }); //each

    $container.append(elements); //3. 리스트 정보를 $container 뒤에 삽입.

    $container.imagesLoaded(function () {
      $container.find("li").removeClass("is_loading");
      $container.masonry("appended", elements);
    }); //4. 리스트이미지가 다 로드된 후에 masonry 라이브러리사용하여 화면구성
  }); //getJSON

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
});
