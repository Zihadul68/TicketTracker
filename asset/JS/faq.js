function validateForm() {
    const question = document.getElementById('question').value.trim();
    const answer = document.getElementById('answer').value.trim();
    const type = document.querySelector('input[name="type"]:checked');
    const user_type = document.querySelector('input[name="user_type"]:checked');

    if (!question || !answer) {
        alert("Question and Answer cannot be empty.");
        return false;
    }

    if (!type) {
        alert("Please select a question type.");
        return false;
    }

    if (!user_type) {
        alert("Please select who can see this FAQ.");
        return false;
    }

    return true;
}
