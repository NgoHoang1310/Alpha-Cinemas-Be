let payment = {};
const handlePay = (element) => {
    let encodedCurrentMovie = getCookie('currentMovie');
    let encodedCurrentPayment = getCookie('paymentInfo');
    let encodedCurrentUser = getCookie('userData');

    let decodedCurrentPayment = decodeURIComponent(encodedCurrentPayment);
    let decodedCurrentMovie = decodeURIComponent(encodedCurrentMovie);
    let decodedCurrentUser = decodeURIComponent(encodedCurrentUser);

    let currentMovie = JSON.parse(decodedCurrentMovie);
    let currentPayment = JSON.parse(decodedCurrentPayment);
    let currentUser = JSON.parse(decodedCurrentUser);

    let seats = [];

    currentPayment.seats.map(async (seat) => {
        seats.push(seat.value);
    })

    let payApi = "http://localhost/book_movie_ticket_be/api/invoice/create";
    let updateSeatApi = "http://localhost/book_movie_ticket_be/api/seat/update";


    try {
        fetch(payApi, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded', // Thay đổi kiểu dữ liệu nếu cần
                // Thêm các headers khác nếu cần
            },
            body: new URLSearchParams({ userId: currentUser.id, movieScheduleId: currentMovie.movieScheduleId, seats: seats, total: currentPayment.total })  // Chuyển đổi dữ liệu thành chuỗi JSON nếu cần
        })
            .then(() => {
                currentPayment.seats.map(async (seat) => {
                    fetch(updateSeatApi, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded', // Thay đổi kiểu dữ liệu nếu cần
                            // Thêm các headers khác nếu cần
                        },
                        body: new URLSearchParams({ id: seat.seatId, status: 'bought' })  // Chuyển đổi dữ liệu thành chuỗi JSON nếu cần
                    })
                        .then(() => {
                            window.location.href = "http://localhost/Book-movie-tickets/alphacinemas.vn/transaction"
                        })
                })
            })


    } catch (error) {
        console.log(error);
    }


}