<?php
include('../configs/connectDB.php');
// include '../ultils/convertToDateTime.php';
class Room
{
    private $roomName;
    private $status;

    public function __construct($roomName, $status)
    {
        $this->roomName = $roomName;
        $this->status = $status;
    }

    public static function create(Room $room)
    {
        global $conn;
        $createdAt = convertToDateTime(new DateTime('now'));
        $sql = "INSERT INTO room (roomName, status, createdAt) 
        VALUES ('$room->roomName', '$room->status', '$createdAt')";
        if ($conn->query($sql) === FALSE) {
            echo "Error!";
        }
        $conn->close();
    }

    public static function update($room, int $id)
    {
        global $conn;
        $updatedAt = convertToDateTime(new DateTime('now'));
        $sql = "UPDATE room SET roomName='$room->roomName', status='$room->status', updatedAt='$updatedAt' WHERE id='$id'";
        if ($conn->query($sql) === FALSE) {
            echo "Error updating record: " . $conn->error;
        }
    }

    public static function findOne($condition = "", $field = "")
    {
        global $conn;
        if ($condition && $field) {
            $sql = "SELECT * FROM room WHERE $field = '$condition' LIMIT 1";
        } else {
            $sql = "SELECT * FROM room LIMIT 1";
        }
        return $conn->query($sql);
    }

    public static function findAll($condition = 0, $field = 0)
    {
        global $conn;
        if ($condition && $field) {
            $sql = "SELECT * FROM room WHERE $field = '$condition'";
        } else {
            $sql = "SELECT * FROM room";
        }
        return $conn->query($sql);
    }

    public static function delete($condition)
    {
        global $conn;
        $sql = "DELETE FROM room WHERE id = '$condition'";
        return $conn->query($sql);
    }
}
