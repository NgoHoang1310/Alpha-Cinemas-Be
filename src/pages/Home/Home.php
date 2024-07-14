<?php
include $_SERVER['DOCUMENT_ROOT'] . '/Book-movie-tickets/src/components/Header/Header.php';

//api banner
$apiBanner = 'http://localhost/book_movie_ticket_be/api/banner/get';
$responseBanner = file_get_contents($apiBanner);
$dataBanner = (object)json_decode($responseBanner, true);

?>

<div class="home-container mt-default">
    <div class="slider">
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <?php
                if (($dataBanner->code === 0) && !empty($dataBanner->data)) {
                    for ($i = 0; $i < count($dataBanner->data); $i++) {
                ?>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="
                        <?php echo $i ?>" class="active" aria-current="true" aria-label="Slide 1"></button>
                <?php
                    }
                }

                ?>
            </div>
            <div class="carousel-inner">
                <?php
                if (($dataBanner->code === 0) && !empty($dataBanner->data)) {
                    foreach ($dataBanner->data as $banner) {
                ?>
                        <div class="carousel-item <?php echo ($banner['id'] == 10) ? "active" : "" ?>">
                            <img loading="lazy" src="<?php print_r($banner['thumbPath']) ?>" class="d-block w-100" alt="...">
                        </div>
                <?php

                    }
                }
                ?>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <div class="default-height content">
        <div class="container-md main-content">
            <div class="nav-movies">
                <div class="nav-movies__item" value="CM" onclick="handleLoadMovie(this)">Phim sắp chiếu</div>
                <div class="nav-movies__item nav-active" value="NS" onclick="handleLoadMovie(this)">Phim đang chiếu</div>
                <div class="nav-movies__item" value="SP" onclick="handleLoadMovie(this)">Suất chiếu đặc biệt</div>
            </div>
            <div class="row movies">
                <?php
                include $_SERVER['DOCUMENT_ROOT'] . '/Book-movie-tickets/src/components/Movies/Movies.php'
                ?>
            </div>


        </div>
    </div>
</div>
<div class="modal fade" id="scheduleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div id="schedule-modal" class="modal-content p-3">
            <?php
            include $_SERVER['DOCUMENT_ROOT'] . '/Book-movie-tickets/src/components/Schedule/Schedule.php';
            ?>
        </div>
    </div>
</div>