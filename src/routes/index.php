<?php
include '../ultils//convertToDateTime.php';
include '../ultils/router.php';
include '../ultils/uploadFile.php';
include '../controllers/movieControllers.php';
include '../controllers/userControllers.php';
include '../controllers/bannerControllers.php';
include '../controllers/theaterControllers.php';
include '../controllers/movieScheduleControllers.php';
include '../controllers/roomControllers.php';
include '../controllers/typeSeatControllers.php';
include '../controllers/seatControllers.php';
include '../controllers/priceSeatControllers.php';
// include '../ultils/routing.php';
error_reporting(0);
// Chấp nhận CORS
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// $requestUri = $_SERVER['REQUEST_URI'];
// // Tách đường dẫn thành các phần
// $uriParts = explode('/', $requestUri);
// $apiName = strstr($requestUri, $uriParts[2]);
// print_r($api['path']);
// if ($apiName === 'api/user/get' && $_SERVER['REQUEST_METHOD'] === 'GET') {
//     // handleGetUser();
//     return;
// }


//user
routing("GET", "api/user/get", "handleGetUser");
routing("POST", "api/user/login", "handleLoginUser");
routing("POST", "api/user/create", "handleCreateUser");
routing("POST", "api/user/update", "handleUpdateUser");
routing("POST", "api/user/delete", "handleDeleteUser");

//movie
routing("GET", "api/movie/get", "handleGetAllMovie");
routing("GET", "api/movie/getBySchedule", "handleGetMovieBySchedule");
routing("GET", "api/movie/getAMovieByTime", "handleAGetMovieByTime");
routing("POST", "api/movie/create", "handleCreateMovie");
routing("POST", "api/movie/update", "handleUpdateMovie");

//banner
routing("GET", "api/banner/get", "handleGetBanner");
routing("POST", "api/banner/create", "handleCreateBanner");
routing("POST", "api/banner/update", "handleUpdateBanner");

//theater
routing("GET", "api/theater/get", "handleGetTheater");
routing("POST", "api/theater/create", "handleCreateTheater");
routing("POST", "api/theater/update", "handleUpdateTheater");

routing("GET", "api/movieschedule/get", "handleGetAllMovieSchedule");
routing("POST", "api/movieschedule/create", "handleCreateMovieSchedule");
routing("POST", "api/movieschedule/update", "handleUpdateMovieSchedule");

//room
routing("GET", "api/room/get", "handleGetAllRoom");
routing("POST", "api/room/create", "handleCreateRoom");

//typeseat
routing("GET", "api/typeseat/get", "handleGetAllTypeSeat");
routing("POST", "api/typeseat/create", "handleCreateTypeSeat");
routing("POST", "api/typeseat/update", "handleUpdateTypeSeat");

//seat
routing("GET", "api/seat/get", "handleGetSeatsByRoom");
routing("POST", "api/seat/create", "handleCreateSeat");

//price seat
routing("GET", "api/priceseat/get", "handleGetAllPriceSeat");
routing("POST", "api/priceseat/create", "handleCreatePriceSeat");
