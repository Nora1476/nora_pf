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

  <!-- datatables -->
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <link href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
</head>

<body>
  <div id="wrap admin">
    <header>
      <div class="inner">
        <div class="gnb_wrap">
          <div class="gnb_inner">
            <a href="#" class="gnb logo">
              <img src="./img/image/logo.png" alt="" />
            </a>

            <div class="gnb pc_ver">
              <ul class="main_menu">
                <li class="links">CERTIFICATION</li>
                <li class="links">COMMENT</li>
                <li class="links">LogOut</li>
              </ul>
            </div>

            <div class="gnb mo_ver">
              <span class="material-symbols-outlined mo_menu"> menu </span>
              <ul class="main_menu">
                <li class="top">
                  <div><span class="material-symbols-outlined btn_close"> close </span></div>
                </li>
                <li class="links">CERTIFICATION</li>
                <li class="links">COMMENT</li>
                <li class="links">LogOut</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </header>
    <main>
      <div class="sec admin0" id="admin0">
        <div class="sec_inner">
          <h1 class="admin_tit">관리자페이지</h1>
        </div>
      </div>
      <div class="sec admin1" id="admin1">
        <div class="sec_inner">
          <div class="tit_wrap">
            <h2>CERTIFICATION</h2>
          </div>
        </div>
      </div>
      <div class="sec admin2" id="admin2">
        <div class="sec_inner">
          <div class="tit_wrap">
            <h2>COMMENT</h2>
          </div>
          <div class="table_wrap">
            <table id="t_comment" class="display" style="width: 100%">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>이름</th>
                  <th>연락처</th>
                  <th>이메일</th>
                  <th>관계</th>
                  <th>내용</th>
                  <th>등록일자</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>ID</th>
                  <th>이름</th>
                  <th>연락처</th>
                  <th>이메일</th>
                  <th>관계</th>
                  <th>내용</th>
                  <th>등록일자</th>
                </tr>
              </tfoot>
            </table>
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

  <!-- datatables-->
  <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>

  <script src="/js/common.js"></script>
  <script src="/js/admin.js"></script>
  <script>
  $(document).ready(function() {
    //dataTable 게시판
    var table = $("#t_comment").DataTable({
      processing: true,
      serverSide: true,
      ajax: "./crud/comment_load.php",
      //hidden column id
      columnDefs: [{
        target: 0,
        visible: false,
      }, ],
      order: [
        [0, "desc"]
      ],

      search: {
        return: true,
      },
    });
  });
  </script>
</body>

</html>