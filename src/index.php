<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alpha Cinemas</title>
    <link rel="icon" type="image/x-icon" href="../assets/images/logo.jpg">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" integrity="sha512-NhSC1YmyruXifcj/KFRWoC561YpHpc5Jtzgvbuzx5VozKpWvQ+4nXhPdFgmx8xqexRcpAglTj9sIBWINXa8x5w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/font/css/all.min.css">

    <link rel="stylesheet" href="../src/globalStyle/globalStyle.css">
    <link rel="stylesheet" href="../src/components/Header/Header.css">
    <link rel="stylesheet" href="../src/components/Widget/Widget.css">
    <link rel="stylesheet" href="../src/components/SideBar/SideBar.css">
    <link rel="stylesheet" href="../src/components/MovieCard/MovieCard.css">
    <link rel="stylesheet" href="../src/components/Movies/Movies.css">
    <link rel="stylesheet" href="../src/components/ShowTime/ShowTime.css">
    <link rel="stylesheet" href="../src/components/Modal/Booking/BookingModal.css">
    <link rel="stylesheet" href="../src/components/Modal/Payment/PaymentModal.css">

    <link rel="stylesheet" href="../src/pages/Auth/Auth.css">
    <link rel="stylesheet" href="../src/pages/Home/Home.css">
    <link rel="stylesheet" href="../src/pages/MovieDetail/MovieDetail.css">
    <link rel="stylesheet" href="../src/pages/MovieSchedule/MovieSchedule.css">
    <link rel="stylesheet" href="../src/pages/Theater/Theater.css">
    <link rel="stylesheet" href="../src/pages/Booking/Booking.css">
    <link rel="stylesheet" href="../src/pages/Payment/Payment.css">
    <link rel="stylesheet" href="../src/pages/Transaction/Transaction.css">

    <link rel="stylesheet" href="../src/pages/Admin/DashBoard/DashBoard.css">
    <link rel="stylesheet" href="../src/pages/Admin/ManageUser/ManagerUser.css">
    <link rel="stylesheet" href="../src/pages/Admin/ManageMovie/ManageMovie.css">
    <link rel="stylesheet" href="../src/pages/Admin/ManageBanner/ManageBanner.css">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="../src/ultils/common.js"></script>
    <script src="../src/ultils/validation.js"></script>

    <script src="../src/pages/Admin/ManageUser/ManageUser.js"></script>
    <script src="../src/pages/Admin/ManagePrice/ManagePrice.js"></script>
    <script src="../src/pages/Admin/ManageTransaction/ManageTransaction.js"></script>
    <script src="../src/components/Search/Search.js"></script>

</head>

<body>
    <div id="root">
        <?php
        error_reporting(0);
        $requestUri = $_SERVER['REQUEST_URI'];
        // Tách đường dẫn thành các phần
        $uriParts = explode('/', $requestUri);

        // Kiểm tra xem có đủ phần tử trong đường dẫn không
        if ($uriParts[2] === 'alphacinemas.vn') {
            // Lấy tên API từ đường dẫn
            $uriPage = parse_url($uriParts[3]);

            // Gọi hàm tương ứng với tên API
            switch ($uriPage['path']) {
                case 'login': {
                        include('./pages/Auth/Login/Login.php');
                        break;
                    }
                case 'register': {
                        include('./pages/Auth/Register/Register.php');
                        break;
                    }
                case 'home': {
                        include('./pages/Home/Home.php');
                        break;
                    }
                case 'movie-detail': {
                        include('./pages/MovieDetail/MovieDetail.php');
                        break;
                    }
                case 'movie-schedule': {
                        include('./pages/MovieSchedule/MovieSchedule.php');
                        break;
                    }
                case 'theater': {
                        include('./pages/Theater/Theater.php');
                        break;
                    }
                case 'booking': {
                        include('./pages/Booking/Booking.php');
                        break;
                    }
                case 'payment': {
                        include('./pages/Payment/Payment.php');
                        break;
                    }
                case 'price-ticket': {
                        include('./pages/PriceTicket/PriceTicket.php');
                        break;
                    }
                case 'transaction': {
                        include('./pages/Transaction/Transaction.php');
                        break;
                    }

                case 'dashboard': {
                        include('./pages/Admin/DashBoard/DashBoard.php');
                        break;
                    }
                case 'manage-users': {
                        include('./pages/Admin/ManageUser/ManageUser.php');
                        break;
                    }
                case 'manage-movies': {
                        include('./pages/Admin/ManageMovie/ManageMovie.php');
                        break;
                    }
                case 'manage-schedules': {
                        include('./pages/Admin/ManageMovieSchedule/ManageMovieSchedule.php');
                        break;
                    }
                case 'manage-seats': {
                        include('./pages/Admin/ManageSeat/ManageSeat.php');
                        break;
                    }
                case 'manage-theaters': {
                        include('./pages/Admin/ManageTheater/ManageTheater.php');
                        break;
                    }
                case 'manage-prices': {
                        include('./pages/Admin/ManagePrice/ManagePrice.php');
                        break;
                    }
                case 'manage-banners': {
                        include('./pages/Admin/ManageBanner/ManageBanner.php');
                        break;
                    }
                case 'manage-transactions': {
                        include('./pages/Admin/ManageTransaction/ManageTransaction.php');
                        break;
                    }


                    // Thêm các trường hợp khác tại đây nếu có nhiều API
                default:
                    http_response_code(404);
                    echo "Không tìm thấy trang!";
                    break;
            }
        } else {
            http_response_code(404);
            echo json_encode(array('error' => 'Not Found'));
        }
        ?>
        <div class="modal fade" id="bookingModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="false">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div id="booking-modal" class="modal-content p-3">

                </div>
            </div>
        </div>
        <div class="modal fade" id="paymentModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="false">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div id="payment-modal" class="modal-content p-3">
                    <?php include $_SERVER['DOCUMENT_ROOT'] . '/Book-movie-tickets/src/components/Payment/PaymentModal.php' ?>
                </div>
            </div>
        </div>

        <div class="modal fade" id="trailerModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="false">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div id="trailer-modal" class="modal-content p-3">
                    <?php include $_SERVER['DOCUMENT_ROOT'] . '/Book-movie-tickets/src/components/Modal/Trailer/Trailer.php' ?>
                </div>
            </div>
        </div>





    </div>

    <script src="../src/components/ShowTime/ShowTime.js"></script>
    <script src="../src/components/Header/Header.js"></script>
    <script src="../src/components/MovieCard/MovieCard.js"></script>
    <script src="../src/components/Modal/Booking/BookingModal.js"></script>

    <script src="../src/pages/Auth/Login/Login.js"></script>
    <script src="../src/pages/Auth/Register/Register.js"></script>
    <script src="../src/pages/Home/Home.js"></script>
    <script src="../src/pages/MovieSchedule/MovieSchedule.js"></script>
    <script src="../src/pages/Booking/Booking.js"></script>
    <script src="../src/pages/Payment/Payment.js"></script>

    <script src="../src/pages/Admin/ManageMovie/ManageMovie.js"></script>
    <script src="../src/pages/Admin/ManageMovieSchedule/ManageMovieSchedule.js"></script>
    <script src="../src/pages/Admin/ManageSeat/ManageSeat.js"></script>
    <script src="../src/pages/Admin/ManageBanner/ManageBanner.js"></script>
    <script src="../src/pages/Admin/ManageTheater/ManageTheater.js"></script>
</body>

</html>