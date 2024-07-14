<?php
include $_SERVER['DOCUMENT_ROOT'] . '/Book-movie-tickets/src/components/Header/Header.php';

$apiTheater = 'http://localhost/book_movie_ticket_be/api/theater/getTheaterByCode?code=' . ($currentTheater->theater ? $currentTheater->theater : 'TX');
$responseTheater = file_get_contents($apiTheater);
$dataTheater = (object)json_decode($responseTheater, true);
?>

<div class="price-ticket--container">
    <div class="container-md main-content mb-3">
        <div class="row price-ticket">
            <div class="col-md-12 theater-info">
                <h1 class="theater-info__title">Giá vé rạp Alpha <?php echo $dataTheater->data[0]['theaterName'] ?></h1>
                <div class="theater-info__thumb">
                    <img class="rounded" loading="lazy" src="<?php echo $dataTheater->data[0]['imgPrice'] ?>" alt="">
                </div>
            </div>
        </div>
    </div>
</div>