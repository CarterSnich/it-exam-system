/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!**************************************!*\
  !*** ./resources/js/exam-creator.js ***!
  \**************************************/
$(".exam-add-question-wrapper>button").on("click", function () {
  $(".exam-content").append("\n        <div class=\"exam-item\">\n\n            <div class=\"exam-item-header\">\n                <label for=\"\">\n                    <textarea name=\"\" id=\"\" rows=\"1\" placeholder=\"Type the question here\" oninput=\"this.parentNode.dataset.value = this.value\">Question</textarea>\n                </label>\n\n                <div class=\"exam-type-selection custom-select\">\n                    <select class=\"select\">\n                        <option value=\"1\" selected>Multiple choice</option>\n                        <option value=\"2\">Short answer</option>\n                        <option value=\"3\">Coding</option>\n                    </select>\n                </div>\n\n                <button type=\"button\" class=\"button exam-remove-button\">&times;</button>\n            </div>\n\n            <div class=\"exam-answer-content\">\n                <div class=\"multiple-choice\">\n                    <div class=\"choices\">\n                        <label class=\"item\">\n                            <input type=\"radio\">\n                            <input type=\"text\" placeholder=\"Type option here\" value=\"Option\">\n                            <button type=\"button\">&times</button>\n                        </label>\n                    </div>\n                    <button type=\"button\" class=\"button\">Add option</button>\n                </div>\n            </div>\n\n        </div>\n    ");
});
$(".exam-content").on("click", ".multiple-choice>button", function () {
  $(this).siblings(".choices").append("\n        <label class=\"item\">\n            <input type=\"radio\">\n            <input type=\"text\" placeholder=\"Type option here\" value=\"Option\">\n            <button type=\"button\">&times</button>\n        </label>\n    ");
});
$(".exam-content").on("click", ".exam-remove-button", function () {
  $(this).parent().parent().remove();
});
$(".exam-content").on("click", ".multiple-choice>.choices>.item>button", function () {
  $(this).parent().remove();
});
$(".exam-content").on("change", ".exam-item-header select", function (e) {
  var node;
  console.log(this.value);

  switch (parseInt(this.value)) {
    // multiple choice
    case 1:
      node = "        \n                <div class=\"multiple-choice\">\n                    <div class=\"choices\">\n                        <label class=\"item\">\n                            <input type=\"radio\">\n                            <input type=\"text\" placeholder=\"Type option here\" value=\"Option\">\n                            <button type=\"button\">&times</button>\n                        </label>\n                    </div>\n                    <button type=\"button\" class=\"button\">Add option</button>\n                </div>\n            ";
      break;
    // short answer

    case 2:
      node = "        \n                <div class=\"short-answer\">\n                    <input type=\"text\" placeholder=\"Short answer\" value=\"Short answer\">\n                </div>\n            ";
      break;
    // coding

    case 3:
      node = "        \n                <div class=\"coding\">\n                    <input type=\"text\" placeholder=\"Coding question\">\n                </div>\n            ";
      break;
  }

  console.log(node);
  console.dir($(this).parent().parent().siblings(".exam-answer-content"));
  $(this).parent().parent().siblings(".exam-answer-content").html(node);
});
/******/ })()
;