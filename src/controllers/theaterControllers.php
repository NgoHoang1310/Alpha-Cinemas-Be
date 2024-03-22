<?php
include('../models/Theater.php');


function handleCreateTheater()
{
    $code = $_POST['code'];
    $theaterName = $_POST['theaterName'];
    try {
        if (!$code || !$theaterName) {
            echo json_encode(array("code" => 1, "message" => "Missing data!"));
            return;
        }
        Theater::create(new Theater($code, $theaterName));
        echo json_encode(array("code" => 0, "message" => "Created new Theater!"));
        //code...
    } catch (\Throwable $th) {
        //throw $th;
        echo json_encode(array("code" => 2, "message" => "Error from server!"));
    }
}

function handleGetTheater()
{
    try {
        $theaters = array();
        $result = Theater::findAll();
        while ($row = $result->fetch_assoc()) {
            array_push($theaters, $row);
        }

        if ($theaters) {
            echo json_encode(array("code" => 0, "message" => "Get successfully!", "data" => $theaters));
        } else {
            echo json_encode(array("code" => 3, "message" => "Not found!"));
        }
        //code...
    } catch (\Throwable $th) {
        //throw $th;
        echo json_encode(array("code" => 2, "message" => "Error from server!"));
    }
}
