<?php
$apiGetRooms = "http://localhost/book_movie_ticket_be/api/room/get";
$responseRooms = file_get_contents($apiGetRooms);
$dataRooms = (object)json_decode($responseRooms, true);
?>
<div class="modal-header">
    <h1 class="modal-title fs-3 fw-bold" id="exampleModalLabel">Thêm ghế</h1>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
    <div class="row">
        <div class="col-4 mb-5">
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
        <div class="col-4 mb-5">
            <label for="typeSeat" class="form-label">Loại ghế</label>
            <select class="form-control" id="typeSeat" required>
                <?php
                foreach ($dataTypeSeat->data as $typeSeat) {
                ?>
                    <option value="<?php echo $typeSeat['id'] ?>"><?php echo $typeSeat['typeName'] ?></option>
                <?php
                }
                ?>
            </select>
        </div>
        <div class="row col-4 mb-5">
            <label for="rowSeat" class="form-label">Hàng ghế</label>
            <select class="form-control" id="rowSeat" required>
                <?php
                foreach ($ROW_SEATS as $row) {
                ?>
                    <option value="<?php echo $row ?>"><?php echo $row  ?></option>
                <?php
                }
                ?>
            </select>
        </div>
        <div class="col-6 mb-5">
            <label for="seat" class="form-label">Ghế</label>
            <select class="form-control" id="seat" required>
                <?php
                for ($i = 1; $i <= $MAX_SEATS_PER_ROW; $i++) {
                ?>
                    <option value="<?php echo $i ?>"><?php echo $i  ?></option>
                <?php
                }
                ?>
            </select>
        </div>
        <div class="row col-6 mb-5">
            <label for="status" class="form-label">Trạng thái</label>
            <select class="form-control" id="status" disabled required>
                <option value="bought">Đã được đặt</option>
                <option selected value="empty">Ghế trống</option>
            </select>
        </div>
    </div>
</div>
<div class="modal-footer">
    <div class="d-inline-block">
        <button onclick="handleCreateSeat()" class="btn btn-success ">Lưu</button>
    </div>
</div>