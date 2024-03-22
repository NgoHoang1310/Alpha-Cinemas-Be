<?php
include('../configs/connectDB.php');
// include '../ultils/convertToDateTime.php';
class Seat
{
    private $typeSeatId;
    private $roomId;
    private $rowSeat;

    private $columnSeat;
    private $status;

    public function __construct($typeSeatId, $roomId, $rowSeat, $columnSeat, $status)
    {
        $this->typeSeatId = $typeSeatId;
        $this->roomId = $roomId;
        $this->rowSeat = $rowSeat;
        $this->columnSeat = $columnSeat;
        $this->status = $status;
    }

    public static function create(Seat $seat)
    {
        global $conn;
        $createdAt = convertToDateTime(new DateTime('now'));
        $sql = "INSERT INTO seat (typeSeatId, roomId, rowSeat, columnSeat, status, createdAt) 
        VALUES ('$seat->typeSeatId', '$seat->roomId', '$seat->rowSeat', '$seat->columnSeat', '$seat->status', '$createdAt')";
        if ($conn->query($sql) === FALSE) {
            echo "Error!";
        }
        $conn->close();
    }

    public static function update($seat, int $id)
    {
        global $conn;
        $updatedAt = convertToDateTime(new DateTime('now'));
        $sql = "UPDATE seat SET typeSeatId='$seat->typeSeatId',roomId='$seat->roomId', rowSeat='$seat->rowSeat',columnSeat='$seat->columnSeat',status='$seat->status', updatedAt='$updatedAt' WHERE id='$id'";
        if ($conn->query($sql) === FALSE) {
            echo "Error updating record: " . $conn->error;
        }
    }

    public static function findOne($condition = "", $field = "")
    {
        global $conn;
        if ($condition && $field) {
            $sql = "SELECT * FROM seat WHERE $field = '$condition' LIMIT 1";
        } else {
            $sql = "SELECT * FROM seat LIMIT 1";
        }
        return $conn->query($sql);
    }

    public static function findAll($condition = "", $field = "")
    {
        global $conn;
        if ($condition && $field) {
            $sql = "SELECT * FROM seat WHERE $field = '$condition'";
        } else {
            $sql = "SELECT * FROM seat";
        }
        return $conn->query($sql);
    }

    public static function delete($condition)
    {
        global $conn;
        $sql = "DELETE FROM seat WHERE id = '$condition'";
        return $conn->query($sql);
    }
}
