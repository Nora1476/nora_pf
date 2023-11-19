<?php
	session_start();
	//print_r($_SESSION);

	//로그인 세션이 없을 경우 admin_amin.php로 이동하여 로그인 유도
	if(!isset($_SESSION['username'])) {
	   
	echo "<script>alert('로그인이 필요한 페이지 입니다.')</script>";
	echo "<script>location.replace('admin.php');</script>";
	
	}

?>

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
  <link rel="stylesheet" href="./css/admin.css" />
</head>

<body>
  <div id="wrap">
    <header>
      <div class="inner">
        <div class="gnb_wrap">
          <div class="gnb_inner">
            <a href="./admin_index.php" class="gnb logo">
              <img src="./img/image/logo.png" alt="logo" />
            </a>

            <div class="gnb pc_ver">
              <ul class="main_menu">
                <li class="links"><a href="./admin_index.php#admin1">CERTIFICATION</a></li>
                <li class="links"><a href="./admin_index.php#admin2">COMMENT</a></li>
                <li class="links"><a href='./admin_pw.php'>ChangePW</a></li>
                <li class="links"><a href='./crud/admin_logout.php'>Logout</a></li>
              </ul>
            </div>

            <div class="gnb mo_ver">
              <span class="material-symbols-outlined mo_menu"> menu </span>
              <ul class="main_menu">
                <li class="top">
                  <div><span class="material-symbols-outlined btn_close"> close </span></div>
                </li>
                <li class="links"><a href="./admin_index.php#admin1">CERTIFICATION</a></li>
                <li class="links"><a href="./admin_index.php#admin2">COMMENT</a></li>
                <li class="links"><a href='./admin_pw.php' class="links">Change&nbsp;PW</a></li>
                <li class="links"><a href='./crud/admin_logout.php' class="c-link">Logout</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </header>
    <main>
      <div class="admin_sec" id="admin">
        <div class="sec_inner">
          <div class="content">
            <div class="img_wrap">
              <h4>관리자페이지 비밀번호 변경</h4>
            </div>
            <form id="pwFrm" method="post" data-aos="fade-up">
              <div class="row">
                <div class="con">
                  <input type="password" id="current_pw" name="current_pw" onfocus="this.placeholder=''"
                    onblur="this.placeholder='기존비밀번호'" placeholder="기존비밀번호" />
                  <span class="material-symbols-outlined"> key_vertical </span>
                </div>
              </div>
              <div class="row">
                <div class="con">
                  <input type="password" name="new_pw" id="new_pw" onfocus="this.placeholder=''"
                    onblur="this.placeholder='****'" placeholder="****" />
                  <span class="material-symbols-outlined"> lock </span>
                </div>
              </div>
              <div class="row">
                <div class="con">
                  <input type="password" name="new_re_pw" id="new_re_pw" onfocus="this.placeholder=''"
                    onblur="this.placeholder='****'" placeholder="****" />
                  <span class="material-symbols-outlined"> lock </span>
                </div>
              </div>
              <div class="row">
                <input type="submit" class="con submit" value="비밀번호 변경하기" />
              </div>
            </form>
          </div>
        </div>
      </div>
    </main>
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
  <!-- bootstrap -->
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js">
  </script>

  <!-- datatables-->
  <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>

  <script src="/js/common.js"></script>
  <script src="/js/admin.js"></script>

</body>

</html>