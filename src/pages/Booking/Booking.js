
let seats = [];
let seatPos = document.getElementById('seat-pos');

let seatNormalPrice = document.getElementById('seat-normal-quantity');
let seatVipPrice = document.getElementById('seat-vip-quantity');
let seatDoublePrice = document.getElementById('seat-double-quantity');

let seatNormalQuantity = 0;
let seatVipQuantity = 0;
let seatDoubleQuantity = 0;

let totalMoney = document.getElementById('total-money');
let total = 0;

let totalMoneyModal = document.getElementById('total-money-modal');
let seatsModal = document.getElementById('seats-modal');




const handleClickOnSeat = function (element) {
    let type = element.getAttribute('type');
    let status = element.getAttribute('status');
    let value = element.innerText;
    let price = element.getAttribute('price');
    let seatId = element.getAttribute('seat-id');
    if (type == 'normal' && status == 'empty') {
        element.classList.toggle('seat-selected-normal');
        if (seats.findIndex(seat => seat.seatId == seatId) === -1) {
            seats.push({ seatId, value });
            seatNormalQuantity++;
            total += +price;
        } else {
            seats.splice(seats.findIndex(seat => seat.seatId == seatId), 1);
            seatNormalQuantity--;
            total -= +price;

        }
        seatNormalPrice.innerText = `${seatNormalQuantity}x${(+price).toLocaleString('vi-VN')}đ`
    }

    if (type == 'vip' && status == 'empty') {
        element.classList.toggle('seat-selected-vip');
        if (seats.indexOf(value) === -1) {
            seats.push({ seatId, value });
            seatVipQuantity++;
            total += +price;
        } else {
            seats.splice(seats.value.indexOf(value), 1);
            seatVipQuantity--;
            total -= +price;
        }
        seatVipPrice.innerText = `${seatVipQuantity}x${(+price).toLocaleString('vi-VN')}đ`

    }

    if (type == 'double' && status == 'empty') {
        element.classList.toggle('seat-selected-double');
        if (seats.indexOf(value) === -1) {
            seats.push({ seatId, value });
            seatDoubleQuantity++;
            total += +price;
        } else {
            seats.splice(seats.indexOf(value), 1);
            seatDoubleQuantity--;
            total -= +price;
        }
        seatDoublePrice.innerText = `${seatDoubleQuantity}x${(+price).toLocaleString('vi-VN')}đ`

    }

    totalMoney.innerText = `${total.toLocaleString('vi-VN')}đ`;
    console.log(seats);
    seatPos.innerText = seats && seats.map((seat) => {
        return seat.value;
    })

}

const handleContinueBooking = () => {
    let encodedData = getCookie('currentMovie');
    // Giải mã dữ liệu JSON
    let decodedData = decodeURIComponent(encodedData);
    let currentMovie = JSON.parse(decodedData);

    document.cookie = "paymentInfo=" + JSON.stringify({ seats, total }) + "; expires=" + new Date(new Date().getTime() + 3600 * 1000).toUTCString() + "; path=/";
    window.location.href = "http://localhost/Book-movie-tickets/alphacinemas.vn/payment";
}
