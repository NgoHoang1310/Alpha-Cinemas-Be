<?php
include('../configs/connectDB.php');

class MovieSchedule
{
    private $movieId;
    private $roomId;
    private $time;
    private $status;


    public function __construct($movieId, $roomId, $time, $status)
    {
        $this->movieId = $movieId;
        $this->roomId = $roomId;
        $this->time = $time;
        $this->status = $status;
    }

    public static function create(MovieSchedule $movieSchedule)
    {
        global $conn;
        $createdAt = convertToDateTime(new DateTime('now'));
        $sql = "INSERT INTO movieschedule (movieId, roomId, time, status, createdAt) 
        VALUES ('$movieSchedule->movieId','$movieSchedule->roomId','$movieSchedule->time','$movieSchedule->status', '$createdAt')";
        if ($conn->query($sql) === FALSE) {
            echo "Error!";
        }
        $conn->close();
    }

    public static function update(MovieSchedule $movieSchedule, int $id)
    {
        global $conn;
        $updatedAt = convertToDateTime(new DateTime('now'));

        $sql = "UPDATE movie SET movieId='$movieSchedule->movieId', roomId='$movieSchedule->roomId',time='$movieSchedule->time',status='$movieSchedule->status', updatedAt = '$updatedAt' WHERE id='$id'";
        if ($conn->query($sql) === FALSE) {
            echo "Error updating record: " . $conn->error;
        }
    }

    public static function findAll($condition = 0, $field = 0)
    {
        global $conn;
        if ($condition && $field) {
            $sql = "SELECT * FROM movieschedule WHERE $field = '$condition'";
        } else {
            $sql = "SELECT * FROM movieschedule";
        }
        return $conn->query($sql);
    }
}
