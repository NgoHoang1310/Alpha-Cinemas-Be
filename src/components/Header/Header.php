<?php
$currentTheater = (object)json_decode($_COOKIE['currentTheater']);

$apiUrl = 'http://localhost/book_movie_ticket_be/api/theater/get';
$response = file_get_contents($apiUrl);
$data = (object)json_decode($response, true);


?>

<div class="wrapper">
    <div class="container-md header d-flex justify-content-between">
        <div class="header__logo">
            <a href="http://localhost/Book-movie-tickets/alphacinemas.vn/home">
                <img src="http://localhost/Book-movie-tickets/assets/images/logo.jpg" alt="">
            </a>
        </div>
        <div class="header__location">
            <select class="header__location--select" onchange="handleSelectTheater(this)">
                <?php
                if (($data->code === 0) && !empty($data->data)) {
                    foreach ($data->data as $theater) {
                ?>
                        <option <?php echo $currentTheater->theater == $theater['code'] ? "selected" : "" ?> class="header__location--option" value="<?php print_r($theater['code']) ?>">Alpha <?php print_r($theater['theaterName']) ?></option>
                <?php

                    }
                }
                ?>
            </select>
        </div>
        <div class="header__nav">
            <div class="header__nav__item">
                <a href="http://localhost/Book-movie-tickets/alphacinemas.vn/movie-schedule">LỊCH CHIẾU THEO RẠP</a>
            </div>
            <div class="header__nav__item">
                <a href="http://localhost/Book-movie-tickets/alphacinemas.vn/home">PHIM</a>
            </div>
            <div class="header__nav__item">
                <a href="http://localhost/Book-movie-tickets/alphacinemas.vn/theater">RẠP</a>
            </div>
            <div class="header__nav__item">
                <a href="http://localhost/Book-movie-tickets/alphacinemas.vn/price-ticket"> GIÁ VÉ</a>
            </div>
            <div class="header__nav__item">
                <a href="http://localhost/Book-movie-tickets/alphacinemas.vn/transaction">LỊCH SỬ ĐẶT VÉ</a>
            </div>
        </div>
        <div class="header__auth">
            <?php
            $user = (object)json_decode($_COOKIE['userData'], true);
            if (!empty($user->id) && $user->role == 'user') {
            ?>
                <div class="header__auth--account">
                    <a href="http://localhost/Book-movie-tickets/alphacinemas.vn/home">
                        <img class="avatar" src="<?php echo $user->avatar ?>" alt="avatar"> <?php echo $user->userName ?>
                    </a>
                    <div class="header__auth--popper">
                        <div class="header__auth--logout">
                            <div class="icon"><i class="fa-solid fa-right-from-bracket"></i></div>
                            <div onclick="handleLogOut()" class="text">Đăng xuất</div>
                        </div>
                    </div>
                </div>

            <?php
            } else {
            ?>
                <div class="header__auth--login"><a href="http://localhost/Book-movie-tickets/alphacinemas.vn/login">Đăng nhập</a></div>
                <div class="header__auth--register"><a href="http://localhost/Book-movie-tickets/alphacinemas.vn/register">Đăng kí</a></div>
            <?php
            }
            ?>
        </div>
    </div>
</div>