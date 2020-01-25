$(document).ready(function() {
  $("#hamburger_btn").click(function() {
    $("body").addClass("body--responsive");
    if ($(this).is(":checked")) {
      $(".hamburger span").css("background-color", "#fff");
      $(".menu--2").addClass("show_menu--2");
      $("body").addClass("body--responsive");
      $(".overlay").fadeIn(500);
      // $("::-webkit-scrollbar").css("-webkit-appearance","none");
      // $("body").css("overflow","hidden");
    } else {
      $(".hamburger label span").css("background-color", "#2b2a2a");
      $(".menu--2").removeClass("show_menu--2");
      $("body").removeClass("body--responsive");
      $(".overlay").fadeOut(200);
    }
  });

  $(".overlay").click(function() {
    //alert("hi");
    $("#hamburger_btn").prop("checked", "");
    $("body").removeClass("body--responsive");
    $(".hamburger label span").css("background-color", "#2b2a2a");
    $(".menu--2").removeClass("show_menu--2");
    $(this).fadeOut(200);
  });
});

//CSS PRELOADER
function showPreLoader() {
  $(".wrapper__loader").css("display", "none");
  $("body").css({ height: "auto", "overflow-y": "scroll" });
}
