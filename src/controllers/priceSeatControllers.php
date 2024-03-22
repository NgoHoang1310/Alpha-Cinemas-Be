<?php
include('../models/PriceSeat.php');
function handleCreatePriceSeat()
{
    $typeSeatId = $_POST['typeSeatId'];
    $price = $_POST['price'];

    try {
        if (!$typeSeatId || !$price) {
            echo json_encode(array("code" => 1, "message" => "Missing data!"));
            return;
        }
        $priceSeat = PriceSeat::findOne($typeSeatId, 'typeSeatId');
        if ($priceSeat->num_rows > 0) {
            echo json_encode(array("code" => 4, "message" => "Data already exists!"));
        } else {
            PriceSeat::create(new PriceSeat($typeSeatId, $price));
            echo json_encode(array("code" => 0, "message" => "Created new price!"));
        }
    } catch (\Throwable $th) {
        echo json_encode(array("code" => 2, "message" => "Error from server!"));
    }
}

function handleUpdatePriceSeat()
{
    $id = $_POST['id'];
    $typeSeatId = $_POST['typeSeatId'];
    $price = $_POST['price'];
    try {
        if (!$id || !$typeSeatId || !$price) {
            echo json_encode(array("code" => 1, "message" => "Missing data!"));
            return;
        }
        PriceSeat::update(new PriceSeat($typeSeatId, $price), $id);
        echo json_encode(array("code" => 0, "message" => "Updated price seat!"));
        //code...
    } catch (\Throwable $th) {
        //throw $th;
        echo json_encode(array("code" => 2, "message" => "Error from server!"));
    }
}


function handleGetAllPriceSeat()
{
    try {
        $priceSeats = [];
        $result = PriceSeat::findAll();
        while ($row = $result->fetch_assoc()) {
            array_push($priceSeats, $row);
        }

        if ($priceSeats) {
            echo json_encode(array("code" => 0, "message" => "Get successfully!", "data" => $priceSeats));
        } else {
            echo json_encode(array("code" => 3, "message" => "Not found!"));
        }
        //code...
    } catch (\Throwable $th) {
        //throw $th;
        echo json_encode(array("code" => 2, "message" => "Error from server!"));
    }
}

function handleDeletePriceSeat($id)
{
    try {
        if (!$id) {
            echo json_encode(array("code" => 1, "message" => "Missing data!"));
            return;
        }

        $priceSeat = [];
        $result = PriceSeat::findOne($id, 'id');

        // Kiểm tra xem có kết quả nào không
        while ($row = $result->fetch_assoc()) {
            array_push($priceSeat, $row);
        }

        if (!empty($priceSeat)) {
            PriceSeat::delete($id);
            echo json_encode(array("code" => 0, "message" => "Deleted price seat!"));
        } else {
            echo json_encode(["code" => 4, "message" => "Deleted failed!"]);
        }
        //code...
    } catch (\Throwable $th) {
        //throw $th;
        echo json_encode(array("code" => 2, "message" => "Error from server!"));
    }
}
