 <div class="movies__item-preview">
     <?php
        include '/Applications/Xampp/htdocs/Book-movie-tickets/src/components/MovieCard/Card.php';
        ?>
     <div class="movies__item-preview--movieName">
         <a class="link" href=""><?php print_r($movie['title']) ?></a>
     </div>
     <div class="movies__item-preview--desc">
         <p class="category">Thể loại: <span><?php print_r($movie['category']) ?></span></p>
         <p class="time">Thời lượng: <span><?php print_r($movie['duration']) ?> phút</span></p>
     </div>
     <div class="button-primary movies__item-preview--buyBtn <?php echo ($status == 'CM') ? "btn-disable" : ""  ?>">MUA VÉ <i style="transform: rotate(-45deg);" class="fa fa-ticket mr3"></i></div>

 </div>