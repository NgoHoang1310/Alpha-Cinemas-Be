let theaterId = "";

const handleGetCurrentTheaterId = (element) => {
    theaterId = element.parentNode.parentNode.getAttribute('data-theater-id');
}

const handleCreateTheater = () => {
    let codeInput = document.querySelector('#addNewTheater #code');
    let theaterNameInput = document.querySelector('#addNewTheater #theaterName');
    let thumbPathInput = document.querySelector('#addNewTheater #thumbPath');
    let imgPriceInput = document.querySelector('#addNewTheater #imgPrice');
    let descriptionInput = document.querySelector('#addNewTheater #description');

    let formData = new FormData();

    formData.append('code', codeInput.value);
    formData.append('theaterName', theaterNameInput.value);
    formData.append('thumbPath', thumbPathInput.files[0]);
    formData.append('imgPrice', imgPriceInput.files[0]);
    formData.append('description', descriptionInput.value);

    let api = "http://localhost/book_movie_ticket_be/api/theater/create";

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

const handleGetTheaterById = (element) => {
    handleGetCurrentTheaterId(element);
    httpRequest("GET", `http://localhost/Book-movie-tickets/src/components/Modal/ManageTheater/EditTheater.php?theaterId=${theaterId}`, "#editTheater-modal")
}

const handleUpdateTheater = () => {
    let codeInput = document.querySelector('#editTheater #code');
    let theaterNameInput = document.querySelector('#editTheater #theaterName');
    let thumbPathInput = document.querySelector('#editTheater #thumbPath');
    let imgPriceInput = document.querySelector('#editTheater #imgPrice');

    let descriptionInput = document.querySelector('#editTheater #description');

    let formData = new FormData();

    formData.append('id', theaterId);
    formData.append('code', codeInput.value);
    formData.append('theaterName', theaterNameInput.value);
    formData.append('thumbPath', thumbPathInput.files[0]);
    formData.append('imgPrice', imgPriceInput.files[0]);
    formData.append('description', descriptionInput.value || descriptionInput.textContent);

    let api = "http://localhost/book_movie_ticket_be/api/theater/update";


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

const handleDeleteTheater = () => {
    let formData = new FormData();
    formData.append('id', theaterId);
    let api = "http://localhost/book_movie_ticket_be/api/theater/delete";

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