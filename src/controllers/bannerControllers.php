<?php
include('../models/Banner.php');


function handleCreateBanner()
{
    $currentPath = $_FILES['thumbPath']['tmp_name'];
    $targetPath = "D:/Applications/Xampp/htdocs/book_movie_ticket_be/src/assets/images/banners/" . $_FILES['thumbPath']['name'];
    $thumbPath = "http://localhost/book_movie_ticket_be/src/assets/images/banners/" . $_FILES['thumbPath']['name'];
    move_uploaded_file($currentPath, $targetPath);
    try {
        if (!$thumbPath) {
            echo json_encode(array("code" => 1, "message" => "Missing data!"));
            return;
        }
        Banner::create(new Banner($thumbPath));
        echo json_encode(array("code" => 0, "message" => "Created new banner!"));
        //code...
    } catch (\Throwable $th) {
        //throw $th;
        echo json_encode(array("code" => 2, "message" => "Error from server!"));
    }
}

function handleGetBanner()
{
    try {
        $banners = array();
        $result = Banner::findAll();
        while ($row = $result->fetch_assoc()) {
            array_push($banners, $row);
        }

        if ($banners) {
            echo json_encode(array("code" => 0, "message" => "Get successfully!", "data" => $banners));
        } else {
            echo json_encode(array("code" => 3, "message" => "Not found!"));
        }
        //code...
    } catch (\Throwable $th) {
        //throw $th;
        echo json_encode(array("code" => 2, "message" => "Error from server!"));
    }
}
