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
    <main>
      <div class="admin_sec" id="admin">
        <div class="sec_inner">
          <div class="content">
            <div class="img_wrap">
              <h4>관리자페이지 로그인</h4>
            </div>
            <form id="loginFrm" method="post" data-aos="fade-up" action="./crud/admin_login.php">
              <div class="row">
                <div class="con">
                  <input type="text" id="admin" name="admin" onfocus="this.placeholder=''"
                    onblur="this.placeholder='아이디'" placeholder="아이디" />
                  <span class="material-symbols-outlined"> person </span>
                </div>
              </div>
              <div class="row">
                <div class="con">
                  <input type="password" name="password" id="password" onfocus="this.placeholder=''"
                    onblur="this.placeholder='****'" placeholder="****" />
                  <span class="material-symbols-outlined"> lock </span>
                </div>
              </div>
              <div class="row">
                <input type="submit" class="con submit" value="Log In" />
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

  <!-- fivids vedioRatio -->
  <script type="text/javascript" src="./js/vendor/jquery.fitvids.js"></script>

  <script src="/js/common.js"></script>
  <script src="/js/main.js"></script>

</body>

</html>