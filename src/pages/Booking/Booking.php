<?php
$user = (object)json_decode($_COOKIE['userData'], true);
if (empty($user->id)) {
    header('location:http://localhost/Book-movie-tickets/alphacinemas.vn/login');
}
include '/Applications/XAMPP/xamppfiles/htdocs/Book-movie-tickets/src/components/Header/Header.php';
include '/Applications/XAMPP/xamppfiles/htdocs/Book-movie-tickets/src/ultils/checkRoom.php';
include '/Applications/XAMPP/xamppfiles/htdocs/Book-movie-tickets/src/ultils/checkSeat.php';
include '/Applications/XAMPP/xamppfiles/htdocs/Book-movie-tickets/src/ultils/checkPrice.php';



$movieId = $_GET['m'];
$time = $_GET['t'];

$apiGetAMovieByTime = "http://localhost/book_movie_ticket_be/api/movie/getAMovieByTime?movieId=" . $movieId . "&time=" . $time;
$responseMovie = file_get_contents($apiGetAMovieByTime);
// $data = (array)json_decode($responseMovie, true);
$dataMovie = (object)json_decode($responseMovie, true);
// Mã hóa chuỗi JSON
$data_encoded = json_encode($dataMovie->data);

setcookie("currentMovie", $data_encoded);
// Lưu chuỗi JSON đã mã hóa vào cookie);

// setcookie("cookie_name", $data_encoded, time() + (86400 * 30), "/");
echo $data_encoded;

$apiGetSeats = "http://localhost/book_movie_ticket_be/api/seat/get?roomId=" . $dataMovie->data[0]['roomId'];
$responseSeat = file_get_contents($apiGetSeats);
$dataSeat = (object)json_decode($responseSeat, true);

$apiGetTypeSeat = "http://localhost/book_movie_ticket_be/api/typeseat/get";
$responseTypeSeat = file_get_contents($apiGetTypeSeat);
$dataTypeSeat = (object)json_decode($responseTypeSeat, true);

$apiGetPrices = "http://localhost/book_movie_ticket_be/api/priceseat/get";
$responsePrice = file_get_contents($apiGetPrices);
$dataPrice = (object)json_decode($responsePrice, true);

?>

