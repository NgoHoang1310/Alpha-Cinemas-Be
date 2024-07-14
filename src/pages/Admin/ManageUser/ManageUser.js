let userId = "";

let handleGetCurrentUserId = (element) => {
    userId = element.parentNode.parentNode.getAttribute('data-user-id');
}

const handleCreateUser = () => {
    let userNameInput = document.querySelector('#addNewUser #userName');
    let emailInput = document.querySelector('#addNewUser #email');
    let passwordInput = document.querySelector('#addNewUser #password');
    let phoneInput = document.querySelector('#addNewUser #phone');
    let formAvatarInput = document.querySelector('#addNewUser #formAvatar');
    let roleInput = document.querySelector('#addNewUser #role');

    let formData = new FormData();

    formData.append('userName', userNameInput.value);
    formData.append('email', emailInput.value);
    formData.append('password', passwordInput.value);
    formData.append('phoneNumber', phoneInput.value);
    formData.append('role', roleInput.value);
    formData.append('thumbPath', formAvatarInput.files[0]);


    let api = "http://localhost/book_movie_ticket_be/api/user/create";

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

const handleGetUserById = (element) => {
    handleGetCurrentUserId(element);
    httpRequest("GET", `http://localhost/Book-movie-tickets/src/components/Modal/ManageUser/EditUser.php?userId=${userId}`, "#editUser-modal")
}

const handleUpdateUser = () => {
    let userNameInput = document.querySelector('#editUser #userName');
    let passwordInput = document.querySelector('#editUser #password');
    let phoneInput = document.querySelector('#editUser #phone');
    let formAvatarInput = document.querySelector('#editUser #formAvatar');
    let roleInput = document.querySelector('#editUser #role');

    let formData = new FormData();

    formData.append('id', userId);
    formData.append('userName', userNameInput.value);
    formData.append('password', passwordInput.value);
    formData.append('phoneNumber', phoneInput.value);
    formData.append('role', roleInput.value);
    formData.append('thumbPath', formAvatarInput.files[0]);


    let api = "http://localhost/book_movie_ticket_be/api/user/update";

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

const handleDeleteUser = () => {
    let formData = new FormData();
    formData.append('id', userId);
    let api = "http://localhost/book_movie_ticket_be/api/user/delete";

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
