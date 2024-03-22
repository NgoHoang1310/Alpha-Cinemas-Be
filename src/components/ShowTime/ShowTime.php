<?php
$apiTime = 'http://localhost/book_movie_ticket_be/api/movieschedule/get?movieId=' . $data['id'];
// $apiTime = 'http://localhost/book_movie_ticket_be/api/movieschedule/get';
$responseTime = file_get_contents($apiTime);
$dataTime = (object)json_decode($responseTime, true);
?>
<div class="row movie-schedule-content">
    <div class="col-md-3 movie-schedule-content__thumb">
        <?php
        $cardData = $data;
        include '/Applications/Xampp/htdocs/Book-movie-tickets/src/components/MovieCard/Card.php';
        ?>
    </div>
    <div class="col-md-9 movie-schedule-content__detail">
        <div class="movie-schedule-content__detail--info">
            <h1><a href=""><?php echo $data['title'] ?></a></h1>
            <div class="movie-info">
                <div class="movie-category">
                    <i class="fa-solid fa-tag"></i>
                    <?php echo $data['category'] ?>
                </div>
                <div class="movie-duration">
                    <i class="fa-solid fa-clock"></i>
                    <?php echo $data['duration'] ?>phút
                </div>
            </div>
        </div>
        <div class="movie-schedule-content__detail--showtime">
            <div class="movie-showtime">
                <h3 class="movie-showtime__heading">2D PHỤ ĐỀ</h3>
                <div class="movie-showtime__list">
                    <?php
                    foreach ($data['screeningTimes'] as $time) {
                    ?>
                        <div class="movie-showtime__item">
                            <p class="time" time="<?php echo $time ?>" movie-id="<?php echo $data['id'] ?>" onclick="handleClickOnTime(this)" data-bs-toggle="modal" data-bs-target="#bookingModal"><?php echo date("H:i", strtotime($time)) ?></p>
                            <p class="seat">165 ghế trống</p>
                        </div>
                    <?php
                    }

                    ?>


                </div>
            </div>
        </div>
    </div>
</div>