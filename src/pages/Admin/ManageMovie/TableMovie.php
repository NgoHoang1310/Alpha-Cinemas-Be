 <?php
    $table = $_GET['t'];
    $query = $_GET['q'];

    if ($table && $query) {
        $apiMovies = 'http://localhost/book_movie_ticket_be/api/search?t=' . $table . '&q=' . $query;
    } else {
        $apiMovies = 'http://localhost/book_movie_ticket_be/api/movie/get';
    }
    $responseMovie = file_get_contents($apiMovies);
    $dataMovies = (object)json_decode($responseMovie, true);
    ?>
 <table style="width: 200%;" class="table table-responsive table-striped text-center align-middle">
     <thead>
         <tr>
             <th scope="col-2">ID</th>
             <th scope="col-2">Tên phim</th>
             <th scope="col-2">Thể loại</th>
             <th scope="col-2">Thời lượng</th>
             <th scope="col-3">Poster</th>
             <th scope="col-2">Trending</th>
             <th scope="col-2">Độ tuổi</th>
             <th scope="col-2">Trạng thái</th>
             <th scope="col-2">Đạo diễn</th>
             <th scope="col-2">Diễn viên</th>
             <th scope="col-2">Ngôn ngữ</th>
             <th scope="col-2">Ngày chiếu</th>
             <th scope="col-2">Mô tả</th>
             <th scope="col-2">Chức năng</th>

         </tr>
     </thead>
     <tbody>
         <?php
            foreach ($dataMovies->data as $movie) {
            ?>
             <tr data-movie-id="<?php echo $movie['id'] ?>">
                 <th scope="row"><?php echo $movie['id']  ?></th>
                 <td><?php echo $movie['title']  ?></td>
                 <td><?php echo $movie['category']  ?></td>
                 <td><?php echo $movie['duration']  ?></td>
                 <td style="padding: 10px 0;">
                     <img class="avatar rounded" width="70px" height="50px" src="<?php echo $movie['thumbPath'] ?>" alt="">
                 </td>
                 <td><?php echo $movie['trending']  ?></td>
                 <td><?php echo $movie['limitnation']  ?></td>
                 <td><?php echo $movie['status']  ?></td>
                 <td><?php echo $movie['director'] ?></td>
                 <td style="width: 100px;"><?php echo $movie['cast']  ?></td>
                 <td><?php echo $movie['language']  ?></td>
                 <td><?php echo $movie['startDate']  ?></td>
                 <td style="width: 250px;">
                     <div class="scrollable">
                         <?php echo $movie['description']  ?>
                     </div>
                 </td>
                 <td>
                     <button onclick="handleGetMovieById(this)" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editMovie"><i class="fas fa-edit"></i></button>
                     <button onclick="handleGetCurrentMovieId(this)" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteMovie"><i class="fas fa-trash-alt"></i></button>
                 </td>
             </tr>
         <?php
            }
            ?>
     </tbody>
 </table>