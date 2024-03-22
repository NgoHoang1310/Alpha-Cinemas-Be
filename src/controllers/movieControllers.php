<?php
include('../models/Movie.php');


function handleCreateMovie()
{
    $title = $_POST['title'];
    $category = $_POST['category'];
    $duration = $_POST['duration'];
    $thumbPath = uploadFile('/images/movies/');
    $trending = $_POST['trending'];
    $limitnation = $_POST['limitnation'];
    $status = $_POST['status'];
    $director = $_POST['director'];
    $cast = $_POST['cast'];
    $language = $_POST['language'];
    $startDate = $_POST['startDate'];
    $endDate = $_POST['endDate'];
    $description = $_POST['description'];
    try {
        if (!$title || !$category || !$duration || !$thumbPath || !$trending || !$limitnation || !$status || !$director || !$cast || !$language || !$startDate || !$endDate || !$description) {
            echo json_encode(array("code" => 1, "message" => "Missing data!"));
            return;
        }
        Movie::create(new Movie($title, $category, $duration, $thumbPath, $trending, $limitnation, $status, $director, $cast, $language, $startDate, $endDate, $description));
        echo json_encode(array("code" => 0, "message" => "Created new Movie!"));
        //code...
    } catch (\Throwable $th) {
        //throw $th;
        echo json_encode(array("code" => 2, "message" => "Error from server!"));
    }
}

function handleUpdateMovie()
{
    $id = $_POST['id'];
    $title = $_POST['title'];
    $category = $_POST['category'];
    $duration = $_POST['duration'];
    $thumbPath = uploadFile('/images/movies/');
    $trending = $_POST['trending'];
    $limitnation = $_POST['limitnation'];
    $status = $_POST['status'];
    $director = $_POST['director'];
    $cast = $_POST['cast'];
    $language = $_POST['language'];
    $startDate = $_POST['startDate'];
    $endDate = $_POST['endDate'];
    $description = $_POST['description'];
    try {
        if (!$id || !$title || !$category || !$duration || !$thumbPath || !$trending || !$limitnation || !$status || !$director || !$cast || !$language || !$startDate || !$endDate || !$description) {
            echo json_encode(array("code" => 1, "message" => "Missing data!"));
            return;
        }
        Movie::update(new Movie($title, $category, $duration, $thumbPath, $trending, $limitnation, $status, $director, $cast, $language, $startDate, $endDate, $description), $id);
        echo json_encode(array("code" => 0, "message" => "Updated Movie!"));
        //code...
    } catch (\Throwable $th) {
        //throw $th;
        echo json_encode(array("code" => 2, "message" => "Error from server!"));
    }
}

function handleGetAllMovie()
{
    $status = $_GET['status'];

    try {
        $movies = array();
        $result = $status ? Movie::findAll($status, 'status') : Movie::findAll();
        while ($row = $result->fetch_assoc()) {
            array_push($movies, $row);
        }

        if ($movies) {
            echo json_encode(array("code" => 0, "message" => "Get successfully!", "data" => $movies));
        } else {
            echo json_encode(array("code" => 3, "message" => "Not found!"));
        }
        //code...
    } catch (\Throwable $th) {
        //throw $th;
        echo json_encode(array("code" => 2, "message" => "Error from server!"));
    }
}

function handleGetMovieBySchedule()
{
    $day = $_GET['day'];
    try {
        $movies = [];
        $result = Movie::findBySchedule($day);
        while ($row = $result->fetch_assoc()) {
            $row['screeningTimes'] = explode(',', $row['screeningTimes']);
            array_push($movies, $row);
        }

        if ($movies) {
            echo json_encode(array("code" => 0, "message" => "Get successfully!", "data" => $movies));
        } else {
            echo json_encode(array("code" => 3, "message" => "Not found!"));
        }
        //code...
    } catch (\Throwable $th) {
        //throw $th;
        echo json_encode(array("code" => 2, "message" => "Error from server!"));
    }
}

function handleAGetMovieByTime()
{
    $time = $_GET['time'];
    $movieId = $_GET['movieId'];
    try {
        $movies = [];
        $result = Movie::findByTime($time, $movieId);
        while ($row = $result->fetch_assoc()) {
            array_push($movies, $row);
        }

        if ($movies) {
            echo json_encode(array("code" => 0, "message" => "Get successfully!", "data" => $movies));
        } else {
            echo json_encode(array("code" => 3, "message" => "Not found!"));
        }
        //code...
    } catch (\Throwable $th) {
        //throw $th;
        echo json_encode(array("code" => 2, "message" => "Error from server!"));
    }
}
