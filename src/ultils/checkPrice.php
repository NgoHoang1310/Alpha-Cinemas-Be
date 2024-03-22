<?php
function checkPrice($typeSeatId, $prices)
{


    foreach ($prices as $price) {
        if ($price['typeSeatId'] == $typeSeatId) {
            return $price['price'];
        }
    }
}
