let seatId = "";

const handleGetCurrentSeatId = (element) => {
    seatId = element.parentNode.parentNode.getAttribute('data-seat-id');
}

const handleCreateSeat = () => {
    let roomInput = document.querySelector('#addNewSeat #roomId');
    let typeSeatInput = document.querySelector('#addNewSeat #typeSeat');
    let rowSeatInput = document.querySelector('#addNewSeat #rowSeat');
    let seatInput = document.querySelector('#addNewSeat #seat');
    let statusInput = document.querySelector('#addNewSeat #status');

    let formData = new FormData();

    formData.append('roomId', roomInput.value);
    formData.append('typeSeatId', typeSeatInput.value);
    formData.append('rowSeat', rowSeatInput.value);
    formData.append('columnSeat', seatInput.value);
    formData.append('status', statusInput.value);



    let api = "http://localhost/book_movie_ticket_be/api/seat/create";

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

const handleGetSeatById = (element) => {
    handleGetCurrentSeatId(element);
    httpRequest("GET", `http://localhost/Book-movie-tickets/src/components/Modal/ManageSeat/EditSeat.php?seatId=${seatId}`, "#editSeat-modal")
}

const handleUpdateSeat = () => {
    let statusInput = document.querySelector('#editSeat #status');

    let formData = new FormData();

    formData.append('id', seatId);
    formData.append('status', statusInput.value);

    let api = "http://localhost/book_movie_ticket_be/api/seat/update";


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

const handleDeleteSeat = () => {
    let formData = new FormData();
    formData.append('id', seatId);
    let api = "http://localhost/book_movie_ticket_be/api/seat/delete";

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