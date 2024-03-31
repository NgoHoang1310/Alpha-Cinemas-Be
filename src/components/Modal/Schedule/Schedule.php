<?php
$movieId = $_GET['movieId'];
$apiGetTime = 'http://localhost/book_movie_ticket_be/api/movieschedule/get?movieId=' . $movieId;
$responseTimes = file_get_contents($apiGetTime);
$dataTimes = (object)json_decode($responseTimes, true);
?>
<div class="modal-header">
    <h1 class="modal-title fs-3" id="exampleModalLabel">LỊCH CHIẾU PHIM</h1>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
    <h1 class="text-center primary-text" id="tenphim"></h1>
    <?php
    $dataTimeByMovie = [];
    foreach ($dataTimes->data as $key) {
        array_push($dataTimeByMovie, $key['time']);
    }
    $dataTime = $dataTimeByMovie;
    $movieId = $dataTimes->data[0]['movieId'];
    include('/Applications/XAMPP/xamppfiles/htdocs/Book-movie-tickets/src/components/ShowTime/ListTime.php');
    ?>
</div>
</div>