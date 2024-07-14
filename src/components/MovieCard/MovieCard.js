const handleClickBuyTicket = (element) => {
    let movieId = element.getAttribute('data-movie-id');
    httpRequest("GET", `http://localhost/Book-movie-tickets/src/components/Modal/Schedule/Schedule.php?movieId=${movieId}`, "#schedule-modal")
}

const handleClickPlay = (element) => {
    let movieId = element.getAttribute('data-movie-id');
    httpRequest("GET", `http://localhost/Book-movie-tickets/src/components/Modal/Trailer/Trailer.php?movieId=${movieId}`, "#trailer-modal")
}