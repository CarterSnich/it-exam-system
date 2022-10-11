{{-- exam layout --}}
<div class="exam-item">
    <div class="exam-item-header">
        <label for="">
            <textarea name="" id="" rows="1" placeholder="Type the question here" oninput="this.parentNode.dataset.value = this.value"></textarea>
        </label>
        <div class="custom-select">
            <select class="exam-type select">
                <option value="1">Multiple choice</option>
                <option value="2" selected>Short answer</option>
                <option value="3">Coding</option>
            </select>
        </div>
        <button type="button" class="button exam-remove-button">Remove</button>
    </div>
    <div class="exam-answer-content">
        <div class="short-answer">
            <input type="text" placeholder="Short answer" value="Short answer">
        </div>
    </div>
</div>
