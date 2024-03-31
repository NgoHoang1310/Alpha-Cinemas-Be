<?php
include '/Applications/XAMPP/xamppfiles/htdocs/Book-movie-tickets/src/components/Header/Header.php';
include '/Applications/XAMPP/xamppfiles/htdocs/Book-movie-tickets/src/ultils/checkRoom.php';
$user = (object)json_decode($_COOKIE['userData']);
$bookingData = (object)json_decode($_COOKIE['bookingData']);

$currentMovie = json_decode($_COOKIE['currentMovie']);
if ($currentMovie[0]->id != $_GET['m']) {
    header("location: http://localhost/Book-movie-tickets/alphacinemas.vn/home");
    return;
}
$currentPayment = (object)json_decode($_COOKIE['paymentInfo']);
?>

<div class="payment-container">
    <div class="container-md main-content mb-5">
        <div class="row payment pt-5">
            <div class="col-md-8 pannelPayment">
                <div class="mb-5">
                    <h3 class="fs-1"><a class="primary-text" href="http://localhost/Book-movie-tickets/alphacinemas.vn/home" previewlistener="true">Trang chủ</a> &gt; <a class="primary-text" href="#">Đặt vé</a> &gt; <span><a class="primary-text" href="/chi-tiet-phim.htm?gf=722ed94a-ade3-488d-9845-8b7634cfd64a" previewlistener="true"><?php echo $currentMovie[0]->title ?></a></span></h3>
                </div>
                <div class="row fw-bold d-flex">
                    <h1 class="text-center primary-text" id="tenphim"><?php ?></h1>
                    <div class="payment-modal-title d-flex mb-3">
                        <img src="http://localhost/Book-movie-tickets/assets/images/ic-inforpayment.png">
                        <p class="ms-3 fw-bold fs-2">THÔNG TIN THANH TOÁN</p>
                    </div>
                    <div class="payment-user-info fs-3">
                        <div class="row mb-3">
                            <div class="col-md-4 user-info-item ">
                                <div class="user-info-item-label fw-bold">Họ Tên: </div>
                                <div class="user-info-item-value"><?php echo $user->userName ?> </div>
                            </div>
                            <div class="col-md-4 user-info-item">
                                <div class="user-info-item-label fw-bold">Số điện thoại: </div>
                                <div class="user-info-item-value"></div>
                            </div>
                            <div class="col-md-4 user-info-item">
                                <div class="user-info-item-label fw-bold">Email: </div>
                                <div class="user-info-item-value"><?php echo $user->email ?> </div>
                            </div>
                        </div>
                    </div>

                    <div class="break-bar"></div>

                    <div class="seat-selected mt-3">
                        <div class="row mb-3">
                            <div class="col-md-8 item-seat-type fw-bold">GHẾ</div>
                            <div id="seats-modal" class="col-md-4 item-seat-quantity" data-seat-quantity="1" data-seat-price="45000 vnđ "><?php foreach ($currentPayment->seats as $seat) echo $seat->value . ", " ?></div>
                        </div>
                    </div>
                    <div class="ticket-selected">
                        <div class="row mb-3">
                            <div class="col-md-8 item-seat-type fw-bold mb-3">TỔNG TIỀN</div>
                            <!-- <div id="quantity-seat-modal" class="col-md-2 item-seat-quantity " data-seat-quantity="1" data-seat-price="45000 vnđ"></div> -->
                            <div id="total-money-modal" class="col-md-4 item-seat-money fs-1 primary-text"><?php echo number_format($currentPayment->total, 0, ',', '.')  ?> vnđ</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 pannelMovieInfo">
                <div class="row ">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        <div class="pi-img-wrapper">
                            <img class="img-responsive" style="width: 100%" alt="" src="<?php echo $currentMovie[0]->thumbPath; ?>">
                            <span style="position: absolute; top: 10px; left: 10px;">
                                <img src="/Assets/Common/icons/films/p.png" class="img-responsive">
                            </span>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        <h3 class="fw-bold primary-text fs-1 mt-5"><?php echo $currentMovie[0]->title; ?></h3>
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
                                        <span class="fw-bold"><?php echo $currentMovie[0]->category; ?></span>
                                    </div>
                                </div>
                            </li>
                            <li class="">
                                <div class="row p-3">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 ">
                                        <i class="fa-solid fa-clock"></i>&nbsp;Thời lượng
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 ">
                                        <span class="fw-bold"><?php echo $currentMovie[0]->duration; ?> phút</span>
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
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"><span class="fw-bold"><?php echo $currentMovie[0]->startDate; ?></span></div>
                                </div>
                            </li>
                            <li class="">
                                <div class="row p-3">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"><i class="fa-solid fa-clock"></i>&nbsp;Giờ chiếu</div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"><span class="fw-bold"><?php echo $currentMovie[0]->time; ?></span></div>
                                </div>
                            </li>
                            <li class="">
                                <div class="row p-3">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"><i class="fa fa-desktop"></i>&nbsp;Phòng chiếu</div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"><span class="fw-bold"><?php echo checkRoom($currentMovie[0]->roomId) ?></span></div>
                                </div>
                            </li>

                        </ul>
                        <div class="text-center">
                            <button onclick="handlePay(this)" class="button-primary btn-payment" style="font-weight: normal;"><span><i style="transform: rotate(-45deg); margin-right: 4px;" class="fa fa-ticket mr3"></i></span>THANH TOÁN</button>
                            <a href="#dieukhoan-pop-up" class="fancybox-fast-view dieu-khoan-pop-up-hidden" style="font-weight: normal;"><span><i style="transform: rotate(-45deg);" class="fa fa-ticket mr3"></i></span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>