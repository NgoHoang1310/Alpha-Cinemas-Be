 <?php
    $table = $_GET['t'];
    $query = $_GET['q'];

    if ($table  && $query) {
        $apiUsers = 'http://localhost/book_movie_ticket_be/api/search?t=' . $table . '&q=' . $query;
    } else {
        $apiUsers = 'http://localhost/book_movie_ticket_be/api/user/get';
    }

    $responseUser = file_get_contents($apiUsers);
    $dataUsers = (object)json_decode($responseUser, true);
    ?>

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
                     <button onclick="handleGetCurrentUserId(this)" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteUser"><i class="fas fa-trash-alt"></i></button>
                 </td>
             </tr>
         <?php
            }
            ?>
     </tbody>
 </table>