<?php  

  /* 서버 접속 */
  require_once("./crud/dbconfig.php");
 
  $sql= "SELECT * from pf_list as A 
          left join (select  mno, min(file) file from pf_img group by mno) as B 
          on A.no = B.mno  order by no desc ";        

  $result = mysqli_query($conn, $sql);
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
  <link rel="stylesheet" href="./css/gallery.css" />
</head>

<body>
  <div id="wrap">
    <header>
      <div class="inner">
        <div class="gnb_wrap">
          <div class="gnb_inner">
            <a href="/index.html" class="gnb logo">
              <img src="./img/image/logo.png" alt="" />
            </a>

            <div class="gnb pc_ver">
              <ul class="main_menu">
                <li class="links"><a href="./index.php#about">ABOUT</a></li>
                <li class="links"><a href="./index.php#certi">CERTIFICATION</a></li>
                <li class="links"><a href="./index.php#comment">COMMENT</a></li>
                <li class="links"><a href="./index.php#here">HERE</a></li>
              </ul>
            </div>

            <div class="gnb mo_ver">
              <span class="material-symbols-outlined mo_menu"> menu </span>
              <ul class="main_menu">
                <li class="top">
                  <div><span class="material-symbols-outlined btn_close"> close </span></div>
                </li>
                <li class="links"><a href="./index.php#about">ABOUT</a></li>
                <li class="links"><a href="./index.php#certi">CERTIFICATION</a></li>
                <li class="links"><a href="./index.php#comment">COMMENT</a></li>
                <li class="links"><a href="./index.php#here">HERE</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </header>

    <main>
      <div class="inner">
        <div class="sec gal1" id="gal1">
          <div class="sec_inner">
            <div class="map">
              <h4>Certificate Portfolio</h4>
            </div>
          </div>
        </div>

        <div class="sec gal2" id="gal2">
          <div class="sec_inner">
            <div id="btnFilter">
              <button class="btn active" onclick="filterSelection('all')">All</button>
              <button class="btn" onclick="filterSelection('development')">Development</button>
              <button class="btn" onclick="filterSelection('language')">Language</button>
              <button class="btn" onclick="filterSelection('others')">Others</button>
            </div>

            <!-- Portfolio Gallery Grid -->
            <ul class="img_row">

            <?php
              while($row = mysqli_fetch_array($result)){   
                
                echo "<li class='column " .$row['kind']. "'>";
                echo "    <div class='img_main'>";
                echo "      <img src='" .$row['file']. "' alt='" .$row['title']. "' >";
                echo "    </div>";
                echo "    <div class='tit_main'>";
                echo "      <h4 class='pf_num' style='display:none'>" .$row['no']. "</h4>";
                echo "      <h4 class='pf_tit'>" .$row['title']. "</h4>";
                echo "      <p  class='pf_issue'>"  .$row['issue']. "</p>";
                echo "    </div>";
                echo "</li>";
                
              }      
          
            ?>   

            </ul>
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
  <script src="/js/gallery.js"></script>
 
</body>

</html>