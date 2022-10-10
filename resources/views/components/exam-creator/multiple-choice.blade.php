<div class="exam-item">

    <div class="exam-item-header">
        <label for="">
            <textarea name="" id="" rows="1" placeholder="Type the question here" oninput="this.parentNode.dataset.value = this.value"></textarea>
        </label>

        <div class="exam-type-selection custom-select">
            <select class="select">
                <option value="1" selected>Multiple choice</option>
                <option value="2">Short answer</option>
                <option value="3">Coding</option>
            </select>

            <button type="button" class="button">Remove</button>
        </div>

    </div>

    <div class="exam-answer-content">
        <div class="multiple-choice">
            <div class="choices">
                <label class="item">
                    <input type="radio">
                    <input type="text" placeholder="Type option here">
                    <button type="button">&times</button>
                </label>
            </div>
            <button type="button" class="button">Add option</button>
        </div>
    </div>

</div>
