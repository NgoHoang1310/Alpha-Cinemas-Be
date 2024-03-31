let payment = {};
const handlePay = async (element) => {
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

    console.log(currentMovie);

    // try {
    //     await fetch(payApi, {
    //         method: 'POST',
    //         headers: {
    //             'Content-Type': 'application/x-www-form-urlencoded', // Thay đổi kiểu dữ liệu nếu cần
    //             // Thêm các headers khác nếu cần
    //         },
    //         body: new URLSearchParams({ userId: currentUser.id, movieScheduleId: currentMovie[0].movieScheduleId, seats: seats, total: currentPayment.total })  // Chuyển đổi dữ liệu thành chuỗi JSON nếu cần
    //     })

    //     currentPayment.seats.map(async (seat) => {
    //         await fetch(updateSeatApi, {
    //             method: 'POST',
    //             headers: {
    //                 'Content-Type': 'application/x-www-form-urlencoded', // Thay đổi kiểu dữ liệu nếu cần
    //                 // Thêm các headers khác nếu cần
    //             },
    //             body: new URLSearchParams({ id: seat.seatId, status: 'bought' })  // Chuyển đổi dữ liệu thành chuỗi JSON nếu cần
    //         })
    //     })
    // } catch (error) {
    //     console.log(error);
    // }


}