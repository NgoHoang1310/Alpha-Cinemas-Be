<?php
$movieId = $_GET['movieId'];
$time = $_GET['time'];

$currentTheater = (object)json_decode($_COOKIE['currentTheater']);

$apiUrl = 'http://localhost/book_movie_ticket_be/api/theater/get';
$response = file_get_contents($apiUrl);
$data = (object)json_decode($response, true);

$apiGetAMovieByTime = "http://localhost/book_movie_ticket_be/api/movie/getAMovieByTime?movieId=" . $movieId . "&time=" . $time;
$responseMovie = file_get_contents($apiGetAMovieByTime);
$dataMovie = (object)json_decode($responseMovie, true);

?>

<div class="modal-header">
    <h1 class="modal-title fs-3" id="exampleModalLabel">BẠN ĐANG ĐẶT VÉ XEM PHIM</h1>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
    <h1 class="text-center primary-text" id="tenphim"><?php echo $dataMovie->data[0]['title'] ?></h1>
    <table class="table table-striped table-hover table-lg">
        <thead>
            <tr>
                <th class="text-center" style="width: 30%; padding: 18px 0;">
                    <h4 class="fs-2">Rạp chiếu</h4>
                </th>
                <th class="text-center" style="width: 30%; padding: 18px 0;">
                    <h4 class="fs-2">Ngày chiếu</h4>
                </th>
                <th class="text-center" style="width: 30%; padding: 18px 0;">
                    <h4 class="fs-2">Giờ chiếu</h4>
                </th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="text-lg-center fw-bold" style="padding: 24px 0;">
                    <h3 class="fs-3">
                        <span id="theater">
                            <span class="fw-bold">
                                Alpha
                                <?php
                                if ($currentTheater->theater) {
                                    foreach ($data->data as $theater) {
                                        if ($currentTheater->theater == $theater['code']) {
                                            echo '' . $theater['theaterName'];
                                        }
                                    }
                                } else {
                                    echo '' . "Thanh Xuân";
                                }
                                ?>
                            </span>
                        </span>
                    </h3>
                </td>
                <td class="text-lg-center fw-bold" style="padding: 24px 0;">
                    <h3 class="fs-3"><span id="showDay"><span class="fw-bold"><?php echo $dataMovie->data[0]['startDate'] ?></span></span></h3>
                </td>
                <td class="text-lg-center fw-bold" style="padding: 24px 0;">
                    <h3 class="fs-3"><span id="showTime"><span class="fw-bold"><?php echo date('H:i', strtotime($dataMovie->data[0]['time'])) ?></span></span></h3>
                </td>
            </tr>
        </tbody>
    </table>
</div>
<div class="modal-footer">
    <button onclick="handleClickModalBuyBtn(this)" data-movie-id="<?php echo $dataMovie->data[0]['id'] ?>" data-date="<?php echo $dataMovie->data[0]['startDate'] ?>" data-time="<?php echo $dataMovie->data[0]['time'] ?>" class="btn btn-primary btn-lg">Mua vé <i class="fas fa-ticket-alt"></i></button>
</div>
</div>