let movieScheduleId = "";

const handleGetCurrentMovieScheduleId = (element) => {
    movieScheduleId = element.parentNode.parentNode.getAttribute('data-movie-schedule-id');
}

const handleCreateMovieSchedule = () => {
    let movieNameInput = document.querySelector('#addNewMovieSchedule #movieName');
    let roomInput = document.querySelector('#addNewMovieSchedule #roomId');
    let timeInput = document.querySelector('#addNewMovieSchedule #time');
    let statusInput = document.querySelector('#addNewMovieSchedule #status');


    let formData = new FormData();

    formData.append('movieId', movieNameInput.value);
    formData.append('roomId', roomInput.value);
    formData.append('time', timeInput.value);
    formData.append('status', statusInput.value);

    let api = "http://localhost/book_movie_ticket_be/api/movieschedule/create";

    fetch(api, {
        method: 'POST',
        body: formData  // Chuyển đổi dữ liệu thành chuỗi JSON nếu cần
    })
        .then(res => res.json())
        .then(res => {
            if (res.code == 0) {
                setTimeout(() => {
                    location.reload();
                }, 500)
            }
        })
}

const handleGetMovieScheduleById = (element) => {
    handleGetCurrentMovieScheduleId(element);
    httpRequest("GET", `http://localhost/Book-movie-tickets/src/components/Modal/ManageSchedule/EditSchedule.php?movieScheduleId=${movieScheduleId}`, "#editMovieSchedule-modal")
}

const handleUpdateMovieSchedule = () => {
    let movieNameInput = document.querySelector('#editMovieSchedule #movieName');
    let roomInput = document.querySelector('#editMovieSchedule #roomId');
    let timeInput = document.querySelector('#editMovieSchedule #time');
    let statusInput = document.querySelector('#editMovieSchedule #status');

    let formData = new FormData();

    formData.append('id', movieScheduleId);
    formData.append('movieId', movieNameInput.value);
    formData.append('roomId', roomInput.value);
    formData.append('time', timeInput.value);
    formData.append('status', statusInput.value);


    let api = "http://localhost/book_movie_ticket_be/api/movieschedule/update";

    fetch(api, {
        method: 'POST',
        body: formData  // Chuyển đổi dữ liệu thành chuỗi JSON nếu cần
    })
        .then(res => res.json())
        .then(res => {
            if (res.code == 0) {
                setTimeout(() => {
                    location.reload();
                }, 500)
            }
        })
}

const handleDeleteMovieSchedule = () => {
    let formData = new FormData();
    formData.append('id', movieScheduleId);
    let api = "http://localhost/book_movie_ticket_be/api/movieschedule/delete";

    fetch(api, {
        method: 'POST',
        body: formData  // Chuyển đổi dữ liệu thành chuỗi JSON nếu cần
    })
        .then(res => res.json())
        .then(res => {
            if (res.code == 0) {
                setTimeout(() => {
                    location.reload();
                }, 500)
            }
        })
}
