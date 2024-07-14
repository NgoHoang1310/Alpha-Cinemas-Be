<?php
include $_SERVER['DOCUMENT_ROOT'] . '/Book-movie-tickets/src/components/Header/Header.php';

$movieId = $_GET['m'];
$apiGetAMovie = "http://localhost/book_movie_ticket_be/api/movie/getMovieById?movieId=" . $movieId;
$responseMovie = file_get_contents($apiGetAMovie);
$dataMovie = (object)json_decode($responseMovie, true);
?>
<div class="movie-detail-container mt-default">
    <div class="container-md pt-5">
        <div class="fs-1 fw-bold mb-5 primary-text "><a class="primary-text text-decoration-underline" href="http://localhost/Book-movie-tickets/alphacinemas.vn/home">Trang chủ</a> > <span class="text-decoration-underline">Thông tin chi tiết</span></div>
        <div class="row ">
            <div class="col-md-3 movie-detail-thumb">
                <?php
                $cardData = $dataMovie->data[0];
                include $_SERVER['DOCUMENT_ROOT'] . '/Book-movie-tickets/src/components/MovieCard/Card.php';
                ?>
            </div>
            <div class="col-md-9 movie-detail-infor ">
                <h1 class="movie-detail-infor__title primary-text fs-1 mb-3"><?php echo $dataMovie->data[0]['title'] ?></h1>
                <div class="movie-detail-infor__desc fs-3 mb-5"><span class="fw-bold fs-2">Tóm tắt: </span><?php echo $dataMovie->data[0]['description'] ?></div>
                <div class="movie-detail-infor__director fs-3"><span class="fw-bold fs-2">Thể loại: </span><?php echo $dataMovie->data[0]['category'] ?></div>
                <div class="movie-detail-infor__director fs-3"><span class="fw-bold fs-2">Thời lượng: </span><?php echo $dataMovie->data[0]['duration'] ?> phút</div>
                <div class="movie-detail-infor__director fs-3"><span class="fw-bold fs-2">Đạo diễn: </span><?php echo $dataMovie->data[0]['director'] ?></div>
                <div class="movie-detail-infor__cast fs-3"><span class="fw-bold fs-2">Diễn viên: </span><?php echo $dataMovie->data[0]['cast'] ?></div>
                <div class="movie-detail-infor__broadcast fs-3"><span class="fw-bold fs-2">Ngày chiếu: </span><?php echo $dataMovie->data[0]['startDate'] ?></div>
                <div class="movie-detail-infor__language fs-3"><span class="fw-bold fs-2">Ngôn ngữ: </span><?php echo $dataMovie->data[0]['language'] ?></div>
            </div>
        </div>
    </div>
</div>