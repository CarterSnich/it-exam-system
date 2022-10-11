
$('form#exam-form').on('submit', function (e) {
    e.preventDefault()

    let items = [];

    $('.exam-item').each(function () {
        let item = {
            type: $(this).find('.exam-options').attr('data-item-type')
        }

        switch (item.type) {
            case 'multiple-choice':
                item.answer = $(this).find('.exam-options input[type=radio]:checked').parent().index()
                break;

            case 'short-answer':
                item.answer = $(this).find('.exam-options input[type=text]').val()
                break;

            default: break;
        }

        items.push(item)
    });


    let data = {
        _token: $('input[name=_token]').val(),
        answers: items
    }

    console.dir(data)

    fetch(window.location.href, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify(data)
    })
        .then(response => response.text())
        .then(body => {
            console.log(body)
            try {
                let data = JSON.parse(body)

                if (data) {
                    window.location.href = data.data.url;
                } else {
                    console.error('Failed to submit score.')
                    alert('Failed to submit score.')
                }
            } catch (error) {
                console.error('TypeError: Failed to parse data');
            }

        })
        .catch(error => console.error(error))

})