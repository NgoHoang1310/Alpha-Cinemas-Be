<?php
$SIDE_BARS = array(
    ['icon' => 'fas fa-home', 'title' => "Bảng điều khiển", "link" => "http://localhost/Book-movie-tickets/alphacinemas.vn/dashboard"],
    ['icon' => 'fas fa-user', 'title' => "Quản lý người dùng", "link" => "http://localhost/Book-movie-tickets/alphacinemas.vn/manage-users"],
    ['icon' => 'fas fa-film', 'title' => "Quản lí phim", "link" => "http://localhost/Book-movie-tickets/alphacinemas.vn/manage-movies"],
    ['icon' => 'fa-solid fa-calendar', 'title' => "Quản lí lịch chiếu", "link" => "http://localhost/Book-movie-tickets/alphacinemas.vn/manage-schedules"],
    ['icon' => 'fa-solid fa-couch', 'title' => "Quản lí ghế ngồi", "link" => "http://localhost/Book-movie-tickets/alphacinemas.vn/manage-seats"],
    ['icon' => 'fas fa-theater-masks', 'title' => "Quản lí rạp chiếu", "link" => "http://localhost/Book-movie-tickets/alphacinemas.vn/manage-theaters"],
    ['icon' => 'fa-regular fa-money-bill-1', 'title' => "Quản lí giá ghế", "link" => "http://localhost/Book-movie-tickets/alphacinemas.vn/manage-prices"],
    ['icon' => 'fa-solid fa-rectangle-ad', 'title' => "Quản lí quảng cáo", "link" => "http://localhost/Book-movie-tickets/alphacinemas.vn/manage-banners"],
    ['icon' => 'fas fa-exchange-alt', 'title' => "Quản lí giao dịch", "link" => "http://localhost/Book-movie-tickets/alphacinemas.vn/manage-transactions"],
);
?>

<div class="sidebar-wrapper">
    <div class="sidebar__user"><img class="sidebar__user-avatar mb-3" src="<?php echo $currentUser->avatar ?>" alt="User Image">
        <div>
            <p class="sidebar__user-name"><b><?php echo $currentUser->userName ?></b></p>
            <p class="sidebar__user-designation">Chào mừng bạn trở lại</p>
        </div>
    </div>
    <div class="sidebar-list">
        <?php

        $currentURL = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        foreach ($SIDE_BARS as $item) {
        ?>
            <a href="<?php print_r($item['link']) ?>" class="sidebar-list__item <?php echo $currentURL === $item['link'] ? "sidebar-active" : "";  ?> ">
                <div class="sidebar-list__item--icon"><i class="<?php print_r($item['icon']) ?>"></i></div>
                <div class="sidebar-list__item--text"><?php print_r($item['title']) ?></div>
            </a>
        <?php
        }
        ?>
    </div>
</div>