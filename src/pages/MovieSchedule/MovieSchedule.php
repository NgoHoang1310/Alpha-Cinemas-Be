<?php
include '/Applications/Xampp/htdocs/Book-movie-tickets/src/components/Header/Header.php';
include '/Applications/Xampp/htdocs/Book-movie-tickets/src/ultils/genarateSchedule.php';
include '/Applications/Xampp/htdocs/Book-movie-tickets/src/ultils/convertDate.php';

$dateList = generateDate("7");
?>

<div class="movie-container">
    <div class="container-md movie-schedule">
        <div class="movie-schedule-nav">
            <?php
            // Sử dụng ví dụ
            foreach ($dateList as $date) {
            ?>
                <div value="<?php echo date("Y-m-d", strtotime($date)) ?>" class="movie-schedule-nav__item<?php if ($date === $dateList[0]) echo " nav-active" ?>" onclick="handleSortMovieByDay(this)"><span><?php echo date("d", strtotime($date)) ?></span>/<?php echo date("m", strtotime($date)) ?>-<?php echo convertDate(date("l", strtotime($date))) ?></div>
            <?php
            }
            ?>
        </div>
        <div class="default-height movie-schedule-content">
            <?php
            include '/Applications/Xampp/htdocs/Book-movie-tickets/src/pages/MovieSchedule/Movie.php';
            ?>
        </div>
    </div>
</div>