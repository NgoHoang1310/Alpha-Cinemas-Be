<?php
//api movie
$status = $_GET['status'];
$apiMovie = !empty($status) ? 'http://localhost/book_movie_ticket_be/api/movie/get?status=' . $status : 'http://localhost/book_movie_ticket_be/api/movie/get?status=NS';
// $apiMovie = 'http://localhost/book_movie_ticket_be/api/movie/get';
$responseMovie = file_get_contents($apiMovie);
$dataMovie = (object)json_decode($responseMovie, true);
?>
<!-- <div class="row movies"> -->
<?php
if (($dataMovie->code === 0) && !empty($dataMovie->data)) {
    foreach ($dataMovie->data as $movie) {
?>
        <div class="col-lg-3 movies__item">
            <?php
            $cardData = $movie;
            include('/Applications/XAMPP/xamppfiles/htdocs/Book-movie-tickets/src/components/MovieCard/MovieCard.php')
            ?>
        </div>
<?php
    }
}
?>

<!-- </div> -->