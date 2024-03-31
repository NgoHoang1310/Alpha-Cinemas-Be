const handleLoadMovie = (element) => {
    let value = element.getAttribute('value');
    console.log(value);
    handleNav(element);
    httpRequest("GET", `http://localhost/Book-movie-tickets/src/components/Movies/Movies.php?status=${value}`, ".row.movies")

}


