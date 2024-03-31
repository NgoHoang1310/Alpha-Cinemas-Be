<?php
include("/Applications/XAMPP/xamppfiles/htdocs/Book-movie-tickets/src/components/Header/AdminHeader.php");

$apiMovies = 'http://localhost/book_movie_ticket_be/api/movie/get';
$responseMovie = file_get_contents($apiMovies);
$dataMovies = (object)json_decode($responseMovie, true);

?>
<div class="manage-movie-container">
    <div class="row clear">
        <div class="col-md-2 sidebar">
            <?php
            include("/Applications/XAMPP/xamppfiles/htdocs/Book-movie-tickets/src/components/SideBar/SideBar.php");
            ?>
        </div>
        <div class="col-md-10 manage-movie-content">
            <div class="btn-function d-inline-block">
                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addNewMovie"><i class="fas fa-plus me-3"></i>Thêm mới</button>
            </div>
            <div class="d-flex">
                <div class="col-6 filter"></div>
                <div class="col-6 d-flex justify-content-end align-items-center">
                    <div class="search-area me-3">
                        <label class="me-3">Tìm kiếm</label>
                        <input class="" type="text">
                    </div>

                </div>
            </div>

            <table class="table table-responsive table-striped text-center align-middle overflow-scroll">
                <thead>
                    <tr>
                        <th scope="col-2">ID</th>
                        <th scope="col-2">Tên phim</th>
                        <th scope="col-2">Thể loại</th>
                        <th scope="col-2">Thời lượng</th>
                        <th scope="col-2">Poster</th>
                        <th scope="col-2">Trending</th>
                        <th scope="col-2">Độ tuổi</th>
                        <th scope="col-2">Trạng thái</th>
                        <th scope="col-2">Đạo diễn</th>
                        <th scope="col-2">Diễn viên</th>
                        <th scope="col-2">Ngôn ngữ</th>
                        <th scope="col-2">Ngày chiếu</th>
                        <th scope="col-2">Mô tả</th>
                        <th scope="col-2">Chức năng</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($dataMovies->data as $movie) {
                    ?>
                        <tr data-movie-id="<?php echo $movie['id'] ?>">
                            <th scope="row"><?php echo $movie['id']  ?></th>
                            <td><?php echo $movie['title']  ?></td>
                            <td><?php echo $movie['category']  ?></td>
                            <td><?php echo $movie['duration']  ?></td>
                            <td style="padding: 10px 0;">
                                <img class="avatar rounded" width="50px" height="50px" src="<?php echo $movie['thumbPath'] ?>" alt="">
                            </td>
                            <td><?php echo $movie['trending']  ?></td>
                            <td><?php echo $movie['limitnation']  ?></td>
                            <td><?php echo $movie['status']  ?></td>
                            <td><?php echo $movie['director'] ?></td>
                            <td><?php echo $movie['cast']  ?></td>
                            <td><?php echo $movie['language']  ?></td>
                            <td><?php echo $movie['startDate']  ?></td>
                            <td><?php echo $movie['description']  ?></td>
                            <td>
                                <button onclick="handleGetMovieById(this)" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editMovie"><i class="fas fa-edit"></i></button>
                                <button onclick="handleGetCurrentMovieId(this)" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteMovie"><i class="fas fa-trash-alt"></i></button>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="modal fade" id="addNewMovie" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="false">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div id="addNewMovie-modal" class="modal-content p-3">
                <?php include '/Applications/XAMPP/xamppfiles/htdocs/Book-movie-tickets/src/components/Modal/ManageMovie/AddMovie.php' ?>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editMovie" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="false">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div id="editMovie-modal" class="modal-content p-3">
                <?php include '/Applications/XAMPP/xamppfiles/htdocs/Book-movie-tickets/src/components/Modal/ManageMovie/EditMovie.php' ?>
            </div>
        </div>
    </div>

    <div class="modal fade" id="deleteMovie" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="false">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div id="deleteUser-modal" class="modal-content p-3">
                <?php include '/Applications/XAMPP/xamppfiles/htdocs/Book-movie-tickets/src/components/Modal/ManageMovie/DeleteMovie.php' ?>
            </div>
        </div>
    </div>
</div>