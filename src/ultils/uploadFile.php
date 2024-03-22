<?php
function uploadFile($targetPath)
{
    $thumbPath = "";
    if ($targetPath) {
        $currentPath = $_FILES['thumbPath']['tmp_name'];
        move_uploaded_file($currentPath, "D:/Applications/Xampp/htdocs/book_movie_ticket_be/src/assets" . $targetPath . $_FILES['thumbPath']['name']);
        $thumbPath = "http://localhost/book_movie_ticket_be/src/assets" . $targetPath . $_FILES['thumbPath']['name'];
    }
    return $thumbPath;
}
