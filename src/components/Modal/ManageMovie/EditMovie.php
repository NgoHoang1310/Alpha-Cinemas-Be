<?php
include $_SERVER['DOCUMENT_ROOT'] . '/Book-movie-tickets/src/ultils/genarateSchedule.php';
$movieId = $_GET['movieId'];
$apiGetMovieById = "http://localhost/book_movie_ticket_be/api/movie/getMovieById?movieId=" . $movieId;
$responseMovie = file_get_contents($apiGetMovieById);
$dataMovie = (object)json_decode($responseMovie, true);

$dateList = generateDate("7");
?>

<div class="modal-header">
    <h1 class="modal-title fs-3 fw-bold" id="exampleModalLabel">Thêm phim</h1>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
    <div class="row">
        <div class="col-6 mb-5">
            <label for="title" class="col-sm-4 col-form-label ">Tên phim</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="title" value="<?php echo $dataMovie->data[0]['title']  ?>" required>
            </div>
        </div>
        <div class="col-6 mb-5">
            <label for="category" class="form-label">Thể loại</label>
            <select class="form-control" id="category" required>
                <option <?php echo $dataMovie->data[0]['category'] == "Kinh dị" ? "selected" : ""  ?> value="Kinh dị">Kinh dị</option>
                <option <?php echo $dataMovie->data[0]['category'] == "Hoạt hình, Hài hước" ? "selected" : ""  ?> value="Hoạt hình, Hài hước">Hoạt hình, Hài hước</option>
                <option <?php echo $dataMovie->data[0]['category'] == "Tình cảm, Tâm lí" ? "selected" : ""  ?> value="Tình cảm, Tâm lí">Tình cảm, Tâm lí</option>
                <option <?php echo $dataMovie->data[0]['category'] == "Hành động, phiêu lưu" ? "selected" : ""  ?> value="Hành động, phiêu lưu">Hành động, phiêu lưu</option>
            </select>
        </div>
        <div class="col-6 mb-5">
            <label for="duration" class="col-sm-4 col-form-label">Thời lượng</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="duration" value="<?php echo $dataMovie->data[0]['duration'] ?>" required>
            </div>
        </div>

        <div class="col-6 mb-5">
            <label for="thumbPath" class="form-label">Ảnh đại diện</label>
            <input class="form-control" type="file" id="thumbPath">
        </div>

        <div class="col-6 mb-5">
            <label for="trailer" class="col-sm-4 col-form-label">Link trailer</label>
            <div class="col-sm-8">
                <input value="<?php echo $dataMovie->data[0]['trailer'] ?>" type="text" class="form-control" id="trailer" required>
            </div>
        </div>

        <div class="col-4 mb-5">
            <label for="trend" class="form-label">Trending</label>
            <select class="form-control" id="trend" required>
                <option <?php echo $dataMovie->data[0]['trending'] == "true" ? "selected" : ""  ?> value="true">True</option>
                <option <?php echo $dataMovie->data[0]['trending'] == "false" ? "selected" : ""  ?> value="false">False</option>
            </select>
        </div>
        <div class="col-4 mb-5">
            <label for="limitnation" class="form-label">Độ tuổi</label>
            <select class="form-control" id="limitnation" required>
                <option <?php echo $dataMovie->data[0]['limitnation'] == "T13" ? "selected" : ""  ?> selected value="T13">13+</option>
                <option <?php echo $dataMovie->data[0]['limitnation'] == "T16" ? "selected" : ""  ?> value="T16">16+</option>
                <option <?php echo $dataMovie->data[0]['limitnation'] == "T18" ? "selected" : ""  ?> value="T18">18+</option>
                <option <?php echo $dataMovie->data[0]['limitnation'] == "p" ? "selected" : ""  ?>value="p">Mọi độ tuổi</option>
            </select>
        </div>
        <div class="col-4 mb-5">
            <label for="status" class="form-label">Trạng thái</label>
            <select class="form-control" id="status" required>
                <option <?php echo $dataMovie->data[0]['status'] == "NS" ? "selected" : ""  ?> selected value="NS">Đang chiếu</option>
                <option <?php echo $dataMovie->data[0]['status'] == "CM" ? "selected" : ""  ?> value="CM">Sắp chiếu</option>
                <option <?php echo $dataMovie->data[0]['status'] == "SP" ? "selected" : ""  ?> value="SP">Suất chiếu đặc biệt</option>
            </select>
        </div>
        <div class="col-6 mb-5">
            <label for="director" class="form-label">Đạo diễn</label>
            <textarea class="form-control" id="director" value="" rows="2"><?php echo $dataMovie->data[0]['director'] ?></textarea>
        </div>
        <div class="col-6 mb-5">
            <label for="cast" class="form-label">Diễn viên</label>
            <textarea class="form-control" id="cast" rows="2"><?php echo $dataMovie->data[0]['cast'] ?></textarea>
        </div>
        <div class="col-4 mb-5">
            <label for="language" class="col-sm-4 col-form-label">Ngôn ngữ</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" value="<?php echo $dataMovie->data[0]['language'] ?>" id="language" required>
            </div>
        </div>
        <div class="col-4 mb-5">
            <label for="startDate" class="form-label">Ngày chiếu</label>
            <div class="col-sm-8">
                <input value="<?php echo $dataMovie->data[0]['startDate'] ?>" type="text" class="form-control" id="startDate" required>
            </div>
        </div>
        <div class="col-4 mb-5">
            <label for="description" class="form-label">Mô tả</label>
            <textarea class="form-control" id="description" value="" rows="3"><?php echo $dataMovie->data[0]['description'] ?></textarea>
        </div>
    </div>
</div>
<div class="modal-footer">
    <div class="d-inline-block">
        <button onclick="handleUpdateMovie()" class="btn btn-success ">Lưu</button>
    </div>
</div>