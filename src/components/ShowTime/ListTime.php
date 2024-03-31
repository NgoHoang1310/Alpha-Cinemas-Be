 <div class="movie-showtime__list">
     <?php
        foreach ($dataTime as $time) {
        ?>
         <div class="movie-showtime__item">
             <p class="time" time="<?php echo $time ?>" movie-id="<?php echo $movieId ?>" onclick="handleClickOnTime(this)" data-bs-toggle="modal" data-bs-target="#bookingModal"><?php echo date("H:i", strtotime($time)) ?></p>
             <p class="seat">165 ghế trống</p>
         </div>
     <?php
        }

        ?>
 </div>