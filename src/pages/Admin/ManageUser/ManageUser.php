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



?>
<div class="manage-user-container">
    <div class="row clear">
        <div class="col-2 sidebar">
            <div style="top: 50px; z-index: 20;" class="position-fixed">
                <?php
                $currentUser = $user;
                include $_SERVER['DOCUMENT_ROOT'] . '/Book-movie-tickets/src/components/SideBar/SideBar.php';
                ?>
            </div>
        </div>
        <div class="col-10 wrapper-content wrapper-content manage-user-content">
            <div class="btn-function d-inline-block">
                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addNewUser"><i class="fas fa-plus me-3"></i>Thêm mới</button>
            </div>
            <div class="d-flex">
                <div class="col-6 filter"></div>
                <div class="col-6 d-flex justify-content-end align-items-center">
                    <?php
                    $search = "handleSearch(this,'User','ManageUser/TableUser.php')";
                    include $_SERVER['DOCUMENT_ROOT'] . '/Book-movie-tickets/src/components/Search/Search.php';
                    ?>

                </div>
            </div>

            <div id="table">
                <?php
                include $_SERVER['DOCUMENT_ROOT'] . '/Book-movie-tickets/src/pages/Admin/ManageUser/TableUser.php';
                ?>
            </div>
        </div>
    </div>
    <div class="modal fade" id="addNewUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="false">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div id="addNewUser-modal" class="modal-content p-3">
                <?php include $_SERVER['DOCUMENT_ROOT'] . '/Book-movie-tickets/src/components/Modal/ManageUser/AddUser.php' ?>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="false">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div id="editUser-modal" class="modal-content p-3">
                <?php include $_SERVER['DOCUMENT_ROOT'] . '/Book-movie-tickets/src/components/Modal/ManageUser/EditUser.php' ?>
            </div>
        </div>
    </div>

    <div class="modal fade" id="deleteUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="false">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div id="deleteUser-modal" class="modal-content p-3">
                <?php include $_SERVER['DOCUMENT_ROOT'] . '/Book-movie-tickets/src/components/Modal/ManageUser/DeleteUser.php' ?>
            </div>
        </div>
    </div>
</div>