let priceId = "";

let handleGetCurrentPriceId = (element) => {
    priceId = element.parentNode.parentNode.getAttribute('data-price-id');
    console.log();
}

const handleCreatePrice = () => {
    let typeSeatInput = document.querySelector('#addNewPrice #typeSeat');
    let priceInput = document.querySelector('#addNewPrice #price');

    let formData = new FormData();

    formData.append('typeSeatId', typeSeatInput.value);
    formData.append('price', priceInput.value);

    let api = "http://localhost/book_movie_ticket_be/api/priceseat/create";

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

const handleGetPriceById = (element) => {
    handleGetCurrentPriceId(element);
    httpRequest("GET", `http://localhost/Book-movie-tickets/src/components/Modal/ManagePrice/EditPrice.php?priceId=${priceId}`, "#editPrice-modal")
}

const handleUpdatePrice = () => {
    let typeSeatInput = document.querySelector('#editPrice #typeSeat');
    let priceInput = document.querySelector('#editPrice #price');

    let formData = new FormData();

    formData.append('priceId', priceId);
    formData.append('typeSeatId', typeSeatInput.value);
    formData.append('price', priceInput.value);

    let api = "http://localhost/book_movie_ticket_be/api/priceseat/update";

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

const handleDeletePrice = () => {
    let formData = new FormData();
    formData.append('id', priceId);

    let api = "http://localhost/book_movie_ticket_be/api/priceseat/delete";

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
