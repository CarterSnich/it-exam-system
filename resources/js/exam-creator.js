// add new item
$(".exam-add-question-wrapper>button").on("click", function () {
    let id = uuidv4();
    $(".exam-content").append(`
        <div class="exam-item">
            <div class="exam-item-header">
                <label>
                    <textarea name="" id="" rows="1" placeholder="Type the question here" oninput="this.parentNode.dataset.value = this.value" required></textarea>
                </label>
                <div class="exam-type-selection custom-select">
                    <select class="exam-type select">
                        <option value="multiple-choice" selected>Multiple choice</option>
                        <option value="short-answer">Short answer</option>
                        <option value="coding">Coding</option>
                    </select>
                    <button type="button" class="button exam-remove-button">Remove</button>
                </div>
            </div>
            <div class="exam-answer-content">
                <div class="multiple-choice" data-multiple-choice-id="${id}">
                    <div class="choices">
                        <label class="item">
                            <input type="radio" name="${id}" required>
                            <input type="text" placeholder="Type option here">
                            <button type="button">&times</button>
                        </label>
                    </div>
                    <button type="button" class="button">Add option</button>
                </div>
            </div>
        </div>
    `);
});

// remove item
$(".exam-content").on("click", ".exam-remove-button", function () {
    $(this).parent().parent().parent().remove();
});

// add new multiple choice item
$(".exam-content").on("click", ".multiple-choice>button", function () {
    let id = $(this).parent().attr("data-multiple-choice-id");
    $(this).siblings(".choices").append(`
        <label class="item">
            <input type="radio" name="${id}" required>
            <input type="text" placeholder="Type option here" required>
            <button type="button">&times</button>
        </label>
    `);
});

// remove multiple choice item
$(".exam-content").on("click", ".multiple-choice>.choices>.item>button", function () {
    $(this).parent().remove();
});

// change item type
$(".exam-content").on("change", ".exam-item-header select.exam-type", function (e) {
    let node;
    switch (this.value) {
        // multiple choice
        case "multiple-choice":
            let id = uuidv4();
            node = `        
                <div class="multiple-choice" data-multiple-choice-id="${id}">
                    <div class="choices">
                        <label class="item">
                            <input type="radio" name="${id}" required>
                            <input type="text" placeholder="Type option here" required>
                            <button type="button">&times</button>
                        </label>
                    </div>
                    <button type="button" class="button">Add option</button>
                </div>
            `;
            break;

        // short answer
        case "short-answer":
            node = `        
                <div class="short-answer">
                    <input type="text" placeholder="Short answer" value="Short answer" required>
                </div>
            `;
            break;

        // coding
        case "coding":
            node = `        
                <div class="coding">
                    <input type="text" placeholder="Coding question" required>
                </div>
            `;
            break;
    }
    $(this).parent().parent().siblings(".exam-answer-content").html(node);
}
);

// submit
$(".exam-creator-form").on("submit", function (e) {
    e.preventDefault();
    $('.progress-overlay').fadeIn(300);

    let title = $("input[name=title]").val();
    let description = $("input[name=description]").val();
    let items = [];

    // item
    $(".exam-item").each(function () {
        let item = {
            type: $(this).find(".exam-type").val(),
            question: $(this).find("textarea").val(),
        };

        switch (item.type) {
            case "multiple-choice":
                let options = [];
                let answer_index;
                console.dir(this)
                $(this).find(".choices>.item").each(function (i) {
                    let option = {};
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

    let exam = {
        _token: $(this).find('input[type=hidden]').val(),
        title: title,
        description: description,
        items: items
    };

    console.dir(exam)

    fetch(window.location.pathname, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify(exam),
    })
        .then((response) => {
            return response.text()
            if (response.status == 200) {
            } else {
                window.location.href = `/error/${response.status}`
            }
        })
        .then((body) => {
            console.log(body)
            try {
                let data = JSON.parse(body)

                if (data) {
                    window.location.href = data.data.url;
                } else {
                    console.error('Failed to save exam.')
                    alert('failed to save exam.')
                }
            } catch (error) {
                console.error('TypeError: Failed to parse data');
            }
        })
        .catch((error) => console.error(error));

    $('.progress-overlay').fadeOut(300);
});
