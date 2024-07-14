<?php
$day = $_GET['day'];
$apiMovieBySchedule = !empty($day) ? 'http://localhost/book_movie_ticket_be/api/movie/getBySchedule?day=' . $day : 'http://localhost/book_movie_ticket_be/api/movie/getBySchedule?day=' . date("Y-m-d", strtotime($dateList[0]));
$responseMovieBySchedule = file_get_contents($apiMovieBySchedule);
$dataMovieBySchedule = (object)json_decode($responseMovieBySchedule, true);
?>
<div class="movie-schedule-main">
    <?php
    $data = $dataMovieBySchedule->data[0];
    include $_SERVER['DOCUMENT_ROOT'] . '/Book-movie-tickets/src/components/ShowTime/ShowTime.php';
    ?>
</div>
<div class="row movie-schedule-extra">
    <?php
    for ($i = 1; $i < count($dataMovieBySchedule->data); $i++) {
    ?>
        <div class="col-lg-6 movie-schedule-extra__left">
            <?php
            $data = $dataMovieBySchedule->data[$i];
            include $_SERVER['DOCUMENT_ROOT'] . '/Book-movie-tickets/src/components/ShowTime/ShowTime.php';
            ?>
        </div>
    <?php
    }
    ?>
</div>