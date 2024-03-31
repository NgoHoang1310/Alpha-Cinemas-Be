const handleClickOnTime = (element) => {
    let movieId = element.getAttribute('movie-id');
    let time = element.getAttribute('time');
    console.log(time);
    httpRequest("GET", `http://localhost/Book-movie-tickets/src/components/Modal/Booking/BookingModal.php?movieId=${movieId}&time=${time}`, "#booking-modal")
}