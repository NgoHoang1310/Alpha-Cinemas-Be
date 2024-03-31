let bannerId = "";

const handleGetCurrentBannerId = (element) => {
    bannerId = element.parentNode.parentNode.getAttribute('data-banner-id');
}

const handleCreateBanner = () => {
    let bannerInput = document.querySelector('#addNewBanner #banner');

    let formData = new FormData();

    formData.append('thumbPath', bannerInput.files[0]);


    let api = "http://localhost/book_movie_ticket_be/api/banner/create";

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

const handleDeleteBanner = () => {
    let formData = new FormData();
    formData.append('id', bannerId);
    let api = "http://localhost/book_movie_ticket_be/api/banner/delete";

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
