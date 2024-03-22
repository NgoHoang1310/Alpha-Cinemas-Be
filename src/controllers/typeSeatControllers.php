<?php
include('../models/TypeSeat.php');
function handleCreateTypeSeat()
{
    $type = $_POST['type'];
    $typeName = $_POST['typeName'];

    try {
        if (!$type || !$typeName) {
            echo json_encode(array("code" => 1, "message" => "Missing data!"));
            return;
        }
        $typeSeat = TypeSeat::findOne($type, 'type');
        if ($typeSeat->num_rows > 0) {
            echo json_encode(array("code" => 4, "message" => "Data already exists!"));
        } else {
            TypeSeat::create(new TypeSeat($type, $typeName));
            echo json_encode(array("code" => 0, "message" => "Created new type seat!"));
        }
    } catch (\Throwable $th) {
        echo json_encode(array("code" => 2, "message" => "Error from server!"));
    }
}

function handleUpdateTypeSeat()
{
    $id = $_POST['id'];
    $type = $_POST['type'];
    $typeName = $_POST['typeName'];
    try {
        if (!$id || !$type || !$typeName) {
            echo json_encode(array("code" => 1, "message" => "Missing data!"));
            return;
        }
        TypeSeat::update(new TypeSeat($type, $typeName), $id);
        echo json_encode(array("code" => 0, "message" => "Updated type seat!"));
        //code...
    } catch (\Throwable $th) {
        //throw $th;
        echo json_encode(array("code" => 2, "message" => "Error from server!"));
    }
}


function handleGetAllTypeSeat()
{
    try {
        $typeseats = [];
        $result = TypeSeat::findAll();
        while ($row = $result->fetch_assoc()) {
            array_push($typeseats, $row);
        }

        if ($typeseats) {
            echo json_encode(array("code" => 0, "message" => "Get successfully!", "data" => $typeseats));
        } else {
            echo json_encode(array("code" => 3, "message" => "Not found!"));
        }
        //code...
    } catch (\Throwable $th) {
        //throw $th;
        echo json_encode(array("code" => 2, "message" => "Error from server!"));
    }
}

function handleDeleteTypeSeat($id)
{
    try {
        if (!$id) {
            echo json_encode(array("code" => 1, "message" => "Missing data!"));
            return;
        }

        $typeseat = [];
        $result = User::findOne($id, 'id');

        // Kiểm tra xem có kết quả nào không
        while ($row = $result->fetch_assoc()) {
            array_push($typeseat, $row);
        }

        if (!empty($typeseat)) {
            TypeSeat::delete($id);
            echo json_encode(array("code" => 0, "message" => "Deleted type seat!"));
        } else {
            echo json_encode(["code" => 4, "message" => "Deleted failed!"]);
        }
        //code...
    } catch (\Throwable $th) {
        //throw $th;
        echo json_encode(array("code" => 2, "message" => "Error from server!"));
    }
}
