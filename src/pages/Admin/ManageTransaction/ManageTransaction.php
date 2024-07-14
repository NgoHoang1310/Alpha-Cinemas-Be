<?php
include $_SERVER['DOCUMENT_ROOT'] . '/Book-movie-tickets/src/components/Header/AdminHeader.php';

$user = (object)json_decode($_COOKIE['userData'], true);
if (empty($user->id)) {
    header('location:http://localhost/Book-movie-tickets/alphacinemas.vn/login');
    return;
}

if ($user->id && $user->role != "admin") {
    header('location:http://localhost/Book-movie-tickets/alphacinemas.vn/login');
    return;
}


$apiTotalRevenue = 'http://localhost/book_movie_ticket_be/api/dashboard/totalRevenue';
$responseTotalRevenue = file_get_contents($apiTotalRevenue);
$dataTotalRevenue = (object)json_decode($responseTotalRevenue, true);

?>
<div class="manage-transaction-container">
    <div class="row clear">
        <div class="col-2 sidebar">
            <div style="top: 50px; z-index: 20;" class="position-fixed">
                <?php
                $currentUser = $user;
                include $_SERVER['DOCUMENT_ROOT'] . '/Book-movie-tickets/src/components/SideBar/SideBar.php';
                ?>
            </div>
        </div>
        <div class="col-10 wrapper-content manage-transaction-content">
            <div class="col-4 widget-revenue mt-3 mb-3">
                <?php
                $type = 'danger';
                $icon = 'fas fa-wallet';
                $title = 'TỔNG DOANH THU';
                $value = number_format($dataTotalRevenue->data[0]['totalRevenue'], 0, ',', '.') . " đ";
                include $_SERVER['DOCUMENT_ROOT'] . '/Book-movie-tickets/src/components/Widget/Widget.php';
                ?>
            </div>
            <div class="d-flex">
                <div class="col-6 filter d-flex">
                    <!-- <div class="text">Hiện</div>
                    <div class="option">
                        <select style="width: 100px; padding: 2px 6px; margin: 0 6px">
                            <option selected value="">10</option>
                            <option value="">25</option>
                            <option value="">50</option>
                            <option value="">100</option>
                        </select>
                    </div>
                    <div class="text">mục</div> -->

                </div>
                <div class="col-6 d-flex justify-content-end align-items-center mb-3">
                    <?php
                    $search = "handleSearch(this,'Invoice','ManageTransaction/TableTransaction.php')";
                    include $_SERVER['DOCUMENT_ROOT'] . '/Book-movie-tickets/src/components/Search/Search.php';
                    ?>
                </div>
            </div>

            <div id="table">
                <?php
                include $_SERVER['DOCUMENT_ROOT'] . '/Book-movie-tickets/src/pages/Admin/ManageTransaction/TableTransaction.php';
                ?>
            </div>
        </div>
    </div>
    <!-- <div class="modal fade" id="addNewtransaction" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="false">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div id="addNewtransaction-modal" class="modal-content p-3">
                <?php include $_SERVER['DOCUMENT_ROOT'] . '/Book-movie-tickets/src/components/Modal/Managetransaction/AddUser.php' ?>
            </div>
        </div>
    </div> -->

    <!-- <div class="modal fade" id="editUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="false">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div id="editUser-modal" class="modal-content p-3">
                <?php include $_SERVER['DOCUMENT_ROOT'] . '/Book-movie-tickets/src/components/Modal/ManageUser/EditUser.php' ?>
            </div>
        </div>
    </div> -->

    <div class="modal fade" id="deleteTransaction" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="false">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div id="deleteTransaction-modal" class="modal-content p-3">
                <?php include $_SERVER['DOCUMENT_ROOT'] . '/Book-movie-tickets/src/components/Modal/ManageTransaction/DeleteTransaction.php' ?>
            </div>
        </div>
    </div>
</div>