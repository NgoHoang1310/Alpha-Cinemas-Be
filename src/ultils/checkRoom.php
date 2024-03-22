<?php
function checkRoom($id)
{
    $apiGetRooms = "http://localhost/book_movie_ticket_be/api/room/get";
    $responseRoom = file_get_contents($apiGetRooms);
    $dataRoom = (object)json_decode($responseRoom, true);
    foreach ($dataRoom->data as $room) {
        if ($room['id'] === $id) {
            return $room['roomName'];
        }
    }
}
