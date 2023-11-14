$(function () {
  //갤러리 이미지 상세보기 페이지 이동
  $(document).on("click", "li.column", function () {
    var $num = $(this).find(".pf_num").html(),
      $target = "./gallery_detail.php?no=" + $num;

    location.href = $target;
  });
});
