<?php
include('../models/MovieSchedule.php');


function handleCreateMovieSchedule()
{
    $movieId = $_POST['movieId'];
    $roomId = $_POST['roomId'];
    $time = $_POST['time'];
    $status = $_POST['status'];

    try {
        if (!$movieId || !$roomId || !$time || !$status) {
            echo json_encode(array("code" => 1, "message" => "Missing data!"));
            return;
        }
        MovieSchedule::create(new MovieSchedule($movieId, $roomId, $time, $status));
        echo json_encode(array("code" => 0, "message" => "Created new MovieSchedule!"));
        //code...
    } catch (\Throwable $th) {
        //throw $th;
        echo json_encode(array("code" => 2, "message" => "Error from server!"));
    }
}

function handleUpdateMovieSchedule($id, $movieId, $roomId, $time, $status)
{
    $id = $_POST['id'];
    $movieId = $_POST['movieId'];
    $roomId = $_POST['roomId'];
    $time = $_POST['time'];
    $status = $_POST['status'];
    try {
        if (!$id || !$movieId || !$roomId || !$time || !$status) {
            echo json_encode(array("code" => 1, "message" => "Missing data!"));
            return;
        }
        MovieSchedule::update(new MovieSchedule($movieId, $roomId, $time, $status), $id);
        echo json_encode(array("code" => 0, "message" => "Updated MovieSchedule!"));
        //code...
    } catch (\Throwable $th) {
        //throw $th;
        echo json_encode(array("code" => 2, "message" => "Error from server!"));
    }
}

function handleGetAllMovieSchedule($movieId = 0)
{
    $movieId = $_GET['movieId'];
    try {
        $movieSchedules = array();
        $result = $movieId ? MovieSchedule::findAll($movieId, 'movieId') : MovieSchedule::findAll();
        while ($row = $result->fetch_assoc()) {
            array_push($movieSchedules, $row);
        }

        if ($movieSchedules) {
            echo json_encode(array("code" => 0, "message" => "Get successfully!", "data" => $movieSchedules));
        } else {
            echo json_encode(array("code" => 3, "message" => "Not found!"));
        }
        //code...
    } catch (\Throwable $th) {
        //throw $th;
        echo json_encode(array("code" => 2, "message" => "Error from server!"));
    }
}
