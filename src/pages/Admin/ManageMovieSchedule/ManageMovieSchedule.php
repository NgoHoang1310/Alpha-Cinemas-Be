<?php
include("/Applications/XAMPP/xamppfiles/htdocs/Book-movie-tickets/src/components/Header/AdminHeader.php");
include("/Applications/XAMPP/xamppfiles/htdocs/Book-movie-tickets/src/ultils/checkRoom.php");
include("/Applications/XAMPP/xamppfiles/htdocs/Book-movie-tickets/src/ultils/checkMovie.php");
$apiMovieSchedule = 'http://localhost/book_movie_ticket_be/api/movieschedule/get';
$responseMovieSchedule = file_get_contents($apiMovieSchedule);
$dataMovieSchedule = (object)json_decode($responseMovieSchedule, true);

?>
<div class="manage-movie-schedule-container">
    <div class="row clear">
        <div class="col-2 sidebar">
            <?php
            include("/Applications/XAMPP/xamppfiles/htdocs/Book-movie-tickets/src/components/SideBar/SideBar.php");
            ?>
        </div>
        <div class="col-10 manage-movie-schedule-content">
            <div class="btn-function d-inline-block">
                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addNewMovieSchedule"><i class="fas fa-plus me-3"></i>Thêm mới</button>
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
                        <th scope="col">Tên phim</th>
                        <th scope="col">Phòng chiếu</th>
                        <th scope="col">Thời gian chiếu</th>
                        <th scope="col">Trạng thái</th>
                        <th scope="col">Chức năng</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($dataMovieSchedule->data as $movieSchedule) {
                    ?>
                        <tr data-movie-schedule-id="<?php echo $movieSchedule['id'] ?>">
                            <th scope="row"><?php echo $movieSchedule['id']  ?></th>
                            <td><?php echo checkMovie($movieSchedule['movieId'])  ?></td>
                            <td><?php echo checkRoom($movieSchedule['roomId'])  ?></td>
                            <td><?php echo $movieSchedule['time']  ?></td>
                            <td><?php echo $movieSchedule['status']  ?></td>
                            <td>
                                <button onclick="handleGetMovieScheduleById(this)" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editMovieSchedule"><i class="fas fa-edit"></i></button>
                                <button onclick="handleGetCurrentMovieScheduleId(this)" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteMovieSchedule"><i class="fas fa-trash-alt"></i></button>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="modal fade" id="addNewMovieSchedule" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="false">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div id="addNewMovieSchedule-modal" class="modal-content p-3">
                <?php include '/Applications/XAMPP/xamppfiles/htdocs/Book-movie-tickets/src/components/Modal/ManageSchedule/AddSchedule.php' ?>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editMovieSchedule" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="false">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div id="editMovieSchedule-modal" class="modal-content p-3">
                <?php include '/Applications/XAMPP/xamppfiles/htdocs/Book-movie-tickets/src/components/Modal/ManageSchedule/EditSchedule.php' ?>
            </div>
        </div>
    </div>

    <div class="modal fade" id="deleteMovieSchedule" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="false">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div id="deleteMovieSchedule-modal" class="modal-content p-3">
                <?php include '/Applications/XAMPP/xamppfiles/htdocs/Book-movie-tickets/src/components/Modal/ManageSchedule/DeleteSchedule.php' ?>
            </div>
        </div>
    </div>
</div>