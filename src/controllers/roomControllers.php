<?php
include('../models/Room.php');

function handleCreateRoom()
{
    $roomName = $_POST['roomName'];
    $status = $_POST['status'];
    try {
        if (!$roomName) {
            echo json_encode(array("code" => 1, "message" => "Missing data!"));
            return;
        }
        $room = Room::findOne($roomName, 'roomName');
        if ($room->num_rows > 0) {
            echo json_encode(array("code" => 4, "message" => "Data already exists!"));
        } else {
            Room::create(new Room($roomName, $status));
            echo json_encode(array("code" => 0, "message" => "Created new room!"));
        }
        // if()

        //code...
    } catch (\Throwable $th) {
        //throw $th;
        echo json_encode(array("code" => 2, "message" => "Error from server!"));
    }
}

function handleUpdateRoom()
{
    $id = $_POST['id'];
    $roomName = $_POST['roomName'];
    $status = $_POST['status'];
    try {
        if (!$id || !$roomName) {
            echo json_encode(array("code" => 1, "message" => "Missing data!"));
            return;
        }
        Room::update(new Room($roomName, $status), $id);
        echo json_encode(array("code" => 0, "message" => "Updated room!"));
        //code...
    } catch (\Throwable $th) {
        //throw $th;
        echo json_encode(array("code" => 2, "message" => "Error from server!"));
    }
}


function handleGetAllRoom()
{
    try {
        $rooms = array();
        $result = Room::findAll();
        while ($row = $result->fetch_assoc()) {
            array_push($rooms, $row);
        }

        if ($rooms) {
            echo json_encode(array("code" => 0, "message" => "Get successfully!", "data" => $rooms));
        } else {
            echo json_encode(array("code" => 3, "message" => "Not found!"));
        }
        //code...
    } catch (\Throwable $th) {
        //throw $th;
        echo json_encode(array("code" => 2, "message" => "Error from server!"));
    }
}

function handleDeleteRoom($id)
{
    try {
        if (!$id) {
            echo json_encode(array("code" => 1, "message" => "Missing data!"));
            return;
        }

        $rooms = [];
        $result = Room::findOne($id, 'id');

        // Kiểm tra xem có kết quả nào không
        while ($row = $result->fetch_assoc()) {
            array_push($users, $row);
        }

        if (!empty($rooms)) {
            Room::delete($id);
            echo json_encode(array("code" => 0, "message" => "Deleted room!"));
        } else {
            echo json_encode(["code" => 4, "message" => "Deleted failed!"]);
        }
        //code...
    } catch (\Throwable $th) {
        //throw $th;
        echo json_encode(array("code" => 2, "message" => "Error from server!"));
    }
}
