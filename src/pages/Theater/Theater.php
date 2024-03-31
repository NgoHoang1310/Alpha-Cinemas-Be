<?php
include '/Applications/Xampp/htdocs/Book-movie-tickets/src/components/Header/Header.php';

//api banner

?>

<div class="theater-container">
    <div class="container-md theater">
        <div class="col-md-6 theater-info">
            <h1 class="theater-info__title">Beta Thái Nguyên</h1>
            <div class="theater-info__thumb">
                <img loading="lazy" src="https://files.betacorp.vn/files/ecm/2018/07/04/35359362-242694916502971-7052850785574453248-n-103924-040718-45.png" alt="">
            </div>
            <p class="theater-info__description">
                Beta Cinemas Thái Nguyên có vị trí trung tâm, tọa lạc tại Hoàng Gia Plaza. Rạp tự hào là rạp phim tư nhân duy nhất và đầu tiên sở hữu hệ thống phòng chiếu phim đạt chuẩn Hollywood tại TP. Thái Nguyên.

                Rạp được trang bị hệ thống máy chiếu, phòng chiếu hiện đại với 100% nhập khẩu từ nước ngoài, với 4 phòng chiếu tương được 535 ghế ngồi. Hệ thống âm thanh Dolby 7.1 và hệ thống cách âm chuẩn quốc tế đảm bảo chất lượng âm thanh sống động nhất cho từng thước phim bom tấn.

                Mức giá xem phim tại Beta Cinemas Thái Nguyên rất cạnh tranh: giá vé 2D chỉ từ 40.000 VNĐ và giá vé 3D chỉ từ 60.000 VNĐ. Không chỉ có vậy, rạp còn có nhiều chương trình khuyến mại, ưu đãi hàng tuần như đồng giá vé 40.000 vào các ngày Thứ 3 vui vẻ, Thứ 4 Beta's Day, đồng giá vé cho Học sinh sinh viên, người cao tuổi, trẻ em.....
            </p>
        </div>
        <div class="col-md-6 theater-movies">
            <h1 class="theater-movies__heading">PHIM ĐANG HOT</h1>
            <div class="row theater-movies__list">
                <div class="col-6 theater-movies__movie-item">
                    <?php
                    include '/Applications/Xampp/htdocs/Book-movie-tickets/src/components/MovieCard/Card.php';
                    ?>
                    <div class="theater-movies__movie-item--name">
                        <a class="d-block text-center primary-text link " href="">Quật Mộ Trùng Ma</a>
                    </div>
                </div>
                <div class="col-6 theater-movies__movie-item">
                    <?php
                    include '/Applications/Xampp/htdocs/Book-movie-tickets/src/components/MovieCard/Card.php';
                    ?>
                    <div class="theater-movies__movie-item--name">
                        <a class="d-block text-center primary-text link" href="">Quật Mộ Trùng Ma</a>
                    </div>
                </div>
                <div class="col-6 theater-movies__movie-item">
                    <?php
                    include '/Applications/Xampp/htdocs/Book-movie-tickets/src/components/MovieCard/Card.php';
                    ?>
                    <div class="theater-movies__movie-item--name">
                        <a class="d-block text-center primary-text link" href="">Quật Mộ Trùng Ma</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php

    ?>
    <h1>Home page</h1>
</div>