<?php
$userId = $_GET['userId'];
$apiGetUserById = "http://localhost/book_movie_ticket_be/api/user/getUserById?id=" . $userId;
$responseUser = file_get_contents($apiGetUserById);
$dataUser = (object)json_decode($responseUser, true);
?>

<div class="modal-header">
    <h1 class="modal-title fs-3 fw-bold" id="exampleModalLabel">Sửa người dùng</h1>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
    <div class="row">
        <div class="row col-6 mb-5">
            <label for="userName" class="col-sm-4 col-form-label ">Tên đăng nhập</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="userName" value="<?php echo $dataUser->data[0]['userName']  ?>" required>
            </div>
        </div>
        <div class="row col-6 mb-5">
            <label for="email" class="col-sm-4 col-form-label">email</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="email" value="<?php echo $dataUser->data[0]['email']  ?>" disabled>
            </div>
        </div>
        <div class="row col-6 mb-5">
            <label for="password" class="col-sm-4 col-form-label">Mật khẩu</label>
            <div class="col-sm-8">
                <input type="password" class="form-control" id="password" value="<?php echo $dataUser->data[0]['password']  ?>" required>
            </div>
        </div>
        <div class="row col-6 mb-5">
            <label for="phone" class="col-sm-4 col-form-label">Điện thoại</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="phone" value="<?php echo $dataUser->data[0]['phoneNumber']  ?>">
            </div>
        </div>
        <div class="col-6 mb-5">
            <label for="formAvatar" class="form-label">Ảnh đại diện</label>
            <input class="form-control" type="file" id="formAvatar">
        </div>
        <div class="col-6 mb-5">
            <label for="role" class="form-label">Vai trò</label>
            <select class="form-control" id="role" value="" required>
                <option <?php echo $dataUser->data[0]['role'] == "user" ? "selected" : ""  ?> value="user">User</option>
                <option <?php echo $dataUser->data[0]['role'] == "admin" ? "selected" : ""  ?> value="admin">Admin</option>
            </select>
        </div>
    </div>
</div>
<div class="modal-footer">
    <div class="d-inline-block">
        <button onclick="handleUpdateUser()" class="btn btn-success ">Lưu</button>
    </div>
</div>