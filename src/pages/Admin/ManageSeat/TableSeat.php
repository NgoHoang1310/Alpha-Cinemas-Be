 <?php
    include("/Applications/XAMPP/xamppfiles/htdocs/Book-movie-tickets/src/ultils/checkRoom.php");
    include("/Applications/XAMPP/xamppfiles/htdocs/Book-movie-tickets/src/ultils/checkMovie.php");
    include("/Applications/XAMPP/xamppfiles/htdocs/Book-movie-tickets/src/ultils/checkSeat.php");
    include("/Applications/XAMPP/xamppfiles/htdocs/Book-movie-tickets/src/constants/seat.php");
    $table = $_GET['t'];
    $query = $_GET['q'];

    if ($table  && $query) {
        $apiSeats = 'http://localhost/book_movie_ticket_be/api/search?t=' . $table . '&q=' . $query;
    } else {
        $apiSeats = 'http://localhost/book_movie_ticket_be/api/seat/get';
    }
    $responseSeats = file_get_contents($apiSeats);
    $dataSeats = (object)json_decode($responseSeats, true);

    $apiGetTypeSeat = "http://localhost/book_movie_ticket_be/api/typeseat/get";
    $responseTypeSeat = file_get_contents($apiGetTypeSeat);
    $dataTypeSeat = (object)json_decode($responseTypeSeat, true);
    ?>

 <table class="table table-striped text-center align-middle">
     <thead>
         <tr>
             <th scope="col">ID</th>
             <th scope="col">Phòng chiếu</th>
             <th scope="col">Loại ghế</th>
             <th scope="col">Hàng ghế</th>
             <th scope="col">Ghế</th>
             <th scope="col">Trạng thái</th>
             <th scope="col">Chức năng</th>
         </tr>
     </thead>
     <tbody>
         <?php
            foreach ($dataSeats->data as $seat) {
            ?>
             <tr data-seat-id="<?php echo $seat['id'] ?>">
                 <th scope="row"><?php echo $seat['id']  ?></th>
                 <td><?php echo checkRoom($seat['roomId'])  ?></td>
                 <td><?php echo checkSeatTypeName($seat['typeSeatId'], $dataTypeSeat->data)   ?></td>
                 <td><?php echo $seat['rowSeat']  ?></td>
                 <td><?php echo $seat['columnSeat']  ?></td>
                 <td><?php echo $seat['status'] == 'bought' ? 'Đã được đặt' : 'Ghế trống'  ?></td>
                 <td>
                     <button onclick="handleGetSeatById(this)" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editSeat"><i class="fas fa-edit"></i></button>
                     <button onclick="handleGetCurrentSeatId(this)" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteSeat"><i class="fas fa-trash-alt"></i></button>
                 </td>
             </tr>
         <?php
            }
            ?>
     </tbody>
 </table>