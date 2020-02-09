$(document).ready(function() {
  $("#hamburger_btn").click(function() {
    $("body").addClass("body--responsive");
    if ($(this).is(":checked")) {
      $(".hamburger span").css("background-color", "#fff");
      $(".menu2--wrapper").css("display", "block");
      $(".menu2--wrapper").css("visibility", "visible");
      $(".menu--2").addClass("show_menu--2");
      $("body").addClass("body--responsive");
      $(".overlay").fadeIn(500);
      // $("::-webkit-scrollbar").css("-webkit-appearance","none");
      // $("body").css("overflow","hidden");
    } else {
      $(".hamburger label span").css("background-color", "#2b2a2a");
      $(".menu--2").removeClass("show_menu--2");
      $(".menu2--wrapper").css("display", "block");
      $(".menu2--wrapper").css("visibility", "hidden");
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
    $(".menu2--wrapper").css("visibility", "hidden");
    $(this).fadeOut(200);
  });

  //login/signup module
  $("span.showSignUpModal").click(e => {
    $(".choose_signup").click();
  });

  $("span.showLoginModal").click(e => {
    $(".choose_login").click();
  });

  $(".choose_login").click(e => {
    $(".choose_login span").css("width", "75%");
    $(".choose_signup span").css("width", "0%");

    $(".login--box").css({
      zIndex: "1",
      opacity: "1"
    });
    $(".signup--box").css({
      zIndex: "-1",
      opacity: "0"
    });
    $(".signup--box__form").trigger("reset");
  });

  $(".choose_signup").click(e => {
    $(".choose_signup span").css("width", "75%");
    $(".choose_login span").css("width", "0%");

    $(".signup--box").css({
      zIndex: "1",
      opacity: "1"
    });
    $(".login--box").css({
      zIndex: "-1",
      opacity: "0"
    });
    $(".login--box__form").trigger("reset");
  });
}); // end document.ready

//CSS PRELOADER
function showPreLoader() {
  $(".wrapper__loader").css("display", "none");
  $("body").css({ height: "auto", overflowY: "scroll" });
}

//product page TABS - desc,faq,reviews....
function show_tab(obj, e, tab_id) {
  e.preventDefault();
  //id = $()
  //alert($(obj).attr("href"));
  var id = $(obj).attr("href");
  if (id == "#reviews") {
    //addclass
    $(id).addClass("tab--fade");
    $(id).addClass("tab--show");
    $("#" + tab_id).addClass("tab--active");

    //remove class
    $("#desc")
      .removeClass("tab--fade")
      .removeClass("tab--show");
    $("#desc_tab").removeClass("tab--active");
    $("#faq")
      .removeClass("tab--fade")
      .removeClass("tab--show");
    $("#faq_tab").removeClass("tab--active");
  }
  if (id == "#faq") {
    //addclass
    $(id).addClass("tab--fade");
    $(id).addClass("tab--show");
    $("#" + tab_id).addClass("tab--active");

    //remove class
    $("#desc")
      .removeClass("tab--fade")
      .removeClass("tab--show");
    $("#desc_tab").removeClass("tab--active");
    $("#reviews")
      .removeClass("tab--fade")
      .removeClass("tab--show");
    $("#review_tab").removeClass("tab--active");
  }
  if (id == "#desc") {
    //addclass
    $(id).addClass("tab--fade");
    $(id).addClass("tab--show");
    $("#" + tab_id).addClass("tab--active");

    //remove class
    $("#faq")
      .removeClass("tab--fade")
      .removeClass("tab--show");
    $("#faq_tab").removeClass("tab--active");
    $("#reviews")
      .removeClass("tab--fade")
      .removeClass("tab--show");
    $("#review_tab").removeClass("tab--active");
  }
}
