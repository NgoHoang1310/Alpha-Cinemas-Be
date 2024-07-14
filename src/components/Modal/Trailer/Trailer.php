<?php
$movieId = $_GET['movieId'];
$apiMovie = 'http://localhost/book_movie_ticket_be/api/movie/getMovieById?movieId=' . $movieId;
$responseMovie = file_get_contents($apiMovie);
$dataMovie = (object)json_decode($responseMovie, true);
?>
<div class="modal-header">
    <h1 class="modal-title fs-3" id="exampleModalLabel">BẠN ĐANG XEM TRAILER</h1>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body mb-3">
    <h1 class="text-center primary-text mb-3" id="tenphim"><?php echo $dataMovie->data[0]['title'] ?></h1>
    <?php
    $link = $dataMovie->data[0]['trailer'];
    include $_SERVER['DOCUMENT_ROOT'] . '/Book-movie-tickets/src/components/Video/Video.php';
    ?>
</div>
</div>