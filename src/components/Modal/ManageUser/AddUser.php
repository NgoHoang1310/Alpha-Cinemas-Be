<div class="modal-header">
    <h1 class="modal-title fs-3 fw-bold" id="exampleModalLabel">Thêm người dùng</h1>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
    <div class="row">
        <div class="row col-6 mb-5">
            <label for="userName" class="col-sm-4 col-form-label ">Tên đăng nhập</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="userName" required>
            </div>
        </div>
        <div class="row col-6 mb-5">
            <label for="email" class="col-sm-4 col-form-label">email</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="email" required>
            </div>
        </div>
        <div class="row col-6 mb-5">
            <label for="password" class="col-sm-4 col-form-label">Mật khẩu</label>
            <div class="col-sm-8">
                <input type="password" class="form-control" id="password" required>
            </div>
        </div>
        <div class="row col-6 mb-5">
            <label for="phone" class="col-sm-4 col-form-label">Điện thoại</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="phone">
            </div>
        </div>
        <div class="col-6 mb-5">
            <label for="formAvatar" class="form-label">Ảnh đại diện</label>
            <input class="form-control" type="file" id="formAvatar" name="avatar">
        </div>
        <div class="col-6 mb-5">
            <label for="role" class="form-label">Vai trò</label>
            <select class="form-control" id="role" required>
                <option selected value="user">User</option>
                <option value="admin">Admin</option>
            </select>
        </div>
    </div>
</div>
<div class="modal-footer">
    <div class="d-inline-block">
        <button onclick="handleCreateUser(this)" class="btn btn-success ">Lưu</button>
    </div>
</div>