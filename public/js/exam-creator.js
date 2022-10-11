/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!**************************************!*\
  !*** ./resources/js/exam-creator.js ***!
  \**************************************/
// add new item
$(".exam-add-question-wrapper>button").on("click", function () {
  var id = uuidv4();
  $(".exam-content").append("\n        <div class=\"exam-item\">\n            <div class=\"exam-item-header\">\n                <label>\n                    <textarea name=\"\" id=\"\" rows=\"1\" placeholder=\"Type the question here\" oninput=\"this.parentNode.dataset.value = this.value\" required></textarea>\n                </label>\n                <div class=\"exam-type-selection custom-select\">\n                    <select class=\"exam-type select\">\n                        <option value=\"multiple-choice\" selected>Multiple choice</option>\n                        <option value=\"short-answer\">Short answer</option>\n                        <option value=\"coding\">Coding</option>\n                    </select>\n                    <button type=\"button\" class=\"button exam-remove-button\">Remove</button>\n                </div>\n            </div>\n            <div class=\"exam-answer-content\">\n                <div class=\"multiple-choice\" data-multiple-choice-id=\"".concat(id, "\">\n                    <div class=\"choices\">\n                        <label class=\"item\">\n                            <input type=\"radio\" name=\"").concat(id, "\" required>\n                            <input type=\"text\" placeholder=\"Type option here\">\n                            <button type=\"button\">&times</button>\n                        </label>\n                    </div>\n                    <button type=\"button\" class=\"button\">Add option</button>\n                </div>\n            </div>\n        </div>\n    "));
}); // remove item

$(".exam-content").on("click", ".exam-remove-button", function () {
  $(this).parent().parent().parent().remove();
}); // add new multiple choice item

$(".exam-content").on("click", ".multiple-choice>button", function () {
  var id = $(this).parent().attr("data-multiple-choice-id");
  $(this).siblings(".choices").append("\n        <label class=\"item\">\n            <input type=\"radio\" name=\"".concat(id, "\" required>\n            <input type=\"text\" placeholder=\"Type option here\" required>\n            <button type=\"button\">&times</button>\n        </label>\n    "));
}); // remove multiple choice item

$(".exam-content").on("click", ".multiple-choice>.choices>.item>button", function () {
  $(this).parent().remove();
}); // change item type

$(".exam-content").on("change", ".exam-item-header select.exam-type", function (e) {
  var node;

  switch (this.value) {
    // multiple choice
    case "multiple-choice":
      var id = uuidv4();
      node = "        \n                <div class=\"multiple-choice\" data-multiple-choice-id=\"".concat(id, "\">\n                    <div class=\"choices\">\n                        <label class=\"item\">\n                            <input type=\"radio\" name=\"").concat(id, "\" required>\n                            <input type=\"text\" placeholder=\"Type option here\" required>\n                            <button type=\"button\">&times</button>\n                        </label>\n                    </div>\n                    <button type=\"button\" class=\"button\">Add option</button>\n                </div>\n            ");
      break;
    // short answer

    case "short-answer":
      node = "        \n                <div class=\"short-answer\">\n                    <input type=\"text\" placeholder=\"Short answer\" value=\"Short answer\" required>\n                </div>\n            ";
      break;
    // coding

    case "coding":
      node = "        \n                <div class=\"coding\">\n                    <input type=\"text\" placeholder=\"Coding question\" required>\n                </div>\n            ";
      break;
  }

  $(this).parent().parent().siblings(".exam-answer-content").html(node);
}); // submit

$(".exam-creator-form").on("submit", function (e) {
  e.preventDefault();
  $('.progress-overlay').fadeIn(300);
  var title = $("input[name=title]").val();
  var description = $("input[name=description]").val();
  var items = []; // item

  $(".exam-item").each(function () {
    var item = {
      type: $(this).find(".exam-type").val(),
      question: $(this).find("textarea").val()
    };

    switch (item.type) {
      case "multiple-choice":
        var options = [];
        var answer_index;
        console.dir(this);
        $(this).find(".choices>.item").each(function (i) {
          var option = {};
          option.name = $(this).find("input[type=text]").val();

          if ($(this).find("input[type=radio]:checked").val()) {
            answer_index = i;
          }

          options.push(option);
        });
        item.options = options;
        item.answer = answer_index;
        break;

      case "short-answer":
        item.answer = $(this).find(".short-answer>input[type=text]").val();
        break;

      case "coding":
        break;

      default:
        break;
    }

    items.push(item);
  });
  var exam = {
    _token: $(this).find('input[type=hidden]').val(),
    title: title,
    description: description,
    items: items
  };
  console.dir(exam);
  fetch(window.location.pathname, {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json'
    },
    body: JSON.stringify(exam)
  }).then(function (response) {
    return response.text();

    if (response.status == 200) {} else {
      window.location.href = "/error/".concat(response.status);
    }
  }).then(function (body) {
    console.log(body);

    try {
      var data = JSON.parse(body);

      if (data) {
        window.location.href = data.data.url;
      } else {
        console.error('Failed to save exam.');
        alert('failed to save exam.');
      }
    } catch (error) {
      console.error('TypeError: Failed to parse data');
    }
  })["catch"](function (error) {
    return console.error(error);
  });
  $('.progress-overlay').fadeOut(300);
});
/******/ })()
;