$(function () {
  //aos 스크롤 라이브러리
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
  var $container = $(".sec3 .gallery"),
    $loadMoreBtn = $(".load_more"),
    $addItemCount = 10,
    $added = 0, //더보기 버튼을 클릭해서 추가된 항목수(리스트 항목을 모두 로드했을때 , 더보기 버튼을 사라지게하기 위함)
    $allData = [];
  $container.masonry({
    // options
    itemSelector: ".gallery_item",
    percentPosition: true,
    columnWidth: ".gallery_sizer",
    gutter: 10,
  });
  // $.getJSON("파일경로", function(data){});
  // 이미지데이터 사용
  $.getJSON("./data/content.json", initGallery);
  function initGallery(data) {
    //매개변수를 하나만 쓰면 data를 몽땅 가져온다는 뜻
    //매개변수를 두개쓰면 첫번쨰 i 인덱스, 두번째 data 내용
    $allData = data; //전체 데이터를 가져옴
    //console.log(data);

    /* 클릭했을떄 8개씩 로드
    $loadMoreBtn.click(function(){
      $addItem()
    })
    */
    addItem(); // 열자마자 아이템 추가
    $loadMoreBtn.click(addItem); //버튼 클릭시 아이템 추가
  } //initGallery
  function addItem() {
    var elements = [];
    var slidedData;
    //A.slice(0,8)  A배열 0번째부터 번쨰 전까지의 값을 가져옴
    slidedData = $allData.slice($added, $added + $addItemCount);

    /* 
     $('li').each(function(){ });   jquery object
     $.each('배열', function(i, item){ });   json, 배열의 값마다 할 일
    */
    $.each(slidedData, function (i, item) {
      var itemHTML = '<li class="gallery_item is_loading">' + "<figure>" + '<img src="' + item.images.thumb + '" alt="' + item.title + '">' + "</figure>" + "</li>";

      elements.push($(itemHTML).get(0)); //슬라이스로 잘라서 가져온 데이터를 사용하여 변수 itemHTML을 반복문을 통해 elements 배열에 넣음
    }); //each

    $container.append(elements);

    //$added값을 업데이트
    $added += slidedData.length;

    if ($added < $allData.length) {
      $loadMoreBtn.show();
    } else {
      $loadMoreBtn.hide();
    }

    $container.imagesLoaded(function () {
      $container.find("li").removeClass("is_loading");
      $container.masonry("appended", elements);
    });
  }

  //갤러리 이미지 light box
  $(".galler .gallery_item").click(function () {
    console.log("클릭");
    // const imageSrc = $(this).attr("data");
    // $("#lightbox-img").attr("src", imageSrc);
    // $("#lightbox").removeClass("hide");
  });

  $("#lightbox .close").click(function () {
    $("#lightbox").addClass("hide");
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
});
