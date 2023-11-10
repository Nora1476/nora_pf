$(function () {
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

  //자격증 게시판
  var t_certifi = $("#t_certifi").DataTable({
    processing: true,
    serverSide: true,
    scrollX: true,
    ajax: "./crud/pf_load.php",
    //hidden column id
    columnDefs: [
      { target: 0, visible: true },
      { className: "dt_center", targets: "_all" },
    ],
    order: [[0, "desc"]],
    search: {
      return: true,
    },
  });

  //코멘트 게시판
  var t_comment = $("#t_comment").DataTable({
    processing: true,
    serverSide: true,
    scrollX: true,
    ajax: "./crud/comment_load.php",
    columnDefs: [
      { target: 0, visible: true },
      { className: "dt_center", targets: "_all" },
    ],
    order: [[0, "desc"]],
    search: {
      return: true,
    },
  });

  //자격증_등록
  $("#regi_pf").click(function () {
    $("#regi_modal").modal("show").modal({
      backdrop: "static",
    });

    //이미지 미리보기
    $("#regi_modal").on("change", "#pf_img", function (e) {
      // $("#pf_img").change(function(e){
      //div 내용 비워주기
      $("#Preview").empty();

      var files = e.target.files;
      var arr = Array.prototype.slice.call(files);

      preview(arr);

      function preview(arr) {
        arr.forEach(function (f) {
          //div에 이미지 추가
          var str = '<li class="ui-state-default">';
          //str += '<span>'+fileName+'</span><br>';

          //이미지 파일 미리보기
          if (f.type.match("image.*")) {
            //파일을 읽기 위한 FileReader객체 생성
            var reader = new FileReader();
            reader.onload = function (e) {
              //파일 읽어들이기를 성공했을때 호출되는 이벤트 핸들러
              str += '<img src="' + e.target.result + '" title="' + f.name + '" id="' + f.lastModified + '"  width=80 height=80>';
              str += '<span class="delBtn" data-index="' + f.lastModified + '"> x </span>';
              str += "</li>";
              $(str).appendTo("#regi_modal #Preview");
            };
            reader.readAsDataURL(f);
          }
        });
      }
    });
  });
  $("#regiFrm").submit(function () {
    var data = new FormData(this);

    //유효성 검사
    if ($("#title").val() == "") {
      alert("자격증 이름을 입력해 주세요.");
      $("#title").focus();
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

    $.ajax({
      url: "./crud/pf_insert.php",
      type: "POST",
      data: data,
      cache: false,
      contentType: false,
      processData: false,
      success: function (data) {
        // alert("성공적으로 등록되었습니다.");
        alert(data);
      },
    });
  });

  //자격증_모달창보이기
  $("#t_certifi tbody").on("click", "tr", function (e) {
    e.preventDefault();

    var data = t_certifi.row(this).data();
    var id = data[0];

    $("#certifi_modal").modal("show").modal({
      backdrop: "static",
    });
    $("#id_modi").val(data[0]);
    $("#title_modi").val(data[1]);
    $("#issue_modi").val(data[2]);
    $("#date_modi").val(data[3]);
    $("#regi_date_modi").val(data[5]);

    $("#images").load("../crud/pf_imgload.php", { mno: id });

    //이미지 미리보기
    $("#certifi_modal").on("change", "#pf_img", function (e) {
      //div 내용 비워주기
      $("#certifi_modal #Preview").empty();

      var files = e.target.files;
      var arr = Array.prototype.slice.call(files);

      console.log(arr);

      preview(arr);

      function preview(arr) {
        arr.forEach(function (f) {
          //div에 이미지 추가
          var str = '<li class="ui-state-default">';
          //str += '<span>'+fileName+'</span><br>';

          //이미지 파일 미리보기
          if (f.type.match("image.*")) {
            //파일을 읽기 위한 FileReader객체 생성
            var reader = new FileReader();
            reader.onload = function (e) {
              //파일 읽어들이기를 성공했을때 호출되는 이벤트 핸들러
              str += '<img src="' + e.target.result + '" title="' + f.name + '" id="' + f.lastModified + '"  width=80 height=80>';
              str += '<span class="delBtn" data-index="' + f.lastModified + '"> x </span>';
              str += "</li>";
              $(str).appendTo("#certifi_modal #Preview");
            };
            reader.readAsDataURL(f);
          }
        });
      }
    });
  });

  //자격증_삭제
  $("#btnDel_certifi").click(function () {
    $("#del_certifi_alert").modal("show").modal({
      backdrop: "static",
    });
  });
  $("#del_act_certifi").click(function () {
    var id = $("#id_modi").val();
    $("#del_certifi_alert").modal("hide");

    $.ajax({
      url: "./crud/pf_del.php",
      type: "POST",
      data: {
        id: id,
      },
      success: function (data) {
        $("#certifi_modal").modal("hide");
        $("#t_certifi").DataTable().ajax.reload();
        alert("자격증이 성공적으로 삭제되었습니다.");
      },
    });
  });

  // 자격증_수정
  $("#btnModi_certifi")
    .off("click")
    .on("click", function (e) {
      e.preventDefault();

      var file = new FormData($("#modiFrm")[0]);

      //유효성 검사
      if ($("#title_modi").val() == "") {
        alert("자격증 이름을 입력해 주세요.");
        $("#title_modi").focus();
        return false;
      }
      if ($("#issue_modi").val() == "") {
        alert("발행처를 입력해 주세요.");
        $("#issue_modi").focus();
        return false;
      }
      if ($("#date_modi").val() == "") {
        alert("취득일자를 입력해 주세요.");
        $("#date_modi").focus();
        return false;
      }

      $.ajax({
        url: "./crud/pf_modi.php",
        type: "POST",
        data: file,
        cache: false,
        contentType: false,
        processData: false,
        success: function (data) {
          $("#certifi_modal").modal("hide");
          $("#t_certifi").DataTable().ajax.reload();
          alert("수정 완료되었습니다.");
        },
      });
    });

  //코멘트_모달창
  $("#t_comment tbody").on("click", "tr", function (e) {
    e.preventDefault();
    var data = t_comment.row(this).data();
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

  //코멘트_삭제
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

  // 코멘트_수정
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

  //미리보기 이미지 삭제
  $(document).on("click", ".delBtn", function () {
    //삭제할 이미지타이틀 가져와서 선택된 input배열 동기화
    var removeTargetId = $(this).data("index");
    var removeTarget = $("#" + removeTargetId);
    var files = $(this).closest("div").children("input")[0].files;
    //var files = $(this).closest('div').children().first().find('input')[0].files;
    //console.log(files.attr('id'));

    var dataTranster = new DataTransfer();
    Array.from(files)
      .filter((file) => file.lastModified != removeTargetId)
      .forEach((file) => {
        dataTranster.items.add(file);
      });

    $(this).closest("div").children("input")[0].files = dataTranster.files;
    removeTarget.parent("li").remove();
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
