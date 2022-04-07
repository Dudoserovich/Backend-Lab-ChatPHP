function sendMessage(message = document.querySelector('#inputMessage').value) {
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