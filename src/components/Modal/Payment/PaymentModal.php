<?php
$user = (object)json_decode($_COOKIE['userData']);
$bookingData = (object)json_decode($_COOKIE['bookingData']);


?>

<div class="modal-header">
    <h1 class="modal-title fs-3" id="exampleModalLabel">BẠN ĐANG THANH TOÁN</h1>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
    <h1 class="text-center primary-text" id="tenphim"><?php ?></h1>
    <div class="payment-modal-title d-flex mb-3">
        <img src="http://localhost/Book-movie-tickets/assets/images/ic-inforpayment.png">
        <p class="ms-3 fw-bold fs-2">THÔNG TIN THANH TOÁN</p>
    </div>
    <div class="payment-user-info">
        <div class="row">
            <div class="col-md-4 user-info-item mb-3">
                <span class="user-info-item-label fw-bold mb-3">Họ Tên: </span><br>
                <span class="user-info-item-value"><?php echo $user->userName ?> </span>
            </div>
            <div class="col-md-4 user-info-item">
                <span class="user-info-item-label fw-bold mb-3">Số điện thoại: </span><br>
                <span class="user-info-item-value"></span>
            </div>
            <div class="col-md-4 user-info-item">
                <span class="user-info-item-label fw-bold mb-3">Email: </span><br>
                <span class="user-info-item-value"><?php echo $user->email ?> </span>
            </div>
        </div>
    </div>

    <div class="seat-selected">
        <div class="row">
            <div class="col-md-9 item-seat-type fw-bold">GHẾ</div>
            <div id="seats-modal" class="col-md-3 item-seat-quantity" data-seat-quantity="1" data-seat-price="45000 vnđ "></div>
        </div>
    </div>
    <div class="ticket-selected">
        <div class="row">
            <div class="col-md-8 item-seat-type fw-bold mb-3">TỔNG TIỀN</div>
            <div id="quantity-seat-modal" class="col-md-2 item-seat-quantity" data-seat-quantity="1" data-seat-price="45000 vnđ"></div>
            <div id="total-money-modal" class="col-md-2 item-seat-money"></div>
        </div>
    </div>
</div>
<div class="modal-footer">
    <button class="btn btn-primary fs-2">Mua vé<i class="fas fa-ticket-alt"></i></button>
</div>
</div>