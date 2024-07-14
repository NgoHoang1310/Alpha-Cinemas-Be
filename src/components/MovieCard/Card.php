 <div class="movies__item-preview--thumb">
     <!-- <img src="https://files.betacorp.vn/files/media%2fimages%2f2024%2f03%2f06%2f400x633%2D111023%2D060324%2D92.jpg" alt=""> -->
     <img src="<?php print_r($cardData['thumbPath']) ?>" alt="">
     <div class="thumb-overlay">
         <div onclick="handleClickPlay(this)" data-movie-id="<?php print_r($cardData['id']) ?>" class="play-icon text-center" data-bs-toggle="modal" data-bs-target="#trailerModal">
             <i class="fa-solid fa-play"></i>
         </div>
     </div>
     <div class="sticker-limit" style="background-image: url(http://localhost/Book-movie-tickets/assets/images/sticker/<?php print_r($cardData['limitnation']) ?>.png);"></div>
     <?php echo $cardData['trending'] === 'true' ? '<div class="sticker-hot"></div>' : "" ?>

 </div>