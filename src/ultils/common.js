const httpRequest = (method, url, selector) => {
    const xhttp = new XMLHttpRequest();
    xhttp.onload = function () {
        $(selector)[0].innerHTML = this.responseText;
    }
    xhttp.open(method, url, true);
    xhttp.send();
}

const handleNav = (element) => {
    let activeElement = $(`.${element.className}.nav-active`);
    if (activeElement) {
        activeElement[0].classList.remove('nav-active');
    }
    element.classList.add('nav-active');

}

const countDown = (minutes) => {
    var display = document.getElementById('time-left');

    secondsLeft = minutes * 60; // Chuyển đổi số phút thành giây

    if (!display) {
        return;
    }
    timerInterval = setInterval(function () {
        var minutes = Math.floor(secondsLeft / 60);
        var seconds = secondsLeft % 60;

        display.textContent = minutes + ':' + (seconds < 10 ? '0' : '') + seconds;

        if (secondsLeft === 0) {
            clearInterval(timerInterval);
            alert("Time's up!");
            window.location.href = 'http://localhost/Book-movie-tickets/alphacinemas.vn/home'
        } else {
            secondsLeft--;
        }
    }, 1000);
}

function getCookie(name) {
    var nameEQ = name + "=";
    var ca = decodeURIComponent(document.cookie).split(';');
    for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1, c.length);
        }
        if (c.indexOf(nameEQ) == 0) {
            return c.substring(nameEQ.length, c.length);
        }
    }
    return null;
}