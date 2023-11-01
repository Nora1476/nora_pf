$(function () {
  //메뉴이동
  $(".main_menu .links").click(function () {
    var menu1 = $(".sec2").offset();
    var menu2 = $(".sec3").offset();
    var menu3 = $(".sec4").offset();
    var menu4 = $(".sec5").offset();

    if ($(this).text() == "ABOUT") {
      $("body,html").animate({ scrollTop: menu1.top - 80 }, 400);
    }
    if ($(this).text() == "CERTIFICATION") {
      $("body,html").animate({ scrollTop: menu2.top - 80 }, 400);
    }
    if ($(this).text() == "COMMENT") {
      $("body,html").animate({ scrollTop: menu3.top - 80 }, 400);
    }
    if ($(this).text() == "HERE") {
      $("body,html").animate({ scrollTop: menu4.top - 80 }, 400);
    }
  });

  //main slide
  $(".slider_gallery").slick({
    dots: true,
    infinite: true,
    speed: 300,
    slidesToShow: 1,
    adaptiveHeight: true,
    // variableWidth: true,
    centerMode: true,
    autoplay: true,
    autoplaySpeed: 5000,
    centerPadding: "0px",
    prevArrow: "<button type='button' class='slick_next'></button>", // 이전 화살표 모양 설정"<button type='button' class='slick-prev'>Previous</button>"
    nextArrow: "<button type='button' class='slick_prev'></button>", // 다음 화살표 모양 설정"<button type='button' class='slick-next'>Next</button>"
  });
  setTimeout(function () {
    $(".circle_wrap").removeClass("on");
  }, 4500);
  $(".slider_gallery").on("afterChange", function () {
    $(".circle_wrap").toggleClass("on");
    setTimeout(function () {
      $(".circle_wrap").toggleClass("on");
    }, 4800);
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
  $.getJSON("./data/content.json", initGallery);
  function initGallery(data) {
    //매개변수를 하나만 쓰면 data를 몽땅 가져온다는 뜻
    //매개변수를 두개쓰면 첫번쨰 i 인덱스, 두번째 data 내용
    $allData = data; //전체 데이터를 가져옴

    addItem(); // 열자마자 아이템 추가
    $loadMoreBtn.click(addItem); //버튼 클릭시 아이템 추가
  } //initGallery
  function addItem() {
    var elements = [];
    var slidedData;
    //A.slice(0,8)  A배열 0번째부터 번쨰 전까지의 값을 가져옴
    slidedData = $allData.slice($added, $added + $addItemCount);

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
  $(document).on("click", ".gallery_item img", function () {
    const imageSrc = $(this).attr("src");
    console.log(imageSrc);
    $("#lightbox_img").attr("src", imageSrc);
    $("#lightbox").removeClass("hide");
    $("body").css("overflow", "hidden");
  });
  $("#lightbox .close").click(function () {
    $("#lightbox").addClass("hide");
    $("body").css("overflow", "auto");
  });

  $("#commentFrm").submit(function (e) {
    //유효성 검사
    if ($("#name").val() == "") {
      alert("이름을 입력해 주세요.");
      $("#name").focus();
      async;
      return false;
    }
    if ($("#phone").val() == "") {
      alert("연락처를 입력해 주세요.");
      $("#phone").focus();
      return false;
    }
    var regExp = /\w+([-+.]\w+)*@\w+([-.]\w+)*\.[a-zA-Z]{2,4}$/;
    if (!regExp.test($("#email").val())) {
      alert("이메일 형식이 아닙니다.");
      $("#email").focus();
      return false;
    }
    if ($(':radio[name="type"]:checked').length < 1) {
      alert("관계을 선택해주세요.");
      return false;
    }
    if ($("#content").val() == "") {
      alert("메세지을 입력해 주세요.");
      $("#content").focus();
      return false;
    }

    var db_phone = NumReplace($("#phone").val());
    var formData = $("#commentFrm").serializeArray();
    var db_data = changeSerialize(formData, "phone", db_phone);

    $.ajax({
      url: "./crud/comment_insert.php",
      type: "POST",
      data: db_data,
      success: function (data) {
        alert("성공적으로 등록되었습니다.");
        $("form").each(function () {
          this.reset();
        });
      },
    });
  });

  //휴대폰 번호 자동 대시('-') 기능
  $(document).on("keyup", "#phone", function () {
    $(this).val(
      $(this)
        .val()
        .replace(/[^0-9]/g, "")
        .replace(/(^02|^0505|^1[0-9]{3}|^0[0-9]{2})([0-9]+)?([0-9]{4})$/, "$1-$2-$3")
        .replace("--", "-")
    );
  });
});

//갤러리로 이동
function goGallery() {
  var targetURL = "/gallary.html";
  window.location.href = targetURL;
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
