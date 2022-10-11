/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!**************************************!*\
  !*** ./resources/js/exam-session.js ***!
  \**************************************/
$('form#exam-form').on('submit', function (e) {
  e.preventDefault();
  var items = [];
  $('.exam-item').each(function () {
    var item = {
      type: $(this).find('.exam-options').attr('data-item-type')
    };

    switch (item.type) {
      case 'multiple-choice':
        item.answer = $(this).find('.exam-options input[type=radio]:checked').parent().index();
        break;

      case 'short-answer':
        item.answer = $(this).find('.exam-options input[type=text]').val();
        break;

      default:
        break;
    }

    items.push(item);
  });
  var data = {
    _token: $('input[name=_token]').val(),
    answers: items
  };
  console.dir(data);
  fetch(window.location.href, {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json'
    },
    body: JSON.stringify(data)
  }).then(function (response) {
    return response.text();
  }).then(function (body) {
    console.log(body);

    try {
      var _data = JSON.parse(body);

      if (_data) {
        window.location.href = _data.data.url;
      } else {
        console.error('Failed to submit score.');
        alert('Failed to submit score.');
      }
    } catch (error) {
      console.error('TypeError: Failed to parse data');
    }
  })["catch"](function (error) {
    return console.error(error);
  });
});
/******/ })()
;