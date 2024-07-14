<?php
include("/Applications/XAMPP/xamppfiles/htdocs/Book-movie-tickets/src/components/Header/AdminHeader.php");

$user = (object)json_decode($_COOKIE['userData'], true);
if (empty($user->id)) {
    header('location:http://localhost/Book-movie-tickets/alphacinemas.vn/login');
    return;
}

if (!empty($user->id) && $user->role != "admin") {
    header('location:http://localhost/Book-movie-tickets/alphacinemas.vn/login');
    return;
}

$apiTransactions = 'http://localhost/book_movie_ticket_be/api/dashboard/getNewTransactions';
$responseTransactions = file_get_contents($apiTransactions);
$dataTransactions = (object)json_decode($responseTransactions, true);

$apiUsers = 'http://localhost/book_movie_ticket_be/api/dashboard/getNewUsers';
$responseUsers = file_get_contents($apiUsers);
$dataUsers = (object)json_decode($responseUsers, true);
// 
$apiCountUser = 'http://localhost/book_movie_ticket_be/api/dashboard/countTotalUser';
$responseCountUser = file_get_contents($apiCountUser);
$dataCountUser = (object)json_decode($responseCountUser, true);

$apiCountMovie = 'http://localhost/book_movie_ticket_be/api/dashboard/countTotalMovie';
$responseMovie = file_get_contents($apiCountMovie);
$dataCountMovie = (object)json_decode($responseMovie, true);

$apiCountTicketSold = 'http://localhost/book_movie_ticket_be/api/dashboard/countTicketSold';
$responseCountTicketSold = file_get_contents($apiCountTicketSold);
$dataCountTicketSold = (object)json_decode($responseCountTicketSold, true);

$apiTotalRevenue = 'http://localhost/book_movie_ticket_be/api/dashboard/totalRevenue';
$responseTotalRevenue = file_get_contents($apiTotalRevenue);
$dataTotalRevenue = (object)json_decode($responseTotalRevenue, true);

?>
<div class="dardboard-container">
    <div class="d-flex">
        <div class="col-2 sidebar">
            <div style="top: 50px; z-index: 20;" class="position-fixed">
                <?php
                $currentUser = $user;
                include("/Applications/XAMPP/xamppfiles/htdocs/Book-movie-tickets/src/components/SideBar/SideBar.php");
                ?>
            </div>
        </div>
        <div class="col-10 wrapper-content dardboard-content">
            <div class="row mt-5">
                <div class="col-6">
                    <div class="row mb-5">
                        <div class="col-6">
                            <?php
                            $type = 'success';
                            $icon = 'fas fa-users';
                            $title = 'TỔNG NGƯỜI DÙNG';
                            $value =  $dataCountUser->data[0]['totalUser'] . " người dùng";
                            include("/Applications/XAMPP/xamppfiles/htdocs/Book-movie-tickets/src/components/Widget/Widget.php");
                            ?>
                        </div>
                        <div class="col-6">
                            <?php
                            $type = 'warn';
                            $icon = 'fas fa-video';
                            $title = 'TỔNG PHIM ĐANG CHIẾU';
                            $value =  $dataCountMovie->data[0]['totalMovie'] . " phim";
                            include("/Applications/XAMPP/xamppfiles/htdocs/Book-movie-tickets/src/components/Widget/Widget.php");
                            ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <?php
                            $type = 'secondary';
                            $icon = 'fas fa-ticket-alt';
                            $title = 'TỔNG SUẤT CHIẾU ĐÃ BÁN';
                            $value = $dataCountTicketSold->data[0]['totalInvoice'] . " suất";
                            include("/Applications/XAMPP/xamppfiles/htdocs/Book-movie-tickets/src/components/Widget/Widget.php");
                            ?>
                        </div>
                        <div class="col-6">
                            <?php
                            $type = 'danger';
                            $icon = 'fas fa-wallet';
                            $title = 'TỔNG DOANH THU';
                            $value = number_format($dataTotalRevenue->data[0]['totalRevenue'], 0, ',', '.') . " đ";
                            include("/Applications/XAMPP/xamppfiles/htdocs/Book-movie-tickets/src/components/Widget/Widget.php");
                            ?>
                        </div>
                    </div>
                    <div class="col-12 mt-5">
                        <div class="section-new">
                            <h2><b>Người dùng mới</b></h2>
                            <table class="table table-hover text-center">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Tên tài khoản</th>
                                        <th>Email</th>
                                        <th>Ngày tạo</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($dataUsers->data as $user) {
                                    ?>
                                        <tr>
                                            <td><?php echo $user['id'] ?></td>
                                            <td><?php echo $user['userName'] ?></td>
                                            <td><?php echo $user['email'] ?></td>
                                            <td><?php echo $user['createdAt'] ?></td>
                                        </tr>

                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <!-- <div class="row"> -->
                    <div class="section-new">
                        <h2><b>Đơn hàng mới gần đây</b></h2>
                        <table class="table table-hover text-center">
                            <thead>
                                <tr>
                                    <th>Mã giao dịch</th>
                                    <th>Phim</th>
                                    <th>Ngày đặt</th>
                                    <th>Tổng tiền</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($dataTransactions->data as $transaction) {
                                ?>
                                    <tr>
                                        <td><?php echo $transaction['id'] ?></td>
                                        <td><?php echo $transaction['movieTitle'] ?></td>
                                        <td><?php echo $transaction['createdAt'] ?></td>
                                        <td><?php echo number_format($transaction['total'], 0, ',', '.') ?>đ</td>
                                    </tr>

                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- </div> -->
                </div>
            </div>
        </div>
    </div>

</div>