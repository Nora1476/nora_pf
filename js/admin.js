$(function () {
  //dataTable 게시판
<<<<<<< Updated upstream
=======
  var table = $("#t_certifi").DataTable({
    processing: true,
    serverSide: true,
    ajax: "./crud/pf_load.php",
    //hidden column id
    columnDefs: [{ target: 0, visible: true }],
    order: [[0, "desc"]],
    search: {
      return: true,
    },
  });

  //dataTable 게시판
>>>>>>> Stashed changes
  var table = $("#t_comment").DataTable({
    processing: true,
    serverSide: true,
    ajax: "./crud/comment_load.php",
<<<<<<< Updated upstream
    //hidden column id
    // columnDefs: [{
    //   target: 0,
    //   visible: false,
    // }, ],
=======
>>>>>>> Stashed changes
    order: [[0, "desc"]],

    search: {
      return: true,
    },
  });

  //메뉴이동
  $(".main_menu .links").click(function () {
    var menu1 = $("#admin1").offset();
    var menu2 = $("#admin2").offset();

    if ($(this).text() == "CERTIFICATION") {
      $("body,html").animate({ scrollTop: menu1.top - 80 }, 400);
    }
    if ($(this).text() == "COMMENT") {
      $("body,html").animate({ scrollTop: menu2.top - 80 }, 400);
    }
  });

  //자격증 등록
  $("#regi_pf").click(function () {
    $("#regi_modal").modal("show").modal({
      backdrop: "static",
    });
  });
<<<<<<< Updated upstream
  $("#btnRegi").click(function () {
    //유효성 검사
    if ($("#name").val() == "") {
      alert("자격증 이름을 입력해 주세요.");
      $("#name").focus();
=======
  $("#regiFrm").submit(function () {
    var data = new FormData(this);

    //유효성 검사
    if ($("#title").val() == "") {
      alert("자격증 이름을 입력해 주세요.");
      $("#title").focus();
>>>>>>> Stashed changes
      return false;
    }
    if ($("#issue").val() == "") {
      alert("발행처를 입력해 주세요.");
      $("#issue").focus();
      return false;
    }
    if ($("#date").val() == "") {
      alert("취득일자를 입력해 주세요.");
      $("#date").focus();
      return false;
    }
    if ($("#pf_img").val() == "") {
      alert("이미지를 선택해 주세요.");
      $("#pf_img").focus();
      return false;
    }
<<<<<<< Updated upstream
=======

    $.ajax({
      url: "./crud/pf_insert.php",
      type: "POST",
      data: data,
      cache: false,
      contentType: false,
      processData: false,
      success: function (data) {
        alert("성공적으로 등록되었습니다.");
      },
    });
>>>>>>> Stashed changes
  });

  //모달창 오픈
  $("#t_comment tbody").on("click", "tr", function (e) {
    e.preventDefault();
    var data = table.row(this).data();
    console.log(data);

    $("#modal").modal("show").modal({
      backdrop: "static",
    });
    $("#id").val(data[0]);
    $("#name").val(data[1]);
    $("#phone").val(data[2]);
    $("#email").val(data[3]);
    $("#type").val(data[4]);
    $("#content").val(data[5]);
    $("#created").val(data[6]);

    //폰번호 자동대시('-') 삽입
    $("#phone").val(
      $("#phone")
        .val()
        .replace(/[^0-9]/g, "")
        .replace(/(^02|^0505|^1[0-9]{3}|^0[0-9]{2})([0-9]+)?([0-9]{4})$/, "$1-$2-$3")
        .replace("--", "-")
    );
  });

  // delete
  $("#btnDel").click(function () {
    $("#del_alert").modal("show").modal({
      backdrop: "static",
    });
  });
  $("#del_act").click(function () {
    var id = $("#id").val();
    $("#del_alert").modal("hide");

    $.ajax({
      url: "./crud/comment_del.php",
      type: "POST",
      data: {
        id: id,
      },
      success: function (data) {
        $("#modal").modal("hide");
        $("#t_comment").DataTable().ajax.reload();
        alert("삭제되었습니다.");
      },
    });
  });

  // modify
  $("#btnModi")
    .off("click")
    .on("click", function (e) {
      e.preventDefault();

      //유효성 검사
      if ($("#name").val() == "") {
        alert("이름을 입력해 주세요.");
        $("#name").focus();
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

      //기본으로 들어가있는 대시 뺴고 번호만 db에 저장
      var db_phone = NumReplace($("#phone").val());
      console.log(db_phone);

      var id = $("#id").val();
      var name = $("#name").val();
      var phone = db_phone;
      var email = $("#email").val();
      var type = $("#type").val();
      var content = $("#content").val();

      $.ajax({
        url: "./crud/comment_modi.php",
        type: "POST",
        data: {
          id: id,
          name: name,
          phone: phone,
          email: email,
          type: type,
          content: content,
        },
        success: function (data) {
          $("#modal").modal("hide");
          $("#t_comment").DataTable().ajax.reload();
          alert("수정되었습니다.");
        },
      });
    });

  //비밀번호변경
  $("#pwFrm").submit(function (e) {
    e.preventDefault();

    //유효성 검사
    if ($("#current_pw").val() == "") {
      alert("기존 비밀번호를 입력해 주세요.");
      $("#current_pw").focus();
      return false;
    }
    if ($("#new_pw").val() == "") {
      alert("새로운 비밀번호를 입력해 주세요.");
      $("#new_pw").focus();
      return false;
    }
    if ($("#new_re_pw").val() == "") {
      alert("새로운 비밀번호를 입력해 주세요.");
      $("#new_re_pw").focus();
      return false;
    }

    var log_data = $("#pwFrm").serialize();

    $.ajax({
      url: "./crud/admin_pw_ok.php",
      type: "POST",
      data: log_data,
      success: function (data) {
        if (data == "현재비번실패") {
          alert("기존 비밀번호가 일지하지 않습니다.");
          $("#current_pw").val() == "";
          $("#current_pw").focus();
        } else if (data == "새로운비번실패") {
          alert("새로운 비밀번호가 일지하지 않습니다.");
          $("#new_re_pw, #new_re_pw").val() == "";
          $("#new_pw").focus();
        } else {
          alert("비밀번호가 성공적으로 변경되었습니다. 다시 로그인 해주세요.");
          location.replace("./admin.php");
        }
      },
    });
  });
});
