function sendMessage(message = document.querySelector('#inputMessage').value) {
    // Я вам запрещаю писать сюда html теги и php код!!!
    const regexHTML = /<\/?\??\w+[^>]*(>|\?>|$)/gi

    if (message.match(regexHTML)) {
        alert("Если хотите написать тег, '<' или '>', пишите с пробелами")
        document.querySelector('#inputMessage').value = ""
    } else {
        if (message.trim().length !== 0) {
            fetch(window.location.href + "?message=" +
                message.trim())
                .then(() => {
                    window.location.reload()
                });
        } else {
            document.querySelector('#inputMessage').value = ""
        }
    }
}

(function () {
    document.querySelector("#inputMessage")
        .addEventListener('keydown', (e) => {
        if (e.key === "Enter") {
            sendMessage(this.value)
        }
    })
})()

function scrollToBottom() {
    let messages = document.querySelector('.card-body');
    messages.scrollTop = messages.scrollHeight;
}

scrollToBottom()