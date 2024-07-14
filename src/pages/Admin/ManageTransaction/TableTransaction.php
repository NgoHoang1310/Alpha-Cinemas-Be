<?php
$table = $_GET['t'];
$query = $_GET['q'];

if ($table  && $query) {
    $apiTransactions = 'http://localhost/book_movie_ticket_be/api/search?t=' . $table . '&q=' . $query;
} else {
    $apiTransactions = 'http://localhost/book_movie_ticket_be/api/invoice/get';
}

$responseTransactions = file_get_contents($apiTransactions);
$dataTransactions = (object)json_decode($responseTransactions, true);
?>

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
            <th scope="col">Chức năng</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($dataTransactions->data as $transaction) {
        ?>
            <tr data-transaction-id="<?php echo $transaction['id'] ?>">
                <td><?php echo $transaction['id'] ?></td>
                <td><?php echo $transaction['movieTitle'] ?></td>
                <td>Alpha thanh xuân <br> <?php echo $transaction['roomName'] ?> </td>
                <td><?php echo $transaction['day'] ?> <br> <?php echo $transaction['time'] ?></td>
                <td><?php echo $transaction['seats'] ?></td>
                <td><?php echo $transaction['createdAt'] ?></td>
                <td><?php echo number_format($transaction['total'], 0, ',', '.') ?>đ</td>
                <td>
                    <button onclick="handleGetCurrentTransactionId(this)" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteTransaction"><i class="fas fa-trash-alt"></i></button>
                </td>
            </tr>

        <?php
        }
        ?>
    </tbody>
</table>