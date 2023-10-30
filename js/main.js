$(function () {
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
    console.log(db_data);

    $.ajax({
      url: "crud/comment_insert.php",
      type: "POST",
      data: db_data,
      success: function (data) {
        alert("성공적으로 등록되었습니다.");
        $("form").each(function () {
          //form 리셋
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
