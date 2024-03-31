<?php
include("/Applications/XAMPP/xamppfiles/htdocs/Book-movie-tickets/src/components/Header/AdminHeader.php");

$apiUsers = 'http://localhost/book_movie_ticket_be/api/user/get';
$responseUser = file_get_contents($apiUsers);
$dataUsers = (object)json_decode($responseUser, true);

?>
<div class="manage-user-container">
    <div class="row clear">
        <div class="col-2 sidebar">
            <?php
            include("/Applications/XAMPP/xamppfiles/htdocs/Book-movie-tickets/src/components/SideBar/SideBar.php");
            ?>
        </div>
        <div class="col-10 manage-user-content">
            <div class="btn-function d-inline-block">
                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addNewUser"><i class="fas fa-plus me-3"></i>Thêm mới</button>
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
                        <th scope="col">Tên tài khoản</th>
                        <th scope="col">Email</th>
                        <th scope="col">Số điện thoại</th>
                        <th scope="col">Ảnh đại diện</th>
                        <th scope="col">Vai trò</th>
                        <th scope="col">Chức năng</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($dataUsers->data as $user) {
                    ?>
                        <tr data-user-id="<?php echo $user['id'] ?>">
                            <th scope="row"><?php echo $user['id']  ?></th>
                            <td><?php echo $user['userName']  ?></td>
                            <td><?php echo $user['email']  ?></td>
                            <td><?php echo $user['phoneNumber']  ?></td>
                            <td style="padding: 10px 0;">
                                <img class="avatar rounded-circle" width="50px" height="50px" src="<?php echo $user['avatar'] ?>" alt="">
                            </td>
                            <td><?php echo $user['role']  ?></td>
                            <td>
                                <button onclick="handleGetUserById(this)" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editUser"><i class="fas fa-edit"></i></button>
                                <button onclick="handleGetCurrentId(this)" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteUser"><i class="fas fa-trash-alt"></i></button>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="modal fade" id="addNewUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="false">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div id="addNewUser-modal" class="modal-content p-3">
                <?php include '/Applications/XAMPP/xamppfiles/htdocs/Book-movie-tickets/src/components/Modal/ManageUser/AddUser.php' ?>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="false">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div id="editUser-modal" class="modal-content p-3">
                <?php include '/Applications/XAMPP/xamppfiles/htdocs/Book-movie-tickets/src/components/Modal/ManageUser/EditUser.php' ?>
            </div>
        </div>
    </div>

    <div class="modal fade" id="deleteUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="false">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div id="deleteUser-modal" class="modal-content p-3">
                <?php include '/Applications/XAMPP/xamppfiles/htdocs/Book-movie-tickets/src/components/Modal/ManageUser/DeleteUser.php' ?>
            </div>
        </div>
    </div>
</div>