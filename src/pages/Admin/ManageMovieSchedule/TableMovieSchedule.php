  <?php
    include("/Applications/XAMPP/xamppfiles/htdocs/Book-movie-tickets/src/ultils/checkRoom.php");
    include("/Applications/XAMPP/xamppfiles/htdocs/Book-movie-tickets/src/ultils/checkMovie.php");
    $table = $_GET['t'];
    $query = $_GET['q'];

    if ($table  && $query) {
        $apiMovieSchedule = 'http://localhost/book_movie_ticket_be/api/search?t=' . $table . '&q=' . $query;
    } else {
        $apiMovieSchedule = 'http://localhost/book_movie_ticket_be/api/movieschedule/get';
    }
    $responseMovieSchedule = file_get_contents($apiMovieSchedule);
    $dataMovieSchedule = (object)json_decode($responseMovieSchedule, true);
    ?>
  <table class="table table-striped text-center align-middle">
      <thead>
          <tr>
              <th scope="col">ID</th>
              <th scope="col">Tên phim</th>
              <th scope="col">Phòng chiếu</th>
              <th scope="col">Ngày chiếu</th>
              <th scope="col">Thời gian chiếu</th>
              <th scope="col">Trạng thái</th>
              <th scope="col">Chức năng</th>
          </tr>
      </thead>
      <tbody>
          <?php
            foreach ($dataMovieSchedule->data as $movieSchedule) {
            ?>
              <tr data-movie-schedule-id="<?php echo $movieSchedule['id'] ?>">
                  <th scope="row"><?php echo $movieSchedule['id']  ?></th>
                  <td><?php echo checkMovie($movieSchedule['movieId'])  ?></td>
                  <td><?php echo checkRoom($movieSchedule['roomId'])  ?></td>
                  <td><?php echo $movieSchedule['day']  ?></td>
                  <td><?php echo $movieSchedule['time']  ?></td>
                  <td><?php echo $movieSchedule['status']  ?></td>
                  <td>
                      <button onclick="handleGetMovieScheduleById(this)" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editMovieSchedule"><i class="fas fa-edit"></i></button>
                      <button onclick="handleGetCurrentMovieScheduleId(this)" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteMovieSchedule"><i class="fas fa-trash-alt"></i></button>
                  </td>
              </tr>
          <?php
            }
            ?>
      </tbody>
  </table>