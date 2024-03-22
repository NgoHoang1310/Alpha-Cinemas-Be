<?php
include('../models/User.php');



function handleLoginUser()
{
    $email = $_POST['email'];
    $password = $_POST['password'];

    try {
        if (!$email || !$password) {
            echo json_encode(array("code" => 1, "message" => "Missing data!"));
            return;
        }
        $response = User::findOne($email, 'email');
        if ($response->num_rows > 0) {
            $user = $response->fetch_assoc();
            if ($password !== $user['password']) {
                echo json_encode(array("code" => 5, "message" => "Password incorrect!"));
                return;
            }
            echo json_encode(array("code" => 0, "message" => "Login successfully!", "data" => $user));
        } else {
            echo json_encode(array("code" => 3, "message" => "User not found!"));
        }
    } catch (\Throwable $th) {
        //throw $th;
        echo json_encode(array("code" => 2, "message" => "Error from server!"));
    }
}
function handleCreateUser()
{
    $userName = $_POST['userName'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phoneNumber = $_POST['phoneNumber'];

    try {
        if (!$email || !$password) {
            echo json_encode(array("code" => 1, "message" => "Missing data!"));
            return;
        }
        $user = User::findOne($email, 'email');
        if ($user->num_rows > 0) {
            echo json_encode(array("code" => 4, "message" => "Data already exists!"));
        } else {
            User::create(new User($userName, $firstName, $lastName, $email, $password, $phoneNumber));
            echo json_encode(array("code" => 0, "message" => "Created new user!"));
        }
        // if()

        //code...
    } catch (\Throwable $th) {
        //throw $th;
        echo json_encode(array("code" => 2, "message" => "Error from server!"));
    }
}

function handleUpdateUser()
{
    $id = $_POST['id'];
    $userName = $_POST['userName'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $password = $_POST['password'];
    $phoneNumber = $_POST['phoneNumber'];
    try {
        if (!$id) {
            echo json_encode(array("code" => 1, "message" => "Missing data!"));
            return;
        }
        User::update(new User($id, $userName, $firstName, $lastName, $password, $phoneNumber), $id);
        echo json_encode(array("code" => 0, "message" => "Updated user!"));
        //code...
    } catch (\Throwable $th) {
        //throw $th;
        echo json_encode(array("code" => 2, "message" => "Error from server!"));
    }
}


function handleGetUser()
{
    try {
        $users = array();
        // if (!$id) {
        //     echo json_encode(array("code" => 1, "message" => "Missing data!"));
        //     return;
        // }

        $result = User::findOne();
        while ($row = $result->fetch_assoc()) {
            array_push($users, $row);
        }

        if ($users) {
            echo json_encode(array("code" => 0, "message" => "Get successfully!", "data" => $users));
        } else {
            echo json_encode(array("code" => 3, "message" => "Not found!"));
        }
        //code...
    } catch (\Throwable $th) {
        //throw $th;
        echo json_encode(array("code" => 2, "message" => "Error from server!"));
    }
}

function handleDeleteUser()
{
    $id = $_POST['id'];
    try {
        if (!$id) {
            echo json_encode(array("code" => 1, "message" => "Missing data!"));
            return;
        }

        $users = [];
        $result = User::findOne($id, 'id');

        // Kiểm tra xem có kết quả nào không
        while ($row = $result->fetch_assoc()) {
            array_push($users, $row);
        }

        if (!empty($users)) {
            User::delete($id);
            echo json_encode(array("code" => 0, "message" => "Deleted user!"));
        } else {
            echo json_encode(["code" => 4, "message" => "Deleted failed!"]);
        }
        //code...
    } catch (\Throwable $th) {
        //throw $th;
        echo json_encode(array("code" => 2, "message" => "Error from server!"));
    }
}
