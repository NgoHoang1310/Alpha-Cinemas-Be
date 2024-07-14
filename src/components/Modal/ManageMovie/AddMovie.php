<div class="modal-header">
    <h1 class="modal-title fs-3 fw-bold" id="exampleModalLabel">Thêm phim</h1>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
    <div class="row">
        <div class="col-6 mb-5">
            <label for="title" class="col-sm-4 col-form-label ">Tên phim</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="title" required>
            </div>
        </div>
        <div class="col-6 mb-5">
            <label for="category" class="form-label">Thể loại</label>
            <select class="form-control" id="category" required>
                <option value="Kinh dị">Kinh dị</option>
                <option value="Hoạt hình, Hài hước">Hoạt hình, Hài hước</option>
                <option value="Tình cảm, Tâm lí">Tình cảm, Tâm lí</option>
                <option value="Hành động, phiêu lưu">Hành động, phiêu lưu</option>
            </select>
        </div>
        <div class="col-6 mb-5">
            <label for="duration" class="col-sm-4 col-form-label">Thời lượng</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="duration" required>
            </div>
        </div>

        <div class="col-6 mb-5">
            <label for="thumbPath" class="form-label">Ảnh đại diện</label>
            <input class="form-control" type="file" id="thumbPath">
        </div>

        <div class="col-6 mb-5">
            <label for="trailer" class="col-sm-4 col-form-label">Link trailer</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="trailer" required>
            </div>
        </div>

        <div class="col-4 mb-5">
            <label for="trend" class="form-label">Trending</label>
            <select class="form-control" id="trend" required>
                <option selected value="true">True</option>
                <option value="false">False</option>
            </select>
        </div>
        <div class="col-4 mb-5">
            <label for="limitnation" class="form-label">Độ tuổi</label>
            <select class="form-control" id="limitnation" required>
                <option selected value="T13">13+</option>
                <option value="T16">16+</option>
                <option value="T18">18+</option>
                <option value="p">Mọi độ tuổi</option>
            </select>
        </div>
        <div class="col-4 mb-5">
            <label for="status" class="form-label">Trạng thái</label>
            <select class="form-control" id="status" required>
                <option selected value="NS">Đang chiếu</option>
                <option value="CM">Sắp chiếu</option>
                <option value="SP">Suất chiếu đặc biệt</option>
            </select>
        </div>
        <div class="col-6 mb-5">
            <label for="director" class="form-label">Đạo diễn</label>
            <textarea class="form-control" id="director" rows="3"></textarea>
        </div>
        <div class="col-6 mb-5">
            <label for="cast" class="form-label">Diễn viên</label>
            <textarea class="form-control" id="cast" rows="3"></textarea>
        </div>
        <div class="col-4 mb-5">
            <label for="language" class="col-sm-4 col-form-label">Ngôn ngữ</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="language" required>
            </div>
        </div>
        <div class="col-4 mb-5">
            <label for="startDate" class="form-label">Ngày chiếu</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="startDate" required>
            </div>
        </div>
        <div class="col-4 mb-5">
            <label for="description" class="form-label">Mô tả</label>
            <textarea class="form-control" id="description" rows="3"></textarea>
        </div>
    </div>
</div>
<div class="modal-footer">
    <div class="d-inline-block">
        <button onclick="handleCreateMovie(this)" class="btn btn-success ">Lưu</button>
    </div>
</div>