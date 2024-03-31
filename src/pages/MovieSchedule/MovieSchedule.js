const handleSortMovieByDay = (element) => {
    let value = element.getAttribute('value');
    handleNav(element);
    setTimeout(() => {
        httpRequest("GET", `http://localhost/Book-movie-tickets/src/pages/MovieSchedule/Movie.php?day=${value}`, ".movie-schedule-content")
    }, 500);
}