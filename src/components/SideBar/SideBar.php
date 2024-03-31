<?php
$SIDE_BARS = array(
    ['icon' => 'fas fa-home', 'title' => "Bảng điều khiển", "link" => "http://localhost/Book-movie-tickets/alphacinemas.vn/dardboard"],
    ['icon' => 'fas fa-user', 'title' => "Quản lý người dùng", "link" => "http://localhost/Book-movie-tickets/alphacinemas.vn/manage-users"],
    ['icon' => 'fas fa-film', 'title' => "Quản lí phim", "link" => "http://localhost/Book-movie-tickets/alphacinemas.vn/manage-movies"],
    ['icon' => 'fa-solid fa-calendar', 'title' => "Quản lí lịch chiếu", "link" => "http://localhost/Book-movie-tickets/alphacinemas.vn/manage-schedules"],
    ['icon' => 'fa-solid fa-couch', 'title' => "Quản lí ghế ngồi", "link" => "http://localhost/Book-movie-tickets/alphacinemas.vn/manage-seats"],
    ['icon' => 'fas fa-theater-masks', 'title' => "Quản lí rạp chiếu", "link" => "http://localhost/Book-movie-tickets/alphacinemas.vn/manage-theaters"],
    ['icon' => 'fa-regular fa-money-bill-1', 'title' => "Quản lí giá ghế", "link" => "http://localhost/Book-movie-tickets/alphacinemas.vn/manage-prices"],
    ['icon' => 'fa-solid fa-rectangle-ad', 'title' => "Quản lí quảng cáo", "link" => "http://localhost/Book-movie-tickets/alphacinemas.vn/manage-banners"],
);
?>

<div class="sidebar-wrapper">
    <div class="sidebar__user"><img class="sidebar__user-avatar mb-3" src="https://scontent.fhan5-11.fna.fbcdn.net/v/t39.30808-6/419488191_1568161807300861_3128433206747496003_n.jpg?_nc_cat=100&ccb=1-7&_nc_sid=5f2048&_nc_eui2=AeHE7bC7qxhCekVXq7CgmWGdiANdGP_pWpOIA10Y_-lakx8eJAUYtdw8s3pkAs_26LTMcx9MzFFGIsZzeSOhOc9r&_nc_ohc=5XD4W7pYSioAX-pEkAU&_nc_ht=scontent.fhan5-11.fna&oh=00_AfDANoAHx9mN1g4KrvZf_4mRf0TTa0VCAUVmXlPZEzeO3g&oe=660664D6" alt="User Image">
        <div>
            <p class="sidebar__user-name"><b>Ngô Tuấn Hoàng</b></p>
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