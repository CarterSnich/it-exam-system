$(".exam-add-question-wrapper>button").on("click", function () {
    $(".exam-content").append(`
        <div class="exam-item">

            <div class="exam-item-header">
                <label for="">
                    <textarea name="" id="" rows="1" placeholder="Type the question here" oninput="this.parentNode.dataset.value = this.value">Question</textarea>
                </label>

                <div class="exam-type-selection custom-select">
                    <select class="select">
                        <option value="1" selected>Multiple choice</option>
                        <option value="2">Short answer</option>
                        <option value="3">Coding</option>
                    </select>
                </div>

                <button type="button" class="button exam-remove-button">&times;</button>
            </div>

            <div class="exam-answer-content">
                <div class="multiple-choice">
                    <div class="choices">
                        <label class="item">
                            <input type="radio">
                            <input type="text" placeholder="Type option here" value="Option">
                            <button type="button">&times</button>
                        </label>
                    </div>
                    <button type="button" class="button">Add option</button>
                </div>
            </div>

        </div>
    `);
});

$(".exam-content").on("click", ".multiple-choice>button", function () {
    $(this).siblings(".choices").append(`
        <label class="item">
            <input type="radio">
            <input type="text" placeholder="Type option here" value="Option">
            <button type="button">&times</button>
        </label>
    `);
});

$(".exam-content").on("click", ".exam-remove-button", function () {
    $(this).parent().parent().remove();
});

$(".exam-content").on(
    "click",
    ".multiple-choice>.choices>.item>button",
    function () {
        $(this).parent().remove();
    }
);

$(".exam-content").on("change", ".exam-item-header select", function (e) {
    let node;
    console.log(this.value);
    switch (parseInt(this.value)) {
        // multiple choice
        case 1:
            node = `        
                <div class="multiple-choice">
                    <div class="choices">
                        <label class="item">
                            <input type="radio">
                            <input type="text" placeholder="Type option here" value="Option">
                            <button type="button">&times</button>
                        </label>
                    </div>
                    <button type="button" class="button">Add option</button>
                </div>
            `;
            break;

        // short answer
        case 2:
            node = `        
                <div class="short-answer">
                    <input type="text" placeholder="Short answer" value="Short answer">
                </div>
            `;
            break;

        // coding
        case 3:
            node = `        
                <div class="coding">
                    <input type="text" placeholder="Coding question">
                </div>
            `;
            break;
    }
    console.log(node);
    console.dir($(this).parent().parent().siblings(".exam-answer-content"));
    $(this).parent().parent().siblings(".exam-answer-content").html(node);
});
