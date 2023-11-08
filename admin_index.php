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

  <!--  bootstrap -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" />


  <!-- datatables -->
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <link href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="./css/common.css" />
  <link rel="stylesheet" href="./css/admin.css" />
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
                <li class="links">CERTIFICATION</li>
                <li class="links">COMMENT</li>
                <li class="links"><a href='./admin_pw.php' class="links">Change&nbsp;PW</a></li>
                <li class="links"><a href='./crud/admin_logout.php' class="c-link">Logout</a></li>
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
          <div class="btn_wrap">
            <button type="button" class="btn btn-primary " id="regi_pf">등록하기</button></button>
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
              <!-- <tfoot>
                <tr>
                  <th>ID</th>
                  <th>이름</th>
                  <th>연락처</th>
                  <th>이메일</th>
                  <th>관계</th>
                  <th>내용</th>
                  <th>등록일자</th>
                </tr>
              </tfoot> -->
            </table>
          </div>
        </div>
      </div>

      <!-- Register Modal -->
      <div class="modal fade" id="regi_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="staticBackdropLabel">자격증 등록</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form id="regiFrm" method="post" enctype="multipart/form-data">
                <div class="form-group">
                  <label for="name" class="control-label">자격증 ::</label>
                  <input type="text" class="form-control c-square" id="name" name="name">
                </div>
                <div class="form-group">
                  <label for="issue" class="control-label">발행처 ::</label>
                  <input type="text" class="form-control c-square" id="issue" name="issue">
                </div>
                <div class="form-group">
                  <label for="date" class="control-label">취득일자 ::</label>
                  <input type="text" class="form-control c-square" id="date" name="date">
                </div>
                <div class="form-group">
                  <label for="pf_img" class="control-label">사진등록 ::</label>
                  <input type="file" id="pf_img" name="pf_img[]" multiple class="form-control c-square">
                </div>
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" id="btnRegi" class="btn c-btn-dark c-btn-square c-btn-bold c-btn-uppercase"
                style="margin-right:5px;">등록</button>
              <button type="button" class="btn c-btn-dark c-btn-border-2x c-btn-square c-btn-bold c-btn-uppercase"
                data-bs-dismiss="modal">취소</button>
            </div>
          </div>
        </div>
      </div>

      <!-- Comment Modal -->
      <div class="modal fade" id="modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="staticBackdropLabel">Comment 수정 및 삭제</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form>
                <input type="text" class="form-control c-square" id="id" name="id" style="display:none;">
                <div class="form-group">
                  <label for="name" class="control-label">성함 ::</label>
                  <input type="text" class="form-control c-square" id="name" name="name">
                </div>
                <div class="form-group">
                  <label for="phone" class="control-label">연락처 ::</label>
                  <input type="text" class="form-control c-square" id="phone" name="phone">
                </div>
                <div class="form-group">
                  <label for="email" class="control-label">이메일 ::</label>
                  <input type="text" class="form-control c-square" id="email" name="email">
                </div>
                <div class="form-group">
                  <label for="type" class="control-label">관계 ::</label>
                  <input type="text" class="form-control c-square" id="type" name="type">
                </div>
                <div class="form-group">
                  <label for="content" class="control-label">내용 ::</label>
                  <textarea class="form-control  c-square" id="content" name="content"></textarea>
                </div>
                <div class="form-group">
                  <label for="created" class="control-label">등록일자 ::</label>
                  <input type="text" class="form-control c-square" id="created" name="created" readonly>
                </div>
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" id="btnModi" class="btn c-btn-dark c-btn-square c-btn-bold c-btn-uppercase"
                style="margin-right:5px;">Modify</button>
              <button type="button" id="btnDel" data-target="#del_alert"
                class="btn c-btn-yellow-2 c-btn-square c-btn-bold c-btn-uppercase">Delete</button>
              <button type="button" class="btn c-btn-dark c-btn-border-2x c-btn-square c-btn-bold c-btn-uppercase"
                data-bs-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>

      <!-- Delete Alert Modal -->
      <div class="modal" tabindex="-1" id="del_alert">
        <div class=" modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Modal title</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <p>삭제하시겠습니까?</p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
              <button type="button" class="btn btn-primary " id="del_act">Delete</button>
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
  <!-- bootstrap -->
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js">
  </script>
  <!-- datatables-->
  <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>

  <script src="/js/common.js"></script>
  <script src="/js/admin.js"></script>

</body>

</html>