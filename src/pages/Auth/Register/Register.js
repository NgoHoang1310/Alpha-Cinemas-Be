Validator({
    form: '#form-2',
    errorSelector: '.form-message',
    formGroupSelector: '.mb-3',
    rules: [
        Validator.isRequire('#formName'),
        Validator.isRequire('#formEmail'),
        Validator.isEmail('#formEmail'),
        Validator.isRequire('#formPassword'),
        Validator.isPassword('#formPassword', 6),
        Validator.isRequire('#formPasswordVerification'),
        Validator.isConfirm('#formPasswordVerification', function () {
            return document.querySelector('#formPassword').value;
        }, 'Mật khẩu nhập lại không chính xác')
    ],
    onsubmit: function (data) {
        let api = "http://localhost/book_movie_ticket_be/api/user/create";
        fetch(api, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded', // Thay đổi kiểu dữ liệu nếu cần
                // Thêm các headers khác nếu cần
            },
            body: new URLSearchParams(data)  // Chuyển đổi dữ liệu thành chuỗi JSON nếu cần
        })
            .then(response => response.json())
            .then(data => {
                let authMess = document.querySelector('.auth-message');
                switch (data.code) {
                    case 0: {
                        console.log("Thành công");
                        authMess.classList.remove('invalid-message');
                        authMess.classList.add('valid-message');
                        authMess.innerText = "Đăng kí thành công !";
                        setTimeout(function () {
                            window.location.href = 'http://localhost/Book-movie-tickets/alphacinemas.vn/login';
                        }, 1000)
                        break;
                    }

                    case 4: {
                        console.log("Không Thành công");
                        authMess.classList.add('invalid-message');
                        authMess.innerText = "Email đã được sử dụng. Vui lòng sử dụng email khác!";
                        break;
                    }
                }
            })
            .catch(error => {
                console.log(error);
            });
    }
})