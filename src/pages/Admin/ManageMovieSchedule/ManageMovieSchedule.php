<?php
include("/Applications/XAMPP/xamppfiles/htdocs/Book-movie-tickets/src/components/Header/AdminHeader.php");


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
<div class="manage-movie-schedule-container">
    <div class="row clear">
        <div class="col-2 sidebar">
            <div style="top: 50px; z-index: 20;" class="position-fixed">
                <?php
                $currentUser = $user;
                include("/Applications/XAMPP/xamppfiles/htdocs/Book-movie-tickets/src/components/SideBar/SideBar.php");
                ?>
            </div>
        </div>
        <div class="col-10 wrapper-content manage-movie-schedule-content">
            <div class="btn-function d-inline-block">
                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addNewMovieSchedule"><i class="fas fa-plus me-3"></i>Thêm mới</button>
            </div>
            <div class="d-flex">
                <div class="col-6 filter"></div>
                <div class="col-6 d-flex justify-content-end align-items-center">
                    <?php
                    $search = "handleSearch(this,'MovieSchedule','ManageMovieSchedule/TableMovieSchedule.php')";
                    include("/Applications/XAMPP/xamppfiles/htdocs/Book-movie-tickets/src/components/Search/Search.php");
                    ?>

                </div>
            </div>

            <div id="table">
                <?php
                include("/Applications/XAMPP/xamppfiles/htdocs/Book-movie-tickets/src/pages/Admin/ManageMovieSchedule/TableMovieSchedule.php");
                ?>
            </div>
        </div>
    </div>
    <div class="modal fade" id="addNewMovieSchedule" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="false">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div id="addNewMovieSchedule-modal" class="modal-content p-3">
                <?php include $_SERVER['DOCUMENT_ROOT'] . '/Book-movie-tickets/src/components/Modal/ManageSchedule/AddSchedule.php' ?>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editMovieSchedule" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="false">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div id="editMovieSchedule-modal" class="modal-content p-3">
                <?php include $_SERVER['DOCUMENT_ROOT'] . '/Book-movie-tickets/src/components/Modal/ManageSchedule/EditSchedule.php' ?>
            </div>
        </div>
    </div>

    <div class="modal fade" id="deleteMovieSchedule" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="false">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div id="deleteMovieSchedule-modal" class="modal-content p-3">
                <?php include $_SERVER['DOCUMENT_ROOT'] . '/Book-movie-tickets/src/components/Modal/ManageSchedule/DeleteSchedule.php' ?>
            </div>
        </div>
    </div>
</div>