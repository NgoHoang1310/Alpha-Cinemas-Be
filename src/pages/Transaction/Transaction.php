<?php
$user = (object)json_decode($_COOKIE['userData']);
if (($user->id) && ($user->role == 'admin')) {
    header('location:http://localhost/Book-movie-tickets/alphacinemas.vn/login');
    return;
}
include $_SERVER['DOCUMENT_ROOT'] . '/Book-movie-tickets/src/components/Header/Header.php';

$apiTransactions = 'http://localhost/book_movie_ticket_be/api/invoice/getInvoiceByUser?userId=' . $user->id;
$responseTransactions = file_get_contents($apiTransactions);
$dataTransactions = (object)json_decode($responseTransactions, true);

?>
<div class="transaction-container mt-default">
    <div class="container-md pt-5">
        <div class="fs-1 fw-bold mb-5 primary-text "><a class="primary-text text-decoration-underline" href="http://localhost/Book-movie-tickets/alphacinemas.vn/home">Trang chủ</a> > <span class="text-decoration-underline">Lịch sử đặt vé</span></div>
        <div class="row ">
            <table class="table table-hover text-center">
                <thead>
                    <tr>
                        <th>Mã giao dịch</th>
                        <th>Phim</th>
                        <th>Phòng chiếu</th>
                        <th>Suất chiếu</th>
                        <th>Ghế đã đặt</th>
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
                            <td><img class="rounded me-3" width="100px" src="<?php echo $transaction['thumbPath'] ?>" alt=""><?php echo $transaction['movieTitle'] ?></td>
                            <td>Alpha thanh xuân <br> <?php echo $transaction['roomName'] ?> </td>
                            <td><?php echo $transaction['startDate'] ?> <br> <?php echo $transaction['time'] ?></td>
                            <td><?php echo $transaction['seats'] ?></td>
                            <td><?php echo $transaction['createdAt'] ?></td>
                            <td><?php echo number_format($transaction['total'], 0, ',', '.') ?>đ</td>
                        </tr>

                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>