<div class="booking-container">
    <div class="container-md main-content mb-5">
        <div class="row booking pt-5">
            <div class="col-md-8 pannelShowSeat">
                <div class="mb-5">
                    <h3 class="fs-1"><a class="primary-text" href="http://localhost/Book-movie-tickets/alphacinemas.vn/home" previewlistener="true">Trang chủ</a> &gt; <a class="primary-text" href="#">Đặt vé</a> &gt; <span><a class="primary-text" href="/chi-tiet-phim.htm?gf=722ed94a-ade3-488d-9845-8b7634cfd64a" previewlistener="true"><?php echo $dataMovie->data[0]['title'] ?></a></span></h3>
                </div>
                <div class="note-seat-status fw-bold d-flex justify-content-center">
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-8">
                        <img width="35" height="35" src="http://localhost/Book-movie-tickets/assets/images/seats/seat-unselect-normal.png">
                        <span class="note-seat-status-label">Ghế trống</span>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-8">
                        <img width="35" height="35" src="http://localhost/Book-movie-tickets/assets/images/seats/seat-select-normal.png">
                        <span class="note-seat-status-label">Ghế đang chọn</span>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-8">
                        <img width="35" height="35" src="http://localhost/Book-movie-tickets/assets/images/seats/seat-buy-normal.png">
                        <span class="note-seat-status-label">Ghế ghế đã bán</span>
                    </div>
                </div>
                <div class="seat-diagram">
                    <img class="w-100 mt-5 img-responsive" src="http://localhost/Book-movie-tickets/assets/images/ic-screen.png">
                    <div class="pe-5 ps-5 check-show">
                        <?php
                        $rows = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H'];
                        foreach ($rows as $row) {
                        ?>
                            <div class="row full-width d-flex justify-content-center">
                                <?php
                                foreach ($dataSeat->data as $seat) {
                                    if ($row == $seat['rowSeat']) {
                                ?>
                                        <div seat-id="<?php echo $seat['id'] ?>" price="<?php echo checkPrice($seat['typeSeatId'], $dataPrice->data) ?>" type="<?php echo checkSeatType($seat['typeSeatId'], $dataTypeSeat->data) ?>" status="<?php echo $seat['status'] ?>" onclick="handleClickOnSeat(this)" class=" col-md-1 seat-cell <?php echo checkSeatStatus($seat['typeSeatId'], $dataTypeSeat->data, $seat['status']) ?>"><?php echo $seat['rowSeat'] . $seat['columnSeat'] ?>
                                        </div>
                                <?php
                                    }
                                }
                                ?>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
                <div class="seat-type-panel w-100 d-flex fs-3">
                    <div class="seat-type seat-type-standard col-lg-2 col-md-2">
                        <div class="row align-items-center ps-3 pe-3">
                            <div class="col-md-6">
                                <img class="seat-type-image" style="width: 100%; max-width: 50px;" src="http://localhost/Book-movie-tickets/assets/images/seats/seat-unselect-normal.png">
                            </div>
                            <div class="col-md-6">
                                <span class="seat-type-name fw-bold ">Ghế thường</span>
                            </div>
                            <div class="col-md">
                                <span id="seat-normal-quantity" class="seat-quantity seat-empty-quantity seat-normal-quantity">70.000đ</span>
                            </div>
                        </div>
                    </div>
                    <div class="seat-type seat-type-vip col-lg-2 col-md-2">
                        <div class="row align-items-center ps-3 pe-3">
                            <div class="col-md-6">
                                <img class="seat-type-image" style="width: 100%; max-width: 50px;" src="http://localhost/Book-movie-tickets/assets/images/seats/seat-unselect-vip.png">
                            </div>
                            <div class="col-md-6">
                                <span class="seat-type-name fw-bold">Ghế VIP</span>
                            </div>
                            <div class="col-md">
                                <span id="seat-vip-quantity" class="seat-quantity seat-vip-quantity">80.000đ</span>
                            </div>
                        </div>
                    </div>
                    <div class="seat-type seat-type-double col-lg-2 col-md-2">
                        <div class="row align-items-center ps-3 pe-3">
                            <div class="col-md-6">
                                <img class="seat-type-image" style="width: 100%; max-width: 50px;" src="http://localhost/Book-movie-tickets/assets/images/seats/seat-unselect-double.png">
                            </div>
                            <div class="col-md-6">
                                <span class="seat-type-name fw-bold">Ghế đôi</span>
                            </div>
                            <div class="col-md">
                                <span id="seat-double-quantity" class="seat-quantity seat-double-quantity">90.000đ</span>
                            </div>
                        </div>
                    </div>
                    <div class="seat-type total-money col-lg-2 col-md-2">
                        <div class="row">
                            <div class="total-money-label fw-bold">
                                Tổng tiền
                            </div>
                            <div id="total-money" class="total-money-value primary-text fs-1">

                            </div>
                        </div>
                    </div>
                    <div class="seat-type time-left col-lg-4">
                        <div class="row">
                            <div class="time-to-left-label fw-bold">
                                Thời gian còn lại
                            </div>
                            <div id="time-left" class="time-to-left-value fw-bold text-end"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 pannelMovieInfo">
                <div class="row ">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        <div class="pi-img-wrapper">
                            <img class="img-responsive" style="width: 100%" alt="" src="<?php echo $dataMovie->data[0]['thumbPath'] ?>">
                            <span style="position: absolute; top: 10px; left: 10px;">
                                <img src="/Assets/Common/icons/films/p.png" class="img-responsive">
                            </span>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        <h3 class="fw-bold primary-text fs-1 mt-5"><?php echo $dataMovie->data[0]['title'] ?></h3>
                        <h4 class="fw-bold fs-3">2D Phụ đề</h4>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-4 col-xs-12">
                        <ul class="list-unstyled" style="margin-bottom: 0px;">
                            <li class="">
                                <div class="row p-3">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 ">
                                        <i class="fa fa-tags"></i>&nbsp;Thể loại
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 ">
                                        <span class="fw-bold"><?php echo $dataMovie->data[0]['category'] ?></span>
                                    </div>
                                </div>
                            </li>
                            <li class="">
                                <div class="row p-3">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 ">
                                        <i class="fa-solid fa-clock"></i>&nbsp;Thời lượng
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 ">
                                        <span class="fw-bold"><?php echo $dataMovie->data[0]['duration'] ?> phút</span>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="break-bar"></div>
                    <div class="col-lg-12 col-md-12 col-sm-4 col-xs-12">
                        <ul class="list-unstyled">
                            <li class="">
                                <div class="row p-3">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                        <i class="fa fa-institution"></i>&nbsp;Rạp chiếu
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                        <span class="fw-bold">Beta Thái Nguyên</span>
                                    </div>
                                </div>
                            </li>
                            <li class="">
                                <div class="row p-3">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                        <i class="fa fa-calendar"></i>&nbsp;
                                        Ngày chiếu
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"><span class="fw-bold"><?php echo $dataMovie->data[0]['startDate'] ?></span></div>
                                </div>
                            </li>
                            <li class="">
                                <div class="row p-3">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"><i class="fa-solid fa-clock"></i>&nbsp;Giờ chiếu</div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"><span class="fw-bold"><?php echo $dataMovie->data[0]['time'] ?></span></div>
                                </div>
                            </li>
                            <li class="">
                                <div class="row p-3">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"><i class="fa fa-desktop"></i>&nbsp;Phòng chiếu</div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"><span class="fw-bold"><?php echo checkRoom($dataMovie->data[0]['roomId']) ?></span></div>
                                </div>
                            </li>
                            <li class="">
                                <div class="row p-3">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"><i class="fa fa-cubes"></i>&nbsp;Ghế ngồi</div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"><span id="seat-pos" class="seat-name-selected fw-bold"></span></div>
                                </div>
                            </li>
                        </ul>
                        <div class="text-center">
                            <button onclick="handleContinueBooking(this)" class="button-primary btn-payment" style="font-weight: normal;"><span><i style="transform: rotate(-45deg); margin-right: 4px;" class="fa fa-ticket mr3"></i></span>TIẾP TỤC</button>
                            <a href="#dieukhoan-pop-up" class="fancybox-fast-view dieu-khoan-pop-up-hidden" style="font-weight: normal;"><span><i style="transform: rotate(-45deg);" class="fa fa-ticket mr3"></i></span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>