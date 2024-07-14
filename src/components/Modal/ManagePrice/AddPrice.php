<div class="modal-header">
    <h1 class="modal-title fs-3 fw-bold" id="exampleModalLabel">Thêm giá</h1>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
    <form action="" id="form">
        <div class="row">
            <div class="col-6">
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
            <div class="col-6">
                <label for="price" class="form-label">Giá ghế</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="price" required>
                </div>
            </div>
        </div>
    </form>
</div>
<div class="modal-footer">
    <div class="d-inline-block">
        <button onclick="handleCreatePrice()" class="btn btn-success ">Lưu</button>
    </div>
</div>