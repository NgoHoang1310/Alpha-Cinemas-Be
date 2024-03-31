<?php
include("/Applications/XAMPP/xamppfiles/htdocs/Book-movie-tickets/src/components/Header/AdminHeader.php");
include("/Applications/XAMPP/xamppfiles/htdocs/Book-movie-tickets/src/ultils/checkRoom.php");
include("/Applications/XAMPP/xamppfiles/htdocs/Book-movie-tickets/src/ultils/checkMovie.php");
include("/Applications/XAMPP/xamppfiles/htdocs/Book-movie-tickets/src/ultils/checkSeat.php");
include("/Applications/XAMPP/xamppfiles/htdocs/Book-movie-tickets/src/constants/seat.php");

$apiGetTypeSeat = "http://localhost/book_movie_ticket_be/api/typeseat/get";
$responseTypeSeat = file_get_contents($apiGetTypeSeat);
$dataTypeSeat = (object)json_decode($responseTypeSeat, true);

$apiSeats = 'http://localhost/book_movie_ticket_be/api/seat/get';
$responseSeats = file_get_contents($apiSeats);
$dataSeats = (object)json_decode($responseSeats, true);
?>
<div class="manage-seat-container">
    <div class="row clear">
        <div class="col-2 sidebar">
            <?php
            include("/Applications/XAMPP/xamppfiles/htdocs/Book-movie-tickets/src/components/SideBar/SideBar.php");
            ?>
        </div>
        <div class="col-10 manage-seat-content">
            <div class="btn-function d-inline-block">
                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addNewSeat"><i class="fas fa-plus me-3"></i>Thêm mới</button>
            </div>
            <div class="d-flex">
                <div class="col-6 filter"></div>
                <div class="col-6 d-flex justify-content-end align-items-center">
                    <div class="search-area me-3">
                        <label class="me-3">Tìm kiếm</label>
                        <input class=" " type="text">
                    </div>

                </div>
            </div>

            <table class="table table-striped text-center align-middle">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Phòng chiếu</th>
                        <th scope="col">Loại ghế</th>
                        <th scope="col">Hàng ghế</th>
                        <th scope="col">Ghế</th>
                        <th scope="col">Trạng thái</th>
                        <th scope="col">Chức năng</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($dataSeats->data as $seat) {
                    ?>
                        <tr data-seat-id="<?php echo $seat['id'] ?>">
                            <th scope="row"><?php echo $seat['id']  ?></th>
                            <td><?php echo checkRoom($seat['roomId'])  ?></td>
                            <td><?php echo checkSeatTypeName($seat['typeSeatId'], $dataTypeSeat->data)   ?></td>
                            <td><?php echo $seat['rowSeat']  ?></td>
                            <td><?php echo $seat['columnSeat']  ?></td>
                            <td><?php echo $seat['status'] == 'bought' ? 'Đã được đặt' : 'Ghế trống'  ?></td>
                            <td>
                                <button onclick="handleGetSeatById(this)" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editSeat"><i class="fas fa-edit"></i></button>
                                <button onclick="handleGetCurrentSeatId(this)" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteSeat"><i class="fas fa-trash-alt"></i></button>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="modal fade" id="addNewSeat" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="false">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div id="addNewSeat-modal" class="modal-content p-3">
                <?php include '/Applications/XAMPP/xamppfiles/htdocs/Book-movie-tickets/src/components/Modal/ManageSeat/AddSeat.php' ?>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editSeat" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="false">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div id="editSeat-modal" class="modal-content p-3">
                <?php include '/Applications/XAMPP/xamppfiles/htdocs/Book-movie-tickets/src/components/Modal/ManageSeat/EditSeat.php' ?>
            </div>
        </div>
    </div>

    <div class="modal fade" id="deleteSeat" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="false">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div id="deleteSeat-modal" class="modal-content p-3">
                <?php include '/Applications/XAMPP/xamppfiles/htdocs/Book-movie-tickets/src/components/Modal/ManageSeat/DeleteSeat.php' ?>
            </div>
        </div>
    </div>
</div>