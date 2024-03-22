<?php
include('../configs/connectDB.php');
// include '../ultils/convertToDateTime.php';
class User
{
    private $userName;
    private $firstName;
    private $lastName;
    private $email;
    private $password;
    private $phoneNumber;

    public function __construct($userName, $firstName, $lastName, $email, $password, $phoneNumber)
    {
        $this->userName = $userName;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;
        $this->password = $password;
        $this->phoneNumber = $phoneNumber;
    }

    public static function create(User $user)
    {
        global $conn;
        $createdAt = convertToDateTime(new DateTime('now'));
        $sql = "INSERT INTO user (userName, firstName, lastName, email, password, phoneNumber, createdAt) 
        VALUES ('$user->userName', '$user->firstName', '$user->lastName', '$user->email', '$user->password', '$user->phoneNumber', '$createdAt')";
        if ($conn->query($sql) === FALSE) {
            echo "Error!";
        }
        $conn->close();
    }

    public static function update($user, int $id)
    {
        global $conn;
        $updatedAt = convertToDateTime(new DateTime('now'));
        $sql = "UPDATE user SET userName='$user->userName', firstName='$user->firstName',lastName='$user->lastName',password='$user->password',phoneNumber='$user->phoneNumber', updatedAt='$updatedAt' WHERE id='$id'";
        if ($conn->query($sql) === FALSE) {
            echo "Error updating record: " . $conn->error;
        }
    }

    public static function findOne($condition = "", $field = "")
    {
        global $conn;
        if ($condition && $field) {
            $sql = "SELECT * FROM user WHERE $field = '$condition' LIMIT 1";
        } else {
            $sql = "SELECT * FROM user LIMIT 1";
        }
        return $conn->query($sql);
    }

    public static function findAll($condition = "", $field = "")
    {
        global $conn;
        if ($condition && $field) {
            $sql = "SELECT * FROM user WHERE $field = '$condition'";
        } else {
            $sql = "SELECT * FROM user";
        }
        return $conn->query($sql);
    }

    public static function delete($condition)
    {
        global $conn;
        $sql = "DELETE FROM user WHERE id = '$condition'";
        return $conn->query($sql);
    }
}
