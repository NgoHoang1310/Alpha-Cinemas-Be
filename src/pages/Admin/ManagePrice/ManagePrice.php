<?php
include("/Applications/XAMPP/xamppfiles/htdocs/Book-movie-tickets/src/components/Header/AdminHeader.php");
include("/Applications/XAMPP/xamppfiles/htdocs/Book-movie-tickets/src/ultils/checkSeat.php");

$user = (object)json_decode($_COOKIE['userData'], true);
if (empty($user->id)) {
    header('location:http://localhost/Book-movie-tickets/alphacinemas.vn/login');
    return;
}

if ($user->id && $user->role != "admin") {
    header('location:http://localhost/Book-movie-tickets/alphacinemas.vn/login');
    return;
}

$apiGetTypeSeat = "http://localhost/book_movie_ticket_be/api/typeseat/get";
$responseTypeSeat = file_get_contents($apiGetTypeSeat);
$dataTypeSeat = (object)json_decode($responseTypeSeat, true);

$apiPrices = 'http://localhost/book_movie_ticket_be/api/priceseat/get';
$responsePrice = file_get_contents($apiPrices);
$dataPrices = (object)json_decode($responsePrice, true);


?>
<div class="manage-price-container">
    <div class="row clear">
        <div class="col-2 sidebar">
            <div style="top: 50px; z-index: 20;" class="position-fixed">
                <?php
                $currentUser = $user;
                include("/Applications/XAMPP/xamppfiles/htdocs/Book-movie-tickets/src/components/SideBar/SideBar.php");
                ?>
            </div>
        </div>
        <div class="col-10 wrapper-content wrapper-content manage-price-content">
            <div class="btn-function d-inline-block">
                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addNewPrice"><i class="fas fa-plus me-3"></i>Thêm mới</button>
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

            <table class="table table-striped text-center align-middle">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Loại ghế</th>
                        <th scope="col">Giá ghế</th>
                        <th scope="col">Chức năng</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($dataPrices->data as $price) {
                    ?>
                        <tr data-price-id="<?php echo $price['id'] ?>">
                            <th scope="row"><?php echo $price['id']  ?></th>
                            <td><?php echo checkSeatTypeName($price['typeSeatId'], $dataTypeSeat->data) ?></td>
                            <td><?php echo $price['price'] ?></td>
                            <td>
                                <button onclick="handleGetPriceById(this)" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editPrice"><i class="fas fa-edit"></i></button>
                                <button onclick="handleGetCurrentPriceId(this)" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deletePrice"><i class="fas fa-trash-alt"></i></button>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="modal fade" id="addNewPrice" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="false">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div id="addNewPrice-modal" class="modal-content p-3">
                <?php include $_SERVER['DOCUMENT_ROOT'] . '/Book-movie-tickets/src/components/Modal/ManagePrice/AddPrice.php' ?>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editPrice" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="false">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div id="editPrice-modal" class="modal-content p-3">
                <?php include $_SERVER['DOCUMENT_ROOT'] . '/Book-movie-tickets/src/components/Modal/ManagePrice/EditPrice.php' ?>
            </div>
        </div>
    </div>

    <div class="modal fade" id="deletePrice" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="false">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div id="deletePrice-modal" class="modal-content p-3">
                <?php include $_SERVER['DOCUMENT_ROOT'] . '/Book-movie-tickets/src/components/Modal/ManagePrice/DeletePrice.php' ?>
            </div>
        </div>
    </div>
</div>