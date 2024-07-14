<?php
include $_SERVER['DOCUMENT_ROOT'] . '/Book-movie-tickets/src/components/Header/Header.php';

$apiTheater = 'http://localhost/book_movie_ticket_be/api/theater/getTheaterByCode?code=' . ($currentTheater->theater ? $currentTheater->theater : 'TX');
$responseTheater = file_get_contents($apiTheater);
$dataTheater = (object)json_decode($responseTheater, true);

$apiHotMovies = 'http://localhost/book_movie_ticket_be/api/movie/getMoviesHot';
$responseHotMovies = file_get_contents($apiHotMovies);
$dataHotMovies = (object)json_decode($responseHotMovies, true);
?>

<div class="theater-container mt-default">
    <div class="container-md theater">
        <div class="col-md-6 theater-info">
            <h1 class="theater-info__title">Alpha <?php echo $dataTheater->data[0]['theaterName'] ?></h1>
            <div class="theater-info__thumb">
                <img class="rounded" loading="lazy" src="<?php echo $dataTheater->data[0]['thumbPath'] ?>" alt="">
            </div>
            <p class="theater-info__description">
                <?php echo $dataTheater->data[0]['description'] ?>
            </p>
        </div>
        <div class="col-md-6 theater-movies">
            <h1 class="theater-movies__heading">PHIM ĐANG HOT</h1>
            <div class="row theater-movies__list">

                <?php
                foreach ($dataHotMovies->data as $movie) {
                ?>
                    <div class="col-6 theater-movies__movie-item">
                        <?php
                        $cardData = $movie;
                        include $_SERVER['DOCUMENT_ROOT'] . '/Book-movie-tickets/src/components/MovieCard/Card.php';
                        ?>
                        <div class="theater-movies__movie-item--name">
                            <a class="d-block text-center primary-text link " href="http://localhost/Book-movie-tickets/alphacinemas.vn/movie-detail?m=<?php echo $movie['id'] ?>"><?php echo $movie['title'] ?></a>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
    <?php

    ?>
    <h1>Home page</h1>
</div>