<?php
include("/Applications/XAMPP/xamppfiles/htdocs/Book-movie-tickets/src/components/Header/AdminHeader.php");
include("/Applications/XAMPP/xamppfiles/htdocs/Book-movie-tickets/src/ultils/checkRoom.php");
include("/Applications/XAMPP/xamppfiles/htdocs/Book-movie-tickets/src/ultils/checkMovie.php");
include("/Applications/XAMPP/xamppfiles/htdocs/Book-movie-tickets/src/ultils/checkSeat.php");
include("/Applications/XAMPP/xamppfiles/htdocs/Book-movie-tickets/src/constants/seat.php");

$user = (object)json_decode($_COOKIE['userData'], true);
if (empty($user->id)) {
    header('location:http://localhost/Book-movie-tickets/alphacinemas.vn/login');
    return;
}

if ($user->id && $user->role != "admin") {
    header('location:http://localhost/Book-movie-tickets/alphacinemas.vn/login');
    return;
}

$apiGetTheater = "http://localhost/book_movie_ticket_be/api/theater/get";
$responseTheater = file_get_contents($apiGetTheater);
$dataTheater = (object)json_decode($responseTheater, true);
?>
<div class="manage-theater-container">
    <div class="row clear">
        <div class="col-2 sidebar">
            <div style="top: 50px; z-index: 20;" class="position-fixed">
                <?php
                $currentUser = $user;
                include("/Applications/XAMPP/xamppfiles/htdocs/Book-movie-tickets/src/components/SideBar/SideBar.php");
                ?>
            </div>
        </div>
        <div class="col-10 wrapper-content manage-theater-content">
            <div class="btn-function d-inline-block">
                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addNewTheater"><i class="fas fa-plus me-3"></i>Thêm mới</button>
            </div>
            <div class="d-flex">
                <div class="col-6 filter"></div>
                <div class="col-6 d-flex justify-content-end align-items-center">
                    <!-- <div class="search-area me-3">
                        <label class="me-3">Tìm kiếm</label>
                        <input class=" " type="text">
                    </div> -->

                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-striped text-center align-middle">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Mã rạp</th>
                            <th scope="col">Tên rạp</th>
                            <th scope="col">Hình ảnh rạp</th>
                            <th scope="col">Hình ảnh giá vé</th>
                            <th scope="col">Thông tin chi tiết</th>
                            <th scope="col">Chức năng</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($dataTheater->data as $theater) {
                        ?>
                            <tr data-theater-id="<?php echo $theater['id'] ?>">
                                <th scope="row"><?php echo $theater['id']  ?></th>
                                <td><?php echo $theater['code'] ?></td>
                                <td><?php echo $theater['theaterName']  ?></td>
                                <td style="padding: 10px 0;">
                                    <img class="avatar rounded" width="70px" height="50px" src="<?php echo $theater['thumbPath'] ?>" alt="">
                                </td>
                                <td style="padding: 10px 0;">
                                    <img class="avatar rounded" width="70px" height="50px" src="<?php echo $theater['imgPrice'] ?>" alt="">
                                </td>
                                <td style="width: 250px;">
                                    <div class="scrollable">
                                        <?php echo $theater['description']  ?>
                                    </div>
                                </td>
                                <td>
                                    <button onclick="handleGetTheaterById(this)" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editTheater"><i class="fas fa-edit"></i></button>
                                    <button onclick="handleGetCurrentTheaterId(this)" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteTheater"><i class="fas fa-trash-alt"></i></button>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="modal fade" id="addNewTheater" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="false">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div id="addNewTheater-modal" class="modal-content p-3">
                <?php include $_SERVER['DOCUMENT_ROOT'] . '/Book-movie-tickets/src/components/Modal/ManageTheater/AddTheater.php' ?>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editTheater" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="false">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div id="editTheater-modal" class="modal-content p-3">
                <?php include $_SERVER['DOCUMENT_ROOT'] . '/Book-movie-tickets/src/components/Modal/ManageTheater/EditTheater.php' ?>
            </div>
        </div>
    </div>

    <div class="modal fade" id="deleteTheater" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="false">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div id="deleteTheater-modal" class="modal-content p-3">
                <?php include $_SERVER['DOCUMENT_ROOT'] . '/Book-movie-tickets/src/components/Modal/ManageTheater/DeleteTheater.php' ?>
            </div>
        </div>
    </div>
</div>