function validate_is_number(evt) {
  //   console.log(evt);

  var e = evt || window.event;
  var key = e.keyCode || e.which;

  if (
    (!e.shiftKey &&
      !e.altKey &&
      !e.ctrlKey &&
      // numbers
      key >= 48 &&
      key <= 57) ||
    // Numeric keypad
    (key >= 96 && key <= 105) ||
    // Backspace and Tab and Enter
    key == 8 ||
    key == 9 ||
    key == 13 ||
    // Home and End
    key == 35 ||
    key == 36 ||
    // left and right arrows
    key == 37 ||
    key == 39 ||
    // Del and Ins
    key == 46 ||
    key == 45
  ) {
    // input is VALID
  } else {
    // input is INVALID
    e.returnValue = false;
    if (e.preventDefault) e.preventDefault();
  }
}

function multiple_keywords(evt, obj) {
  var val = $(obj).val();
  $(obj).val(val.replace(/[\s]+/g, ","));
  console.log(val);
}

// alternative method(in this method we hv to use onkeyup instead of onkeydown)
// function isNumber(obj) {
//   var $val = $(obj).val();
//   console.log($val);
//   $(obj).val(
//     $(obj)
//       .val()
//       .replace(/[^\d]+/g, "")
//   );
// }

//another alternative method(in this method u cant use backspace or arrow buttons from keyboard - it is drawback)
// function isNumber(evt) {
//   var char = String.fromCharCode(evt.keyCode);
//   if (!/[0-9]/.test(char)) {
//     evt.returnValue = false;
//   }
// }

//SHow image before inserting into database
function show_image1(evt, imgID) {
  console.log(evt);
  var img = document.getElementById(imgID);
  console.log(img);
  img.classList.remove("invisible");
  img.classList.add("visible");
  // img.addClass("d-block");
  img.src = URL.createObjectURL(evt.target.files[0]);
}
