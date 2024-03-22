<?php
include('../configs/connectDB.php');
// include '../ultils/convertToDateTime.php';
class TypeSeat
{
    private $type;
    private $typeName;

    public function __construct($type, $typeName)
    {
        $this->type = $type;
        $this->typeName = $typeName;
    }

    public static function create(TypeSeat $typeSeat)
    {
        global $conn;
        $createdAt = convertToDateTime(new DateTime('now'));
        $sql = "INSERT INTO typeseat (type, typeName, createdAt) 
        VALUES ('$typeSeat->type', '$typeSeat->typeName', '$createdAt')";
        if ($conn->query($sql) === FALSE) {
            echo "Error!";
        }
        $conn->close();
    }

    public static function update($typeSeat, int $id)
    {
        global $conn;
        $updatedAt = convertToDateTime(new DateTime('now'));
        $sql = "UPDATE typeseat SET type='$typeSeat->type', typeName='$typeSeat->typeName',updatedAt='$updatedAt' WHERE id='$id'";
        if ($conn->query($sql) === FALSE) {
            echo "Error updating record: " . $conn->error;
        }
    }

    public static function findOne($condition = "", $field = "")
    {
        global $conn;
        if ($condition && $field) {
            $sql = "SELECT * FROM typeseat WHERE $field = '$condition' LIMIT 1";
        } else {
            $sql = "SELECT * FROM typeseat LIMIT 1";
        }
        return $conn->query($sql);
    }

    public static function findAll($condition = "", $field = "")
    {
        global $conn;
        if ($condition && $field) {
            $sql = "SELECT * FROM typeseat WHERE $field = '$condition'";
        } else {
            $sql = "SELECT * FROM typeseat";
        }
        return $conn->query($sql);
    }

    public static function delete($condition)
    {
        global $conn;
        $sql = "DELETE FROM typeseat WHERE id = '$condition'";
        return $conn->query($sql);
    }
}
