<?php
include('../configs/connectDB.php');
// include '../ultils/convertToDateTime.php';
class PriceSeat
{
    private $typeSeatId;
    private $price;

    public function __construct($typeSeatId, $price)
    {
        $this->typeSeatId = $typeSeatId;
        $this->price = $price;
    }

    public static function create(PriceSeat $priceSeat)
    {
        global $conn;
        $createdAt = convertToDateTime(new DateTime('now'));
        $sql = "INSERT INTO priceTicket (typeSeatId, price, createdAt) 
        VALUES ('$priceSeat->typeSeatId', '$priceSeat->price', '$createdAt')";
        if ($conn->query($sql) === FALSE) {
            echo "Error!";
        }
        $conn->close();
    }

    public static function update($priceSeat, int $id)
    {
        global $conn;
        $updatedAt = convertToDateTime(new DateTime('now'));
        $sql = "UPDATE priceTicket SET typeSeatId='$priceSeat->typeSeatId', price='$priceSeat->price', updatedAt='$updatedAt' WHERE id='$id'";
        if ($conn->query($sql) === FALSE) {
            echo "Error updating record: " . $conn->error;
        }
    }

    public static function findOne($condition = "", $field = "")
    {
        global $conn;
        if ($condition && $field) {
            $sql = "SELECT * FROM priceTicket WHERE $field = '$condition' LIMIT 1";
        } else {
            $sql = "SELECT * FROM priceTicket LIMIT 1";
        }
        return $conn->query($sql);
    }

    public static function findAll($condition = "", $field = "")
    {
        global $conn;
        if ($condition && $field) {
            $sql = "SELECT * FROM priceTicket WHERE $field = '$condition'";
        } else {
            $sql = "SELECT * FROM priceTicket";
        }
        return $conn->query($sql);
    }

    public static function delete($condition)
    {
        global $conn;
        $sql = "DELETE FROM priceTicket WHERE id = '$condition'";
        return $conn->query($sql);
    }
}
