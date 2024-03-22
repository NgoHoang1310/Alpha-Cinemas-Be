<?php

$apiUrl = 'http://localhost/book_movie_ticket_be/api/theater/get';
$response = file_get_contents($apiUrl);
$data = (object)json_decode($response, true);
?>

<div class="wrapper">
    <div class="container-md header">
        <div class="header__logo">
            <a href="http://localhost/Book-movie-tickets/alphacinemas.vn/home">
                <img src="http://localhost/Book-movie-tickets/assets/images/logo.jpg" alt="">
            </a>
        </div>
        <div class="header__location">
            <select class="header__location--select">
                <?php
                if (($data->code === 0) && !empty($data->data)) {
                    foreach ($data->data as $theater) {
                ?>
                        <option class="header__location--option" value="<?php print_r($theater['code']) ?>">Alpha <?php print_r($theater['theaterName']) ?></option>
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
                <a href=""> GIÁ VÉ</a>
            </div>
            <div class="header__nav__item">
                <a href=""> TIN MỚI VÀ ƯU ĐÃI</a>
            </div>
            <div class="header__nav__item">
                <a href=""> NHƯỢNG QUYỀN</a>
            </div>
        </div>
        <div class="header__auth">
            <?php
            $user = (object)json_decode($_COOKIE['userData'], true);
            if (!empty($user->id)) {
            ?>
                <div class="header__auth--account"><a href="http://localhost/Book-movie-tickets/alphacinemas.vn/home"><img class="avatar" src="http://localhost/Book-movie-tickets/assets/images/logo.jpg" alt=""> <?php echo $user->userName ?></a></div>
            <?php
            } else {
            ?>
                <div class="header__auth--login"><a href="http://localhost/Book-movie-tickets/alphacinemas.vn/login">Đăng nhập</a></div>
                <div class="header__auth--logout"><a href="http://localhost/Book-movie-tickets/alphacinemas.vn/register">Đăng kí</a></div>
            <?php
            }
            ?>
        </div>
    </div>
</div>