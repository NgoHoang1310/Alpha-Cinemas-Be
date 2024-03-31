<?php
$apiGetMovies = "http://localhost/book_movie_ticket_be/api/movie/get";
$responseMovies = file_get_contents($apiGetMovies);
$dataMovies = (object)json_decode($responseMovies, true);

$apiGetRooms = "http://localhost/book_movie_ticket_be/api/room/get";
$responseRooms = file_get_contents($apiGetRooms);
$dataRooms = (object)json_decode($responseRooms, true);
?>
<div class="modal-header">
    <h1 class="modal-title fs-3 fw-bold" id="exampleModalLabel">Thêm lịch chiếu</h1>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
    <div class="row">
        <div class="col-6 mb-5">
            <label for="movieName" class="form-label">Tên phim</label>
            <select class="form-control" id="movieName" required>
                <?php
                foreach ($dataMovies->data as $movie) {
                ?>
                    <option value="<?php echo $movie['id'] ?>"><?php echo $movie['title'] ?></option>
                <?php
                }
                ?>
            </select>
        </div>
        <div class="col-6 mb-5">
            <label for="roomId" class="form-label">Phòng chiếu</label>
            <select class="form-control" id="roomId" required>
                <?php
                foreach ($dataRooms->data as $room) {
                ?>
                    <option value="<?php echo $room['id'] ?>"><?php echo $room['roomName'] ?></option>
                <?php
                }
                ?>
            </select>
        </div>
        <div class="col-6 mb-5">
            <label for="time" class="col-sm-4 col-form-label">Giờ chiếu</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="time" required>
            </div>
        </div>
        <div class="col-6 mb-5">
            <label for="status" class="form-label">Trạng thái</label>
            <select class="form-control" id="status" required>
                <option value="valid">Valid</option>
                <option value="invalid">Invalid</option>
            </select>
        </div>

    </div>
</div>
<div class="modal-footer">
    <div class="d-inline-block">
        <button onclick="handleCreateMovieSchedule()" class="btn btn-success">Lưu</button>
    </div>
</div>