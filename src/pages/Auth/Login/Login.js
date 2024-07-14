Validator({
    form: '#form-1',
    errorSelector: '.form-message',
    formGroupSelector: '.mb-3',
    rules: [
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
        let api = "http://localhost/book_movie_ticket_be/api/user/login";
        fetch(api, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded', // Thay đổi kiểu dữ liệu nếu cần
                // Thêm các headers khác nếu cần
            },
            body: new URLSearchParams(data)  // Chuyển đổi dữ liệu thành chuỗi JSON nếu cần
        })
            .then(response => response.json())
            .then(response => {
                let authMess = document.querySelector('.auth-message');
                switch (response.code) {
                    case 0: {
                        authMess.classList.remove('invalid-message');
                        authMess.classList.add('valid-message');
                        authMess.innerText = "Đăng nhập thành công !";
                        document.cookie = "userData=" + JSON.stringify({ ...response.data, password: "" }) + "; expires=" + new Date(new Date().getTime() + 3600 * 1000).toUTCString() + "; path=/";
                        setTimeout(function () {
                            if (response.data.role === 'admin') {
                                window.location.href = 'http://localhost/Book-movie-tickets/alphacinemas.vn/dashboard';
                            } else {
                                window.location.href = 'http://localhost/Book-movie-tickets/alphacinemas.vn/home';
                            }
                        }, 1000)
                        break;
                    }

                    case 3: {
                        authMess.classList.add('invalid-message');
                        authMess.innerText = "Tài khoản không tồn tại!";
                        break;
                    }
                    case 5: {
                        authMess.classList.add('invalid-message');
                        authMess.innerText = "Mật khẩu không chính xác!";
                        break;
                    }
                }
            })
            .catch(error => {
                console.log(error);
            });
    }
})