/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!*******************************!*\
  !*** ./resources/js/vanta.js ***!
  \*******************************/
var vanta = null;
var vantaCheckBox = document.querySelector("#vanta-toggle");

if (localStorage.getItem("vanta_setting") == "true") {
  vantaCheckBox.checked = true;
  vanta = VANTA.NET({
    el: "body",
    mouseControls: false,
    touchControls: false,
    gyroControls: false,
    scale: 1.0,
    scaleMobile: 1.0,
    color: 0x3490b6,
    backgroundAlpha: 0
  });
} else {
  vantaCheckBox.checked = false;
}

vantaCheckBox.onchange = function () {
  localStorage.setItem("vanta_setting", this.checked);

  if (this.checked) {
    if (vanta == null) {
      vanta = VANTA.NET({
        el: "body",
        mouseControls: false,
        touchControls: false,
        gyroControls: false,
        scale: 1.0,
        scaleMobile: 1.0,
        color: 0x3490b6,
        backgroundAlpha: 0
      });
    } else {
      vanta.scene.visible = true;
    }
  } else {
    vanta.scene.visible = false;
  }
};
/******/ })()
;