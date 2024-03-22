<?php
include('../configs/connectDB.php');
// include '../ultils/convertToDateTime.php';

class Movie
{
    private $title;
    private $category;
    private $duration;
    private $thumbPath;
    private $trending;
    private $limitnation;
    private $status;
    private $director;
    private $cast;
    private $language;
    private $startDate;
    private $endDate;
    private $description;


    public function __construct($title, $category, $duration, $thumbPath, $trending,  $limitnation, $status, $director, $cast, $language, $startDate, $endDate, $description)
    {
        $this->title = $title;
        $this->category = $category;
        $this->duration = $duration;
        $this->thumbPath = $thumbPath;
        $this->trending = $trending;
        $this->limitnation = $limitnation;
        $this->status = $status;
        $this->director = $director;
        $this->cast = $cast;
        $this->language = $language;
        $this->startDate = $startDate;
        $this->endDate = $endDate;
        $this->description = $description;
    }

    public static function create(Movie $movie)
    {
        global $conn;
        $createdAt = convertToDateTime(new DateTime('now'));
        $sql = "INSERT INTO movie (title, category, duration, thumbPath, trending,limitnation,status, director,  cast,  language,  startDate,  endDate, description, createdAt) 
        VALUES ('$movie->title','$movie->category','$movie->duration','$movie->thumbPath','$movie->trending','$movie->limitnation','$movie->status','$movie->director','$movie->cast','$movie->language','$movie->startDate','$movie->endDate','$movie->description','$createdAt')";
        if ($conn->query($sql) === FALSE) {
            echo "Error!";
        }
        $conn->close();
    }

    public static function update(Movie $Movie, int $id)
    {
        global $conn;
        $updatedAt = convertToDateTime(new DateTime('now'));
        $sql = "UPDATE movie SET title='$Movie->title', category='$Movie->category',duration='$Movie->duration',thumbPath='$Movie->thumbPath',trending='$Movie->trending',limitnation='$Movie->limitnation',status='$Movie->status', director='$Movie->director', cast='$Movie->cast',language='$Movie->language',startDate='$Movie->startDate',endDate='$Movie->endDate',description='$Movie->description', updatedAt= '$updatedAt' WHERE id='$id'";
        if ($conn->query($sql) === FALSE) {
            echo "Error updating record: " . $conn->error;
        }
    }

    public static function findOne($condition = 0, $field = 0)
    {
        global $conn;
        if ($condition && $field) {
            $sql = "SELECT * FROM movie WHERE $field = '$condition' LIMIT 1";
        } else {
            $sql = "SELECT * FROM movie LIMIT 1";
        }
        return $conn->query($sql);
    }

    public static function findAll($condition = 0, $field = 0)
    {
        global $conn;
        if ($condition && $field) {
            $sql = "SELECT * FROM movie WHERE $field = '$condition'";
        } else {
            $sql = "SELECT * FROM movie";
        }
        return $conn->query($sql);
    }

    public static function findBySchedule($day)
    {
        global $conn;
        $sql = "SELECT movie.*,movieschedule.roomId, GROUP_CONCAT(movieschedule.time) AS screeningTimes FROM movie INNER JOIN movieschedule ON movie.id = movieschedule.movieId WHERE movie.startDate = '$day' GROUP BY movie.id";
        return $conn->query($sql);
    }

    public static function findByTime($time, $movieId)
    {
        global $conn;
        $sql = "SELECT movie.*, movieschedule.roomId, movieschedule.time FROM movie INNER JOIN movieschedule ON movie.id = movieschedule.movieId WHERE movieschedule.time = '$time' AND movie.id = '$movieId'";
        return $conn->query($sql);
    }
}
