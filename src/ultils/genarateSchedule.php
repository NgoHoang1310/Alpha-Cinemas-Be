<?php
function generateDate($day)
{
    $dateRange = array();

    // Ngày bắt đầu là ngày hiện tại
    $startDate = date('Y-m-d h:i:s');
    // Thêm ngày bắt đầu vào mảng
    $dateRange[] = $startDate;

    // Tăng dần ngày bắt đầu và thêm vào mảng cho đến khi đủ 7 ngày
    for ($i = 1; $i < $day; $i++) {
        $nextDate = date('Y-m-d', strtotime($startDate . ' +' . $i . ' days'));
        $dateRange[] = $nextDate;
    }

    return $dateRange;
}
