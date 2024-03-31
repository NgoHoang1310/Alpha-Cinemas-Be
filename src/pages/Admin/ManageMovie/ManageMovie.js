let movieId = "";

const handleGetCurrentMovieId = (element) => {
    movieId = element.parentNode.parentNode.getAttribute('data-movie-id');
    console.log(movieId);
}

const handleCreateMovie = () => {
    let titleInput = document.querySelector('#addNewMovie #title');
    let categoryInput = document.querySelector('#addNewMovie #category');
    let durationInput = document.querySelector('#addNewMovie #duration');
    let thumbPathInput = document.querySelector('#addNewMovie #thumbPath');
    let trendInput = document.querySelector('#addNewMovie #trend');
    let limitnationInput = document.querySelector('#addNewMovie #limitnation');
    let statusInput = document.querySelector('#addNewMovie #status');
    let directorInput = document.querySelector('#addNewMovie #director');
    let castInput = document.querySelector('#addNewMovie #cast');
    let languageInput = document.querySelector('#addNewMovie #language');
    let startDateInput = document.querySelector('#addNewMovie #startDate');
    let descriptionInput = document.querySelector('#addNewMovie #description');

    let formData = new FormData();

    formData.append('title', titleInput.value);
    formData.append('category', categoryInput.value);
    formData.append('duration', durationInput.value);
    formData.append('thumbPath', thumbPathInput.files[0]);
    formData.append('trending', trendInput.value);
    formData.append('limitnation', limitnationInput.value);
    formData.append('status', statusInput.value);
    formData.append('director', directorInput.value);
    formData.append('cast', castInput.value);
    formData.append('language', languageInput.value);
    formData.append('startDate', startDateInput.value);
    formData.append('description', descriptionInput.value);


    let api = "http://localhost/book_movie_ticket_be/api/movie/create";

    console.log(formData);

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

const handleGetMovieById = (element) => {

    handleGetCurrentMovieId(element);
    httpRequest("GET", `http://localhost/Book-movie-tickets/src/components/Modal/ManageMovie/EditMovie.php?movieId=${movieId}`, "#editMovie-modal")
}

const handleUpdateMovie = () => {
    let titleInput = document.querySelector('#editMovie #title');
    let categoryInput = document.querySelector('#editMovie #category');
    let durationInput = document.querySelector('#editMovie #duration');
    let thumbPathInput = document.querySelector('#editMovie #thumbPath');
    let trendInput = document.querySelector('#editMovie #trend');
    let limitnationInput = document.querySelector('#editMovie #limitnation');
    let statusInput = document.querySelector('#editMovie #status');
    let directorInput = document.querySelector('#editMovie #director');
    let castInput = document.querySelector('#editMovie #cast');
    let languageInput = document.querySelector('#editMovie #language');
    let startDateInput = document.querySelector('#editMovie #startDate');
    let descriptionInput = document.querySelector('#editMovie #description');

    let formData = new FormData();

    formData.append('id', movieId);
    formData.append('title', titleInput.value);
    formData.append('category', categoryInput.value);
    formData.append('duration', durationInput.value);
    formData.append('thumbPath', thumbPathInput.files[0]);
    formData.append('trending', trendInput.value);
    formData.append('limitnation', limitnationInput.value);
    formData.append('status', statusInput.value);
    formData.append('director', directorInput.value || directorInput.textContent);
    formData.append('cast', castInput.value || castInput.textContent);
    formData.append('language', languageInput.value);
    formData.append('startDate', startDateInput.value);
    formData.append('description', descriptionInput.value || descriptionInput.textContent);

    let api = "http://localhost/book_movie_ticket_be/api/movie/update";


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

const handleDeleteMovie = () => {
    let formData = new FormData();
    formData.append('movieId', movieId);
    let api = "http://localhost/book_movie_ticket_be/api/movie/delete";

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