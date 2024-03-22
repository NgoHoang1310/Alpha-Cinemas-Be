<?php
include('../models/Seat.php');
function handleCreateSeat()
{
    $typeSeatId = $_POST['typeSeatId'];
    $roomId = $_POST['roomId'];
    $rowSeat = $_POST['rowSeat'];
    $columnSeat = $_POST['columnSeat'];
    $status = $_POST['status'];

    try {
        if (!$typeSeatId || !$roomId || !$rowSeat || !$columnSeat || !$status) {
            echo json_encode(array("code" => 1, "message" => "Missing data!"));
            return;
        }
        // $typeSeat = TypeSeat::findOne($type, 'type');
        // if ($typeSeat->num_rows > 0) {
        //     echo json_encode(array("code" => 4, "message" => "Data already exists!"));
        // } else {
        Seat::create(new Seat($typeSeatId, $roomId, $rowSeat, $columnSeat, $status));
        echo json_encode(array("code" => 0, "message" => "Created new seat!"));
        // }
    } catch (\Throwable $th) {
        echo json_encode(array("code" => 2, "message" => "Error from server!"));
    }
}

function handleUpdateSeat()
{
    $id = $_POST['id'];
    $typeSeatId = $_POST['typeSeatId'];
    $roomId = $_POST['roomId'];
    $rowSeat = $_POST['rowSeat'];
    $columnSeat = $_POST['columnSeat'];
    $status = $_POST['status'];
    try {
        if (!$id || !$typeSeatId || !$roomId || !$rowSeat || !$columnSeat || !$status) {
            echo json_encode(array("code" => 1, "message" => "Missing data!"));
            return;
        }
        Seat::update(new Seat($typeSeatId, $roomId, $rowSeat, $columnSeat, $status), $id);
        echo json_encode(array("code" => 0, "message" => "Updated seat!"));
        //code...
    } catch (\Throwable $th) {
        //throw $th;
        echo json_encode(array("code" => 2, "message" => "Error from server!"));
    }
}


function handleGetSeatsByRoom()
{
    try {
        $roomId = $_GET['roomId'];
        $seats = [];
        $result = Seat::findAll($roomId, 'roomId');
        while ($row = $result->fetch_assoc()) {
            array_push($seats, $row);
        }

        if ($seats) {
            echo json_encode(array("code" => 0, "message" => "Get successfully!", "data" => $seats));
        } else {
            echo json_encode(array("code" => 3, "message" => "Not found!"));
        }
        //code...
    } catch (\Throwable $th) {
        //throw $th;
        echo json_encode(array("code" => 2, "message" => "Error from server!"));
    }
}

function handleDeleteSeat($id)
{
    try {
        if (!$id) {
            echo json_encode(array("code" => 1, "message" => "Missing data!"));
            return;
        }

        $seat = [];
        $result = Seat::findOne($id, 'id');

        // Kiểm tra xem có kết quả nào không
        while ($row = $result->fetch_assoc()) {
            array_push($seat, $row);
        }

        if (!empty($seat)) {
            Seat::delete($id);
            echo json_encode(array("code" => 0, "message" => "Deleted seat!"));
        } else {
            echo json_encode(["code" => 4, "message" => "Deleted failed!"]);
        }
        //code...
    } catch (\Throwable $th) {
        //throw $th;
        echo json_encode(array("code" => 2, "message" => "Error from server!"));
    }
}
