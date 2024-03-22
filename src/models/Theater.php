<?php
include('../configs/connectDB.php');

class Theater
{
    private $code;
    private $theaterName;


    public function __construct($code, $theaterName)
    {
        $this->code = $code;
        $this->theaterName = $theaterName;
    }

    public static function create(Theater $theater)
    {
        global $conn;
        $createdAt = convertToDateTime(new DateTime('now'));
        $sql = "INSERT INTO theater (code, theaterName, createdAt) 
        VALUES ('$theater->code','$theater->theaterName','$createdAt')";
        if ($conn->query($sql) === FALSE) {
            echo "Error!";
        }
        $conn->close();
    }

    public static function findAll()
    {
        global $conn;
        $sql = "SELECT * FROM theater ";
        return $conn->query($sql);
    }
}
