<?php
function convertToDateTime($time)
{
    $data = $time->format('Y-m-d H:i:s');
    return $data;
}
