<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, maximum-scale=1" />
  <meta name="format-detection" content="telephone=no" />
  <meta name="keyword" content="nora, pf, front-end, developer" />
  <meta name="description" content="nora_pf" />
  <meta name="author" content="nora" />
  <title>Nora's</title>

  <!-- google icon -->
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
  <!-- slisk slider -->
  <link rel="stylesheet" type="text/css" href="./js/slick/slick.css" />
  <link rel="stylesheet" type="text/css" href="./js/slick/slick-theme.css" />

  <!-- aos scroll -->
  <link rel="stylesheet" href="./css/aos.css" />

  <link rel="stylesheet" href="./css/common.css" />
  <link rel="stylesheet" href="./css/main.css" />
</head>

<body>
  <div id="wrap">
    <header>
      <div class="inner">
        <div class="gnb_wrap">
          <div class="gnb_inner">
            <a href="/" class="gnb logo">
              <img src="./img/image/logo.png" alt="" />
            </a>

            <div class="gnb pc_ver">
              <ul class="main_menu">
                <li class="links">ABOUT</li>
                <li class="links">CERTIFICATION</li>
                <li class="links">COMMENT</li>
                <li class="links">HERE</li>
              </ul>
            </div>

            <div class="gnb mo_ver">
              <span class="material-symbols-outlined mo_menu"> menu </span>
              <ul class="main_menu">
                <li class="top">
                  <div><span class="material-symbols-outlined btn_close"> close </span></div>
                </li>
                <li class="links">ABOUT</li>
                <li class="links">CERTIFICATION</li>
                <li class="links">COMMENT</li>
                <li class="links">HERE</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </header>

    <main>
      <div class="sec sec1" id="sec1">
        <div class="sec_inner">
          <div class="gallery">
            <div class="circle_wrap on">
              <div class="circle_con"></div>
            </div>
            <div class="slider_gallery">
              <div>
                <img src="./img/image/main1.jpg" alt="slide1" />
                <h2>main <span>content</span></h2>
                <button>더보기</button>
              </div>
              <div>
                <img src="./img/image/main2.jpg" alt="slide2" />
                <h2>main <span>content</span></h2>
                <button>더보기</button>
              </div>
              <div>
                <img src="./img/image/main3.jpg" alt="slide3" />
                <h2>main <span>content</span></h2>
                <button>더보기</button>
              </div>
              <div>
                <img src="./img/image/main1.jpg" alt="slide4" />
                <h2>main <span>content</span></h2>
                <button>더보기</button>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="sec sec2" id="about">
        <div class="sec_inner">
          <div class="tit_wrap">
            <h2>About</h2>
          </div>
          <div class="about" data-aos="fade-up">
            <div class="a1">
              <img src="./img/image/about.png" alt="about" />
            </div>
            <div class="a2">
              <p class="a_con1"> ‘봉만이 여전히 열심히 살고 있구나.’ </span>
              </p>
              <div class="line_right"></div>
              <p class="a_con2">
                봉만이는 빠르진 않지만 꾸준히 하는 성격에 붙여진 저의 별명입니다. <br>
                <span>저는 언제나 경험을 쌓고 건강하게 살기 위해
                  꾸준히 하는 일이 몇 가지 있습니다.</span>
                <span>여행, 어학 공부, 자격증 취득, 운동 등과 같이<br>
                  삶의 질적 향상을 위한 일을 지속적으로 병행하고 있으며, </span>
                <span>현재는 개발자라는 큰 목표를 갖고 IT관련 6개월 과정을 빠짐없이 출석하여 수료했습니다.</span>
                <span>php, jquery를 사용한 실무 경험이 있으며<br>
                  엘리하이 학습관련(클릭, 드래그, 선잇기 등) 디자인팀 협업 및 css, javascript 사용 화면구현 경험이 있습니다.</span>
              </p>
            </div>
          </div>
        </div>
      </div>

      <div class="sec sec3" id="certi">
        <div class="sec_inner">
          <div class="tit_wrap">
            <h2>CERTIFICATION</h2>
          </div>
          <ul class="gallery" id="gallery" data-aos="fade-right">
            <li class="gallery_sizer"></li>
            <!-- <li class="gallery_item"></li> -->
          </ul>

          <div class="btn_wrap">
            <button class="load_more" id="load_more">Load more</button>
            <button class="move_page" id="move_page" onclick="goGallery()">Go Gallery</button>
          </div>
          <div id="lightbox" class="hide">
            <span class="close">&times;</span>
            <img id="lightbox_img" src="" alt="Lightbox Image" />
          </div>
        </div>
      </div>

      <div class="sec sec4" id="comment">
        <div class="sec_inner">
          <div class="tit_wrap">
            <h2>COMMENT</h2>
          </div>
          <form id="commentFrm" method="post" data-aos="fade-up">
            <div class="row">
              <span class="con point">이름</span>
              <div class="con_con">
                <input class="con_focus" type="text" id="name" name="name" />
              </div>
            </div>
            <div class="row">
              <span class="con point">연락처</span>
              <div class="con_con">
                <input type="text" id="phone" name="phone" />
              </div>
            </div>
            <div class="row">
              <span class="con point">이메일</span>
              <div class="con_con">
                <input type="text" id="email" name="email" />
              </div>
            </div>
            <div class="row">
              <span class="con point">관계</span>
              <div class="con_con">
                <label class="radio_inline"> <input type="radio" name="type" id="type" value="친구" /> 친구 </label>
                <label class="radio_inline"> <input type="radio" name="type" id="type" value="동료" /> 회사동료 </label>
                <label class="radio_inline"> <input type="radio" name="type" id="type" value="친척" /> 가족/친척 </label>
                <label class="radio_inline"> <input type="radio" name="type" id="type" value="기타" /> 기타 </label>
              </div>
            </div>
            <div class="row contact">
              <span class="con point">내용</span>
              <div class="con_con">
                <textarea name="content" id="content" rows="6"></textarea>
              </div>
            </div>

            <div class="row">
              <input type="submit" class="btn btn_submit" value="Submit " />
              <!-- <input type="button" class="btn btn_cancel" value="Cancel " /> -->
            </div>
          </form>
        </div>
      </div>

      <div class="sec sec5" id="here">
        <div class="sec_inner">
          <div class="tit_wrap">
            <h2>HERE</h2>
          </div>

          <div class="review" data-aos="fade-left">
            <div class="r1">
              <p class="r_con1"> 개발분야 지원자 조봉희입니다.</p>
              <div class="line_left"></div>
              <p class="r_con2"> 취미가 아닌 직업의 전문성을 쌓으며 성장할 수 있는 직종에서 일하고 싶다 희망하였습니다.
                오랜 고민 끝에 도전하게 된 분야가 it 개발입니다. 6개월의 풀스텍 과정을 하루도 빠짐없이 출석하며 팀원들과 함께 프로젝트를 완성하였고 이제는 실전에서 부딪히고 깨지며 단단해질 차례라
                생각합니다. ‘큰 거 한방!’ 보다 ‘소소한 행복은 자주 느껴라’라는 말이 있습니다. 새로운 분야에 도전하는 사람에게도 적용되는 말이 아닐까 생각합니다. 완벽하게 모든 것을 잘하겠다는
                마음가짐보다 하루하루 작은 것부터 이뤄내며 성장하는 모습을 보여드리겠습니다.
            </div>
            <div class="r2">
              <div id="map"></div>
              <!-- <iframe src="https://www.youtube.com/embed/kVxTrhojpFI" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe> -->
            </div>
          </div>
        </div>
      </div>
    </main>

    <div id="toTop">
      <img src="./img/icon/i_arrow_top.png" alt="top" />
      TOP
    </div>

    <footer>
      <div class="inner">
        <div class="main_area">
          <h4>Nora</h4>
          <ul class="com_info">
            <li>이름 : 조봉희</li>
            <li>e-mail : nada70979@gmail.com</li>
            <li>연락처 : 010-7166-1476</li>
            <li>주소 : 부산광역시 부산진구 범일로 176</li>
            <li class="hr">
              <hr />
            </li>
            <li class="copyright">COPYRIGHTⓒ 2023</li>
          </ul>
        </div>
        <div class="social_area">
          <div class="s1">
            <a href=""><img src="./img/icon/i_youtube.png" alt="youtube" /></a>
          </div>
          <div class="s2">
            <a href=""><img src="./img/icon/i_instagram.png" alt="i_instagram" /></a>
          </div>
        </div>
      </div>
    </footer>
  </div>

  <!-- jquery -->
  <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
  <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>

  <!-- gallery mansonry -->
  <script src="./js/vendor/modernizr.custom.min.js"></script>
  <script src="./js/vendor/jquery-1.10.2.min.js"></script>
  <script src="./js/vendor/masonry.pkgd.min.js"></script>
  <script src="./js/vendor/imagesloaded.pkgd.min.js"></script>

  <!-- slick slide -->
  <script type="text/javascript" src="./js/slick/slick.min.js"></script>

  <!-- aos scroll -->
  <script type="text/javascript" src="./js/aos/aos.js"></script>

  <script src="/js/common.js"></script>
  <script src="/js/main.js"></script>
  <script type="text/javascript" src="//dapi.kakao.com/v2/maps/sdk.js?appkey=f2613f6bb643b7ca3a612fa8a63fb480"></script>

  <script>
  //카카오 맵
  var mapContainer = document.getElementById("map"),
    mapOption = {
      center: new kakao.maps.LatLng(35.1458264, 129.0596997),
      level: 2, //확대 레벨
    };

  var markerPosition = new kakao.maps.LatLng(35.1458264, 129.0596997); // 마커가 표시될 위치
  var marker = new kakao.maps.Marker({
    position: markerPosition,
  }); // 마커를 생성
  var map = new kakao.maps.Map(mapContainer, mapOption);
  marker.setMap(map);
  </script>
</body>

</html>