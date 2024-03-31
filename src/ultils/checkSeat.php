<?php
function checkSeatStatus($seatType, $typeSeats, $seatStatus)
{
    $className = "";

    foreach ($typeSeats as $type) {
        if ($type['id'] == $seatType) {
            $className = $type['type'];
        }
    }

    switch ($className) {
        case 'vip':
            return
                $seatStatus != 'empty' ? 'seat-buy-vip' : 'seat-unselect-vip';
        case 'normal':
            return
                $seatStatus != 'empty' ? 'seat-buy-normal' : 'seat-unselect-normal';
        case 'double':
            return
                $seatStatus != 'empty' ? 'seat-buy-double' : 'seat-unselect-double';
    }

    return $className;
}

function checkSeatType($seatType, $typeSeats)
{
    $type = '';
    foreach ($typeSeats as $type) {
        if ($type['id'] == $seatType) {
            return $type['type'];
        }
    }
}

function checkSeatTypeName($seatType, $typeSeats)
{
    $type = '';
    foreach ($typeSeats as $type) {
        if ($type['id'] == $seatType) {
            return $type['typeName'];
        }
    }
}
