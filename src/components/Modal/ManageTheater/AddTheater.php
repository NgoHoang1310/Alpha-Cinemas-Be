<?php
$apiGetTheaters = "http://localhost/book_movie_ticket_be/api/theater/get";
$responseTheaters = file_get_contents($apiGetTheater);
$dataTheaters = (object)json_decode($responseTheaters, true);
?>
<div class="modal-header">
    <h1 class="modal-title fs-3 fw-bold" id="exampleModalLabel">Thêm rạp</h1>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
    <div class="row">
        <div class="col-6 mb-5">
            <label for="code" class="col-sm-4 col-form-label">Mã rạp</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="code" required>
            </div>
        </div>
        <div class="col-6 mb-5">
            <label for="theaterName" class="col-sm-4 col-form-label">Tên rạp</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="theaterName" required>
            </div>
        </div>
        <div class="col-6 mb-5">
            <label for="thumbPath" class="form-label">Hình ảnh rạp</label>
            <input class="form-control" type="file" id="thumbPath">
        </div>
        <div class="col-6 mb-5">
            <label for="imgPrice" class="form-label">Hình ảnh giá</label>
            <input class="form-control" type="file" id="imgPrice">
        </div>
        <div class="col-6 mb-5">
            <label for="description" class="form-label">Thông tin chi tiết</label>
            <textarea class="form-control" id="description" rows="3"></textarea>
        </div>
    </div>
</div>
<div class="modal-footer">
    <div class="d-inline-block">
        <button onclick="handleCreateTheater()" class="btn btn-success ">Lưu</button>
    </div>
</div>