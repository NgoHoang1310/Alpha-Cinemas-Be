 <div class="movies__item-preview">
     <?php
        include('/Applications/XAMPP/xamppfiles/htdocs/Book-movie-tickets/src/components/MovieCard/Card.php')
        ?>
     <div class="movies__item-preview--movieName">
         <a class="link" href="http://localhost/Book-movie-tickets/alphacinemas.vn/movie-detail?m=<?php print_r($movie['id']) ?>"><?php print_r($movie['title']) ?></a>
     </div>
     <div class="movies__item-preview--desc">
         <p class="category">Thể loại: <span><?php print_r($movie['category']) ?></span></p>
         <p class="time">Thời lượng: <span><?php print_r($movie['duration']) ?> phút</span></p>
     </div>
     <div onclick="handleClickBuyTicket(this)" data-movie-id="<?php print_r($movie['id']) ?>" data-bs-toggle="modal" data-bs-target="#scheduleModal" class="button-primary movies__item-preview--buyBtn <?php echo ($status == 'CM') ? "btn-disable" : ""  ?>">MUA VÉ <i style="transform: rotate(-45deg);" class="fa fa-ticket mr3"></i></div>
 </div>