<?php
include('../configs/connectDB.php');

class Banner
{
    private $thumbPath;


    public function __construct($thumbPath)
    {
        $this->thumbPath = $thumbPath;
    }

    public static function create(Banner $banner)
    {
        global $conn;
        $createdAt = convertToDateTime(new DateTime('now'));
        $sql = "INSERT INTO banner (thumbPath,createdAt) 
        VALUES ('$banner->thumbPath', '$createdAt')";
        if ($conn->query($sql) === FALSE) {
            echo "Error!";
        }
        $conn->close();
    }

    public static function findAll()
    {
        global $conn;
        $sql = "SELECT * FROM banner ";
        return $conn->query($sql);
    }
}
