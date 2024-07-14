const handleClickModalBuyBtn = async (element) => {
    let movieId = element.getAttribute('data-movie-id');
    let date = element.getAttribute('data-date');
    let time = element.getAttribute('data-time');

    let api = "http://localhost/book_movie_ticket_be/api/movie/getAMovieByTime?movieId=" + movieId + "&time=" + time;
    fetch(api)
        .then(response => response.json())
        .then(response => {
            document.cookie = "currentMovie=" + JSON.stringify(response.data[0]) + "; expires=" + new Date(new Date().getTime() + 3600 * 1000).toUTCString() + "; path=/";
        })
        .then(() => {
            window.location.href = "http://localhost/Book-movie-tickets/alphacinemas.vn/booking"
        })
}